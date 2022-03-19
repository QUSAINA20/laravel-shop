<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'    => 'required',
            'name.*'    => 'required',
            'price'   => 'required|numeric',
            'description'   => 'required',
            'description.*'   => 'required',
            'status'    => 'required',
            'status.*'    => 'required',
            'category_id'    => 'required|numeric|exists:categories,id',
            'images'    => 'required|array',
            'images.*'    => 'required|file|image',
        ]);
        $product = Product::create($validation);
        if ($request->hasFile('images')) {
            $fileAdders = $product->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->preservingOriginal()->toMediaCollection('images');
                });
        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $mediaItems = $product->getMedia('images');
        return view('admin.products.show', ['product' => $product, 'mediaItems' => $mediaItems]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $mediaItems = $product->getMedia('images');
        $categories = Category::all();

        return view('admin.products.edit', ['product' => $product, 'categories' => $categories, 'mediaItems' => $mediaItems]);
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
        $validation = $request->validate([
            'name'    => 'required',
            'name.*'    => 'required',
            'price'   => 'required|numeric',
            'description'   => 'required',
            'description.*'   => 'required',
            'status'    => 'required',
            'status.*'    => 'required',
            'category_id'    => 'required|numeric|exists:categories,id',
            'images'    => 'required|array',
            'images.*'    => 'required|file|image',
        ]);

        $product->price = $validation['price'];
        $product->category_id = $validation['category_id'];

        foreach ($validation['name'] as $lang => $name) {
            $product->setTranslation('name', $lang, $name);
        }
        foreach ($validation['description'] as $lang => $description) {
            $product->setTranslation('description', $lang, $description);
        }
        foreach ($validation['status'] as $lang => $status) {
            $product->setTranslation('status', $lang, $status);
        }

        if ($request->hasFile('images')) {
            $product->clearMediaCollection('images');
            $fileAdders = $product->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('images');
                });
        }

        $product->save();
        return redirect()->route('admin.products.index');
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
        return redirect()->route('admin.products.index');
    }
}
