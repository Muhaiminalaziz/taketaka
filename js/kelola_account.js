// 1. Tutup popup akun
document.querySelector(".close-btn")?.addEventListener("click", () => {
    document.querySelector(".account-popup").style.display = "none";
});

// 3. Simpan mode gelap saat reload
window.addEventListener("DOMContentLoaded", () => {
    const savedMode = localStorage.getItem("darkMode") === "true";
    document.body.classList.toggle("dark-mode", savedMode);
    if (toggle) toggle.checked = savedMode;
});

// Ambil elemen
const profileBtn = document.querySelector(".profile");
const accountPopup = document.querySelector(".account-popup");
const closeAccountBtn = document.querySelector(".close-btn");

// Klik tombol close -> sembunyikan popup
if (closeAccountBtn) {
    closeAccountBtn.addEventListener("click", () => {
        accountPopup.classList.remove("show");
    });
}

// Klik di luar popup -> sembunyikan popup
document.addEventListener("click", (e) => {
    if (
        accountPopup &&
        !accountPopup.contains(e.target) &&
        !profileBtn.contains(e.target)
    ) {
        accountPopup.classList.remove("show");
    }
});
