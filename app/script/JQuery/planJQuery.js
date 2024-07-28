let counter  = 5;
const dataId = [0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F']; // Hexadecimals used (128 combinations total)
let listId   = []; // Store id's
var dashCounter = 0;

// Functions
var createId = () => {
    funcLoop = true;
    while (funcLoop === true) {
        var id = [];

        for (let i = 0; i <= 8; i++) {
            var char = dataId[Math.floor(Math.random()*dataId.length)];
            id.push(char);
        }

        var stringId = id.join('');
        if (listId.indexOf(stringId) === -1) {
            listId.push(stringId);
            return stringId;
        }
    }
}

$(document).ready(function(){
    $('#element').find('.time').attr('name',createId());
    $('#element').find('.detail').attr('name',createId());
    for (let i = 0; i < 4; i++) {
        $('#element').first().clone().appendTo('ul');
        $('#element').first().find('.time').attr('name', createId());
        $('#element').find('.detail').attr('name', createId());
    }
    $('#addNewElement').click(function(event){
        event.preventDefault();

        $('#element').first().clone().appendTo($('ul'));
        $('#element').find('.time').attr('name', createId());
        $('#element').find('.detail').attr('name', createId());

        // Stop new input fields
        counter++;
        if (counter === 10) {
            $(this).prop('disabled', true);
        }
        $('#removeElement').prop('disabled', false);
    });
    $('#removeElement').click(function(event){
        event.preventDefault();
        $('ul li').not(':first').last().remove();

        // Enable new input fields
        if (counter > 1) {
            counter--;
            $('#addNewElement').prop('disabled', false);
        } else if (counter === 1) {
            $(this).prop('disabled', true);
        }
    });

    // Change Here Tomorrow!
    $('#createNewDash').click(function(event){
        event.preventDefault();

        if (dashCounter !== 5) {
            $('.dashboard').first().clone();
            dashCounter++;
        } else {
            alert('Max dashboard reached!');
        }
    });
});