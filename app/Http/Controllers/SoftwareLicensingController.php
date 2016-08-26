<?php

namespace App\Http\Controllers;

use App\Model\StateLicense;
use App\Model\EmployeeLicense;
use App\Model\EmployeeDetail;
use App\Model\State;
use App\User;
use App\Model\LicenseDetail;
use App\Model\Branch;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Validator;
use DB;
use Illuminate\Support\Facades\Input;

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
        $stateLicense = StateLicense::with('states')
                ->where('comp_id', $loginEmployee->id)
                ->where('license', '<>', '')
                ->where('active_status', '<>', 0)
                ->get();
        if (!empty($stateLicense)) {
            foreach ($stateLicense as $key => $value) {
                $EmployeeLicense = EmployeeLicense::where('state', $value->state_id)->where('license_status', 'active')->where('comp_id', $loginEmployee->id)->select('id')->groupBy('emp_id')->get();
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
                $branches[$key]->user_name = @$emp[0]->emp_first_name . ' ' . @$emp[0]->emp_last_name;
                $branches[$key]->emp_image = @$emp[0]->emp_image;
            }
        }
        return view('SoftwareLicensing.company_state_licensing', [
            'branch' => $branches,
            'stateLicense' => $stateLicense,
            'nmls' => $nmls,
            'loginUser' => $loginEmployee
        ]);
    }

    /* All active states */

    public function company_getAllActiveState() {
        $this->layout = 'ajax';
        $loginEmployee = Auth::user();
        $stateLicense = StateLicense::with('states')
                ->where('comp_id', $loginEmployee->id)
                ->where('license', '<>', '')
                ->where('active_status', '<>', 0)
                ->get();
        if (!empty($stateLicense)) {
            foreach ($stateLicense as $key => $value) {
                $EmployeeLicense = EmployeeLicense::where('state', $value->state_id)->where('license_status', 'active')->where('comp_id', $loginEmployee->id)->select('id')->groupBy('emp_id')->get();
                $stateLicense[$key]->count = count($EmployeeLicense);
            }
        }
        return view('SoftwareLicensing.company_get_all_active_state', ['stateLicense' => $stateLicense]);
    }

    public function company_getAllBranches() {
        $this->layout = 'ajax';
        $loginEmployee = Auth::user();
        $nmls = LicenseDetail::where('id', $loginEmployee->license_id)->select('nmls')->get();
        $branches = Branch::with('states')->where('comp_id', $loginEmployee->id)->orderBy('id', 'desc')->get();
        if (!empty($branches)) {
            foreach ($branches as $key => $value) {
                $emp = EmployeeDetail::where('id', $value->manager)->select('emp_first_name', 'emp_last_name', 'emp_image')->get();
                $branches[$key]->user_name = @$emp[0]->emp_first_name . ' ' . @$emp[0]->emp_last_name;
                $branches[$key]->emp_image = @$emp[0]->emp_image;
            }
        }
        return view('SoftwareLicensing.company_get_all_branches', ['branch' => $branches, 'nmls' => $nmls]);
    }

    public function company_updateNmlsId($id = Null) {
        $this->autoRender = FALSE;
        $user = User::where('id', $id)->first();
        if (!empty($_POST['nmls'])) {
            $user->nmls_id = $_POST['nmls'];
            $user->id = $id;
            $user->save();
        }
    }

    /* Update State licensing Pop-up */

    public function company_update_state_licensing() {
        $this->layout = 'ajax';
        $loginUser = Auth::user();
        $states = State::where('status', 1)->select('id', 'state')->get();
        $getLicense = StateLicense::where('comp_id', $loginUser->id)->orderBy('id', 'asc')->get();
        $statesNew = array();
        if (!empty($states)) {
            foreach ($states as $k => $v) {
                $statesNew[$k]['id'] = $v->id;
                $statesNew[$k]['state'] = $v->state;
                foreach ($getLicense as $k_license => $v_license) {
                    if ($v->id == $v_license->state_id) {
                        $statesNew[$k]['license'] = $v_license->license;
                        $statesNew[$k]['active_status'] = $v_license->active_status;
                    }
                }
            }
        }
        $status = 0;
        if (!empty($_POST)) {
            $deletedRows = StateLicense::where('comp_id', $loginUser->id)->delete();
            foreach ($_POST['data'] as $key => $value) {
                if (!empty($value['StateLicense']['active_status']) and empty($value['StateLicense']['license'])) {
                    $status = 1;
                    $err[$key]['license'] = 'Please enter the license';
                }
            }
            if ($status != 1) {
                foreach ($_POST['data'] as $key => $value) {
                    if (isset($value['StateLicense']['active_status']) and $value['StateLicense']['active_status'] == 'on') {
                        $value['StateLicense']['active_status'] = 1;
                    } else {
                        $value['StateLicense']['active_status'] = 0;
                    }
                    if (isset($value['StateLicense']['license_id']) and ! empty($value['StateLicense']['license_id'])) {
                        DB::table('state_licenses')
                                ->where('id', $value['StateLicense']['license_id'])
                                ->update([
                                    'active_status' => $value['StateLicense']['active_status'],
                                    'license' => $value['StateLicense']['license'],
                        ]);
                    } else {
                        DB::table('state_licenses')
                                ->insert([
                                    'active_status' => $value['StateLicense']['active_status'],
                                    'license' => $value['StateLicense']['license'],
                                    'comp_id' => $value['StateLicense']['comp_id'],
                                    'state_id' => $value['StateLicense']['state_id'],
                        ]);
                    }
                }
                echo json_encode(array('status' => 'true', 'message' => 'State licensing updated.'));
                die;
            } else {
                echo json_encode(array('status' => 'false', 'error' => $err, 'modelname' => 'StateLicense'));
                die;
            }
        }
        return view('SoftwareLicensing.company_update_state_licensing', ['states' => $statesNew, 'licenseNumbers' => $getLicense, 'loginUser' => $loginUser]);
    }

    /* Show Users/Employee according to the State */

    public function company_show_state_license($state_id = NULL) {
        $this->layout = 'ajax';
        $loginUser = Auth::user();
        if (!empty($state_id)) {
            $stateLicense = StateLicense::with('states')->where('state_id', $state_id)->where('comp_id', $loginUser->id)->first();
            $employeeLicense = EmployeeLicense::where('state', $state_id)->select('emp_id')->get();
            $getNewEmployeeLicense = array();
            if (!empty($employeeLicense)) {
                foreach ($employeeLicense as $key => $val) {
                    $getNewEmployeeLicense[] = $val->emp_id;
                }
            }
            $getEmployeeAccToState = EmployeeDetail::whereIn('id', $getNewEmployeeLicense)->select('id', 'state', 'emp_first_name', 'emp_last_name', 'emp_image')->get();
            if (!empty($getEmployeeAccToState)) {
                foreach ($getEmployeeAccToState as $key => $value) {
                    $license = EmployeeLicense::where('emp_id', $value->id)->first();
                    $getEmployeeAccToState[$key]->license_number_id = "";
                    if (!empty($license)) {
                        $getEmployeeAccToState[$key]->license_number_id = $license->license;
                    }
                }
            }
            return View('SoftwareLicensing.company_show_state_license', ['EmployeeDetail' => $getEmployeeAccToState, 'stateLicense' => $stateLicense]);
        }
    }

    /* View selected Branch */

    public function company_view_branch($emp_id = Null) {
        $this->layout = 'ajax';
        $employee = EmployeeDetail::with(array('State', 'Branch'))->where('id', $emp_id)->get()->first();
        return View('SoftwareLicensing.company_view_branch', ['branchDetail' => $employee]);
    }

    /* function for add Branch or Update Branch */

    public function company_add_branch($id = Null) {
        $loginUser = Auth::user();
        $state = State::select('id', 'state')->get();
        $EmployeeDetail = EmployeeDetail::where('license_status', 'yes')->where('comp_id', $loginUser->id)->select('id', 'emp_first_name', 'emp_last_name')->get();
        $branchEdit = array();
        if (isset($id) and ! empty($id)) {
            $branchEdit = Branch::where('id', $id)->get()->first();
        }
        if (!empty($_POST)) {
            $this->layout = '';
            $post = Input::all();
            $branch = new Branch;
            $validator = $branch->validate($post);
            if (isset($id) and ! empty($id)) {
             $branch = Branch::where('id', $id)->get()->first();
            }
            if ($validator->fails()) {
                $messages = $validator->messages();
                $errors = json_decode(json_encode($messages), true);
                $response['error'] = $errors;
                $response['status'] = 'false';
            } else {
                $branch->comp_id = $loginUser->id;
                if (!empty($post['data']['Branch'])) {
                    foreach ($post['data']['Branch'] as $key => $value) {
                        $branch->$key = $value;
                    }
                }
                if ($branch->save()) {
                    $response['message'] = "Branch added successfully.";
                    $response['status'] = 'true';
                }
            }
            echo json_encode($response);
            die;
        } else {
            $this->layout = 'ajax';
            return View('SoftwareLicensing.company_add_branch', ['state' => $state, 'employee' => $EmployeeDetail, 'branchEdit' => $branchEdit]);
        }
    }

    /* function for Delete Branch */

    public function company_delete_branch($id = Null) {
        $this->autoRender = FALSE;
        $branch = new Branch;
        $branch = Branch::find($id);
        $branch->delete();
        echo json_encode(array('status' => true));
        die;
    }

    /* Search Employee By State */

    public function company_employeeByState($state = Null) {
        $loginUser = Auth::user();
        $this->layout = 'ajax';
        $select = EmployeeLicense::where('comp_id', $loginUser->id)->where('state', $state)->get()->lists('emp_id')->all();
        $StateEmp = EmployeeDetail::whereIn('id', $select)->select('id', 'emp_first_name', 'emp_last_name')->get();
        return View('SoftwareLicensing.company_employee_by_state', ['employee' => $StateEmp]);
    }

}
