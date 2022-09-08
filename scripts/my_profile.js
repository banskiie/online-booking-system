// Pages
const editClientPage = document.getElementById("update-info");
const profileInfoPage = document.getElementById("profile-info");

// Buttons
const editInfoBtn = document.getElementById("edit-info-btn");
const cancelUpdateBtn = document.getElementById("cancel-update-btn");

// Event Listeners
editInfoBtn.addEventListener("click", openEditWindow);
cancelUpdateBtn.addEventListener("click", closeEditWindow);

//Functions
function openEditWindow(event) {
  editClientPage.style.display = "block";
  profileInfoPage.style.display = "none";
}

function closeEditWindow(event) {
  editClientPage.style.display = "none";
  profileInfoPage.style.display = "flex";
}
