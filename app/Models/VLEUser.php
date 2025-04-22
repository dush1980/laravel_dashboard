<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VLEUser extends Model
{
    protected $connection = 'vle';
    protected $table = 'mdl_user';
    protected $fillable = []; //prevent from accidenlty modifying any colum in VLE table

    public $timestamps = false;

    public function scopeByMIN($query, $min){
        return $query->where('idnumber', $min);
    }

    public function getFullNameAttribute(){
        return $this->firstname.' '.$this->middlename.' '.$this->lastname;
    }

    public function training_program(){
        return $this->hasMany(VLETrainingProgram::class, 'userid');
    }

    public function curriculum(){
        return $this->hasMany(VLECurriculum::class, 'userid');
    }

    public function enrol(){
        return $this->hasMany(VLECourseContext::class, 'userid');
    }

    public function relationship(){
        return $this->hasOne(VLEContext::class, 'instanceid');
    }

    public function dual_role(){
        return $this->hasMany(VLEDualRole::class, 'userid');
    }

}
