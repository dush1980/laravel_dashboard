<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Classes\MuleUser;
use App\Classes\MoodleUser;
use Illuminate\Http\Request;

class DashboardController extends Controller{

    public function check_min($min = 0){ 
        $viewData = array();
        if($min==0) {
            //process empty min
            $viewData['msg_title'] = 'Please enter a valid MIN';
            $viewData['msg_body'] = 'Enter a Valid MIN to search and show information.';
            return view('enter_min')->with('view_data', $viewData);
        }
        //$min = 92890;  
        //$min = 82529; // dual role    
        
        $viewData = array();
        //$viewData['moodle_body'] = config('mule.path');
        // $viewData['moodle_body'] = view('partial.trainee_details')->with('view_data', array_merge($this->getTraineeDetails_moodle($min), $this->getTraineeRotation_moodle($min)) );
        //$viewData['mule_body'] = view('partial.trainee_details')->with('view_data', array_merge($this->getTraineeDetails_mule($min), $this->getTraineeRotation_mule($min)) );
        $viewData['min'] = $min;
        $viewData['moodle_body'] = view('partial.trainee_details')->with('view_data', MoodleUser::get($min));
        $viewData['mule_body'] = view('partial.trainee_details')->with('view_data', MuleUser::get($min));
        
        return view('check_min')->with('view_data', $viewData);
    }
    
    public function search_min(Request $r){ 
        $r->validate(["min" => "required|numeric"]);

        //show error is the validate fail
        return redirect(route('check_min',[$r->input('min')]));
    }
}