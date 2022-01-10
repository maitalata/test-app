<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Blog</title>
    <link rel="stylesheet" href="../app.css">
  </head>
  <body>
    <article class="">

       <h1>{{$post->title}}</h1>
       <div>
           {!!$post->body!!}
       </div>

    </article>

    <a href="/"> Go back</a>

  </body>
</html>
