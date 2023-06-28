<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;
class ProjectDetailController extends Controller
{
    public function index($slug,$id){
        $project = Project::with('Category')->with('User')->find($id);
        $projects = Project::with('Category')->where('status',0)->where('target','not like',0)->where('active',1)->get();
        return view('user.project_details')->with(compact('project','projects'));
    }
}
