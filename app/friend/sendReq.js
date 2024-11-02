$(document).ready(function() {
    $('#sendReq').click(function(){
        $.ajax({
            url: 'profile.php',
            method: 'POST',
            data: {id: user},
            success: function(response) {
                $('#sendReq').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Error Message: ',error);
            }
        });
    })
});