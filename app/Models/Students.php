<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

    class Students extends Authenticatable
    {
        use Notifiable;
        use HasFactory;

        protected $guard = 'students';

        protected $fillable = [
            'address_id', 'course_id', 'section_id', 'LRN', 'first_name', 'middle_name', 'last_name', 'suffix', 'gradelevel_id', 'username', 'email', 'password', 'phone_number', 'gender', 'deleted', 'deleted_at', 'status'
        ];

        protected $hidden = [
            'password',
        ];

        public function address(){
            return $this->belongsTo(Addresses::class);
        }

        public function section(){
            return $this->belongsTo(Sections::class);
        }

        public function course(){
            return $this->belongsTo(Courses::class);
        }

        public function gradelevel(){
            return $this->belongsTo(GradeLevels::class);
        }
    }