
$(window).ready(function(e) {
    /* $("html").css("overflow", "hidden");
    $("body").css("overflow", "auto"); */

    $('.edit_content_display').attr('disabled', true);
    $('#recipient_name').attr('disabled', true);
    $("#receive").attr('disabled', true);
    $("#commentid").attr('disabled', true);
     if (count == 1) { 
        $('#uid').val(mini_id);
        $('#uid').attr('disabled', true);
        $('#email').val(email);
        $('#email').attr('disabled', true);
    } else {
        $('#uid').attr('disabled', false);
        $('#email').attr('disabled', false);
     } 
});



function postReply(status, commentId, replyname) {
    if (status == 0) {
        $('#commentid').val(commentId);
        $("#uid").focus();
        $("#receive").val(replyname)
        $("#contact_form_title").text("回覆" + replyname + "評論");

        $('html, body').animate({
            scrollTop: $("#contact_comment").offset().top - 100
        }, 100);
        $("#cancel_reply").css("display", "block");
        $("#cancel_reply").html("取消回覆");
        $("#cancel_reply").css("margin", "auto");
        $("#send").html("提交");
        $("#send").css('display', 'inline-block');
        $("#edit_btn").css('display', 'none');
    } else if (status == 1) {
        var el = document.createElement("div");
        el.className = "snackbar";
        var y = document.getElementById("snackbar-container");
        el.style.color = 'red';
        el.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i>評論已被封禁，無法回覆';
        y.append(el);
        el.className = "snackbar show";
        setTimeout(function() {
            el.className = el.className.replace("snackbar show", "snackbar");
        }, 3000);
    }


}



function editcomment(commentId) {
    $("#receive").val("")
    $("#send").css('display', 'none')
    $("#edit_btn").css('display', 'inline-block')
    /*  content = `.expert${commentID}`
     $('#total_comment_title').html(`${total_no}則評論`) */
    /* $("#editor2").val(`.expert${commentId}`) */
    /*  console.log($(`.edit_content${commentId}`).val()) */
    /*  let content = $(`.expert${commentId}`).text() */
    CKEDITOR.instances["editor2"].setData($(`.edit_content${commentId}`).val())
    $('#uid').val(mini_id);
    $('#uid').attr('disabled', true);
    $('#email').val(email);
    $('#email').attr('disabled', true);
    $('#commentid').val(commentId);
    $("#uid").focus();

    $("#contact_form_title").text("編輯評論");
    $('html, body').animate({
        scrollTop: $("#contact_comment").offset().top - 100
    }, 100);
    $("#cancel_reply").css("display", "block");
    $("#cancel_reply").html("取消編輯");
    $("#cancel_reply").css("margin", "auto");
}
$('#reportuser').on('show.bs.modal', function(event) {/* report user modal */
    var button = $(event.relatedTarget)
    var recipient = button.data('whatever')
    var id = button.data('id')
    var modal = $(this)
    modal.find('#recipient_name').val(recipient)
    modal.find('#commentid').val(id)
})

function timeSince(date) {
    var seconds = Math.floor((new Date() - date) / 1000);
    var interval = seconds / 31536000;
    if (interval > 1) {
        return Math.floor(interval) + " 年前";
    }
    interval = seconds / 2592000;
    if (interval > 1) {
        return Math.floor(interval) + " 月前";
    }
    interval = seconds / 86400;
    if (interval > 1) {
        return Math.floor(interval) + " 日前";
    }
    interval = seconds / 3600;
    if (interval > 1) {
        return Math.floor(interval) + " 小時前";
    }
    interval = seconds / 60;
    if (interval > 1) {
        return Math.floor(interval) + " 分鐘前";
    }
    return Math.floor(seconds) + " 秒前";
}

$("#cancel_reply").click(function() {
    event.preventDefault();
    $("#cancel_reply").css("display", "none");
    $('#commentid').val("");
    $("#contact_form_title").text("新增評論");
    $("#send").css('display', 'inline-block');
    $("#edit_btn").css('display', 'none');
    $("#receive").val('')
    CKEDITOR.instances.editor2.setData('');
})

function report_comment(reportname, commentid) {
    /* console.log(reportname, commentid) */
}

$(document).on('click', '.heart', function() {
    $(this).attr('disabled', true);
    username = user
    if (username != '') {
        $(this).toggleClass('is-active');
    } else {
        var el = document.createElement("div");
        el.className = "snackbar";
        var y = document.getElementById("snackbar-container");
        el.style.color = 'red';
        el.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> 登入系統才可使用點讚功能</span>";
        y.append(el);
        el.className = "snackbar show";
        setTimeout(function() {
            el.className = el.className.replace("snackbar show", "snackbar");
        }, 3000);
        setTimeout(function() {
            $(this).attr('disabled', false);
        }, 10000);
    }
});

$("#send").click(function() {
    event.preventDefault();
    $('#send').attr('disabled', true);
    $("#send").text("等待中");
    var formData = {
        commentid: $("#commentid").val(),
        uid: $("#uid").val(),
        email: $("#email").val(),
        receive: $("#receive").val(),
        editor: CKEDITOR.instances.editor2.getData()
    };
    $.ajax({
        type: "POST",
        url: "https://yogurtstudio.tk/system/php/comment/contact_comment_add.php",
        data: formData
    }).done(function(data) {
        $('#send').attr('disabled', false);
        $("#send").text("提交");
        $("#receive").val('')
        $('#err-state').html(data)
        /*  console.log(data) */
        var el = document.createElement("div");
        el.className = "snackbar";
        var y = document.getElementById("snackbar-container");
        el.style.color = 'white';
        el.innerHTML = data;
        y.append(el);
        el.className = "snackbar show";
        setTimeout(function() {
            el.className = el.className.replace("snackbar show", "snackbar");
        }, 3000);
        listComment();
    });
});

$("#send_report_btn").click(function() {
    event.preventDefault();
    var formData = {
        report_username: $("#recipient_name").val(),
        commentid: $("#commentid").val(),
        report_user_field: $("input[name=report_user_field]:checked", '#report_user_form').val(),
        message_text: $("#message_text").val()
    };
    $.ajax({
        type: "POST",
        url: "https://yogurtstudio.tk/system/php/comment/contact_report_user.php",
        data: formData
    }).done(function(data) {
        $('#err-state').html(data)
        /*  console.log(data) */
        var el = document.createElement("div");
        el.className = "snackbar";
        var y = document.getElementById("snackbar-container");
        el.style.color = 'white';
        el.innerHTML = data;
        y.append(el);
        el.className = "snackbar show";
        setTimeout(function() {
            el.className = el.className.replace("snackbar show", "snackbar");
        }, 3000);
        listComment();
    });
});

$("#edit_btn").click(function() {
    event.preventDefault();
    $('#edit_btn').attr('disabled', true);
    $("#edit_btn").text("等待中");
    var formData = {
        commentid: $("#commentid").val(),
        uid: $("#uid").val(),
        email: $("#email").val(),
        editor: CKEDITOR.instances.editor2.getData()
    };
    $.ajax({
        type: "POST",
        url: "https://yogurtstudio.tk/system/php/comment/contact_comment_update.php",
        data: formData
    }).done(function(data) {
        $('#edit_btn').attr('disabled', false);
        $("#edit_btn").text("提交");
        $('#err-state').html(data)
        /*  console.log(data) */
        var el = document.createElement("div");
        el.className = "snackbar";
        var y = document.getElementById("snackbar-container");
        el.style.color = 'white';
        el.innerHTML = data;
        y.append(el);
        el.className = "snackbar show";
        setTimeout(function() {
            el.className = el.className.replace("snackbar show", "snackbar");
        }, 3000);
        listComment();
    });
});

$(document).ready(function() {
    listComment();
});
/* setInterval(listComment, 60000) */

function listComment() {
    $.post("https://yogurtstudio.tk/system/php/comment/contact_comment_list.php",
        function(data) {
            var data = JSON.parse(data);
            /* console.table(data) */
            var comments = "";
            var replies = "";
            var item = "";
            var parent = -1;
            var results = new Array();
            total_no = data.total[0]
            $('#total_comment_title').html(`評論<span class="h6"> ( ${total_no} )</span>`)
            var list = $("<ul class='comments-list clearfix'>");
            var item = $("<li>").html(comments);
            for (var i = 0;
                (i < data.result1.length); i++) {
                var commentId = data.result1[i]['comment_id'];
                parent = data.result1[i]['parent_comment_id'];
                date = data.result1[i]['date'];
                if (parent == "0") {
                    comments = "<div class='comment'><a data-toggle='modal' data-target='#reportuser'href='javascript:void(0)'' data-whatever='" + data.result1[i]['comment_sender_name'] + "'data-id='" + commentId + "' onClick='report_comment(`" + data.result1[i]['comment_sender_name'] + "`," + commentId + ")'class='report_btn'data-bs-toggle='tooltip' title='舉報'><i class='fa-solid fa-triangle-exclamation'></i></a><div class='img'>" + data.avatar[i] + "</div>" +
                        "<div class='commentContent'><div class='commentsInfo'><div class='author'><a>" +
                        data.result1[i]['comment_sender_name'] +
                        "</a></div>" +
                        "<div class='date'><a><span class='posted-by'>  " +
                        "於" + timeSince(new Date(`${date}`)) + "發表評論</span></a><small>" + data.editword[i] + "</small></div>" +
                        "<textarea style='display:none;'class='edit_content_display edit_content" + data.result1[i]['comment_id'] + "'>" + data.result1[i]['comment'] + "</textarea>" +
                        "<span class='expert'>" + data.result1[i]['comment'] + "</span>" +
                        "<div class='reply-btn'>" + data.edit[i] + data.like[i] + "<a style='cursor:pointer'onClick='postReply(" + data.result1[i]['ban'] + "," + commentId + ",`" + data.result1[i]['comment_sender_name'] + "`)' class='replyDisplay'>回覆</a></div>"
                    var item = $("<li>").html(comments);
                    list.append(item);
                    var reply_list = $('<ul class="comments-lists">');
                    item.append(reply_list);
                    listReplies(commentId, data, reply_list);
                }
            }
            $("#output").html(list);
            comment_style_implement()
        });
}

function listReplies(commentId, data, list) {
    for (var i = 0;
        (i < data.result1.length); i++) {
        if (commentId == data.result1[i].parent_comment_id) {
            let date = data.result1[i]['date'];
            let commentId = data.result1[i]['comment_id'];
            var comments = "<div class='comment'><a data-toggle='modal' data-target='#reportuser'href='javascript:void(0)' data-whatever='" + data.result1[i]['comment_sender_name'] + "'data-id='" + commentId + "' onClick='report_comment(`" + data.result1[i]['comment_sender_name'] + "`," + commentId + ")'class='report_btn'data-bs-toggle='tooltip' title='舉報'><i class='fa-solid fa-triangle-exclamation'></i></a><div class='img'>" + data.avatar[i] + "</div>" +
                "<div class='commentContent'><div class='commentsInfo'><div class='author'><a>" +
                data.result1[i]['comment_sender_name'] +
                "</a></div>" +
                "<div class='date'><a><span class='posted-by'>  " +
                "於" + timeSince(new Date(`${date}`)) + "回覆" +
                data.result2[i] + "的評論</span></a><small>" + data.editword[i] + "</small></div>" +
                "<textarea style='display:none;'class='edit_content_display edit_content" + data.result1[i]['comment_id'] + "'>" + data.result1[i]['comment'] + "</textarea>" +
                "<span class='expert'>" + data.result1[i]['comment'] + "</span>" +
                "<div class='reply-btn'>" + data.edit[i] + data.like[i] + "<a style='cursor:pointer'onClick='postReply(" + data.result1[i]['ban'] + "," +
                commentId + ",`" + data.result1[i]['comment_sender_name'] + "`)' class='replyDisplay'>回覆</a></div>"
            var item = $("<li>").html(comments);
            var reply_list = $('<ul class="comments-lists">');
            list.append(item);
            item.append(reply_list);
            listReplies(data.result1[i].comment_id, data, reply_list);
        }
    }
}

function comment_style_implement() {
    $('img').each(function() {
        $("img").on("error", function() {
            $(this).attr("src", "https://img.icons8.com/external-prettycons-lineal-prettycons/344/external-404-web-and-seo-prettycons-lineal-prettycons.png")
            /* .css({'width':'50%','margin':'auto','display':'block'}) */
            ;
        });
    })
    /*  $('img:not([src*="/ckeditor/plugins/hkemoji/sticker/onion/"]):not([src*="/ckeditor/plugins/hkemoji/sticker/studio/"])')
         .removeAttr('width').removeAttr('height'); */
    /* $('img:not(".avatar_image"):not(".nofancybox"):not([src*="/ckeditor/plugins/hkemoji/sticker/onion/"]):not([src*="/ckeditor/plugins/hkemoji/sticker/studio/"])')
        .each(function() {
            if ($(this).height() > 200 || $(this).width() > 200) {
                $(this).removeAttr('style')
            } else
                $(this).addClass("autoimg");

        }); */
    $('.entriesContainer img:not(:first):not(".avatar_image"):not([src*="/ckeditor/plugins/hkemoji/sticker/onion/"]):not(".nofancybox"):not([src*="/ckeditor/plugins/hkemoji/sticker/studio/"])').wrap(function() {
        if ($(this).height() > 200 || $(this).width() > 200) {
            this.style.display = "none"
            return "<a style='cursor:pointer' data-src=" + this.src + " data-fancybox><p>打開圖片</p></a>";
        }

    });
    $('.entriesContainer video:not(".nofancybox")').wrap(function() {
        this.style.display = "none"
        return "<a style='cursor:pointer' data-src=" + this.src + " data-fancybox>" +
            "<p>打開影像</p></a>";
    });
    $('.entriesContainer video').wrap(function() {
        $(this).prop('muted', true)
        $(this)[0].autoplay = true;
        $(this).removeAttr('controls');
        $(this).attr('loop', 'loop');
    });
    $('.ckeditor-html5-video')
        .each(function() {
            $(this).removeAttr('style')
        });
};

$(document).on('click', '.heart', function() {
    /* $(this).toggleClass("is-active"); */
    event.preventDefault();
    var formData = {
        commentid: $(this).attr("data-id")
    };
    $.ajax({
        type: "POST",
        url: "https://yogurtstudio.tk/system/php/comment/contact_like.php",
        data: formData
    }).done(function(data) {
        $('#err-state').html(data)
        /* console.log(data) */
        /*  var el = document.createElement("div");
         el.className = "snackbar";
         var y = document.getElementById("snackbar-container");
         el.style.color = 'white';
         el.innerHTML = data;
         y.append(el);
         el.className = "snackbar show";
         setTimeout(function() {
             el.className = el.className.replace("snackbar show", "snackbar");
         }, 3000); */
        setTimeout(function() {
            listComment()
        }, 1000);
    });
});

$('body').tooltip({
    selector: '[data-bs-toggle="tooltip"]',
    container: 'body'
});