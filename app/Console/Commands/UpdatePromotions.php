<?php

namespace App\Console\Commands;

use App\Product;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdatePromotions extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'update:promotions';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Update  product promotions -> at every midnight';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {

		$today = Carbon::now();

		$products_promoted = Product::wherePromotionAvailable(1)
			->whereDate('promotion_end_at', '<', $today)
			->get();

		foreach ($products_promoted as $key => $product) {

			if ($product->promotion_config == 1) {
				$product->promotion_available = 0;
				$product->show_promotion_timer = true;
				$product->save();
			}

			if ($product->promotion_config == 2) {
				$product->show_promotion_timer = 0;
				$product->save();
			}

		}

	}
}
