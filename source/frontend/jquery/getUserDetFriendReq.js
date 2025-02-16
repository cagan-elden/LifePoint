$(document).ready(function() {
    const pageUrl = window.location.href;

    $('.friendNotify').click(function() {
        $('.friendDetail').toggle(); 
    });

    $('#acceptReq').click(function(){
        $.ajax({
                url: pageUrl,
                method: 'POST',
                success: function (response) {
                }
        });
    });
});