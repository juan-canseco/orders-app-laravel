<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = new Category();
        $category1->name = 'Electrónicos';
        $category1->save();

        $category2 = new Category();
        $category2->name = 'Alimentos y Bebidas';
        $category2->save();

        $category3 = new Category();
        $category3->name = 'Salud y Cuidado Personal';
        $category3->save();

        $category4 = new Category();
        $category4->name = 'Hogar y Cocina';
        $category4->save();

        $category5 = new Category();
        $category5->name = 'Ropa, Zapatos y Accesorios';
        $category5->save();

        $category6 = new Category();
        $category6->name = 'Videojuegos';
        $category6->save();

    }
}
