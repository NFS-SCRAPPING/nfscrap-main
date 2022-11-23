<?php
namespace App\Helpers;

use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Http;
use Image;
 
use Illuminate\Support\Facades\DB;
 
class Nfs {
   
    public static function app(){
        return "NFScrap";
    }

}