<div id="show_comments" class="container">
    @foreach($comments as $comment)
        <div class="row">
        <div class="col-10" >
            <h6>{{$comment->author}}:</h6>
        </div>
            <div class="col-2" >
                {{$comment->updated_at}}
            </div>
        </div>
        <div class="row">
            <div class="col-12" >
                <p style="background-color: white; border-radius: 5%">{{$comment->content}}</p>
            </div>
        </div>
    @endforeach
</div>