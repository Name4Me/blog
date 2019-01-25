<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/"><strong>Home</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('category.index')}}">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('article.index')}}">Посты</a>
                </li>
                <li class="mt-2 mt-md-0">

                </li>
            </ul>
            <ul class="navbar-nav mt-2 mt-md-0">
                <li class="nav-item nav-link">
                    {{\App\Visitor::getIP()}}
                </li>
                @foreach( \App\Visitor::getStatistic() as $item)
                    <li class="nav-item  nav-link disabled">
                        ||
                    </li>
                    <li class="nav-item  nav-link">
                        {{$item->browser}}:&nbsp{{$item->total}}
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>
