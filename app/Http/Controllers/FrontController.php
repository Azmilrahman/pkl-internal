<?php

namespace App\Http\Controllers;

use Alert;

use App\Models\reviewers;
use App\Models\genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // @dd($movies);
        $allMovies = Movie::orderBy('id', 'desc')->get();
        $movies = Movie::orderBy('id', 'desc')->get()->take(3);
        $genres = genre::all();
        return view('index', compact('movies', 'genres', 'allMovies'));
    }

    public function movies()
    {
        $genres = genre::all();
        $movies = Movie::orderBy('id', 'desc')->get();
        return view('movies', compact('movies', 'genres'));
    }
    
    public function singleMovie($id)
    {
        $movie = Movie::findOrFail($id);
        $reviews = reviewers::select('reviewers.nama','reviewers.email','reviewers.komentar')
                    ->join('movies','movies.id','=','reviewers.id_movie')
                    ->where('reviewers.id_movie',$id)
                    ->get();
        return view('singleMovie', compact('movie', 'review'));
    }
    public function sendReview(Request $request)
    {
        $reviews = new reviewer();
        $reviews->nama = $request->nama;
        $reviews->email = $request->email;
        $reviews->komentar = $request->komentar;
        $reviews->id_movie = $request->id_movie;
        $reviews->save();
        Alert::success('Terima Kasih', 'Tanggapan anda sudah kami terima')->autoClose(3000);
        return redirect()->back();
    }
}


