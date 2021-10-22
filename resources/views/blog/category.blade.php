@extends('layouts.app')

@section('title', $category->title . " - Mufakkir")

@section('content')

    <div class="container">
        <div class="row d-flex">
            <div class="col-xl-8 py-5 px-md-5">
                <div class="row pt-md-4">
                    @forelse ($posts as $post)
                        <div class="col-md-12">
                            <div class="blog-entry ftco-animate d-md-flex fadeInUp ftco-animated">
                                <a href="{{ route('post', $post->slug) }}" class="img img-2"
                                   style="background-image:url({{ $post->image }})"></a>
                                <div class="text text-2 pl-md-4">
                                    <h3 class="mb-2"><a href="{{ route('post', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="icon-calendar mr-2"></i>{{ date("F j, Y, g:i a", strtotime($post->created_at)) }}</span>
                                            <span><a href="{{ route('post', $post->slug) }}"><i
                                                        class="icon-folder-o mr-2"></i>{{ $post->title }}</a></span>
                                        </p>
                                    </div>
                                    <p class="mb-4">{!!$post->description!!}</p>
                                    <p><a href="{{ route('post', $post->slug) }}" class="btn-custom">Read More <span
                                                class="ion-ios-arrow-forward"></span></a></p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>
                            <h1>{{ $category->title }}</h1>
                            <br>
                            <h5>Нет статей</h5>
                            <br>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="col-xl-4 sidebar ftco-animate bg-light pt-5 fadeInUp ftco-animated">
                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3 class="sidebar-heading">Все категории</h3>
                    <ul class="categories">
                        @foreach (\App\Models\Category::all() as $category)
                            <li><a href="{{url("/blog/category/$category->slug")}}">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3 class="sidebar-heading">Популярные статьи</h3>
                    <div class="block-21 mb-4 d-flex">
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                                <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{ $posts->links() }}
    </div>

@endsection
