<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = genre::orderBy('id', 'desc')->get();
        return view('admin.genre.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genre.create');
    }

    public function store(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'kategori' => 'required|unique:genres',
        ]);
        $genres = new genre();
        $genres->kategori = $request->kategori;
        $genres->save();
        Alert::success('Done', 'Data berhasil dibuat')->autoClose(2000);
        return redirect()->route('genre.index');
    }

    public function show($id)
    {
        $genres = genre::findOrFail($id);

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori' => 'required|',
        ]);
        $genres = genre::findOrFail($id);
        $genres->kategori = $request->kategori;
        $genres->save();
        Alert::success('Done', 'Data berhasil diedit');
        return redirect()->route('genre.index');

    }

    public function destroy($id)
    {
        if(Genre::destroy($id)) {
            return redirect()->back();
        }
        return redirect()->route('genre.index');
        // $genres = genre::findOrFail($id);
        // $genres->delete();
        // Alert::success('Done', 'Data berhasil dIhapus');
        // return redirect()->route('genre.index');

    }
}