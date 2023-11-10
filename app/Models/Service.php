<?php

namespace App\Models;

use App\Models\Procedure;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function procedure(){
        return $this->hasMany(Procedure::class);
    }
}
