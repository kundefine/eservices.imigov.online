<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormGenerator;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function serviceIndex()
    {
        return view('users.admin.services.serviceIndex')->with(["services" => Service::all()]);
    }
    public function serviceCreate()
    {
        return view('users.admin.services.serviceCreate')->with(["forms" => FormGenerator::all()]);
    }
    public function serviceStore(Request $request)
    {
        $validData = $request->validate([
            "name" => ["required", "unique:services", "max:200"],
            "type" => ["required", "max:200"],
            "form_generator_id" => ["required"],
        ]);
        $validData["admin_id"] = auth()->id();
        $created = Service::create($validData);
        if($created) return back()->with(["success" => [
            "heading" => "Service Created",
            "messages" => ["Service has been created successfully"],
            "autoclose" => 6000
        ]]);
    }
    public function serviceShow(Service $service)
    {
    }

    public function serviceEdit(Service $service)
    {
        return view('users.admin.services.serviceEdit', compact('service'));
    }
    public function serviceUpdate(Request $request, Service $service)
    {

    }
    public function serviceDestroy(Service $service)
    {
        $service->delete();
        return back();
    }

    // ajax request
    public function serviceAjaxAll()
    {
        return Service::with('form')->get();
    }

}
