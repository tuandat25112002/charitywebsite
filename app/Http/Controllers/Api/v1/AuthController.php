<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where('email',$request->email)->first();

        if(!$user){
            $erorr = "Không tồn tại người dùng!";
            $arr = [
                'status' => 401,
                'message' => $erorr,
                'data' => null,
            ];
            return response()->json($arr,401);
        }
        else if(md5($request->password)!=$user->password){
            $erorr = "Bạn nhập sai email hoặc mật khẩu";
            $arr = [
                'status' => 401,
                'message' => $erorr,
                'data' => null,
            ];
            return response()->json($arr,401);
        }
        $token = $user->createToken('authToken')->plainTextToken;
        $user_logined = new UserResource($user);
        $user_logined['access_token']= $token;
        $arr = [
            'status' => 200,
            'message' => "Đăng nhập thành công!",
            'data' => $user_logined
        ];
        return response()->json($arr,200);
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
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
        if($validator->fails()){
                return response()->json(
                        [
                            'status' => 404,
                            'message' => $validator->errors()
                        ],
                        404
                );
        }
        $password=md5($request->password);
        $new_user= User::create([
                'email'=>$request->email,
                'name'=>$request->name,
                'admin'=>0,
                'password'=>$password,
        ]);
        $arr = [
            'status' => 200,
            'message' => "Đăng ký thành công!",
            'data' => new UserResource($new_user)
        ];
        return response()->json($arr,200);
    }
    public function user(Request $request){
            return $request->user();
    }
    public function logout(){
             return response()->json(
                        [
                            'status' => 200,
                            'message'=>"Đăng xuất thành công!",
                            'data' => auth()->user()->currentAccessToken()->delete()
                        ],
                        200
                );
    }
}
