<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
 */

Route::get('/place/{id}/staff', 'StaffController@by_place');

#NEW ROUTE FOR WEBSITE
########################################################
Route::group(['namespace' => 'Website'], function () {
	Route::group(['prefix' => 'categories'], function () {
		Route::get('/{id}/featured-products', 'ProductController@featured_products');
	});

	Route::post('/order', 'OrderController@store');
	Route::get('/catalog', 'ProductController@catalog');
	Route::get('/pagination/fetch_data', 'ProductController@fetch_data_catalog');
	Route::get('/fetch_data_attributes', 'CategoryAttributeController@by_subcategory');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/pagination/fetch-data-blog', 'BlogController@fetch_data_blog');

	Route::post('contact', 'ContactController@send');

	Route::get('/see-info/{id}', 'OrderController@send_email_to_customer_from_order_history');
	Route::get('/yngrid-info/{id}', 'OrderController@send_email_to_companies_from_order_history');
	Route::post('/companies', 'CompanyController@register');
	Route::post('/users', 'UserController@register');
});

Route::group(['prefix' => 'miranda', 'namespace' => 'Miranda'], function () {
	Route::get('/pagination/fetch-data-blog', 'BlogController@fetch_data_blog');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data');
	Route::post('/orders', 'OrderController@store');
	Route::get('/products/search', 'ProductController@search');
	Route::post('/register-user', 'UserController@register');
});

Route::group(['prefix' => 'wings', 'namespace' => 'Wings'], function () {
	Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-attributes-cars', 'CategoryAttributeController@by_subcategory_to_cars');
	Route::get('/fetch-data-attributes-catalog', 'CategoryAttributeController@by_subcategory_to_catalog');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::get('/pagination/fetch-data-posts', 'PostController@fetch_data_posts');
});

Route::group(['namespace' => 'Oyeepe', 'prefix' => 'oyeepe'], function () {
	Route::post('/register-user', 'UserController@register');
	Route::post('/order', 'OrderController@store');

	#PreOrder
	Route::post('/register-customer', 'CustomerController@register');
	#Registering the order and the paying
	Route::post('/register-order', 'OrderController@register_order');
	#Registering the coupon
	Route::post('/register-coupon', 'OrderController@register_coupon');
});

// Route::group(['namespace' => 'Divemotor', 'prefix' => 'divemotor'], function () {
// 	Route::post('/order', 'OrderController@store');
// });
#########################################################

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'items', 'namespace' => 'Landing'], function () {
	Route::get('/', 'ProductController@getProducts');
	Route::get('/cart', 'ProductController@getCart');
	Route::get('/outstanding', 'ProductController@getOutstanding');
	Route::get('/offers', 'ProductController@getOffers');
	Route::get('/search', 'ProductController@getSearchProducts');
	Route::get('/{slug}', 'ProductController@getProductBySlug');
	Route::get('/{slug}/related', 'ProductController@getRelatedProductBySlug');
});

Route::group(['prefix' => 'countries', 'namespace' => 'Landing'], function () {
	Route::get('/', 'CountryController@all');
	Route::get('/{id}/cities', 'CountryController@getCities');
});

Route::group(['prefix' => 'campaigns', 'namespace' => 'Landing'], function () {
	Route::get('/', 'CampaignController@all');
});

Route::group(['prefix' => 'orders', 'namespace' => 'Landing'], function () {
	Route::post('/', 'OrderController@store');
});

Route::group(['prefix' => 'catalogs', 'namespace' => 'Landing'], function () {
	Route::get('/', 'CatalogController@all');
});

Route::group(['prefix' => 'services', 'namespace' => 'Landing'], function () {
	Route::get('/', 'ServiceController@getServices');
});

Route::group(['prefix' => 'subscriptions', 'namespace' => 'Landing'], function () {
	Route::post('/', 'SubscriptionController@store');
});

Route::group(['prefix' => 'accounts', 'namespace' => 'Landing'], function () {
	Route::get('/', 'AccountController@all');
});

Route::get('brands', 'BrandsController@getBrands');
//Route::get('attributes','AttributesController@getAttributes');

Route::group(['prefix' => 'prices-range', 'namespace' => 'Landing'], function () {
	Route::get('/', 'PriceRangeController@getPricesRange');
});

Route::group(['prefix' => 'tags', 'namespace' => 'Landing'], function () {
	Route::get('/', 'PostTagController@getTagsforApi');
});

Route::group(['prefix' => 'posts', 'namespace' => 'Landing'], function () {
	Route::get('/', 'PostController@allForApi');
	Route::get('/last', 'PostController@lastForApi');
	Route::get('/{slug}', 'PostController@getBySlugForApi');
	Route::get('/{slug}/related', 'PostController@relatedBySlugForApi');
});

Route::get('categories', 'CategoriesController@getCategories');
Route::get('categories/outstanding', 'CategoriesController@getOutstandingCategories');

Route::get('company', 'CompaniesController@getCompany');
Route::get('contact', 'CompaniesController@getContactPageData');
Route::get('support', 'CompaniesController@getSupportPageData');
Route::get('about', 'CompaniesController@getAboutCompany');
Route::get('boyfriends-club', 'CompaniesController@getBoyfriendsClubPageData');
Route::get('claims', 'CompaniesController@getClaimsPageData');

Route::group(['namespace' => 'Landing'], function () {
	Route::post('boyfriends-register', 'BoyfriendsClubController@postRegisterFromWeb');
});

Route::group(['namespace' => 'Landing'], function () {
	Route::post('claims', 'ClaimController@sendToTheCompany');
	Route::get('customers/{identityDocument}', 'CustomerController@getByIdentityDocument');
});

// Route::get('customer', 'CustomersController@getCustomerByEmail');

Route::get('datatable-view', 'TestController@users');
Route::get('boyfriends-view', 'TestController@watch_view_email');
Route::get('email_customer-order', 'TestController@watchEmailCustomerOrder');

// Route::get('xd/{orderId}','OrdersController@getDetailOrder');

Route::group(['prefix' => 'attributes', 'namespace' => 'Landing'], function () {
	Route::get('/', 'AttributeController@attributesByCategoryOrSubcategory');
// Route::get('','AttributeController@getAttributes');
});

Route::group(['namespace' => 'Admin'], function () {
	Route::get('/subcategories/{id}/categories-attributes', 'SubcategoryController@getCategoriesAttributes');

	Route::get('/categories/{id}/subcategories-published', 'SubcategoryController@show_all_published_by_category');

});

Route::post('login', 'PassportController@login');
// Route::post('register', 'PassportController@register');
Route::group(['prefix' => 'v1/admin', 'middleware' => 'auth:api'], function () {
	Route::get('/user', 'PassportController@details');

});

Route::group(['prefix' => 'v1', 'namespace' => 'Oyeepe'], function () {

	Route::group(['middleware' => 'auth:api'], function () {
		Route::get('admin/user/coupons', 'ApiController@show_user_coupons');
		Route::post('admin/register-coupon', 'ApiController@register_coupon');
	});

	Route::get('coupon-categories', 'ApiController@coupon_categories');
	Route::get('coupons', 'ApiController@coupons');
	Route::get('coupon/{id}', 'ApiController@show_coupon');
});

Route::group(['prefix' => 'fixers'], function () {
	Route::get('assigner/{user_id}', 'FixerController@assign_all_permissions_this_user');
	Route::get('assign-super-admin/{user_id}', 'FixerController@assign_super_admin_to_this_user');
	Route::get('/product-unit-price', 'FixerController@product_unit_price');
});

Route::group(['prefix' => 'fixers'], function () {
	Route::get('assigner-role', 'FixerController@assign_all_permissions_this_role');
});

Route::group(['prefix' => 'template_1', 'namespace' => 'Template_1'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');
	Route::get('/customer', 'CustomerController@get_customer');
	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/product/{id}/description', 'ProductController@show_description');
	Route::get('/product/{id}/description', 'ProductController@show_description');
	Route::get('/product/{id}/price', 'ProductController@get_price');

	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');

	Route::post('/register-user', 'UserController@register');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::post('/set-place-no-ajax', 'PlaceController@set_place_no_ajax');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
	Route::post('claim', 'ClaimController@sendToTheCompany');
	Route::get('/products/{main_product_id}/presentations', 'ProductController@get_presentations');


});

Route::group(['prefix' => 'template_2', 'namespace' => 'Template_2'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');
	Route::get('/customer', 'CustomerController@get_customer');
	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/product/{id}/description', 'ProductController@show_description');

	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');

});

Route::group(['prefix' => 'template_3', 'namespace' => 'Template_3'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');

	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');
	Route::post('/register-user', 'UserController@register');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
	Route::post('boyfriends-register', 'BoyfriendsClubController@postRegisterFromWeb');
	Route::post('claim', 'ClaimController@sendToTheCompany');
	Route::get('/customer', 'CustomerController@get_customer');

	Route::post('/message/review', 'MessageController@store_review');
	Route::get('/messages-data/{id}', 'MessageController@messages_from_blog');
	Route::post('/register-blog-message', 'MessageController@store_blog_message');

	// Route::post('/message/review', 'MessageController@store_review');

});

Route::group(['prefix' => 'template_4', 'namespace' => 'Template_4'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');

	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');
	Route::post('/register-user', 'UserController@register');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
	Route::post('boyfriends-register', 'BoyfriendsClubController@postRegisterFromWeb');
	Route::post('claim', 'ClaimController@sendToTheCompany');

	Route::get('/customer', 'CustomerController@get_customer');

});

Route::group(['prefix' => 'template_5', 'namespace' => 'Template_5'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');
	Route::post('/order-confirm-payment-izipay', 'OrderController@confirm_payment_izipay');
	Route::get('/customer', 'CustomerController@get_customer');
	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/product/{id}/description', 'ProductController@show_description');

	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');

	Route::post('/register-user', 'UserController@register');
	Route::post('claim', 'ClaimController@sendToTheCompany');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
	Route::get('/search-product', 'ProductController@search');

});

Route::group(['prefix' => 'template_6', 'namespace' => 'Template_6'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');

	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/products/name', 'ProductController@show_only_name');

	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');
	Route::post('/register-user', 'UserController@register');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
	Route::post('boyfriends-register', 'BoyfriendsClubController@postRegisterFromWeb');
	Route::post('claim', 'ClaimController@sendToTheCompany');
	Route::get('/customer', 'CustomerController@get_customer');

	Route::post('/message/review', 'MessageController@store_review');
	Route::get('/messages-data/{id}', 'MessageController@messages_from_blog');
	Route::post('/register-blog-message', 'MessageController@store_blog_message');

	// Route::post('/message/review', 'MessageController@store_review');

});

Route::group(['prefix' => 'template_7', 'namespace' => 'Template_7'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');

	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');
	Route::post('/register-user', 'UserController@register');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
	Route::post('boyfriends-register', 'BoyfriendsClubController@postRegisterFromWeb');
	Route::post('claim', 'ClaimController@sendToTheCompany');
	Route::get('/customer', 'CustomerController@get_customer');
	Route::get('/presentation-price', 'ProductController@get_presentation_price');

});

Route::group(['prefix' => 'template_7', 'namespace' => 'Template_7'], function () {
	Route::post('/contact', 'ContactController@send');
});

Route::group(['prefix' => 'template_8', 'namespace' => 'Template_8'], function () {
	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::get('/category/{id}/subcategories', 'SubcategoryController@get_by_category');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/product/{id}/main-photo', 'ProductController@show_main_photo');
	Route::post('/quotation', 'QuotationController@store');
	Route::get('/subcategory/{id}/products', 'SubcategoryController@get_products');
	Route::post('/contact', 'ContactController@send');
	Route::get('/value/{id}', 'ValueController@show');
	Route::post('/subscriptions', 'SubscriptionController@store');
});

Route::group(['prefix' => 'template_9', 'namespace' => 'Template_9'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');
	Route::get('/customer', 'CustomerController@get_customer');
	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/product/{id}/description', 'ProductController@show_description');

	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');

	Route::post('/register-user', 'UserController@register');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::post('/set-place-no-ajax', 'PlaceController@set_place_no_ajax');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
});

Route::group(['prefix' => 'template_10', 'namespace' => 'Template_10'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');
	Route::get('/customer', 'CustomerController@get_customer');
	Route::post('/register_customer', 'CustomerController@post_customer');
	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/product/{id}/description', 'ProductController@show_description');

	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');

	Route::post('/register-user', 'UserController@register');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
	Route::get('/search-product', 'ProductController@search');
	Route::get('/search-certificates', 'CustomerController@search_certificates');

});

Route::group(['prefix' => 'template_11', 'namespace' => 'Template_11'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');
	Route::get('/customer', 'CustomerController@get_customer');
	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/product/{id}/description', 'ProductController@show_description');

	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');

	Route::post('/register-user', 'UserController@register');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::post('/set-place-no-ajax', 'PlaceController@set_place_no_ajax');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
	Route::post('claim', 'ClaimController@sendToTheCompany');
	Route::post('/set-up-currency/{id}', 'CurrencyController@update');
	Route::get('/currency-setted-up', 'CurrencyController@get_currency');


});

Route::group(['prefix' => 'template_12', 'namespace' => 'Template_12'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');

	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');
	Route::post('/register-user', 'UserController@register');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
	Route::post('boyfriends-register', 'BoyfriendsClubController@postRegisterFromWeb');
	Route::post('claim', 'ClaimController@sendToTheCompany');
	Route::get('/customer', 'CustomerController@get_customer');
	Route::get('/presentation-price', 'ProductController@get_presentation_price');

});

Route::group(['prefix' => 'template_13', 'namespace' => 'Template_13'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');
	Route::get('/customer', 'CustomerController@get_customer');
	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/product/{id}/description', 'ProductController@show_description');
	Route::get('/product/{id}/description', 'ProductController@show_description');
	Route::get('/product/{id}/price', 'ProductController@get_price');

	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');

	Route::post('/register-user', 'UserController@register');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::post('/set-place-no-ajax', 'PlaceController@set_place_no_ajax');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
	Route::post('claim', 'ClaimController@sendToTheCompany');
	Route::get('/products/{main_product_id}/presentations', 'ProductController@get_presentations');


});

Route::group(['prefix' => 'template_14', 'namespace' => 'Template_14'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');

	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');
	Route::post('/register-user', 'UserController@register');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
	Route::post('boyfriends-register', 'BoyfriendsClubController@postRegisterFromWeb');
	Route::post('claim', 'ClaimController@sendToTheCompany');
	Route::get('/customer', 'CustomerController@get_customer');

	Route::post('/message/review', 'MessageController@store_review');
	Route::get('/messages-data/{id}', 'MessageController@messages_from_blog');
	Route::post('/register-blog-message', 'MessageController@store_blog_message');

	// Route::post('/message/review', 'MessageController@store_review');

});


Route::group(['prefix' => 'template_15', 'namespace' => 'Template_15'], function () {
	//Route::get('/pagination/fetch-data-cars', 'ProductController@fetch_data_cars');
	Route::get('/pagination/fetch-data-catalog', 'ProductController@fetch_data_catalog');
	Route::get('/fetch-data-products', 'ProductController@fetch_data');
	Route::get('/fetch-data-attributes', 'AttributeController@by_subcategory');
	Route::post('/quotation', 'QuotationController@store');
	Route::post('/order', 'OrderController@store');
	Route::post('/order-confirm-payment', 'OrderController@confirm_payment');
	Route::post('/order-confirm-payment-izipay', 'OrderController@confirm_payment_izipay');
	Route::get('/customer', 'CustomerController@get_customer');
	Route::get('/pagination/fetch-data-blogs', 'PostController@fetch_data_blogs');
	Route::post('/contact', 'ContactController@send');
	Route::post('/subscriptions', 'SubscriptionController@store');

	Route::get('/product/{id}/is-there-stock', 'ProductController@is_there_stock');
	Route::get('/product/{id}/description', 'ProductController@show_description');

	Route::get('/coupon/{id}/information', 'CouponController@information');
	Route::get('/country/{id}/cities', 'CountryController@cities');
	Route::get('/city/{id}/provinces', 'CountryController@provinces');
	Route::get('/province/{id}/districts', 'CountryController@districts');
	Route::get('/district/{id}/shipping-cost', 'DistrictController@get_shipping_cost');

	Route::post('/register-user', 'UserController@register');
	Route::post('claim', 'ClaimController@sendToTheCompany');

	Route::post('/set-place', 'PlaceController@set_place');
	Route::get('/products/cart-lite', 'ProductController@show_cart_lite');
	Route::get('/products/cart', 'ProductController@show_cart');
	Route::get('/place/{id}', 'PlaceController@show');
	Route::post('/quotation', 'OrderController@quotation');
	Route::get('/search-product', 'ProductController@search');

});
