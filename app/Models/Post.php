<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function scopeFilter($query,array $filters){
        // $query = Post::latest();
        $query->/* `when` is a method that is used to check if the condition is true or false. If the
        condition is true, then it will execute the callback function. */
        when($filters['search'] ?? false,function($query,$searchh) {
            $query
                ->where('title', 'like', '%' . $searchh. '%')
                ->orWhere('body', 'like', '%' . $searchh . '%');
        });
        return $query;
    }

}
