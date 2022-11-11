<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function faculty(){
        return $this->belongsTo(Faculties::class);
    }

    public function gradelevel(){
        return $this->belongsTo(GradeLevels::class);
    }

    public function semester(){
        return $this->belongsTo(Semesters::class);
    }

    public function course(){
        return $this->belongsTo(Courses::class);
    }

    public function section(){
        return $this->belongsTo(Sections::class);
    }

    public function subject(){
        return $this->belongsTo(Subjects::class);
    }

    public function schoolyear(){
        return $this->belongsTo(SchoolYear::class);
    }

    public function student(){
        return $this->belongsTo(Students::class);
    }
}
