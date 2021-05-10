<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.index');
    }

    // all data
    public function allData()
    {
        $data = teacher::orderBy('id', 'DESC')->get();
        return response()->json($data);
    }

    // store data
    public function storeData(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'institute' => 'required',
        ]);

        $data = teacher::insert([
            'name' => $request->name,
            'title' => $request->title,
            'institute' => $request->institute,
        ]);
        return response()->json($data);
    }

    public function editData($id)
    {
        $data = teacher::findOrFail($id);
        return response()->json($data);
    }

    public function updateData(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'institute' => 'required',
        ]);

        $data = teacher::findOrFail($id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'institute' => $request->institute,
        ]);

        return response()->json($data);
    }

    public function deleteData($id)
    {
        $data = teacher::findOrFail($id)->delete();
        return response()->json($data);
    }
}
