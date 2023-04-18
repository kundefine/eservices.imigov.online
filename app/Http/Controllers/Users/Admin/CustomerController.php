<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customerIndex()
    {

    }
    public function customerCreate()
    {
    }
    public function customerStore(Request $request)
    {
    }
    public function customerShow(Customer $customer)
    {
    }
    public function customerEdit(Customer $customer)
    {
    }
    public function customerUpdate(Request $request, Customer $customer)
    {
    }
    public function customerDestroy(Customer $customer)
    {
    }

    public function customerCreateAjax(Request $request)
    {
        $validData = $request->validate([
            'customer.name' => ['required'],
            'customer.email' => ['required'],
            'customer.address' => ['required'],
        ]);

        return Customer::create($validData["customer"]);


    }

    public function customerIndexAjax()
    {
        return Customer::all();
    }
}
