<div class="row">
    <div class="col-6"><h2>Список Постов</h2></div>
    <div class="col-6 text-right">
        <a href="{{route('article.create')}}" class="btn btn-primary pull-right">
            <i class="fafa-plus-square-o">Содать пост</i>
        </a>
    </div>
</div>

<table class="table table-striped">
    <thead>
    <th>Название</th>
    <th>Содержание</th>
    <th class="text-right">Действие</th>
    </thead>
    <tbody>
    @forelse($articles as $article)
        <tr>
            <td><a href="{{route('article.show', $article)}}">{{$article->name}}</a></td>
            <td>{{$article->content}}</td>
            <td class="text-right">
                <form onsubmit="if(confirm('Удалить?')){ return true } else { return false }"
                      action="{{route('article.destroy', $article)}}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <button type="submit" class="btn"><i class="far fa-trash-alt" title="Удалить"></i></button>
                    <a class="btn btn-primary pull-right" href="{{route('article.edit',$article)}}"
                       title="Редактировать">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="/download/{{$article->id}}" class="btn btn-primary pull-right" title="Загрузить файл">
                        <i class="far fa-save"></i>
                    </a>

                </form>


            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
        </tr>
    @endforelse
    </tbody>
</table>