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
    });
});