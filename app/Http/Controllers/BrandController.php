<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{   

    private $response;

    public function index()
    {
        $brands = Brand::select("id", "brand")->get();
        $this->response = ["data" => $brands];
        return response()->json($this->response);
    }

    public function create(Request $request)
    {   
        try 
        {               
            $createdBrand = Brand::create([
                "brand" => $request->get("brand")
            ]);            
            $brand = Brand::find($createdBrand->id);
            $this->response = ["status" => "success", "data" => $brand];
            return response()->json($this->response);
        } 
        catch (\Exception $e) {
            return response()->json(["status" => "error"]);
        }
    }

    public function show($id)
    {
        $brand = Brand::find($id);
        return response()->json(["data" => $brand]);
    }

    public function update(Request $request, $id)
    {
        try 
        {
            Brand::where('id', $id)->update(['brand' => $request->get("brand")]);
            $brand = Brand::find($id);
            $this->response = ["status" => "success", "data" => $brand];
            return response()->json($this->response);
        } 
        catch (\Exception $e) {
            return response()->json(["status" => "error"]);
        }
    }

    public function destroy($id)
    {
        Brand::destroy($id);
        return response()->json(["status" => "success"]);
    }
}
