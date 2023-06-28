<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable =['id_project','id_user','anonymous','money','content_donation','artifacts','phone','address'];
    protected $primaryKey = 'id';
    protected $table ='donations';
    public function Project(){
        return $this->belongsTo('App\Models\Project','id_project','id');
    }
    public function User(){
        return $this->belongsTo('App\Models\User','id_user_create','id');
    }
}
