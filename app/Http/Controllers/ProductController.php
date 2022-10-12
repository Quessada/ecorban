<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Products/Index', [
            'products' => Product::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Products/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(rules: [
            'name' => 'required|string|max:255',
            'code' => 'required|max:255',
            'price' => 'required|numeric',
            'image' => 'required',
        ], customAttributes: [
            'name' => 'nome',
            'code' => 'código',
            'price' => 'preço',
            'image' => 'imagem',
        ]);

        if ($request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $fileName = uniqid().time()."_{$imageFile->getClientOriginalName()}";
            $storagedFile = $imageFile->storeAs('products', $fileName);

            // return dd($storagedFile);
        }

        $validated['image'] = $storagedFile ?? '';

        $product = Product::create($validated);

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // return $product;
        return Inertia::render('Products/Edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate(rules: [
            'name' => 'required|string|max:255',
            'code' => 'required|max:255',
            'price' => 'required|numeric',
        ], customAttributes: [
            'name' => 'nome',
            'code' => 'código',
            'price' => 'preço',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $fileName = uniqid().time()."_{$imageFile->getClientOriginalName()}";
            $storagedFile = $imageFile->storeAs('products', $fileName);
        }

        $validated['image'] = $storagedFile ?? $product->image;

        $product->update($validated);

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
    }
}
