@extends('layouts.layout')
@section('content')
<div class="container">
    <h2>Редактирование категории</h2>
    <hr />
    <form class="form-horizontal" action="{{route('category.update', $category)}}" method="post">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        {{-- Form include --}}
        @include('categories.partials.form')
    </form>

</div>
@endsection