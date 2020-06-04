<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;

class PostAndComment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title'=>'Introduction to Vue.JS',
                'content'=>'Vue.js is a client side javascript framework developed by Evan Vue....',
                'author'=>'Evan Vue',                
            ],
            [
                'title'=>'Laradream',
                'content'=>'Laradream show you a whole list of ideas that are realizable through the aravel framework...',
                'author'=>'Lara Guy',                
            ],
            [
                'title'=>'ASP.NET',
                'content'=>'ASP.NET is a server side framework built by microsoft.',
                'author'=>'Micro Guy',                
            ],

        ];        

        $comments = [          
               [
                'email'=>'true@chucks.com', 
                'comment'=>'Vue.js is a cool JS framework', 
                'post_id'=>'1',
               ],
               [
                'email'=>'chichi@yahoo.com', 
                'comment'=>'ASP.NET is a robust and cool framework and it pays good bucks to be ASP.NET dev', 
                'post_id'=>'3',
               ],
               [
                'email'=>'uche@him.net', 
                'comment'=>'Laravel Tinker is a cool way to intract with database through the command line', 
                'post_id'=>'2',
               ],
               [
                'email'=>'true@chucks.com', 
                'comment'=>'Laravel has a lot in commnon with ASP.NET both are cool fraamework to use. ASP.NET comes with more backing in my opinion', 
                'post_id'=>'2',
               ],
               [
                'email'=>'chuck@di.com', 
                'comment'=>'Vue.js frameworkcan be used for small and also for large applications. You can implement it incrementally and i love it for that ', 
                'post_id'=>'1',
               ],
               [
                'email'=>'jhon@cop.net', 
                'comment'=>'ASP.NET uses C# a mean stream language and provides the opputunity to go into other microsoft products such as Xamarin etc', 
                'post_id'=>'3',
               ],
               [
                'email'=>'emeka@gmail.com', 
                'comment'=>'Vue.js allows you to use either javascript or typescript unlike angular that forces you to use type script.', 
                'post_id'=>'1',
               ],
            ];

            foreach($posts as $post){
                Post::create($post);
            }

            foreach($comments as $comment){
                Comment::create($comment);
            }
    }
}
