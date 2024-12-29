<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class cars extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCars()
    {
        $path = storage_path('app/public/cars.json');
        $jsonData = json_decode(File::get($path), true);
        $products = $jsonData['products'] ?? [];
        return view('cars', ['products' => $products]);
    }
    public function getCar($id){
        $path = storage_path('app/public/cars.json');
        
        if (!File::exists($path)) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        
        $jsonData = json_decode(File::get($path), true);
        $products = $jsonData['products'] ?? [];
        
        $product = collect($products)->firstWhere('id', $id);
        
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }
        
        return view('car', ['product' => $product]);
    }
}
