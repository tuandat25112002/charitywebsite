<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\User;
use Config;
use Session;
class ProfileController extends Controller
{
    public function index(){
        $user = Session::get('user');
        return view('user.profile')->with(compact('user'));
    }
    public function confirmUser(Request $request){
        // $name_user = mb_strtolower(Session::get('user')->name,'UTF-8');
        // $name_for_check = mb_strtolower("DƯƠNG TUẤN ĐẠT",'UTF-8');
        // var_dump($name_user == $name_for_check);
        $curl = curl_init();
        $fileName = $request->file('cccd')->getRealPath();
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $finfo = finfo_file($finfo, $fileName);
        $cFile = curl_file_create($fileName, $finfo, basename($fileName));
        $data = array("image" => $cFile, "filename" => $cFile->postname);

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.fpt.ai/vision/idr/vnm",
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $data,
          CURLOPT_HTTPHEADER => array(
            "api-key: rxrqdLkcJ2LZPg874fOM9z2L7UUvWZWr"
          ),
        ));
        // $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return response()->json([
            'status'=>401,
            'message'=>"Kiểm tra thất bại",
            ],401);
        }
        else
        {
            return response()->json([
                'status'=>200,
                'message'=> "Kiểm tra thành công",
            ],200);
       }

    }
    public function createProject(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = $request->validate([
            'name_project'=> 'required',
            'slug'=> 'required',
            'id_category'=>'required',
            'date_action'=>'required',
            'description'=>'required',
            'thumbnail'=>'required',
        ]);
        $user = Session::get('user');
        $project = new Project();
        $project->name_project = $request->name_project;
        $project->slug=$request->slug;
        $project->id_user_create = $user->id ;
        $project->id_category=$request->id_category;
        $project->short_desc = $request->short_desc;
        $project->date_action = strtotime($request->date_action);
        $project->description= $request->description;
        if($request->target==null){
            $project->target=0;
        }else{
            $project->target = filter_var($request->target,FILTER_SANITIZE_NUMBER_INT);;
        }
        if($request->fund==null){
            $project->fund= 0;
        }else{
            $project->fund= filter_var($request->fund,FILTER_SANITIZE_NUMBER_INT);
        }
        $project->donation =0;
        $project->status = Config::get('constants.status.NON_COMPLETED');
        if($request->phone){
            $project->phone = $request->phone;
        }
        if($request->donate_for){
            $project->donate_for = $request->donate_for;
        }
        if($request->link){
            $project->link = $request->link;
        }
        $project->active =0;
        $get_name_image= $request->slug;
        $name_image= $get_name_image.'-'.rand(0,9999);
        $extension= $request->file('thumbnail')->extension();
        $new_name_image = $name_image.'.'.$extension;

        $uploadedFileUrl = Cloudinary::upload($request->file('thumbnail')->getRealPath(),[
            'folder'=>'project',
            'public_id'=>$name_image,
        ])->getSecurePath();
        $project->thumbnail= $uploadedFileUrl;
        $project->save();
        return redirect()->back()->with('status','Thêm thành công!');
    }
}
