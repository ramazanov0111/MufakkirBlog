@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-3 ">
                <div class="jumbotron">
                    <p class="lead"><span class="btn btn-lg">Категорий {{ $count_categories }}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p class="lead"><span class="btn btn-lg">Статей {{ $count_posts }}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p class="lead"><span class="btn btn-lg">Посетителей 0</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron">
                    <p class="lead"><span class="btn btn-lg">Сегодня 0</span></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <a href="{{route('admin.category.create')}}" class="badge-dark btn btn-block btn-default">Создать категорию</a>
                @foreach($categories as $category)
                    <a href="{{route('admin.category.edit', $category)}}" class="badge badge-light list-group-item">
                        <h4 class="list-group-item-heading">{{ $category->title }}</h4>
                        <p class="list-group-item-text">
                            Кол-во статей: {{ $category->posts()->count() }}
                        </p>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.post.create')}}" class="badge-dark btn btn-block btn-default">Создать статью</a>
                @foreach($posts as $post)
                    <a href="{{route('admin.post.edit', $post)}}" class="badge badge-light list-group-item">
                        <h4 class="list-group-item-heading">{{ $post->title }}</h4>
                        <p class="list-group-item-text">
                            Категория: {{ $post->categories()->pluck('title')->implode(', ') }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
