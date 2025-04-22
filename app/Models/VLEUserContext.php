<?php

namespace App\Models;

use App\Models\VLECourseContext;

class VLEUserContext extends VLECourseContext
{
    protected static function private_boot(){
        return;
    }

    public function supervisor(){
        return $this->hasOne(VLEUser::class, 'id', 'userid');
    }
}
