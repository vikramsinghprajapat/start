<?php

use Illuminate\Database\Seeder;
use App\VehicleMake;
class VehicleMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicleMake = new VehicleMake();
        $vehicleMake->name = 'Dodge';
        $vehicleMake->save();
        $vehicleMake = new VehicleMake();
        $vehicleMake->name = 'Toyota';
        $vehicleMake->save();
    }
}
