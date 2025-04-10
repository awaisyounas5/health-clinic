<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shift extends Model
{
    use HasFactory;
    protected $guarded=[];

        public function staff()
        {
            return $this->belongsTo(User::class, 'staff_id', 'id');
        }

        public function patient()
        {
            return $this->belongsTo(User::class, 'patient_id', 'id');
        }

        public function shift_type()
        {
            return $this->belongsTo(ShiftType::class, 'shift_type_id', 'id');
        }

}
