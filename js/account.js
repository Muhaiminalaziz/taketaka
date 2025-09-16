// Fitur pencarian pengguna
document
    .querySelector(".toolbar input")
    ?.addEventListener("input", function () {
        const keyword = this.value.toLowerCase();
        const users = document.querySelectorAll(".user-card");

        users.forEach((card) => {
            const name =
                card.querySelector("strong")?.textContent.toLowerCase() || "";
            const email =
                card.querySelector("small")?.textContent.toLowerCase() || "";
            if (name.includes(keyword) || email.includes(keyword)) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        });
    });

// Konfirmasi Hapus
document.querySelectorAll(".delete")?.forEach((btn) => {
    btn.addEventListener("click", function () {
        const userName =
            this.closest(".user-card").querySelector("strong")?.textContent ||
            "pengguna ini";
        const confirmDelete = confirm(`Yakin ingin menghapus ${userName}?`);
        if (confirmDelete) {
            this.closest(".user-card").remove();
        }
    });
});

// Tampikan Sandi
document.getElementById("showPassword").addEventListener("change", function () {
    const pass1 = document.getElementById("password1");
    const pass2 = document.getElementById("password2");
    const type = this.checked ? "text" : "password";
    pass1.type = type;
    pass2.type = type;
});

// Uploud File
const input = document.getElementById("gambar");
const preview = document.getElementById("preview-gambar");

input.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});
