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

        if($request->filled('MAD_ROC_NO1')) $pra_status->where('employer_identification_card_no', $request->MAD_ROC_NO1);
        if($request->filled('MAD_ROC_NO2')) $pra_status->where('company_registration_no', $request->MAD_ROC_NO2);
        if($request->filled('MAD_APPL_NO')) $pra_status->where('application_no', $request->MAD_APPL_NO);
        return view('pra_status.search', ['pra_status_list' => $pra_status->orderBy('id', 'asc')->paginate(6)]);
    }


}
