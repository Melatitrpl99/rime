<?php

namespace App\Providers;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Category;
use App\Models\User;

use Illuminate\Support\ServiceProvider;
use View;

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
        View::composer(['admin.shipments.fields'], function ($view) {
            $orderItems = Order::pluck('nomor_order','id')->toArray();
            $view->with('orderItems', $orderItems);
        });
        View::composer(['admin.transaction_details.fields'], function ($view) {
            $orderItems = Order::pluck('nomor_order','id')->toArray();
            $view->with('orderItems', $orderItems);
        });
        View::composer(['admin.transaction_details.fields'], function ($view) {
            $transactionItems = Transaction::pluck('nomor_transaksi','id')->toArray();
            $view->with('transactionItems', $transactionItems);
        });
        View::composer(['admin.transactions.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['admin.reports.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['admin.reports.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['admin.transaction_details.fields'], function ($view) {
            $orderItems = Order::pluck('nomor_order','id')->toArray();
            $view->with('orderItems', $orderItems);
        });
        View::composer(['admin.transaction_details.fields'], function ($view) {
            $transactionItems = Transaction::pluck('nomor_transaksi','id')->toArray();
            $view->with('transactionItems', $transactionItems);
        });
        View::composer(['admin.transactions.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['admin.shipments.fields'], function ($view) {
            $orderItems = Order::pluck('nomor_order','id')->toArray();
            $view->with('orderItems', $orderItems);
        });
        View::composer(['admin.order_details.fields'], function ($view) {
            $cartItems = Cart::pluck('judul','id')->toArray();
            $view->with('cartItems', $cartItems);
        });
        View::composer(['admin.order_details.fields'], function ($view) {
            $orderItems = Order::pluck('nomor_order','id')->toArray();
            $view->with('orderItems', $orderItems);
        });
        View::composer(['admin.orders.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['admin.cart_details.fields'], function ($view) {
            $productItems = Product::pluck('nama','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['admin.cart_details.fields'], function ($view) {
            $cartItems = Cart::pluck('judul','id')->toArray();
            $view->with('cartItems', $cartItems);
        });
        View::composer(['admin.carts.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['admin.discount_details.fields'], function ($view) {
            $productItems = Product::pluck('nama','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['admin.discount_details.fields'], function ($view) {
            $discountItems = Discount::pluck('judul','id')->toArray();
            $view->with('discountItems', $discountItems);
        });
        View::composer(['admin.reports.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['admin.news.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['admin.products.fields'], function ($view) {
            $categoryItems = Category::pluck('nama','id')->toArray();
            $view->with('categoryItems', $categoryItems);
        });
        View::composer(['admin.activities.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['admin.activities.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        //
    }
}