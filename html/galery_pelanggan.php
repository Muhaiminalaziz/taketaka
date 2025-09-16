<?php
    session_start();
    if (!isset($_SESSION["id_admin"])) {
        header("Location: /html/login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Galery Pelanggan</title>
        <link rel="icon" type="image/x-icon" href="/asset/favicon.ico" />
        <link rel="stylesheet" href="/Css/galery_pelanggan.css" />
        <!--Box Icons-->
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
        <!-- Google Icon -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=mail"
        />
    </head>
    <body>
        <!-- Sidebar -->
        <section id="sidebar" class="hide">
            <a href="#" class="brand">
                <img
                    src="/asset/taketaka.png"
                    alt="Logo Perusahaan"
                    class="logo-img"
                />
                <span class="text">Taketaka</span>
            </a>
            <ul class="side-menu top">
                <li>
                    <a href="/html/admin.php">
                        <i class="bx bxs-dashboard"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/html/upadate_barang.php">
                        <i class="bx bx-cart-alt"></i>
                        <span class="text">Update barang & Katalog</span>
                    </a>
                </li>
                <li class="active">
                    <a href="/html/galery_pelanggan.php">
                        <i class="bx bx-image"></i>
                        <span class="text">Galeri Pelanggan</span>
                    </a>
                </li>
                <li>
                    <a href="/html/sosmed.php">
                        <i class="bx bxs-megaphone"></i>
                        <span class="text">Sosmed</span>
                    </a>
                </li>
            </ul>
            <ul class="side-menu">
                <li>
                    <a href="#" class="logout">
                        <i class="bx bxs-log-out-circle"></i>
                        <span class="text">Keluar</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- Sidebar end -->

        <!-- Conten -->
        <section id="content">
            <!-- Nabvar -->
            <nav>
                <i class="bx bx-menu" id="toggle-sidebar"></i>
                <div class="nav-right">
                    <!-- Profile -->
                    <a href="#" class="profile" id="profileBtn">
                        <img src="/asset/aziz.png" />
                    </a>

                    <!-- Kelola Akun Popup -->
                    <div class="account-popup" id="accountPopup">
                        <div class="account-header">
                            <span class="account-email">muhaimin@admin</span>
                            <button class="close-btn" id="closePopup">×</button>
                        </div>
                        <div class="account-avatar">
                            <img
                                src="https://img.icons8.com/ios-filled/50/user.png"
                                alt="avatar"
                            />
                        </div>
                        <h2 class="welcome-text">Halo, Muhaimin Al Aziz</h2>
                        <button class="btn-outline">Kelola akun anda</button>

                        <div class="account-actions">
                            <a href="/html/account.php" class="btn-link">
                                <i class="bx bx-user-plus"></i> Kelola Pengguna
                            </a>
                            <a href="/html/login.php" class="btn-link">
                                <i class="bx bx-exit"></i> Keluar
                            </a>
                        </div>
                        <footer>©2025 - CV Taketaka Machinery Sejahtera</footer>
                    </div>
                </div>
            </nav>
            <!-- NABVAR -->

            <!-- Products -->
            <section class="bagian" id="products">
                <div class="heading">
                    <h1>Galeri Pelanggan</h1>
                    <br />
                </div>

                <!-- Product Content -->
                <div class="products-conatiner">
                    <!-- Box 1 -->
                    <div class="box">
                        <img
                            src="/asset/conveyor.jpg"
                            alt=""
                            class="product-image"
                        />
                        <h2 class="product-name">Komvayer Birahi</h2>
                        <div class="description">
                            <p class="description-text"></p>
                        </div>

                        <p class="justify-text">
                            Ready Table Top Chains Plastik Dan Stainless
                            Straight Dan Radius Mohon cantumkan spesifikasi
                            table topchains yang dibutuhkan beserta ukurannya
                            karena harga menyesuaikan dengan type dan ukuran
                            table topchains Kami juga menjual type dan
                            macam-macam table topChains
                        </p>
                        <div class="btn-group">
                            <button class="btn" onclick="openModal()">
                                Edit
                            </button>
                            <button
                                class="btn btn-delete"
                                onclick="konfirmasiHapus()"
                            >
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
                <button class="btn-add" onclick="modalTambahProduk()">
                    <i class="bx bx-plus"></i> Tambah
                </button>
            </section>
        </section>
        <!-- Popup Modal -->
        <div id="productModal" class="modal">
            <form action="#" method="post" id="edit-barang">
                <div class="modal-content">
                    <span class="close" onclick="closeModal()"> &times;</span>
                    <div class="modal-body">
                        <div class="modal-image">
                            <label for="gambar">Upload Gambar Produk</label>
                            <div class="upload-box">
                                <label for="gambar"></label>
                                <input
                                    type="file"
                                    id="gambar"
                                    name="gambar"
                                    accept="image/*"
                                    required
                                />
                                <img
                                    id="preview-gambar"
                                    src=""
                                    alt="Preview Gambar"
                                />
                            </div>
                        </div>

                        <div class="form-container">
                            <label for="nama">Nama Tempat</label>
                            <div class="input-icon">
                                <i class="bx bxs-package"></i>
                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    placeholder="barang..."
                                    required
                                />
                            </div>

                            <label for="deskripsi">Deskripsi</label>
                            <div class="input-icon">
                                <i class="bx bx-notepad"></i>
                                <textarea
                                    id="deskripsi"
                                    name="deskripsi"
                                    placeholder="Masukkan deskripsi..."
                                    rows="4"
                                    required
                                ></textarea>
                            </div>

                            <div class="btn-modul">
                                <button
                                    class="btn-hapus"
                                    type="reset"
                                    id="tombol-reset"
                                    onclick="closeModal()"
                                >
                                    Batal
                                </button>
                                <button
                                    class="btn btn-simpan"
                                    type="submit"
                                    id="simpan-perubahan"
                                    onclick="simpanPerubahan(event)"
                                >
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Pop Up Nontifikasi Berhasil -->
        <div class="popup-notif" id="popupNotif">
            <div class="notif-content">
                <div class="icon-success">
                    <i class="bx bx-check"></i>
                </div>
                <h2>Berhasil!</h2>
                <p id="kalimat-berhasil">Data berhasil di simpan</p>
                <button onclick="closeNotif()">OK</button>
            </div>
        </div>
        <!-- Pop Up Notifikasi Gagal -->
        <div class="popup-notif-gagal" id="popupNotifGagal">
            <div class="notif-content-gagal">
                <div class="icon-error">
                    <i class="bx bx-x"></i>
                </div>
                <h2>Gagal!</h2>
                <p id="kalimat-gagal">Menyimpan data gagal</p>
                <button onclick="closeNotifGagal()">OK</button>
            </div>
        </div>
        <!-- Pop Up End -->

        <!-- Pop up Hapus -->
        <div class="popup-overlay" id="popup-hapus">
            <div class="popup-box">
                <div class="popup-icon danger">
                    <i class="bx bx-error"></i>
                </div>
                <h2>Apakah kamu yakin?</h2>
                <p>Yakin ingin menghapus?</p>
                <div class="popup-actions">
                    <button class="btn-yes" id="confirm-btn">Ya, hapus</button>
                    <button class="btn-cancel" onclick="closePopup()">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
        <script src="/js/galery_pelanggan.js"></script>
        <script>
            // Fungsi untuk memuat semua data galeri
            function muatSemuaGaleri() {
                const container = document.querySelector(".products-conatiner");
                let html = "";

                fetch("/backend/galeri_pelanggan.php?ambil_data")
                    .then((res) => res.json())
                    .then((data) => {
                        if (data.status === "berhasil") {
                            data.data.forEach((item) => {
                                html += `
                                    <div class="box">
                                        <img src="${item.gambar}" class="product-image" />
                                        <h2 class="product-name">${item.nama_pt}</h2>
                                        <div class="description">
                                            <p class="description-text">
                                                <strong>Deskripsi Galeri:</strong>
                                            </p>
                                        </div>
                                        <p class="justify-text">${item.deskripsi_galeri}</p>
                                        <div class="btn-group">
                                            <button class="btn" onclick="openModal(${item.id_galeri})">Edit</button>
                                            <button class="btn btn-delete" onclick="konfirmasiHapus(${item.id_galeri})">Hapus</button>
                                        </div>
                                    </div>
                                `;
                            });
                            container.innerHTML = html;
                        } else {
                            showNotifGagal(data.message);
                        }
                    })
                    .catch((err) => {
                        showNotifGagal("Error: " + err);
                    });
            }

            // Fungsi tambah galeri
            function tambahGaleri(event) {
                event.preventDefault();

                const form = document.getElementById("form-galeri");
                const inputs = form.querySelectorAll(
                    "input[required], textarea[required]"
                );
                const data = new FormData(form);
                data.append("tambah_galeri", true);

                let valid = true;
                inputs.forEach((el) => {
                    if (el.value.trim() === "") valid = false;
                });

                if (valid) {
                    fetch("/backend/galeri_pelanggan.php", {
                        method: "POST",
                        body: data,
                    })
                        .then((res) => res.json())
                        .then((res) => {
                            if (res.code === 200) {
                                showNotifBerhasil(
                                    "Galeri berhasil ditambahkan"
                                );
                                closeModal();
                                muatSemuaGaleri();
                            } else {
                                showNotifGagal(res.data);
                            }
                        })
                        .catch((err) => showNotifGagal(err));
                } else {
                    showNotifGagal("Mohon isi semua kolom");
                }
            }

            // Fungsi simpan perubahan galeri
            function simpanPerubahanGaleri(event, idGaleri) {
                event.preventDefault();

                const form = document.getElementById("form-galeri");
                const inputs = form.querySelectorAll(
                    "input[required], textarea[required]"
                );
                const data = new FormData(form);
                data.append("edit_galeri", true);
                data.append("id_galeri", idGaleri);

                let valid = true;
                inputs.forEach((el) => {
                    if (el.value.trim() === "") valid = false;
                });

                if (valid) {
                    fetch("/backend/galeri_pelanggan.php", {
                        method: "POST",
                        body: data,
                    })
                        .then((res) => res.json())
                        .then((res) => {
                            if (res.code === 200) {
                                showNotifBerhasil("Galeri berhasil diperbarui");
                                closeModal();
                                muatSemuaGaleri();
                            } else {
                                showNotifGagal(res.data);
                            }
                        })
                        .catch((err) => showNotifGagal(err));
                } else {
                    showNotifGagal("Mohon isi semua kolom");
                }
            }

            // Fungsi hapus galeri
            function hapusGaleri(idGaleri) {
                fetch("/backend/galeri_pelanggan.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        hapus_galeri: true,
                        id_galeri: idGaleri,
                    }),
                })
                    .then((res) => res.json())
                    .then((res) => {
                        if (res.code === 200) {
                            closePopup();
                            showNotifBerhasil("Galeri berhasil dihapus");
                            muatSemuaGaleri();
                        } else {
                            showNotifGagal(res.data);
                        }
                    })
                    .catch((err) => {
                        closePopup();
                        showNotifGagal(err);
                    });
            }

            // Jalankan saat halaman siap
            muatSemuaGaleri();
        </script>
    </body>
</html>
