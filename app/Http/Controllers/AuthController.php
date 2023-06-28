<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
session_start();
class AuthController extends Controller
{
    public function login(){
        return view('user.login');
    }
    public function confirmLogin(Request $request){
        $user = User::where('email',$request->email)->first();
        if(!$user){
            $erorr = "Không tồn tại người dùng!";
             return redirect()->back()->with('status',$erorr);
        }
        else if(md5($request->password)!=$user->password){
            $erorr = "Bạn nhập sai email hoặc mật khẩu";
            return redirect()->back()->with('status',$erorr);
        }
        else{
            // if($user->active == 0){
                Session::put('user',$user);
                return redirect()->to('/');
            //}
            // else
            // {
            //     return redirect()->back()->with('status','Tài khoản của bạn đã bị cấm tạm thời');
            // }
        }
    }
    public function logout(){
        Session::forget('user');
        return redirect()->to('/');
    }
    public function register(){
        return view('user.register');
    }
    public function storeUser(Request $request){
         $validator = $request->validate([
                'email'=>'unique:users|email|required',
                'name'=>'required',
                'password'=>'required',
                'confirm_password'=>'required|same:password'
        ],
        [
                'email.unique'=>"Đã tồn tại email này!",
                'email.required'=>"Nhập email!",
                'email.email'=>"Email nhập sai định dạng",
                'name.required'=>"Nhập tên",
                'password.required'=>"Nhập mật khẩu",
                'confirm_password.required'=>"Nhập mật khẩu xác nhận"
        ]
        );
        $password=md5($request->password);
        $new_user= User::create([
                'email'=>$request->email,
                'name'=>$request->name,
                'admin'=>0,
                'password'=>$password,
        ]);
        Session::put('user',$new_user);
        return redirect()->to('');
    }
}
