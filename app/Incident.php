<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model {
    //
    protected $fillable = ['user_id', 'vehicle_id', 'type', 'date', 'description', 'damage'];
}