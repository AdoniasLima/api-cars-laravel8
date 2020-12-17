<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Brand;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            "brand" => "Mazda"
        ]);

        Car::create([
            "brand_id" => 1,
            "name" => "RX7",
            "horsepower" => 300,
            "fuel" => "Gasoline",
            "gearshift" => "Manual",
            "year" => 1997
        ]);
    }
}
