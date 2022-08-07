<?php

namespace App\Http\Controllers\Landing;

use App\Category;
use App\CategoryAttribute;
use App\Http\Controllers\Controller;
use App\PriceRange;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {
	public function getProducts(Request $request) {
		$category_slug = $request->category;
		$subcategory_slug = $request->subcategory;
		$attributes_id = $request->attrs;
		$price_range_id = $request->pricesRange;
		$orderedBy_type = $request->orderBy;
		$promotion_available = $request->promotion;

		$products = Product::where('published', 1)
			->whereHas('category', function ($query) {
				$query->where('published', 1);
			})
			->whereHas('subcategory', function ($query) {
				$query->where('published', 1);
			});

		if ($subcategory_slug) {
			$products = $products->whereHas('subcategory', function ($query) use ($subcategory_slug) {
				$query->where('slug', $subcategory_slug);
			});

			if ($attributes_id != '') {

				$categories_attribute = CategoryAttribute::whereHas('attributes', function ($query) use ($attributes_id) {
					$query->whereIn('id', $attributes_id);
				})
					->with(['attributes' => function ($query) use ($attributes_id) {
						$query->whereIn('id', $attributes_id);
					}])
					->get();

				foreach ($categories_attribute as $i => $category) {
					$attrs_array = [];
					foreach ($category->attributes as $u => $attribute) {
						$attrs_array[] = $attribute->id;
					}

					$products = $products->whereHas('attributes', function ($query) use ($attrs_array) {
						$query->whereIn('attributes.id', $attrs_array);
					});
				}
			}

			if ($price_range_id != 0) {
				$price_range = PriceRange::find($price_range_id);
				$price_max = $price_range->end;
				$price_min = $price_range->start;

				$products = $products->where('price', '>=', $price_min)
					->where('price', '<=', $price_max);
			}

			if ($promotion_available) {
				$products = $products->where('promotion_available', true);
			}

			switch ($orderedBy_type) {
			case 1:
				$products = $products->orderBy('outstanding', 'DESC');
				break;
			case 2:
				$products = $products->orderBy('price', 'ASC');
				break;
			case 3:
				$products = $products->orderBy('price', 'DESC');
				break;
			case 4:
				$products = $products->whereHas('attributes', function ($query) {
					$query->whereHas('category_attribute', function ($query) {
						$query->where('slug', 'marca');
					});
				});
				break;
			}
		} else if ($category_slug) {
			$products = $products->whereHas('category', function ($query) use ($category_slug) {
				$query->where('slug', $category_slug);
			});

			if ($attributes_id != '') {
				$categories_attribute = CategoryAttribute::whereHas('attributes', function ($query) use ($attributes_id) {
					$query->whereIn('id', $attributes_id);
				})
					->with(['attributes' => function ($query) use ($attributes_id) {
						$query->whereIn('id', $attributes_id);
					}])
					->get();

				foreach ($categories_attribute as $i => $category) {
					$attrs_array = [];
					foreach ($category->attributes as $u => $attribute) {
						$attrs_array[] = $attribute->id;
					}

					$products = $products->whereHas('attributes', function ($query) use ($attrs_array) {
						$query->whereIn('attributes.id', $attrs_array);
					});
				}
			}

			if ($price_range_id != 0) {
				$price_range = PriceRange::find($price_range_id);
				$price_max = $price_range->end;
				$price_min = $price_range->start;

				$products = $products->where('price', '>=', $price_min)
					->where('price', '<=', $price_max);
			}

			if ($promotion_available) {
				$products = $products->where('promotion_available', true);
			}

			switch ($orderedBy_type) {
			case 1:
				$products = $products->orderBy('outstanding', 'DESC');
				break;
			case 2:
				$products = $products->orderBy('price', 'ASC');
				break;
			case 3:
				$products = $products->orderBy('price', 'DESC');
				break;
			case 4:
				$products = $products->whereHas('attributes', function ($query) {
					$query->whereHas('category_attribute', function ($query) {
						$query->where('slug', 'marca');
					});
				});
				break;
			}
		} else {
			$products = (new Product)->newQuery();

			if ($attributes_id != '') {
				$categories_attribute = CategoryAttribute::whereHas('attributes', function ($query) use ($attributes_id) {
					$query->whereIn('id', $attributes_id);
				})
					->with(['attributes' => function ($query) use ($attributes_id) {
						$query->whereIn('id', $attributes_id);
					}])
					->get();

				foreach ($categories_attribute as $i => $category) {
					$attrs_array = [];
					foreach ($category->attributes as $u => $attribute) {
						$attrs_array[] = $attribute->id;
					}

					$products = $products->whereHas('attributes', function ($query) use ($attrs_array) {
						$query->whereIn('attributes.id', $attrs_array);
					});
				}
			}

			if ($price_range_id != 0) {
				$price_range = PriceRange::find($price_range_id);
				$price_max = $price_range->end;
				$price_min = $price_range->start;

				$products = $products->where('price', '>=', $price_min)
					->where('price', '<=', $price_max);
			}

			if ($promotion_available) {
				$products = $products->where('promotion_available', true);
			}

			switch ($orderedBy_type) {
			case 1:
				$products = $products->orderBy('outstanding', 'DESC');
				break;
			case 2:
				$products = $products->orderBy('price', 'ASC');
				break;
			case 3:
				$products = $products->orderBy('price', 'DESC');
				break;
			case 4:
				$products = $products->whereHas('attributes', function ($query) {
					$query->whereHas('category_attribute', function ($query) {
						$query->where('slug', 'marca');
					});
				});
				break;
			}
		}

		$products_paginated = $products->paginate(9);
		$products_paginated = $products_paginated->toArray();
		$products = $products_paginated['data'];

		if (!count($products)) {
			return response()->json(['title' => 'Sin resultados', 'message' => 'No se encontraron productos registrados', 'data' => []]);
		}

		$t = [];

		foreach ($products as $i => $product) {

			$img_of_this = $this->getRandomImage($product['id'], 2, null);

			$imageUrl = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
			$imageThumbUrl = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';

			if (count($img_of_this)) {
				$imageUrl = $img_of_this->resource;
				$imageThumbUrl = $img_of_this->resource_thumb;
			}

			$t[] = array(

				'id' => $product['id'],
				'stock' => $product['stock'],
				'name' => $product['name'],
				'slug' => $product['slug'],
				'price' => (float) $product['price'],
				'imageUrl' => $imageUrl,
				'imageThumbUrl' => $imageThumbUrl,
				'promotion' => [
					'flag' => (boolean) $product['promotion_available'],
					'price' => (float) $product['price_promotion'],
					'imageUrl' => (count($product['promotion_label_image']) ? $product['promotion_label_image'] : ""),
					//'imageUrl' => (count($product['promotion_label_image']) ? $product['promotion_label_image'] : "https://dl.dropboxusercontent.com/s/e16exi10xl177u2/OFERTA.png?dl=0"),
				],
			);
		}

		$products_paginated['data'] = $t;
		return $products_paginated;
	}

	public function getSearchProducts(Request $request) {
		$text = $request->q;
		$arrayProducts = [];
		$products = Product::where('name', 'like', "%$text%")
			->where('published', 1)
			->orderBy('id', 'DESC')
			->take(10)
			->get();

		if (!count($products)) {
			return response()->json(['data' => $arrayProducts], 400);
		}

		foreach ($products as $i => $product) {
			$imgPrimary = $this->getOneRandomImage($product['id'], 2, null);
			$arrayProducts[] = array(
				'id' => $product['id'],
				'name' => $product['name'],
				'slug' => $product['slug'],
				'imageUrl' => (count($imgPrimary) ? $imgPrimary->resource : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'),
				'imageThumbUrl' => (count($imgPrimary) ? $imgPrimary->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'),
			);
		}

		return response()->json(['data' => $arrayProducts], 200);
	}

	public function getProductBySlug($productSlug) {
		$arrayProduct = [];

		$product = Product::where('slug', $productSlug)->first();

		if (count($product) == 0) {
			return response()->json(['item' => $arrayProduct], 400);
		}

		$arrayProduct['id'] = $product->id;
		$arrayProduct['categoryName'] = $product->category->name;
		$arrayProduct['categorySlug'] = $product->category->slug;
		$arrayProduct['subcategoryName'] = $product->subcategory->name;
		$arrayProduct['subcategorySlug'] = $product->subcategory->slug;
		$arrayProduct['itemName'] = $product->name;
		$arrayProduct['description'] = $product->description;
		$arrayProduct['features'] = $product->features;
		$arrayProduct['dataSheet'] = $product->pdf;
		//$arrayProduct['features'] = ($product->features ? $product->features : "Por el momento no se publicaron características para este producto.");
		$arrayProduct['specifications'] = $product->specifications;
		//$arrayProduct['pdfUrl'] = ($product->pdf != "") ? $product->pdf : "";
		$arrayProduct['price'] = (float) $product->price;
		$arrayProduct['slug'] = $product->slug;
		$arrayProduct['stock'] = $product->stock;
		$arrayProduct['video'] = "";
		if ($product->video != "") {
			$arrayVideo = explode("=", $product->video);
			$videoId = array_pop($arrayVideo);
			$arrayProduct['video'] = $videoId;
		}
		$arrayProduct['promotion']['flag'] = (boolean) $product->promotion_available;
		$arrayProduct['promotion']['percentage'] = (boolean) $product->promotion_percentage;
		$arrayProduct['promotion']['price'] = (float) $product->price_promotion;
		$arrayProduct['promotion']['imageUrl'] = (count($product->promotion_label_image) ? $product->promotion_label_image : "");
		//$arrayProduct['promotion']['imageUrl'] = (count($product->promotion_label_image) ? $product->promotion_label_image : "https://dl.dropboxusercontent.com/s/e16exi10xl177u2/OFERTA.png?dl=0");

		$productImages = DB::table('contents')
			->select('id', 'resource', 'resource_thumb')
			->where('model_id', $product->id)
			->where('deleted_at', '=', null)
			->where('model_type', 2)
			->where('type', 1)
			->get();

		if (count($productImages)) {
			foreach ($productImages as $u => $image) {
				$arrayProduct['images'][$u]['id'] = $image->id;
				$arrayProduct['images'][$u]['urlThumb'] = $image->resource_thumb;
				$arrayProduct['images'][$u]['url'] = $image->resource;
			}
		} else {
			$arrayProduct['images'][0]['id'] = 0;
			$arrayProduct['images'][0]['imageThumbUrl'] = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
			$arrayProduct['images'][0]['imageUrl'] = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
		}
		return response()->json(['data' => $arrayProduct], 200);
	}

	public function getRelatedProductBySlug($productSlug) {
		$interests = [];

		$product = Product::where('slug', $productSlug)->first();

		if (count($product) == 0) {
			return response()->json(['data' => $interests], 400);
		}

		$products = Product::where('subcategory_id', $product->subcategory_id)
			->where('published', 1)
			->where('id', '!=', $product->id)
			->get();

		foreach ($products as $y => $product) {

			$img_of_this = $this->getRandomImage($product['id'], 2, null);

			$imageUrl = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
			$imageThumbUrl = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';

			if (count($img_of_this)) {
				$imageUrl = $img_of_this->resource;
				$imageThumbUrl = $img_of_this->resource_thumb;
			}

			$interests[$y]['slug'] = $product->slug;
			$interests[$y]['name'] = $product->name;
			$interests[$y]['stock'] = $product->stock;
			$imgPrimary = $this->getOneRandomImage($product->id, 2, null);
			$interests[$y]['imageUrl'] = $imageUrl;
			$interests[$y]['imageThumbUrl'] = $imageThumbUrl;
			$interests[$y]['price'] = (float) $product->price;
			$interests[$y]['promotion']['flag'] = (boolean) $product->promotion_available;
			$interests[$y]['promotion']['price'] = (float) $product->price_promotion;
			$interests[$y]['promotion']['imageUrl'] = (count($product->promotion_label_image) ? $product->promotion_label_image : "");
			//$interests[$y]['promotion']['imageUrl'] = (count($product->promotion_label_image) ? $product->promotion_label_image : "https://dl.dropboxusercontent.com/s/e16exi10xl177u2/OFERTA.png?dl=0");
		}
		return response()->json(['data' => $interests], 200);
	}

	public function getCart(Request $request) {
		$products_id = $request->q;

		$t = [];

		foreach ($products_id as $key => $product_id) {

			$product = Product::where('published', 1)
				->where('stock', '!=', 0)
				->with('random_image')
				->find($product_id);

			if (count($product)) {
				$promotion = array(
					'flag' => (boolean) $product->promotion_available,
					'price' => (float) $product->price_promotion,
					'imageUrl' => $product->promotion_label_image,
				);

				$t[] = array(

					'itemId' => (int) $product->id,
					'stock' => (int) $product->stock,
					'name' => $product->name,
					'slug' => $product->slug,
					'imageUrl' => ($product->random_image) ? $product->random_image->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png',
					'price' => (float) $product->price,
					'promotion' => $promotion,
				);
			}
		}

		return ['data' => $t];
	}

	public function getOutstanding() {
		// $lines = \Category::where('status', \Category::STATUS_PUBLISH)
		//   ->with(['firstThreeComment'])
		//   ->get()
		//   ->map(function ($category) {
		//     $category->firstThreeComment = $category->firstThreeComment->take(3);
		//     return $category;
		//   });

		$categories_with_products = Category::whereHas('products', function ($query) {
			$query->where('published', 1);
			$query->where('outstanding', true);
		})
			->with(['products' => function ($query) {
				$query->where('published', 1);
				$query->where('outstanding', true);
				$query->orderBy('id', 'DESC');
				$query->with('random_image');
			}])
			->get();

		$t = [];

		foreach ($categories_with_products as $u => $category) {
			$items = [];

			foreach ($category->products as $i => $product) {

				if ($i <= 5) {
					$imageUrl = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';
					$imageThumbUrl = 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png';

					if ($product->random_image) {
						$imageUrl = $product->random_image->resource;
						$imageThumbUrl = $product->random_image->resource_thumb;
					}

					$items[] = array(
						'id' => (int) $product->id,
						'imageUrl' => $imageUrl,
						'imageThumbUrl' => $imageThumbUrl,
						'name' => $product->name,
						'stock' => $product->stock,
						'slug' => $product->slug,
						'price' => (float) $product->price,
						'promotion' => array(
							'flag' => (boolean) $product->promotion_available,
							'price' => (float) $product->price_promotion,
							'imageUrl' => (count($product->promotion_label_image) ? $product->promotion_label_image : ''),
							//'imageUrl' => (count($product->promotion_label_image) ? $product->promotion_label_image : 'https://dl.dropboxusercontent.com/s/e16exi10xl177u2/OFERTA.png?dl=0'),
						),
					);

				} else {
					break;
				}
			}

			$t[] = array(
				'name' => $category->name,
				'description' => $category->content,
				'iconUrl' => $category->icon,
				'items' => $items,
			);
		}

		return ['data' => $t];
	}

	public function getOffers(Request $request) {
		$wide = $request->screen;
		//650< = 1

		$products = Product::where('published', 1)
			->where('promotion_available', true)
			->where('outstanding_promotion', true)
			->orderBy('updated_at', 'DESC')
			->take(10)
			->get();

		$t = [];
		$arrayBlock = [];

		foreach ($products as $i => $product) {
			$arrayBlock[] = array(
				'offerTitle' => $product->promotion_title,
				'itemSlug' => $product->slug,
				'imageUrl' => (count($product->promotion_image) ? $product->promotion_image : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'),
				'imageThumbUrl' => (count($product->promotion_image_thumb) ? $product->promotion_image_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png'),
			);
		}
		// array_chunck. Divide el array en grupos de 5 elementos
		if ($wide < 768) {
			$t = array_chunk($arrayBlock, 1);
		} else {
			$t = array_chunk($arrayBlock, 5);
		}

		return ['data' => $t];
	}

}
