<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VLEDualRole extends Model
{
    protected $connection = 'vle';
    protected $table = 'mdl_racp_multi_role_users';
    protected $fillable = []; //prevent from accidenlty modifying any colum in VLE table

    public $timestamps = false;

    public function role(){
        return $this->hasOne(VLERole::class, 'id', 'role_id');
    }
    
    public function course(){
        return $this->hasOne(VLECourse::class, 'id', 'course_id');
    }

}
