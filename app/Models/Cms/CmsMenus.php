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
}
