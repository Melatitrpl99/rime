<?php

namespace App\Providers;

use App\Models\Color;
use App\Models\PaymentMethod;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductStock;
use App\Models\Province;
use App\Models\Size;
use App\Models\Status;
use App\Models\User;
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
        view()->composer('admin.reports.fields', function ($view) {
            $userItems = User::pluck('nama_lengkap', 'id')->toArray();

            $view->with('userItems', $userItems);
        });
        // predefined here already //
        view()->composer('admin.user_verifications.fields', function ($view) {
            $userItems = User::pluck('nama_lengkap', 'id')->toArray();

            $view->with('userItems', $userItems);
        });

        view()->composer('admin.order_transactions.fields', function ($view) {
            //
            $userItems = User::pluck('nama_lengkap', 'id')->toArray();

            $view->with('userItems', $userItems);
        });

        view()->composer('admin.testimonies.fields', function ($view) {
            $productItems = Product::pluck('nama', 'id')->toArray();
            $userItems = User::pluck('nama_lengkap', 'id')->toArray();

            $view->with('userItems', $userItems)
                ->with('productItems', $productItems);
        });

        view()->composer('admin.carts.fields', function ($view) {
            $users = User::with('roles')->get();
            $products = Product::all();

            $maps = $users->map(function ($user, $key) {
                return [$user->id, (string) optional($user->roles->first())->name];
            })->flatten()->toArray();

            $ids = array_values(array_filter($maps, function ($v, $k) {
                return $k % 2 == 0;
            }, ARRAY_FILTER_USE_BOTH));

            $roles = array_values(array_filter($maps, function ($v, $k) {
                return $k % 2 != 0;
            }, ARRAY_FILTER_USE_BOTH));

            $userRoles = collect(array_combine($ids, $roles))->toJson();

            $userItems = $users->pluck('nama_lengkap', 'id')->toArray();
            $priceCustomer = $products->pluck('harga_customer', 'id')->toJson();
            $priceReseller = $products->pluck('harga_reseller', 'id')->toJson();
            $minimumReseller = $products->pluck('reseller_minimum', 'id')->toJson();
            $productItems = $products->pluck('nama', 'id')->toArray();
            $colorItems = Color::pluck('name', 'id')->toArray();
            $sizeItems = Size::pluck('name', 'id')->toArray();
            $productStocks = ProductStock::all()->toJson();

            $view->with('userItems', $userItems)
                ->with('userRoles', $userRoles)
                ->with('minimumReseller', $minimumReseller)
                ->with('priceCustomer', $priceCustomer)
                ->with('priceReseller', $priceReseller)
                ->with('productItems', $productItems)
                ->with('colorItems', $colorItems)
                ->with('sizeItems', $sizeItems)
                ->with('productStocks', $productStocks);
        });

        view()->composer('admin.orders.fields', function ($view) {
            $users = User::with('roles')->get();
            $products = Product::all();

            $maps = $users->map(function ($user, $key) {
                return [$user->id, (string) optional($user->roles->first())->name];
            })->flatten()->toArray();

            $ids = array_values(array_filter($maps, function ($v, $k) {
                return $k % 2 == 0;
            }, ARRAY_FILTER_USE_BOTH));

            $roles = array_values(array_filter($maps, function ($v, $k) {
                return $k % 2 != 0;
            }, ARRAY_FILTER_USE_BOTH));

            $userRoles = collect(array_combine($ids, $roles))->toJson();

            $userItems = $users->pluck('nama_lengkap', 'id')->toArray();
            $priceCustomer = $products->pluck('harga_customer', 'id')->toJson();
            $priceReseller = $products->pluck('harga_reseller', 'id')->toJson();
            $minimumReseller = $products->pluck('reseller_minimum', 'id')->toJson();
            $productItems = $products->pluck('nama', 'id')->toArray();
            $statusItems = Status::pluck('name', 'id')->toArray();
            $colorItems = Color::pluck('name', 'id')->toArray();
            $sizeItems = Size::pluck('name', 'id')->toArray();
            $paymentMethodItems = PaymentMethod::pluck('name', 'id')->toArray();

            $view->with('userItems', $userItems)
                ->with('userRoles', $userRoles)
                ->with('priceCustomer', $priceCustomer)
                ->with('priceReseller', $priceReseller)
                ->with('minimumReseller', $minimumReseller)
                ->with('productItems', $productItems)
                ->with('colorItems', $colorItems)
                ->with('sizeItems', $sizeItems)
                ->with('paymentMethodItems', $paymentMethodItems)
                ->with('statusItems', $statusItems);
        });

        view()->composer('admin.posts.fields', function ($view) {
            $postCategoryItems = PostCategory::pluck('name', 'id')->toArray();
            $userItems = User::pluck('nama_lengkap', 'id')->toArray();

            $view->with('postCategoryItems', $postCategoryItems)
                ->with('userItems', $userItems);
        });

        view()->composer('admin.products.fields', function ($view) {
            $productCategoryItems = ProductCategory::pluck('name', 'id')->toArray();
            $colorItems = Color::pluck('name', 'id')->toArray();
            $sizeItems = Size::pluck('name', 'id')->toArray();

            $view->with('productCategoryItems', $productCategoryItems)
                ->with('colorItems', $colorItems)
                ->with('sizeItems', $sizeItems);
        });

        view()->composer('admin.reports.fields', function ($view) {
            $userItems = User::pluck('nama_lengkap', 'id')->toArray();

            $view->with('userItems', $userItems);
        });

        view()->composer('admin.discounts.fields', function ($view) {
            $productItems = Product::pluck('nama', 'id')->toArray();

            $view->with('productItems', $productItems);
        });

        view()->composer('admin.user_shipments.fields', function ($view) {
            $userItems = User::pluck('nama_lengkap', 'id')->toArray();
            $provinceItems = Province::pluck('name', 'id')->toArray();

            $view->with('userItems', $userItems)
                ->with('provinceItems', $provinceItems);
        });
    }
}
