<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiclePurchase extends Model {
    
    protected $fillable = [
        'manufacturer', 'model', 'production_year', 'color', 'form_factor', 'automatic', 'air_conditioning', 'passengers', 'bags', 'doors', 'fuel_consumption', 'image1', 'image2', 'image3'
    ];

}
