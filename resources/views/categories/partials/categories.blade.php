@foreach($categories as $category_list)
    <option value="{{$category_list->id}}">
        @if (isset($category_list->name))
            {{$category_list->name}}
        @endif
    </option>
@endforeach