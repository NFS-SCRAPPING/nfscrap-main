<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsSettings extends Model
{
    use HasFactory;

    protected $table = 'cms_settings';

    protected $fillable = [
        'name',
        'value',
        'description',
        'image'
    ];
}
