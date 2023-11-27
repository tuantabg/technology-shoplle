<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'price', 'product_code', 'discount', 'feature_image_path', 'detail', 'content', 'user_id', 'category_id'];
}
