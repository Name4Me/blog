@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-8"><h1>Категория: {{$category->name}}</h1></div>
        <div class="col-4 text-right">
            <form onsubmit="if(confirm('Удалить?')){ return true } else { return false }"
                  action="{{route('category.destroy', $category)}}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-default btn-lg" title="Удалить">
                    <i class="far fa-trash-alt"></i>
                </button>
                <a href="{{route('category.edit',$category)}}" title="Редактировать"
                   class="btn btn-primary pull-right"> <i class="far fa-edit"></i></a>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12"><h5>Описание: {{$category->description}}</h5></div>
    </div>
    <hr/>

    @include('articles.partials.articles')
    @include('comments.create')
    @include('comments.show')

@endsection