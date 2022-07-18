<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});
Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'],function () {

    Route::resource('home','HomeController');
    // =========*** Start user  ***=========  \\
    Route::resource('user','Backend\User\UserController');
    // =========*** End user  ***=========  \\

    // =========*** Start client  ***=========  \\
    Route::resource('client','Backend\Client\ClientController');
    // =========*** End client  ***=========  \\

    // =========*** Start contact  ***=========  \\
    Route::resource('supplier','Backend\Supplier\SupplierController');
    // =========*** End contact  ***=========  \\

    // =========*** Start contact  ***=========  \\
    Route::resource('contact','Backend\Contact\ContactController');
    // =========*** End contact   ***=========  \\

    //  // =========*** Start  Employ   ***=========  \\
    Route::resource('employees','Backend\Employe\EmployeController');
    // =========*** End  Employ  ***=========  \\

    // =========*** Start stock  ***=========  \\
    Route::prefix('stock')->name('stock.')->group(function () {
        Route::resource('','Backend\Stock\StockController');
    });
    // =========*** End stock  ***=========  \\

    // =========*** Start product  ***=========  \\
    Route::resource('product','Backend\Stock\ProductController');
    Route::get('product/autocomplete/{search}','Backend\Stock\ProductController@autocomplete');
    // =========*** End product  ***=========  \\

    ######################### Begin invoice Routes ########################
    // Route::group(['prefix' => 'invoice/{type}/', 'as' => 'invoice'], function () {
    //     Route::get('/','Backend\Invoice\InvoiceController@index')->name('.index');
    //     Route::get('create','Backend\Invoice\InvoiceController@create')->name('.create');
    //     Route::post('store','Backend\Invoice\InvoiceController@store')->name('.store');
    //     Route::get('edit/{id}','Backend\Invoice\InvoiceController@edit')->name('.edit');
    //     Route::post('transform/{id}','Backend\Invoice\InvoiceController@transform')->name('.transform');
    //     Route::get('status/{id}/{status}','Backend\Invoice\InvoiceController@status')->name('.show');
    //     Route::get('document/{id}/{action}','Backend\Invoice\InvoiceController@generatePdf')->name('.pdf');
    //     Route::put('update/{id}','Backend\Invoice\InvoiceController@update')->name('.update');
    //     Route::delete('delete/{id}','Backend\Invoice\InvoiceController@destroy')->name('.destroy');
    // });
    ######################### End  invoice Routes  ########################
    /*******************************Achat */
    Route::resource('bcmd','Backend\Invoice\InvoiceController');
    Route::resource('breception','Backend\Invoice\InvoiceController');
    Route::resource('facture','Backend\Invoice\InvoiceController');
    /******************************end achats */
    //  // =========*** Start  User   ***=========  \\
    Route::resource('user','Backend\User\UserController');
   // Route::post('user/search/','Backend\User\UserController@search')->name('user.search');

    // =========*** End  User  ***=========  \\

    ######################### start RESTAURANT MANAGEMENT Routes  ########################
    Route::resource('revenu','Backend\Revenu\RevenuController');
    //Route::resource('table/{id}','Backend\Table\TableController');
    // =========*** End  Table  ***=========  
    //  // =========*** Start  Table   ***=========  \\
    Route::resource('table','Backend\Table\TableController');
    //Route::resource('table/{id}','Backend\Table\TableController');
    // =========*** End  Table  ***=========  \\

    //  // =========*** Start  Category   ***=========  \\
    Route::resource('category','Backend\Category\CategoryController')->except([
        'update'
    ]);
    Route::post('category/update/{id}','Backend\Category\CategoryController@update')->name('category.update');

    // =========*** End  Category  ***=========  \\

    //  // =========*** Start  propertie   ***=========  \\
    Route::resource('propertie','Backend\Propertie\PropertieController');
    // =========*** End  propertie  ***=========  \\

    //  // =========*** Start  Variation   ***=========  \\
    Route::resource('variation','Backend\Variation\VariationController');
    // =========*** End  Variation  ***=========  \\

    //  // =========*** Start  Item   ***=========  \\
    Route::resource('item','Backend\Item\ItemController')->except([
        'update'
    ]);
    Route::post('item/update/{id}','Backend\Item\ItemController@update')->name('item.update');
    // =========*** End  Item  ***=========  \\

  //  // =========*** Start  Order   ***=========  \\
    Route::resource('orders', 'Backend\Order\OrderController')->except(['create']);
    Route::post('orders/status/{id}/{status}','Backend\Order\OrderController@status')->name('orders.status');


    // =========*** End  Order  ***=========  \\

    // =========*** Start  Order   ***=========  \\
    Route::resource('settings', 'Backend\Settings\SettingsController')->except(['create']);
    // =========*** End  Order  ***=========  \\

    ######################### End  RESTAURANT MANAGEMENT Routes  ########################


    Route::post('/getData', [App\Http\Controllers\HomeController::class, 'getData'])->name('home');


});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
