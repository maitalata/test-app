<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $exerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $exerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path('posts/')))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(
                    fn($document) => new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    )
                )
                ->sortByDesc('date');
        });
    }

    public static function find($slug)
    {
        //$path = __DIR__ . "/../resources/posts/{$slug}.html";

        //ddd($path);

        // if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
        //     //return redirect('/');
        //     //abort(404);
        //     throw new ModelNotFoundException();
        // }

        // return cache()->remember("post.{$slug}", 5, function () use ($path) {
        //     return file_get_contents($path);
        // });

        //$posts = static::all();

        return static::all()->firstWhere('slug', $slug);
    }
}
