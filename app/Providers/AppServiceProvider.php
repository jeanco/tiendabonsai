<?php

namespace App\Providers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		//LLamar de manera individual
		//View::composer('users.login', 'App\Http\ViewComposers\CompanyComposer');
		/* View::composer(['users.login','product.inventario.catalogo.list-new','product.inventario.movimientos.list-view','product.inventario.operation.list-view','cash.orders.view-list','error.erro403','error.erro404','operation.sales.searchproduct','operation.sales.view','layouts.secciones.header'], 'App\Http\ViewComposers\CompanyComposer');*/

		//También se pueden llamar varios composers desde este service provider para una o mas vistas desde el método boot
		Validator::extend('alpha_spaces', function ($attribute, $value) {
			return preg_match('/^[\pL\s]+$/u', $value);
		});

		View::composers(['App\Http\Controllers\Website\GlobalVariable\HeaderController' => ['website.home.index', 'website.catalog.index', 'website.stores.index', 'website.catalog.perfil.index', 'website.checkout.check_out', 'website.checkout.order_complete', 'website.checkout.shopping_cart', 'website.blog.index', 'website.blog.perfil.index', 'website.contact.index', 'website.about_as.index', 'website.login.index', 'website.suscription.index', 'oyeepe.home.index', 'oyeepe.catalog.perfil.index', 'oyeepe.catalog.index', 'oyeepe.pedidos.index', 'oyeepe.empresa.register.index', 'oyeepe.users.register.index', 'oyeepe.users.perfil.index', 'oyeepe.checkout.shopping_cart', 'oyeepe.checkout.check_out', 'oyeepe.stores.index', 'oyeepe.checkout.order_complete', 'oyeepe.login.index', 'oyeepe.contact.index', 'oyeepe.users.perfil.pdf.index', 'oyeepe.users.cupon.index', 'website.catalog.perfil.2_product_right', 'miranda.home.index', 'miranda.catalog.index', 'miranda.catalog.perfil.index', 'miranda.about_as.index', 'miranda.contact.index', 'miranda.blog.index', 'miranda.blog.perfil.index', 'miranda.users.login.index', 'miranda.users.register.index', 'yekatex.home.index', 'miranda.layouts.index', 'website.layouts.index', 'oyeepe.layouts.index', 'yekatex.layouts.index', 'yekatex.contact.index', 'antofagasta.layouts.index', 'antofagasta.home.index', 'antofagasta.contact.index', 'antofagasta.catalog.index', 'antofagasta.catalog.perfil.index', 'divemotor.checkout.order_view', 'divemotor.faq.index', 'wings.layouts.index', 'wings.home.index', 'wings.about_as.index', 'wings.cars.index', 'wings.catalog.index', 'wings.blog.index', 'wings.blog.perfil.index', 'wings.contact.index', 'wings.services.index', 'wings.checkout.check_out', 'wings.checkout.confirmation', 'wings.checkout.order_complete', 'wings.checkout.quotation', 'wings.checkout.shopping_cart', 'wings.concessionaire.index'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

		View::composers(['App\Http\Controllers\Template_1\GlobalController' => ['template_1.home.index', 'template_1.we.index', 'template_1.layouts.sections.header', 'template_1.catalog.index', 'template_1.users.register.index', 'template_1.blog.index', 'template_1.layouts.index', 'template_1.suscription.index', 'template_1.contact.index', 'template_1.catalog.perfil.index', 'template_1.quotation.index', 'template_1.payment_methods.index', 'template_1.delivery_methods.index', 'template_1.returns_exchanges.index', 'template_1.terms_conditions.index', 'template_1.privacy_policies.index',
			'template_1.checkout.1_shopping_cart',
			'template_1.checkout.2_check_out', 'template_1.users.perfil.pdf.index', 'template_1.emails.order_to_pay','template_1.construction.index', 'template_1.complaints_book.index'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);
		View::composers(['App\Http\Controllers\Template_2\GlobalController' => ['template_2.home.index', 'template_2.we.index', 'template_2.layouts.sections.header', 'template_2.catalog.index', 'template_2.users.register.index', 'template_2.blog.index', 'template_2.layouts.index', 'template_2.suscription.index', 'template_2.contact.index', 'template_2.catalog.perfil.index', 'template_2.quotation.index',
			'template_2.checkout.1_shopping_cart',
			'template_2.checkout.2_check_out', 'template_2.users.perfil.pdf.index', 'template_2.services.perfil.index', 'template_2.normativa.index', 'template_2.services.index', 'template_2.emails.order_to_pay','template_2.cita.index'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

		View::composers(['App\Http\Controllers\Template_3\GlobalController' => ['template_3.home.index', 'template_3.we.index', 'template_3.layouts.sections.header', 'template_3.catalog.index', 'template_3.users.register.index', 'template_3.blog.index', 'template_3.layouts.index', 'template_3.contact.index', 'template_3.catalog.perfil.index', 'template_3.quotation.index', 'template_3.support.index', 'template_3.suscription.index', 'template_3.emails.order', 'template_3.emails.users.perfil.index', 'template_3.users.perfil.pdf.index','template_3.construction.index','template_3.errors.404'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

		View::composers(['App\Http\Controllers\Template_4\GlobalController' => ['template_4.home.index', 'template_4.we.index', 'template_4.layouts.sections.header', 'template_4.catalog.index', 'template_4.users.register.index', 'template_4.blog.index', 'template_4.layouts.index', 'template_4.contact.index', 'template_4.catalog.perfil.index', 'template_4.quotation.index', 'template_4.support.index', 'template_4.suscription.index', 'template_4.services.index', 'template_4.emails.order', 'template_4.emails.users.perfil.index', 'template_4.complaints_book.index', 'template_4.payment_methods.index', 'template_4.delivery_methods.index', 'template_4.returns_exchanges.index', 'template_4.terms_conditions.index', 'template_4.privacy_policies.index', 'template_4.suscription.gift', 'template_4.users.perfil.pdf.index','template_4.checkout.2_check_out','template_4.construction.index'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

		View::composers(['App\Http\Controllers\Template_5\GlobalController' => ['template_5.home.index', 'template_5.we.index', 'template_5.layouts.sections.header', 'template_5.catalog.index', 'template_5.users.register.index', 'template_5.blog.index', 'template_5.layouts.index', 'template_5.suscription.index', 'template_5.contact.index', 'template_5.catalog.perfil.index', 'template_5.quotation.index', 'template_5.emails.order',
			'template_5.checkout.1_shopping_cart',
			'template_5.checkout.2_check_out','template_5.checkout.3_order_complete', 'template_5.payment_methods.index', 'template_5.delivery_methods.index', 'template_5.returns_exchanges.index', 'template_5.terms_conditions.index', 'template_5.users.perfil.pdf.index', 'template_5.complaints_book.index'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

		View::composers(['App\Http\Controllers\Template_6\GlobalController' => ['template_6.home.index', 'template_6.we.index', 'template_6.layouts.sections.header', 'template_6.catalog.index', 'template_6.users.register.index', 'template_6.blog.index', 'template_6.layouts.index', 'template_6.contact.index', 'template_6.catalog.perfil.index', 'template_6.quotation.index', 'template_6.support.index', 'template_6.suscription.index', 'template_6.checkout.2_check_out', 'template_2.emails.order', 'template_6.emails.users.perfil.index', 'template_6.users.perfil.pdf.index'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

		View::composers(['App\Http\Controllers\Template_7\GlobalController' => ['template_7.home.index', 'template_7.we.index', 'template_7.layouts.sections.header', 'template_7.catalog.index', 'template_7.users.register.index', 'template_7.blog.index', 'template_7.layouts.index', 'template_7.contact.index', 'template_7.catalog.perfil.index', 'template_7.quotation.index', 'template_7.support.index', 'template_7.suscription.index', 'template_7.services.index', 'template_7.emails.order', 'template_7.emails.users.perfil.index', 'template_7.complaints_book.index', 'template_7.payment_methods.index', 'template_7.delivery_methods.index', 'template_7.returns_exchanges.index', 'template_7.terms_conditions.index', 'template_7.privacy_policies.index', 'template_7.suscription.gift', 'template_7.users.perfil.pdf.index'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

		View::composers(['App\Http\Controllers\Template_8\GlobalController' => ['template_8.home.index', 'template_8.we.index', 'template_8.layouts.sections.header', 'template_8.catalog.index', 'template_8.users.register.index', 'template_8.blog.index', 'template_8.layouts.index', 'template_8.contact.index', 'template_8.catalog.perfil.index', 'template_8.quotation.index', 'template_8.support.index', 'template_8.suscription.index', 'template_8.services.index', 'template_8.emails.order', 'template_8.emails.users.perfil.index', 'template_8.complaints_book.index', 'template_8.payment_methods.index', 'template_8.delivery_methods.index', 'template_8.returns_exchanges.index', 'template_8.terms_conditions.index', 'template_8.privacy_policies.index', 'template_8.suscription.gift', 'template_8.users.perfil.pdf.index', 'template_8.quotation.form', 'template_8.pdf.index'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

		View::composers(['App\Http\Controllers\Template_9\GlobalController' => ['template_9.home.index', 'template_9.we.index', 'template_9.layouts.sections.header', 'template_9.catalog.index', 'template_9.users.register.index', 'template_9.blog.index', 'template_9.layouts.index', 'template_9.suscription.index', 'template_9.contact.index', 'template_9.catalog.perfil.index', 'template_9.quotation.index', 'template_9.payment_methods.index', 'template_9.delivery_methods.index', 'template_9.returns_exchanges.index', 'template_9.terms_conditions.index', 'template_9.privacy_policies.index',
			'template_9.checkout.1_shopping_cart',
			'template_9.checkout.2_check_out', 'template_9.users.perfil.pdf.index', 'template_9.emails.order_to_pay'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

		View::composers(['App\Http\Controllers\Template_10\GlobalController' => ['template_10.home.index', 'template_10.we.index', 'template_10.layouts.sections.header', 'template_10.catalog.index', 'template_10.users.register.index', 'template_10.blog.index', 'template_10.layouts.index', 'template_10.suscription.index', 'template_10.contact.index', 'template_10.catalog.perfil.index', 'template_10.quotation.index', 'template_10.emails.order',
			'template_10.checkout.1_shopping_cart',
			'template_10.checkout.2_check_out', 'template_10.payment_methods.index', 'template_10.delivery_methods.index', 'template_10.returns_exchanges.index', 'template_10.terms_conditions.index', 'template_10.users.perfil.pdf.index','template_10.construction.index','template_10.service.perfil.index'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

		View::composers(['App\Http\Controllers\Template_11\GlobalController' => ['template_11.home.index', 'template_11.we.index', 'template_11.layouts.sections.header', 'template_11.catalog.index', 'template_11.users.register.index', 'template_11.blog.index', 'template_11.layouts.index', 'template_11.suscription.index', 'template_11.contact.index', 'template_11.catalog.perfil.index', 'template_11.quotation.index', 'template_11.payment_methods.index', 'template_11.delivery_methods.index', 'template_11.returns_exchanges.index', 'template_11.terms_conditions.index', 'template_11.privacy_policies.index',
			'template_11.checkout.1_shopping_cart',
			'template_11.checkout.2_check_out', 'template_11.users.perfil.pdf.index', 'template_11.users.perfil.pdf.order', 'template_11.emails.order_to_pay','template_11.construction.index', 'template_11.complaints_book.index', 'template_11.catalog.3_right_catalog'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

			View::composers(['App\Http\Controllers\Template_12\GlobalController' => ['template_12.home.index', 'template_12.we.index', 'template_12.layouts.sections.header', 'template_12.catalog.index', 'template_12.users.register.index', 'template_12.blog.index', 'template_12.layouts.index', 'template_12.contact.index', 'template_12.catalog.perfil.index', 'template_12.quotation.index', 'template_12.support.index', 'template_12.suscription.index', 'template_12.services.index', 'template_12.emails.order', 'template_12.emails.users.perfil.index', 'template_12.complaints_book.index', 'template_12.payment_methods.index', 'template_12.delivery_methods.index', 'template_12.returns_exchanges.index', 'template_12.terms_conditions.index', 'template_12.privacy_policies.index', 'template_12.suscription.gift', 'template_12.users.perfil.pdf.index','template_12.construction.index'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

			View::composers(['App\Http\Controllers\Template_13\GlobalController' => ['template_13.home.index', 'template_13.we.index', 'template_13.layouts.sections.header', 'template_13.catalog.index', 'template_13.users.register.index', 'template_13.blog.index', 'template_13.layouts.index', 'template_13.suscription.index', 'template_13.contact.index', 'template_13.catalog.perfil.index', 'template_13.quotation.index', 'template_13.payment_methods.index', 'template_13.delivery_methods.index', 'template_13.returns_exchanges.index', 'template_13.terms_conditions.index', 'template_13.privacy_policies.index',
			'template_13.checkout.1_shopping_cart',
			'template_13.checkout.2_check_out', 'template_13.users.perfil.pdf.index', 'template_13.emails.order_to_pay','template_13.construction.index', 'template_13.complaints_book.index'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

			View::composers(['App\Http\Controllers\Template_14\GlobalController' => ['template_14.home.index', 'template_14.we.index', 'template_14.layouts.sections.header', 'template_14.catalog.index', 'template_14.users.register.index', 'template_14.blog.index', 'template_14.layouts.index', 'template_14.contact.index', 'template_14.catalog.perfil.index', 'template_14.quotation.index', 'template_14.support.index', 'template_14.suscription.index', 'template_14.emails.order', 'template_14.emails.users.perfil.index','template_14.services.index', 'template_14.users.perfil.pdf.index','template_14.construction.index','template_14.errors.404'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

		View::composers(['App\Http\Controllers\Template_15\GlobalController' => ['template_15.home.index', 'template_15.we.index', 'template_15.layouts.sections.header', 'template_15.catalog.index', 'template_15.users.register.index', 'template_15.blog.index', 'template_15.layouts.index', 'template_15.suscription.index', 'template_15.contact.index', 'template_15.catalog.perfil.index', 'template_15.quotation.index', 'template_15.emails.order',
			'template_15.checkout.1_shopping_cart',
			'template_15.checkout.2_check_out','template_15.checkout.3_order_complete', 'template_15.payment_methods.index', 'template_15.delivery_methods.index', 'template_15.returns_exchanges.index', 'template_15.terms_conditions.index', 'template_15.users.perfil.pdf.index', 'template_15.complaints_book.index'],
			//'App\Http\ViewComposers\LoginComposer' => 'users.login'
		]);

	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
