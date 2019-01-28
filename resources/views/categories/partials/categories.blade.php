@foreach($categories as $category_list)
    <option value="{{$category_list->id}}"
    @if (isset($id) and $id == $category_list->id) selected @endif>
        @if (isset($category_list->name))
            {{$category_list->name}}
        @endif
    </option>
@endforeach