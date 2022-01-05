<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserAdminController extends Controller
{   
    public function user_add() {
        return view('admin.user_add');
    }

    public function save_user() {

    }

    public function user_list() {
        $user_list = User::all();
        return view('admin.user_list')->with('user_list', $user_list);
    }

    public function user_detail($id) {
        $user_detail = User::where('id', $id)->get();
        return view('admin.user_detail')->with('user_detail', $user_detail);
    }
}
