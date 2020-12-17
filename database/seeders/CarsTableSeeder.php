<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\CarsBrand;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarsBrand::create([
            "brand" => "Madza"
        ]);

        Car::create([
            "cars_brands_id" => 1,
            "name" => "RX7",
            "horsepower" => 300,
            "fuel" => "Gasoline",
            "gearshift" => "Manual",
            "year" => 1997
        ]);
    }
}
