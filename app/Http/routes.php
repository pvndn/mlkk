<?php


Route::group([ 'prefix' => 'admin' ], function () {
	Route::group([ 'middleware' => ['auth:web_users'] ], function () {

		Route::group([ 'namespace' => 'Admin' ], function () {

			Route::get('/', [ 'as' => 'admin.dashboard', 'uses' => 'AdminsController@dashboard' ]);

			Route::resource('/category', 'CategoriesController');
			Route::post('/category/publish', [ 'as' => 'admin.category.publish', 'uses' => 'CategoriesController@publish' ]);

			Route::resource('/page', 'PagesController');
			Route::post('/page/publish', [ 'as' => 'admin.page.publish', 'uses' => 'PagesController@publish' ]);

			Route::resource('/slider', 'SliderController');
			Route::post('/slider/publish', [ 'as' => 'admin.slider.publish', 'uses' => 'SliderController@publish' ]);

			Route::resource('/news', 'NewsController');
			Route::post('/news/publish', [ 'as' => 'admin.news.publish', 'uses' => 'NewsController@publish' ]);

			Route::get('/orders', [ 'as' => 'admin.orders.index', 'uses' => 'OrderController@index' ]);
			Route::get('/orders/{id}', [ 'as' => 'admin.orders.show', 'uses' => 'OrderController@show' ]);
			Route::PUT('/orders-remove/{id}', [ 'as' => 'admin.orders.remove', 'uses' => 'OrderController@remove' ]);
			Route::PUT('/orders-pay/{id}', [ 'as' => 'admin.orders.pay', 'uses' => 'OrderController@pay' ]);

			Route::resource('/product', 'ProductsController');
			Route::post('/product/publish', [ 'as' => 'admin.product.publish', 'uses' => 'ProductsController@publish' ]);
			Route::delete('/album/{album?}', [ 'as' => 'admin.product.album', 'uses' => 'ProductsController@album' ]);

			Route::resource('/menu', 'MenusController');
			Route::post('/menu/publish', [ 'as' => 'admin.menu.publish', 'uses' => 'MenusController@publish' ]);
			Route::get('/menu/add/{menuID}', [ 'as' => 'admin.menu.add', 'uses' => 'MenusController@getAddItem' ]);
			Route::post('/menu/add', [ 'as' => 'admin.menu.postadd', 'uses' => 'MenusController@postAddItem' ]);
			Route::post('/menu/update', [ 'as' => 'admin.menu.postupdate', 'uses' => 'MenusController@postUpdate' ]);

			Route::resource('/gallery', 'GalleriesController');

			Route::resource('/project', 'ProjectController');

			Route::resource('/partner', 'PartnerController');

			Route::get('/contact', [ 'as' => 'admin.contact.index', 'uses' => 'ContactController@index' ]);
			Route::delete('/contact/{id}', [ 'as' => 'admin.contact.destroy', 'uses' => 'ContactController@remove' ]);
			Route::PATCH('/contact/{id}', [ 'as' => 'admin.contact.saw', 'uses' => 'ContactController@saw' ]);

			Route::resource('/settings',  'SettingController');

			Route::get('/register', [ 'as' => 'admin.register', 'uses' => 'AdminsController@getRegister' ]);
			Route::post('/register', [ 'as' => 'admin.doregister', 'uses' => 'AdminsController@register' ]);
		});

		Route::get('/logout', [ 'as' => 'admin.logout', 'uses' => 'Users\AuthController@logout' ]);

	});

	Route::group([ 'middleware' => ['XSS'] ], function () {
		Route::get('/login', [ 'as' => 'admin.login', 'uses' => 'Users\AuthController@index' ]);
		Route::post('/login', [ 'as' => 'admin.dologin', 'uses' => 'Users\AuthController@login' ]);

		Route::get('/password/reset/{token?}', [ 'as' => 'admin.forgot', 'uses' => 'Users\PasswordController@showResetForm' ]);
		Route::post('/password/email', [ 'as' => 'admin.sendmail', 'uses' => 'Users\PasswordController@sendResetLinkEmail' ]);
		Route::post('/password/reset', [ 'as' => 'admin.doforgot', 'uses' => 'Users\PasswordController@reset' ]);
	});
});

Route::get('/', [ 'as' => 'client.site', 'uses' => 'HomeController@index' ]);

Route::get('sitemap.xml', 'SitemapController@generate');

Route::get('feed', 'FeedController@generate');

Route::group([ 'namespace' => 'Cart' ], function () {
	Route::get('/gio-hang', [ 'as' => 'get.cart', 'uses' => 'ShoppingCartController@index' ]);
	Route::post('/gio-hang', [ 'as' => 'post.cart', 'uses' => 'ShoppingCartController@index' ]);
});

Route::get('dataJson', [ 'as' => 'data.json', 'uses' => 'HomeController@_dataJSON' ]);

Route::get('tim-kiem', [ 'as' => 'get.search', 'uses' => 'HomeController@search' ]);

Route::get('dat-hang', [ 'as' => 'get.order', 'uses' => 'OrderController@getOrder' ]);

Route::group([ 'middleware' => ['XSS'] ], function () {
	Route::post('dat-hang', [ 'as' => 'post.order', 'uses' => 'OrderController@order' ]);
	Route::post('contact', [ 'as' => 'post.contact', 'uses' => 'HomeController@contact' ]);
});

Route::get('/{category}/', [ 'as' => 'client.category', 'uses' => 'HomeController@category' ])->where([ 'category' => '[a-z0-9-]+' ]);

Route::get('/{category}/{post}/', [ 'as' => 'client.posts', 'uses' => 'HomeController@single' ])->where([ 'category' => '[a-z0-9-]+', 'post' => '[a-z0-9-]+' ]);
