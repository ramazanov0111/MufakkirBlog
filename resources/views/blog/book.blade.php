@extends('layouts.app')

@section('title', $book->title . " - Mufakkir")

@section('content')

    <div class="post_category row">
        <article id="post-772" class="post_cat_class">
            <div class="col-md-5 post_category_img">
                <div class="post_cat_img">
                    <img width="499" height="737" src="{{ asset("/storage/".$book->image) }}"
                         class="attachment-large size-large wp-post-image" alt="" loading="lazy"
                         sizes="(max-width: 499px) 100vw, 499px"></div>
            </div>
            <div class="col-md-7 post_category_content">
                <h1 class="entry-title"><a href="https://darulfikr.ru/knigi/tahzihulhaq/"
                                           rel="bookmark">{{ $book->title }}</a></h1>
                <div class="author_post"><span>Автор: </span>
                    <a href="https://darulfikr.ru/author/admin/" title="Записи автора Даруль-Фикр" class="author url fn"
                       rel="author">{{ $book->author }}</a></div>

                <div class="post_cat_content">
                    <p>{{$book->description}}</p>
                    <div class="more_article"><a href="{{ asset("/storage/".$book->file) }}">Скачать</a>
                    </div>
                </div>
            </div>

        </article><!-- #post-## -->
    </div>

@endsection
