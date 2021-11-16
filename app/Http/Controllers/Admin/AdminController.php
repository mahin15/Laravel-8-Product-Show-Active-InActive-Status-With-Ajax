<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function dashboard(){
        
        $productsCount = Product::count();

        return view('admin.admin_dashboard',compact('productsCount'));
    }


    public function login(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();

            $rules = [
                'email'=> 'required|email|max:255',
                'password'=>'required',
            ];

            $customMessages = [
                'email.required'=> 'Email is Required',
                'email.email'=>'Valid Email is Required',
                'password.required'=>'Password is Required',
            ];

            $this->validate($request,$rules,$customMessages);
            
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('admin/dashboard');
            }
            else{
                Session::flash('error_message','Invalid Email or Password!');
                return redirect()->back();
            }
        }
        return view('admin.admin_login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function chkCurrentPassword(Request $request){
        $data=$request->all();
        // echo "<pre>"; print_r($data); die;
        if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
            echo "true";
        } else{
            echo "false";
        }
    }

}
