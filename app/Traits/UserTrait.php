<?php

namespace App\Traits;

use Carbon\Carbon;

trait UserTrait {
    public static function sourceName($source){
        return $source =='N'?'WichDoctor':'CAS';
    }

    public static function formatDate($date2Format){
        $carbon_date = null;
        if (is_string($date2Format)){
            $carbon_date = Carbon::createFromTimeString($date2Format);
        } else {
            $carbon_date = Carbon::createFromTimestamp($date2Format);
        }
        return $carbon_date->toDateString();
    }
}