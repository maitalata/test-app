@extends ('layout')

@section('content')
        <article class="">
            <h1>
                    <!-- <?= $post->title ?> -->
                    {{ $post->title }}
            </h1>

            <p>
               By <a href="/authors/{{$post->author->username}}"> {{$post->author->name}} </a> in <a href="#">{{$post->category->name}}</a>
            </p>

            <div>
                {!! $post->body !!}
            </div>
        </article>

        <a href="/">Go Home</a>
@endsection
