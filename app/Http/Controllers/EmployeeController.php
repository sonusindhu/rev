<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;

class EmployeeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    public function json() {
        $this->layout = "ajax";
        $loginEmployee = Auth::user();
        $license = DB::table('users')->where('id', $loginEmployee->id)->first();
        $getAllActiveEmployee = DB::table('employee_details')
                ->select('id')
                ->where('comp_id', $loginEmployee->id)
                ->where('paid_status', 1)
                ->get();
        $getTotalLicense = DB::table('employee_details')
                ->select('*', DB::raw('SUM(number_of_licenses) as total_sum'))
                ->where('comp_id', $loginEmployee->id)
                ->get();
        $getTotalLicenseByComp = DB::table('employee_license_seats')
                ->select('number_of_licenses')
                ->where('comp_id', $loginEmployee->id)
                ->get();
        $allCount = 0;
        $allCountByComp = 0;
        if (!empty($getTotalLicenseByComp)) {
            $allCountByComp = $getTotalLicenseByComp[0]->number_of_licenses;
        }
        if (isset($getTotalLicense[0]->total_sum)) {
            $allCount = $getTotalLicense[0]->total_sum + $allCountByComp;
        }
        $allEmployeeCount = count($getAllActiveEmployee);
        /* get the software licenses fees set by superadmin */
        $comp_license_id = $license->license_id;
        $getThefeesAre = array();
        $getThefeesAre = DB::table('license_applicable_fees')
                ->where('license_id', $comp_license_id)
                ->whereIn('default_fee_id', array(2, 3, 4, 7, 9, 10))
                ->orderBy('default_fee_id', 'ASC')
                ->get();
        return view('SoftwareLicensing.company_index', ['getAllFees' => $getThefeesAre, 'license' => $license, 'allCount' => $allCount, 'allEmployeeCount' => $allEmployeeCount]);
    }

    /* Add License */

    public function company_add_user_license($employee_id = Null) {
        $this->layout = "ajax";
        $loginEmployee = Auth::user();
        $comp_id = $loginEmployee->id;
        if (!empty($employee_id) and $employee_id != 'software_license') {
            $empData = DB::table('employee_details')
                    ->where('id', $employee_id)
                    ->get();
        } else {
            $empData = DB::table('employee_license_seats')
                    ->where('comp_id', $comp_id)
                    ->get();
            $employee_id='software_license';
            
        }
        if (!empty($_POST)) {
            if ($employee_id == 'software_license') {
                $findData = DB::table('employee_license_seats')
                        ->where('comp_id', $comp_id)
                        ->get();
                if (!empty($findData)) {
                    $insertData = DB::table('employee_license_seats')->
                            where('id', $findData[0]->id)->
                            update(
                            [
                                'timing' => $_POST['data']['EmployeeDetail']['timing'],
                                'comp_id' => $comp_id,
                                'amount_billed' => str_replace('$', '', $_POST['data']['EmployeeDetail']['amount_billed']),
                                'number_of_licenses' => str_replace('$', '', $_POST['data']['EmployeeDetail']['number_of_licenses']),
                            ]
                    );
                } else {
                    $insertData = DB::table('employee_license_seats')->insert(
                            [
                                'timing' => $_POST['data']['EmployeeDetail']['timing'],
                                'comp_id' => $comp_id,
                                'amount_billed' => str_replace('$', '', $_POST['data']['EmployeeDetail']['amount_billed']),
                                'number_of_licenses' => str_replace('$', '', $_POST['data']['EmployeeDetail']['number_of_licenses']),
                            ]
                    );
                }
                if ($insertData) {
                    $response['status'] = 'true';
                    $response['message'] = 'Licenses added successfully.';
                } else {
                    $response['status'] = 'false';
                    //$response['error'] = $this->EmployeeLicenseSeat->validationErrors;
                }
            } else {
                $insertEmployeeDetails = DB::table('employee_details')->
                        where('id', $comp_id)->
                        update(
                        [
                            'amount_billed' => str_replace('$', '', $_POST['data']['EmployeeDetail']['amount_billed']),
                        ]
                );
                if ($insertEmployeeDetails) {
                    $response['status'] = 'true';
                    $response['message'] = 'Licenses added successfully.';
                } else {
                    $response['status'] = 'false';
                    $response['message'] = 'License added successfully.';
                    /* $response['error'] = $this->EmployeeDetail->validationErrors; */
                }
            }
            echo json_encode($response);
            die;
        } else {
            $this->layout = "ajax";
        }
//        echo $employee_id;
//        die;
        return view('Employee.company_add_user_license', ['employeeDetail' => $empData, 'test' => @$employee_id]);
    }
    
     /* Add License Price */

    public function company_addLicensePrice() {
        $this->autoRender = false;
        $loginEmployee = Auth::user();
        $comp_id = $loginEmployee->id;
        $license = DB::table('users')
                ->where('id', $comp_id)
                ->get();
        $comp_license_id = $license[0]->license_id;
        $getThefeesAre = DB::table('license_applicable_fees')
                ->where('license_id', $comp_license_id)
                ->where('default_fee_id', 2)
                ->orderBy('default_fee_id', 'ASC')
                ->first();
        if (!empty($_POST['price'])) {
            $amount = $_POST['price'] * $getThefeesAre->use_fee;
            $res['status'] = 'true';
            $res['time'] = ucfirst($getThefeesAre->default_fee_field);
            $res['label'] = 'Amount Billed ' . ucfirst($getThefeesAre->default_fee_field);
            $res['amount'] = '$' . number_format($amount, 2);
        } else {
            $res['status'] = 'false';
        }
        echo json_encode($res);
        die;
    }

}
