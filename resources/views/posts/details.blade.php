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
    <article>
        <h1><?= $post->title ?></h1>
        <p class="small">Published At: <?= $post->date ?></p>
        <?= $post->excerpt ?>
        <div class="back-button-parent">
            <a class="button" href="/posts">Go Back</a>
        </div>
    </article>
</body>

</html>
