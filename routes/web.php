<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    //return ['name' => 'Umar Sunusi Maitalata', 'profession' => 'Software Developer', 'Phone Number' => '+2348098069816', 'email' => 'maitalata@gmail.com', ['Language 1' => 'php', 'Language 2' => 'Java']];
    //$posts = Post::all();

    // return view('posts', [
    //   'posts'    => Post::all()
    // ]);

    $files = File::files(resource_path("posts/"));

    $posts = [];

    foreach($files as $file){
      $document = YamlFrontMatter::parseFile($file);
      $posts[] = new Post(
        $document->title,
        $document->excerpt,
        $document->date,
        $document->body(),
      );
     }

    // $document = YamlFrontMatter::parseFile(
    //   resource_path("posts/my-fourth-post.html")
    // );

    ddd($posts);

});

Route::get('posts/{post}', function ($slug) {
    // find a post by its slug and pass it to a view called "post"
    //$post = Post::find($slug);

    return view('post',[
      'post' => Post::find($slug)
    ]);

    // $path = __DIR__ . "/../resources/posts/{$slug}.html";
    //
    // //ddd($path);
    //
    // if(!file_exists($path)){
    //   return redirect('/');
    //   //abort(404);
    // }
    //
    // $post = cache()->remember("post.{$slug}", 5, function() use ($path){
    //
    //   return file_get_contents($path);
    // });
    //
    // return view('post',[
    //   'post' => $post
    // ]);
})->where('post','[A-z_\-]+');
