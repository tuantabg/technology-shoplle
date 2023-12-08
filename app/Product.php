<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'price',
        'discount',
        'product_code',
        'feature_image_name',
        'feature_image_path',
        'detail',
        'content',
        'user_id',
        'category_id'
    ];

    public function images() {
        return $this->hasMany(
            ProductImage::class,
            'product_id'
        );
    }
    public function productImages() {
        return $this->hasMany(
            ProductImage::class,
            'product_id'
        );
    }
    public function tags() {
        return $this->belongsToMany(
            Tag::class,
            'product_tags',
            'product_id',
            'tag_id'
        )->withTimestamps();
    }

    public function category() {
        return $this->belongsTo(
            Category::class,
            'category_id'
        );
    }
}
