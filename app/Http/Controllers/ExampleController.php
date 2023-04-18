<?php

namespace App\Http\Controllers;

use App\Models\FormGenerator;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function exampleGet()
    {
        return PaymentMethod::with('form')->get()->dd();
    }

    public function examplePost(Request $request)
    {

    }

    public function exampleAuth()
    {

    }
}
