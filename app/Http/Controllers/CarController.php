<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Car;

class CarController extends Controller
{

    private $response;

    public function index()
    {
        $cars = Car::select("id", "name", "horsepower", "fuel", "gearshift", "year")->get();
        $this->response = ["data" => $cars];
        return response()->json($this->response);
    }

    public function all()
    {   
        $this->response = ["data" => []];
        $brands = Brand::with("cars")->get(); 
        foreach($brands as $brand){
            $cars = $brand->cars;
            $this->response["data"][] = [
                "brand_id" => $brand->id,
                "brand_name" => $brand->brand,
                "brand_cars" => $cars
            ];
        }
        return response()->json($this->response);
    }

    public function create(Request $request)
    {
        try {
            $car = [
                'name' => $request->get("name"), 
                'horsepower' => $request->get("horsepower"), 
                'fuel' => $request->get("fuel"), 
                'gearshift' => $request->get("gearshift"), 
                'year' => $request->get("year")
            ];
            $brand = Brand::find($request->get("brand_id"));
            $insertCar = $brand->cars()->create($car);
            $this->response = ["status" => "success", "data" => $insertCar];
            return response()->json($this->response);
        } catch (\Exception $e) {
            return response()->json(["status" => "error"]);
        }
    }

    public function show($id)
    {   
        $cars = Car::find($id);
        $brand = $cars->brand;
        $this->response = ["data" => $cars];
        return response()->json($this->response);
    }

    public function update(Request $request, $id)
    {
        try {
            $car = [
                'brand_id' => $request->get("brand_id"),
                'name' => $request->get("name"), 
                'horsepower' => $request->get("horsepower"), 
                'fuel' => $request->get("fuel"), 
                'gearshift' => $request->get("gearshift"), 
                'year' => $request->get("year")
            ];
            Car::where('id', $id)->update($car);
            $updateCar = Car::find($id);
            $this->response = ["status" => "success", "data" => $updateCar];
            return response()->json($this->response);
        } catch (\Exception $e) {
            return response()->json(["status" => "error"]);
        }
    }

    public function destroy($id)
    {
        Car::destroy($id);
        return response()->json(["status" => "success"]);
    }
}
