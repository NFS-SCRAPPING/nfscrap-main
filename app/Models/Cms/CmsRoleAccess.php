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
}
