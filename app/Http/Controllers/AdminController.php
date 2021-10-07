<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AdminController extends Controller
{

    public function index(){
        return view('admin.index');
    }

    public function userInfo(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.user_info', compact('user'));
    }

    // public function returnHome(){
    //     return redirect()->back();
    // }
}
