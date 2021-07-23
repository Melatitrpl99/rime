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
        view()->composer('admin.carts.fields', function ($view) {
            $users = User::with('roles')->get();
            $products = Product::all();

            $maps = $users->map(function ($item, $key) {
                return [$item->id, (string) optional($item->roles->first())->name];
            })->flatten()->toArray();

            $ids = array_values(array_filter($maps, function ($v, $k) {
                return $k % 2 == 0;
            }, ARRAY_FILTER_USE_BOTH));

            $roles = array_values(array_filter($maps, function ($v, $k) {
                return $k % 2 != 0;
            }, ARRAY_FILTER_USE_BOTH));

            $userRoles = collect(array_combine($ids, $roles))->toJson();

            $userItems = $users->pluck('name','id')->toArray();
            $priceCustomer = $products->pluck('harga_customer', 'id')->toJson();
            $priceReseller = $products->pluck('harga_reseller', 'id')->toJson();
            $productItems = $products->pluck('nama','id')->toArray();
            $colorItems = Color::pluck('name','id')->toArray();
            $dimensionItems = Dimension::pluck('name','id')->toArray();
            $sizeItems = Size::pluck('name','id')->toArray();

            $view->with('userItems', $userItems)
                ->with('userRoles', $userRoles)
                ->with('priceCustomer', $priceCustomer)
                ->with('priceReseller', $priceReseller)
                ->with('productItems', $productItems)
                ->with('colorItems', $colorItems)
                ->with('dimensionItems', $dimensionItems)
                ->with('sizeItems', $sizeItems);
        });

        view()->composer('admin.orders.fields', function ($view) {
            $statusItems = Status::pluck('name','id')->toArray();
            $users = User::with('roles')->get();
            $products = Product::all();

            $maps = $users->map(function ($item, $key) {
                return [$item->id, (string) optional($item->roles->first())->name];
            })->flatten()->toArray();

            $ids = array_values(array_filter($maps, function ($v, $k) {
                return $k % 2 == 0;
            }, ARRAY_FILTER_USE_BOTH));

            $roles = array_values(array_filter($maps, function ($v, $k) {
                return $k % 2 != 0;
            }, ARRAY_FILTER_USE_BOTH));

            $userRoles = collect(array_combine($ids, $roles))->toJson();

            $userItems = $users->pluck('name','id')->toArray();
            $priceCustomer = $products->pluck('harga_customer', 'id')->toJson();
            $priceReseller = $products->pluck('harga_reseller', 'id')->toJson();
            $productItems = $products->pluck('nama','id')->toArray();
            $colorItems = Color::pluck('name','id')->toArray();
            $dimensionItems = Dimension::pluck('name','id')->toArray();
            $sizeItems = Size::pluck('name','id')->toArray();

            $view->with('userItems', $userItems)
                ->with('userRoles', $userRoles)
                ->with('priceCustomer', $priceCustomer)
                ->with('priceReseller', $priceReseller)
                ->with('productItems', $productItems)
                ->with('colorItems', $colorItems)
                ->with('dimensionItems', $dimensionItems)
                ->with('sizeItems', $sizeItems)
                ->with('statusItems',$statusItems);
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

        view()->composer('admin.discounts.fields', function ($view) {
            $productItems = Product::pluck('nama','id')->toArray();

            $view->with('productItems', $productItems);
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

        view()->composer('admin.transactions.fields', function ($view) {

            $orders = Order::all();

            $orderItems = $orders->pluck('nomor', 'id')->toArray();
            $totalOrderItems = $orders->pluck('total', 'id')->toJson();
            $biayaPengirimanItems = $orders->pluck('biaya_pengiriman', 'id')->toJson();
            $diskonItems = $orders->pluck('diskon', 'id')->toJson();

            $userItems = User::pluck('name','id')->toArray();

            $view->with('userItems', $userItems);
            $view->with('orderItems', $orderItems);
            $view->with('totalOrderItems', $totalOrderItems);
            $view->with('biayaPengirimanItems', $biayaPengirimanItems);
            $view->with('diskonItems', $diskonItems);
        });
    }
}
