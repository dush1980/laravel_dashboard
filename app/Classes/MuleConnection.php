<?php
namespace App\Classes;

use Illuminate\Support\Facades\Http;

class MuleConnection {
    public function __construct(){
        //inital settings
    }

    private static function connection(){
        $r = null;
        $r = Http::withHeaders(['Authorization' => config('mule.auth')]);
        if(! config('mule.ssl')) $r->withoutVerifying();

        return $r;
    }

    public static function getTraineeDetails($min){        
        $response = static::connection()->get(config('mule.path').'users/'.$min);
        return $response->json();
    }

    public static function getTraineeRotation($min){        
        $response = static::connection()->get(config('mule.path').'users/'.$min.'/trainingdetail');
        return $response->json();
    }
}