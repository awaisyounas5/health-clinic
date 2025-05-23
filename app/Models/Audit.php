<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function audit_standard(){
        return $this->hasMany(AuditStandard::class,'audit_id','id');
    }
}
