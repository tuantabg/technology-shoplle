<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'image_name',
        'image_path',
    ];
}