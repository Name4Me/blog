@extends('layouts.layout')
@section('content')
    <h2>Создание категории</h2>
    <hr />
    <div class="container">
            <form class="form-horizontal" action="{{route('category.store')}}" method="post">
                {{csrf_field()}}
                {{-- Form include --}}
                @include('categories.partials.form')
            </form>

    </div>
@endsection