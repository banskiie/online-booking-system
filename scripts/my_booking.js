// Venue
var venues = document.getElementById("venue");
var modal = document.getElementById("myModal");
var btn = document.getElementById("venue-btn");
var span1 = document.getElementsByClassName("close")[0];

// Supplier
var modal2 = document.getElementById("suppModal");
var btn2 = document.getElementById("supp-btn");
var span2 = document.getElementsByClassName("close")[1];

// Venue Function
btn.onclick = function() {
    modal.style.display = "block";
}

span1.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//Supplier Function
btn2.onclick = function() {
    modal2.style.display = "block";
}

span2.onclick = function() {
    modal2.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

//Selecting
venues.addEventListener("change", function() {
    if (venues.value == "others") {
        modal.style.display = "block";
    }
});