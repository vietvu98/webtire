<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAdminController extends Controller
{   
    public function add() {
        return view('admin.user_add');
    }

    public function store(Request $request) {
        $user = new User;

        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        $user->password = Hash::make($request->txtPassword);
        $user->birthday = $request->dtBirthday;
        $user->level = $request->listLevel;
        $user->status = $request->listStatus;

        $this->validate($request, [
            'imgAvatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'txtEmail' => 'unique:users,email,'.$user->id
        ]);
    
        if ($request->hasFile('imgAvatar')) {
            $file = $request->file('imgAvatar');
            $name_image = time().'.'.$file->getClientOriginalName();
            $file->move('upload/avatar', $name_image);
            $user->image = $name_image;
            $user->save();
            return redirect('/user/list')->withSuccess( 'Create successful !' );

        } else {
            $user->image = null;
            $user->save();
            return redirect('/user/list')->withSuccess( 'Create successful !' );
        }
    }

    public function list() {
        $user_list = User::all();
        return view('admin.user_list')->with('user_list', $user_list);
    }

    public function show($id) {
        $user_detail = User::where('id', $id)->get();
        return view('admin.user_detail')->with('user_detail', $user_detail);
    }

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
}
