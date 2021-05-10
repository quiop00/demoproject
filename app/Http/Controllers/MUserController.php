<?php

namespace App\Http\Controllers;

use App\Models\m_user;
use App\Models\mUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class MUserController extends Controller
{
    public function index(Request $request)
    {
        $title = 1;
        DB::enableQueryLog();

        $libValNmJ = 'auth_role_div';
        $libValNmJs = 'incumbent_div';

        $mUser =  DB::table('m_user as m')
            ->leftJoin('s_lib_val as s',  function ($join) use ($libValNmJ) {
                $join->on('s.lib_val_cd', '=', 'm.auth_role_div')
                    ->where('s.lib_cd', '=', $libValNmJ);
            })
            ->leftJoin('s_lib_val as d', function ($join) use ($libValNmJs) {
                $join->on('d.lib_val_cd', '=', 'm.incumbent_div')
                    ->where('d.lib_cd', '=', $libValNmJs);
            })
            ->orderBy('m.user_cd', 'asc')
            ->select('m.user_cd', 'm.user_nm_j', 'm.user_ab_j', 'm.user_nm_e', 'm.user_ab_e', 's.lib_val_nm_j', 'd.lib_val_nm_j as lib_val_nm_js')
            ->paginate(20);
        // dd(DB::getQueryLog());
        return view('muser.viewuser', compact(['mUser', 'title']));
    }

    public function createmuser(Request $request)
    {
        $user_cds = $request->user_cd;

        if ($user_cds > 0) {
            echo "1";
            $titles = "Cập nhập m_user";
            $mUser = DB::table('m_user')
            ->where('user_cd', '=', $user_cds)
            ->first();
        } else {
            echo "2";
            $titles = "Thêm mới m_user";
            $mUser = new m_user();
        }

        $title = 2;
        $beLongdiv = 'belong_div';
        $positiondiv = 'position_div';
        $authdiv = 'auth_role_div';
        $incumbentdiv = 'incumbent_div';

        // dd(DB::getQueryLog());  
        $beLong = DB::table('s_lib_val')
            ->where('lib_cd', '=', $beLongdiv)
            ->pluck('lib_val_nm_j', 'lib_cd');

        $position = DB::table('s_lib_val')
            ->where('lib_cd', '=', $positiondiv)
            ->pluck('lib_val_nm_j', 'lib_cd');

        $auth = DB::table('s_lib_val')
            ->where('lib_cd', '=', $authdiv)
            ->pluck('lib_val_nm_j', 'lib_cd');

        $incumbent = DB::table('s_lib_val')
            ->where('lib_cd', '=', $incumbentdiv)
            ->pluck('lib_val_nm_j', 'lib_cd');

        // dd(DB::getQueryLog());  
        return view('muser.CreateMuser', compact(['title', 'mUser', 'beLong', 'position', 'auth', 'incumbent']));
    }

    public function storemuser(Request $request)
    {
        $user_cds = $request->user_cd;
        // dd($user_cds);
        $mUser = DB::table('m_user')
        ->where('user_cd', '=', $user_cds)
        ->first();

        if ($mUser !=null) {
            $user_cds = $request->user_cd;
            DB::table('m_user')
            ->where('user_cd', $user_cds)
            ->update([
                'user_nm_j' => $request->user_nm_j,
                'user_ab_j'=>$request->user_ab_j,
                'user_nm_e'=>$request->user_nm_e,
                'user_ab_e'=>$request->user_ab_e,
                'pwd'=>$request->pwd,

                'belong_div'=>$request->belong_div,
                'position_div'=>$request->position_div,
                'auth_role_div'=>$request->auth_role_div,
                'incumbent_div'=>$request->incumbent_div,
                
                'pwd_upd_datetime'=>$request->pwd_upd_datetime,
                'login_datetime'=>$request->login_datetime,
                'memo'=>$request->memo,
                ]);

            return redirect()->route('m_user.createmuser');
        } else {
            $mUser = new m_user();
            // dd($mUser);
            $mUser->user_cd = $request->user_cd;
            $mUser->user_nm_j = $request->user_nm_j;
            $mUser->user_ab_j = $request->user_ab_j;
            $mUser->user_nm_e = $request->user_nm_e;
            $mUser->user_ab_e = $request->user_ab_e;

            $mUser->pwd = $request->pwd;
            $mUser->belong_div = $request->belong_div;
            $mUser->position_div = $request->position_div;
            $mUser->auth_role_div = $request->auth_role_div;
            $mUser->incumbent_div = $request->incumbent_div;

            $mUser->pwd_upd_datetime = $request->pwd_upd_datetime;
            $mUser->login_datetime = $request->login_datetime;
            $mUser->memo = $request->memo;
            $mUser->save();
        }

        return redirect()->route('m_user.createmuser')->with('message', 'Thêm thành công');
    }
}
