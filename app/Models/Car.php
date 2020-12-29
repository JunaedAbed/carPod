<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    
    protected $fillable = [
        'car_name', 
        'car_type', 
        'image', 
        'hire_cost', 
        'capacity', 
        'year', 
        'color', 
        'chassis', 
        'status',   
    ];
}
