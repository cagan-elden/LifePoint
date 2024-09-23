var counter = 5;

$(document).ready(function(){

    // Functions here
    var createFive = () => {
        for (var i=0; i < 4; i++) {
            var newElement = $('#element').clone().first();
            newElement.appendTo('.dashBody ul');
            newElement.find('.time').val('');
            newElement.find('.detail').val('');
        }
    }

    var btnSitControl = (paramBtn, paramSit) => {
        if ($(paramBtn).prop('disabled', paramSit)) {
            $(paramBtn).prop('disabled', !paramSit);
        }
    }

    createFive();

    // Main here
    $('#addNewElement').click(function(event){
        event.preventDefault();

        if (counter <= 14) {
            var element = $('#element').clone().first();
            element.appendTo('.dashBody ul');
            element.find('.time').val('');
            element.find('.detail').val('');

            btnSitControl('#removeElement', true);
            counter++;
        } else {
            btnSitControl('#addNewElement', false);
        }
    });

    $('#removeElement').click(function(event){
        event.preventDefault();

        if (counter > 1) {
            var element = $('#element').remove().last();
            btnSitControl('#addNewElement', true);
            counter--;
        } else {
            btnSitControl('#removeElement', false);
        }
    });
});