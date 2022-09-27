<?php

namespace App\Http\Cnotrollers;

// use Illuminate\Http\Request:
use App\MOdels\Post;

class MyController extends Controller
{
public function showAboute()
{
return view('about');
}

}
