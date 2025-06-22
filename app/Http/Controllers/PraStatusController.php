<?php

namespace App\Http\Controllers;

use App\Models\PraStatus;
use Illuminate\Http\Request;

class PraStatusController extends Controller
{
    public function index()
    {
        return view('pra_status.index');
    }

    public function search(Request $request)
    {
        $pra_status = PraStatus::query();



        if($request->filled('document')) $pra_status->where('employer_identification_card_no', $request->document);

        if($request->filled('registration')) $pra_status->where('company_registration_no', $request->registration);

        if($request->filled('application')) $pra_status->where('application_no', $request->application);

        return view('pra_status.search', ['pra_status_list' => $pra_status->orderBy('id', 'asc')->paginate(6)]);
    }


}
