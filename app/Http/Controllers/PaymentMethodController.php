<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

/**
 * Class PaymentMethodController.
 */
class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the PaymentMethod.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function index(Request $request)
    {
        $paymentMethods = PaymentMethod::paginate(15);

        return view('admin.payment_methods.index')
            ->with('paymentMethods', $paymentMethods);
    }

    /**
     * Show the form for creating a new PaymentMethod.
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function create()
    {
        return view('admin.payment_methods.create');
    }

    /**
     * Store a newly created PaymentMethod in storage.
     *
     * @param \App\Http\Requests\StorePaymentMethodRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function store(StorePaymentMethodRequest $request)
    {
        PaymentMethod::create($request->validated());

        flash('Payment Method saved successfully.', 'success');

        return redirect()->route('admin.payment_methods.index');
    }

    /**
     * Display the specified PaymentMethod.
     *
     * @param \App\Models\PaymentMethod $paymentMethod
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function show(PaymentMethod $paymentMethod)
    {
        return view('admin.payment_methods.show')
            ->with('paymentMethod', $paymentMethod);
    }

    /**
     * Show the form for editing the specified PaymentMethod.
     *
     * @param \App\Models\PaymentMethod $paymentMethod
     *
     * @return \Illuminate\Support\Facades\Response|\Illuminate\Support\Facades\View
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        return view('admin.payment_methods.edit')
            ->with('paymentMethod', $paymentMethod);
    }

    /**
     * Update the specified PaymentMethod in storage.
     *
     * @param \App\Models\PaymentMethod $paymentMethod
     * @param \App\Http\Requests\UpdatePaymentMethodRequest $request
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function update(PaymentMethod $paymentMethod, UpdatePaymentMethodRequest $request)
    {
        $paymentMethod->update($request->validated());

        flash('Payment Method updated successfully.', 'success');

        return redirect()->route('admin.payment_methods.index');
    }

    /**
     * Remove the specified PaymentMethod from storage.
     *
     * @param \App\Models\PaymentMethod $paymentMethod
     *
     * @return \Illuminate\Support\Facades\Response
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();

        flash('Payment Method deleted successfully.', 'success');

        return redirect()->route('admin.payment_methods.index');
    }
}
