<?php

namespace App\Models\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;   
use Illuminate\Notifications\Notifiable; 

class AdminUser extends Authenticatable
{
    use Notifiable;

    protected $table='admin';  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    
}
