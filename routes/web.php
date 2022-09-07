<?php


Auth::routes();

Route::get('/', 'HomeController@index');
Route::post('/search', 'HomeController@search');

Route::get('/regija/{id}', 'RegijeController@index');
Route::get('/kategorija/{id}', 'CategoryController@index');

Route::get('/o-nama', 'HomeController@onama');

Route::group(['middleware' => ['auth']], function () { 

//vendori
Route::get('/admin', 'AdminController@index');
Route::get('/admin/vendor', 'AdminController@vendor');
Route::get('/admin/vendor/edit/{id}', 'AdminController@vendorEdit');
Route::post('/admin/vendor/edit/update', 'AdminController@updateVendor');
Route::get('/admin/vendor/delete/{id}', 'AdminController@deleteVendor');
Route::get('/admin/vendors', 'AdminController@vendors');
Route::post('/admin/vendor/store', 'AdminController@StoreVendor');
Route::get('/admin/vendor/jedanstupac/{id}', 'AdminController@vendorJedanStupac');
Route::post('/admin/vendor/sadrzajone/store', 'AdminController@StoreVendorSadrzajOne');
Route::post('/admin/vendor/sadrzajone/edit/update', 'AdminController@updateVendorSadrzajOne');

Route::get('/admin/vendor/{id}/favorite', 'AdminController@setFavorite');
Route::get('/admin/vendor/{id}/unfavorite', 'AdminController@removeFavorite');

//admin vendor kategorije
Route::get('/admin/vendor/kategorije', 'AdminController@vendorKategorije');
Route::get('/admin/vendor/kategorija/{id}/edit', 'AdminController@vendorTwo');
Route::post('/admin/vendor/kategorije/store', 'AdminController@storeKategorije');
Route::get('/admin/vendor/kategorije/delete/{id}', 'AdminController@deleteKategorijU');

//admin vendor oznake
Route::get('/admin/vendor/oznake', 'TagsController@index');
Route::get('/admin/vendor/oznaka/{id}/edit', 'TagsController@index');
Route::post('/admin/vendor/oznake/store', 'TagsController@storeTag');
Route::get('/admin/vendor/oznaka/delete/{id}', 'TagsController@deleteTag');

//admin vendor statusi
Route::get('/admin/vendor/statusi', 'AdminController@vendorStatusi');
Route::get('/admin/vendor/status/{id}/edit', 'AdminController@editVendorStatus');
Route::post('/admin/vendor/statusi/store', 'AdminController@storeStatus');

//admin narudžbe
Route::get('/admin/narudjbe', 'AdminController@showOrders');
Route::get('/admin/narudjba/{id}', 'AdminController@showOrder');
Route::get('/admin/order/status/2/{id}', 'AdminController@orderDone');
Route::get('/admin/narudjbe/obrisi/{id}', 'AdminController@deleteOrder');


Route::get('/admin/proizvod/oznake/', 'AdminTagsController@index');
Route::post('/admin/proizvod/oznake/store', 'AdminTagsController@store');
Route::get('/admin/proizvod/oznake/obrisi/{id}', 'AdminTagsController@destroy');


//admin dodavanje proizvoda
Route::get('/admin/proizvod/{id_vendora}', 'TrgovinaController@dodajNoviProizvod');
Route::post('/admin/proizvod/store', 'TrgovinaController@storeProizvod');
Route::get('/admin/proizvodi', 'AdminProductsController@displayAllProducts');
Route::get('/admin/proizvod/edit/{id}', 'AdminProductsController@editProduct');
Route::post('/admin/proizvod/image/delete', 'AdminProductsController@deleteImage');
Route::post('/admin/proizvod/update', 'AdminProductsController@updateProduct');

Route::get('/admin/proizvod/kategorije/sve', 'AdminProductCategoriesController@allCategories');
Route::post('/admin/proizvod/kategorije/dodaj', 'AdminProductCategoriesController@storeNewProductCategory');

});


Route::get('/oznaka/{id}', 'TagsController@displayProductsByTag');

Route::get('/{id}', 'VendorController@getVendor');

Route::get('/shop/proizvod/{id}', 'TrgovinaController@showProizvod');
Route::post('/shop/add-to-cart', 'TrgovinaController@addToCart');
Route::get('/shop/kosarica', 'TrgovinaController@showKosarica');
Route::get('/shop/isprazni_kosaricu', 'TrgovinaController@deleteKosarica');
Route::get('/shop/placanje', 'CheckoutController@index');
Route::get('/shop/{id_kategorije}', 'TrgovinaController@shop');
Route::get('/shop/{id_kategorije}/{sort_by}', 'TrgovinaController@shop');

Route::post('/shop/narudjba', 'TrgovinaController@order');
Route::get('/narudjba-zaprimljena/{id}', 'TrgovinaController@orderReceived');

Route::get('/objave/{id}', 'ArticlesController@index');

Route::post('/send-contact-email', 'ContactController@sendEmail');
