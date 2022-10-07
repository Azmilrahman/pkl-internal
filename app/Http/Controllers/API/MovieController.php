<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function allMovie()
    {
        $movies = Movie::all();
        $response = [
            'message' => 'berhasil',
            'data' => $movies,
            'status' => 200,
        ];
        return response()->json($response);
    }    
        public function singleMovie()
    {
        $movies = Movie::find($id);
        if ($movies) {
        $response = [
            'success' => true,
            'message' => 'Data berhasil diinputkan',
            'data' => $movies,
            'status' => 200,
        ];
    }else{
        $response = [
            'success' => false,
            'message' => 'Data berhasil diinputkan',
            'status' => 404,
        ];
    }
        return response()->json($response);
    }
}
