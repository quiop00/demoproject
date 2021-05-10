<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_user extends Model
{
    protected $table = 'm_user';
    protected $fillable = ['user_cd', 'user_nm_j','user_ab_j','user_nm_e','user_ab_e','pwd','belong_div','position_div','auth_role_div','incumbent_div','pwd_upd_datetime','login_datetime','memo','cre_user_cd'];
    public $timestams = false;
}
