<?php

namespace App\Http\Controllers\Wings;

use App\Company;
use App\Service;
use App\Category;
use App\Testimony;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller {

	public function show_profile($slug) {

        $company = Company::whereMain(1)
        ->first();

        $last_autos_array = $this->last_autos();

        $services = Service::wherePublished(1)
            ->select(['id', 'name', 'slug'])
            ->get();

        $service = Service::whereSlug($slug)
            ->first();

        $testimonies = Testimony::wherePublished(1)
            ->get();

        return view('wings.services.index', compact('company', 'last_autos_array', 'service', 'services', 'testimonies'));
      }

      public function last_autos(){

        $now = Carbon::now();
        $from_five_months_ago = $now->subMonths(5);

        // $from_five_months_ago

        $last_autos_created = Category::whereSlug('autos')
            ->with(['products' => function($query) use ($from_five_months_ago){
                $query->where('created_at', '>=', $from_five_months_ago)
                    ->orderBy('created_at', 'DESC')
                    ->wherePublished(1)
                    ->with('photo');
            }])
            ->first();

        #Last autos created array;
        $last_autos_array = [];

        foreach ($last_autos_created->products as $key => $product) {

            $last_autos_array[] = array(
                'name' => $product->name,
                'price' => $product->price,
                'slug' => $product->slug,
                'photo' => ($product->photo != null) ? $product->photo->resource_thumb : 'https://dl.dropboxusercontent.com/s/sxk4d1qbue64nw1/item.png',
                'date_formatted' => ucfirst(Date::parse($product->created_at)->format('F'))." ".$product->created_at->format('d\,Y'),
            );
        }

        return $last_autos_array;
    }

}
