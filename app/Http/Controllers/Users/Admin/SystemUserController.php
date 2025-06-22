<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SystemUserController extends Controller
{
    public function adminIndex()
    {
        $admins = Admin::all();
        return view('users.admin.system-users.adminIndex', compact('admins'));
    }

    public function adminCreate()
    {
        $roles = Role::all();
        return view('users.admin.system-users.adminCreate', compact('roles'));
    }

    public function adminStore(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer'],
        ]);
        $data['password'] = bcrypt($data['password']);
        $admin = Admin::create($data);
        $role = Role::find($data['role']);
        $admin->assignRole($role);
        return redirect()->route('adminIndex');
    }

    public function adminShow(Admin $admin)
    {
        $roles = Role::all();
        return view('users.admin.system-users.adminShow', compact('admin', 'roles'));
    }

    public function adminRoleUpdate(Admin $admin, Request $request)
    {
        $role = Role::find($request->role);
        $admin->syncRoles([$role]);
        return back();
    }

    public function adminPasswordUpdate(Admin $admin, Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $admin->update(["password" => Hash::make($data['password'])]);
        return back();
    }

    public function adminDelete(Admin $admin)
    {
        $admin->delete();
        return back();
    }

    public function roleIndex()
    {
        $roles = Role::latest()->get();
        return view('users.admin.system-users.roleIndex', compact('roles'));
    }

    public function roleCreate()
    {
        $permissions = Permission::whereNull('parent_name')->get();
        return view('users.admin.system-users.roleCreate', compact('permissions'));
    }

    public function roleEdit(Role $role)
    {
        $permissions = Permission::whereNull('parent_name')->get();
        return view('users.admin.system-users.roleEdit', compact('permissions', 'role'));
    }

    public function roleStore(Request $request)
    {
        $validData = $request->validate([
            'name' => ['required', 'unique:roles'],
            'permissions' => ['required'],
        ]);
        $role = Role::create([
            'name' => $validData['name'],
            'guard_name' => 'admin'
        ]);
        $role->givePermissionTo($validData["permissions"]);
        return redirect()->route('roleIndex')->with(['success' => [
            'heading' => "Role Created",
            'messages' => ["Role has been created successfully"],
            'autoclose' => 7000
        ]]);
    }

    public function roleUpdate(Role $role, Request $request)
    {
        $validData = $request->validate([
            'name' => ['required', 'unique:admins,name,' . $role->id],
            'permissions' => ['required'],
        ]);
        $role->update(['name' => $validData['name']]);

        foreach (Permission::all() as $permission) {
            $role->revokePermissionTo($permission);
        }
        $role->givePermissionTo($validData["permissions"]);


        return back();
    }


}
