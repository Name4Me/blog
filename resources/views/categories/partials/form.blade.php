
@if (isset($category->id))
    <label for="">Имя</label>
    <input type="text" class="form-control"  name="name" placeholder="Имя катекории" value="{{$category->name}}" required>
    <label for="">Content</label>
    <textarea type="text" class="form-control"  name="description">{{$category->description or ""}}</textarea>
@else
    <label for="">Имя</label>
    <input type="text" class="form-control" name="name" placeholder="Имя катекории" value="" required>
    <label for="">Описание</label>
    <textarea type="text" class="form-control"  name="description"></textarea>

@endif

<hr />
<input class="btn btn-primary" type="submit" value="Сохранить">