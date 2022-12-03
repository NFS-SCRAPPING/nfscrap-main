<?php
namespace App\Helpers;

use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Http;
use Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use App\Models\Cms\CmsLogs;
use App\Models\Cms\CmsModules;
 
class Nfs {
   
    public static function app(){
        return "NonScrap";
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

    public static function createController($id){
        $main_folder = app_path().'\Http\Controller';

        $fetch = CmsModules::where('id',$id)->first();

        $name               = $fetch->name;
        $icon               = $fetch->middleware;
        $url                = $fetch->url;
        $controller         = $fetch->controller;
        $model              = $fetch->model;
        $table              = $fetch->table;
        $is_active          = $fetch->is_active;
        $folder_controller  = $fetch->folder_controller;
        $folder_model       = $fetch->folder_model;
        $folder_file        = $fetch->folder_file;
        

        $php = '
		<?php namespace App\Http\Controllers\"'.$folder_controller.'";;

		use App\Http\Controllers\Controller;
        #PACKAGE
        use Illuminate\Http\Request;
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Str;
        use Illuminate\Support\Facades\Mail;
        use Illuminate\Support\Facades\Http;
        use Illuminate\Support\Facades\DB;
        use Ixudra\Curl\Facades\Curl;
        use Illuminate\Support\Facades\Session;
        use Carbon\Carbon;
        use Validator;
        use Hash;
        #HELPER
        use Cron;
        use Date;
        use Fibonanci;
        use Helper;
        use Nfs;
        use Payments;
        use Wa;
        #MODEL
        use App\Models\User;
        use App\Models\Cms\Role;
        use App\Models\Cms\CmsSettings;

		class '.$controller.' extends Controller {
		';

        $php .= "\n".'
            /**
             * Display a listing of the resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
		        

		    }';

        $php .= "\n".'
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
                
            }
        ';

        $php .= "\n".'
		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

		    }';

        $php .= "\n".'
		}
		';

        $php = trim($php);
        $path = base_path("app/Http/Controllers/");
        file_put_contents($path.'Api'.$controller_name.'Controller.php', $php);
    }

    public static function createModel(){
        $main_folder = app_path().'\Models';
        
    }

    public static function createView(){

        $main_folder = resource_path().'\views';
        
    }


}

// // Path to the project's root folder    
// echo base_path();

// // Path to the 'app' folder    
// echo app_path();        

// // Path to the 'public' folder    
// echo public_path();

// // Path to the 'storage' folder    
// echo storage_path();

// // Path to the 'storage/app' folder    
// echo storage_path('app');