<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PermissionRoleController extends Controller
{
    public function view_permission () {
        $this->authorize('viewAny', PermissionRole::class);
        $role_data = Role::all();
        $permission_data = Permission::all();
        return view('admin.permission_role', compact('role_data','permission_data'));
    }

    public function add_role (Request $request) {
        $role = new Role();
        $role->name = $request->txtRole;
        $role->save();
        return redirect('/permission/view')->withSuccess('Create Successful!');
    }   
    
    // public function permission_role (Request $request) {
    //     $role_id = $request->listRole;
    //     $permission_id = $request->permissionList;
    //     if (PermissionRole::where('role_id', '=', $role_id)->exists()) {
    //         return redirect('/permission/view')->with('warning','Role has been added permission!');
    //     } else {
    //         $role = Role::findOrFail($role_id);
    //         $role->permissions()->attach($permission_id);
    //         return redirect('/permission/view')->with('success','Permission created successfully!');
    //     }    
    // }

    public function permission_edit ($id) {
        $role_data = Role::all();
        $role = Role::where('id', $id)->with('permissions')->first();
        $permissions = Permission::all();

        return view('admin.permission_edit', compact('role', 'permissions', 'role_data'));    
    }
    
    public function permission_update (Request $request, $id) {
        $role = Role::find($id);

        $role_id = $request->roleId;
        $permission_id = $request->permissionList;
        $role = Role::findOrFail($role_id);
        $role->permissions()->sync($permission_id);
        
        return Redirect::back()->with('success','Permission update successfully!');
    }
}
