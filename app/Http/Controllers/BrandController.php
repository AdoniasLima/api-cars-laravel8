<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $a_brands = Brand::select("id", "brand")->get();
        return response()->json([
            "data" => $a_brands
        ]);
    }

    public function create(Request $request)
    {   
        try 
        {               
            $brand = Brand::create([
                "brand" => $request->get("brand")
            ]);
            
            $a_brand = Brand::find($brand->id);

            return response()->json([
                "status" => "success", 
                "data" => $a_brand
            ]);
        } 
        catch (\Exception $e) {
            return response()->json(["status" => "error"]);
        }
    }

    public function show($id)
    {
        $a_brand = Brand::find($id);
        return response()->json(["data" => $a_brand]);
    }

    public function update(Request $request, $id)
    {
        try 
        {
            Brand::where('id', $id)->update(['brand' => $request->get("brand")]);
            $a_brand = Brand::find($id);
            return response()->json([
                "status" => "success", 
                "data" => $a_brand
            ]);
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
