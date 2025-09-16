// Cek input kosong dan tampilkan alert (simulasi login)
document.querySelector(".login-form").addEventListener("submit", function (e) {
    e.preventDefault(); // cegah reload

    const username = document
        .querySelector(".login-form input[type='text']")
        .value.trim();
    const password = document
        .querySelector(".login-form input[type='password']")
        .value.trim();

    if (username === "" || password === "") {
        alert("Username dan Password wajib diisi!");
        return;
    }

    // Simulasi login sukses
    // alert("Login berhasil!");
    // window.location.href = "/dashboard.html"; // redirect kalau sukses
});

// Toggle Show/Hide Password (opsional jika kamu ingin tombol mata)
// Contoh:
// <input type="checkbox" onclick="togglePassword()"> Show Password
function togglePassword() {
    const passwordInput = document.querySelector(
        ".login-form input[type='password']"
    );
    passwordInput.type =
        passwordInput.type === "password" ? "text" : "password";
}

function showError() {
    document.getElementById("alertError").style.display = "flex";
}

function closeAlert() {
    document.getElementById("alertError").style.display = "none";
}

// Contoh pemanggilan otomatis (bisa diganti pakai validasi login)
// showError();
// Pop Up berhasil
function showNotifBerhasil(kalimat) {
    document.getElementById("kalimat-berhasil").textContent = kalimat;
    document.getElementById("popupNotif").style.display = "flex";
}

// Fungsi menutup popup saat klik tombol OK
function closeNotif() {
    document.getElementById("popupNotif").style.display = "none";
}
setTimeout(() => {
    document.getElementById("popupNotif").style.display = "none";
}, 4000); // 3 detik
