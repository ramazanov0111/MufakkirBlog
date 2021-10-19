@extends('layouts.app')

@section('title', $category->title . " - Al-Fatawa")

@section('content')

    <div class="container">
        @forelse ($posts as $post)
            <div class="row">
                <div class="col-sm-8">
                    <a href="{{ route('post', $post->slug)}}">
                        <h3>{{ $post->title }}</h3>
                    </a>
                    <p>{!!$post->description!!}</p>
                </div>
            </div>
        @empty
            <h2 class="text-center">Пусто</h2>

        @endforelse

        {{ $posts->links() }}
    </div>

@endsection
