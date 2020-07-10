<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_nama' => 'required|min:2',
            'cat_text' => 'required',
        ],[
            'cat_nama.required' => 'Nama Kategori Tidak Boleh Kosong',
            'cat_text.required' => 'Keterangan Tidak Boleh Kosong'
        ]);
        $categories = new Categories([
            'cat_nama'=>$request->input('cat_nama'),
            'cat_text'=>$request->input('cat_text')
        ]);
        $categories->save();
        return redirect('categories')->with('status', 'Data Berhasil Ditambah!');
    }

    public function edit($id)
    {
        $categories = Categories::find($id);
        return view('categories/update', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cat_nama' => 'required|min:2',
            'cat_text' => 'required',
        ]);

        $categories=Categories::find($id);
        $categories->cat_nama=$request->input('cat_nama');
        $categories->cat_text=$request->input('cat_text');
        $categories->save();
        return redirect('categories')->with('status', 'Data Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        $categories=Categories::find($id);
        $categories->delete();
        return redirect('categories')->with('status', 'Data Berhasil Dihapus!');
    }
}
