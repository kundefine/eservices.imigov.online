<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use App\KuHelpers\Helpers;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function companyIndex()
    {
        return view('users.admin.company.companyIndex')->with(['companies' => Company::all()]);
    }
    public function companyCreate()
    {
        return view('users.admin.company.companyCreate');
    }
    public function companyStore(Request $request)
    {
        $validData = $request->validate([
            "name" => ["required", "max:255"],
            "address" => ["required"],
        ]);
        $validData["admin_id"] = auth()->id();
        $company = Company::create([
            "admin_id" => $validData["admin_id"],
            "name" => $validData["name"],
            "address" => $validData["address"],
        ]);
        $logo = null;
        $water_mark = null;
        if($request->hasFile('logo')) {
            $logo = Helpers::storeFile($request->file('logo'), Str::uuid(), '/company/logo', 'admin_upload');
        }
        if($request->hasFile('water_mark')) {
            $water_mark = Helpers::storeFile($request->file('water_mark'), Str::uuid(), '/company/water_mark', 'admin_upload');
        }
        $company->logo = $logo;
        $company->water_mark = $water_mark;
        $company->save();
        return $company;

    }
    public function companyShow(Company $company)
    {
    }
    public function companyEdit(Company $company)
    {
    }
    public function companyUpdate(Request $request, Company $company)
    {
    }
    public function companyDestroy(Company $company)
    {
    }


    public function companyIndexAjax()
    {
        return Company::all();
    }
}
