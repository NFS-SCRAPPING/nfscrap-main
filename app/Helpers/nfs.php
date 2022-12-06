<?php
namespace App\Helpers;

use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Http;
use Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Cms\Role;
use App\Models\Cms\CmsSettings;
use App\Models\Cms\CmsModules;
use App\Models\Cms\CmsMenus;
use App\Models\Cms\CmsMenusAccess;
use App\Models\Cms\CmsLogs;
use App\Models\Cms\CmsRoleAccess;
use App\Models\Cms\CmsMenusDetail;

class Nfs {
   
    //default nama app
    public static function app(){
        return "NonScrap";
    }

    //default route admin
    public static function admin_path(){
        
        return "admin";
    }

    //default route superadmin
    public static function superadmin_path(){
        
        return "superadmin";
    }

    //DIGUNAKAN DI MENU ACCESS GENERATE ROUTE 
    public static function route($cms_menus_id){
        $data = CmsMenus::join('cms_modules','cms_menus.cms_modules_id','=','cms_modules.id')
                ->join('cms_menus_detail','cms_menus.id','=','cms_menus_detail.cms_menus_id')
                ->where('cms_menus.id',$cms_menus_id)
                ->select('cms_modules.*','cms_menus_detail.url as route_url',
                        'cms_menus_detail.function as route_function','cms_menus_detail.method as route_method',
                        )
                ->get();
        
        //module management 
        $text = [];
        foreach($data as $key){
           $route  = explode("(", $key->route_function);
           $url['url']='Route::'.$key->route_method.'("'.$key->route_url.'",['.$key->controller.'::class,"'.$route[0].'"]);';
           array_push($text,$url);
        }

        return $text;
        
    }

    //DIGUNAKAN DI MENU ROUTE UNTUK MENGGENERATE URL CLASS
    public static function controller($cms_menus_id){
        $data = CmsModules::join('cms_menus','cms_modules.id','=','cms_menus.cms_modules_id')
                ->where('cms_menus.id',$cms_menus_id)
                ->select('cms_modules.*')
                ->get();
                
        $text = [];
        foreach($data as $key){
            $list['class'] = "use App\Http\Controllers\\".$key->folder_controller.'\\'.$key->controller.';';

            array_push($text,$list);
        }

        return $text;
    }

    //DIGUNAKAN DI SIDEBAR UNTUK MENGANALISIS ROLE PRIVILEGES
    public static function menu($user_id)
    {
        $data = CmsMenus::leftJoin('cms_menus_access','cms_menus.id','=','cms_menus_access.cms_menus_id')
                ->leftJoin('cms_role','cms_menus_access.cms_role_id','=','cms_role.id')
                ->join('users','cms_role.id','=','users.cms_role_id')
                ->where('users.id',$user_id)
                ->select('cms_menus.*','cms_role.name as cms_role_name','cms_menus_access.*')
                ->get();
        
        return $data;
    }


    //buat function di view role access
    public static function roleAccess($cms_role_id,$cms_menus_id){
        $data = CmsRoleAccess::where('cms_role_id',$cms_role_id)
                ->where('cms_menus_id',$cms_menus_id)
                ->first();

        return $data;
    }

    public static function role(){
        $data = Role::all();

        return $data;
    }


    //FUNGSI ENCRYPSI 
    public static function Encrypt($value){

        $encrypted = Crypt::encryptString($value);

        return $encrypted;
    }

    //FUNGSI DECRIPSI
    public static function Decrypt($value){
        
        $decrypted = Crypt::decryptString($value);

        return $decrypted;
    }

    //FUNGSI INSERT LOGS USERS
    public static function insertLogs($description){
        $detail ='aktivitas pada jam '.date('H:i:s');
        $save = CmsLogs::saveData($description,$detail);

        return $save;
    }


    //FUNGSI DELETE MENU DAN MENU_DETAIL DAN MENU ACCESS DAN ROLE ACCESS

    public static function deleteAllMenusRelasi($cms_menus_id){
        $delete_menu_access = CmsMenusAccess::where('cms_menus_id',$cms_menus_id)->delete();
        $delete_menu_detail = CmsMenusDetail::where('cms_menus_id',$cms_menus_id)->delete();
        $delete_role_access = CmsRoleAccess::where('cms_menus_id',$cms_menus_id)->delete();
        $delete_menus       = CmsMenus::where('id',$cms_menus_id)->delete();

        return $delete_menus;
    }

    //MEMBUAT DEFAULT MENU ACCESS, ROLE ACCESS , MENU DETAIL SAAT MEMBUAT MENU

    public static function createDeafultValue($cms_meus_id){
        //MENGAMBIL INFO MENU DETAIL
        $fetch = CmsMenus::where('id',$cms_menus_id)->first();
        
        //MEMBUAT ROLE ACCESS
        $role = Role::all();
        $role_access = [];
        foreach($role as $key){
            $list['cms_role_id']    = $key->id;
            $list['cms_menus_id']   = $cms_menus_id;
            $list['is_view']        = "false";
            $list['is_create']      = "false";
            $list['is_edit']        = "false";
            $list['is_detail']      = "false";
            $list['is_delete']      = "false";

            array_push($role_access,$list);
        }
        CmsRoleAccess::insert($role_access);

        //MEMBUAT MENU ACCESS
        CmsMenusAccess::create([
            [
                "cms_menus_id" => $cms_menus_id,
                "cms_role_id"  => 1,
            ],
            [
                "cms_menus_id" => $cms_menus_id,
                "cms_role_id"  => 2,
            ],
        ]);

        //MEMBUAT MENU DETAIL
        $return = CmsMenusDetail::create([
            [
                "cms_menus_id"=>$cms_menus_id,
                "url"         =>$fetch->url.'/{menu_detail}',
                "method"      =>'get',
                "function"    =>'index($menu_id)',
                "view"        =>'index.blade.php'
            ],
            [
                "cms_menus_id"=>$cms_menus_id,
                "url"         =>$fetch->url.'/create/{menu_detail}',
                "method"      =>'get',
                "function"    =>'create($menu_id)',
                "view"        =>'create.blade.php'
            ],
            [
                "cms_menus_id"=>$cms_menus_id,
                "url"         =>$fetch->url.'/edit/{menu_detail}/{id}',
                "method"      =>'get',
                "function"    =>'edit($menu_id,$id)',
                "view"        =>'edit.blade.php'
            ],
            [
                "cms_menus_id"=>$cms_menus_id,
                "url"         =>$fetch->url.'/show/{menu_detail}/{id}',
                "method"      =>'get',
                "function"    =>'show($menu_id,$id)',
                "view"        =>'show.blade.php'
            ],
            [
                "cms_menus_id"=>$cms_menus_id,
                "url"         =>$fetch->url.'/store',
                "method"      =>'post',
                "function"    =>'store(Request $request)',
                "view"        =>''
            ],
            [
                "cms_menus_id"=>$cms_menus_id,
                "url"         =>$fetch->url.'/update',
                "method"      =>'post',
                "function"    =>'update(Request $request)',
                "view"        =>''
            ],
            [
                "cms_menus_id"=>$cms_menus_id,
                "url"         =>$fetch->url.'/destroy/{menu_detail}/{id}',
                "method"      =>'get',
                "function"    =>'destroy($menu_detail,$id)',
                "view"        =>''
            ],
        ]);
        
        return $return;

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