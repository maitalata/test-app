@extends ('layout')

@section('content')
        <article class="">
            <h1>
                    <!-- <?= $post->title ?> -->
                    {{ $post->title }}
            </h1>

            <p>
                <a href="#">{{$post->category->name}}</a>
            </p>

            <div>
                {!! $post->body !!}
            </div>
        </article>

        <a href="/">Go Home</a>
@endsection
