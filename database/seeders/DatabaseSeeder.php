<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();
        
        $user = User::factory()->create();
        $user1 = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        Post::create([
            'category_id' => $family -> id,
            'user_id' => $user -> id,
            'title' => 'My family post',
            'slug' => 'my-family-post' ,
            'excerpt' => 'My family post Lorem ipsum dolor sit',
            'body' => 'My family post Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo distinctio natus consectetur quam iusto harum numquam nesciunt, dolorum, sint odit saepe in. Perspiciatis quos veritatis illum voluptates, quam mollitia beatae
                        Voluptatum itaque error facere, atque fugiat libero eos exercitationem non repellendus aperiam aspernatur veniam illo, officiis quas mollitia assumenda voluptate ipsa accusantium quis quia consequuntur. Sint dignissimos ab ea nemo'
        ]);
        Post::create([
            'category_id' => $work->id,
            'user_id' => $user1 -> id,
            'title' => 'My work post',
            'slug' => 'my-work-post',
            'excerpt' => 'My work post Lorem ipsum dolor sit amet co',
            'body' => 'My work post Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo distinctio natus consectetur quam iusto harum numquam nesciunt, dolorum, sint odit saepe in. Perspiciatis quos veritatis illum voluptates, quam mollitia beatae
                        Voluptatum itaque error facere, atque fugiat libero eos exercitationem non repellendus aperiam aspernatur veniam illo, officiis quas mollitia assumenda voluptate ipsa accusantium quis quia consequuntur. Sint dignissimos ab ea nemo'
        ]);
        Post::create([
            'category_id' => $personal->id,
            'user_id' => $user -> id,
            'title' => 'My personal post',
            'slug' => 'my-personal-post',
            'excerpt' => 'My personal post Lorem ipsum dolor sit amet consectetu',
            'body' => 'My personal post Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo distinctio natus consectetur quam iusto harum numquam nesciunt, dolorum, sint odit saepe in. Perspiciatis quos veritatis illum voluptates, quam mollitia beatae
                        Voluptatum itaque error facere, atque fugiat libero eos exercitationem non repellendus aperiam aspernatur veniam illo, officiis quas mollitia assumenda voluptate ipsa accusantium quis quia consequuntur. Sint dignissimos ab ea nemo'
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
