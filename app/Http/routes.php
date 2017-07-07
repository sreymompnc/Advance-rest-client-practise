<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('sample-restful-apis', function()
{
    return array(
        1 => "expertphp",
        2 => "demo",
        3 => "Sreymom"
    );
});


Route::group(array('prefix' => 'api'), function() {
    Route::resource('product-list','APIController');

    Route::post('store','APIController@store');
    Route::get('show/{Id}','APIController@show');

    Route::put('update/{Id}','APIController@update');
    Route::delete('destroy/{Id}','APIController@destroy');

    // Custom authentication
    Route::resource('listbook','CustomController');
    Route::post('storebook','CustomController@storebook');
    Route::get('showbook/{Id}','CustomController@showbook');
    Route::put('updatebook/{Id}','CustomController@updatebook');
    Route::delete('deletebook/{Id}','CustomController@deletebook');


   //  Raw query
    Route::post('addName','Namecontroller@addName');




});

// constant api for set header
Route::resource('products','APIController');
Route::auth();

Route::get('/home', 'HomeController@index');




