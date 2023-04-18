<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class FormGeneratorController extends Controller
{
    public function formGeneratorIndex()
    {
        return view('users.admin.form-generator.formGeneratorIndex')->with(["formGenerators" => FormGenerator::all()]);
    }
    public function formGeneratorcreate()
    {
        return view('users.admin.form-generator.formGeneratorCreate');
    }
    public function formGeneratorStore(Request $request)
    {
        $validator = Validator::make($request->formGen,[
            "name" => "required|min:5",
        ]);
        if($validator->fails()) {
            return response(View::make('layout.errors')->with(["ajax_errors" => $validator->getMessageBag()->toArray()]), 422);
        }
        $created = FormGenerator::create([
            "name"      => $request->formGen["name"],
            "admin_id"  => auth()->id(),
            "uuid"      => $request->formGen["uuid"],
            "content"   => json_encode($request->formGen["data"]),
        ]);
        session()->flash('success', [
            "heading"   => "Form Created",
            "messages"  => ["Form has been created successfully"],
            "autoclose" => 5000
        ]);
        return View::make('layout.errors');
    }
    public function formGeneratorShow(FormGenerator $formGenerator)
    {
    }
    public function formGeneratorAjaxShow(FormGenerator $formGenerator)
    {
        return response()->json($formGenerator->toArray(), 200);
    }
    public function formGeneratorEdit(FormGenerator $formGenerator)
    {
        return view('users.admin.form-generator.formGeneratorEdit', compact('formGenerator'));
    }
    public function formGeneratorUpdate(Request $request, FormGenerator $formGenerator)
    {
        $updated =  $formGenerator->update([
            "name"      => $request->formGen["name"],
            "content"   => json_encode($request->formGen["data"]),
        ]);

        if($updated) {
            session()->flash('success', [
                "heading"   => "Form Updated",
                "messages"  => ["Form has been created successfully"],
                "autoclose" => 5000
            ]);
            return View::make('layout.errors');
        }


    }
    public function formGeneratorDestroy(FormGenerator $formGenerator)
    {
        $formGenerator->delete();
        return back();
    }
}
