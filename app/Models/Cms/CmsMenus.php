<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsMenus extends Model
{
    use HasFactory;
    protected $table = 'cms_menus';
    protected $fillable = [
        'cms_modules_id',
        'parent_id',
        'icon',
        'name',
        'url',
        'folder',
        'view',
        'is_active',
        'sorter',
    ];

    public static function fetchOne($id){
        $data = CmsMenus::leftJoin('cms_modules','cms_menus.cms_modules_id','=','cms_modules.id')
                ->leftJoin('cms_menus as parent','cms_menus.parent_id','=','parent.id')
                ->where('cms_menus.id',$id)
                ->select('cms_menus.*','parent.name as parent_name','cms_modules.name as cms_modules_name')
                ->first();

        return $data;
    }

    public static function fetchAll(){
        $data = CmsMenus::leftJoin('cms_modules','cms_menus.cms_modules_id','=','cms_modules.id')
                ->leftJoin('cms_menus as parent','cms_menus.parent_id','=','parent.id')
                ->select('cms_menus.*','parent.name as parent_name','cms_modules.name as cms_modules_name')
                ->orderBy('cms_menus.sorter','asc')
                ->get();

        return $data;
    }


    public static function insertData($request){

        $save = CmsMenus::create([
            'cms_modules_id' => $request->cms_modules_id,
            'parent_id'      => $request->parent_id,
            'icon'           => $request->icon,
            'name'           => $request->name,
            'url'            => $request->url,
            'folder'         => $request->folder,
            'view'           => $request->view,
            'is_active'      => $request->is_active,
            'sorter'         => $request->sorter,
        ]);

        return $save;

    }

    public static function updateData($request){

        $update = CmsMenus::where('id',$request->id)->update([
            'name'              => $request->name,
            'icon'              => $request->icon,
            'cms_modules_id'    => $request->cms_modules_id,
            'parent_id'         => $request->parent_id,
            'url'               => $request->url,
            'folder'            => $request->folder,
            'view'              => $request->view,
            'is_active'         => $request->is_active,
            'is_active'         => $request->is_active,
            'sorter'            => $request->sorter,
        ]);

        return $update;

    }
}
