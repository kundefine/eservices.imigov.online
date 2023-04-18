<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormGenerator;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentMethodIndex()
    {
        return view('users.admin.payment-method.paymentMethodIndex')->with('payment_methods', PaymentMethod::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentMethodCreate()
    {
        return view('users.admin.payment-method.paymentMethodCreate')->with(["forms" => FormGenerator::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paymentMethodStore(Request $request)
    {
        $validData = $request->validate([
            "name" => ["required", "unique:services", "max:200"],
            "type" => ["required", "max:200"],
            "form_generator_id" => ["required"],
        ]);
        $validData["admin_id"] = auth()->id();
        $created = PaymentMethod::create($validData);
        if($created) return back()->with(["success" => [
            "heading" => "Payment Method Added",
            "messages" => ["Payment method added successfully"],
            "autoclose" => 6000
        ]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function paymentMethodEdit(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function paymentMethodUpdate(Request $request, PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function paymentMethodDestroy(PaymentMethod $paymentMethod)
    {
        //
    }

    public function paymentMethodIndexAjax()
    {
        return PaymentMethod::with('form')->get();
    }
}
