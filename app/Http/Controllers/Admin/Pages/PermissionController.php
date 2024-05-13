<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\PermissionRequest;
use Exception;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions  = Permission::all();

        return view('admin.pages.permissions.index', compact('permissions'));
    }

    public function create()
    {

        return view('admin.pages.permissions.create');
    }


    public function store(PermissionRequest $request)
    {
        try {
           Permission::create([
                'name' => $request->name,
            ]);


            return redirect()->route('admins.permissions.index')->with('success', 'permission created successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back(); //message
        }
    }

   
    public function edit(Permission $permission)
    {

        return view('admin.pages.permissions.edit', compact('permission'));
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        try {
            $permission->update([
                'name' => $request->input("name"),
            ]);

            return redirect()->route('admins.permissions.index')->with('success', 'permission updated successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back(); //message
        }
    }

    public function destroy(Permission $permission)
    {
        try {

            $permission->delete();

            return redirect()->route('admins.permissions.index')->with('success', 'permission deleted successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back(); //message
        }
    }
}
