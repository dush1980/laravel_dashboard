<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VLECourseContext extends Model
{
    protected $connection = 'vle';
    protected $table = 'mdl_role_assignments';
    protected $fillable = []; //prevent from accidenlty modifying any colum in VLE table

    const COURSE = array(
                        4729 => 'PREP_BT',
                        9214 => 'ATP',
                        11062 => 'AFRM',
                        11363 => 'AFPHM',
                        18469 => 'AFOEM',
                    );

    public $timestamps = false;

    protected static function boot(){
        parent::boot();
        static::private_boot();
    }

    protected static function private_boot(){
        static::addGlobalScope('valid_context', function(Builder $builder){
                                    $builder->whereIn('contextid', array_keys(static::COURSE));
                                }
                            );
    }

    public function getCourseAttribute(){
        return self::COURSE[$this->contextid];
    }

    public function role(){
        return $this->hasOne(VLERole::class, 'id', 'roleid');
    }
    
    public function getEndDateAttribute(){
        return $this->relationshipend; 
    }

}
