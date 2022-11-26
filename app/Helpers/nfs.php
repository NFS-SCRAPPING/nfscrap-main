<?php
namespace App\Helpers;

use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Http;
use Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
 
class Nfs {
   
    public static function app(){
        return "NFScrap";
    }

    public static function Encrypt($value){

        $encrypted = Crypt::encryptString($value);

        return $encrypted;
    }

    public static function Decrypt($value){
        
        $decrypted = Crypt::decryptString($value);

        return $decrypted;
    }

}