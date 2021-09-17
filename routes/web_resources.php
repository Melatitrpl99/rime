<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DeliveryCostController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderTransactionController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportCategoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SpendingCategoryController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\SpendingUnitController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserShipmentController;
use App\Http\Controllers\UserVerificationController;
use App\Http\Controllers\VerificationStatusController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('activities', ActivityController::class)
        ->missing(function () {
            flash('Activity not found', 'danger');
            return redirect()->route('admin.activities.index');
        });

    Route::resource('carts', CartController::class)
        ->missing(function () {
            flash('Cart not found', 'danger');
            return redirect()->route('admin.carts.index');
        });

    Route::resource('colors', ColorController::class)
        ->missing(function () {
            flash('Color not found', 'danger');
            return redirect()->route('admin.colors.index');
        });

    Route::resource('discounts', DiscountController::class)
        ->missing(function () {
            flash('Discount not found', 'danger');
            return redirect()->route('admin.discounts.index');
        });

    Route::resource('files', FileController::class)
        ->missing(function () {
            flash('File not found', 'danger');
            return redirect()->route('admin.files.index');
        });

    Route::resource('orders', OrderController::class)
        ->missing(function () {
            flash('Order not found', 'danger');
            return redirect()->route('admin.orders.index');
        });

    Route::resource('partners', PartnerController::class)
        ->missing(function () {
            flash('Partner not found', 'danger');
            return redirect()->route('admin.partners.index');
        });

    Route::resource('posts', PostController::class)
        ->missing(function () {
            flash('Post not found', 'danger');
            return redirect()->route('admin.posts.index');
        });

    Route::resource('post_categories', PostCategoryController::class)
        ->missing(function () {
            flash('Post categories not found', 'danger');
            return redirect()->route('admin.post_categories.index');
        });

    Route::resource('products', ProductController::class)
        ->missing(function () {
            flash('Product not found', 'danger');
            return redirect()->route('admin.products.index');
        });

    Route::resource('product_categories', ProductCategoryController::class)
        ->missing(function () {
            flash('Product Category not found', 'danger');
            return redirect()->route('admin.product_categories.index');
        });

    Route::resource('reports', ReportController::class)
        ->missing(function () {
            flash('Report not found', 'danger');
            return redirect()->route('admin.reports.index');
        });

    Route::resource('user_shipments', UserShipmentController::class)
        ->missing(function () {
            flash('User Shipment not found', 'danger');
            return redirect()->route('admin.shipments.index');
        });

    Route::resource('sizes', SizeController::class)
        ->missing(function () {
            flash('Size not found', 'danger');
            return redirect()->route('admin.sizes.index');
        });

    Route::resource('spendings', SpendingController::class)
        ->missing(function () {
            flash('Spending not found', 'danger');
            return redirect()->route('admin.spendings.index');
        });

    Route::resource('statuses', StatusController::class)
        ->missing(function () {
            flash('Status not found', 'danger');
            return redirect()->route('admin.statuses.index');
        });

    Route::resource('order_transactions', OrderTransactionController::class)
        ->missing(function () {
            flash('Transaction not found', 'danger');
            return redirect()->route('admin.transactions.index');
        });

    Route::resource('users', UserController::class)
        ->missing(function () {
            flash('User not found', 'danger');
            return redirect()->route('admin.users.index');
        });

    Route::resource('testimonies', TestimonyController::class)
        ->missing(function () {
            flash('Testimony not found', 'danger');
            return redirect()->route('admin.testimonies.index');
        });

    Route::resource('user_verifications', UserVerificationController::class)
        ->missing(function () {
            flash('User Verification not found', 'danger');
            return redirect()->route('admin.user_verifications.index');
        });

    Route::resource('spending_categories', SpendingCategoryController::class)
        ->missing(function () {
            flash('Spending Category not found', 'danger');
            return redirect()->route('admin.spending_categories.index');
        });

    Route::resource('spending_units', SpendingUnitController::class)
        ->missing(function () {
            flash('Spending Unit not found', 'danger');
            return redirect()->route('admin.spending_units.index');
        });

    Route::resource('payment_methods', PaymentMethodController::class)
        ->missing(function () {
            flash('Payment Method not found', 'danger');
            return redirect()->route('admin.payment_methods.index');
        });

    Route::resource('report_categories', ReportCategoryController::class)
        ->missing(function () {
            flash('Report Category not found', 'danger');
            return redirect()->route('admin.report_categories.index');
        });

    Route::resource('delivery_costs', DeliveryCostController::class)
        ->missing(function () {
            flash('Delivery Cost not found', 'danger');
            return redirect()->route('admin.delivery_costs.index');
        });

    Route::resource('verification_statuses', VerificationStatusController::class)
        ->missing(function () {
            flash('Verification Status not found', 'danger');
            return redirect()->route('admin.verification_statuses.index');
        });
});
