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
Blade::setContentTags('<%', '%>');        // for variables and all things Blade
Blade::setEscapedContentTags('<%%', '%%>');   // for escaped data
Route::auth();
Route::get('/home', 'HomeController@index');
/* Company Admin section */
Route::group(['prefix' => 'company'], function () {
//    Route::get('software_licensing/index', function() {
//        
//    });
    Route::get('software_licensing/json', 'SoftwareLicensingController@json');
    
    // lenders routes
    Route::get('lenders', 'LendersController@index');
});