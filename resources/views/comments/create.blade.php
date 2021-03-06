<div class="container">
    <div class="jumbotron mt-3">
        <div class="row">
            <div class="col-10">
                <label for="">Автор</label>
                <input id="author" type="text" class="form-control" name="comment_author" placeholder="Имя Фамилия"
                       value="" required>
                <label for="">Коментарий</label>
                <textarea id="comment" type="text" class="form-control" name="comment_content" placeholder="Текст"
                          required></textarea>
            </div>
            <div class="col-2">

                                <script>
                                    function sendMessage() {
                                        String.prototype.firstLetterCaps = function () {
                                            return this.charAt(0).toUpperCase() + this.slice(1);
                                        };
                                        let author = $("#author");
                                        let str = author.val();
                                        if (str.length===null|| str.length===undefined || str.length === 0) {
                                            alert('Имя должно содержать два слова');
                                            return;
                                        }
                                        let comment = $("#comment");
                                        let comment_text = comment.val();
                                        str = str.match(/(\w+)/g);
                                        let wordCount = str.length;
                                        let category_id = $("#category_id").val();
                                        let article_id = $("#article_id").val();
                                        if (wordCount != 2) {
                                            alert('Имя должно содержать два слова');
                                            return;
                                        }
                                        if (comment_text.length === 0) {
                                            alert('Введите коментарий');
                                            return;
                                        }

                                        $.ajax({
                                            type: 'POST',
                                            url: '{{route('comment.store')}}',
                                            data: {
                                                _token: "{{csrf_token()}}",
                                                author: str[0].firstLetterCaps() + " " + str[1].firstLetterCaps(),
                                                content: comment_text,
                                                category_id: category_id,
                                                article_id: article_id,
                                            },
                                            dataType: 'JSON',
                                            success: function (data) {
                                                let html = '<div class="row">' +
                                                    '<div class="col-10"><h6>' + data.author + ':</h6></div>' +
                                                    '<div class="col-2">' + data.created_at + '</div></div>' +
                                                    '<div class="row"><div class="col-12">' +
                                                    '<p style="background-color: white; border-radius: 5%">' + data.content + '</p></div></div>';

                                                document.getElementById("show_comments").innerHTML += html;

                                            }
                                        });
                                        author.val('');
                                        comment.val('');
                                    }
                                </script>

                @if (isset($category->id))
                    <input id="category_id" type="hidden" value="{{$category->id}}">
                @elseif (isset($article->id))
                    <input id="article_id" type="hidden" value="{{$article->id}}">
                @endif
{{--
                @else
                    <input id="parent_id" type="hidden" name="parent_id" value="0">

--}}


                <button id="msg_send" type="button" class="btn btn-default btn-lg" title="Отправить коментарий" onclick="sendMessage()">
                    <i class="far fa-comment" style="font-size:150px;"></i>
                </button>
            </div>
        </div>

    </div>
</div>