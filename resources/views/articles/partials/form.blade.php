
@if (isset($article->id))
    <label for="">Имя</label>
    <input type="text" class="form-control"  name="name" placeholder="Имя катекории" value="{{$article->name}}" required>
    <label for="">Content</label>
    <textarea type="text" class="form-control"  name="content">{{$article->content}}</textarea>
@else
    <label for="">Название</label>
    <input type="text" class="form-control" name="name" value="" required>
    <label for="">Контент</label>
    <textarea type="text" class="form-control"  name="content" required></textarea>
@endif
<br />
<input onchange="ValidateSize(this)" type="file"  name="file"> {{--2097152--}}
<script>
    function ValidateSize(file) {
        let FileSize = file.files[0].size / 1024 / 1024; // in MB
        if (FileSize > 2) {
            alert('File size exceeds 2 MB');
            $(file).val('');
        }
    }
</script>
<br /><br />
<label for="">Родительска категория</label>
<select class="form-control" name="parent_id">
    @include('categories.partials.categories', ['categories' => $categories])
</select>

<hr />
<input class="btn btn-primary" type="submit" value="Сохранить">