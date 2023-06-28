<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Config;
use Session;
session_start();
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects= Project::with('Category')->orderBy('id','desc')->get();
        return view('admin.project.index')->with(compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('active',1)->get();
        return view("admin.project.create")->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = $request->validate([
            'name_project'=> 'required',
            'slug'=> 'required',
            'id_category'=>'required',
            'date_action'=>'required',
            'description'=>'required',
            'thumbnail'=>'required',
            'active'=>'required'
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
        if($request->target==null){
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
        $project->active = $request->active;
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
        //dd($uploadedFileUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::with('Category')->find($id);
        $categories = Category::where('active',1)->get();
        return view('admin.project.edit')->with(compact('project','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = $request->validate([
            'name_project'=> 'required',
            'slug'=> 'required',
            'id_category'=>'required',
            'date_action'=>'required',
            'description'=>'required',
            'active'=>'required'
        ]);
        $project = Project::find($id);
        $project->name_project = $request->name_project;
        $project->slug=$request->slug;
        $project->id_category=$request->id_category;
        $project->short_desc = $request->short_desc;
        $project->date_action = strtotime($request->date_action);
        $project->description= $request->description;
        if($request->check_donation==true){
            if($request->target==null){
            $project->target=0;
            }else{
                $project->target = filter_var($request->target,FILTER_SANITIZE_NUMBER_INT);;
            }
            if($request->target==null){
                $project->fund= 0;
            }else{
                $project->fund= filter_var($request->fund,FILTER_SANITIZE_NUMBER_INT);
            }
        }else{
          $project->target=0;
          $project->fund= 0;
        }
        if($request->phone){
            $project->phone = $request->phone;
        }
        if($request->donate_for){
            $project->donate_for = $request->donate_for;
        }
        if($request->link){
            $project->link = $request->link;
        }
        // $project->donation =0;
        // $project->status = Config::get('constants.status.NON_COMPLETED');
        $project->active = $request->active;
        $get_image= $request->thumbnail;
        if($get_image){
            $url_image =explode('/',$project->thumbnail);
            $image = end($url_image);
            $image_id =current(explode('.',$image));
            Cloudinary::destroy('project/'.$image_id);
            $get_name_image= $request->slug;
            $name_image= $get_name_image.'-'.rand(0,9999);
            $extension= $request->file('thumbnail')->extension();
            $new_name_image = $name_image.'.'.$extension;

            $uploadedFileUrl = Cloudinary::upload($request->file('thumbnail')->getRealPath(),[
                'folder'=>'project',
                'public_id'=>$name_image,
            ])->getSecurePath();
            $project->thumbnail=$uploadedFileUrl;
        }
        $project->save();
        return redirect()->back()->with('status','Cập nhật thành công thành công!');
        //dd($uploadedFileUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $url_image =explode('/',$project->thumbnail);
        $image = end($url_image);
        $image_id =current(explode('.',$image));
        //var_dump($image_id);
        Cloudinary::destroy('project/'.$image_id);

        $project->delete();
        return redirect()->back()->with('status','Xóa thành công');

    }
    public function updateActive(Request $request){
        $id = $request->id;
        $project = Project::find($id);
        if($project->active==0){
            $project->active=1;
        }else{
            $project->active=0;
        }
        $project->save();
        $arr=[
            'status'=>200,
            'message'=>"Cập nhật thành công",
        ];
        return response()->json($arr,200);
    }
    public function updateStatus(Request $request){
        $id = $request->id;
        $project = Project::find($id);
        if($project->status==0){
            $project->status=1;
        }else{
            $project->status=0;
        }
        $project->save();
        $arr=[
            'status'=>200,
            'message'=>"Cập nhật trạng thái dự án thành công",
        ];
        return response()->json($arr,200);
    }
    public function uploadImage($id){
        return view('admin.project.uploadimage');
    }
}
