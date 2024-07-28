var pfp      = document.getElementById('profilePicDp');
var dropdown = document.getElementById('headerDropdown');

pfp.onclick = function() {
    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'block';
    }
};