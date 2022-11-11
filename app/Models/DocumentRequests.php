<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRequests extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function document(){
        return $this->belongsTo(Documents::class);
    }

    public function student(){
        return $this->belongsTo(Students::class);
    }

    public function course(){
        return $this->belongsTo(Courses::class);
    }
}
