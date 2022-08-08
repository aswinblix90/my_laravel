<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
    // ddd($posts[0]->getContents());
    return view('posts',[
        'posts' => Post::allPost()
    ]);
});

Route::get('posts/{post}', function($slug){
    // dd($path);

    // $post = file_get_contents($path);
    return view('/post',[
        'post' => Post::find($slug)
    ]);
})->where('post','[A-z_\-]+');
