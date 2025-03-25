$(document).ready(function () {
    let url = $(location).attr('href');

    $('.friendNotify').click(function(){
        $('.friendDetail').toggle();
    });

    $('#acceptReq').click(function () {
        let userId = $('#userId').val();

        $.get(url, function (data) {
            console.log('Value got: ', userId);
        });
        $.post(url, {id: userId, req: 1}).done(function (data) {
            alert("Data loaded successfully...");
        });
    });
});