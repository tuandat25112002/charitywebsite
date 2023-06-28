<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\Project;
use App\Models\Slider;
use App\Models\News;
class HomeController extends Controller
{
    public function home()
    {
        $projects = Project::with('Category')->where('active',1)->orderBy('date_action','desc')->get();
        $news = News::where('active',1)->orderBy('id','desc')->get();
        $sliders= Slider::where('active',1)->orderBy('position','asc')->get();
        $slider_first= Slider::where('active',1)->orderBy('position','asc')->first();

        return view('user.home')->with(compact('sliders','slider_first','projects','news'));
    }
}
