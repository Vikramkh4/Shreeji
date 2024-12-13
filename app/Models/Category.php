<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Allows mass assignment on name and description fields
    protected $fillable = ['name', 'description','image'];

    // A category can have many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
