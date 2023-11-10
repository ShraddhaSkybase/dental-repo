<?php

namespace App\Models;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    protected $fillable = ['name','user_id','service_id','appointment_id','description','cost'];
    protected $guarded = ['id'];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function appointment(){
        return $this->belongsTo(Appointment::class);
    }
}
