<?php

namespace App\Http\Controllers;

use App\Models\tl_slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TlSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = DB::table('tl_slides')
            ->get();
        return view('viewslide', compact([
            'slide'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createslide');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data  = new tl_slide();
        $data->tieude = $request->tieude;
        $data->noidung = $request->noidung;


        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/images/', $filename);
            $data->images = $filename;
        } else {
            echo "chưa có file";
        }
        $data->save();
        return redirect()->route('tl_slide.index')->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tl_slide  $tl_slide
     * @return \Illuminate\Http\Response
     */
    public function show(tl_slide $tl_slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tl_slide  $tl_slide
     * @return \Illuminate\Http\Response
     */
    public function edit(tl_slide $tl_slide, $id)
    {
        $slide = tl_slide::find($id);
        return view('updateslide', compact(['slide']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tl_slide  $tl_slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tl_slide $tl_slide)
    {
        $data  = tl_slide::find($request->id);
        $data->tieude = $request->tieude;
        $data->noidung = $request->noidung;
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/images/', $filename);
            $data->images = $filename;
        }
        $data->save();
        return redirect('/slide/index')->with('message', 'Cập nhập thành công');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tl_slide  $tl_slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(tl_slide $tl_slide, $id)
    {
        tl_slide::find($id)->delete();
        return redirect('/slide/index')->with('message', 'Xóa thành công');
    }
}
