<?php

namespace App\Http\Controllers\Microservice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
#PACKAGE
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
use App\Models\Cms\CmsModules;
use App\Models\Cms\CmsMenus;
use App\Models\Cms\CmsMenusAccess;
use App\Models\Cms\CmsRoleAccess;

class LinkedinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function init($menu_id){
        $cms_menu_id            = Nfs::Decrypt($menu_id);
        //enkripsi

        $menu                   = CmsMenus::fetchOne($cms_menu_id);
        $data['access']         = Nfs::roleAccess(Session::get('cms_role_id'),$cms_menu_id);
        $data['title']          = 'Linkedin';
        $data['description']    = 'ini adalah menu management linkedin';
        $data['users']          = User::fetch_one(Session::get('id'));
        $data['tabel']          = 'linkedin';
        $data['link']           = $menu->url;
        return $data;
    }

    public function index($menu_id)
    {
        $data = Self::init($menu_id);

        if($data['access']->is_view == "false" || $data['access']->is_view == null ){
            return redirect('dashboard')->with('message','cannot access this menu, you dont have prifileges')
                   ->with('message_type','danger');
        }

        return view('admin.microservice.linkedin.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($menu_id)
    {
        $data = Self::init($menu_id);

        if($data['access']->is_create == "false" || $data['access']->is_create == null ){
            return redirect('dashboard')->with('message','cannot access this menu, you dont have prifileges')
                   ->with('message_type','danger');
        }

        return view('admin.microservice.linkedin.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($menu_id,$id)
    {
        $data = Self::init($menu_id);

        if($data['access']->is_detail == "false" || $data['access']->is_detail == null){
            return redirect('dashboard')->with('message','cannot access this menu, you dont have prifileges')
                   ->with('message_type','danger');
        }

        return view('admin.microservice.linkedin.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($menu_id,$id)
    {
        $data = Self::init($menu_id);

        if($data['access']->is_edit == "false" || $data['access']->is_edit == null){
            return redirect('dashboard')->with('message','cannot access this menu, you dont have prifileges')
                   ->with('message_type','danger');
        }

        return view('admin.microservice.linkedin.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($data['access']->is_delete == "false" || $data['access']->is_delete == null){
            return redirect('dashboard')->with('message','cannot access this menu, you dont have prifileges')
                   ->with('message_type','danger');
        }
    }
}
