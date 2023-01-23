<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function expertise(){
        return $this->belongsTo(Expertises::class);
    }
}
