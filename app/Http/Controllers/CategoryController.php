<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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
        $categories = Category::paginate(10);
        return view('admin.category.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_category'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'active'=>'required'
        ]);
        $category = new Category();
        $category->name_category=$data['name_category'];
        $category->description=$data['description'];
        $category->slug=$data['slug'];
        $category->active=$data['active'];
        $category->created_at=time();
        $category->updated_at=time();
        $category->save();
        return redirect()->back()->with('status','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit')->with(compact('category'));
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
         $data = $request->validate([
            'name_category'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'active'=>'required'
        ]);
        $category = Category::find($id);
        $category->name_category=$data['name_category'];
        $category->description=$data['description'];
        $category->slug=$data['slug'];
        $category->active=$data['active'];
        $category->updated_at=time();
        $category->save();
        return redirect()->back()->with('status','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('status','Xóa danh mục thành công');
    }
    public function updateActive(Request $request){
        $id = $request->id;
        $category = Category::find($id);
        if($category->active==0){
            $category->active=1;
        }else{
            $category->active=0;
        }
        // $category->id= $id;
        $category->save();
        $arr=[
            'status'=>200,
            'message'=>"Cập nhật thành công",
        ];
        return response()->json($arr,200);
    }
}
