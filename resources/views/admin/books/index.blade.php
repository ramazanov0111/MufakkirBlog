@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Список книг @endslot
            @slot('parent') Главная @endslot
            @slot('active') Книги @endslot
        @endcomponent

        <a href="{{route('admin.book.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square"></i> Создать книгу</a>
        <table class="table table-striped">
            <thead>
            <th>Название</th>
            <th>Публикация</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{$book->title}}</td>
                    <td>{{$book->published}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{ route('admin.book.destroy',
                        $book) }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}

                            <a class="btn btn-default" href="{{route('admin.book.edit', $book)}}">
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
                        {{ $books->links() }}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
