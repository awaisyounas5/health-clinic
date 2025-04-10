<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayRate extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function team(){
        return $this->belongsTo(Team::class,'team_id','id');
    }

    public function staff(){
        return $this->belongsTo(User::class,'staff_id','id');
    }
}
