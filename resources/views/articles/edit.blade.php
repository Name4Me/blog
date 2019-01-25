@extends('layouts.layout')
@section('content')
    <div class="container">
        <h2>Редактирование поста</h2>
        <hr />
        <form class="form-horizontal" action="{{route('article.update',  $article)}}" method="post"  enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            {{-- Form include --}}
            @include('articles.partials.form')
        </form>

    </div>
@endsection