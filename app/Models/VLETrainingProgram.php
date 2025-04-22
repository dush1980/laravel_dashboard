<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VLETrainingProgram extends Model
{
    protected $connection = 'vle';
    protected $table = 'mdl_user_training_program';
    protected $fillable = []; //prevent from accidenlty modifying any colum in VLE table

    public $timestamps = false;

    /* public function user(){
        return $this->belongsTo(VLEUser::class);
    } */

    public function getNameAttribute(){
        return DB::connection('vle')
                ->table('mdl_racp_training_program')  
                ->where('code', $this->program)                           
                ->get()->first()->name; 
    }

}
