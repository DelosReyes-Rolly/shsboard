<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

    class Admins extends Authenticatable
    {
        use Notifiable;
        use HasFactory;

        protected $guard = 'admins';

        protected $fillable = [
            'first_name', 'middle_name', 'last_name', 'username', 'email', 'password',
        ];

        protected $hidden = [
            'password',
        ];
}