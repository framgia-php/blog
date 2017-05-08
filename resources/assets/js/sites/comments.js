$(document).ready(function () {
    /**
     * Click button to edit comment.
     */
    $(document).on('click', '.comment-button-edit', function () {
        $('.comment-content, .buttons').removeClass('hide');
        $('.comment-content-edit').addClass('hide');

        var commentId = $(this).attr('data-comment-id');
        var commentHtml = $('.comment[data-comment-id="' + commentId + '"]');

        commentHtml.find('.comment-content, .buttons').addClass('hide');
        commentHtml.find('.comment-content-edit').removeClass('hide');
    });

    /**
     * Click button to cancel edit comment.
     */
    $(document).on('click', '.comment-button-cancel-edit', function () {
        $('.comment-content, .buttons').removeClass('hide');
        $('.comment-content-edit').addClass('hide');
        $('.comment-content-edit textarea').val('');
    });

    /**
     * Click button to reply comment.
     */
    $(document).on('click', '.comment-button-reply', function () {
        $('.comment').find('.reply').addClass('hide');

        var commentId = $(this).attr('data-comment-id');
        var commentHtml = $('.comment[data-comment-id="' + commentId + '"]');

        commentHtml.find('.reply').removeClass('hide');
    });

    /**
     * Click button to cancel reply comment.
     */
    $(document).on('click', '.comment-button-cancel-reply', function () {
        $('.comment').find('.reply').addClass('hide');
    });
});
