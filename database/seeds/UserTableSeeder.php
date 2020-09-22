<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->names = "Soporte";
        $admin->surnames = "Pruebas";
        $admin->email = "soporte@sistemaventas.com";
        $admin->username = "Soporte";
        $admin->profile_picture_uri = "na.jpeg";
        $admin->setPasswordAttribute("1234");
        $admin->save();

        $admin->roles()->attach(Role::where('name', 'admin')->first());
    }
}
