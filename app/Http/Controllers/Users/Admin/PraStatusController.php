<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use App\Models\PraStatus;
use Illuminate\Http\Request;

class PraStatusController extends Controller
{
    public function praStatusIndex()
    {
        return view('users.admin.pra_status.praStatusIndex')->with(['pra_status_list' => PraStatus::orderBy('id', 'desc')->get()]);

    }

    public function praStatusStore(Request $request)
    {
        PraStatus::create($request->all());
        return redirect(route('praStatusIndex'));
    }

    public function praStatusCreate()
    {
        return view('users.admin.pra_status.praStatusCreate');
    }

    public function praStatusEdit(PraStatus $praStatus)
    {
        return view('users.admin.pra_status.praStatusEdit', ['pra_status' => $praStatus]);

    }

    public function praStatusUpdate(PraStatus $praStatus, Request $request)
    {
        PraStatus::where('id', $praStatus->id)->update($request->except(['_method', '_token']));
        return redirect(route('praStatusIndex'));
    }

    public function praStatusDelete(PraStatus $praStatus)
    {
        $praStatus->delete();
        return redirect(route('praStatusIndex'));
    }
}
