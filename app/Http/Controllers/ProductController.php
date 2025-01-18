<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
 
     /**
      * Show the application dashboard.
      *
      * @return \Illuminate\Contracts\Support\Renderable
      */
    public function showProducts()
    {
        $path = storage_path('app/public/products.json');
        $jsonData = json_decode(File::get($path), true);
        $products = $jsonData['products'] ?? [];
        return view('products', ['products' => $products]);
    }
    public function getProduct($id){
        $path = storage_path('app/public/products.json');
        
        if (!File::exists($path)) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        
        $jsonData = json_decode(File::get($path), true);
        $products = $jsonData['products'] ?? [];
        
        $product = collect($products)->firstWhere('id', $id);
        
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }
        
        return view('product', ['product' => $product]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'section' => 'required|string',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'why_want_product' => 'required|string',
            'sold_by' => 'required|string',
            'color' => 'required|string',
            'made_in' => 'required|string',
        ]);

        $image = $request->file('image');
        $section = $request->input('section');
        $imageName = $image->getClientOriginalName();

        // Check if the file already exists and add a random string if necessary
        $folder = 'public/images';
        $path = "{$folder}/{$imageName}";
        if (Storage::exists($path)) {
            $randomString = substr(md5(time()), 0, 8);
            $imageName = pathinfo($imageName, PATHINFO_FILENAME) . "_{$randomString}." . $image->getClientOriginalExtension();
            $path = "{$folder}/{$imageName}";
        }

        // Save the image
        $image->storeAs($folder, $imageName);

        // Save to the appropriate JSON file
        $jsonFileName = $section === 'autos' ? 'cars.json' : 'products.json';
        $jsonPath = "public/{$jsonFileName}";

        // Read existing data
        $existingData = Storage::exists($jsonPath) ? json_decode(Storage::get($jsonPath), true) : [];
        $newProduct = [
            'id' => count($existingData) + 1,
            'section' => $section,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'why_want_product' => $request->input('why_want_product'),
            'sold_by' => $request->input('sold_by'),
            'color' => $request->input('color'),
            'made_in' => $request->input('made_in'),
            'image_url' => "storage/images/{$imageName}",
        ];

        $existingData[] = $newProduct;

        // Save back to the JSON file
        Storage::put($jsonPath, json_encode($existingData, JSON_PRETTY_PRINT));

        return response()->json(['message' => 'Product saved successfully!', 'data' => $newProduct]);
    }

}
