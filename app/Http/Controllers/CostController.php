<?php

namespace App\Http\Controllers;

use App\Cost;
use App\District;
use App\Http\Requests\CostSaveRequest;
use App\Province;
use DB;

//use App\Http\Requests\PlaceRequest;
//use App\Http\Requests\PlaceUpdateRequest;

class CostController extends Controller {

	public function show($id) {

		$cost = Cost::find($id);

		$arr_cities_id = [];
		$arr_provinces_id = [];
		$arr_districts_id = [];

		if (!$cost->all_cities) {
			$arr_cities_id = DB::table('cost_district')
				->where('cost_id', $id)
				->pluck('city_id')
				->toArray();

			$arr_cities_id = array_unique($arr_cities_id);
		}

		if (!$cost->all_provinces) {
			$arr_provinces_id = DB::table('cost_district')
				->where('cost_id', $id)
				->pluck('province_id')
				->toArray();

			$arr_provinces_id = array_unique($arr_provinces_id);
		}

		if (!$cost->all_districts) {
			$arr_districts_id = DB::table('cost_district')
				->where('cost_id', $id)
				->pluck('district_id')
				->toArray();

			$arr_districts_id = array_unique($arr_districts_id);
		}

		$arr_subcategories = [];

		$arr_subcategories = DB::table('cost_subcategory')
			->where('cost_id', $id)
			->pluck('subcategory_id')
			->toArray();

		return ['cost' => $cost, 'cities' => $arr_cities_id, 'provinces' => $arr_provinces_id, 'districts' => $arr_districts_id, 'subcategories' => $arr_subcategories];
	}

	public function index_by_logistic($logistic_id) {

		$costs = Cost::whereLogisticId($logistic_id)
			->get();

		return $costs;
	}

	public function store(CostSaveRequest $request) {

		$data = $request->all();

		#Validate;
		$passer = $this->validate_cost($request->country_id, $request->cities, $request->provinces, $request->districts, null, $request->subcategories);

		if (!$passer['response']) {
			return response()->json(['title' => 'Advertencia', 'message' => $passer['message'], 'type' => 'second_validation'], 400);
		}

		$cost = new Cost();

		$cost->fill($data);
		$cost->save();

		if ($request->cities == "true") {
			#todos
			$cost->all_cities = true;
		}

		if ($request->provinces == "true") {
			#todos
			$cost->all_provinces = true;
		}

		if ($request->districts == "true") {
			#todos
			$cost->all_districts = true;

			#What districts i should save
			if ($request->provinces == "true") {
				#in base of cities
				if ($request->cities == "true") {
					$arr_districts = District::whereCountryId($request->country_id)
						->pluck('id');
				} else {
					#districs in base of cities
					$arr_cities = explode(',', $request->cities);
					$arr_districts = District::whereIn('city_id', $arr_cities)
						->pluck('id');
				}

			} else {
				#districs in base of provinces
				$arr_provinces = explode(',', $request->provinces);
				$arr_districts = District::whereIn('province_id', $arr_provinces)
					->pluck('id');
			}
		} else {
			$arr_districts = explode(',', $request->districts);
		}

		foreach ($arr_districts as $key => $district_id) {

			$district = District::with('province')->find($district_id);

			$cost->districts()->attach($district_id, ['city_id' => $district->province->city_id, 'province_id' => $district->province_id]);
		}

		if ($request->subcategories) {
			$arr_subcategories = explode(',', $request->subcategories);
			$cost->subcategories()->sync($arr_subcategories);
		}

		$cost->save();

		return response()->json(['title' => '', 'message' => 'Se ha creado'], 201);
	}

	function validate_cost($country_id, $cities, $provinces, $districts, $cost_id = null, $subcategories) {
		if ($districts == "true") {
			if ($provinces == "true") {
				#in base of cities
				if ($cities == "true") {
					$arr_districts = District::whereCountryId($country_id)
						->pluck('id');
				} else {
					#districs in base of cities
					$arr_cities = explode(',', $cities);
					$arr_districts = District::whereIn('city_id', $arr_cities)
						->pluck('id');
				}
			} else {
				$arr_provinces = explode(',', $provinces);
				$arr_districts = District::whereIn('province_id', $arr_provinces)
					->pluck('id');
			}
		} else {
			$arr_districts = explode(',', $districts);
		}

		$records = DB::table('cost_district')
			->whereIn('district_id', $arr_districts)
			->where('cost_id', '!=', $cost_id)
			->pluck('cost_id');
		//->get();

		if (count($records)) {

			#verify subcategory_id
			if ($subcategories) {

				$arr_subcategories = explode(',', $subcategories);

				$rows = DB::table('cost_subcategory')
					->whereIn('cost_id', $records)
					->whereIn('subcategory_id', $arr_subcategories)
					->where('cost_id', '!=', $cost_id)
					->get();

				if (count($rows)) {
					return ['message' => "Ya existe un registro de distrito - subcategory similar", 'response' => false];
				}
				return ['response' => true];
			}

			return ['message' => "Ya existe un registro de distrito similar", 'response' => false];
		}

		return ['response' => true];
	}

	public function update($id, CostSaveRequest $request) {

		$data = $request->all();
		#Validate;
		$passer = $this->validate_cost($request->country_id, $request->cities, $request->provinces, $request->districts, $id, $request->subcategories);

		if (!$passer['response']) {
			return response()->json(['title' => 'Advertencia', 'message' => $passer['message'], 'type' => 'second_validation'], 400);
		}

		$cost = Cost::find($id);

		$cost->fill($data);
		$cost->all_cities = false;
		$cost->all_provinces = false;
		$cost->all_districts = false;

		$cost->save();

		#Dettaching;
		$cost->districts()->detach();

		if ($request->cities == "true") {
			#todos
			$cost->all_cities = true;
		}

		if ($request->provinces == "true") {
			#todos
			$cost->all_provinces = true;
		}

		if ($request->districts == "true") {
			#todos
			$cost->all_districts = true;

			#What districts i should save
			if ($request->provinces == "true") {
				#in base of cities
				if ($request->cities == "true") {
					$arr_districts = District::whereCountryId($request->country_id)
						->pluck('id');
				} else {
					#districs in base of cities
					$arr_cities = explode(',', $request->cities);
					$arr_districts = District::whereIn('city_id', $arr_cities)
						->pluck('id');
				}

			} else {
				#districs in base of provinces
				$arr_provinces = explode(',', $request->provinces);
				$arr_districts = District::whereIn('province_id', $arr_provinces)
					->pluck('id');
			}
		} else {
			$arr_districts = explode(',', $request->districts);
		}

		foreach ($arr_districts as $key => $district_id) {

			$district = District::with('province')->find($district_id);

			$cost->districts()->attach($district_id, ['city_id' => $district->province->city_id, 'province_id' => $district->province_id]);
		}

		if ($request->subcategories) {
			$arr_subcategories = explode(',', $request->subcategories);
			$cost->subcategories()->sync($arr_subcategories);
		}

		$cost->save();

		return response()->json(['title' => '', 'message' => 'Se ha actualizado'], 200);
	}

	public function delete($id) {

		$cost = Cost::find($id);
		$cost->districts()->detach();
		$cost->subcategories()->detach();
		$cost->delete();
		return response()->json(['title' => '', 'message' => 'Se ha eliminado.'], 200);

	}

}
