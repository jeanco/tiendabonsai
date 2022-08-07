<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Uploaders\ImageUploader;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PromotionProductController extends Controller {
	public function update($id, Request $request) {
		$product = Product::find($id);

		$product->promotion_title = $request->promotion_title;
		$product->promotion_available = $request->promotion_available;
		$product->outstanding_promotion = $request->promotion_outstanding;
		$product->price_promotion = $request->price_promotion;
		$product->promotion_percentage = ($request->promotion_percentage) ? $request->promotion_percentage : 0;
		$product->promotion_end_at = Carbon::createFromFormat('d/m/Y', $request->promotion_end_at)->format('Y-m-d');
		$product->promotion_discount_type = $request->promotion_discount_type;
		$product->promotion_discount = $request->promotion_discount;
		//$product->promotion_config = $request->promotion_config;

		$functionUpload = new ImageUploader();

		if ($request->hasFile('promotion_image')) {

			$img = $request->promotion_image;

			$functionUpload->upload('/products/promotions', $img, 'png', 600);
			$functionUpload->delete($product->promotion_image_path, $product->promotion_image);
			$product->promotion_image = $functionUpload->getDropboxUrl();
			$product->promotion_image_path = $functionUpload->getDropboxPath();

			$functionUpload->upload('/products/promotions', $img, 'png', 300);
			$functionUpload->delete($product->promotion_image_thumb_path, $product->promotion_image_thumb);
			$product->promotion_image_thumb = $functionUpload->getDropboxUrl();
			$product->promotion_image_thumb_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('promotion_etiquette')) {

			$img = $request->promotion_etiquette;

			$functionUpload->upload('/products/promotions', $img, 'png', 150);

			$product->promotion_label_image = $functionUpload->getDropboxUrl();
			$product->promotion_label_image_path = $functionUpload->getDropboxPath();
		}

		$product->save();

		// if ($request->promotion_config == 2) {
		// 	$product->show_promotion_timer = false;
		// 	$product->save();
		// }

		if ($product->promotion_available) {
			$product->promotion_config = $request->promotion_config;

			if ($request->promotion_config == 2) {
				//$product->show_promotion_timer = false;
				//$product->save();
			} else {
				//$product->show_promotion_timer = true;
			}

		} else {
			$product->show_promotion_timer = true;
			$product->promotion_config = 1;
		}

		$product->save();

		return;
	}

	public function update_transfer_price($id, Request $request)
	{
		$data = $request->except('transfer_etiquette', 'transfer_end_at');

		$product = Product::find($id);
		$product->fill($data);

		if ($request->transfer_end_at) {
			$product->transfer_end_at = Carbon::createFromFormat('d/m/Y', $request->transfer_end_at)->format('Y-m-d');
		}

		$product->save;

		$functionUpload = new ImageUploader();

		if ($request->hasFile('transfer_etiquette')) {

			$img = $request->transfer_etiquette;

			$functionUpload->upload('/products/transfer-price', $img, 'png', 150);

			$product->transfer_label_image = $functionUpload->getDropboxUrl();
			$product->transfer_label_image_path = $functionUpload->getDropboxPath();
		}

		$product->save();
		return;

	}
}
