<?php

namespace App\Models;
// use \Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {

    public $title;
    public $slug;
    public $excerpt;
    public $date;
    public $body;

    public function __construct( string $title = null, string $slug = null, string $excerpt = null, string $date = null, string $body = null ) {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    public static function all() {
        return cache()->rememberForever( "posts.all",
            fn() => collect( File::files( resource_path( "posts" ) ) )
                ->map( fn( $file ) => YamlFrontMatter::parse( file_get_contents( $file ) ) )
                ->map( fn( $document ) => new Post(
                    $document->title,
                    $document->slug,
                    $document->excerpt,
                    $document->date,
                    $document->body()
                ) )->sortByDesc( 'date' ) );
    }

    public static function find( $slug ) {
        // of all the blog posts, return a blog which matches the slug
        $posts = static::all();
        return $posts->firstWhere( 'slug', $slug );
    }

}