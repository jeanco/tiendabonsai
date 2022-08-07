<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\GalleryType;
use App\Http\Controllers\Controller;
use App\PermissionUser;
use App\Place;
use App\Subscription;
use Auth;
use Carbon\Carbon;
use Datatables;
use Excel;

class SubscriptionController extends Controller {
	public function getView() {

		$user = Auth::user();

		$subscriptions = Subscription::orderBy('id', 'DESC')->get();

		$companies = Company::select(['id', 'name_company'])
			->get();
		// $cities = City::all();
		// $roles = Role::whereActivated(1)->get();

		#Permissions
		$user_id = $user->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->get();

		$permissions_array = [];

		foreach ($permissions_user as $key => $permission_user) {

			if ($permission_user->permission == null) {
				return $permission_user;
			}

			$permissions_array[] = $permission_user->permission->name;
		}

		$gallery_types = GalleryType::all();
		$places = Place::all();
		return view('admin.routers.subscriptions', ['subscriptions' => $subscriptions, 'companies' => $companies, 'permissions_array' => $permissions_array, 'gallery_types' => $gallery_types, 'places' => $places]);
	}

	public function getExcel() {
		$subscriptions = Subscription::orderBy('id', 'DESC')->get();

		$dataFormatted = [];

		foreach ($subscriptions as $i => $subscription) {
			$dataFormatted[] = array(
				'id' => $subscription->id,
				'date' => $subscription->created_at->format('d-m-Y'),
				'hour' => $subscription->created_at->format('H:s'),
				'name' => $subscription->name,
				'email' => $subscription->email,
				'cellphone' => $subscription->cellphone,
			);
		}

		$currentDate = Carbon::now()->format('d-m-Y');
		$excelName = "Lista de suscritos {$currentDate}";

		Excel::create($excelName, function ($excel) use ($dataFormatted) {
			$excel->sheet('data', function ($sheet) use ($dataFormatted) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray(["ID", "Fecha", "Hora", "Nombre", "Correo Eléctronico", "Celular"]);

				foreach ($dataFormatted as $key => $subscription) {
					$sheet->row($key + 2, $subscription);
				}

			});
		})->export('xls');
	}

	public function datatable() {

		$result = (new Subscription)->newQuery();

		$result = $result
			->select(['id', 'code', 'email', 'cellphone', 'name'])->orderBy('id','DESC');

		return DataTables::of($result)
			->addColumn('Actions', function ($model) {
				return "actions";
			})->make(true);
	}
}
