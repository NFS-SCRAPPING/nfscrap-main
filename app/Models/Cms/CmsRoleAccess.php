<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsRoleAccess extends Model
{
    use HasFactory;

    protected $table = 'cms_role_access';
    
    protected $fillable = [
        'cms_role_id',
        'cms_menus_id',
        'is_view',
        'is_create',
        'is_edit',
        'is_detail',
        'is_delete',
    ];

    public static function insertData($request){
        $record = $request->all();
        $data   = [];


        foreach($record as $val => $key ){
            dd($key);
            $list['cms_role_id'] = $key->cms_role_id;
            $list['cms_menus_id']= $key->cms_menus_id;

            if($key->is_view){
                $list['is_view'] = true;
            }else{
                $list['is_view'] = false;
            }

            if($key->is_create){
                $list['is_create'] = true;
            }else{
                $list['is_create'] = false;
            }

            if($key->is_edit){
                $list['is_edit'] = true;
            }else{
                $list['is_edit'] = false;
            }

            if($key->is_detail){
                $list['is_detail'] = true;
            }else{
                $list['is_detail'] = false;
            }

            if($key->is_delete){
                $list['is_delete'] = true;
            }else{
                $list['is_delete'] = false;
            }

            array_push($data,$list);
        }

        dd($data);
    }
}
