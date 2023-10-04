<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    return view( 'welcome' );
} );

Route::get( '/posts', function () {
    return view( 'posts.list', [
        'posts' => Post::all(),
    ] );
} );

Route::get( "/posts/{post_slug}", function ( $post_slug ) {
    return view( 'posts.details', [
        'post' => Post::find( $post_slug ),
    ] );
} );
