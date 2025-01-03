<?php

namespace App\Http\Controllers;

use App\Models\PraStatus;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function search(Request $request)
    {
        $pra_status = PraStatus::query();

        if($request->filled('registration')) $pra_status->where('company_registration_no', 'LIKE', '%' .$request->registration. '%');
        if($request->filled('application')) $pra_status->where('application_no', 'LIKE', '%' .$request->application. '%');
        if($request->filled('document')) $pra_status->where('document_no', 'LIKE', '%' .$request->document. '%');
        return view('pra_status.search', ['pra_status_list' => $pra_status->orderBy('id', 'asc')->paginate(6)]);
    }
}
