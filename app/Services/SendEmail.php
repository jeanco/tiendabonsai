<?php

namespace App\Services;

use App\Company;
use App\Cost;
use App\Coupon;
use App\Customer;
use App\Entities\OrderHistory;
use Jenssegers\Date\Date;
use App\Mail\CustomerSuccessfulOrderToPayTemplate2;
use Mail;

class SendEmail
{
    	public function send_email_to_customer_from_order_history_to_pay($order_history_id, $company_email, $customer_email, $customer_name, $subject_customer = 'Has realizado un pedido', $subject_company = 'Se ha hecho un pedido') {

		$company_main = Company::whereMain(1)->first();

		$order_history = OrderHistory::with(['orders' => function ($query) {
			$query->with('customer');
			$query->with('products');
			$query->with('company');
		}])->with('account')->find($order_history_id);

		$array_to_return = [];

		foreach ($order_history->orders as $key => $order) {

			$date_formatted = Date::parse($order->created_at)->format('d \d\e\ F \d\e\l\ Y');
			$code = $order->id;
			$code_uuid = $order->uuid;
			$code_payment = $order->cash_payment_code;
			$total_payment = $order->total;

			$array_products_bought = [];

			foreach ($order->products as $k => $product) {

				$array_products_bought[] = array(
					'name' => $product->name,
					'price' => $product->pivot->price,
					'discount' => $product->pivot->discount,
					'quantity' => $product->pivot->quantity,
				);
			}

			$array_to_return[] = array(
				'company_name' => $order->company->name_company,
				'company_logo' => $order->company->logotype_thumb,
				'total' => $order->total,
				'products' => $array_products_bought,
			);
		}

		$data = array(
			'orders' => $array_to_return,
			'company_main_email' => $company_main->email,
			'payment_way' => ($order_history->account) ? $order_history->account->name : 'No tiene',
			'document_link' => url('/') . '/pdf-pedido/' . $code_uuid,
			'code' => $code,
			'code_payment' => $code_payment,
			'total_payment' => $total_payment,
			'logotype' => $company_main->logotype_thumb,
			'terms_and_conditions' => $company_main->terms_and_conditions,
			'date_formatted' => $date_formatted,
			'company_main_name' => $company_main->name_company,
			'email' => $company_main->email,
			'subject' => $subject_customer,
		);

		//Mail::to($customer_email)->send(new CustomerSuccessfulOrder($data));
		Mail::to($customer_email)->send(new CustomerSuccessfulOrderToPayTemplate2($data));

		$data = array(
			'orders' => $array_to_return,
			'company_main_email' => $customer_email,
			'payment_way' => ($order_history->account) ? $order_history->account->name : 'No tiene',
			'document_link' => url('/') . '/pdf-pedido/' . $code_uuid,
			'code' => $code,
			'code_payment' => $code_payment,
			'total_payment' => $total_payment,
			'logotype' => $company_main->logotype_thumb,
			'terms_and_conditions' => $company_main->terms_and_conditions,
			'date_formatted' => $date_formatted,
			'company_main_name' => $customer_name,
			'email' => $company_main->email,
			'subject' => $subject_company,
		);

		//Mail::to($company_main->email)->send(new CustomerSuccessfulOrder($data));
		Mail::to($company_main->email)->send(new CustomerSuccessfulOrderToPayTemplate2($data));
	}

}
