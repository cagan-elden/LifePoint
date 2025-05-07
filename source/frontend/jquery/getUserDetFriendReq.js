$(document).ready(function () {
    let url = $(location).attr('href');

    $('.friendNotify').click(function(){
        $('.friendDetail').toggle();
    });

    $('#acceptReq').click(function () {
        let userId = $('#userId').val();
        let notificationId = $('#notificationId').val();

        $.get(url, function (data) { } );
        $.post(url, {id: userId, req: 1, notifId: notificationId}).done(function (data) { } );
    });
});