<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the Product.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $products = Product::paginate(15);

        return view('admin.products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param \App\Http\Requests\CreateProductRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = Product::create($request->validated());

        flash('Product saved successfully.', 'success');

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified Product.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (empty($product)) {
            flash('Product not found', 'error');

            return redirect()->route('admin.products.index');
        }

        return view('admin.products.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (empty($product)) {
            flash('Product not found', 'error');

            return redirect()->route('admin.products.index');
        }

        return view('admin.products.edit')
            ->with('product', $product);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param $id
     * @param \App\Http\Requests\UpdateProductRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = Product::find($id);

        if (empty($product)) {
            flash('Product not found', 'error');

            return redirect()->route('admin.products.index');
        }

        $product->update($request->validated());

        flash('Product updated successfully.', 'success');

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (empty($product)) {
            flash('Product not found', 'error');

            return redirect()->route('admin.products.index');
        }

        $product->delete();

        flash('Product deleted successfully.', 'success');

        return redirect()->route('admin.products.index');
    }
}