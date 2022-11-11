<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function student(){
        return $this->hasOne(Students::class, 'address_id', 'id'); //select form students where address_id = id;
                            // student model, foreign key, local key
    }

    public function faculty(){
        return $this->hasOne(Faculties::class, 'address_id', 'id'); //select form students where address_id = id;
                            // student model, foreign key, local key
    }
}
