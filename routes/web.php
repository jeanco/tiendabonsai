<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

/* Rutas BackEnd*/

// Route::get('/plataforma',
//       ['middleware' => ['auth'],
//       'uses' => function(){
//         return redirect('admin/dashboard');
//   }]);
//////////////////////
/* Star Divemotor */
//////////////////////

Route::get('/construccion', function () {
	return view('miranda.construction');
});

Route::get('/dive-inicio', function () {
	return view('divemotor.companies.index');
});
Route::get('/dive-login', function () {
	return view('divemotor.login.index');
});
Route::get('/dive-categorias', function () {
	return view('divemotor.categories.index');
});
Route::get('/dive-catalogo', function () {
	return view('divemotor.catalog.index');
});
Route::get('/catalogo-perfil', function () {
	return view('divemotor.catalog.perfil.index');
});
// Route::get('/dive-carrito', function () {
// 		return view('divemotor.checkout.shopping_cart');
// });
Route::get('/dive-cotizacion', function () {
	return view('divemotor.checkout.order_complete');
});

// Route::get('/mi-cotizacion', function () {
// 	return view('divemotor.users.quotation.index');
// });
/* End Divemotor */
//////////////////////

Route::get('/nuevo', function () {
	return view('template1.home.index');
});
Route::get('/nuevo/nosotros', function () {
	return view('template1.about_as.index');
});
Route::get('/nuevo/contactos', function () {
	return view('template1.contact.index');
});
Route::get('/nuevo/blog', function () {
	return view('template1.blog.index');
});
Route::get('/nuevo/perfil-blog', function () {
	return view('template1.blog.perfil.index');
});

// ////////////////////////////
Route::get('/lista-orden', function () {
	return view('yekatex.checkout.shopping_cart');
});
Route::get('/confirmar-orden', function () {
	return view('yekatex.checkout.check_out');
});
//////////////////////////
Route::get('/registrar-empresa', function () {
	return view('miranda.users.register.company');
});
//////////////////////////
// WINGS
Route::get('/win-inicio', function () {
	return view('wings.home.index');
});
Route::get('/win-nosotros', function () {
	return view('wings.about_as.index');
});
Route::get('/win-catalogo', function () {
	return view('wings.catalog.index');
});

Route::get('/win-contacto', function () {
	return view('wings.contact.index');
});
Route::get('/win-vehiculos', function () {
	return view('wings.cars.index');
});
Route::get('/win-servicios', function () {
	return view('wings.services.index');
});
// Route::get('/win-perfil-auto', function () {
// 	return view('wings.cars.perfil.index');
// });

Route::get('/win-perfil-repuesto', function () {
	return view('wings.catalog.perfil.index');
});

Route::get('/win-blog', function () {
	return view('wings.blog.index');
});
Route::get('/win-perfil-blog', function () {
	return view('wings.blog.perfil.index');
});
Route::get('/win-cotizador', function () {
	return view('wings.checkout.quotation');
});
Route::get('/win-concesionario', function () {
	return view('wings.concessionaire.index');
});
// FIN de WINGS
//////////////////////////
// Admin

Route::group(['namespace' => 'Divemotor'], function () {
	Route::get('/cotizacion', 'QuotationController@get_other_view')->name('quotation');
	// Route::get('/cotizacion', function () {
	// 	return view('admin.routers.quotation.index');
	// })->name('quotation');
});

//////////////////////////
//$path = \DB::table('projects')->where('status', 1)->first()->path;
$path = env('APP_LANDING');

Route::post('/diferenciador', function () {
//ejemplo
	/*if (env('APP_LANDING') == 'oyeepe') {
		// return view('oyeepe.home.index');
		return "oyeepe";
	} else if (env('APP_LANDING') == 'website') {
		// return view('oyeepe.home.index');
		return "website";
	}

	return view('oyeepe.home.index');*/
	//catalogo/nombre-producto

	$env_path = null;
	$key = 'APP_LANDING';
	$value = 'miranda';

	$value = preg_replace('/\s+/', '', $value); //replace special ch
	$key = strtoupper($key); //force upper for security
	$env = file_get_contents(isset($env_path) ? $env_path : base_path('.env')); //fet .env file
	$env = str_replace("$key=" . env($key), "$key=" . $value, $env); //replace value
	/** Save file eith new content */
	$env = file_put_contents(isset($env_path) ? $env_path : base_path('.env'), $env);
	//Artisan::call('config:clear');
	return ("OK");
});

// Route::get('/oyeepe', function () {
// 	return view('oyeepe.home.index');
// 	//catalogo/nombre-producto
// });

// Route::get('/perfil', function () {
// 	return view('oyeepe.catalog.perfil.index');
// 	//catalogo/nombre-producto
// });

Route::get('/acceso', function () {
	return view('oyeepe.pedidos.index');
	//catalogo/nombre-producto
});

Route::get('/empresa', function () {
	return view('oyeepe.empresa.register.index');
	//catalogo/nombre-producto
});

Route::group(['middleware' => ['landing_guest']], function () {
	Route::get('/acceder', 'IndexController@view_login');
});

// Route::get('/acceder', function () use ($path) {
//  return view("{$path}.login.index");
// });

Route::get('/mi-cupon', function () {
	return view('oyeepe.users.cupon.index');
});
// ///////////////////////////

Route::get('/trabaje-con-nosotros', 'CompaniesController@work_with_us_view');
Route::get('/confianos-su-propiedad', 'CompaniesController@entrust_us_your_property');

// Route::get('/trabaje-con-nosotros', function () {
// 	return view('antofagasta.join_us.index');
// });

// Route::get('/confianos-su-propiedad', function () {
// 	return view('antofagasta.trust_us.index');
// });
//////////////////////

Route::get('/completado', function () use ($path) {
	return view("{$path}.checkout.order_complete");
	//catalogo/nombre-producto
});

Route::group(['namespace' => 'Website'], function () {
	Route::get('/productos/{slug}', 'HomeController@productos_perfil');
});

//Logout
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');


// if (env('APP_LANDING') == 'website') {
// 	Route::group(['namespace' => 'Website'], function () {
// 		Route::get('/', 'HomeController@catalog');
// 		// Route::get('/catalogo', 'HomeController@catalog');
// 		// Route::get('/productos/{slug}', 'HomeController@productos_perfil');
// 	});
// } else if (env('APP_LANDING') == 'oyeepe') {
// 	Route::group(['namespace' => 'Oyeepe'], function () {
// 		Route::get('/', 'HomeController@catalog');
// 		// Route::get('/catalogo', 'HomeController@catalog');
// 		// Route::get('/productos/{slug}', 'ProductController@show_perfil');
// 	});
// }

Route::get('/plataforma',
	['middleware' => ['guest'],
		'uses' => 'Auth\LoginController@showLoginForm']);

Route::group(['namespace' => 'Website'], function () use ($path) {
	//Controlador Base

	Route::get('/', 'HomeController@index');
	// Route::get('/catalogo', 'HomeController@catalog');
	Route::get('/blog', 'BlogController@show_view');
	Route::get('/blog/{slug}', 'BlogController@show_profile');

	Route::get('/contacto', 'ContactController@show_view');
	Route::get('/nosotros', 'CompanyController@show_about_us_view');
	Route::get('/suscripcion', 'SuscriptionController@show_view');

	// Route::get('/nosotros', function () {
	// 	return view('website.about_as.index');
	// });

	Route::get('/orden', function () use ($path) {
		return view("{$path}.checkout.shopping_cart");
	});

	Route::get('/orden-vacio', function () use ($path) {
		return view("{$path}.checkout.empty");
	});

	Route::group(['prefix' => 'categories'], function () {
		Route::get('/{id}/featured-products', 'ProductController@featured_products');
	});

	Route::get('/documento/{id}', 'OrderController@show_genesis_document');
	Route::get('banner/{id}', 'OrderController@show_banner');

	Route::get('/orden/info', 'CheckoutController@show_view');

	Route::get('/orden/pago-en-linea', 'PaymentGatewayController@show_view');

	Route::group(['prefix' => 'tiendas'], function () {
		Route::get("/", "CompanyController@show_view");
	});
	// Route::get('/stores/datatable', 'CompanyController@datatable');
	// Route::group(['prefix' => 'stores'], function () {
	// });
	// Route::get('/{slug_company}', 'HomeController@catalog');

	Route::get('/pdf-pedido/{id}', 'OrderController@show');
	Route::get('/mi-cupon/{id}', 'OrderController@my_coupon');

	Route::get('/mi-cupon-pdf/{id}', 'OrderController@generate_pdf');

});
// Route::get('/', function () {

// });

// Route::get('/catalogo', function () {
// 	return view('website.catalog.index');
// });

// Route::get('/perfil', function () {

// 	//catalogo/nombre-producto
// });

Route::get('/compra', function () {
	return view('website.checkout.shopping_cart');
	//catalogo/nombre-producto
});

Route::get('/checkout', function () {
	return view('website.checkout.check_out');
	//catalogo/nombre-producto
});

//Blog
// Route::get('/perfilblog', function () {
// 	return view('website.blog.perfil.index');
// 	//catalogo/nombre-producto
// });
//contacto
//Route::post('autologin', 'HomeController@autologin');
Route::post('/login', 'Auth\LoginController@authenticate');
Route::post('/login-from-landing', 'Auth\LoginController@authenticate_from_landing');
Route::post('/login-from-checkout', 'Auth\LoginController@authenticate_from_checkout');

Route::post('/login-from-landing-divemotor', 'Auth\LoginController@authenticate_divemotor');

Route::group(['middleware' => ['auth.personalized', 'is_admin']], function () {
	//Controlador ADMIN
	Route::group(['prefix' => 'admin'], function () {

		Route::get('/user-information', 'UsersController@user_information');

		Route::get('/place/{id}', 'PlaceController@show');
		Route::get('/places', 'PlaceController@index');
		Route::post('/place', 'PlaceController@store');
		Route::put('/place/{id}', 'PlaceController@update');
		Route::delete('/place/{id}', 'PlaceController@delete');

		//logistics
		Route::get('/logistic/{id}', 'LogisticController@show');
		Route::get('/logistic/{id}/costs', 'CostController@index_by_logistic');
		Route::get('/logistics', 'LogisticController@index');
		Route::post('/logistic', 'LogisticController@store');
		Route::put('/logistic/{id}', 'LogisticController@update');
		Route::delete('/logistic/{id}', 'LogisticController@delete');

		Route::get('/cost/{id}', 'CostController@show');
		Route::get('/costs', 'CostController@index');
		Route::post('/cost', 'CostController@store');
		Route::put('/cost/{id}', 'CostController@update');
		Route::delete('/cost/{id}', 'CostController@delete');

		#coupons
		Route::get('/coupons-datatable', 'CouponController@datatable');
		Route::get('/coupon/{id}', 'CouponController@show');
		Route::get('/coupons', 'CouponController@index');
		Route::post('/coupon', 'CouponController@store');
		Route::put('/coupon/{id}', 'CouponController@update');
		Route::delete('/coupon/{id}', 'CouponController@delete');

		#Nuevas rutas website
		Route::group(['namespace' => 'Website'], function () {

			Route::group(['prefix' => 'stores'], function () {
				Route::get('/datatable', 'CompanyController@datatable');
				Route::post("/", "StoreController@store");
				Route::put("/{id}", "StoreController@update");
				Route::get("/{id}", "StoreController@show");
			});

			Route::get('category-attributes', 'CategoryAttributeController@index');
			Route::get('category-attributes/{id}', 'CategoryAttributeController@show');
			Route::delete('category-attributes/{id}', 'CategoryAttributeController@delete');

			Route::post('category-attributes', 'CategoryAttributeController@store');
			Route::put('category-attributes/{id}', 'CategoryAttributeController@update');
			Route::get('attributes', 'AttributeController@index');

			Route::get('/company-categories', 'CompanyCategoryController@all');
			Route::get('/company-categories/{id}', 'CompanyCategoryController@show');
			Route::post('/company-categories', 'CompanyCategoryController@store');
			Route::put('/company-categories/{id}', 'CompanyCategoryController@update');
			Route::delete('/company-categories/{id}', 'CompanyCategoryController@delete');

			Route::get('attributes/{id}', 'AttributeController@show');
			Route::delete('attributes/{id}', 'AttributeController@delete');
			Route::post('attributes', 'AttributeController@store');
			Route::put('attributes/{id}', 'AttributeController@update');

			Route::get('company-categories', 'CompanyCategoryController@all');

		});
		// Rutas POST AND PUT
		Route::post('upload-dropzone', 'CompaniesController@postCoverImages')->name('upload');
		Route::post('upload-product-dropzone', 'ProductsController@postImages')->name('upload-product-images');
		Route::post('upload-post-dropzone', 'PostsController@postImages')->name('upload-post-images');
		Route::post('upload-gallery-dropzone', 'CompaniesController@postGalleryImagesProject')->name('upload-gallery-images');

		//Rutas GET
		Route::get('empresa', 'CompaniesController@getViewCompany')->name('company');

		Route::get('productos', 'ProductsController@getViewProducts')->name('products');
		Route::get('productos-grilla', 'ProductsController@getViewProductsGrid')->name('product-grid');

		Route::get('productos-lista', 'ProductsController@get_products_list_view')->name('products-list');

		Route::post('configurar-presentaciones', 'ProductsController@get_config_presentation_view');
		Route::post('configurar-presentaciones-ecommerce', 'ProductsController@get_config_presentation_ecommerce_view');

		Route::get('configurar-presentaciones', function () {
			return redirect('/admin/productos-lista');
		});

		Route::get('configurar-presentaciones-ecommerce', function () {
			return redirect('/admin/productos-lista');
		});

		Route::group(['namespace' => 'Admin'], function () {
			Route::post('getting-images', 'ProductController@getting_files');

			Route::post('configurar-etiquetas', 'EtiquetteController@get_config_etiquettes_view');
			Route::get('configurar-etiquetas', function () {
				return redirect('/admin/empresa');
			});

			Route::post('/etiquette-configuration', 'EtiquetteController@store_configuration');
			Route::post('/etiquette-configuration-delete', 'EtiquetteController@delete_configuration');
			Route::get('/etiquette/{id}/subcategory/{index}', 'EtiquetteController@get_products_by_etiquette_and_subcategory');
			Route::get('/etiquettes', 'EtiquetteController@all');
			Route::get('/etiquette/{id}', 'EtiquetteController@show');
			Route::post('/etiquette', 'EtiquetteController@store');
			Route::put('/etiquette/{id}', 'EtiquetteController@update');
			Route::delete('/etiquette/{id}', 'EtiquetteController@delete');


		});

		Route::group(['prefix' => 'suscripciones', 'namespace' => 'Admin'], function () {
			Route::get('/datatable', 'SubscriptionController@datatable');
			Route::get('/', 'SubscriptionController@getView')->name('subscriptions');
		});

		// Inventario
		Route::get('inventario', 'ProductsController@getViewInventory')->name('inventory');

		Route::get('pedidos', 'OrdersController@getViewOrders')->name('orders');
		Route::get('pedidos-lista', 'OrdersController@get_orders_list_view')->name('orders-list');

		// Pedidos Nuevo
		Route::get('pedidos-grilla', 'OrdersController@getOrdersGrid')->name('orders-grid');
		Route::get('pedidos-perfil', 'OrdersController@getOrdersPerfil')->name('orders-perfil');

		//Dashboard
		Route::get('dashboard', 'AccountController@dashboard')->name('dashboard');
		Route::get('dashboard-data', 'AccountController@dashboard_data');

		Route::post('updatetemplate/{id}', 'CompaniesController@updateTemplate');

		//Company
		Route::get('companies/first', 'CompaniesController@getCompanyToEdit');
		Route::get('companies/{id}', 'CompaniesController@show');

		Route::post('companies', 'CompaniesController@postCompany');
		Route::put('companies', 'CompaniesController@putCompany');
		Route::put('companies/slogan', 'CompaniesController@putCompanySlogan');

		Route::post('companies/videos', 'CompaniesController@postCompanyVideo');
		Route::put('companies/videos', 'CompaniesController@putCompanyVideo');
		Route::delete('companies/videos', 'CompaniesController@deleteCompanyVideo');

		//update templates

		//Contents
		Route::group(['prefix' => 'contents', 'namespace' => 'Admin'], function () {
			Route::delete('/{id}', 'ContentController@delete');
		});

		Route::get('contents/{contentId}', 'ContentsController@getContentById');
		Route::delete('contents', 'ContentsController@deleteContent');
		Route::delete('contents/{id}', 'ContentsController@delete_gallery');
		Route::post('contents/change-model-id', 'ContentsController@postChangeModelId');
		Route::post('contents/change-model-id_gallery', 'ContentsController@postChangeModelId_gallery');
		Route::get('contents/{modelId}/{contentId}/{type}', 'ContentsController@getContentsOfAItem');
		Route::put('/content/{contentId}/description', 'ContentsController@update_description');

		//Accounts
		// Route::post('accounts', 'BillingCardsController@postAccount');
		// Route::put('accounts', 'BillingCardsController@putAccount');
		// Route::get('accounts/{accountId}', 'BillingCardsController@getAccountById');
		// Route::get('accounts', 'BillingCardsController@getAccounts');
		// Route::delete('accounts', 'BillingCardsController@deleteAccount');
		// Route::put('accounts/change-published-status', 'BillingCardsController@putChangePublishedStatus');
		//Testimonies
		Route::get('testimonies', 'TestimonyController@all');
		Route::post('testimonies', 'TestimonyController@store');
		Route::get('testimonies/{id}', 'TestimonyController@show');
		Route::put('testimonies/publish', 'TestimonyController@updatePublish');
		Route::put('testimonies/{id}', 'TestimonyController@update');
		Route::delete('testimonies/{id}', 'TestimonyController@delete');

		Route::get('staff', 'StaffController@all');
		Route::post('staff', 'StaffController@store');
		Route::get('staff/{id}', 'StaffController@show');
		Route::put('staff/{id}/publish', 'StaffController@updatePublish');
		Route::put('staff/{id}', 'StaffController@update');
		Route::delete('staff/{id}', 'StaffController@delete');

		Route::group(['prefix' => 'accounts', 'namespace' => 'Admin'], function () {
			Route::get('', 'AccountController@all');
			Route::get('/{id}', 'AccountController@show');
			Route::post('', 'AccountController@store');
			Route::put('/{id}', 'AccountController@update');
			Route::put('/{id}/published', 'AccountController@updatePublished');
			Route::delete('/{id}', 'AccountController@delete');
		});

		Route::group(['prefix' => 'campaigns', 'namespace' => 'Admin'], function () {
			Route::get('/{id_category}', 'CampaignController@all');
			Route::get('/edit/{id}', 'CampaignController@show');
			Route::post('', 'CampaignController@store');
			Route::put('/{id}', 'CampaignController@update');
			Route::put('/{id}/published', 'CampaignController@updatePublished');
			Route::delete('/{id}', 'CampaignController@delete');
		});

		Route::get('campaign-categories', 'CampaignCategoryController@index');

		Route::group(['prefix' => 'categories-attributes', 'namespace' => 'Admin'], function () {
			Route::get('', 'CategoryAttributeController@all');
		});

		Route::group(['prefix' => 'posts', 'namespace' => 'Admin'], function () {
			Route::get('', 'PostController@all');
			Route::get('/{id}', 'PostController@show');
			Route::get('/{id}/images', 'PostController@getImages');
			Route::post('/', 'PostController@store');
			Route::put('/{id}', 'PostController@update');
			Route::put('/{id}/published', 'PostController@updatePublished');
		});

		Route::group(['prefix' => 'products', 'namespace' => 'Admin'], function () {
			Route::get('/presentations', 'ProductController@find_product_presentation');
			Route::get('/presentations-ecommerce', 'ProductController@find_product_presentation_ecommerce');

			Route::get('/', 'ProductController@all');
			Route::get('/search', 'ProductController@search');
			Route::get('/datatable', 'ProductController@datatable');
			Route::get('/list/excel', 'ProductController@export_excel');
			Route::post('/import', 'ProductController@import_products');

			Route::get('/{id}', 'ProductController@show');
			Route::get('/{id}/attributes', 'ProductController@getAttributes');
			Route::post('/', 'ProductController@store');
			Route::put('/{id}', 'ProductController@update');
			Route::put('/{id}/published', 'ProductController@updatePublished');
			Route::put('/{id}/outstanding', 'ProductController@updateOutstanding');
			Route::delete('/{id}', 'ProductController@delete');
			Route::get('/{id}/images', 'ProductController@getImages');
			Route::get('/{id}/prices', 'ProductController@get_prices');
			Route::post('/presentations', 'ProductController@store_product_presentation');
			Route::post('/presentations-ecommerce', 'ProductController@store_product_presentation_ecommerce');

		});

		Route::group(['prefix' => 'promotions', 'namespace' => 'Admin'], function () {
			Route::put('/{id}', 'PromotionProductController@update');
		});


		Route::group(['namespace' => 'Admin'], function () {
			Route::put('/transfer/{id}', 'PromotionProductController@update_transfer_price');
		});


		Route::group(['prefix' => 'contents', 'namespace' => 'Admin'], function () {
			Route::delete('/{id}', 'ContentController@delete');
		});

		Route::group(['prefix' => 'categories', 'namespace' => 'Admin'], function () {
			Route::get('/', 'CategoryController@all');
			Route::get('/first', 'CategoryController@getFirst');
			Route::get('/{id}', 'CategoryController@show');
			Route::get('/{catId}/subcategories/{subId}/products', 'CategoryController@getProductsByCategoryAndSubcategory');
			Route::get('/{id}/subcategories', 'CategoryController@getSubcategories');
			Route::get('/{id}/first-subcategory', 'CategoryController@getFirstSubcategory');
			Route::post('/', 'CategoryController@store');
			Route::put('/{id}', 'CategoryController@update');
			Route::delete('/{id}', 'CategoryController@delete');
		});

		Route::group(['prefix' => 'subcategories', 'namespace' => 'Admin'], function () {
			Route::get('/', 'SubcategoryController@all');
			Route::get('/{id}', 'SubcategoryController@show');
			Route::get('/{id}/products', 'SubcategoryController@get_products');

			Route::get('/{id}/attributes', 'SubcategoryController@getAttributes');
			Route::get('/{id}/categories-attributes', 'SubcategoryController@getCategoriesAttributes');
			Route::post('/', 'SubcategoryController@store');
			Route::put('/{id}', 'SubcategoryController@update');
			Route::delete('/{id}', 'SubcategoryController@delete');
		});

		//Services
		Route::get('services', 'ServicesController@getServices');
		Route::get('services/{serviceId}', 'ServicesController@getServiceById');
		Route::post('services', 'ServicesController@postService');
		Route::put('services', 'ServicesController@putService');
		Route::delete('services', 'ServicesController@deleteService');
		Route::put('services/change-published-status', 'ServicesController@putChangePublishedStatus');
		Route::get('service/{id}/images', 'ServicesController@getImages');


		//Agreetments
		Route::get('agreetments', 'AgreetmentsController@getAgreetments');
		Route::get('agreetments/{agreetmentId}', 'AgreetmentsController@getAgreetmentById');
		Route::post('agreetments', 'AgreetmentsController@postAgreetment');
		Route::put('agreetments', 'AgreetmentsController@putAgreetment');
		Route::delete('agreetments', 'AgreetmentsController@deleteAgreetment');
		Route::put('agreetments/change-published-status', 'AgreetmentsController@putChangePublishedStatus');

		//Gallery

		Route::group(['prefix' => 'galleries'], function () {
			Route::get('/', 'GalleryController@all');
			Route::get('/{id}', 'GalleryController@show');
			Route::post('/', 'GalleryController@store');
			Route::put('/{id}', 'GalleryController@update');
			Route::put('/{id}/published', 'GalleryController@update_published');
			Route::delete('/{id}', 'GalleryController@delete');
		});
		Route::get("/gallery-categories/index", 'GalleryCategoryController@index');

		//Customers
		Route::get('customers', 'CustomersController@getCustomers');
		Route::get('customers/search', 'CustomersController@search_customer');
		Route::get('customers-datatable', 'CustomersController@get_info_to_the_datatable');
		Route::get('customers/report-excel', 'CustomersController@exportCustomers');
		Route::delete('customers/{id}', 'CustomersController@deleteCustomer');
		Route::get('customers/{id}', 'CustomersController@getCustomer');
		Route::put('customers/{id}', 'CustomersController@updateCustomer');
		Route::post('customers', 'CustomersController@saveCustomer');

		Route::group(['prefix' => 'posts', 'namespace' => 'Admin'], function () {
			Route::get('', 'PostController@all');
			Route::get('/{id}', 'PostController@show');
			Route::post('', 'PostController@store');
			Route::put('/{id}', 'PostController@update');
			Route::delete('/{id}', 'PostController@delete');
			Route::put('/{id}/published', 'PostController@updatePublished');
		});

		//Posts
		Route::group(['prefix' => 'tags', 'namespace' => 'Admin'], function () {
			Route::get('/', 'TagPostController@all');
		});

		Route::group(['prefix' => 'orders', 'namespace' => 'Admin'], function () {
			Route::get('/datatable', 'OrderController@datatable');
			Route::get('/filter-by', 'OrderController@allByFilters');
			Route::get('/excel', 'OrderController@generate_excel');
			Route::get('/list/excel', 'OrderController@generate_excel_with_format');
			Route::get('/{orderId}', 'OrderController@show');
			Route::put('/{id}/confirm', 'OrderController@updateToConfirmStatus');
			Route::put('/{id}/cancel', 'OrderController@updateToCancelStatus');
		});

		Route::group(['namespace' => 'Admin'], function () {
			Route::post('tracking', 'ShippingController@store');
			Route::delete('tracking/{id}', 'ShippingController@delete');
			Route::get('/order/{id}/trackings', 'ShippingController@tracking_by_order');

			Route::delete('/product/{id}/promotion-image', 'ProductController@delete_promotion_image');
			Route::delete('/product/{id}/promotion-etiquette', 'ProductController@delete_promotion_etiquette');
			Route::delete('/product/{id}/transfer-etiquette', 'ProductController@delete_transfer_etiquette');

			Route::group(['prefix' => 'notices'], function () {
				Route::get('/', 'NoticeController@all');
				Route::get('/{id}', 'NoticeController@show');
				Route::post('/', 'NoticeController@store');
				Route::put('/{id}', 'NoticeController@update');
				Route::put('/{id}/published', 'NoticeController@updatePublished');
				Route::delete('/{id}', 'NoticeController@delete');
			});

			Route::post('/order/send-message-to-customer-email', 'OrderController@send_message_to_customer');

			Route::get('/category/{id}/subcategories', 'SubcategoryController@show_all_published_by_category');
		});

		// Route::get('orders/products/{productId}', 'OrdersController@getOrdersFromProducts');
		// Route::get('orders/customers/{customerName}', 'OrdersController@getOrderByCustomerName');
		//Users
		Route::get('users', 'UsersController@getUsers');
		Route::put('users/{id}/suspend', 'UsersController@suspendUser');
		Route::put('users/{id}/activate', 'UsersController@activateUser');
		Route::post('users', 'UsersController@postUser');
		Route::put('users', 'UsersController@putUser');

		Route::get('users/{userId}', 'UsersController@getUser');
		Route::put('user-profile', 'UsersController@putProfileUser');
		Route::put('users/password', 'UsersController@putChangePassword');

		Route::group(['prefix' => 'catalogs', 'namespace' => 'Admin'], function () {
			Route::get('', 'CatalogController@all');
			Route::get('/{id}', 'CatalogController@show');
			Route::post('/', 'CatalogController@store');
			Route::put('/{id}', 'CatalogController@update');
			Route::put('/{id}/published', 'CatalogController@updatePublished');
			Route::delete('/{id}', 'CatalogController@delete');

		});

		//Values
		Route::get('values/{id}', 'ValuesController@show');
		Route::get('values', 'ValuesController@all');
		Route::post('values', 'ValuesController@store');
		Route::put('values/{id}', 'ValuesController@update');
		Route::delete('values/{id}', 'ValuesController@delete');
		Route::put('values/{id}/publish', 'ValuesController@updatePublished');

		Route::group(['prefix' => 'payment-ways', 'namespace' => 'Admin'], function () {
			Route::get('/', 'PaymentWayController@all');
		});

		Route::group(['prefix' => 'payment-entities', 'namespace' => 'Admin'], function () {
			Route::get('/', 'PaymentEntityController@all');
		});

		Route::group(['prefix' => 'currencies', 'namespace' => 'Admin'], function () {
			Route::get('/', 'CurrencyController@all');
		});

		Route::group(['namespace' => 'Admin'], function () {
			Route::get('/country/{id}/provinces', 'ProvinceController@index_by_country');
			Route::get('/country/{id}/cities', 'CountryController@getCities');
			Route::get('/city/{id}/provinces', 'ProvinceController@index_by_city');
			Route::get('/province/{id}/districts', 'DistrictController@index_by_province');

			Route::get('/city/{id}/districts', 'DistrictController@index_by_city');

			Route::get('/country/{id}/districts', 'DistrictController@index_by_country');

			Route::get('/product/{id}/price', 'ProductController@show_price');
			Route::patch('/product/{id}/price', 'ProductController@update_price');

		});

		Route::group(['prefix' => 'countries', 'namespace' => 'Admin'], function () {
			Route::get('/', 'CountryController@all');
			Route::get('/{id}/cities', 'CountryController@getCities');
		});

		Route::post('product-prices', 'PriceController@store');
		Route::get('product-prices/prices', 'PriceController@get_price');
		Route::put('product-prices/{id}', 'PriceController@update');
		Route::delete('product-prices/{id}', 'PriceController@delete');
		Route::delete('product-prices/{id}/etiquette', 'PriceController@delete_etiquette');

		//Route::delete('product-presentation/{id}', 'ProductController@delete_product_presentation');

		Route::get('/permisos', 'PermissionController@get_view');
		// Route::get('/roles', 'RolesController@get_view');
		Route::get('/roles', 'PermissionRoleController@get_view');
		Route::put('/roles/{role_id}/permissions/{permission_id}', 'PermissionRoleController@update');
		Route::put('/users/{user_id}/permissions/{permission_id}', 'PermissionUserController@update');
		Route::put('/users/{user_id}/additional-permissions/{permission_id}', 'PermissionUserController@update_additional_permission');
		// Route::get('/permisos', function () {
		// });
	});
});

Route::get('orden/{orderCode}', 'OrdersController@getOrderReport');

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'subscriptions', 'namespace' => 'Admin'], function () {
	Route::get('/excel', 'SubscriptionController@getExcel')->name('excel');
});

/**
 * Web Routes
 **/

// Route::get('/productos/{itemSlug?}', 'WebController@getIndexItem')->name('item');
Route::get('/blog/{postSlug}', 'WebController@getIndexPost')->name('post');

switch ($path) {
case 'website':

	Route::group(['namespace' => 'Website'], function () {
		// Route::get('/', 'HomeController@catalog');
		// Route::get('/catalogo', function () {
		// 	return "dxxd";
		// });
		Route::get('/registro', 'UserController@show_view');
		Route::get('/{slug_company}', 'HomeController@catalog');
		// Route::get('/productos/{slug}', 'HomeController@productos_perfil');
		Route::get('/miperfil/{id}', 'UserController@show_my_profile_view');
		Route::put('/miperfil/{id}', 'UserController@update_my_profile');

	});

	break;

case 'oyeepe':
	Route::group(['namespace' => 'Oyeepe'], function () {
		Route::get('/catalogo', 'ProductController@catalog');
		Route::get('/registro', 'UserController@show_view');
		Route::get('/{slug_company}', 'HomeController@catalog');

		// Route::get('/productos/{slug}', 'ProductController@show_perfil');
		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil/{id}', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');
		});
	});
	break;
case 'miranda':
	Route::group(['namespace' => 'Miranda'], function () {
		//Controlador miranda
		Route::get('/incio', function () {
			return view('miranda.home.index');
		});

		Route::get('/catalogo', 'HomeController@catalog');

		// Route::get('/catalogo', function () {
		// });
		Route::get('/catalogo/{product_slug}', 'ProductController@show_perfil');
		// Route::get('/catalogo/perfil-catalogo', function () {
		// 	return view('miranda.catalog.perfil.index');
		// });
		// Route::get('/nosotros', function () {
		// 	return view('miranda.about.index');
		// });
		// Route::get('/contactos', 'ContactController@show_view');
		// Route::post('/contacts', 'ContactController@send_email');

		Route::get('/blog', 'BlogController@show_view');

		Route::get('/blog/{slug}', 'BlogController@show_profile');
		// Route::get('/blog', function () {
		// 	return view('miranda.blog.index');
		// });

		Route::get('/perfil-blog', function () {
			return view('miranda.blog.perfil.index');
		});

		Route::get('/login', function () {
			return view('miranda.users.login.index');
		});

		Route::get('/registro', function () {
			return view('miranda.users.register.index');
		});

		Route::get('/nosotros', 'AboutUsController@show_view');
	});

	break;

case 'antofagasta':
	Route::group(['namespace' => 'Miranda'], function () {
		//Controlador miranda
		Route::get('/incio', function () {
			return view('antofagasta.home.index');
		});

		Route::get('/catalogo', 'HomeController@catalog');

		// Route::get('/catalogo', function () {
		// });
		Route::get('/catalogo/{product_slug}', 'ProductController@show_perfil');
		// Route::get('/catalogo/perfil-catalogo', function () {
		// 	return view('miranda.catalog.perfil.index');
		// });
		// Route::get('/nosotros', function () {
		// 	return view('miranda.about.index');
		// });
		// Route::get('/contactos', 'ContactController@show_view');
		// Route::post('/contacts', 'ContactController@send_email');

		Route::get('/blog', 'BlogController@show_view');

		Route::get('/blog/{slug}', 'BlogController@show_profile');
		// Route::get('/blog', function () {
		// 	return view('miranda.blog.index');
		// });

		Route::get('/perfil-blog', function () {
			return view('antofagasta.blog.perfil.index');
		});

		Route::get('/login', function () {
			return view('antofagasta.users.login.index');
		});

		Route::get('/registro', function () {
			return view('antofagasta.users.register.index');
		});

		Route::get('/nosotros', 'AboutUsController@show_view');
	});

	break;
case 'yekatex':

	Route::group(['namespace' => 'Yekatex'], function () {

		Route::get('/catalogo', 'HomeController@catalog');
		// Route::get('/catalogo', function () {
		// 	return view('yekatex.catalog.index');
		// });
		Route::get('/catalogo/perfil', function () {
			return view('yekatex.catalog.perfil.index');
		});

		Route::get('/blog', 'BlogController@show_view');

		Route::get('/perfil-blog', function () {
			return view('yekatex.blog.perfil.index');
		});
	});

	break;

case 'divemotor':

	Route::get('/',
		['middleware' => ['guest_divemotor'],
			'uses' => 'IndexController@view_login']);

	Route::group(['namespace' => 'Divemotor', 'middleware' => ['auth.personalized.divemotor']], function () {
		Route::post('/divemotor/orders', 'OrderController@store');
		Route::get('/catalogo', 'HomeController@catalog');
		// Route::get('/productos/{slug}', '')
		/*Route::get('/catalogo/perfil', function () {
			return view('yekatex.catalog.perfil.index');
		});*/
		Route::get('/orden', 'OrderController@get_view');
		Route::get('/mi-cotizacion', 'OrderController@get_view_quotation');
		Route::get('/orders/datatable', 'OrderController@datatable');

		Route::get('/ver-cotizacion/{id}', 'OrderController@see_quotation');

		Route::get('/dive-perfil', 'UserController@get_view');
		Route::put('/dive-perfil/{id}', 'UserController@update');
		// Route::get('/preguntas', function () {
		// 		return view('divemotor.faq.index');
		// });

		Route::get('/preguntas', 'FaqController@show_view');
		/*
			Route::get('/perfil-blog', function () {
				return view('yekatex.blog.perfil.index');
		*/
	});

	break;

case 'template_1':

	Route::group(['namespace' => 'Template_1'], function () {
		$published = env('APP_PUBLISHED');
		Route::get('/preview', 'IndexController@main_view');
		if($published == 1)
		{
		Route::get('/', 'IndexController@main_view');
		}else{
		Route::get('/', 'IndexController@get_view_construction');
	}
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');
		Route::get('/cm/{slug}', 'IndexController@get_view_catalog_etiquette');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_1.catalog.perfil.index');
		// });

		Route::get('/checkout', 'CheckoutController@get_view');

		Route::get('/checkout/info', 'CheckoutController@order_info');

		Route::get('/checkout/completado', 'CheckoutController@complete');

		// Route::get('/checkout/completado', function () {

		// 	return view('template_1.checkout.3_order_complete');
		// });

		Route::get('/registro', function () {
			return view('template_1.users.register.index');
		});

		Route::get('/contacto', 'ContactController@show_view');

		Route::get('/blog', 'PostController@show_view');
		Route::get('/libros', 'PostController@show_view_catalog');
		Route::get('/blog/{slug}', 'PostController@show_profile');

		Route::get('/nosotros', 'IndexController@get_view_about_us');

		Route::get('/ingresar', function () {
			return view('template_1.users.login.index');
		});

		Route::get('/reclamaciones', 'ComplaintBookController@show_view');

		Route::get('/suscripcion', 'SubscriptionController@show_view');

		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/cotizar-finalizado', 'QuotationController@complete');

		Route::get('/pdf-pedido/{id}', 'OrderController@show');

		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_1'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

			});
		});

		Route::get('/{slug}', 'ServiceController@show_view');
		// Route::get('/como-comprar', function () {
		// 	return view('template_1.payment_methods.index');
		// });
		// Route::get('/preguntas-frecuentes', function () {
		// 	return view('template_1.delivery_methods.index');
		// });
		// Route::get('/politicas-privacidad', function () {
		// 	return view('template_1.returns_exchanges.index');
		// });
		// Route::get('/terminos-y-condiciones', function () {
		// 	return view('template_1.terms_conditions.index');
		// });

	});

	break;

case 'template_2':

	Route::group(['namespace' => 'Template_2'], function () {

		$published = env('APP_PUBLISHED');
		Route::get('/preview', 'IndexController@main_view');
		if($published == 1)
		{
			Route::get('/', 'IndexController@main_view');
		}else{
			Route::get('/', 'IndexController@get_view_construction');
		}
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_2.catalog.perfil.index');
		// });

		Route::get('/checkout', 'CheckoutController@get_view');

		Route::get('/checkout/info', 'CheckoutController@order_info');

		Route::get('/checkout/completado', 'CheckoutController@complete');

		// Route::get('/checkout/completado', function () {

		// 	return view('template_2.checkout.3_order_complete');
		// });

		Route::get('/registro', function () {
			return view('template_2.users.register.index');
		});

		//Route::get('/contacto', 'ContactController@show_view');

		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');

		Route::get('/nosotros', 'IndexController@get_view_about_us');
		Route::get('/normativa', 'IndexController@get_normativa');
		Route::get('/cita', 'IndexController@get_cita');

		Route::get('/ingresar', function () {
			return view('template_2.users.login.index');
		});

		Route::get('/contacto', 'SubscriptionController@show_view');

		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/cotizar-finalizado', 'QuotationController@complete');

		Route::get('/pdf-pedido/{id}', 'OrderController@show');
		Route::get('/servicios/{slug}', 'ServiceController@show_view');
		Route::get('/servicios', 'ServiceController@show_view_page');

	});

	break;

case 'template_3':

	Route::group(['namespace' => 'Template_3'], function () {

		$published = env('APP_PUBLISHED');

		Route::get('/preview', 'IndexController@main_view');
		if($published == 1)
		{
		Route::get('/', 'IndexController@main_view');
		//Route::get('/', 'IndexController@main_view');
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_3.catalog.perfil.index');
		// });

		Route::get('/checkout', 'CheckoutController@get_view');
		Route::get('/checkout/info', 'CheckoutController@order_info');
		Route::get('/checkout/completado', function () {
			return view('template_3.checkout.3_order_complete');
		});

		Route::get('/registro', 'UserController@show_view');
		Route::get('/contacto', 'ContactController@show_view');
		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');
		Route::get('/nosotros', 'IndexController@get_view_about_us');
		Route::get('/ingresar', function () {
			return view('template_3.users.login.index');
		});
		Route::get('/suscripcion', 'SubscriptionController@show_view');
		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/club-de-novios', 'MarriageClubController@show_view');
		Route::get('/reclamaciones', 'ComplaintBookController@show_view');
		Route::get('/soporte', 'SupportController@show_view');
		Route::get('/servicios', 'ServiceController@show_view');

		Route::get('/enviar-opinion', 'MessageController@view_leave_review');

		// Route::get('/productos/{slug}', 'HomeController@productos_perfil');
		/*Route::get('/miperfil/{id}', 'UserController@show_my_profile_view');
		Route::put('/miperfil/{id}', 'UserController@update_my_profile');*/

		// Route::get('/miperfil', function () {
		// 	return view('template_3.users.perfil.index');
		// });
		}else{

		Route::get('/', 'IndexController@get_view_construction');
		}



		Route::get('/pdf-pedido/{id}', 'OrderController@show');

		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_3'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

			});

		});

	});

	break;

case 'template_4':

	Route::group(['namespace' => 'Template_4'], function () {
		$published = env('APP_PUBLISHED');
		if($published == 1)
		{

			Route::get('/', 'IndexController@main_view');
				//Route::get('/', 'IndexController@main_view');
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_4.catalog.perfil.index');
		// });

		Route::get('/checkout', 'CheckoutController@get_view');
		Route::get('/checkout/info', 'CheckoutController@order_info');
		Route::get('/checkout/completado', function () {
			return view('template_4.checkout.3_order_complete');
		});

		Route::get('/registro', 'UserController@show_view');
		Route::get('/contacto', 'ContactController@show_view');
		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');
		Route::get('/nosotros', 'IndexController@get_view_about_us');
		Route::get('/ingresar', function () {
			return view('template_4.users.login.index');
		});
		Route::get('/suscripcion', 'SubscriptionController@show_view');
		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/club-de-novios', 'MarriageClubController@show_view');
		Route::get('/reclamaciones', 'ComplaintBookController@show_view');
		Route::get('/soporte', 'SupportController@show_view');
		Route::get('/servicios', 'ServiceController@show_view');
		Route::get('/formas-de-pago', function () {
			return view('template_4.payment_methods.index');
		});
		Route::get('/metodos-de-entrega', function () {
			return view('template_4.delivery_methods.index');
		});
		Route::get('/cambios-y-devoluciones', function () {
			return view('template_4.returns_exchanges.index');
		});
		/*Route::get('/terminos-y-condiciones', function () {
			return view('template_4.terms_conditions.index');
		});*/
		Route::get('/pasos-para-comprar-online', function () {
			return view('template_4.terms_conditions.index');
		});
		Route::get('/politicas-de-privacidad', function () {
			return view('template_4.privacy_policies.index');
		});

		Route::get('/regalo-catalogo', function () {
			return view('template_4.suscription.gift');
		});

		// Route::get('/productos/{slug}', 'HomeController@productos_perfil');
		/*Route::get('/miperfil/{id}', 'UserController@show_my_profile_view');
		Route::put('/miperfil/{id}', 'UserController@update_my_profile');*/

		// Route::get('/miperfil', function () {
		// 	return view('template_4.users.perfil.index');
		// });
		Route::get('/pdf-pedido/{id}', 'OrderController@show');
		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_4'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

			});

		});
		}else{

			Route::get('/', 'IndexController@get_view_construction');
		}


	});

	break;

case 'template_5':

	Route::group(['namespace' => 'Template_5'], function () {

		$published = env('APP_PUBLISHED');
		Route::get('/preview', 'IndexController@main_view');

		if($published == 1)
		{
			Route::get('/', 'IndexController@main_view');
		} else {
			Route::get('/', 'IndexController@get_view_construction');
		}

		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_5.catalog.perfil.index');
		// });

		Route::get('/reclamaciones', 'ComplaintBookController@show_view');

		Route::get('/checkout', 'CheckoutController@get_view');

		Route::get('/checkout/info', 'CheckoutController@order_info');

		Route::get('/checkout/completado', 'CheckoutController@complete');

		// Route::get('/checkout/completado', function () {

		// 	return view('template_5.checkout.3_order_complete');
		// });

		Route::get('/registro', function () {
			return view('template_5.users.register.index');
		});

		Route::get('/contacto', 'ContactController@show_view');

		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');

		Route::get('/nosotros', 'IndexController@get_view_about_us');

		Route::get('/ingresar', function () {
			return view('template_5.users.login.index');
		});

		Route::get('/formas-de-pago', function () {
			return view('template_5.payment_methods.index');
		});
		Route::get('/metodos-de-entrega', function () {
			return view('template_5.delivery_methods.index');
		});
		Route::get('/cambios-y-devoluciones', function () {
			return view('template_5.returns_exchanges.index');
		});
		Route::get('/terminos-y-condiciones', function () {
			return view('template_5.terms_conditions.index');
		});

		Route::get('/suscripcion', 'SubscriptionController@show_view');

		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/cotizar-finalizado', 'QuotationController@complete');

		Route::get('/pdf-pedido/{id}', 'OrderController@show');

		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_5'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

				});
			});

	});

	break;

case 'template_6':

	Route::group(['namespace' => 'Template_6'], function () {
		Route::get('/', 'IndexController@main_view');
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_6.catalog.perfil.index');
		// });

		Route::get('/checkout', 'CheckoutController@get_view');
		Route::get('/checkout/info', 'CheckoutController@order_info');
		Route::get('/checkout/completado', function () {
			return view('template_6.checkout.3_order_complete');
		});

		Route::get('/registro', 'UserController@show_view');
		Route::get('/contacto', 'ContactController@show_view');
		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');
		Route::get('/nosotros', 'IndexController@get_view_about_us');
		Route::get('/ingresar', function () {
			return view('template_6.users.login.index');
		});
		Route::get('/suscripcion', 'SubscriptionController@show_view');
		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/club-de-novios', 'MarriageClubController@show_view');
		Route::get('/reclamaciones', 'ComplaintBookController@show_view');
		Route::get('/soporte', 'SupportController@show_view');
		Route::get('/servicios', 'ServiceController@show_view');

		Route::get('/enviar-opinion', 'MessageController@view_leave_review');

		// Route::get('/productos/{slug}', 'HomeController@productos_perfil');
		/*Route::get('/miperfil/{id}', 'UserController@show_my_profile_view');
		Route::put('/miperfil/{id}', 'UserController@update_my_profile');*/

		// Route::get('/miperfil', function () {
		// 	return view('template_6.users.perfil.index');
		// });
		Route::get('/pdf-pedido/{id}', 'OrderController@show');

		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_6'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

			});

		});

	});

	break;

case 'template_7':

	Route::group(['namespace' => 'Template_7'], function () {
		Route::get('/', 'IndexController@main_view');
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');
		Route::get('/cm/{slug}', 'IndexController@get_view_catalog_etiquette');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_7.catalog.perfil.index');
		// });

		Route::get('/checkout', 'CheckoutController@get_view');
		Route::get('/checkout/info', 'CheckoutController@order_info');
		Route::get('/checkout/completado', function () {
			return view('template_7.checkout.3_order_complete');
		});

		Route::get('/registro', 'UserController@show_view');
		Route::get('/contacto', 'ContactController@show_view');
		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');
		Route::get('/nosotros', 'IndexController@get_view_about_us');
		Route::get('/ingresar', function () {
			return view('template_7.users.login.index');
		});
		Route::get('/suscripcion', 'SubscriptionController@show_view');
		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/club-de-novios', 'MarriageClubController@show_view');
		Route::get('/reclamaciones', 'ComplaintBookController@show_view');
		Route::get('/soporte', 'SupportController@show_view');
		Route::get('/servicios', 'ServiceController@show_view');
		Route::get('/formas-de-pago', function () {
			return view('template_7.payment_methods.index');
		});
		Route::get('/metodos-de-entrega', function () {
			return view('template_7.delivery_methods.index');
		});
		Route::get('/cambios-y-devoluciones', function () {
			return view('template_7.returns_exchanges.index');
		});
		Route::get('/terminos-y-condiciones', function () {
			return view('template_7.terms_conditions.index');
		});
		Route::get('/politicas-de-privacidad', function () {
			return view('template_7.privacy_policies.index');
		});

		Route::get('/regalo-catalogo', function () {
			return view('template_7.suscription.gift');
		});

		// Route::get('/productos/{slug}', 'HomeController@productos_perfil');
		/*Route::get('/miperfil/{id}', 'UserController@show_my_profile_view');
		Route::put('/miperfil/{id}', 'UserController@update_my_profile');*/

		// Route::get('/miperfil', function () {
		// 	return view('template_7.users.perfil.index');
		// });
		Route::get('/pdf-pedido/{id}', 'OrderController@show');
		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_7'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

			});

		});

	});

	break;

case 'template_8':

	Route::group(['namespace' => 'Template_8'], function () {

		Route::get('/', 'IndexController@main_view');
		Route::get('/catalogo', 'IndexController@get_view_catalog');

		Route::get('/catalogo/{slug}', 'ProductController@get_view');

		Route::get('/servicios', 'ServiceController@show_view');
		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');

		Route::get('/contacto', 'ContactController@show_view');

		Route::get('/nosotros', 'IndexController@get_view_about_us');

		Route::get('/cotizar', function () {
			return view('template_8.quotation.index');
		});

		Route::get('/cotizar-modelo', 'QuotationController@show_product_view');
		Route::get('/pdf-pedido/{id}', 'OrderController@show');

		Route::get('/cotizar-finalizado', function () {
			return view('template_8.quotation.complete');
		});
	});

	break;

case 'template_9':

	Route::group(['namespace' => 'Template_9'], function () {
		Route::get('/', 'IndexController@main_view');
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_9.catalog.perfil.index');
		// });

		Route::get('/checkout', 'CheckoutController@get_view');

		Route::get('/checkout/info', 'CheckoutController@order_info');

		Route::get('/checkout/completado', 'CheckoutController@complete');

		// Route::get('/checkout/completado', function () {

		// 	return view('template_9.checkout.3_order_complete');
		// });

		Route::get('/registro', function () {
			return view('template_9.users.register.index');
		});

		Route::get('/contacto', 'ContactController@show_view');

		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');

		Route::get('/nosotros', 'IndexController@get_view_about_us');

		Route::get('/ingresar', function () {
			return view('template_9.users.login.index');
		});

		Route::get('/formas-de-pago', function () {
			return view('template_9.payment_methods.index');
		});
		Route::get('/metodos-de-entrega', function () {
			return view('template_9.delivery_methods.index');
		});
		Route::get('/cambios-y-devoluciones', function () {
			return view('template_9.returns_exchanges.index');
		});
		Route::get('/terminos-y-condiciones', function () {
			return view('template_9.terms_conditions.index');
		});

		Route::get('/suscripcion', 'SubscriptionController@show_view');

		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/cotizar-finalizado', 'QuotationController@complete');

		Route::get('/pdf-pedido/{id}', 'OrderController@show');

		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_9'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

			});

		});

	});

	break;

case 'template_10':

	Route::group(['namespace' => 'Template_10'], function () {


		$published = env('APP_PUBLISHED');
		Route::get('/preview', 'IndexController@main_view');
		if($published == 1)
		{
		Route::get('/', 'IndexController@main_view');
		}else{
		Route::get('/', 'IndexController@get_view_construction');
		}


		//Route::get('/', 'IndexController@main_view');
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_10.catalog.perfil.index');
		// });

		Route::get('/checkout', 'CheckoutController@get_view');

		Route::get('/checkout/info', 'CheckoutController@order_info');

		Route::get('/checkout/completado', 'CheckoutController@complete');

		// Route::get('/checkout/completado', function () {

		// 	return view('template_10.checkout.3_order_complete');
		// });

		Route::get('/registro', function () {
			return view('template_10.users.register.index');
		});

		Route::get('/contacto', 'ContactController@show_view');
		Route::get('/servicios', 'GalleryController@show');
		Route::get('/servicios/{slug}', 'GalleryController@show_view_perfil');

		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');

		Route::get('/nosotros', 'IndexController@get_view_about_us');

		Route::get('/ingresar', function () {
			return view('template_10.users.login.index');
		});

		Route::get('/formas-de-pago', function () {
			return view('template_10.payment_methods.index');
		});
		Route::get('/metodos-de-entrega', function () {
			return view('template_10.delivery_methods.index');
		});
		Route::get('/cambios-y-devoluciones', function () {
			return view('template_10.returns_exchanges.index');
		});
		Route::get('/terminos-y-condiciones', function () {
			return view('template_10.terms_conditions.index');
		});

		Route::get('/consultar-certificados', 'CustomerController@search_certificate_view');

		Route::post('/resultado-certificados', 'CustomerController@result_search_certificate_view');

		Route::get('/suscripcion', 'SubscriptionController@show_view');

		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/cotizar-finalizado', 'QuotationController@complete');

		Route::get('/pdf-pedido/{id}', 'OrderController@show');

		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_10'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

			});

		});

	});

	break;

case 'template_11':

	Route::group(['namespace' => 'Template_11'], function () {
		$published = env('APP_PUBLISHED');
		Route::get('/preview', 'IndexController@main_view');
		if($published == 1)
		{
		Route::get('/', 'IndexController@main_view');
		}else{
		Route::get('/', 'IndexController@get_view_construction');
		}
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view')->name('item-profile');
		Route::get('/cm/{slug}', 'IndexController@get_view_catalog_etiquette');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_11.catalog.perfil.index');
		// });

		Route::get('/checkout', 'CheckoutController@get_view');

		Route::get('/checkout/info', 'CheckoutController@order_info');

		Route::get('/checkout/completado', 'CheckoutController@complete');

		Route::get('/checkout-fast', 'CheckoutController@checkout_fast');

		// Route::get('/checkout/completado', function () {

		// 	return view('template_11.checkout.3_order_complete');
		// });

		Route::get('/registro', function () {
			return view('template_11.users.register.index');
		});

		Route::get('/contacto', 'ContactController@show_view');

		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');

		Route::get('/nosotros', 'IndexController@get_view_about_us');

		Route::get('/ingresar', function () {
			return view('template_11.users.login.index');
		});

		Route::get('/reclamaciones', 'ComplaintBookController@show_view');

		Route::get('/suscripcion', 'SubscriptionController@show_view');

		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/cotizar-finalizado', 'QuotationController@complete');

		Route::get('/pdf-pedido/{id}', 'OrderController@show');
		Route::get('/pdf-pedido-cliente/{id}', 'OrderController@show_customer');

		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_11'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

			});
		});

		Route::get('/{slug}', 'ServiceController@show_view');
		// Route::get('/como-comprar', function () {
		// 	return view('template_11.payment_methods.index');
		// });
		// Route::get('/preguntas-frecuentes', function () {
		// 	return view('template_11.delivery_methods.index');
		// });
		// Route::get('/politicas-privacidad', function () {
		// 	return view('template_11.returns_exchanges.index');
		// });
		// Route::get('/terminos-y-condiciones', function () {
		// 	return view('template_11.terms_conditions.index');
		// });

	});

	break;

case 'template_12':

	Route::group(['namespace' => 'Template_12'], function () {

			$published = env('APP_PUBLISHED');
		Route::get('/preview', 'IndexController@main_view');
		if($published == 1)
		{
		Route::get('/', 'IndexController@main_view');
		}else{
		Route::get('/', 'IndexController@get_view_construction');
		}


		//Route::get('/', 'IndexController@main_view');
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');
		Route::get('/cm/{slug}', 'IndexController@get_view_catalog_etiquette');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_12.catalog.perfil.index');
		// });

		Route::get('/checkout', 'CheckoutController@get_view');
		Route::get('/checkout/info', 'CheckoutController@order_info');
		Route::get('/checkout/completado', function () {
			return view('template_12.checkout.3_order_complete');
		});

		Route::get('/registro', 'UserController@show_view');
		Route::get('/contacto', 'ContactController@show_view');
		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');
		Route::get('/nosotros', 'IndexController@get_view_about_us');
		Route::get('/ingresar', function () {
			return view('template_12.users.login.index');
		});
		Route::get('/suscripcion', 'SubscriptionController@show_view');
		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/club-de-novios', 'MarriageClubController@show_view');
		Route::get('/reclamaciones', 'ComplaintBookController@show_view');
		Route::get('/soporte', 'SupportController@show_view');
		Route::get('/servicios', 'ServiceController@show_view');

		Route::get('/{slug}', 'ServiceController@show_view_pages');

		/*Route::get('/formas-de-pago', function () {
			return view('template_12.payment_methods.index');
		});
		Route::get('/metodos-de-entrega', function () {
			return view('template_12.delivery_methods.index');
		});
		Route::get('/cambios-y-devoluciones', function () {
			return view('template_12.returns_exchanges.index');
		});
		Route::get('/terminos-y-condiciones', function () {
			return view('template_12.terms_conditions.index');
		});
		Route::get('/politicas-de-privacidad', function () {
			return view('template_12.privacy_policies.index');
		});*/

		Route::get('/regalo-catalogo', function () {
			return view('template_12.suscription.gift');
		});

		// Route::get('/productos/{slug}', 'HomeController@productos_perfil');
		/*Route::get('/miperfil/{id}', 'UserController@show_my_profile_view');
		Route::put('/miperfil/{id}', 'UserController@update_my_profile');*/

		// Route::get('/miperfil', function () {
		// 	return view('template_12.users.perfil.index');
		// });
		Route::get('/pdf-pedido/{id}', 'OrderController@show');
		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_12'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

			});

		});



	});

	break;


case 'template_13':

	Route::group(['namespace' => 'Template_13'], function () {
		$published = env('APP_PUBLISHED');
		Route::get('/preview', 'IndexController@main_view');
		if($published == 1)
		{
		Route::get('/', 'IndexController@main_view');
		}else{
		Route::get('/', 'IndexController@get_view_construction');
	}
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');
		Route::get('/cm/{slug}', 'IndexController@get_view_catalog_etiquette');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_13.catalog.perfil.index');
		// });

		Route::get('/checkout', 'CheckoutController@get_view');

		Route::get('/checkout/info', 'CheckoutController@order_info');

		Route::get('/checkout/completado', 'CheckoutController@complete');

		// Route::get('/checkout/completado', function () {

		// 	return view('template_13.checkout.3_order_complete');
		// });

		Route::get('/registro', function () {
			return view('template_13.users.register.index');
		});

		Route::get('/contacto', 'ContactController@show_view');

		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');

		Route::get('/nosotros', 'IndexController@get_view_about_us');

		Route::get('/ingresar', function () {
			return view('template_13.users.login.index');
		});

		Route::get('/reclamaciones', 'ComplaintBookController@show_view');

		Route::get('/suscripcion', 'SubscriptionController@show_view');

		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/cotizar-finalizado', 'QuotationController@complete');

		Route::get('/pdf-pedido/{id}', 'OrderController@show');

		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_13'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

			});
		});

		Route::get('/{slug}', 'ServiceController@show_view');
		// Route::get('/como-comprar', function () {
		// 	return view('template_1.payment_methods.index');
		// });
		// Route::get('/preguntas-frecuentes', function () {
		// 	return view('template_1.delivery_methods.index');
		// });
		// Route::get('/politicas-privacidad', function () {
		// 	return view('template_1.returns_exchanges.index');
		// });
		// Route::get('/terminos-y-condiciones', function () {
		// 	return view('template_1.terms_conditions.index');
		// });

	});

	break;


case 'template_14':

	Route::group(['namespace' => 'Template_14'], function () {

		$published = env('APP_PUBLISHED');

		Route::get('/preview', 'IndexController@main_view');
		if($published == 1)
		{
		Route::get('/', 'IndexController@main_view');
		//Route::get('/', 'IndexController@main_view');
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_14.catalog.perfil.index');
		// });

		Route::get('/checkout', 'CheckoutController@get_view');
		Route::get('/checkout/info', 'CheckoutController@order_info');
		Route::get('/checkout/completado', function () {
			return view('template_14.checkout.3_order_complete');
		});

		Route::get('/registro', 'UserController@show_view');
		Route::get('/contacto', 'ContactController@show_view');
		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');
		Route::get('/nosotros', 'IndexController@get_view_about_us');
		Route::get('/ingresar', function () {
			return view('template_14.users.login.index');
		});
		Route::get('/suscripcion', 'SubscriptionController@show_view');
		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/club-de-novios', 'MarriageClubController@show_view');
		Route::get('/reclamaciones', 'ComplaintBookController@show_view');
		Route::get('/soporte', 'SupportController@show_view');
		Route::get('/servicios', 'ServiceController@show_view_page');

		Route::get('/enviar-opinion', 'MessageController@view_leave_review');

		// Route::get('/productos/{slug}', 'HomeController@productos_perfil');
		/*Route::get('/miperfil/{id}', 'UserController@show_my_profile_view');
		Route::put('/miperfil/{id}', 'UserController@update_my_profile');*/

		// Route::get('/miperfil', function () {
		// 	return view('template_14.users.perfil.index');
		// });
		}else{

		Route::get('/', 'IndexController@get_view_construction');
		}



		Route::get('/pdf-pedido/{id}', 'OrderController@show');

		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_14'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

			});

		});


		Route::get('/{slug}', 'ServiceController@show_view');

	});

	break;

case 'template_15':

	Route::group(['namespace' => 'Template_15'], function () {

		$published = env('APP_PUBLISHED');
		Route::get('/preview', 'IndexController@main_view');

		if($published == 1)
		{
			//Route::get('/', 'IndexController@main_view');
			Route::get('/', 'IndexController@get_view_catalog');
		} else {
			Route::get('/', 'IndexController@get_view_construction');
		}

		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/catalogo/{slug}', 'ProductController@get_view');

		// Route::get('/catalogo/{slug}', function () {
		// 		return view('template_15.catalog.perfil.index');
		// });

		Route::get('/reclamaciones', 'ComplaintBookController@show_view');

		Route::get('/checkout', 'CheckoutController@get_view');

		Route::get('/checkout/info', 'CheckoutController@order_info');

		Route::get('/checkout/completado', 'CheckoutController@complete');

		// Route::get('/checkout/completado', function () {

		// 	return view('template_15.checkout.3_order_complete');
		// });

		Route::get('/registro', function () {
			return view('template_15.users.register.index');
		});

		Route::get('/contacto', 'ContactController@show_view');

		Route::get('/blog', 'PostController@show_view');
		Route::get('/blog/{slug}', 'PostController@show_profile');

		Route::get('/nosotros', 'IndexController@get_view_about_us');

		Route::get('/ingresar', function () {
			return view('template_15.users.login.index');
		});

		Route::get('/formas-de-pago', function () {
			return view('template_15.payment_methods.index');
		});
		Route::get('/metodos-de-entrega', function () {
			return view('template_15.delivery_methods.index');
		});
		Route::get('/cambios-y-devoluciones', function () {
			return view('template_15.returns_exchanges.index');
		});
		Route::get('/terminos-y-condiciones', function () {
			return view('template_15.terms_conditions.index');
		});

		Route::get('/suscripcion', 'SubscriptionController@show_view');

		Route::get('/cotizar', 'QuotationController@show_view');
		Route::get('/cotizar-finalizado', 'QuotationController@complete');

		Route::get('/pdf-pedido/{id}', 'OrderController@show');

		Route::group(['middleware' => ['auth.personalized.oyeepe']], function () {
			Route::get('/miperfil', 'UserController@show_my_profile_view');
			Route::put('/miperfil/{id}', 'UserController@update_my_profile');
			Route::put('/my-profile/update-coupons', 'UserController@update_my_coupons');
			Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

			Route::group(['prefix' => 'template_15'], function () {
				Route::get('/order/{id}/trackings-by-code', 'OrderController@tracking_by_order_code');

				});
			});

	});

	break;

case 'wings':

	// Route::get('/',
	// ['middleware' => ['guest_divemotor'],
	// 	'uses' => 'IndexController@view_login']);
	Route::group(['namespace' => 'Wings'], function () {
		Route::get('/', 'IndexController@main_view');
		Route::get('/catalogo', 'IndexController@get_view_catalog');
		Route::get('/repuestos', 'IndexController@get_view_spare_parts');
		Route::get('/repuestos/{slug}', 'ProductController@get_view_spare_part');

		Route::get('/win-cotizador', 'IndexController@cotiza_view');
		Route::get('/productos/{slug}', 'ProductController@get_view');

		Route::get('/especificaciones/{slug}', 'ProductController@specifications_view');

		Route::get('/galeria-automoviles/{slug}', 'ProductController@gallery_view');
		//Route::get('/especificaciones/{slug}', 'ProductController@get_view');
		//Route::get('/galeria-automoviles/{slug}', 'ProductController@get_view');

		Route::get('/blog', 'IndexController@get_view_blog');

		Route::get('/repuestos-perfil', 'IndexController@get_view_perfil_spare_parts');
		Route::get('/contacto', 'IndexController@get_view_contact');
		// Route::get('/servicios', 'IndexController@get_view_services');
		Route::get('/servicios/{slug}', 'ServiceController@show_profile');
		Route::get('/blog/{slug}', 'PostController@show_profile');

		Route::get('/nosotros', 'IndexController@get_view_about_us');
		Route::get('/concesionario', 'IndexController@get_view_concesionario');

		Route::get('/orden-info', 'IndexController@info_view');
		// Route::get('/win-info', 'IndexController@info_view');
		Route::get('/win-confirmacion', 'IndexController@confirm_view');
		Route::get('/orden', 'IndexController@order_view');
		Route::get('/cotizacion-pdf/{id}', 'OrderController@get_view_pdf');

	});

}

/*Route::get('/{any}', 'WebController@getIndex')->where('any', '^((?!api).)*');*/

// Route::get('/', 'WebController@getIndex')->name('home');
// Route::get('/demo', 'WebController@getIndex');
// Route::get('/404', 'WebController@getIndex');

// Route::get('/club-de-novios', 'WebController@getIndex');
// Route::get('/reclamaciones', 'WebController@getIndex');
// Route::get('/nosotros', 'WebController@getIndex');
// Route::get('/soporte', 'WebController@getIndex');
// Route::get('/servicios', 'WebController@getIndex');
// Route::get('/contacto', 'WebController@getIndex');
// Route::get('/detalle', 'WebController@getIndex');
// Route::get('/orden/info', 'WebController@getIndex');

// Route::get('/catalogo/{categorySlug?}/{subCategorySlug?}', 'WebController@getIndex')->name('catalog');

// Route::get('/blog', 'WebController@getIndex')->name('news-index');

// Route::get('/banner', function () {
// 	return view('admin.routers.banner');
// });

// Nuevas rutas --------------
Route::group(['prefix' => 'testing', 'namespace' => 'Website'], function () {
	Route::get('culqi', 'PaymentGatewayController@show_view');
	Route::post('culqi-charge', 'PaymentGatewayController@charge');
	Route::get('/excel', 'OrderController@generate_formatted_excel_test');
});

Route::group(['prefix' => 'testing', 'namespace' => 'Admin'], function () {
	Route::get('/excel', 'OrderController@generate_formatted_excel_test');
});

Route::get('/banner-', function () {
	return view('Template_2.emails.order');
});
