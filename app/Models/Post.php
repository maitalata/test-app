<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
  public static function all()
  {
    $files = File::files(resource_path("posts/"));
    return array_map(function($file){
      return $file->getContents();
    }, $files);
  }

  public static function find($slug)
  {
    //$path = __DIR__ . "/../resources/posts/{$slug}.html";

    //ddd($path);

    if(!file_exists($path = resource_path("posts/{$slug}.html"))){
      //return redirect('/');
      //abort(404);
      throw new ModelNotFoundException();
    }

    return cache()->remember("post.{$slug}", 5, function() use ($path){
      return file_get_contents($path);
    });

  }

}
