@extends('layouts.layout')
@section('content')
    <h2>Создание поста</h2>
    <hr />
    <div class="container">
       {{-- , ['files' => 'true']--}}
            <form class="form-horizontal" action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{-- Form include --}}
                @include('articles.partials.form')
            </form>

    </div>
@endsection