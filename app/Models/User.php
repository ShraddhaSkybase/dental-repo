<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\Procedure;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles,HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function appointments() {
        return $this->hasMany(Appointment::class);
    }

    public function medicalRecords(){
        return $this->hasOne(MedicalRecord::class);
    }
    public function teeths(){
        return $this->hasMany(Teeth::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function procedures(){
        return $this->hasMany(Procedure::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
}

