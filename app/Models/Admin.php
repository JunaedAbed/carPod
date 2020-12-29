<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $table = 'admin';
    protected $guard = 'admin';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;
    
    protected $fillable = [
        'admin_id',
        'uname',
        'password',    
    ];
    
    protected $hidden = [
        'password',
    ];
}
