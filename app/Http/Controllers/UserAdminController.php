<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserAdminController extends Controller
{   
    // Create User
    public function add() {
        $this->authorize('create', User::class);
        $role_data = Role::all();
        return view('admin.user_add', compact('role_data'));
    }

    public function store(Request $request) {
        $user = new User;

        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        $user->password = Hash::make($request->txtPassword);
        $user->birthday = $request->dtBirthday;

        $this->validate($request, [
            'imgAvatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'txtEmail' => 'unique:users,email,'.$user->id
        ]);
    
        if ($request->hasFile('imgAvatar')) {
            $file = $request->file('imgAvatar');
            $name_image = time().'.'.$file->getClientOriginalName();
            $file->move('upload/avatar', $name_image);
            $user->image = $name_image;
            $role_id = $request->roleList;
            $user->save();
            $id = $user->id;
            $user = User::findOrFail($id);
            $user->roles()->attach($role_id);
            return redirect('/user/list')->withSuccess( 'Create successful !' );

        } else {
            $user->image = null;
            $user->save();
            return redirect('/user/list')->withSuccess( 'Create successful !' );
        }
    }
    // List User
    public function list() {
        $this->authorize('viewAny', User::class);
        $user_list = User::all();
        return view('admin.user_list', compact('user_list'));
    }
    // Show User id
    public function show($id) {
        $this->authorize('view', User::class);
        $roles = Role::all();
        $user_detail = User::where('id', $id)->get();
        return view('admin.user_detail', compact('user_detail', 'roles'));
    }
    //Update Role User
    public function update_role (Request $request, $id) {
        $user = User::find($id);
        $user_id = $request->userId;
        $role_id = $request->roleList;
        $user = User::findOrFail($user_id);
        $user->roles()->sync($role_id);
        
        return Redirect::back()->with('success','Permission update successfully!');
    }

    // Update User
    public function profile($id) {
        $id = Auth::user()->id;
        $data_user = User::where('id', $id)->get();
       return view('admin.user_edit')->with('data_user', $data_user);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        $user->birthday = $request->dtBirthday;
        if (isset($request->image)) {
            $image = $request->image; 
        } elseif ($request->hasFile('imgAvatar')) {
                $path = public_path().'/upload/avatar/';

                if($user->image != ''  && $user->image != null){
                    $file_old = $path.$user->image;
                    unlink($file_old);
                }
                $file = $request->file('imgAvatar');
                $image = time().'.'.$file->getClientOriginalName();
                $file->move('upload/avatar', $image);
                $user->image = $image;
        }
        $user->save();
        return redirect('/dashboard')->withSuccess( 'Update Profile Successful !' );
    }
    //Delete User
    public function delete ($id) {
        $this->authorize('delete', User::class);
        User::where('id', $id)->delete();
        return redirect('/user/list')->withSuccess('Delete User Successful !');
    }


}
