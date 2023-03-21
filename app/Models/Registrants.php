<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Registrants extends Authenticatable
{
    protected $guarded = [];
    use HasFactory; 
    use Notifiable;

    protected $hidden = [
        'password',
    ];
}
