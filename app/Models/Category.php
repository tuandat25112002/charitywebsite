<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use HasFactory;
     use SoftDeletes;
    protected $fillable =['name_category','description','slug','active'];
    protected $primaryKey = 'id';
    protected $table ='categories';
    public function Project(){
        return $this->hasMany('App\Models\Project','id_category');
    }
}
