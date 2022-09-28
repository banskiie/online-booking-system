function customVenue() {
    const customVenue = document.getElementById("custom-venue");
    const defaultVenue = document.getElementById("def-venue");
    if (customVenue.style.display === "none") {
        customVenue.style.display = "flex";
        defaultVenue.style.display = "none";
    } else {
        customVenue.style.display = "none";
        defaultVenue.style.display = "flex";
    }
}