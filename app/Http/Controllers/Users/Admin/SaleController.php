<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Service;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function saleIndex()
    {
        return view('users.admin.sale.saleIndex')->with(["sales" => Sale::all()]);
    }
    public function saleCreate()
    {
        return view('users.admin.sale.saleCreate')->with(["services" => Service::all()]);
    }
    public function saleStore(Request $request)
    {

    }
    public function saleShow(Sale $sale)
    {

    }

    public function saleEdit(Sale $sale)
    {
        return view('users.admin.sale.saleEdit', compact('sale'));
    }
    public function saleUpdate(Request $request, Sale $sale)
    {

    }
    public function saleDestroy(Sale $sale)
    {

    }
}
