<?php
namespace App\Helpers;

use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Http;
use Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use App\Models\Cms\CmsLogs;
 
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

    public static function insertLogs($description){
        $detail ='aktivitas pada jam '.date('H:i:s');
        $save = CmsLogs::saveData($description,$detail);

        return $save;
    }

}