<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisories extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function faculty(){
        return $this->belongsTo(Faculties::class);
    }

    public function gradelevel(){
        return $this->belongsTo(GradeLevels::class);
    }

    public function course(){
        return $this->belongsTo(Courses::class);
    }

    public function section(){
        return $this->belongsTo(Sections::class);
    }

    public function schoolyear(){
        return $this->belongsTo(SchoolYear::class);
    }
}