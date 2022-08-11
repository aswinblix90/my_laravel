<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Symfony\Component\VarDumper\VarDumper;

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
    // $post = Post::find(1);
    // var_dump($post->category->name);
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('/post', [
        'post' => $post
    ]);
});

// Post::create([
//     'category_id' => 3,
//     'title' => 'My First hobbies post',
//     'slug' => 'my-first-hobbies-post',
//     'excerpt' => 'My first hobbies post excerpt',
//     'body' => 'My first hobbies post body body'
// ]);