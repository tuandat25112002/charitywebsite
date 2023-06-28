<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =['id_category','id_user_create','name_project','slug','thumbnail','description','short_desc','target','donation','date_action','fund','status','active'];
    protected $primaryKey = 'id';
    protected $table ='projects';
    public function Category(){
        return $this->belongsTo('App\Models\Category','id_category','id');
    }
    public function User(){
        return $this->belongsTo('App\Models\User','id_user_create','id');
    }
    public function Donation(){
        return $this->hasMany('App\Models\Donation','id_projects');
    }
}

