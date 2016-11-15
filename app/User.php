<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'username', 'password', 'status', 'reputation', 'operator',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
