<?php
namespace App\Classes;

use App\Classes\MuleConnection;
use Illuminate\Support\Facades\DB;
use App\Models\VLEUser;
use App\Traits\UserTrait;

class MuleUser {
    use UserTrait;
    
    public function __construct(){
        //inital settings
    }

    public static function get($min){  
        return array_merge(self::getTraineeDetails($min), self::getTraineeRotation($min));
    }


    private static function getTraineeDetails($min){
        $tDetails = MuleConnection::getTraineeDetails($min);
        return array(
            'MIN' => $tDetails['idnumber'],
            'Username' => $tDetails['username'],
            'Name' => $tDetails['firstname'].' '.$tDetails['middlename'].($tDetails['middlename']?' ':'').$tDetails['lastname'],
            'Address' => $tDetails['address'],
            'Email' => $tDetails['email'],
            'Timezone' => $tDetails['timezone'],
            'Phone 1' => $tDetails['phone1'],
            'Phone 2' => $tDetails['phone2'],
        );

    }
    
    private static function getTraineeRotation($min){        
        $rDetails = MuleConnection::getTraineeRotation($min);
        return array(
            'Source' => self::sourceName($rDetails['trainingSource']), 
            'Roles' => self::roles($rDetails['moodleRoles'], $rDetails['accessEndDate']),
            'Curriculums' => self::curriculums($rDetails['curriculums']),
            'Training Programs' => self::trainingPrograms($rDetails['trainingPrograms']),
            'Supervisors' => self::supervisors($rDetails['supervisors']),
        );

    }

    private static function roles($importroles, $enddates){
        $edate = array();
        foreach($enddates as $ed){
            $edate[$ed['curriculum']] = static::formatDate($ed['accessEndDate']);
        }
        $rtn = array();
        foreach($importroles as $role){            
            $roleinfo = self::getRoleDetails($role);
            $showdate = (isset($edate[$roleinfo->coursename])? $edate[$roleinfo->coursename]: ' - ');
            if($roleinfo){
                $rtn[] = array ('lable'=> $roleinfo->rolename.' ('.$roleinfo->coursename.') : '.$showdate, 'tooltip'=> $role);
            } else {
                $rtn[] = array ('lable'=> 'No Role in VLE', 'tooltip'=> $role);
            }
        }
        return $rtn;
    }

    private static function trainingPrograms($trainingprograms){
        $rtn = array();
        foreach($trainingprograms as $tp){            
            $tpinfo = DB::connection('vle')
                            ->table('mdl_racp_training_program')  
                            ->where('code', $tp['program'])                           
                            ->get()->first();
            if($tpinfo){
                $rtn[] = array ('lable'=> $tpinfo->name.' ('.$tp['tpyear'].')', 'tooltip'=> $tp['program']);
            } else {
                $rtn[] = array ('lable'=> 'No Mapping in VLE', 'tooltip'=> $tp['program'].' ('.$tp['tpyear'].')');
            }
        }
        return $rtn;
    }

    private static function curriculums($curriculums){
        $rtn = array();
        foreach($curriculums as $c){            
            $cinfo = DB::connection('vle')
                            ->table('mdl_racp_curriculum')  
                            ->where('code', $c['curriculumType'])                           
                            ->get()->first();
            if($cinfo){
                $rtn[] = array ('lable'=> $cinfo->name.' ('.$c['curriculumYear'].')', 'tooltip'=> $c['curriculumType']);
            } else {
                $rtn[] = array ('lable'=> 'No Mapping in VLE', 'tooltip'=> $c['curriculumType'].' ('.$c['curriculumYear'].')');
            }
        }
        return $rtn;
    }

    private static function supervisors($supervisors){
        $rtn = array();
        foreach($supervisors as $s){            
            $sdinfo = VLEUser::byMIN($s['MIN'])->get()->first();
            $srinfo = self::getRoleDetails($s['type']);

            if($sdinfo){
                if($srinfo){
                    $rtn[] = array (
                            'lable'=> $sdinfo->fullName.' ('.$srinfo->rolename.')  : '.self::formatDate($s['enddate']), 
                            'tooltip'=> $s['MIN'].' ('.$s['type'].')'
                        );
                } else {
                    $rtn[] = array ('lable'=> 'No Role in VLE', 'tooltip'=> $s['MIN'].' ('.$s['type'].')'); 
                }                
            } else {
                $rtn[] = array ('lable'=> 'No User in VLE', 'tooltip'=> $s['MIN'].' ('.$s['type'].')');
            }
        }
        return $rtn;
    }

    private static function getRoleDetails($role){
        return DB::connection('vle')
                    ->table('mdl_racp_rolemap')
                    ->select('name as rolename', 'mdl_course.shortname as coursename')
                    ->join('mdl_role', 'mdl_racp_rolemap.role', '=', 'mdl_role.id')
                    ->leftJoin('mdl_course', 'mdl_racp_rolemap.course', '=', 'mdl_course.id')
                    ->where('importtype', $role)
                    ->get()->first();
    }
    
}