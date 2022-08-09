<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    public $title;
    public $date;
    public $body;
    public $excerpt;
    public $slug;
    use HasFactory;

    public function __construct($title, $date, $body, $excerpt, $slug)
    {
        $this->title = $title;
        $this->date = $date;
        $this->body = $body;
        $this->excerpt = $excerpt;
        $this->slug = $slug;
    }
    public static function allPost()
    {
        $files = File::files(resource_path('posts/'));
        return array_map(fn($file)=>$file->getContents(),$files);
    }
    public static function find($slug){

        if (!file_exists($path = resource_path("/posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }
        return cache()->remember("posts/{post}", 1, fn () => file_get_contents($path));

    }

}
