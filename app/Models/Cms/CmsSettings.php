<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'description',
        'image'
    ];
}
