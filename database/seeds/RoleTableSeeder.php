<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = new Role();
        $role1->name = 'admin';
        $role1->description = 'Administrador';
        $role1->save();

        $role2 = new Role();
        $role2->name = 'user';
        $role2->description = 'Empleado';
        $role2->save();

        // This is for online web site
        $role3 = new Role();
        $role3->name = "customer";
        $role3->description = 'Cliente';
        $role3->save();
    }
}
