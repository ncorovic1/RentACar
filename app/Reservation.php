<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {
    
    protected $fillable = [
        'id', 'user_id', 'vehicle_id', 'expire_date'
    ];

}
