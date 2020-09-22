<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Video Games Product

        $product1 = new Product();
        $product1->category_id = 6;
        $product1->provider_id = 1;
        $product1->name = "Xbox One S";
        $product1->price = 5300.99;
        $product1->quantity = 100;
        $product1->save();


        $product2 = new Product();
        $product2->category_id = 6;
        $product2->provider_id = 1;
        $product2->name = "Xbox One";
        $product2->price = 4899.99;
        $product2->quantity = 100;
        $product2->save();

        $product3 = new Product();
        $product3->category_id = 6;
        $product3->provider_id = 1;
        $product3->name = "Xbox One X";
        $product3->price = 9999.99;
        $product3->quantity = 100;
        $product3->save();

        $product4 = new Product();
        $product4->category_id = 6;
        $product4->provider_id = 2;
        $product4->name = "PlayStation 4";
        $product4->price = 4999.99;
        $product4->quantity = 100;
        $product4->save();

        $product5 = new Product();
        $product5->category_id = 6;
        $product5->provider_id = 2;
        $product5->name = "PlayStation 4 Slim";
        $product5->price = 5999.99;
        $product5->quantity = 100;
        $product5->save();

        $product6 = new Product();
        $product6->category_id = 6;
        $product6->provider_id = 2;
        $product6->name = "PlayStation 4 Pro";
        $product6->price = 12999.99;
        $product6->quantity = 100;
        $product6->save();
    }

}
