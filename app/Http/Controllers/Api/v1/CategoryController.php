<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('active',1)->orderBy('id','desc')->get();
        $arr = [
            'status' => 200,
            'message' => "Danh sách danh mục",
            'data' => CategoryResource::collection($categories)
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
        $validator = $request->validate([
               'name_category'=>'required',
               'slug'=>'required',
               'active'=>'required',
        ]);
        $data = $request->all();
        $category = Category::create($data);
        $arr = [
            'status' => true,
            'message' => "Add Successfully!",
            'data' => new CategoryResource($category)
        ];
        return response()->json($arr,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $arr = [
            'status' => true,
            'message' => "Add Successfully!",
            'data' => new CategoryResource($category)
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
    public function update(Request $request, Category $category)
    {
        $validator = $request->validate([
               'name_category'=>'required',
               'slug'=>'required',
               'active'=>'required',
        ]);
        $data = $request->all();
        $category->update($data);
        $arr = [
            'status' => true,
            'message' => "Updated Successfully!",
            'data' => new CategoryResource($category)
        ];
        return response()->json($arr,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $arr=[
            'status' => true,
            'message' => "Deleted Successfully!"
        ];
        return response()->json($arr,200);
    }
}
