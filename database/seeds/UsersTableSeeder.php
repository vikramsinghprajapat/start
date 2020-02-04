<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_employee = Role::where('name', 'admin')->first();
        $role_manager  = Role::where('name', 'End user')->first();
        $employee = new User();
        $employee->name = 'Admin vikram';
        $employee->email = 'admin@example.com';
        $employee->password = bcrypt('admin@123');
        $employee->save();
        $employee->roles()->attach($role_employee);
        $manager = new User();
        $manager->name = 'Talor';
        $manager->email = 'talor@example.com';
        $manager->password = bcrypt('enduser@123');
        $manager->save();
        $manager->roles()->attach($role_manager);
 
    }
}
