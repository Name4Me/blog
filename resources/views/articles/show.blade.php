@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-8"><h1>Пост: {{$article->name}}</h1></div>
        <div class="col-4 text-right">
            <form onsubmit="if(confirm('Удалить?')){ return true } else { return false }"
                  action="{{route('article.destroy', $article)}}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-default btn-lg"  title="Удалить">
                    <i class="far fa-trash-alt"></i>
                </button>
                <a href="{{route('article.edit',$article)}}" title="Редактировать"
                   class="btn btn-primary pull-right"> <i class="far fa-edit"></i>
                </a>
                <a href="/download/{{$article->id}}" class="btn btn-primary pull-right" title="Загрузить файл">
                    <i class="far fa-save"></i>
                </a>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12"><h5>Описание: {{$article->content}}</h5></div>
    </div>
    <hr/>

    @include('comments.create')
    @include('comments.show')

@endsection