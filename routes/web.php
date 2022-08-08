<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});

Route::get('posts/{post}', function($slug){
    $path = __DIR__ ."/../resources/posts/{$slug}.html";
    // dd($path);


    if(!file_exists($path)){
        return redirect('/');
    }
    $post = cache()->remember("posts/{post}", now()->addSeconds(10), function() use ($path){
        var_dump('file get conten');
        return file_get_contents($path);
    });
    // $post = file_get_contents($path);
    return view('/post',[
        'post' => $post
    ]);
});
