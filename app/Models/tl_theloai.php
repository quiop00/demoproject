<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tl_theloai extends Model
{
    protected $table ="tl_theloais";
    protected $fillable = ['id', 'tentheloai','ghichu','created_at','updated_at'];
}
