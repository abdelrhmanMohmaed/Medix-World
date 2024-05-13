<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\RoleRequest;
use Exception;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles  = Role::all();

        return view('admin.pages.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.pages.roles.create', compact('permissions'));
    }


    public function store(RoleRequest $request)
    {
        try {
            $role = Role::create([
                'name' => $request->name,
            ]);

            $role->syncPermissions($request->permissions);

            return redirect()->route('admins.roles.index')->with('success', 'role created successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back(); //message
        }
    }

    public function show(Role $role)
    {
        $permissions = $role->permissions;

        return view('admin.pages.roles.details', compact('role', 'permissions'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.pages.roles.edit', compact('role', 'permissions'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        try {
            $role->update([
                'name' => $request->input("name"),
            ]);
            $role->syncPermissions($request->permissions);

            return redirect()->route('admins.roles.index')->with('success', 'role updated successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back(); //message
        }
    }

    public function destroy(Role $role)
    {
        try {

            $role->delete();

            return redirect()->route('admins.roles.index')->with('success', 'role deleted successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back(); //message
        }
    }
}
