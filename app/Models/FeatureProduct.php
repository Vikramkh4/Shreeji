<?php
// app/Models/FeatureProduct.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureProduct extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model name
    protected $table = 'feature_products';

    // Define the fillable fields
    protected $fillable = ['products_id', 'status'];

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
}
