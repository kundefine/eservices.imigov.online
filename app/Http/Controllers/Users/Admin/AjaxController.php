<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AjaxController extends Controller
{
    public function syncPermission(Request $request)
    {
        $name_list = [];
        foreach ($request->permissionNames as $permission) {
            $permission_asoc = json_decode($permission, true);
            $name_list[] = $permission_asoc['name'];
            Permission::updateOrCreate(
                [
                    "name" => $permission_asoc["name"], "guard_name" => $permission_asoc["guard_name"]
                ],
                [
                    "name" => $permission_asoc["name"], "guard_name" => $permission_asoc["guard_name"], "parent_name" => $permission_asoc["parent_name"]
                ],
            );
        }

        Permission::whereNotIn('name', $name_list)->delete();
        return 'sync success';
    }
}
