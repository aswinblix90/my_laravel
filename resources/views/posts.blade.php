<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="app.css">
    <title>Document</title>
</head>
<body>
    <?php foreach ($posts as $post): ?>
        <article>
            <a href="posts/<?=$post->slug?>"><h1><?=$post->title?></h1></a>
            <p><?=$post->excerpt?></p>
        </article>
    <?php endforeach; ?>

</body>
</html>