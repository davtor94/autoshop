<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    protected $fillable= ['user_id', 'appoinment_id','description','price'];
}
