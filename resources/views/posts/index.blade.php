<? php ?>

    <!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les Posts du blog</title>
</head>
<body>
<h1>Les Posts</h1>
<ul>
    @foreach($posts as $post)
        <li>
            <a href="/posts/{{$post->id}}">{{$post->title}}</a>
        </li>
    @endforeach
</ul>

</body>
</html>

