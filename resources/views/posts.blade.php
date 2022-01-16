@extends ('layout')

@section('content')
    @foreach($posts as $post)
      <article class="">
        <h1>
            <a href="/posts/{{$post->slug}}">
                <!-- <?= $post->title ?> -->
                {{$post->title}}
            </a>
        </h1>

        <p>
            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>

        <div>
            {{$post->excerpt}}
        </div>
      </article>


    @endforeach
@endsection
