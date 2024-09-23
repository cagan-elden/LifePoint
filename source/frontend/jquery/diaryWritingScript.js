$(document).ready(function() {
    let wasAchieveTrue = false;
    let pointAchieve = false;

    $('.check').on('click', function(event){
        var point = parseInt($('#point').text());
        var i = $('.check').index(this);

        console.log(i);

        if ($(this).prop('checked')) {
            $('.time').eq(i).css('background-color', 'lightgreen');
            $('#point').text(point + 5);
        } else {
            $('.time').eq(i).css('background-color', '#ccc');
            $('#point').text(point - 5);
        }
    });

    $('#journal').on('input', function(){
        var text = $(this).val().trim();
        var point = parseInt($('#point').text());

        // Words
        var words = text.split(/\s+/).filter(function(word) {
            return word.length > 0;
        });

        var wordCount = 60-words.length;
        var str1 = wordCount.toString();
        var str2 = "words untill prize";

        if (wordCount <= 0) {
            $('#wordPrize').text("Prize guarenteed");

            if (!wasAchieveTrue) {
                $('#point').text(point + 25);
                wasAchieveTrue = true;
                pointAchieve = true;
            }
        } else {
            $('#wordPrize').text(str1.concat(" ", str2));

            if (wasAchieveTrue && pointAchieve) {
                $('#point').text(point - 25);
                pointAchieve = false;
            }
            wasAchieveTrue = false;
        }

        // Characters
        var characters = $(this).val().length;

        var characterCount = 750-characters;
        var str3 = "/750 characters left";
        var str4 = characterCount.toString();

        if (characterCount > 0) {
            $('#characterLeft').text(str4.concat(str3));
        } else {
            $('#characterLeft').text("Max.");
            $(this).val($(this).val().substring(0, 750));

        }
    });
});