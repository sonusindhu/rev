<?php

namespace App\Http\Controllers;

use App\Model\Lender;
use App\Model\State;
use App\Model\LenderContact;
use App\Model\LenderTip;
use App\Model\LenderDocument;
use App\Model\LenderNote;
use App\Model\LenderNotice;
use App\Model\LenderMortgageContact;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;

class LendersController extends Controller {

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
        $this->layout = "ajax";
        $lenders = Lender::where('user_id', Auth::User()->id)->get();
        return view('Lenders.company_index',['lenders'=>$lenders]);
    }
    
    
    public function edit($id) {
        $this->layout = 'ajax';
        $lender = Lender::find($id);
        
//        
//        if (isset($this->request->data) && !empty($this->request->data)) {
//            if (isset($this->request->data['Lender']['logo']['name']) && !empty($this->request->data['Lender']['logo']['name'])) {
//                $logo = time() . "_" . $this->request->data['Lender']['logo']['name'];
//                move_uploaded_file($this->request->data['Lender']['logo']['tmp_name'], "upload/Lenders/" . $logo);
//                
//                $data = array(
//                    'file'=>"upload/Lenders/".$logo,
//                    'width'=>200,
//                    'height'=>120,
//                    'output'=>"upload/Lenders/thumbs/",
//                );
//                $this->Qimage->resize($data);
//                
//                $this->request->data['Lender']['logo'] = $logo;
//                $this->Lender->save($this->request->data);
//                $response = array('status' => true);
//                echo json_encode($response);
//                exit;
//            } else {
//
//                $this->Lender->save($this->request->data);
//                $response = array('status' => true);
//                echo json_encode($response);
//                exit;
//            }
//        }
//        
        // get all states
        $states = State::all();


        // get all contacts
        $contacts = LenderContact::where('lender_id', $id)->get();


        // get all contact mortgagee
        $mortgagecontacts = LenderMortgageContact::where('lender_id', $id)->get();
        
        // get all notices
        $notices = LenderNotice::where('lender_id', $id)->get();

        // get all tips
        $tips = LenderTip::where('lender_id', $id)->get();

        // get all Notes
        $notes = LenderNote::where('lender_id', $id)->get();

        // get all Documents
        $documents = LenderDocument::where('lender_id', $id)->get();
        
        return view('Lenders.company_edit',['lender'=> $lender , 'documents'=> $documents,'notes'=> $notes,'tips'=> $tips,'notices'=> $notices,'mortgagecontacts'=> $mortgagecontacts,'contacts'=> $contacts,'states'=> $states]);

    }

  
}
