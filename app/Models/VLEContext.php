<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class VLEContext extends Model
{
    protected $connection = 'vle';
    protected $table = 'mdl_context';
    protected $fillable = []; //prevent from accidenlty modifying any colum in VLE table    
    public $timestamps = false;

    protected static function boot(){
        parent::boot();
        static::addGlobalScope('contextlevel', function(Builder $builder){
            $builder->where('contextlevel', 30); // user context level is 30
        });
    }

    public function related(){
        return $this->hasMany(VLEUserContext::class, 'contextid', 'id');
    }

}
