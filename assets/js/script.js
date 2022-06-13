// Get the modal
function show_happy_modal(){
    var modal = document.getElementById("happy-button-modal");
    modal.style.display = "block";
}
function hide_happy_modal(){
    var modal = document.getElementById("happy-button-modal");
    modal.style.display = "none";
}
var modal = document.getElementById("happy-button-modal");
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
