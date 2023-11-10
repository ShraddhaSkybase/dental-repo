<?php

namespace App\Models;


use App\Enums\AppointmentStatusEnum;
use App\Models\Procedure;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;
   
    protected $guarded = ['id'];
    protected $enum = [
        'status' => ['free', 'scheduled', 'cancelled','completed'],
    ];
    public function user() {
        return $this->belongsTo(User::class,'user_id');

    }
    public function dentist(){
        return $this->belongsTo(User::class,'dentist_id');
    }

    public function procedures(){
        return $this->hasMany(Procedure::class,'procedure_id');
    }
}
