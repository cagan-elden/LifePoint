var pfp    = document.getElementById('pfp');
var dialog = document.getElementById('pfpBigDialog');

pfp.onclick = function() {
    if (dialog.style.display === 'none') {
        dialog.showPopover();
    } else {
        dialog.style.display = 'none';
    }
}