<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
use App\Http\Resources\ProjectResource;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects= Category::with('Project')->where('active',1)->orderBy('id','asc')->get();
        $arr = [
            'status' => 200,
            'message' => "Danh sách dự án",
            'data' => ProjectResource::collection($projects)
        ];
        return response()->json($arr,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project_details = Project::with('Category')->with('User')->find($project->id);
        $arr = [
            'status' => 200,
            'message' => "Detail Project",
            'data' => $project_details
        ];
        return response()->json($arr,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function filterProject(Request $request){
        $id_category = $request->category_id;
        $category=Category::find($id_category);
        $projects = Project::with('Category')->where('id_category',$id_category)->where('active',1)->orderBy('date_action','desc')->get();
        $arr =[
            'status'=>200,
            'message'=>$category->name_category,
            'data'=>$projects,
        ];
        return response()->json($arr,200);
    }
}
