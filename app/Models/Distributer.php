<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributer extends Model
{
    use HasFactory;

    protected $table = "distributer";
    // Allows mass assignment on name and description fields
    protected $fillable = ['id', 'name','mob','address','email','status','role','creation_date','message','updated_date'];
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
   
}
