<?php

namespace App\Http\Controllers;

use DB;
use App\Campaign;
use App\City;
use App\Company;
use App\Content;
use App\Country;
use App\CouponType;
use App\GalleryType;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\VideoRequest;
use App\PermissionUser;
use App\Place;
use App\Product;
use App\Project;
use App\Role;
use App\Subcategory;
use App\TransportCompany;
use App\Uploaders\ImageUploader;
use App\User;
use App\Value;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CompaniesController extends Controller {

	public function work_with_us_view() {
		return view('antofagasta.join_us.index');
	}

	public function entrust_us_your_property() {
		return view('antofagasta.trust_us.index');
	}

	public function show($company_id) {
		$company = Company::find($company_id);
		return $company;
	}

	public function getViewCompany() {
		$user_logged = Auth::user();

		$user = User::with('company')
			->with(['roles' => function ($query) {
				$query->whereIn('roles.name', ['super-administrador']);
			}])
			->with(['roles_v2' => function ($query) {
				$query->whereIn('roles.name', ['administrador-empresario']);
			}])
			->find($user_logged->id);

		$companies = (new Company)->newQuery();

		if ($user->company->main == 1) {

		} else {
			$companies = $companies->where('id', $user->company_id);
		}

		$companies = $companies->get();

		$imagesCompany = Content::where('model_type', 1)->where('type', 1)->orderBy('id', 'DESC')->get();

		$cities = City::all();

		$roles = Role::whereActivated(1)
			->select(['id', 'display_name as name']);

		if (!count($user->roles)) {
			$roles = $roles->where('name', '!=', 'super-administrador');
		}

		if (count($user->roles_v2)) {
			$roles = $roles->where('name', '!=', 'administrador');
		}

		$roles = $roles->get();

		#Permissions
		$user_id = $user->id;

		$permissions_user = PermissionUser::where('user_id', $user_id)
			->whereActivated(1)
			->with('permission')
			->whereHas('permission', function ($query) {
				$query->whereHas('category', function ($query) {
					$query->whereNotIn('slug', ['categorias-de-productos', 'crud-de-productos', 'edicion-de-productos']);
				});
			})
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
		$coupon_types = CouponType::all();
		$products = Product::wherePublished(1)
			->select(['id', 'name'])
			->get();

		$countries = Country::all();

		$transport_companies = TransportCompany::all();

		$subcategories = Subcategory::wherePublished(1)
			->get();

		$place_types = DB::table('place_types')
			->where('deleted_at', NULL)
			->get();

		$attribute_categories = DB::table('categories_attributes')
			->where('deleted_at', NULL)
			->get(['id', 'name']);

		return view('admin.routers.company.index', compact('imagesCompany', 'companies', 'cities', 'roles', 'permissions_array', 'gallery_types', 'places', 'coupon_types', 'products', 'transport_companies', 'countries', 'subcategories', 'place_types', 'attribute_categories'));
	}

	public function postCompany() {

	}

	public function postGalleryImagesProject(Request $request) {
		$img = $request->file[0];

		$functionUpload = new ImageUploader();
		$functionUpload->upload('/company/gallery', $img, 'png', 1026);

		$content = new Content();
		$content->content = "gallery images of company";
		$content->resource = $functionUpload->getDropboxUrl();
		$content->resource_path = $functionUpload->getDropboxPath();

		$functionUpload->upload('/company/gallery/thumbs', $img, 'png', 450);
		$content->resource_thumb = $functionUpload->getDropboxUrl();
		$content->resource_thumb_path = $functionUpload->getDropboxPath();
		$content->model_id = 0;
		$content->model_type = 7;
		$content->type = 1;
		$content->save();

		/*$images = [];
		$images[0] = $content;*/

		return $content;
	}

	public function putCompany(CompanyRequest $request) {
		try {
			$data = $request->all();
			$company = Company::find($data['company_id']);
			$company->fill($data);
			$company->slug_company = str_slug($request->name_company, "-");

			if ($request->hasFile('company_logo')) {
				$img = $request->file('company_logo');
				$functionUpload = new ImageUploader();
				$functionUpload->upload('/company', $img, 'png', 500);
				$functionUpload->delete($company->logotype_path, $company->logotype);

				$company->logotype = $functionUpload->getDropboxUrl();
				$company->logotype_path = $functionUpload->getDropboxPath();

				$functionUpload->upload('/company', $img, 'png', 300);
				$functionUpload->delete($company->logotype_thumb_path, $company->logotype_thumb);

				$company->logotype_thumb = $functionUpload->getDropboxUrl();
				$company->logotype_thumb_path = $functionUpload->getDropboxPath();
			}

			if ($request->hasFile('company_logo_white')) {
				$img = $request->file('company_logo_white');

				$functionUpload = new ImageUploader();
				$functionUpload->upload('/company', $img, 'png', 500);
				$functionUpload->delete($company->logotype_white_path, $company->logotype_white);

				$company->logotype_white = $functionUpload->getDropboxUrl();
				$company->logotype_white_path = $functionUpload->getDropboxPath();

				$functionUpload->upload('/company', $img, 'png', 300);
				$functionUpload->delete($company->logotype_white_thumb_path, $company->logotype_white_thumb);

				$company->logotype_white_thumb = $functionUpload->getDropboxUrl();
				$company->logotype_white_thumb_path = $functionUpload->getDropboxPath();
			}

			$company->save();





		$env_path = null;
		$key = 'APP_PUBLISHED';
		$value = $company->status;
	
		$value = preg_replace('/\s+/', '', $value); //replace special ch
		$key = strtoupper($key); //force upper for security
		$env = file_get_contents(isset($env_path) ? $env_path : base_path('.env')); //fet .env file
		$env = str_replace("$key=" . env($key), "$key=" . $value, $env); //replace value
		/** Save file eith new content */
		$env = file_put_contents(isset($env_path) ? $env_path : base_path('.env'), $env);




			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);

		}
	}

	public function deleteCompanyVideo(Request $request) {
		try {
			$content = Content::find($request->videoId);
			$content->delete();

			$videos = Content::where('model_type', 1)->where('type', 2)->get();

			return response()->json(['success' => true, 'videos' => $videos], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}

	}

	public function putCompanySlogan(Request $request) {
		try {
			$data = $request->all();
			$company = Company::first();
			$company->fill($data);
			$company->save();
			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function getCompanyToEdit() {

		$user = Auth::user();
		$company_id = $user->company_id;

		$company = Company::find($company_id);
		$company->membership_date_formatted = Carbon::parse($company->membership_date)->format('d/m/Y');

		$videos = Content::whereModelId($company_id)->where('model_type', 1)->where('type', 2)->orderBy('id', 'DESC')->get();
		return response()->json(['company' => $company, 'videos' => $videos], 200);
	}

	public function postCompanyVideo(VideoRequest $request) {
		try {
			$content = new Content();
			$content->content = $request->company_video_name;
			$content->resource = $request->company_video_link;
			$content->resource_path = "--";
			$content->resource_thumb = "--";
			$content->resource_thumb_path = "--";
			$content->model_id = 1;
			$content->model_type = 1;
			$content->type = 2;
			$content->save();

			$videos = Content::where('model_type', 1)->where('type', 2)->orderBy('id', 'DESC')->get();

			return response()->json(['success' => true, 'videos' => $videos], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function putCompanyVideo(VideoRequest $request) {
		try {
			$content = Content::find($request->company_video_id);
			$content->content = $request->company_video_name;
			$content->resource = $request->company_video_link;
			$content->save();

			$videos = Content::where('model_type', 1)->where('type', 2)->orderBy('id', 'DESC')->get();
			return response()->json(['success' => true, 'videos' => $videos], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);

		}

	}

	public function updateTemplate($id) {

		$projects = Project::where('status', 1)->first();

		$projects->status = 0;

		$projects->save();
		//return($projects);
		$projects = Project::find($id);
		$projects->status = 1;
		$projects->save();

		$env_path = null;
		$key = 'APP_LANDING';
		$value = $projects->path;

		$value = preg_replace('/\s+/', '', $value); //replace special ch
		$key = strtoupper($key); //force upper for security
		$env = file_get_contents(isset($env_path) ? $env_path : base_path('.env')); //fet .env file
		$env = str_replace("$key=" . env($key), "$key=" . $value, $env); //replace value
		/** Save file eith new content */
		$env = file_put_contents(isset($env_path) ? $env_path : base_path('.env'), $env);

		//return("$id");

	}

	public function postCoverImages(Request $request) {
		$img = $request->file[0];
		// $result  = $this->checkImageSize($Img,1350,350);
		// if (!$result) {
		//   return 98;
		// }
		$functionUpload = new ImageUploader();
		$functionUpload->upload('/company/dropzone', $img, 'png', 1350);

		$content = new Content();
		$content->content = "Img dropzone company";
		$content->resource = $functionUpload->getDropboxUrl();
		$content->resource_path = $functionUpload->getDropboxPath();

		$functionUpload->upload('/company/dropzone/thumbs', $img, 'png', 450);
		$content->resource_thumb = $functionUpload->getDropboxUrl();
		$content->resource_thumb_path = $functionUpload->getDropboxPath();
		$content->model_id = 1;
		$content->model_type = 1;
		$content->type = 1;
		$content->save();

		return $content;
	}

	/* Rutas FrontEnd*/
	public function getCompany() {
		$company = Company::first();

		if (count($company) == 0) {
			return [];
		}

		$arrayCompany = [];
		$arrayCompany['name'] = $company->name_company;
		$arrayCompany['legalName'] = $company->legal_name;
		//$arrayCompany['titleSlogan'] = $company->title_slogan;
		//$arrayCompany['subtitleSlogan'] = $company->subtitle_slogan;
		$arrayCompany['logoUrl'] = $company->logotype;
		$arrayCompany['whiteLogoUrl'] = $company->logotype_white;
		$arrayCompany['facebookPage'] = $company->facebook;
		$arrayCompany['twitterPage'] = $company->twitter;
		$arrayCompany['googlePage'] = $company->google;
		$arrayCompany['youtubePage'] = $company->youtube;
		$arrayCompany['instagramPage'] = $company->instagram;
		$arrayCompany['email'] = $company->email;
		$arrayCompany['address'] = $company->address;
		//$arrayCompany['city'] = $company->city;
		//$arrayCompany['country'] = $company->country;
		$arrayCompany['cellphone'] = $company->cel;
		$arrayCompany['schedule'] = 'Todos los días desde las 09:00 a 21:00 horas';
		$arrayCompany['covers'] = [];

		/*
			    $coverImages = Content::where('model_type', 1)->whereType(1)->get();
			    $arrayImages = [];

			    foreach ($coverImages as $u => $image) {
			    $arrayImages[] = array(
			    'imageUrl' => $image->resource,
			    'imageThumbUrl' => $image->resource_thumb,
			    'isBlank' => true,
			    'link' => 'http://www.noveltie.la',
			    'title' => 'Imagen de portada de Kamasa',
			    );
			    }
		*/

		//Portadas del Home
		$coverImages = Campaign::where('published', 1)->get();
		$arrayImages = [];

		foreach ($coverImages as $i => $campaign) {
			$arrayImages[] = array(
				// 'backgroundUrl' => $campaign->cover,
				// 'backgroundUrlThumb' => $campaign->cover_thumb,
				'title' => $campaign->title,
				//'subtitle' => $campaign->subtitle,
				//'content' => $campaign->content,
				'imageUrl' => $campaign->image, //Imagen Desktop
				'imageUrlThumb' => $campaign->image_thumb, //Imagen Celular
				//'linkText' => $campaign->link_text,
				'linkUrl' => ($campaign->link ? $campaign->link : "#"),
				//'isBlank' => (boolean) $campaign->is_blank,
				'isBlank' => true,
			);
		}
		$arrayCompany['covers'] = $arrayImages;

		return response()->json(['data' => $arrayCompany], 200);
	}

	public function getAboutCompany() {
		$company = Company::first();
		$arrayCompany = [];
		if (count($company) == 0) {
			return response()->json(['data' => $arrayCompany], 200);
		}

		$arrayCompany['cover'] = [
			'title' => 'Kamasa <br>¡mejora tu casa!',
			'summary' => 'Brindando gran variedad de productos de las mejores marcas a los mejores precios, como son: LG, Daewo, Indurama, Electrolux, Samsung, Sony, Philips, entre otros.',
			'backgroundUrl' => 'https://dl.dropboxusercontent.com/s/yqf1adc9h1umnni/imgnos1.jpg?dl=0',
			'backgroundUrlThumb' => 'https://dl.dropboxusercontent.com/s/yqf1adc9h1umnni/imgnos1.jpg?dl=0',
		];
		$arrayCompany['aboutUs'] = [
			'description' => $company->description_company,
			'imageUrl' => 'https://dl.dropboxusercontent.com/s/63dkgfpxktsweh7/LG-appliances-isolated.png?dl=0',
			'backgroundUrl' => 'https://dl.dropboxusercontent.com/s/adzp06t2hjjsql1/img_mejora.jpg?dl=0',
		];
		$arrayCompany['jobsDescription'] = $company->work_description_company;
		//$arrayCompany['proposalValue'] = $company->proposal_value;
		$arrayCompany['vision'] = $company->vision;
		$arrayCompany['visionImageUrl'] = 'https://dl.dropboxusercontent.com/s/ya189q5ukaw6d6x/imgnos6.jpg?dl=0';
		$arrayCompany['mission'] = $company->mission;
		$arrayCompany['missionImageUrl'] = 'https://dl.dropboxusercontent.com/s/yu4b730cgejeur0/imgnos5.jpg?dl=0';
		$arrayCompany['firstHistory'] = [
			'title' => 'Donde comenzamos',
			'iconUrl' => '',
			'description' => 'Con la creación de la zona franca comercial de Tacna Zofra Tacna nace la primera tienda de electrodomésticos, es en junio de 1997 donde nace la idea de implementar una pequeña tienda de electrodomésticos en el interior del Centro Comercial Bolognesi. En un inicio fuimos distribuidores exclusivos de las marcas LG y AIWA, abasteciendo los diferentes centros comerciales de la Zofra Tacna, años más tarde pudimos notar que la demanda aumentaba y la necesidad del público en adquirir nuevos productos de diferentes marcas eran los pedidos y sugerencias que más se escuchaban; por tal motivo decidimos seguir invirtiendo en nuestro negocio con el único objetivo de brindar un mejor servicio con productos de calidad, de reconocidas marcas a nivel mundial. Posteriormente, notamos que nuestra pequeña tienda al interior del centro comercial Bolognesi ya no daba abasto para atender a nuestros clientes, motivo por el cual decidimos aperturar un nuevo local, uno mucho más amplio que pueda brindar una mejor atención y comodidad a nuestros clientes, esta se ubicaría en la avenida Coronel Mendoza, frente al centro comercial Bolognesi.',
			'imageUrl' => 'https://dl.dropboxusercontent.com/s/kyzatvz9nrmphw1/imgnos2.jpg?dl=0',
			'backgroundUrl' => 'https://dl.dropboxusercontent.com/s/zkuwqz23eiw3chu/imgnos3.jpg?dl=0',
		];
		$arrayCompany['secondHistory'] = [
			'title' => 'Seguimos Creciendo',
			'iconUrl' => '',
			'description' => 'Así nace Tiendas Kamasa con 5 trabajadores, una oficina administrativa y un vehículo para el traslado de los electrodomésticos a su domicilio sin recargo alguno, además contando con el respaldo, garantía y servicio técnico de grandes firmas como LG, SONY, SAMSUNG, entre otros. Logrando tener un stock variado de modelos y marcas para cada necesidad; mas adelante nuevas marcas formarían parte de nuestra cartera de proveedores como ELECTROLUX, INDURAMA Y DAEWOO. Un punto importante para nosotros es premiar y reconocer nuestros buenos clientes, motivo por el cual Tiendas Kamasa crea a lo largo de los doce meses del año, diferentes promociones y sorteos, implementando sistemas de créditos facilidades de pago y convenios institucionales, que fueron bien recibidos por los mismos clientes.

En el año 2009 Tiendas Kamasa paso a ser una empresa con mayor posicionamiento gracias a su nueva ubicación estratégica en el centro de la ciudad, cerca a otras empresas competidoras, que estimulan a Kamasa a mejorar continuamente. Actualmente Kamasa forma parte del Centro Comercial San Martin Plaza que reúne empresas de diversos rubros para presentar una mejor alternativa a la población tacneña y visitantes.',
			'imageUrl' => 'https://dl.dropboxusercontent.com/s/gncrilc94kacop8/imgnos4.jpg?dl=0',
		];

		//Location object
		//$arrayCompany['location']['lat'] = (float) $company->latitude;
		//$arrayCompany['location']['lng'] = (float) $company->longitude;

		//Getting values
		$values = Value::wherePublished(1)->get();
		$arrayCompany['values'] = [];
		$valuesArray = [];

		if (count($values)) {
			foreach ($values as $key => $value) {
				$valuesArray[] = array(
					'imageUrl' => $value->image_thumb,
					'name' => $value->title,
					'description' => $value->description,
				);
			}
			$arrayCompany['values'] = $valuesArray;
		}
		/*
			    $arrayCompany['videos'] = [];
			    $companyVideos = $this->getVideos(1, 1);

			    if (count($companyVideos)) {
			      foreach ($companyVideos as $i => $video) {
			        $arrayCompany['videos'][$i]['url'] = $video->resource;
			        $arrayCompany['videos'][$i]['title'] = $video->content;
			      }
			    }
		*/
		return response()->json(['data' => $arrayCompany], 200);
	}

	public function getContactPageData() {
		$company = Company::first();
		$arrayCompany = [];

		if (count($company) == 0) {
			return [];
		}

		$arrayCompany['info'] = '<p style="text-align: justify; ">Desde esta página puedes encontrar el número de teléfono de atención al cliente de kamasa en el que te atenderán para cualquier duda que tengas. También puedes ponernte en contacto con nosotros a través del formulario que ves a lado derecho si tienes algún problema en esta web. Porfavor ten en cuenta que desde este formulario no podemos atender consultas relativas al re-envío de facturas, presupuestos a minoristas, descuentos, altas como proveedores u ofertas laborales.</p><p style="text-align: justify;"><img src="https://dl.dropboxusercontent.com/s/k4ucglvkycldbsx/envelope.png?dl=0" style="width: 61px; height: 61px;"><br></p><p></p><div style="text-align: justify;">Servicio técnico o consultas de alguna compra :&nbsp;<span style="font-weight: 700;">atencionalcliente@kamasa.pe</span></div><div style="text-align: justify;">Para solicitar cotizaciones u otros :&nbsp;<span style="font-weight: 700;">ventas@kamasa.pe</span></div><div style="text-align: justify;">Información o contacto general :<span style="font-weight: 700;">&nbsp;info@kamasa.pe</span></div><div style="text-align: justify;">Área contable, envío de facturas electrónicas, otros :<span style="font-weight: 700;">&nbsp;contabilidad@kamasa.pe</span></div><p></p>';
		$arrayCompany['coverImageUrl'] = 'https://dl.dropboxusercontent.com/s/o8n2d74ji2wtal9/img_contacto.jpg?dl=0';

		$arrayCompany['phone'] = $company->phone;
		$arrayCompany['schedule'] = 'Todos los días desde las 09:00 a 21:00 horas';
		//Location object
		$arrayCompany['location']['latitude'] = (float) $company->latitude;
		$arrayCompany['location']['longitude'] = (float) $company->longitude;
		// $arrayCompany['cellphones'] = explode(',',$company->cel);
		// $arrayCompany['emails'] = explode(',',$company->email);

		return response()->json(['data' => $arrayCompany], 200);
	}

	public function getSupportPageData() {
		$arrayCompany = [];
		$arrayCompany['coverImageUrl'] = 'https://dl.dropboxusercontent.com/s/mkpd6vpgvy8eusd/img_soporte.jpg?dl=0';
		$arrayCompany['support']['title'] = 'Soporte Técnico Kamasa';
		$arrayCompany['support']['description'] = '<p dir="ltr" style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt; margin-left: 35.4pt;"><span style="vertical-align: baseline;">En Tiendas Kamasa nuestros productos cuentan con garantía y soporte técnico por 1 año el cual es otorgado por el fabricante según sus condiciones, después de transcurrido este tiempo, nosotros te asesoramos sobre la reparación de tu producto y te brindamos los costos. El periodo de garantía puede varias según el producto y sus características.</span></p><p dir="ltr" style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt; margin-left: 35.4pt;"><span style="vertical-align: baseline;"><br></span></p><p dir="ltr" style="line-height: 1.2; margin-top: 5pt; margin-bottom: 0pt; margin-left: 35.4pt;"><span style="vertical-align: baseline;"><b>Beneficios del Soporte Técnico:</b></span></p><ul style="margin-top:0pt;margin-bottom:0pt;"><li dir="ltr" style="list-style-type: disc; vertical-align: baseline; margin-left: 35.4pt;"><p dir="ltr" style="line-height: 1.2; margin-top: 5pt; margin-bottom: 0pt;"><span style="vertical-align: baseline;">Sin costo</span></p></li><li dir="ltr" style="list-style-type: disc; vertical-align: baseline; margin-left: 35.4pt;"><p dir="ltr" style="line-height: 1.2; margin-top: 5pt; margin-bottom: 0pt;"><span style="vertical-align: baseline;">Atención en menos de 48 horas</span></p></li><li dir="ltr" style="list-style-type: disc; vertical-align: baseline; margin-left: 35.4pt;"><p dir="ltr" style="line-height: 1.2; margin-top: 5pt; margin-bottom: 0pt;"><span style="vertical-align: baseline;">Te asesoramos en todo</span></p></li></ul><p dir="ltr" style="line-height: 1.2; margin-top: 5pt; margin-bottom: 0pt; margin-left: 35.4pt;"><span style="vertical-align: baseline;"><br></span></p><p dir="ltr" style="line-height: 1.2; margin-top: 5pt; margin-bottom: 0pt; margin-left: 35.4pt;"><span style="vertical-align: baseline;">La atención de servicio técnico se realiza en el domicilio del cliente, a excepción de pequeños electrodomésticos como licuadoras, extractoras, planchas, etc; y de televisores.</span></p><p dir="ltr" style="line-height: 1.2; margin-top: 5pt; margin-bottom: 0pt; margin-left: 35.4pt;"><span style="vertical-align: baseline;"><br></span>El técnico realiza la atención en el domicilio u oficina de los siguientes productos: Lavadoras, Lavasecas, Secadoras, Refrigeradoras, Exhibidoras, Congeladoras, Cocinas, Campanas extractoras, termas.</p><p dir="ltr" style="line-height: 1.2; margin-top: 5pt; margin-bottom: 0pt; margin-left: 35.4pt;"><br></p><p dir="ltr" style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt; margin-left: 35.4pt;"><span style="vertical-align: baseline;">Solicita atención para servicio técnico comunicándote con nosotros o si lo prefieres, puedes gestionar la garantía dire</span><span style="text-align: justify;">ctamente con la marca. En ambos casos es gratuito por el periodo de 1 año.</span></p><div><span style="background-color: transparent; font-family: Armata; font-size: 10pt; font-weight: 700; white-space: pre-wrap; text-align: justify;"><br></span></div>';
		$arrayCompany['support']['imageUrl'] = 'https://dl.dropboxusercontent.com/s/pbfhlhp8ndv4oq2/img_soporte_man.png?dl=0';

		$arrayCompany['callCenter']['title'] = 'Comunícate con la marca de tu producto';
		$arrayCompany['callCenter']['info'] = 'Comunícate al Call center de la marca para solicitar servicio técnico y la reparación de tu producto. Siempre con tu comprobante de pago a la mano y datos como teléfono y dirección donde se encuentra tu electrodoméstico.';
		$arrayCompany['callCenter']['brands'] = [
			[
				'name' => 'LG',
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/e5nc9jq2a36mff1/LG.png?dl=0',
				'address' => 'Av. Vigil N° 428',
				'callCenter' => '0-800-1-2424',
				'phone' => '052-241297',
			],
			[
				'name' => 'Electrolux',
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/zvg8897hx81izyq/ELECTROLUX.png?dl=0',
				'address' => 'Av. Vigil N° 428',
				'callCenter' => '',
				'phone' => '052-241297',
			],
			[
				'name' => 'Daewo',
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/71m0lfxuehbc4qb/DAEWOO.png?dl=0',
				'address' => 'Av. Vigil N° 428',
				'callCenter' => '',
				'phone' => '052-241297',
			],
			[
				'name' => 'Sole',
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/eo0e09axgz9pbdj/SOLE.png?dl=0',
				'address' => '',
				'callCenter' => '',
				'phone' => '',
			],
			[
				'name' => 'Indurama',
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/z5rniaxvptys83r/INDURAMA.png?dl=0',
				'address' => '',
				'callCenter' => '',
				'phone' => '',
			],
			[
				'name' => 'Mabe',
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/rlgxv24abmh2d63/logo_mabe.jpg?dl=0',
				'address' => '',
				'callCenter' => '',
				'phone' => '',
			],
			[
				'name' => 'Oster',
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/n3f4zcj67w4dmea/Oster.jpg?dl=0',
				'address' => 'Calle Piura N° 388',
				'callCenter' => '',
				'phone' => '952921455',
			],
			[
				'name' => 'Ilumi',
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/f5mw7xqs85na6h8/Ilumi.png?dl=0',
				'address' => '',
				'callCenter' => '',
				'phone' => '',
			],
			[
				'name' => 'Ika',
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/3dns7x9qvfh8n86/IKA.png?dl=0',
				'address' => 'Av. San Martín 331',
				'callCenter' => '052-427894',
				'phone' => '052-427894',
			],
		];
		$arrayCompany['services'] = [
			[
				'name' => 'Comunícate con nosotros',
				'backgroundColor' => '#fb1a3aff',
				'description' => '<ul style="margin-top:0pt;margin-bottom:0pt;"><ul style="margin-top:0pt;margin-bottom:0pt;"><li dir="ltr" style="list-style-type: disc; vertical-align: baseline;"><p dir="ltr" style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="vertical-align: baseline;">Llámanos con confianza al teléfono 052-427894 en el horario de lunes a viernes de 10 am a 1pm y de 4 pm a 7pm.</span></p></li></ul></ul><ul style="margin-top:0pt;margin-bottom:0pt;"><ul style="margin-top:0pt;margin-bottom:0pt;"><li dir="ltr" style="list-style-type: disc; vertical-align: baseline;"><p dir="ltr" style="line-height:1.2;margin-top:0pt;margin-bottom:0pt;"><span style="vertical-align: baseline;">Puedes enviarnos un correo a </span><span style="vertical-align: baseline;"><a href="mailto:atencionalcliente@kamasa.pe">atencionalcliente@kamasa.pe</a></span></p></li></ul></ul><ul style="margin-top:0pt;margin-bottom:0pt;"><ul style="margin-top:0pt;margin-bottom:0pt;"><li dir="ltr" style="list-style-type: disc; vertical-align: baseline;"><p dir="ltr" style="line-height: 1.2; margin-top: 0pt; margin-bottom: 0pt;"><span style="vertical-align: baseline;">Acércate a nuestro módulo de atención en: Av. San Martín 331 - Tacna</span></p></li></ul></ul>',
			],
			[
				'name' => 'Servicio Técnico Exclusivo',
				'backgroundColor' => '#ff8700ff',
				'description' => '<p dir="ltr" style="margin-top: 0pt; margin-bottom: 0pt; line-height: 1.2;"><span style="vertical-align: baseline;">Si tu producto requiere atención de servicio técnico, nosotros te brindamos un electrodoméstico temporal para que no tengas inconvenientes en tu rutina diaria mientras solucionan el problema con tu producto.</span></p><p dir="ltr" style="margin-top: 0pt; margin-bottom: 0pt; line-height: 1.2;"><span style="vertical-align: baseline;">Incluye la entrega y retiro de producto.</span></p><p dir="ltr" style="margin-top: 0pt; margin-bottom: 0pt; line-height: 1.2;"><span style="vertical-align: baseline;">Se debe adquirir al comprar tu electrodoméstico, y tiene una vigencia de 1 año. El costo es de S/ 49.90&nbsp;</span></p>',
			],
		];
		$arrayCompany['frequentQuestions'] = [
			[
				'question' => '¿Cómo compras en www.kamasa.pe?',
				'answer' => 'Ingresar al catálogo de productos, debes agregar al carrito, llenar el formulario con tus datos para realizar tu pedido.',
			],
			[
				'question' => '¿Qué productos encontrarás en www.kamasa.pe?',
				'answer' => 'Tiendas Kamasa es una empresa de origen tacneño, dedicada a la comercialización y venta directa de electrodomésticos, tales como línea blanca (refrigeradoras, lavadoras, cocinas, horno microondas etc.), línea marrón (televisores, reproductores de audio y video, etc.) y pequeños electrodomésticos (licuadoras, tostadoras, cafeteras, etc.).',
			],
			[
				'question' => '¿A qué lugares se hace envios?',
				'answer' => 'En todo Tacna Metropolitana.',
			],
		];

		return response()->json(['data' => $arrayCompany], 200);
	}

	public function getBoyfriendsClubPageData() {
		$arrayCompany = [];

		$arrayCompany['cover']['backgroundUrl'] = 'https://dl.dropboxusercontent.com/s/nfgeyx5qxugtqch/img_novios.jpg?dl=0';
		$arrayCompany['cover']['backgroundUrlThumb'] = 'https://dl.dropboxusercontent.com/s/nfgeyx5qxugtqch/img_novios.jpg?dl=0';
		$arrayCompany['cover']['title'] = '¿Estás planeando<br>tu boda?';
		$arrayCompany['cover']['subtitle'] = 'Entonces este programa es ideal para ti';
		$arrayCompany['about']['title'] = 'Club de Novios';
		$arrayCompany['about']['imageUrl'] = 'https://dl.dropboxusercontent.com/s/3qvn5ponxyb4vmw/sub.png?dl=0';
		$arrayCompany['about']['description'] = '<p style="text-align: center; "><span style="text-align: justify;">Tiendas Kamasa te da la Bienvenida a CLUB NOVIOS KAMASA, y te invita a formar parte de este programa que esta creado especialmente para parejas de novios próximos a casarse.</span></p><p style="text-align: center; ">Con Club Novios Kamasa, tus regalos llegaran envueltos con una presentación acorde a esta fecha importante, y sobretodo el traslado hasta el lugar (dentro de Tacna Metropolitana) que nos indiques será completamente gratis, otras ciudades tendrán un recargo según la distancia.</p><p style="text-align: center;">Además según las compras acumuladas, los novios podrán disfrutar de diferentes beneficios y regalos, además ingresan al sorteo anual especial entre todas las parejas inscritas.</p>';
		$arrayCompany['inscription']['title'] = 'Inscríbete en<br>el Club de Novios';
		$arrayCompany['inscription']['description'] = '<p style="text-align: center; "><span style="text-align: justify;">Para Inscribirte, debes llenar los datos del siguiente formulario de registro, nos pondremos en contacto, podrás agregar todos los productos que desees que te regalen en esta fecha tan importante, además podrás descargar la invitación para enviar a tus invitados vía e-mail, y ellos podrán regalarte los electrodomésticos que han escogido acercándose a Tiendas Kamasa (Av. San Martin 331).</span><br></p>';
		$arrayCompany['inscription']['backgroundUrl'] = 'https://dl.dropboxusercontent.com/s/beu3cgphot2i4wv/img_novios2.jpg?dl=0';
		$arrayCompany['inscription']['backgroundUrlThumb'] = 'https://dl.dropboxusercontent.com/s/beu3cgphot2i4wv/img_novios2.jpg?dl=0';
		$arrayCompany['gallery'] = [
			[
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/v5ujd2kun40swn0/galery_novio1.jpg?dl=0',
				'imageThumbUrl' => 'https://dl.dropboxusercontent.com/s/v5ujd2kun40swn0/galery_novio1.jpg?dl=0',
			],
			[
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/ryutps66xv9xtc7/galery_novio2.jpg?dl=0',
				'imageThumbUrl' => 'https://dl.dropboxusercontent.com/s/ryutps66xv9xtc7/galery_novio2.jpg?dl=0',
			],
			[
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/rorgx9genk8hme1/galery_novio3.jpg?dl=0',
				'imageThumbUrl' => 'https://dl.dropboxusercontent.com/s/rorgx9genk8hme1/galery_novio3.jpg?dl=0',
			],
			[
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/v5ujd2kun40swn0/galery_novio1.jpg?dl=0',
				'imageThumbUrl' => 'https://dl.dropboxusercontent.com/s/v5ujd2kun40swn0/galery_novio1.jpg?dl=0',
			],
			[
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/ryutps66xv9xtc7/galery_novio2.jpg?dl=0',
				'imageThumbUrl' => 'https://dl.dropboxusercontent.com/s/ryutps66xv9xtc7/galery_novio2.jpg?dl=0',
			],
			[
				'imageUrl' => 'https://dl.dropboxusercontent.com/s/rorgx9genk8hme1/galery_novio3.jpg?dl=0',
				'imageThumbUrl' => 'https://dl.dropboxusercontent.com/s/rorgx9genk8hme1/galery_novio3.jpg?dl=0',
			],
		];

		return response()->json(['data' => $arrayCompany], 200);
	}

	public function getClaimsPageData() {
		$arrayCompany = [];

		$arrayCompany['cover']['title'] = 'Libro de Reclamaciones Virtual';
		$arrayCompany['cover']['info'] = '<p style="text-align: justify; ">¡Hola! Si tienes cualquier consulta o requieres una atención inmediata, te invitamos a usar nuestro canal de atención: central telefónica (052) 4278794 o enviar un correo electrónico a atencionalcliente@kamasa.pe. Gracias por ayudarnos a mejorar nuestro servicio. También puedes comunicarte directamente con el representante de la marca de tu producto, puedes encontrar las centrales telefónicas en tu certificado de garantía.<br></p><p><b>Razón Social: IMPORTACIONES KAMASA EIRL<br>RUC: 20368346501<br>Dirección: Av. San Martín 331, Tacna – Tacna – Tacna</b></p>';
		$arrayCompany['footerInfo'] = '<p dir="ltr" style="line-height: 1.2; margin-top: 0pt; margin-bottom: 14pt;"><span style="vertical-align: baseline;">Para imprimir esta página que contiene tu hoja de reclamación, puedes presionar Ctrl+P</span></p><p dir="ltr" style="line-height: 1.2; margin-top: 0pt; margin-bottom: 14pt;"><div style="text-align: justify;"><b>RECLAMO: </b>Disconformidad relacionada a los productos o servicios.</div><div style="text-align: justify;"><b style="font-weight: bold;">QUEJA: </b>Disconformidad no relacionada a los productos o servicios o malestar o descontento respecto a la atención al público.</div></p>';

		return response()->json(['data' => $arrayCompany], 200);
	}

}
