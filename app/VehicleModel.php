<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VehicleMake;

class VehicleModel extends Model
{
    public function make()
    {
        return $this->belongsTo(VehicleMake::class,'vehicle_make_id');
    }

   
}
