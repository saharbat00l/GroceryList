<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
    return view('products.index' , compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required | numeric',
            'price' => 'numeric'
        ]);

        $newProduct = Product::create($data);

    return redirect (route ('product.index'));
    }

    public function edit(Product $product){
        // dd($product);
    return view('products.edit', compact('product'));
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required | numeric',
            'price' => 'numeric'
        ]);
        $product ->update($data);
    return redirect (route ('product.index'));
    }

    public function destroy(Product $product)
{
    $id = $product->id; // Get the ID of the product before deleting it
    
    $product->delete();
    
    // Find all records with IDs greater than the deleted item
    $itemsToUpdate = Product::where('id', '>', $id)->get();

    // Update the IDs of the remaining records
    foreach ($itemsToUpdate as $itemToUpdate) {
        $itemToUpdate->id = $itemToUpdate->id - 1;
        $itemToUpdate->save();
    }

    return redirect(route('product.index'));
}



    


}
