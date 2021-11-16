<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function allUsers(){
        $users = User::get();
        return view('admin.users')->with(compact('users'));
    }
}
