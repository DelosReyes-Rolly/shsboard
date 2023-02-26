<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Faculties extends Authenticatable
    {
        use HasFactory; 
        use Notifiable;

        protected $guard = 'faculties';

        protected $fillable = [
            'expertise_id', 'first_name', 'middle_name', 'last_name', 'suffix', 'email', 'password', 'gender', 'username', 'load', 'isMaster', 'updated_at', 'deleted', 'deleted_at'
        ];

        protected $hidden = [
            'password',
        ];

        public function expertise(){
            return $this->belongsTo(Expertises::class);
        }
    }
