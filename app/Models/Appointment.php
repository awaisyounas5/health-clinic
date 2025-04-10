<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function staff(){
        return $this->belongsTo(User::class,'staff_id','id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class,'patient_id','id');
    }
}
