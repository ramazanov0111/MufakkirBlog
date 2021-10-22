@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Создание книги @endslot
            @slot('parent') Главная @endslot
            @slot('active') Книги @endslot
        @endcomponent

        <hr />

        <form class="form-group" action="{{route('admin.book.store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.books.partials.form')

            <input type="hidden" name="created_by" value="{{ Auth::id() }}">
        </form>
    </div>

@endsection
