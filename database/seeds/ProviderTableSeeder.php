<?php

use Illuminate\Database\Seeder;
use App\Provider;

class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $microsoft = new Provider();
        $microsoft->company = "Microsoft";
        $microsoft->names = "Microsoft";
        $microsoft->surnames = "Latam";
        $microsoft->cell_phone = "(52) 541 3232 483";
        $microsoft->save();

        $sony = new Provider();
        $sony->company = "Sony";
        $sony->names = "Sony";
        $sony->surnames = "Latam";
        $sony->cell_phone = "(52) 541 3232 484";
        $sony->save();


        $nintendo = new Provider();
        $nintendo->company = "Nintendo";
        $nintendo->names = "Nintendo";
        $nintendo->surnames = "Latam";
        $nintendo->cell_phone = "(52) 541 3232 485";
        $nintendo->save();


        $nvidia = new Provider();
        $nvidia->company = "NVIDIA";
        $nvidia->names = "Nvidia";
        $nvidia->surnames = "Latam";
        $nvidia->cell_phone = "(52) 541 3232 471";
        $nvidia->save();

        $amd = new Provider();
        $amd->company = "AMD";
        $amd->names = "AMD";
        $amd->surnames = "Latam";
        $amd->cell_phone =  "(52) 541 3232 471";
        $amd->save();


    }
}
