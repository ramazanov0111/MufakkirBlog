@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Создание пользователя @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователи @endslot
        @endcomponent

        <hr />

        <form class="form-group" action="{{route('admin.user_management.user.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.user_management.users.partials.form')

            <input type="hidden" name="created_by" value="{{ Auth::id() }}">
        </form>
    </div>

@endsection
