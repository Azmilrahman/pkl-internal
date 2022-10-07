<?php


use App\Http\Controllers\ProvinsiController;

use App\Http\Controllers\DurasiFilmController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\CastingController;
use App\Http\Controllers\TahunRilisController;
use Illuminate\Support\Facades\Route;


// edit

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
    return '<h1>Halo</h1>'
    .'Selamat datang di webapp saya<br>'
    .'Laravel, emang keren.';
    });

Route::get('/testmodel', function() {
        $query = App\Post::all();
        return $query;
        });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::get('test', function () {
    return view('halo');
});
 
Route::group(['prefix' => 'admin',
'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::resource('genre',GenreController::class);
    Route::resource('durasi_film',DurasiFilmController::class);
    Route::resource('movie',MovieController::class);
    Route::resource('casting',CastingController::class);
    Route::resource('reviewers',ReviewersController::class);
    Route::resource('tahun_rilis',TahunRilisController::class);
});

Route::get('/errors', function () {
    return view('errors.403');
});

// Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function {} {
//  Route::resource('provinsis', ProvinsiContorller::class);
// });

Route::get('/', [FrontController::class, 'index']);
Route::get('movies', [FrontController::class, 'movies']);
Route::get('movies/{id}', [FrontController::class, 'singleMovie']);
Route::post('sendReview', [FrontController::class, 'sendReview'])->name('kirimRiview');