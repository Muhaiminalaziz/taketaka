const allSideMenu = document.querySelectorAll("#sidebar .side-menu.top li a");

allSideMenu.forEach((item) => {
    const li = item.parentElement;

    item.addEventListener("click", function () {
        allSideMenu.forEach((i) => {
            i.parentElement.classList.remove("active");
        });
        li.classList.add("active");
    });
});

// Toggle Sidebar
const menuBar = document.querySelector("#content nav .bx.bx-menu");
const Sidebar = document.getElementById("sidebar");

menuBar.addEventListener("click", function () {
    sidebar.classList.toggle("hide");
});

// const notifBtn = document.getElementById("notifBtn");
// const popupNotif = document.getElementById("popupNotif");

// notifBtn.addEventListener("click", function (e) {
//     e.preventDefault();
//     popupNotif.style.display =
//         popupNotif.style.display === "block" ? "none" : "block";
// });

// // Tutup popup kalau klik di luar
// document.addEventListener("click", function (e) {
//     if (!notifBtn.contains(e.target) && !popupNotif.contains(e.target)) {
//         popupNotif.style.display = "none";
//     }
// });

// function closeNotif() {
//     popupNotif.style.display = "none";
// }

// Search
const searchIcon = document.getElementById("searchIcon");
const searchInput = document.getElementById("searchInput");
const filterIcon = document.getElementById("filterIcon");

searchIcon.addEventListener("click", () => {
    searchInput.classList.toggle("active");
    if (searchInput.classList.contains("active")) {
        searchInput.focus();
    } else {
        searchInput.value = "";
    }
});

filterIcon.addEventListener("click", () => {
    filterIcon.classList.toggle("active");
    alert("Filter options can be placed here!");
});

// Sidebar rooll
// const sidebar = document.querySelector("#sidebar");

// sidebar.addEventListener("mouseenter", () => {
//     sidebar.classList.remove("hide");
// });

// sidebar.addEventListener("mouseleave", () => {
//     sidebar.classList.add("hide");
// });
const profileBtn = document.getElementById("profileBtn");
const accountPopup = document.getElementById("accountPopup");
const closePopup = document.getElementById("closePopup");

// Toggle popup saat klik profile
profileBtn.addEventListener("click", (e) => {
    e.preventDefault(); // biar tidak reload halaman
    accountPopup.style.display =
        accountPopup.style.display === "block" ? "none" : "block";
});

// Tutup popup saat klik tombol "×"
closePopup.addEventListener("click", () => {
    accountPopup.style.display = "none";
});

// Opsional: klik di luar popup untuk menutup
document.addEventListener("click", (e) => {
    if (!accountPopup.contains(e.target) && !profileBtn.contains(e.target)) {
        accountPopup.style.display = "none";
    }
});
