<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Model\StateLicense;
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
        $this->middleware('auth');
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
        $getThefeesAre = array();
        $getThefeesAre = DB::table('license_applicable_fees')
                ->where('license_id', $comp_license_id)
                ->whereIn('default_fee_id', array(2, 3, 4, 7, 9, 10))
                ->orderBy('default_fee_id', 'ASC')
                ->get();
        return view('SoftwareLicensing.company_index', ['getAllFees' => $getThefeesAre, 'license' => $license, 'allCount' => $allCount, 'allEmployeeCount' => $allEmployeeCount]);
    }

    public function company_state_licensing() {
        $this->layout = 'ajax';
        $loginEmployee = Auth::user();
        $nmls = DB::table('license_details')
                ->select('nmls')
                ->where('id', $loginEmployee->license_id)
                ->get();
        $stateLicense = DB::table('state_licenses')
                ->where('comp_id', $loginEmployee->id)
                ->where('license', '<>', '')
                ->where('active_status', '<>', 0)
                ->get();
        if (!empty($stateLicense)) {
            foreach ($stateLicense as $key => $value) {
                $EmployeeLicense = DB::table('employee_licenses')
                        ->select('id')
                        ->where('comp_id', $loginEmployee->id)
                        ->where('state', $loginEmployee->state_id)
                        ->where('license_status', 'Active')
                        ->groupBy('emp_id')
                        ->get();
                $stateLicense[$key]->count = count($EmployeeLicense);
            }
        }
        $branches = DB::table('branches')
                ->where('comp_id', $loginEmployee->id)
                ->orderBy('id', 'desc')
                ->get();
        if (!empty($branches)) {
            foreach ($branches as $key => $value) {
                $emp = DB::table('employee_details')
                        ->select('emp_first_name', 'emp_last_name', 'emp_image')
                        ->where('id', $value->manager)
                        ->get();
                $branches[$key]->user_name = $emp[0]->emp_first_name . ' ' . $emp[0]->emp_last_name;
                $branches[$key]->emp_image = $emp[0]->emp_image;
            }
        }
        return view('SoftwareLicensing.company_state_licensing', [
            'branch' => $branches,
            'stateLicense' => $stateLicense,
            'nmls' => $nmls,
        ]);
    }
    
    
    /* All active states */
    public function company_getAllActiveState() {
        $this->layout = 'ajax';
        $stateLicense = StateLicense::all();
        if (!empty($stateLicense)) {
            echo "<pre>";
            print_r($stateLicense);
            die;
            foreach ($stateLicense as $key => $value) {
                $EmployeeLicense = $this->EmployeeLicense->find('all', array(
                    'fields' => array('EmployeeLicense.id'),
                    'group' => array('EmployeeLicense.emp_id'),
                    'conditions' => array(
                        'EmployeeLicense.state' => $value['StateLicense']['state_id'],
                        'EmployeeLicense.license_status' => 'Active',
                        'EmployeeLicense.comp_id' => $this->Auth->user('id')
                    )
                ));
                $stateLicense[$key]['StateLicense']['count'] = count($EmployeeLicense);
            }
        }
      //  $this->set('stateLicense', $stateLicense);
    }

}
