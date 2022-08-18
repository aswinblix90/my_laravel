<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Symfony\Component\VarDumper\VarDumper;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
    // DB::listen(function($query){
    //     logger($query->sql,$query->bindings);
    // });
    return view('posts', [
        'posts' => Post::latest('published_at')->get()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    // DB::listen(function ($query) {
    //     logger($query->sql);
    // });
    return view('/post', [
        'post' => $post
    ]);
});

Route::get('categories/{category}',function(Category $category){
    // DB::listen(function ($query) {
    //     logger($query->sql);
    // });
    return view('posts', [
        'posts' => $category->posts
    ]);
});
Route::get('authors/{author:username}',function(User $author){
    return view('posts',[
        'posts'=> $author->posts
    ]);
});
// Post::create([
//     'category_id' => 3,
//     'title' => 'My First hobbies post',
//     'slug' => 'my-first-hobbies-post',
//     'excerpt' => 'My first hobbies post excerpt',
//     'body' => 'My first hobbies post body body'
// ]);