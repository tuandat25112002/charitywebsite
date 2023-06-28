<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Project;
use App\Models\Category;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news= News::where('active',1)->get();
        return view('admin.news.index')->with(compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data= $request->validate([
            'tieude'=> 'required|max:255',
            'slug_tintuc'=> 'required|max:255',
            'tomtat' => 'required',
            'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000,
            max_height=2000',
            'active'=>'required',
            'noidung'=>'required',
            'nguon'=>'required',


        ],
        [
            'tieude.required'=>'Bạn phải nhập tên tin tức ',
            'slug_tintuc.required'=>'Bạn phải nhập tên tin tức để có slug',
            'tomtat.required'=>'Bạn phải nhập tóm tắt mô tả cho tin tức ',
            'noidung.required' => 'Bạn phải thêm nội dung cho tin tức',

        ],
    );
        $tintuc = new News();
        $tintuc->tieude =$data['tieude'];
        $tintuc->slug_tintuc =$data['slug_tintuc'];
        $tintuc->tomtat =$data['tomtat'];
        $tintuc->active =$data['active'];
        $tintuc->noidung =$request->noidung;
        $tintuc->nguon =$data['nguon'];
        $tintuc->luotxem = 0;
        // thêm ảnh vào folder tintuc
        $get_name_image= $request->slug_tintuc;
        $name_image= $get_name_image.'-'.rand(0,9999);
        $extension= $request->file('hinhanh')->extension();
        $new_name_image = $name_image.'.'.$extension;

        $uploadedFileUrl = Cloudinary::upload($request->file('hinhanh')->getRealPath(),[
            'folder'=>'news',
            'public_id'=>$name_image,
        ])->getSecurePath();
        $tintuc->hinhanh= $uploadedFileUrl;
        $tintuc->save();
        return redirect()->back()->with('status','Thêm thành công rồi!');
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
        $news = News::find($id);
        return view('admin.news.edit')->with(compact('news'));
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
         $data= $request->validate([
            'tieude'=> 'required|max:255',
            'slug_tintuc'=> 'required|max:255',
            'tomtat' => 'required',
            'max_height=2000',
            'active'=>'required',
            'noidung'=>'required',
            'nguon'=>'required',


        ],
        [
            'tieude.required'=>'Bạn phải nhập tên tin tức ',
            'slug_tintuc.required'=>'Bạn phải nhập tên tin tức để có slug',
            'tomtat.required'=>'Bạn phải nhập tóm tắt mô tả cho tin tức ',
            'noidung.required' => 'Bạn phải thêm nội dung cho tin tức',

        ],
    );
        $tintuc = News::find($id);
        $tintuc->tieude =$data['tieude'];
        $tintuc->slug_tintuc =$data['slug_tintuc'];
        $tintuc->tomtat =$data['tomtat'];
        $tintuc->active =$data['active'];
        $tintuc->noidung =$request->noidung;
        $tintuc->nguon =$data['nguon'];
        $tintuc->luotxem = 0;
        // thêm ảnh vào folder tintuc
         $get_image= $request->hinhanh;
        if($get_image){
            $url_image =explode('/',$tintuc->hinhanh);
            $image = end($url_image);
            $image_id =current(explode('.',$image));
            Cloudinary::destroy('news/'.$image_id);
            $get_name_image= $request->slug;
            $name_image= $get_name_image.'-'.rand(0,9999);
            $extension= $request->file('hinhanh')->extension();
            $new_name_image = $name_image.'.'.$extension;

            $uploadedFileUrl = Cloudinary::upload($request->file('hinhanh')->getRealPath(),[
                'folder'=>'news',
                'public_id'=>$name_image,
            ])->getSecurePath();
            $tintuc->hinhanh= $uploadedFileUrl;
        }
        $tintuc->save();
        return redirect()->back()->with('status','Cập nhật thành công!');
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
    public function getAllNews(){
        $news = News::where('active',1)->get();
        return view('user.allnews')->with(compact('news'));
    }
    public function getDetailsNews($id){
        $news = News::find($id);
        $projects = Project::with('Category')->where('status',0)->where('target','not like',0)->where('active',1)->get();
        $categories = Category::where('active',1)->get();
        return view('user.newsdetail')->with(compact('news','projects','categories'));
    }
}
