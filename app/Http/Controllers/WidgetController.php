<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\Slider;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class WidgetController extends Controller
{
    public function mainSection(){
        $logo = DB::table('widget')->where('name','logo')->first();
        $name = DB::table('widget')->where('name','name')->first();

        return view('admin.widget.main_section')->with(compact('logo','name'));
    }
    public function update(Request $request){
        $data = $request->validate([
            "name"=>"required"
        ]);
        DB::table('widget')
                ->where('name', 'name')
                ->update(['content' => $request->name]);
        //$logo = DB::table('widget')->where('name','logo')->first();
        $get_image= $request->logo;
        if($get_image){
            $image_id ="logo";
            Cloudinary::destroy('widget/'.$image_id);
            $extension= $request->file('logo')->extension();
            $new_name_image = 'logo.'.$extension;
            $uploadedFileUrl = Cloudinary::upload($request->file('logo')->getRealPath(),[
                'folder'=>'widget',
                'public_id'=>'logo',
            ])->getSecurePath();
             DB::table('widget')
                ->where('name', 'logo')
                ->update(['content' => $uploadedFileUrl]);
        }
        // var_dump($uploadedFileUrl);
        // die();
       return redirect()->back();
    }
    public function createSlider(){
        return view('admin.widget.addslider');
    }
    public function sldierStore(Request $request){
        $data = $request->validate([
            "name"=>"required",
            "title"=>"required",
            "link"=>"required",
            "position"=>"required",
            "active"=>"required",
            "image"=>"required",
        ]);
        $slider = new Slider();
        $slider->name = $request->name;
        $slider->title= $request->title;
        $slider->position= $request->position;
        $slider->link= $request->link;
        $slider->active= $request->active;
        $slider->description= $request->description;
        $get_image = $request->image;
        $get_name_image= $get_image->getClientOriginalName();
        $name_image= $get_name_image.'-'.rand(0,9999);
        $extension= $request->file('image')->extension();
        $new_name_image = $name_image.'.'.$extension;
        $slider->image=$new_name_image;
        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath(),[
            'folder'=>'background',
            'public_id'=>$name_image,
        ])->getSecurePath();
        $slider->save();
        return redirect()->back()->with('status','Thêm thành công!');
    }
}
