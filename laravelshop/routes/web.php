<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('.home');
// });

// Route::get('/',function() {
// 	return view('pages.home');
// });
Route::get('/master',function() {
	return view('admin.category.add');
});

Route::get('show',function() {
	return view('admin.category.show');
});

Route::get('test', function(){
   
   return view('admin.size.show');
});
Route::get('/','HomeController@index')->name('index');
Route::group(['prefix'=>'admin'],function() {
	/*================================='Category'============================================*/
	Route::get('dashboard','UserController@getDashboard')->name('admin.index');
	Route::group(['prefix'=>'category'],function() {
		Route::resource('list','CategoryController');
		Route::get('images','CategoryController@getImages')->name('admin.category.getImages');
		// Route::post('images','CategoryController@postImages')->name('admin.category.postImages');
		Route::post('addPost','CategoryController@postAdd')->name('admin.category.postAdd');
	    Route::get('edit/{id}','CategoryController@getEdit')->name('admin.category.getEdit');
		Route::post('editPost','CategoryController@editPost')->name('admin.category.editPost');
		Route::post('deletePost','CategoryController@deletePost')->name('admin.category.deletepost');
	    Route::post('deletechecked','CategoryController@deletechecked')->name('admin.category.deletechecked');
	});
    /*==============================='Producttype==============================================='*/
    Route::group(['prefix'=>'producttype'],function() {
		Route::get('list','ProducttypeController@getList')->name('admin.producttype.list');
		Route::get('add','ProducttypeController@getAdd')->name('admin.producttype.getAdd');
		Route::post('add','ProducttypeController@postAdd')->name('admin.producttype.postAdd');
		Route::get('edit/{id}','ProducttypeController@getEdit')->name('admin.producttype.getEdit');
		Route::post('edit','ProducttypeController@postEdit')->name('admin.producttype.postEdit');
		Route::post('delete','ProducttypeController@postDelete')->name('admin.producttype.postDelete');
		Route::post('deletechecked','ProducttypeController@deletechecked')->name('admin.category.deletechecked');
	});
    /*================================'Product====================================================*/
	 Route::group(['prefix'=>'product'],function() {
		Route::get('list','ProductController@getList')->name('admin.product.list');
		Route::get('add','ProductController@getAdd')->name('admin.product.getAdd');
		Route::get('adddetailt/{id}','ProductController@getaddDetailt')->name('admin.product.getaddDetailt');
		Route::post('adddetailt','ProductController@postaddDetailt')->name('admin.product.postaddDetailt');
		Route::post('add','ProductController@postAdd')->name('admin.product.postAdd');
		Route::post('delete','ProductController@postDelete')->name('admin.product.postDelete');
		Route::post('adddetailt/deleteclient','ProductController@fileDestroy')->name('productdetailt.deleteclient');
	});

	/*================================'Slide====================================================*/
	 Route::group(['prefix'=>'slide'],function() {
		Route::get('list','SlideController@getList')->name('admin.slide.list');
		Route::get('add','SlideController@getAdd')->name('admin.slide.getAdd');
		Route::post('add','SlideController@postAdd')->name('admin.slide.postAdd');
		Route::post('delete','SlideController@postDelete')->name('admin.slide.postDelete');
	Route::post('deletechecked','SlideController@deletechecked')->name('admin.slide.deletechecked');
	});

		/*================================'Bill====================================================*/
	Route::group(['prefix'=>'bill'],function() {
		Route::get('list','BillController@getBill')->name('admin.bill.list');
		Route::get('update','BillController@updateBill')->name('admin.bill.updateBill');
		Route::post('delete','BillController@deleteBill')->name('admin.bill.deleteBill');

	});

	Route::group(['prefix'=>'size'],function() {
        Route::get('add', 'SizeController@getSize')->name('admin.size.getSize');
        Route::post('add', 'SizeController@postSize')->name('admin.size.postSize');
	});

});
    //Ajax
    Route::get('getProductype', 'AjaxController@getProducttype')->name('admin.getProducttype');
    Route::get('callback/{social}', 'UserController@handleProviderCallback');
    Route::get('login/{social}', 'UserController@redirectToProvider')->name('facebook.login');
    // Route::get('register', 'UserController@getRegister')->name('getRegister');
    Route::get('login', 'UserController@getLogin')->name('getLogin');
    Route::post('login', 'UserController@postLogin')->name('postLogin');
    Route::get('register', 'UserController@getRegister')->name('getRegister');
    Route::post('register', 'UserController@postRegister')->name('postRegister');
    Route::get('logout', 'UserController@logout')->name('logout');

    /*================================'Cart====================================================*/
    Route::group(['prefix'=>'cart'],function() {
    	Route::get('list', 'ShoppingCartController@getList')->name('listCart');
        Route::get('addCart', 'ShoppingCartController@getaddCart')->name('addCart');
        Route::get('updateCart', 'ShoppingCartController@getupdateCart')->name('updateCart');
        Route::get('delete', 'ShoppingCartController@getdeleteCart')->name('deleteCart');
        Route::get('checkout', 'ShoppingCartController@checkout')->name('checkoutCart');
        Route::get('love', 'ShoppingCartController@cartLove')->name('cartLove');
        // Route::post('addCart', 'SizeController@postSize')->name('admin.size.postSize');
	});
     /*================================'Customer====================================================*/
	Route::group(['prefix'=>'customer'],function() {
    	Route::post('add', 'CustomerController@postAdd')->name('addCustomer');
        // Route::get('addCart/{id}', 'ShoppingCartController@getaddCart')->name('addCart');
        // Route::get('updateCart', 'ShoppingCartController@getupdateCart')->name('updateCart');
        // Route::get('delete', 'ShoppingCartController@getdeleteCart')->name('deleteCart');
        // Route::get('checkout', 'ShoppingCartController@checkout')->name('checkoutCart');
        // Route::post('addCart', 'SizeController@postSize')->name('admin.size.postSize');
	});

	Route::get('products/{slug}-{id}.html', 'HomeController@singleProduct')
	->where('slug', '[a-zA-Z0-9-_]+')
	->where('id', '[0-9]+') 
	->name('single-product');
	Route::get('product/list', 'HomeController@listProduct')->name('list-product');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('form','FormController@create');
Route::post('form','FormController@store');
