<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'tieude','hinhanh','nguon','tomtat','noidung','active','slug_tintuc','luotxem' ,'ngaydang'

    ];
    protected $primaryKey = 'id';
    protected $table = 'news';
}
