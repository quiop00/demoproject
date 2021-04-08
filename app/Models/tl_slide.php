<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tl_slide extends Model
{
    protected $table ="tl_slides";
    protected $fillable = ['id', 'images','tieude','noidung','created_at','updated_at'];
}
