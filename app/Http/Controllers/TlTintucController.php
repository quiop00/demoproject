<?php

namespace App\Http\Controllers;

use App\Models\tl_tintuc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TlTintucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tinTuc = DB::table('tl_tintucs')
            ->get();
        return view('viewtintuc', compact([
            'tinTuc'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $theLoai = DB::table('tl_theloais')->pluck('tentheloai', 'id');

        $tintuc = tl_tintuc::find($id);
        // $tintuc = DB::table('tl_tintucs')
        // ->where('id', '=', $id)
        // ->get();
        // dd($tintuc);
        return view('createtintuc',compact(['theLoai','tintuc']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $tintuc = tl_tintuc::find($id);
        $tinTuc->id_theloai = $request->id_theloai;
        $tinTuc->tieude = $request->tieude;
        $tinTuc->mieuta = $request->mieuta;
        $tinTuc->noidung = $request->noidung;
        $tinTuc->created_at = Carbon::now();

        // if ($request->hasFile('images')) {
        //     $file = $request->file('images');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('upload/images/', $filename);
        //     $tinTuc->images = $filename;
        // } else {
        //     echo "chưa có file";
        // }
        $tinTuc->save();
        return redirect('/tintuc/index')->with('message','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tl_tintuc  $tl_tintuc
     * @return \Illuminate\Http\Response
     */
    public function show(tl_tintuc $tl_tintuc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tl_tintuc  $tl_tintuc
     * @return \Illuminate\Http\Response
     */
    public function edit(tl_tintuc $tl_tintuc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tl_tintuc  $tl_tintuc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tl_tintuc $tl_tintuc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tl_tintuc  $tl_tintuc
     * @return \Illuminate\Http\Response
     */
    public function destroy(tl_tintuc $tl_tintuc)
    {
        //
    }
}
