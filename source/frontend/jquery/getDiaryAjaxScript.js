$(document).ready(function(){
    $('.diaryButton').click(function(){
        var diaryId = $(this).data('id');

        $.ajax({
            url: 'diary.php',
            method: 'POST',
            data: {id: diaryId},
            success: function(response) {
                $('#textHere').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Error Message: ',error);
            }
        });
    });
});