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
    Route::get('software_licensing/json', 'SoftwareLicensingController@json');
    Route::get('software_licensing/state_licensing', 'SoftwareLicensingController@company_state_licensing');
    Route::post('software_licensing/getAllActiveState', 'SoftwareLicensingController@company_getAllActiveState');
    Route::post('software_licensing/getAllBranches', 'SoftwareLicensingController@company_getAllBranches');
    Route::post('software_licensing/updateNmlsId/','SoftwareLicensingController@company_updateNmlsId');
    Route::post('software_licensing/updateNmlsId/{id}', 'SoftwareLicensingController@company_updateNmlsId');
    Route::get('employee/add_user_license/software_license', 'EmployeeController@company_add_user_license');
    Route::get('employee/add_user_license/', 'EmployeeController@company_add_user_license');
    Route::post('employee/add_user_license/{id}', 'EmployeeController@company_add_user_license');
    Route::post('employee/addLicensePrice', 'EmployeeController@company_addLicensePrice');
    
    // Lenders routes
    Route::get('lenders', 'LendersController@index');
    Route::get('lenders/edit/{id}', 'LendersController@edit');
});