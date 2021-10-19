@extends('layouts.app')

@section('title', $post->meta_title)
@section('meta_keyword', $post->meta_keyword)
@section('meta_description', $post->meta_description)

@section('content')

    <div class="col-md-8">
        <h1>{{ $post->title }}</h1>
        <span>{{$post->description}}</span>
        <p>&nbsp;</p>
        {{ asset('css/$post->image') }}
        <img src="{{ $post->image }}">
        <p>
            {!! $post->body !!}
        </p>
    </div>


@endsection
