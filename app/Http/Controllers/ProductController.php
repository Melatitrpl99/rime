<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductStock;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the Product.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $products = Product::with('productCategory:id,name')
            ->withSum('productStocks', 'stok_ready')
            ->paginate(15);

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
     * @param \App\Http\Requests\StoreProductRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request
            ->safe()
            ->except(['size_id', 'color_id', 'stok_ready']));

        foreach ($request->color_id as $key => $colorId) {
            $product->productStocks()->create([
                'color_id'   => $colorId,
                'size_id'    => $request->size_id[$key],
                'stok_ready' => $request->stok_ready[$key]
            ]);
        }

        if ($request->filled('path')) {
            $this->saveFile($request->input('path'), $request->nama, 'produk', $product);
        }

        flash('Product saved successfully.', 'success');

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified Product.
     *
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(Product $product)
    {
        $product->load(['productStocks', 'productStocks.color:id,name', 'productStocks.size:id,name']);

        return view('admin.products.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(Product $product)
    {
        $product->load([
            'productStocks',
            'productStocks.color',
            'productStocks.size'
        ]);
        return view('admin.products.edit')
            ->with('product', $product);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param \App\Models\Product $product
     * @param \App\Http\Requests\UpdateProductRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $product->update($request->validated());

        $product->productStocks()->forceDelete();
        foreach ($request->color_id as $key => $colorId) {
            $product->productStocks()->create([
                'color_id' => $colorId,
                'size_id' => $request->size_id[$key],
                'stok_ready' => $request->stok_ready[$key]
            ]);
        }

        if ($request->filled('path')) {
            $product->images()->delete();
            $this->saveFile($request->input('path'), $request->nama, 'produk', $product);
        }

        flash('Product updated successfully.', 'success');

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(Product $product)
    {
        $product->images()->delete();
        $product->productStocks()->delete();
        $product->delete();

        flash('Product deleted successfully.', 'success');

        return redirect()->route('admin.products.index');
    }
}
