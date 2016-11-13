<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {
    
    protected $fillable = [
        'manufacturer', 'model', 'production_year', 'color', 'form_factor', 'automatic', 'air_conditioning', 'passengers', 'bags', 'available', 'doors', 'current_parking_lot', 'price_per_hour', 'fuel_consumption', 'image1', 'image2', 'image3'
    ];

}
