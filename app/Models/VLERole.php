<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VLERole extends Model
{
    protected $connection = 'vle';
    protected $table = 'mdl_role';
    protected $fillable = []; //prevent from accidenlty modifying any colum in VLE table

    public $timestamps = false;
}
