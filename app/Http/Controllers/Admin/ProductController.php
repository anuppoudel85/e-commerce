<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'on_sale' => 'nullable|boolean',
            'sale_price' => 'nullable|numeric|min:0|required_if:on_sale,1',
            'description' => 'nullable',
            'category_id' => 'required|exists:categories,id',

        ]);

        Product::create($request->only(['name', 'price', 'on_sale', 'sale_price', 'description', 'category_id']));

        return redirect()
            ->route('admin.products.index')
            ->with('sucess', 'Product has been added sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
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
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'on_sale' => 'nullable|boolean',
            'sell_price' => 'nullable|numeric|min:0|required_if:on_sale,1|lt:price',
            'description' => 'nullable',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($request->only(['name', 'price', 'on_sale', 'sell_price', 'description', 'category_id']));

        return redirect()
            ->route('admin.products.index')
            ->with('sucess', 'Product has been added updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('sucess', 'Product has been added deleted sucessfully');
    }
}
