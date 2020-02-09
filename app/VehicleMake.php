<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VehicleModel;

class VehicleMake extends Model
{
    
    public function models()
    {
        return $this->hasMany(VehicleModel::class);
    }
}
