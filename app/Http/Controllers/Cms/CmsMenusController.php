<?php

namespace App\Http\Controllers\Cms;

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

class CmsMenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list['title']          = 'Menu Management';
        $list['cms_menus']    =  CmsMenus::fetchAll();

        return view('admin.cms.menu.index',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']          = 'Create Menus';
        $data['subtitle']       = 'this is the management menu';
        $data['cms_modules']    = CmsModules::all();
        $data['cms_menus']      = CmsMenus::all();
        return view('admin.cms.menu.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                => 'required|string',
            'icon'                => 'required|string',
            'cms_modules_id'      => 'required|string',
            'url'                 => 'required|string',
            'view'                => 'required|string',
            'sorter'              => 'required|string',
            'is_active'           => 'required|string',
            'folder'              => 'required|string',
        ]);

        $save = CmsMenus::insertData($request);

        if($save){
            return redirect()->back()->with('message','success save data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','warning');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title']          = 'Edit Menus';
        $data['subtitle']       = 'this is the management menu';
        $data['row']            = CmsMenus::fetchOne($id);
        return view('admin.cms.menu.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']          = 'Edit Menus';
        $data['subtitle']       = 'this is the management menu';
        $data['cms_modules']    = CmsModules::all();
        $data['cms_menus']      = CmsMenus::all();
        $data['row']            = CmsMenus::fetchOne($id);
        return view('admin.cms.menu.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id'                  => 'required',
            'name'                => 'required|string',
            'icon'                => 'required|string',
            'cms_modules_id'      => 'required|string',
            'url'                 => 'required|string',
            'view'                => 'required|string',
            'sorter'              => 'required|string',
            'is_active'           => 'required|string',
            'folder'              => 'required|string',
        ]);

        $update = CmsMenus::updateData($request);

        if($update){
            return redirect()->back()->with('message','success update data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','warning');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function action($id)
    {
        $list['title']          = 'Menu Management';
        $list['description']    =  'ini adalah submenu untuk membuat modul di bawah menu management';

        return view('admin.cms.menu.subaction',$list);
    }
}
