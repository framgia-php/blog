$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // show form to reply comment.
    $(document).on('click', '.comment .info .text .buttons .button-reply', function () {
        var dataCommentId = $(this).attr('data-comment-id');
        var commentSelector = '.comment[data-comment-id="' + dataCommentId + '"]';

        $(commentSelector + ' > .info > .reply').removeClass('hide');
    });

    // save reply comment when click save reply.
    $(document).on('click', '.comment .info .reply .actions .btn-reply', function () {
        var dataCommentId = $(this).attr('data-comment-id');
        var commentSelector = '.comment[data-comment-id="' + dataCommentId + '"]';

        var sendData = {
            content: $(commentSelector + ' > .info > .reply > textarea[name="content"]').val(),
            parent_id: dataCommentId,
            commentable_type: $(commentSelector).attr('data-commentable-type'),
            commentable_id: $(commentSelector).attr('data-commentable-id')
        };

        var route = laroute.route('sites.comments.store');

        $.post(route, sendData)
            .done(function (response) {
                if (response.comment.parent_id == 0) {
                    $('#new-comments').prepend(response.comment_html);
                    $(commentSelector + ' > .info > .reply > textarea[name="content"]').val('');
                } else {
                    $(commentSelector + ' > .info > .children').prepend(response.comment_html);
                    $(commentSelector + ' > .info > .reply > textarea[name="content"]').val('');    
                }
            });
    });

    // hide reply comment form.
    $(document).on('click', '.comment .info .reply .actions .btn-cancel', function () {
        var dataCommentId = $(this).attr('data-comment-id');
        var commentSelector = '.comment[data-comment-id="' + dataCommentId + '"]';

        $(commentSelector + ' > .info > .reply').removeClass('hide');
    });

    $(document).on('click', '.comment .info .edit .actions .btn-cancel', function () {
        var dataCommentId = $(this).attr('data-comment-id');
        var commentSelector = '.comment[data-comment-id="' + dataCommentId + '"]';

        $('.comment > .info > .edit').addClass('hide');
        $('.comment > .info > .text').removeClass('hide');
    });

    // show form to edit a comment.
    $(document).on('click', '.comment .info .text .buttons .button-edit', function () {
        var dataCommentId = $(this).attr('data-comment-id');
        var commentSelector = '.comment[data-comment-id="' + dataCommentId + '"]';
        var commentContent = $(commentSelector + ' > .info > .text > .content').html();

        $(commentSelector + ' > .info > .edit > textarea[name="content"]').val(commentContent);

        $('.comment > .info > .edit').addClass('hide');
        $('.comment > .info > .text').removeClass('hide');
        $(commentSelector + ' > .info > .text').addClass('hide');
        $(commentSelector + ' > .info > .edit').removeClass('hide');
    });

    // save edit comment when click save
    $(document).on('click', '.comment .info .edit .actions .btn-edit', function () {
        var dataCommentId = $(this).attr('data-comment-id');
        var commentSelector = '.comment[data-comment-id="' + dataCommentId + '"]';

        var sendData = {
            _method: 'put',
            content: $(commentSelector + ' > .info > .edit > textarea[name="content"]').val()
        };

        var route = laroute.route('sites.comments.update', { comment: dataCommentId });

        $.post(route, sendData)
            .done(function (response) {
                $(commentSelector + ' > .info > .text > .content').html(response.comment.content);
                $(commentSelector + ' > .info > .text').removeClass('hide');
                $(commentSelector + ' > .info > .edit').addClass('hide');
            });
    });

    // delete comment when click delte button
    $(document).on('click', '.comment .info .text .buttons .button-delete', function () {
        var dataCommentId = $(this).attr('data-comment-id');
        var commentSelector = '.comment[data-comment-id="' + dataCommentId + '"]';

        var sendData = {
            _method: 'delete',
        };

        var route = laroute.route('sites.comments.update', { comment: dataCommentId });

        $.post(route, sendData)
            .done(function (response) {
                $(commentSelector).remove();
            });
    });
});
