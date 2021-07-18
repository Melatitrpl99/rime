<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Dimension;
use App\Models\Discount;
use App\Models\District;
use App\Models\Event;
use App\Models\File;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Report;
use App\Models\Size;
use App\Models\Spending;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Village;
use Spatie\Permission\Models\Role;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.cart_details.fields', function ($view) {
            $cartItems = Cart::pluck('nomor', 'id')->toArray();
            $productItems = Product::pluck('nama','id')->toArray();
            $colorItems = Color::pluck('name','id')->toArray();
            $dimensionItems = Dimension::pluck('name','id')->toArray();
            $sizeItems = Size::pluck('name','id')->toArray();

            $view->with('cartItems', $cartItems)
                ->with('productItems', $productItems)
                ->with('colorItems', $colorItems)
                ->with('dimensionItems', $dimensionItems)
                ->with('sizeItems', $sizeItems);
            });

        view()->composer('admin.carts.fields', function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $productItems = Product::pluck('nama','id')->toArray();
            $priceCustomer = Product::pluck('harga_customer', 'id')->toJson();
            $priceReseller = Product::pluck('harga_reseller', 'id')->toJson();
            $colorItems = Color::pluck('name','id')->toArray();
            $dimensionItems = Dimension::pluck('name','id')->toArray();
            $sizeItems = Size::pluck('name','id')->toArray();

            $view->with('userItems', $userItems)
                ->with('priceCustomer', $priceCustomer)
                ->with('priceReseller', $priceReseller)
                ->with('productItems', $productItems)
                ->with('colorItems', $colorItems)
                ->with('dimensionItems', $dimensionItems)
                ->with('sizeItems', $sizeItems);
        });

        view()->composer('admin.discount_details.fields', function ($view) {
            $discountItems = Discount::pluck('judul', 'id')->toArray();
            $productItems = Product::pluck('nama','id')->toArray();

            $view->with('discountItems', $discountItems)
                ->with('productItems', $productItems);
        });

        view()->composer('admin.order_details.fields', function ($view) {
            $orderItems = Order::pluck('nomor', 'id')->toArray();
            $productItems = Product::pluck('nama','id')->toArray();
            $colorItems = Color::pluck('name','id')->toArray();
            $dimensionItems = Dimension::pluck('name','id')->toArray();
            $sizeItems = Size::pluck('name','id')->toArray();

            $view->with('orderItems', $orderItems)
                ->with('productItems', $productItems)
                ->with('colorItems', $colorItems)
                ->with('dimensionItems', $dimensionItems)
                ->with('sizeItems', $sizeItems);
        });

        view()->composer('admin.orders.fields', function ($view) {
            $statusItems = Status::pluck('name','id')->toArray();
            $userItems = User::pluck('name','id')->toArray();

            $view->with('statusItems', $statusItems)
            ->with('userItems', $userItems);
        });

        view()->composer('admin.posts.fields', function ($view) {
            $postCategoryItems = PostCategory::pluck('name','id')->toArray();
            $userItems = User::pluck('name','id')->toArray();

            $view->with('postCategoryItems', $postCategoryItems)
                ->with('userItems', $userItems);
        });

        view()->composer('admin.product_stocks.fields', function ($view) {
            $productItems = Product::pluck('nama','id')->toArray();
            $colorItems = Color::pluck('name','id')->toArray();
            $dimensionItems = Dimension::pluck('name','id')->toArray();
            $sizeItems = Size::pluck('name','id')->toArray();

            $view->with('productItems', $productItems)
                ->with('colorItems', $colorItems)
                ->with('dimensionItems', $dimensionItems)
                ->with('sizeItems', $sizeItems);
        });

        view()->composer('admin.products.fields', function ($view) {
            $categoryItems = Category::pluck('nama','id')->toArray();

            $view->with('categoryItems', $categoryItems);
        });

        view()->composer('admin.reports.fields', function ($view) {
            $userItems = User::pluck('name','id')->toArray();

            $view->with('userItems', $userItems);
        });

        view()->composer('admin.shipments.fields', function ($view) {
            $orderItems = Order::pluck('nomor', 'id')->toArray();
            $provinceItems = Province::pluck('name', 'id')->toArray();
            $regencyItems = Regency::pluck('name', 'id')->toArray();
            $districtItems = District::pluck('name', 'id')->toArray();
            $villageItems = Village::pluck('name', 'id')->toArray();

            $view->with('orderItems', $orderItems)
                ->with('provinceItems', $provinceItems)
                ->with('regencyItems', $regencyItems)
                ->with('districtItems', $districtItems)
                ->with('villageItems', $villageItems);
        });

        view()->composer('admin.transaction_details.fields', function ($view) {
            $orderItems = Order::pluck('nomor', 'id')->toArray();
            $transactionItems = Transaction::pluck('nomor', 'id')->toArray();

            $view->with('orderItems', $orderItems)
                ->with('transactionItems', $transactionItems);
        });

        view()->composer('admin.transactions.fields', function ($view) {
            $userItems = User::pluck('name','id')->toArray();

            $view->with('userItems', $userItems);
        });
    }
}
