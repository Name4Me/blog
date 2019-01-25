@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6"><h2>Список Категорий</h2></div>
            <div class="col-6 text-right">
                <a href="{{route('category.create')}}" class="btn btn-primary pull-right">
                    <i class="fafa-plus-square-o">Содать категорию</i>
                </a>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
            <th>Наименование</th>
            <th>Описание</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td><a href="{{route('category.show', $category)}}">{{$category->name}}</a></td>
                    <td>{{$category->description}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true } else { return false }"
                              action="{{route('category.destroy', $category)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <button type="submit" class="btn"  title="Удалить"><i class="fas fa-trash-alt"></i></button>
                            <a href="{{route('category.edit',$category)}}"  title="Редактировать"
                               class="btn btn-primary pull-right"><i class="far fa-edit"></i></a>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection