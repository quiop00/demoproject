<?php

namespace App\Http\Controllers;

use App\Models\tl_theloai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TlTheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theLoai = DB::table('tl_theloais')->get();
        return view('viewtheloai', compact([
            'theLoai'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('createtheloai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $theLoai  = new tl_theloai();
        $theLoai->tentheloai = $request->tentheloai;
        $theLoai->ghichu = $request->ghichu;
        $theLoai->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $theLoai->save();
        return redirect()->route('tl_theloai.index')->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tl_theloai  $tl_theloai
     * @return \Illuminate\Http\Response
     */
    public function show(tl_theloai $tl_theloai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tl_theloai  $tl_theloai
     * @return \Illuminate\Http\Response
     */
    public function edit(tl_theloai $tl_theloai, $id)
    {
        $theLoai = tl_theloai::find($id);
        return view('updatetheloai', compact(['theLoai']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tl_theloai  $tl_theloai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tl_theloai $tl_theloai)
    {
        $theLoai  = tl_theloai::find($request->id);
        $theLoai->tentheloai = $request->tentheloai;
        $theLoai->ghichu = $request->ghichu;
        $theLoai->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $theLoai->save();
        return redirect('/theloai/index')->with('message', 'Cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tl_theloai  $tl_theloai
     * @return \Illuminate\Http\Response
     */
    public function destroy(tl_theloai $tl_theloai,$id)
    {
        tl_theloai::find($id)->delete();
        return redirect('/theloai/index')->with('message', 'Xóa thành công');
    }
}
