<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\store;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = product::with('store')->paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $stores = Store::all();
        return view('products.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|string|unique:products,name',
            'description'=>'nullable|string',
            'price'=>'required|numeric|min:0.01',
            'store_id'=>'required|exists:stores,id',
        ]);
        product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'store_id'=>$request->store_id,
        ]);
        return redirect()->route('products.index')->with('success', 'Them san pham thanh cong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $stores = Store::all();
        return view('products.edit', compact('stores', 'product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name'=>'required|string|unique:products,name,' .$id,
            'description'=>'nullable|string',
            'price'=>'required|numeric|min:0.01',
            'store_id'=>'required|exists:stores,id',
        ]);
        $product = product::findOrFail($id);
        $product->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'store_id'=>$request->store_id,
        ]);
        return redirect()->route('products.index')->with('success', 'Sua san pham thanh cong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Xoa san pham thanh cong!');

    }
}
