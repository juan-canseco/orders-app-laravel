<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    // If a class is in the same folder or does not have namespaces then don use
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(CategoryTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProviderTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}
