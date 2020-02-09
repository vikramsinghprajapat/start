<?php

use Illuminate\Database\Seeder;
use App\VehicleModel;

class VehicleModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicleModel = new VehicleModel();
        $vehicleModel->vehicle_make_id = 1;
        $vehicleModel->name = 'Ram 1500';
        $vehicleModel->save();

    	$vehicleModel = new VehicleModel();

        $vehicleModel->vehicle_make_id = 1;
        $vehicleModel->name = 'Ram Rebel';
        $vehicleModel->save();

        $vehicleModel = new VehicleModel();
        $vehicleModel->vehicle_make_id = 2;
        $vehicleModel->name = 'Tacoma';
        $vehicleModel->save();
  		$vehicleModel = new VehicleModel();
        $vehicleModel->vehicle_make_id = 2;
        $vehicleModel->name = 'Tundra';
        $vehicleModel->save();
    }
}
