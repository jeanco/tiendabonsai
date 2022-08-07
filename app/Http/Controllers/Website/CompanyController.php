<?php

namespace App\Http\Controllers\Website;

use Auth;
use App\Role;
use App\User;
use Datatables;
use App\Company;
use App\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterCompanyRequest;
use App\Services\AssignRolePermissionsToTheUserService;

class CompanyController extends Controller {

	public function show_view() {
		$companies = Company::select(['name_company', 'id', 'logotype', 'slug_company'])
			->with(['products' => function ($query) {
				$query->select(['id', 'name', 'company_id']);
			}])
			->get();

		$path = $this->get_current_company_path();
		return view("{$path}.stores.index", compact('companies'));
	}

	public function datatable(Request $request) {

		$result = (new Company)->newQuery();

		$company_id = Auth::user()->company_id;

		$result = $result->where('id', '!=', $company_id)
			->select(['id', 'created_at', 'ruc', 'name_company', 'business_name', 'email', 'membership_date', 'representative', 'cel', 'status']);

		return DataTables::of($result)
			->addColumn('Actions', function ($model) {
				return "";
			})->make(true);
	}

	public function show_about_us_view() {
		$company = Company::whereMain(1)->with('photos')->first();
		$campaign = Campaign::orderBy('id', 'DESC')->first();
		$path = $this->get_current_company_path();
		return view("{$path}.about_as.index", compact('company', 'campaign'));
	}

	public function register(RegisterCompanyRequest $request) {

		$data = $request->except('cel');
		$data['title_slogan'] = '';
		$data['subtitle_slogan'] = '';
		$data['representative'] = '';
		$data['slug_company'] = str_slug($data['name_company']);
		$data['description_company'] = '';
		$data['terms_and_conditions'] = '';
		$data['work_description_company'] = '';
		$data['category_id'] = 0;
		$data['status'] = 0;

		$new_company = new Company();
		$new_company->fill($data);
		$new_company->save();

		$role = Role::whereName('administrador-empresario')
			->first();

		$new_user = new User();
		$new_user->username = $request->user_cel;
		$new_user->first_name = $data['user_first_name'];
		$new_user->last_name = $data['user_last_name'];
		$new_user->email = $data['user_email'];
		$new_user->cel = $request->user_cel;
		$new_user->activated = 1;
		$new_user->user_type = $role->id;
		$new_user->company_id = $new_company->id;
		$new_user->country_id = 1;
		$new_user->city_id = 1;
		$new_user->company_id = $new_company->id;

		$new_user->password = bcrypt($data['user_password']);
		$new_user->save();

		$new_user->roles()->attach($role->id);


		#Giving to the user the role's permissions
		$permission_assigner = new AssignRolePermissionsToTheUserService();

		$permission_assigner->execute($new_user->id, $role->id);

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado los registros con éxito!'], 201);

	}

}
