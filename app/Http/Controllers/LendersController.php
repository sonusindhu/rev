<?php

namespace App\Http\Controllers;

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
        $lenders = DB::table('lenders')
                ->where('user_id', Auth::User()->id)
                ->orderBy('id', 'DESC')
                ->get();
        return view('Lenders.company_index',['lenders'=>$lenders]);
    }
    
    
    public function edit($id) {
        $this->layout = 'ajax';
        $lender = $this->Lender->findById($id);
        
        
        if (isset($this->request->data) && !empty($this->request->data)) {
            if (isset($this->request->data['Lender']['logo']['name']) && !empty($this->request->data['Lender']['logo']['name'])) {
                $logo = time() . "_" . $this->request->data['Lender']['logo']['name'];
                move_uploaded_file($this->request->data['Lender']['logo']['tmp_name'], "upload/Lenders/" . $logo);
                
                $data = array(
                    'file'=>"upload/Lenders/".$logo,
                    'width'=>200,
                    'height'=>120,
                    'output'=>"upload/Lenders/thumbs/",
                );
                $this->Qimage->resize($data);
                
                $this->request->data['Lender']['logo'] = $logo;
                $this->Lender->save($this->request->data);
                $response = array('status' => true);
                echo json_encode($response);
                exit;
            } else {

                $this->Lender->save($this->request->data);
                $response = array('status' => true);
                echo json_encode($response);
                exit;
            }
        }
        
        $this->loadModel('State');
        $states = $this->State->find('all');
        $this->set('states', $states);
//        pr($lender);

        // get all contacts
        $this->loadModel('LenderContact');
        $contacts = $this->LenderContact->find('all', array('conditions' => array('LenderContact.lender_id' => $id)));
        $this->set('contacts', $contacts);


        // get all contact mortgagee
        $this->loadModel('LenderMortgageContacts');
        $mortgagecontacts = $this->LenderMortgageContacts->find('all', array('conditions' => array('LenderMortgageContacts.lender_id' => $id)));
        $this->set('mortgagecontacts', $mortgagecontacts);


        // get all notices
        $this->loadModel('LenderNotice');
        $notices = $this->LenderNotice->find('all', array('conditions' => array('LenderNotice.lender_id' => $id)));
        $this->set('notices', $notices);


        // get all tips
        $this->loadModel('LenderTip');
        $tips = $this->LenderTip->find('all', array('conditions' => array('LenderTip.lender_id' => $id)));
        $this->set('tips', $tips);


        // get all Notes
        $this->loadModel('LenderNote');
        $notes = $this->LenderNote->find('all', array('conditions' => array('LenderNote.lender_id' => $id)));
        $this->set('notes', $notes);


        // get all Documents
        $this->loadModel('LenderDocument');
        $documents = $this->LenderDocument->find('all', array('conditions' => array('LenderDocument.lender_id' => $id)));
        $this->set('documents', $documents);


        $this->set('lender', $lender);
    }

  
}
