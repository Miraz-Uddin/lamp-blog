<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>
    @foreach ($posts as $post)
        <article>
            <h1><a href="/posts/{{ $post->slug }}"><?= $post->title ?></a></h1>
            <p class="small">Published At: <?= $post->date ?></p>
            <?= $post->excerpt ?>
        </article>
    @endforeach
</body>

</html>
