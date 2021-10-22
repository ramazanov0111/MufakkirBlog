@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Редактирование книги @endslot
            @slot('parent') Главная @endslot
            @slot('active') Книги @endslot
        @endcomponent

        <hr />

        <form class="form-group" action="{{route('admin.book.update', $book)}}" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.books.partials.form')

            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>
    </div>

@endsection
