@extends ('layout')

@section('content')
        <article class="">
            <h1>
                    <!-- <?= $post->title ?> -->
                    {{ $post->title }}
            </h1>
            <div>
                {!! $post->body !!}
            </div>
        </article>
@endsection
