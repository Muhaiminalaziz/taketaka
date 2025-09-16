// Pop Up
const modal = document.querySelector(".modal");
const closeBtn = document.querySelector(".close");

// Atribut popup
const namaSosmed = modal.querySelector("#nama_sosmed");
const linkSosmed = modal.querySelector("#link_sosmed");
const tombolReset = modal.querySelector("#tombol-reset");
const tombolSimpan = modal.querySelector("#simpan-perubahan");

// Fungsi buka modal
function openModal(idSosmed) {
    fetch("/backend/sosmed.php?id_sosmed=" + idSosmed, {
        method: "GET",
        headers: {
            "Content-Type": "application/json", // Sets the Content-Type header
        },
    })
        .then(async (respon) => {
            const data = await respon.json();
            if (!respon.ok) {
                throw new Error(
                    data.message || "Terjadi kesalahan menghubungkan ke server"
                );
            }
            return data;
        })
        .then((data) => {
            namaSosmed.value = data.data.nama_sosmed;
            linkSosmed.value = data.data.link_sosmed;
            tombolSimpan.setAttribute(
                "onclick",
                `editSosmed(event, ${data.data.id_sosmed})`
            );
        })
        .catch((error) => {
            console.error(error);
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
    tombolSimpan.setAttribute("onclick", "tambahSosmed(event)");
    modal.style.display = "block";
    document.body.classList.add("modal-open");
}

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
const closePopup = document.getElementById("close-popup");

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
function tutupPopup() {
    document.getElementById("popup-hapus").style.display = "none";
}

function konfirmasiHapus(idSosmed) {
    document
        .getElementById("confirm-btn")
        .setAttribute("onclick", `hapusSosmed(${idSosmed})`);
    document.getElementById("popup-hapus").style.display = "flex";
}

function hapusSosmed(idSosmed) {
    fetch("/backend/sosmed.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ hapus_sosmed: true, id_sosmed: idSosmed }),
    })
        .then(async (respon) => {
            const data = await respon.json();
            if (!respon.ok) {
                throw new Error(data.message);
            }
            return data;
        })
        .then((data) => {
            alert(data.message);
            requestSosmed();
            tutupPopup();
        })
        .catch((error) => {
            alert(error);
        });
}

if (window.innerWidth < 768) {
    sidebardebar.classList.add("hide");
} else if (window.innerWidth > 576) {
    // searchButtonIcon.classList.replace("bx-x", "bx-search");
    // searchForm.classList.remove("show");
}

window.addEventListener("resize", function () {
    if (this.innerWidth > 576) {
        // searchButtonIcon.classList.replace("bx-x", "bx-search");
        // searchForm.classList.remove("show");
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
