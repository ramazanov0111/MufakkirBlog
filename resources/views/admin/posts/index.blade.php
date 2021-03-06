@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Список статей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Статьи @endslot
        @endcomponent

        <a href="{{route('admin.post.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square"></i> Создать статью</a>
        <table class="table table-striped">
            <thead>
            <th>Заголовок</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->published}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{ route('admin.post.destroy',
                        $post) }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}

                            <a class="btn btn-default" href="{{route('admin.post.edit', $post)}}">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                            <button type="submit" class="btn">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{ $posts->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
