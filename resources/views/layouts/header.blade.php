<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fa fa-home fa-2x" aria-hidden="true"></i>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="topmenu">
                <li>
                    <a href="{{url("/")}}">Начинающим</a>
                </li>
                <li>
                    <a href="">Статьи<span class="fa fa-angle-down"></span></a>
                    <ul class="submenu">
                        @include('layouts.top_menu', ['categories' => $categories])
                    </ul>
                </li>
                <li>
                    <a href="">Библиотека<span class="fa fa-angle-down"></span></a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('books', "arabic") }}">
                                На арабском
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('books', "russian") }}">
                                На русском
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('books', "child") }}">
                                Для детей
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="">Видеолекции<span class="fa fa-angle-down"></span></a>
                    <ul class="submenu">
                        <li><a href="">Акыда</a></li>
                        <li><a href="">Фикх</a></li>
                        <li><a href="">История</a></li>
                        <li><a href="">Хадис</a></li>
                        <li><a href="">Адаб</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Аудиоуроки<span class="fa fa-angle-down"></span></a>
                    <ul class="submenu">
                        <li><a href="">Акыда</a></li>
                        <li><a href="">Фикх</a></li>
                        <li><a href="">История</a></li>
                        <li><a href="">Хадис</a></li>
                        <li><a href="">Адаб</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
