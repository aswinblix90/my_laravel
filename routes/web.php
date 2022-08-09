<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;


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
    // $files = File::files(resource_path('posts/'));

    // $test = YamlFrontMatter::parseFile($files[0]);
    // dd($posts);
    $files = File::files(resource_path("posts/"));
    $posts = [];
    foreach($files as $file){
        $document = YamlFrontMatter::parseFile($file);
        $posts[] = new Post(
            $document -> title,
            $document -> date,
            $document -> body(),
            $document -> excerpt,
            $document -> slug
        );
    }
    // dd($posts);
    return view('posts',[
        'posts' => $posts
    ]);
});

Route::get('posts/{post}', function($slug){
    // dd($path);

    // $post = file_get_contents($path);
    return view('/post',[
        'post' => Post::find($slug)
    ]);
})->where('post','[A-z_\-]+');
