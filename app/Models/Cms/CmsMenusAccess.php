<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsMenusAccess extends Model
{
    use HasFactory;
    protected $table = 'cms_menus_access';
    protected $fillable = [
        'cms_menus_id',
        'cms_role_id',
    ];


}
