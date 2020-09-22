<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer1 = new Customer();
        $customer1->names = "Publico";
        $customer1->surnames = "General";
        $customer1->rfc  = "XAXX010101000";
        $customer1->save();

        $customer2 = new Customer();
        $customer2->names = "Pedro Antonio";
        $customer2->surnames = "Perez Lopez";
        $customer2->rfc = "123456789123456789";
        $customer2->save();
    }
}
