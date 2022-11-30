<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsModules extends Model
{
    use HasFactory;
    protected $table = 'cms_modules';
    protected $fillable = [
        'name',
        'icon',
        'middleware',
        'url',
        'controller',
        'model',
        'table',
        'is_active',
        'folder_controller',
        'folder_model',
        'folder_file',
    ];

    public static function insertData($request){

        $save = CmsModules::create([
            'name'              => $request->name,
            'icon'              => $request->icon,
            'middleware'        => $request->middleware,
            'url'               => $request->url,
            'controller'        => $request->controller,
            'model'             => $request->model,
            'table'             => $request->table,
            'is_active'         => $request->is_active,
            'folder_controller' => $request->folder_controller,
            'folder_model'      => $request->folder_model,
            'folder_file'       => $request->folder_file,
        ]);

        return $save;

    }
}
