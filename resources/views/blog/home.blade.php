@extends('layouts.app')

@section('content')

    @include('layouts.carousel')

    <div class="row mb-2" style="padding: 15px;">
        @foreach ($categories as $category)
            <div class="col-6">
                <div style="width: 538px; margin-inline: -7px;" class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0">{{ $category->title }}</h3>
                        <a href="{{url("/blog/category/$category->slug")}}" class="stretched-link">Перейти к
                            категории</a>
                    </div>
                    <div style="padding: 0px;" class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="300" height="200">
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="col-md-8">
        @foreach ($posts as $post)
            <article class="blog-post">
                <h2 class="blog-post-title">
                    {{ $post->title }}
                </h2>
                <p class="blog-post-meta">{{ $post->created_at }}</a></p>

                <p>{{ $post->description }}</p>
                <a href="{{url("/blog/post/$post->slug")}}">
                    <span>Читать статью...</span>
                </a>
            </article>
        @endforeach
    </div>



@endsection
