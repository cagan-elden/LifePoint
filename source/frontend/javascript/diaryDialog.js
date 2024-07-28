let openDialog = document.getElementById('newEntry');
let diaryDialog = document.getElementById('diaryDialog');

openDialog.onclick = function() {
    if (diaryDialog.style.display == 'none') {
        diaryDialog.style.display = 'block';
    } else {
        diaryDialog.style.display = 'none';
    }
}