<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    protected $fillable = ['vehicle_id','user_id','descripcion','fecha','hora'];
}
