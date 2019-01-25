function getMessage() {
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
    let parent_id = $("#parent_id").val();

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
        url: 'comment',
        data: {
            _token: "{{csrf_token()}}",
            author: str[0].firstLetterCaps() + " " + str[1].firstLetterCaps(),
            content: comment,
            parent_id: parent_id
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