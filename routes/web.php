<?php

use App\Http\Controllers\New\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('welcome');
});

Route::get('/welcome', function () {
    return view('Farm.welcome');
})->middleware(['auth'])->name('welcome');
// Home route
Route::get('/home', function () {
    return view('Farm.home');
})->middleware(['auth'])->name('home');

Route::group(['middleware' => 'auth', 'namespace' => 'App\Http\Controllers\Farm'], function () {

    #Region for [First & Last period Routes]
        //  First Period
        Route::get('/first-period','CapitalController@indexFirstPeriod')->name('allFirstPeriod');
        Route::get('/create-FirstPeriod','CapitalController@createFirst_LastPeriod')->name('createFirst_LastPeriod');
        Route::post('/sotre-period','CapitalController@storeFirst_lastPeriod')->name('storeFirst_lastPeriod');

        Route::get('/edit-FirstPeriod/{id}','CapitalController@editFirst_LastPeriod')->name('editFirst_LastPeriod');
        Route::post('/update-period/{id}','CapitalController@updateFirst_lastPeriod')->name('updateFirst_lastPeriod');
        Route::delete('/delete-period/{id}', 'CapitalController@deleteFirst_LastPeriod')->name('deleteFirst_LastPeriod');

        // Last Period
        Route::get('/last-period','CapitalController@indexLastPeriod')->name('allLastPeriod');

    #End Region

    #Region for [Categories Routes]
        Route::get('/all-Balances','CategoryController@getAllBalances')->name('allBalances');
        Route::get('/create-Balances','CategoryController@createBalance')->name('createBalance');
        Route::post('/all-Balance','CategoryController@storeBalances')->name('storeBalance');
        Route::get('/edit-Balance/{id}', 'CategoryController@editBalance')->name('editBalance');
        Route::post('/update-Balance/{id}', 'CategoryController@updateBalance')->name('updateBalance');
        Route::delete('/delete-Balance/{id}', 'CategoryController@destroyBalance')->name('deleteBalance');
    #End Region

    #Region for [Sales Routes]
        Route::get('/all-Sales','CapitalController@allSales')->name('allSales');
        Route::get('/create-Sales','CapitalController@createSales')->name('createSales');
        Route::post('/all-Sales','CapitalController@storeSales')->name('storeSales');
        Route::get('/edit-Sales/{id}', 'CapitalController@editSales')->name('editSales');
        Route::post('/update-Sales/{id}', 'CapitalController@updateSales')->name('updateSales');
        Route::delete('/delete-Sales/{id}', 'CapitalController@deleteSales')->name('deleteSales');
    #End Region

    #Region for [Users Routes]
        Route::get('/allUsers', 'UserController@index')->name('allUsers');
        Route::get('/createUser', 'UserController@create')->name('createUser');
        Route::post('/storeUser', 'UserController@store')->name('storeUser');
        Route::get('/editUser/{id}', 'UserController@edit')->name('editUser');
        Route::post('/updateUser/{id}', 'UserController@update')->name('updateUser');
        Route::delete('/deleteUser/{id}', 'UserController@destroy')->name('deleteUser');
    #End Region

    #Region for [Stocks Routes]
        Route::get('/all-stocks','StockController@index')->name('allStocks');
        Route::get('/create-stock','StockController@create')->name('createStock');
        Route::post('/store-stock','StockController@store')->name('storeStock');
        Route::get('/edit-stock/{id}', 'StockController@edit')->name('editStock');
        Route::post('/update-stock/{id}', 'StockController@update')->name('updateStock');
        Route::delete('/delete-stock/{id}', 'StockController@destroy')->name('deleteStock');
    #End Region

    #Region for [Categories Routes]
        Route::get('/all-Categories','CategoryController@index')->name('allCategories');
        Route::post('/all-Categories','CategoryController@store')->name('storeCategory');
        Route::get('/edit-Category/{id}', 'CategoryController@edit')->name('editCategory');
        Route::post('/update-Category/{id}', 'CategoryController@update')->name('updateCategory');
        Route::delete('/delete-Category/{id}', 'CategoryController@destroy')->name('deleteCategory');
    #End Region
});


require __DIR__ . '/auth.php';
