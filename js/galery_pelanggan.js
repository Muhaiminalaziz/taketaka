// Pop Up
const modal = document.querySelector(".modal");
const closeBtn = document.querySelector(".close");

// Atribut popup
const namaBarang = modal.querySelector("#nama");
const deskProduk = modal.querySelector("#deskripsi");
const tombolReset = modal.querySelector("#tombol-reset");
const tombolSimpan = modal.querySelector("#simpan-perubahan");

// Fungsi buka modal
function openModal(idProduk) {
    fetch(
        "/backend/galeri_pelanggan.php?request_product&id_produk=" + idGaleri,
        {
            method: "GET",
        }
    )
        .then((respon) => {
            if (!respon.ok) {
                throw new Error("Terjadi kesalahan menghubungkan ke server");
            }
            return respon.json();
        })
        .then((data) => {
            const item = data.data;
            namaBarang.value = item.nama_pt;
            deskProduk.value = item.deskripsi_galeri;
            gambar.src = item.gambar;
            tombolSimpan.setAttribute(
                "onclick",
                `simpanPerubahanGaleri(event, ${item.id_galeri})`
            );
        })
        .catch((error) => {
            showNotifGagal("Gagal terhubung ke server: " + err.message);
        });

    // Buka modal
    modal.style.display = "block";
    z;
    document.body.classList.add("modal-open");
}

// Fungsi tutup modal
function closeModal() {
    modal.style.display = "none";
    document.body.classList.remove("modal-open");
}

closeBtn.addEventListener("click", closeModal);

// Tombol tambah barang
function modalTambahProduk() {
    // Buka modal
    tombolReset.click();
    tombolSimpan.setAttribute("onclick", "tambahProduk(event)");
    modal.style.display = "block";
    document.body.classList.add("modal-open");
}

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

// Pop Up Profile
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

// Notif Gagal
function showNotifGagal(kalimat) {
    let kalimatGagal = document.getElementById("kalimat-gagal");
    kalimatGagal.textContent = kalimat;
    document.getElementById("popupNotifGagal").style.display = "flex";
}

function closeNotifGagal() {
    document.getElementById("popupNotifGagal").style.display = "none";
}

// Nontifikasi hapus
// function closePopup() {
//     document.getElementById("popup-hapus").style.display = "none";
// }
// function konfirmasiHapus(idProduk) {
//     document
//         .getElementById("confirm-btn")
//         .setAttribute("onclick", `hapusProduk(${idProduk})`);
//     document.getElementById("popup-hapus").style.display = "flex";
// }

if (window.innerWidth < 768) {
    sidebardebar.classList.add("hide");
} else if (window.innerWidth > 576) {
    searchButtonIcon.classList.replace("bx-x", "bx-search");
    searchForm.classList.remove("show");
}

window.addEventListener("resize", function () {
    if (this.innerWidth > 576) {
        searchButtonIcon.classList.replace("bx-x", "bx-search");
        searchForm.classList.remove("show");
    }
});

// function showNotifGagal() {
//     document.getElementById("popupNotifGagal").style.display = "flex";
// }

function closeNotifGagal() {
    document.getElementById("popupNotifGagal").style.display = "none";
}

// // Sidebar rooll
// const sidebar = document.querySelector("#sidebar");

// // sidebar.addEventListener("mouseenter", () => {
// //     sidebar.classList.remove("hide");
// // });

// // sidebar.addEventListener("mouseleave", () => {
// //     sidebar.classList.add("hide");
// // });
