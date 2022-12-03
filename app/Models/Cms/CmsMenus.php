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
