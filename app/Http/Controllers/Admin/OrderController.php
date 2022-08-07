<?php

namespace App\Http\Controllers\Admin;

use App\CategoryAttribute;
use App\Company;
use App\Http\Controllers\Controller;
use App\Mail\SendMessageToCustomerFromOrderMail;
use App\Order;
use App\OrderProduct;
use App\Product;
use Auth;
use Carbon\Carbon;
use Datatables;
use DB;
use Excel;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use Mail;

class OrderController extends Controller {

	public function datatable(Request $request) {
		$result = (new Order)->newQuery();

		$result = $result->join('customers', 'orders.customer_id', '=', 'customers.id')
			->join('order_products', 'orders.id', '=', 'order_products.order_id')
			->join('currencies', 'orders.currency_id', '=', 'currencies.id')
			->join('exchange_rates', 'currencies.id', '=', 'exchange_rates.currency_id')
			->select('orders.id as order_id',
				'orders.code as order_code',
				'customers.identity_document as identity_document',
				'customers.first_name as first_name',
				'customers.last_name as last_name',
				'orders.created_at as date',
				'customers.cel_whatsapp as cel',
				DB::raw("SUM(order_products.quantity) as total_products"),
				// 'orders.total as total',
				DB::raw('(CASE
                        WHEN currencies.decimal = "1" THEN CONCAT(currencies.symbol, FORMAT(orders.total*exchange_rates.sales_exchange, 2)) 
                        ELSE CONCAT(currencies.symbol, FORMAT(orders.total*exchange_rates.sales_exchange, 0))  
                        END) AS total'),
				'orders.status as status')
			->groupBy('orders.id');

		if ($request->status != '') {
			$result = $result->where('orders.status', $request->status);
		}

		if ($request->start_date != '') {
			$start_date = Carbon::createFromFormat('d/m/Y', $request->start_date);
			$end_date = Carbon::createFromFormat('d/m/Y', $request->end_date);

			$result = $result->whereDate('orders.created_at', '>=', $start_date)
				->whereDate('orders.created_at', '<=', $end_date);
		}

		return DataTables::of($result)
			->addColumn('Actions', function ($model) {

				return "actions";
			})->make(true);
	}

	public function show($id) {
		//Array order
		$t = [];

		//Array products
		$p = [];

		//Array Customer
		$c = [];

		$total_quantity = 0;

		$order = Order::with(['customer' => function ($query) {
			$query->with(['city' => function ($query) {
				$query->withTrashed();
			}]);
			$query->with(['country' => function ($query) {
				$query->withTrashed();
			}]);
		}])
			->with(['alternative_direction' => function ($query) {
				$query->with('city')
					->with('country')
					->with('province')
					->with('district');
			}])
			->with(['account' => function ($query) {
				$query->with('payment_way');
			}])
			->find($id);

		$order_products = OrderProduct::where('order_id', $id)->get();

		foreach ($order_products as $l => $order_product) {

			$product = Product::withTrashed()->find($order_product->product_id);

			$name_product = $product->name;
			if ($product->deleted_at != null) {
				$name_product += ' ' . '(Producto Eliminado)';
			}

			$p[] = array(
				'quantity' => $order_product->quantity,
				'name' => $name_product,
				'price' => $order_product->price,
				'code' => $product->code,
				'discount' => (float) $order_product->discount - (float) $order_product->price,
				'sub_total' => (float) $order_product->quantity * (float) $order_product->price,
			);

			$total_quantity += $order_product->quantity;
		}

		$currency = DB::table('currencies')
			->where('id', $order->currency_id)
			->first();

		$exchange_rate = DB::table('exchange_rates')
			->where('currency_id', $order->currency_id)
			->first();

		$rate = $exchange_rate->sales_exchange;
		//$decimal = $currency->decimal ? 2 : 0;

		$decimal = 0;
		if ($currency->decimal) {
			$decimal = (int)$currency->quantity_of_decimals;			
		}


		$symbol = $currency->symbol;

		$c = array(
			'document_type' => $order->customer->document_type,
			'birthday' => $order->customer->birthday,
			'document' => $order->customer->identity_document,
			'name' => $order->customer->first_name . ' ' . $order->customer->last_name,
			'email' => $order->customer->email,
			'cel' => $order->customer->cel_whatsapp,
			'address' => $order->customer->address,
			'origin' => ($order->customer->city != null) ? $order->customer->city->name . ' - ' . $order->customer->country->name : '',
			'alternative_direction' => $order->customer->alternative_direction,
		);

		$t = array(
			'uuid' => $order->uuid,
			'id' => $order->id,
			'code' => $order->code,
			'date' => Date::parse($order->created_at)->format('j/F/Y - H:i'),
			// 'date' => $order->created_at->format('d-m-Y H:i'),
			'status' => $order->status,
			'is_separated' => $order->is_separated,
			'quantity' => $total_quantity,
			'total' => $order->total,
			'description' => $order->description,
			'account_name' => ($order->account != null) ? $order->account->name : 'Sin cuenta',
			'payment_way_name' => ($order->account != null) ? $order->account->payment_way->name : 'Sin forma de pago',
			'products' => $p,
			'customer' => $c,
			'with_invoice' => $order->with_invoice,
			'business_name' => $order->business_name,
			'business_document' => $order->business_document,
			'business_address' => $order->business_address,
			'alternative_direction' => $order->alternative_direction,
			'type_recommendation' => $order->type_recommendation,
			'when_purchased' => $order->when_purchased,
			'guarantee' => $order->guarantee,
			'simulate_financing' => $order->simulate_financing,
			'currency_id' => $order->currency_id,
			'rate' => $rate,
			'decimal' => $decimal,
			'symbol' => $symbol,

		);

		return $t;
	}

	public function allByFilters(Request $request) {

		$user = Auth::user();
		$company_id = $user->company_id;

		$name = $request->q;
		$date = $request->date;
		$status = $request->status;

		$orders = (new Order)->newQuery();

		$orders = $orders->whereCompanyId($company_id);

		if ($name != '') {

			$orders = $orders->whereHas('customer', function ($query) use ($name) {
				$query->where('first_name', 'LIKE', "%$name%");
				$query->orWhere('last_name', 'LIKE', "%$name%");
			});

			if ($status != '') {
				$orders = $orders->whereStatus($status);
			}

			if ($date != '') {
				$orders = $orders->whereDate('created_at', $date);
			}

		} else {
			if ($status != '') {
				$orders = $orders->whereStatus($status);
			}

			if ($date != '') {
				$orders = $orders->whereDate('created_at', $date);
			}
		}

		$orders = $orders->with('customer')->orderBy('id', 'DESC')->get();

		$t = [];

		if (count($orders)) {
			foreach ($orders as $i => $order) {

				$customer = [];

				$total_quantity = 0;

				$order_products = OrderProduct::where('order_id', $order->id)->get();

				foreach ($order_products as $key => $order_product) {
					$total_quantity += $order_product->quantity;
				}

				$customer = array(
					'name' => $order->customer->first_name . ' ' . $order->customer->last_name,
					'cel' => $order->customer->cel_whatsapp,
				);

				$currency = DB::table('currencies')
					->where('id', $order->currency_id)
					->first();

				$exchange_rate = DB::table('exchange_rates')
					->where('currency_id', $order->currency_id)
					->first();

				$rate = $exchange_rate->sales_exchange;
				$decimal = $currency->decimal ? 2 : 0;
				$symbol = $currency->symbol;

				$t[] = array(
					'id' => $order->id,
					'date' => $order->created_at->format('d-m-Y'),
					'code' => $order->code,
					'status' => $order->status,
					'quantity' => $total_quantity,
					'total' => $symbol.number_format($order->total*$rate, $decimal, '.', ''),
					'customer' => $customer,
				);
			}
		}

		return $t;
	}

	public function updateToConfirmStatus($id) {
		$order = Order::with('products')->find($id);
		$order->status = 2;
		$order->save();

		foreach ($order->products as $key => $product) {
			$product->stock = $product->stock - $product->pivot->quantity;
			$product->save();
		}

		return;
	}

	public function updateToCancelStatus($id) {
		$order = Order::with('products')->find($id);
		$old_status = $order->status;

		$order->status = 3;
		$order->save();

		if ($old_status == 1) {
			return;
		}

		foreach ($order->products as $key => $product) {
			$product->stock = $product->stock + $product->pivot->quantity;
			$product->save();
		}
		return;
	}

	public function generate_excel() {

		$orders = Order::orderBy('id', 'DESC')
			->with('customer')
			->get();

		$dataFormatted = [];

		foreach ($orders as $i => $order) {

			$status_name = "Pendiente";

			switch ($order->status) {
			case 2:
				$status_name = "Confirmado";
				break;

			case 3:
				$status_name = "Cancelado";
				break;
			}

			$dataFormatted[] = array(
				'date_and_time' => $order->created_at->format('d-m-Y H:i'),
				'identity_document' => $order->customer->identity_document,
				'first_name' => $order->customer->first_name,
				'last_name' => $order->customer->last_name,
				'cellphone' => $order->customer->cel_whatsapp,
				'status_name' => $status_name,
			);
		}

		$currentDate = Carbon::now()->format('d-m-Y');
		$excelName = "Lista de pedidos {$currentDate}";

		Excel::create($excelName, function ($excel) use ($dataFormatted) {
			$excel->sheet('data', function ($sheet) use ($dataFormatted) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray(["Fecha y hora de registro", "DNI", "Nombres", "Apellidos", "Celular", "Estado"]);

				foreach ($dataFormatted as $key => $order) {
					$sheet->row($key + 2, $order);
				}
			});
		})->export('xls');
	}

	public function generate_excel_with_format(Request $request) {

		$start_date = $request->start_date;
		$end_date = $request->end_date;
		$status = $request->status;

		$start_date = Carbon::createFromFormat('d/m/Y', $start_date)->format('Y-m-d');
		$end_date = Carbon::createFromFormat('d/m/Y', $end_date)->format('Y-m-d');

		$now = Carbon::now()->format('d/m/Y');

		$orders = Order::orderBy('id', 'DESC')
			->select(['id', 'created_at', 'status', 'customer_id', 'code', 'total'])
			->with(['customer' => function ($query) {
				$query->select(['id', 'first_name', 'last_name', 'cel_whatsapp', 'identity_document']);
			}])
			->with(['products' => function ($query) {
				$query->select(['products.id', 'products.name']);
			}]);

		if ($status) {
			$orders->whereStatus($status);
		}

		if ($start_date) {

			$orders->whereDate('created_at', '>=', $start_date)
				->whereDate('created_at', '<=', $end_date);
		}

		$orders = $orders->get();

		$attribute_categories = CategoryAttribute::all();
		$header_categories = [];

		foreach ($attribute_categories as $ac => $category) {
			$header_categories[] = $category->name;
		}

		$excelName = "Reporte {$now}";
		$dataFormatted = [];

		Excel::create($excelName, function ($excel) use ($orders, $header_categories, $attribute_categories) {
			$excel->sheet('data', function ($sheet) use ($orders, $header_categories, $attribute_categories) {
				$sheet->setOrientation('landscape');

				$header1 = ['CODIGO', 'Fecha y hora de registro', 'DNI', 'Nombres', 'Apelidos', 'Celular', 'Estado', 'Cantidad', 'Producto'];
				$header2 = ['Precio Unitario', 'Descuento', 'Subtotal', 'Total(UND)', 'Dscto Total', 'Total(S/)'];
				$init = 1;

				$sheet->row($init, array_merge($header1, $header_categories, $header2));
				$init++;

				foreach ($orders as $key => $order) {
					$flag_background = false;
					if ($key % 2 == 0) {
						$flag_background = true;
					}

					$row_repated = [$order->code,
						$order->created_at->format('d-m-Y H:i'),
						$order->customer->identity_document,
						$order->customer->first_name,
						$order->customer->last_name,
						$order->customer->cel_whatsapp,
						$this->get_name_status($order->status)];

					$details = [];
					$quantity = 0;
					$total = 0;
					$discount = 0;

					foreach ($order->products as $u => $product) {

						#attributes
						$attributes = [];
						foreach ($attribute_categories as $acp => $category) {
							$exist_attribute_product = DB::table('attribute_product')
								->where('product_id', $product->id)
								->join('attributes', 'attribute_product.attribute_id', '=', 'attributes.id')
								->where('attributes.category_attribute_id', $category['id'])
								->get();

							if (count($exist_attribute_product)) {
								$attributes[] = $exist_attribute_product[0]->name;
							} else {
								$attributes[] = "";
							}
						}

						$quantity += $product->pivot->quantity;
						$discount += $product->pivot->discount;

						$details[] = array_merge([$product->pivot->quantity,
							$product->name], $attributes, [$product->pivot->price,
							$product->pivot->discount,
							($product->pivot->price * $product->pivot->quantity)]);

					}

					$row_last_repeated = [$quantity, $discount + $order->discount, $order->total];

					foreach ($details as $i => $detail) {
						if ($flag_background) {
							$sheet->cells("A{$init}:R{$init}", function ($cells) {
								$cells->setBackground('#dddddd');
							});
						}

						$sheet->row($init, array_merge($row_repated, $detail, $row_last_repeated));
						$init++;
					}

				}

				// ##############
				// $header = ['Fecha y hora de registro', 'DNI', 'Nombres', 'Appelidos', 'Celular', 'Estado'];
				// $sub_header = ['Cantidad', 'Producto', 'Precio Unitario', 'Descuento', 'Subtotal'];
				// $init = 1;

				// foreach ($orders as $key => $order) {
				// 	$sheet->row($init, $header);
				// 	$sheet->cells("A{$init}:F{$init}", function ($cells) {
				// 		$cells->setFontWeight('bold');
				// 		$cells->setBackground('#ffff00');
				// 	});

				// 	$sheet->setBorder('A1', 'thin');
				// 	$init++;
				// 	$sheet->row($init, [$order->created_at->format('d-m-Y H:i'),
				// 		$order->customer->identity_document,
				// 		$order->customer->first_name,
				// 		$order->customer->last_name,
				// 		$order->customer->cel_whatsapp,
				// 		$this->get_name_status($order->status)]);

				// 	$sheet->cells("A{$init}:F{$init}", function ($cells) {
				// 		$cells->setFontWeight('bold');
				// 		$cells->setBackground('#ffff00');
				// 	});

				// 	$init++;
				// 	$block_two_start = $init;

				// 	$sheet->row($init, $sub_header);
				// 	$sheet->cells("A{$init}:F{$init}", function ($cells) {
				// 		$cells->setFontWeight('bold');
				// 	});

				// 	$init++;

				// 	$quantity = 0;
				// 	$total = 0;

				// 	foreach ($order->products as $u => $product) {

				// 		$quantity += $product->pivot->quantity;
				// 		$total += $product->pivot->price * $product->pivot->quantity;

				// 		$sheet->row($init, [$product->pivot->quantity,
				// 			$product->name,
				// 			$product->pivot->price,
				// 			$product->pivot->discount,
				// 			($product->pivot->price * $product->pivot->quantity)]);
				// 		$init++;

				// 	}

				// 	$sheet->cell("D{$init}", function ($cell) {
				// 		$cell->setValue('Total(UND)');
				// 		$cell->setFontWeight('bold');
				// 	});

				// 	$sheet->cell("E{$init}", function ($cell) use ($quantity) {
				// 		$cell->setValue($quantity);
				// 	});

				// 	$init++;

				// 	$sheet->cell("D{$init}", function ($cell) {
				// 		$cell->setValue('Total(S/)');
				// 		$cell->setFontWeight('bold');

				// 	});
				// 	$sheet->cell("E{$init}", function ($cell) use ($total) {
				// 		$cell->setValue($total);
				// 	});

				// 	$sheet->cells("A{$block_two_start}:F{$init}", function ($cells) {
				// 		$cells->setBackground('#99ccff');
				// 	});

				// 	$init++;
				// }

				// $sheet->fromArray(["Fecha y hora de registro", "DNI", "Nombres", "Apellidos", "Celular", "Estado"]);

				// foreach ($dataFormatted as $key => $order) {
				// 	$sheet->row($key + 2, $order);
				// }
			});
		})->export('xls');
	}

	public function get_name_status($status) {

		switch ($status) {
		case 1:
			return "Pendiente";
			break;
		case 2:
			return "Confirmado";
			break;
		case 3:
			return "Cancelado";
			break;
		};
	}

	public function generate_formatted_excel() {

		$data = Operation::load_liquidation_operator($operations_id);

		// return $data['liquidation_discount'];

		if (count($data["liquidation_travel"]) > 0) {
			date_default_timezone_set('America/Lima');
			$date = date("Y-m-d");
			$nombre = "REPORTE_LIQUIDACION_PERSONAL_" . $date;
			Excel::create($nombre, function ($excel) use ($data) {
				$excel->sheet('Operador', function ($sheet) use ($data) {
					$sheet->setFontSize(8);
					//$sheet->getStyle('A1:B'. $sheet->getHighestRow())->getAlignment()->setWrapText(true);
					//$sheet->setFontFamily('Comic Sans MS');
					//$sheet->setFontFamily('Arial Sans MS');
					$sheet->setColumnFormat(array(
						'G' => '0.00',

						'J' => '0.00',
						'L' => '0.00',
						'M' => '0.00',

					));
					$fila = 1;
					$total_gasto = 0;
					$total_deposito = 0;
					$total_liquidation = 0;
					for ($i = 0; $i < count($data["liquidation_travel"]); $i++) {
						//logica del reporte
						$total_gasto = $total_gasto + $data["liquidation_travel"][$i]["gasto"];
						$total_deposito = $total_deposito + $data["liquidation_travel"][$i]["deposito"];
						$total_liquidation = $total_liquidation + $data["liquidation_travel"][$i]["total"];

						//para consumidor

						$consumidor = "";
						$sep = "";
						for ($x = 0; $x < count($data["liquidation_travel"][$i]["consumidor"]); $x++) {
							if ($x == 0) {$sep = "";} else { $sep = " / ";}
							//console.log("$x = "+$x)
							$consumidor = $consumidor . $sep . $data["liquidation_travel"][$i]["consumidor"][$x]["name"];
						}
						//num transportes
						$transporte = "";
						for ($x = 0; $x < count($data["liquidation_travel"][$i]["transporte"]); $x++) {
							if ($x == 0) {$sep = "";} else { $sep = " ";}
							$transporte = $transporte . $sep . $data["liquidation_travel"][$i]["transporte"][$x]["transporte"];
						}
						//combustible
						$combustible = 0;
						$num_combustible = "";
						for ($x = 0; $x < count($data["liquidation_travel"][$i]["combustible"]); $x++) {
							if ($x == 0) {$sep = "";} else { $sep = " ";}
							$num_combustible = $num_combustible . $sep . $data["liquidation_travel"][$i]["combustible"][$x]["ONumSerie"] . "-" . $data["liquidation_travel"][$i]["combustible"][$x]["ONumDocumento"];
							$combustible = $combustible + $data["liquidation_travel"][$i]["combustible"][$x]["OTotal"];
						}
						//num_operation
						$num_operation = "";
						for ($x = 0; $x < count($data["liquidation_travel"][$i]["num_operation"]); $x++) {
							if ($x == 0) {$sep = "";} else { $sep = " / ";}
							$num_operation = $num_operation + $sep + $data["liquidation_travel"][$i]["num_operation"][$x]["ODNumDocumento"];
						}
						//end logic
						if ($i == 0) {

							$sheet->mergeCells('A' . ($fila) . ':M' . ($fila) . '');
							$sheet->cells('A' . ($fila) . ':E' . ($fila) . '', function ($cells) {
								$cells->setFontWeight('bold');
								$cells->setAlignment('center'); //horizontal
								$cells->setValignment('center'); // vertical
								// $cells->setBorder('none', 'none', 'thin', 'none');
							});
							$sheet->row($fila,
								array('EMPRESA DE TRANSPORTES YSAMAR E.I.R.L.')
							);
							$fila++;
							$sheet->mergeCells('A' . ($fila) . ':M' . ($fila) . '');
							$sheet->cells('A' . ($fila) . ':E' . ($fila) . '', function ($cells) {
								$cells->setFontWeight('bold');
								$cells->setAlignment('center'); //horizontal
								$cells->setValignment('center'); // vertical
								// $cells->setBorder('none', 'none', 'thin', 'none');
							});
							$sheet->row($fila,
								array('LIQUIDACIÓN N°' . $data['liquidation']['ONumDocumento'])
							);
							$fila++;
							$sheet->mergeCells('A' . ($fila) . ':D' . ($fila));
							$sheet->cells('A' . ($fila) . ':D' . ($fila) . '', function ($cells) {
								$cells->setAlignment('center'); //horizontal
								$cells->setValignment('center'); // vertical
								$cells->setBorder('thin', 'thin', 'none', 'thin');
							});
							$sheet->mergeCells('H' . ($fila) . ':I' . ($fila));
							$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {
								$cells->setAlignment('right');
								$cells->setValignment('center'); // vertical
								$cells->setBorder('thin', 'thin', 'thin', 'thin');
							});
							$sheet->cells('J' . ($fila) . ':J' . ($fila) . '', function ($cells) {
								$cells->setBorder('thin', 'thin', 'thin', 'thin');
							});
							$sheet->row($fila,
								array('CONDUCTOR: ' . $data["operator"], '', '', '', '', '', '', 'Sueldo S/', '', $data["sueldo"])
							);
							$fila++;
							$sheet->mergeCells('A' . ($fila) . ':D' . ($fila));
							$sheet->cells('A' . ($fila) . ':D' . ($fila) . '', function ($cells) {
								$cells->setAlignment('center'); //horizontal
								$cells->setValignment('center'); // vertical
								$cells->setBorder('none', 'thin', 'none', 'thin');
							});
							$sheet->mergeCells('H' . ($fila) . ':I' . ($fila));
							$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {
								$cells->setAlignment('right');
								$cells->setValignment('center'); // vertical
								$cells->setBorder('thin', 'thin', 'thin', 'thin');
							});
							$sheet->cells('J' . ($fila) . ':J' . ($fila) . '', function ($cells) {
								$cells->setBorder('thin', 'thin', 'thin', 'thin');
							});
							$sheet->row($fila,
								array('PLACA TRACTO: ' . $data["placa"], '', '', '', '', '', '', 'Total saldos de viaje S/', '', $data["liquidacion_viaje"])
							);
							$fila++;
							$sheet->mergeCells('A' . ($fila) . ':D' . ($fila));
							$sheet->cells('A' . ($fila) . ':D' . ($fila) . '', function ($cells) {
								$cells->setAlignment('center'); //horizontal
								$cells->setValignment('center'); // vertical
								$cells->setBorder('none', 'thin', 'thin', 'thin');
							});
							$sheet->mergeCells('H' . ($fila) . ':I' . ($fila));
							$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {
								$cells->setAlignment('right');
								$cells->setValignment('center'); // vertical
								$cells->setBorder('thin', 'thin', 'thin', 'thin');
							});
							$sheet->cells('J' . ($fila) . ':J' . ($fila) . '', function ($cells) {
								$cells->setBorder('thin', 'thin', 'thin', 'thin');
							});
							if (count($data['liquidation_discount']) > 0) {
								// $sheet->row($fila,
								// 	array('FECHA DE EMISIÓN: '.$data["liquidation"]["OFechaEmision"],'','','','','','','Otros Gastos S/.','',$data["gasto"])
								// );
								$discount = $data['liquidation_discount'];
								for ($k = 0; $k < count($discount); $k++) {
									if ($k == 0) {
										$sheet->row($fila,
											array('FECHA DE EMISIÓN: ' . $data["liquidation"]["OFechaEmision"], '', '', '', '', '', '', $discount[$k]['description'] . ' S/', '', $discount[$k]['total'])
										);
									} else {

										$fila++;
										$sheet->mergeCells('H' . ($fila) . ':I' . ($fila));
										$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {
											$cells->setAlignment('right');
											$cells->setValignment('center'); // vertical
											$cells->setBorder('thin', 'thin', 'thin', 'thin');
											// $cells->setBackground('#9ee365');
										});
										$sheet->cells('J' . ($fila) . ':J' . ($fila) . '', function ($cells) {
											$cells->setBorder('thin', 'thin', 'thin', 'thin');
											// $cells->setBackground('#9ee365');
										});
										// $sheet->cells('A'.($fila).':I'.($fila).'', function($cells) {$cells->setFontWeight('bold');});
										$sheet->row($fila,
											array('', '', '', '', '', '', '', $discount[$k]['description'] . ' S/', '', $discount[$k]['total'])
										);
									}
								} //end for
								$fila++;
								$sheet->mergeCells('H' . ($fila) . ':I' . ($fila));
								$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {
									$cells->setAlignment('right');
									$cells->setValignment('center'); // vertical
									$cells->setBorder('thin', 'thin', 'thin', 'thin');
									$cells->setBackground('#9ee365');
								});
								$sheet->cells('J' . ($fila) . ':J' . ($fila) . '', function ($cells) {
									$cells->setBorder('thin', 'thin', 'thin', 'thin');
									$cells->setBackground('#9ee365');
								});
								$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {$cells->setFontWeight('bold');});
								$sheet->row($fila,
									array('', '', '', '', '', '', '', 'Neto a pagar S/', '', $data["liquidation"]["OTotal"])
									// 	array('','','','','','','','Neto a pagar S/.','',$data["liquidation"]["OTotal"])
								);
							} else {
								$sheet->mergeCells('H' . ($fila) . ':I' . ($fila));
								$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {
									$cells->setAlignment('right');
									$cells->setValignment('center'); // vertical
									$cells->setBorder('thin', 'thin', 'thin', 'thin');
									$cells->setBackground('#9ee365');
								});
								$sheet->cells('J' . ($fila) . ':J' . ($fila) . '', function ($cells) {
									$cells->setBorder('thin', 'thin', 'thin', 'thin');
									$cells->setBackground('#9ee365');
								});
								$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {$cells->setFontWeight('bold');});
								$sheet->row($fila,
									array('FECHA DE EMISIÓN:  ' . count($data['liquidation_discount']) . $data["liquidation"]["OFechaEmision"], '', '', '', '', '', '', 'Neto a pagar S/', '', $data["liquidation"]["OTotal"])
									// 	array('','','','','','','','Neto a pagar S/.','',$data["liquidation"]["OTotal"])
								);
							}

							$fila++;
							$fila++;
							$sheet->cells('A' . ($fila) . ':M' . ($fila), function ($cells) {
								$cells->setFontWeight('bold');
								// $cells->setBorder('thin', 'thin', 'thin', 'thin');
							});
							$sheet->cells('A' . ($fila) . ':M' . ($fila), function ($cells) {
								$cells->setFontWeight('bold');
								// $cells->setBorder('thin', 'thin', 'thin', 'thin');
							});
							$sheet->cells('A' . ($fila) . ':A' . ($fila), function ($cells) {
								$cells->setBorder('thin', 'thin', 'thin', 'thin');
							});
							$sheet->cells('A' . ($fila) . ':A' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
							$sheet->cells('B' . ($fila) . ':B' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
							$sheet->cells('C' . ($fila) . ':C' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
							$sheet->cells('D' . ($fila) . ':D' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
							$sheet->cells('E' . ($fila) . ':E' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
							$sheet->cells('F' . ($fila) . ':F' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
							$sheet->cells('G' . ($fila) . ':G' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
							$sheet->cells('H' . ($fila) . ':H' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
							$sheet->cells('I' . ($fila) . ':I' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
							$sheet->cells('J' . ($fila) . ':J' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
							$sheet->cells('K' . ($fila) . ':K' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
							$sheet->cells('L' . ($fila) . ':L' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
							$sheet->cells('M' . ($fila) . ':M' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});

							$sheet->row($fila,
								array('NRO', 'Consumidor', 'Nº LIQUID.', 'F. CARGA', 'TRANSP', 'TM (kg)', 'COMBUSTIBLE S/.', 'GL', 'COMBUSTIBLE Nº FACT.', 'DEPOSITO', 'BCP Nº OP', 'TOTAL GASTO', 'SALDO')
							);

							$fila++;

						}
						$sheet->cells('A' . ($fila) . ':A' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->cells('B' . ($fila) . ':B' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->cells('C' . ($fila) . ':C' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->cells('D' . ($fila) . ':D' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->cells('E' . ($fila) . ':E' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->cells('F' . ($fila) . ':F' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->cells('G' . ($fila) . ':G' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->cells('H' . ($fila) . ':H' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->cells('I' . ($fila) . ':I' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->cells('J' . ($fila) . ':J' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->cells('K' . ($fila) . ':K' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->cells('L' . ($fila) . ':L' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->cells('M' . ($fila) . ':M' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
						$sheet->row($fila,
							array($i + 1, $consumidor, $data["liquidation_travel"][$i]["numero"], $data["liquidation_travel"][$i]["fecha_carga"], $transporte, $data["liquidation_travel"][$i]["peso"], $combustible, $data["liquidation_travel"][$i]["cantidad"], $num_combustible, $data["liquidation_travel"][$i]["deposito"], $num_operation, $data["liquidation_travel"][$i]["gasto"], $data["liquidation_travel"][$i]["total"])
						);
						$fila++;

					}
					//resumen de consulta
					$sheet->cells('A' . ($fila) . ':M' . ($fila) . '', function ($cells) {$cells->setFontWeight('bold');});
					$sheet->cells('I' . ($fila) . ':I' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('J' . ($fila) . ':J' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('K' . ($fila) . ':K' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('L' . ($fila) . ':L' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('M' . ($fila) . ':M' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->row($fila,
						array('', '', '', '', '', '', '', '', 'TOTAL', $total_deposito, '', $total_gasto, $total_liquidation)
					);
					$fila++;
				});

			})->export('xls');
		} else {
			// return "No se encontró registros para exportar";
			date_default_timezone_set('America/Lima');
			$date = date("Y-m-d");
			$nombre = "REPORTE_LIQUIDACION_PERSONAL_" . $date;
			Excel::create($nombre, function ($excel) use ($data) {
				$excel->sheet('Operador', function ($sheet) use ($data) {
					$sheet->setFontSize(8);
					//$sheet->getStyle('A1:B'. $sheet->getHighestRow())->getAlignment()->setWrapText(true);
					//$sheet->setFontFamily('Comic Sans MS');
					//$sheet->setFontFamily('Arial Sans MS');
					$sheet->setColumnFormat(array(
						'G' => '0.00',

						'J' => '0.00',
						'L' => '0.00',
						'M' => '0.00',

					));
					$fila = 1;
					$total_gasto = 0;
					$total_deposito = 0;
					$total_liquidation = 0;

					$sheet->mergeCells('A' . ($fila) . ':M' . ($fila) . '');
					$sheet->cells('A' . ($fila) . ':E' . ($fila) . '', function ($cells) {
						$cells->setFontWeight('bold');
						$cells->setAlignment('center'); //horizontal
						$cells->setValignment('center'); // vertical
						// $cells->setBorder('none', 'none', 'thin', 'none');
					});
					$sheet->row($fila,
						array('EMPRESA DE TRANSPORTES YSAMAR E.I.R.L.')
					);
					$fila++;
					$sheet->mergeCells('A' . ($fila) . ':M' . ($fila) . '');
					$sheet->cells('A' . ($fila) . ':E' . ($fila) . '', function ($cells) {
						$cells->setFontWeight('bold');
						$cells->setAlignment('center'); //horizontal
						$cells->setValignment('center'); // vertical
						// $cells->setBorder('none', 'none', 'thin', 'none');
					});
					$sheet->row($fila,
						array('LIQUIDACIÓN N°' . $data['liquidation']['ONumDocumento'])
					);
					$fila++;
					$sheet->mergeCells('A' . ($fila) . ':D' . ($fila));
					$sheet->cells('A' . ($fila) . ':D' . ($fila) . '', function ($cells) {
						$cells->setAlignment('center'); //horizontal
						$cells->setValignment('center'); // vertical
						$cells->setBorder('thin', 'thin', 'none', 'thin');
					});
					$sheet->mergeCells('H' . ($fila) . ':I' . ($fila));
					$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {
						$cells->setAlignment('right');
						$cells->setValignment('center'); // vertical
						$cells->setBorder('thin', 'thin', 'thin', 'thin');
					});
					$sheet->cells('J' . ($fila) . ':J' . ($fila) . '', function ($cells) {
						$cells->setBorder('thin', 'thin', 'thin', 'thin');
					});
					$sheet->row($fila,
						array('CONDUCTOR: ' . $data["operator"], '', '', '', '', '', '', 'Sueldo S/', '', $data["sueldo"])
					);
					$fila++;
					$sheet->mergeCells('A' . ($fila) . ':D' . ($fila));
					$sheet->cells('A' . ($fila) . ':D' . ($fila) . '', function ($cells) {
						$cells->setAlignment('center'); //horizontal
						$cells->setValignment('center'); // vertical
						$cells->setBorder('none', 'thin', 'none', 'thin');
					});
					$sheet->mergeCells('H' . ($fila) . ':I' . ($fila));
					$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {
						$cells->setAlignment('right');
						$cells->setValignment('center'); // vertical
						$cells->setBorder('thin', 'thin', 'thin', 'thin');
					});
					$sheet->cells('J' . ($fila) . ':J' . ($fila) . '', function ($cells) {
						$cells->setBorder('thin', 'thin', 'thin', 'thin');
					});
					$sheet->row($fila,
						array('PLACA TRACTO: ' . $data["placa"], '', '', '', '', '', '', 'Total saldos de viaje S/', '', $data["liquidacion_viaje"])
					);
					$fila++;
					$sheet->mergeCells('A' . ($fila) . ':D' . ($fila));
					$sheet->cells('A' . ($fila) . ':D' . ($fila) . '', function ($cells) {
						$cells->setAlignment('center'); //horizontal
						$cells->setValignment('center'); // vertical
						$cells->setBorder('none', 'thin', 'thin', 'thin');
					});
					$sheet->mergeCells('H' . ($fila) . ':I' . ($fila));
					$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {
						$cells->setAlignment('right');
						$cells->setValignment('center'); // vertical
						$cells->setBorder('thin', 'thin', 'thin', 'thin');
					});
					$sheet->cells('J' . ($fila) . ':J' . ($fila) . '', function ($cells) {
						$cells->setBorder('thin', 'thin', 'thin', 'thin');
					});
					if (count($data['liquidation_discount']) > 0) {
						// $sheet->row($fila,
						// 	array('FECHA DE EMISIÓN: '.$data["liquidation"]["OFechaEmision"],'','','','','','','Otros Gastos S/.','',$data["gasto"])
						// );
						$discount = $data['liquidation_discount'];
						for ($k = 0; $k < count($discount); $k++) {
							if ($k == 0) {
								$sheet->row($fila,
									array('FECHA DE EMISIÓN: ' . $data["liquidation"]["OFechaEmision"], '', '', '', '', '', '', $discount[$k]['description'] . ' S/', '', $discount[$k]['total'])
								);
							} else {

								$fila++;
								$sheet->mergeCells('H' . ($fila) . ':I' . ($fila));
								$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {
									$cells->setAlignment('right');
									$cells->setValignment('center'); // vertical
									$cells->setBorder('thin', 'thin', 'thin', 'thin');
									// $cells->setBackground('#9ee365');
								});
								$sheet->cells('J' . ($fila) . ':J' . ($fila) . '', function ($cells) {
									$cells->setBorder('thin', 'thin', 'thin', 'thin');
									// $cells->setBackground('#9ee365');
								});
								// $sheet->cells('A'.($fila).':I'.($fila).'', function($cells) {$cells->setFontWeight('bold');});
								$sheet->row($fila,
									array('', '', '', '', '', '', '', $discount[$k]['description'] . ' S/', '', $discount[$k]['total'])
								);
							}
						} //end for
						$fila++;
						$sheet->mergeCells('H' . ($fila) . ':I' . ($fila));
						$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {
							$cells->setAlignment('right');
							$cells->setValignment('center'); // vertical
							$cells->setBorder('thin', 'thin', 'thin', 'thin');
							$cells->setBackground('#9ee365');
						});
						$sheet->cells('J' . ($fila) . ':J' . ($fila) . '', function ($cells) {
							$cells->setBorder('thin', 'thin', 'thin', 'thin');
							$cells->setBackground('#9ee365');
						});
						$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {$cells->setFontWeight('bold');});
						$sheet->row($fila,
							array('', '', '', '', '', '', '', 'Neto a pagar S/', '', $data["liquidation"]["OTotal"])
							// 	array('','','','','','','','Neto a pagar S/.','',$data["liquidation"]["OTotal"])
						);
					} else {
						$sheet->mergeCells('H' . ($fila) . ':I' . ($fila));
						$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {
							$cells->setAlignment('right');
							$cells->setValignment('center'); // vertical
							$cells->setBorder('thin', 'thin', 'thin', 'thin');
							$cells->setBackground('#9ee365');
						});
						$sheet->cells('J' . ($fila) . ':J' . ($fila) . '', function ($cells) {
							$cells->setBorder('thin', 'thin', 'thin', 'thin');
							$cells->setBackground('#9ee365');
						});
						$sheet->cells('H' . ($fila) . ':I' . ($fila) . '', function ($cells) {$cells->setFontWeight('bold');});
						$sheet->row($fila,
							array('FECHA DE EMISIÓN:  ' . count($data['liquidation_discount']) . $data["liquidation"]["OFechaEmision"], '', '', '', '', '', '', 'Neto a pagar S/', '', $data["liquidation"]["OTotal"])
						);
					}

					$fila++;
					$fila++;
					$sheet->cells('A' . ($fila) . ':M' . ($fila), function ($cells) {
						$cells->setFontWeight('bold');
						// $cells->setBorder('thin', 'thin', 'thin', 'thin');
					});
					$sheet->cells('A' . ($fila) . ':M' . ($fila), function ($cells) {
						$cells->setFontWeight('bold');
						// $cells->setBorder('thin', 'thin', 'thin', 'thin');
					});
					$sheet->cells('A' . ($fila) . ':A' . ($fila), function ($cells) {
						$cells->setBorder('thin', 'thin', 'thin', 'thin');
					});
					$sheet->cells('A' . ($fila) . ':A' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
					$sheet->cells('B' . ($fila) . ':B' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
					$sheet->cells('C' . ($fila) . ':C' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
					$sheet->cells('D' . ($fila) . ':D' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
					$sheet->cells('E' . ($fila) . ':E' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
					$sheet->cells('F' . ($fila) . ':F' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
					$sheet->cells('G' . ($fila) . ':G' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
					$sheet->cells('H' . ($fila) . ':H' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
					$sheet->cells('I' . ($fila) . ':I' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
					$sheet->cells('J' . ($fila) . ':J' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
					$sheet->cells('K' . ($fila) . ':K' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
					$sheet->cells('L' . ($fila) . ':L' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});
					$sheet->cells('M' . ($fila) . ':M' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin'); $cells->setBackground('#9ee365');});

					$sheet->row($fila,
						array('NRO', 'Consumidor', 'Nº LIQUID.', 'F. CARGA', 'TRANSP', 'TM (kg)', 'COMBUSTIBLE S/.', 'GL', 'COMBUSTIBLE Nº FACT.', 'DEPOSITO', 'BCP Nº OP', 'TOTAL GASTO', 'SALDO')
					);

					$fila++;

					$sheet->cells('A' . ($fila) . ':A' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('B' . ($fila) . ':B' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('C' . ($fila) . ':C' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('D' . ($fila) . ':D' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('E' . ($fila) . ':E' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('F' . ($fila) . ':F' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('G' . ($fila) . ':G' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('H' . ($fila) . ':H' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('I' . ($fila) . ':I' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('J' . ($fila) . ':J' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('K' . ($fila) . ':K' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('L' . ($fila) . ':L' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('M' . ($fila) . ':M' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					// $sheet->row($fila,
					// 	array($i+1,$consumidor,$data["liquidation_travel"][$i]["numero"],$data["liquidation_travel"][$i]["fecha_carga"],$transporte,$data["liquidation_travel"][$i]["peso"],$combustible,$data["liquidation_travel"][$i]["cantidad"],$num_combustible,$data["liquidation_travel"][$i]["deposito"],$num_operation,$data["liquidation_travel"][$i]["gasto"],$data["liquidation_travel"][$i]["total"])
					// );
					$fila++;

					//resumen de consulta
					$sheet->cells('A' . ($fila) . ':M' . ($fila) . '', function ($cells) {$cells->setFontWeight('bold');});
					$sheet->cells('I' . ($fila) . ':I' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('J' . ($fila) . ':J' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('K' . ($fila) . ':K' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('L' . ($fila) . ':L' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->cells('M' . ($fila) . ':M' . ($fila), function ($cells) {$cells->setBorder('thin', 'thin', 'thin', 'thin');});
					$sheet->row($fila,
						array('', '', '', '', '', '', '', '', 'TOTAL', $total_deposito, '', $total_gasto, $total_liquidation)
					);
					$fila++;
				});

			})->export('xls');
		}
	}

	public function send_message_to_customer(Request $request) {

		$message = $request->msg;
		$order_id = $request->order_id;

		$order = Order::with('customer')
			->find($order_id);

		$company = Company::first();

		$emailData = array(
			'name' => $company->name_company,
			'subject' => "Tiene un mensaje de {$company->name_company}",
			'email' => $company->email,
			'msg' => $message,
			'url' => url('/') . '/pdf-pedido/' . $order->uuid,
		);

		Mail::to($order->customer->email)->send(new SendMessageToCustomerFromOrderMail($emailData));

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha enviado el mensaje']);

	}
}
