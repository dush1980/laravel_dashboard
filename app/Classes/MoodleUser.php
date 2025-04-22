<?php
namespace App\Classes;

use App\Traits\UserTrait;
use App\Models\VLEUser;

class MoodleUser {
    use UserTrait;
    
    public function __construct(){
        //inital settings
    }

    public static function get($min){ 
        $user = VLEUser::byMIN($min)->first(); 
        return array_merge(self::getTraineeDetails($user), self::getTraineeRotation($user));
    }


    private static function getTraineeDetails($objUser){        
        return array(
            'MIN' => $objUser->idnumber.' (VLE ID : '.$objUser->id.')',
            'Username' => $objUser->username,
            'Name' => $objUser->fullname,
            'Address' => $objUser->address,
            'Email' => $objUser->email,
            'Timezone' => $objUser->timezone,
            'Phone 1' => $objUser->phone1,
            'Phone 2' => $objUser->phone2,
            'Source' => self::sourceName($objUser->source), 
        );

    }
    
    private static function getTraineeRotation($objUser){ 
        $rtn = array();

        $rtn['Roles'] = self::roles($objUser);
        if($objUser->dual_role->isNotEmpty()) $rtn['Dual Roles'] = self::dual_roles($objUser);
        $rtn['Curriculums'] = self::curriculums($objUser);
        $rtn['Training Programs'] = self::trainingPrograms($objUser);
        $rtn['Supervisors'] = self::supervisors($objUser);
        
        return $rtn;
    }

    private static function roles($objUser){
        $rtn = array();
        foreach ($objUser->enrol as $e){           
            $showdate = ($e->endDate != 0? static::formatDate($e->endDate): ' - ');
            $rtn[] = array ('lable'=> $e->role->name.' ('.$e->course.') : '.$showdate, 'tooltip'=> '');
        }
        return $rtn;
    }

    private static function dual_roles($objUser){
        $rtn = array();        
        $dual_roles = $objUser->dual_role;
        if($dual_roles->isNotEmpty()){
            foreach ($dual_roles as $dl){           
                $showdate = ($dl->enddate != 0? static::formatDate($dl->enddate): ' - ');
                $rtn[] = array ('lable'=> $dl->role->name.' ('.$dl->course->shortname.') : '.$showdate.($dl->role_selected?' <b>- Selected</b>':''), 
                                'tooltip'=> '');
            }
        }  
        return $rtn;
    }

    private static function trainingPrograms($objUser){
        $rtn = array();
        foreach($objUser->training_program as $tp){
            $rtn[] = array ('lable'=> $tp->name.' ('.$tp->tpyear.')', 'tooltip'=> $tp->program);
        }
        return $rtn;
    }

    private static function curriculums($objUser){
        $rtn = array();
        foreach($objUser->curriculum as $c){
            $rtn[] = array ('lable'=> $c->name.' ('.$c->curriculumyear.')', 'tooltip'=> $c->curriculum);
        }
        return $rtn;
    }

    private static function supervisors($objUser){
        $rtn = array();
        foreach($objUser->relationship->related as $instance){
            $supervisor = $instance->supervisor;
            $rtn[] = array (
                'lable'=> $supervisor->fullname.' ('.$instance->role->name.')  : '.self::formatDate($instance->endDate), 
                'tooltip'=> $supervisor->idnumber.' ( VLE ID : '.$supervisor->id.')'
            );
        }
        return $rtn;
    }
    
}