<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;

class SoftwareLicensingController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
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
        $getThefeesAre=array();
        $getThefeesAre = DB::table('license_applicable_fees')
                ->where('license_id', $comp_license_id)
                ->whereIn('default_fee_id', array(2, 3, 4, 7, 9, 10))
                ->orderBy('default_fee_id', 'ASC')
                ->get();
        return view('SoftwareLicensing.company_index',['getAllFees'=>$getThefeesAre,'license'=>$license,'allCount'=>$allCount,'allEmployeeCount'=>$allEmployeeCount]);
    }

}
