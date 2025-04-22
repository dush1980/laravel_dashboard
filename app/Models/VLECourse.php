<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VLECourse extends Model
{
    protected $connection = 'vle';
    protected $table = 'mdl_course';
    protected $fillable = []; //prevent from accidenlty modifying any colum in VLE table

    public $timestamps = false;
}
