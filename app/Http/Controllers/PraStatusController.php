<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PraStatusController extends Controller
{
    public function index()
    {
        return view('pra_status.index');
    }
}
