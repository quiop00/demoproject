<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tl_tintuc extends Model
{
    protected $table ="tl_tintucs";
    protected $fillable = ['id','id_theloai' ,'images','tieude','mieuta','noidung','created_at','updated_at'];
}
