<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @foreach ($allNews as $news)
        <div>
            <h1>{{ $news->title }}</h1>
            <p>{{ $news->description }}</p>
            <p>{{ $news->category->name }}</p>
            <ul>
                @foreach ($news->comments as $comment)
                    <li>{{ $comment->comment }}</li>
                @endforeach
            </ul>
            <hr>
        </div>
    @endforeach


</body>

</html>
