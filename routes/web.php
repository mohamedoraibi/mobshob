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

//Route::get('/', function () {
//    return view('welcome');
//});

//---------- Main Page Routes---------//

// Sort A-Z Mobiles Page
Route::get('/filter/AtoZ', 'UserController@getAtoZ');
// Sort Z-A Mobiles Page
Route::get('/filter/ZtoA', 'UserController@getZtoA');
// Sort Big Price first
Route::get('/filter/bigPrice', 'UserController@getbigPrice');
// Sort Low Price first
Route::get('/filter/lowPrice', 'UserController@getlowPrice');

// Samsung Mobiles Page
Route::get('/samsung', 'UserController@getSamsung');

// Iphone Mobiles Page
Route::get('/iphone', 'UserController@getIphone');

// Item Description Mobiles Page
Route::get('/description/{id}', 'UserController@getItemDescription');

// About us Page
Route::get('/aboutus', 'UserController@getAboutUs');

// Search main
Route::get('search/', 'UserController@searchMain');
Route::get('search/samsung/', 'UserController@searchSamsung');
Route::get('search/iphone/', 'UserController@searchIphone');

//---------- Auth  Routes---------//
Route::group(['middleware' => 'guest', 'prefix' => '/auth'], function () {
    Route::get('register', 'UserController@getRegister');
    Route::post('register', 'UserController@AttemptRegister')->name('auth.register');;
    Route::get('login', 'UserController@getLogin');
    Route::post('login', 'UserController@AttemptLogin')->name('auth.login');
});
Route::group(['middleware' => 'auth.user'], function () {
    Route::get('auth/logout', 'UserController@logout');
});

//---------- Dashboard Page Routes---------//

// Dashboards Access
Route::get('/', 'UserController@getAll');
Route::get('/dashboard', 'AdminController@getDashboard');

//----------Adminstrator Page in Dashboard---------//

// Adminstrator Access
Route::get('/dashboard/admins', 'AdminController@getAdmins');

// Adminstrator Delete & Insert
Route::get('/dashboard/admins/delete/{id}', 'AdminController@deleteAdmin');
Route::post('/dashboard/admins/insert', 'AdminController@insertAdmin');
// Adminstrator Update
Route::post('/dashboard/admins/update/submit', 'AdminController@updateAdmin');
Route::get('/dashboard/admins/update/{id}', 'AdminController@updateAdminPage');
// Adminstrator ResetPassword
Route::get('/dashboard/admins/resetPassword/{id}', 'AdminController@resetPasswordAdminPage');
Route::get('/dashboard/admins/resetPassword/submit/{id}', 'AdminController@resetPasswordAdmin');
// Adminstrator Search
Route::get('/dashboard/admins/search/', 'AdminController@index');


//----------Users Page in Dashboard---------//
// User Access
Route::get('/dashboard/users', 'UserController@getUsers');

// User Delete & Insert
Route::get('/dashboard/users/delete/{id}', 'UserController@deleteUser');
Route::post('/dashboard/users/insert', 'UserController@insertUser');

// User Search
Route::get('/dashboard/users/search/', 'UserController@index');

// User Update
Route::post('/dashboard/users/update/submit', 'UserController@updateUser');
Route::get('/dashboard/users/update/{id}', 'UserController@updateUserPage');

//----------Items Page in Dashboard---------//
Route::get('/dashboard/items', 'ItemController@getItems');

// Item Delete & Insert
Route::get('/dashboard/items/delete/{id}', 'ItemController@deleteItem');
Route::post('/dashboard/items/insert', 'ItemController@insertItem');

// Item Update
Route::post('/dashboard/items/update/submit', 'ItemController@updateItem');
Route::get('/dashboard/items/update/{id}', 'ItemController@updateItemPage');

// Item Search
Route::get('/dashboard/items/search/', 'ItemController@index');


//----------Categories Page in Dashboard---------//
Route::get('/dashboard/categories', 'CategoriesController@getCategories');

// Categories Delete & Insert
Route::get('/dashboard/categories/delete/{id}', 'CategoriesController@deleteCategories');
Route::post('/dashboard/categories/insert', 'CategoriesController@insertCategories');

// Categories Search
Route::get('/dashboard/categories/search/', 'CategoriesController@index');

// Categories Update
Route::post('/dashboard/categories/update/submit', 'CategoriesController@updateCategories');
Route::get('/dashboard/categories/update/{id}', 'CategoriesController@updateCategoriesPage');