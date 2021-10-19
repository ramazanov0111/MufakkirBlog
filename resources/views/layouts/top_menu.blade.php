@foreach ($categories as $category)

    @if ($category->children->where('published', 1)->count())
        <li class="nav-item dropdown">
            <a href="{{url("/blog/category/$category->slug")}}" class="nav-link dropdown-toggle"
               data-toggle="dropdown" role="button" aria-expanded="false">
                {{ $category->title }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                @include('layouts.top_menu', ['categories' => $category->children])
            </ul>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{url("/blog/category/$category->slug")}}">
                {{ $category->title }}
            </a>
            @endif
        </li>
        @endforeach
