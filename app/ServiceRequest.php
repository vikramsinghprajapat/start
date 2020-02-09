<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\VehicleMake;
use App\VehicleModel;

class ServiceRequest extends Model
{
   
   public $fillable = ['id','vehicle_make_id','vehicle_model_id','name','email','phone','service_description'];
   
    public function models()
    {
        return $this->hasMany(VehicleModel::class);
    }
     public function make()
    {
        return $this->belongsTo(VehicleMake::class);
    }
}
