$(document).ready(function () {
    let url = $(location).attr('href');

    $('.friendNotify').click(function(){
        $('.friendDetail').toggle();
    });

    $('#acceptReq').click(function () {
        let userId = $('#userId').val();
        let notificationId = $('#notificationId').val();
        let request_method = "friend";

        $.get(url, function (data) { } );
        $.post(url, {id: userId, req: 1, notifId: notificationId, request_way: request_method}).done(function (data) { } );
    });
});