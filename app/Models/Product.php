<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    // To allow mass assignment on the following fields
    protected $fillable = [
        'name',
        'description',
        'brandname',
        'ytlink',
        'photos',
        'price',
        'video',
        'review',
        'category', // Store the category name
        'category_id', // Store the category ID as well
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
     public function feature()
    {
        return $this->hasOne(FeatureProduct::class, 'products_id');
    }
    
}
