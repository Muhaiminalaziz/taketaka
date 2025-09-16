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
        <title>Update barang</title>
        <link rel="icon" type="image/x-icon" href="/asset/favicon.ico" />
        <link rel="stylesheet" href="/Css/update_barang.css" />
        <!--Box Icons-->
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
        <!-- Google Icon -->
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
                    <a href="/html/admin.html">
                        <i class="bx bxs-dashboard"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class="active">
                    <a href="/html/upadate_barang.html">
                        <i class="bx bx-cart-alt"></i>
                        <span class="text">Update Barang & Katalog</span>
                    </a>
                </li>
                <li>
                    <a href="/html/galery_pelanggan.html">
                        <i class="bx bx-image"></i>
                        <span class="text">Galeri Pelanggan</span>
                    </a>
                </li>
                <li>
                    <a href="/html/sosmed.html">
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
                            <button id="closePopup" class="close-btn">×</button>
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
                            <a href="/html/account.html" class="btn-link">
                                <i class="bx bx-user-plus"></i> Kelola Pengguna
                            </a>
                            <a href="/html/login.html" class="btn-link">
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
                    <h1>Produk & Katalog</h1>
                    <br />
                </div>
                <div class="Kapsul">
                    <button class="btn" onclick="openModal()">All</button>
                    <button class="btn" onclick="openModal()">
                        General Tranding
                    </button>
                    <button class="btn" onclick="openModal()">
                        Pagar & Kanopy
                    </button>
                    <button class="btn" onclick="openModal()">Pabrikasi</button>
                    <button class="btn" onclick="openModal()">Jasa</button>
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
                            <p class="description-text">
                                <strong>Product Description:</strong>
                            </p>
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
                            <!-- Kategori Barang -->
                            <label for="kategori">Kategori Barang</label>
                            <div class="input-icon">
                                <i class="bx bxs-store"></i>
                                <input
                                    list="kategori-list"
                                    id="kategori"
                                    name="kategori"
                                    placeholder="Pilih kategori"
                                    required
                                />
                            </div>

                            <datalist id="kategori-list">
                                <select>
                                    <option value="General Trading"></option>
                                    <option value="Pagar & Kanopy"></option>
                                    <option value="Pabrikasi"></option>
                                    <option value="Jasa"></option>
                                </select>
                            </datalist>
                            <!-- Kategori End -->
                            <label for="nama">Nama Barang</label>
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

                            <label for="tokopedia">Link Tokopedia</label>
                            <div class="input-icon">
                                <i class="bx bx-link"></i>
                                <input
                                    type="url"
                                    id="tokopedia"
                                    name="tokopedia"
                                    placeholder="Masukan link..."
                                    pattern="https?://.+"
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
        <script src="/js/update_barang.js"></script>
        <script>
            // Fungsi untuk meminta data
            function muatSemuaDataProduk() {
                // Variable
                let productContainer = document.querySelector(
                    ".products-conatiner"
                );
                let productList = "";

                // Request data menggunakan XMLHTTPRequest
                let xhr = new XMLHttpRequest();

                // panggil API
                xhr.open(
                    "GET",
                    "/backend/kelola_barang.php?request_product",
                    true
                );

                // Atur Request Header menjadi JSON
                xhr.setRequestHeader("Content-Type", "application/json");

                // Kirim permintaan
                xhr.send();

                // Muat hasil permintaan
                xhr.onload = function () {
                    // Jika berhasil terhubung
                    if (xhr.status === 200) {
                        try {
                            // Konversi respon menjadi JSON
                            let respon = JSON.parse(xhr.responseText);

                            // Jika status berhasil
                            if (respon.status === "berhasil") {
                                // console.log(respon.data);
                                // Proses datanya dan masukan ke dalam HTML
                                respon.data.forEach((produk) => {
                                    productList += `
                                        <div class="box">
                                            <img
                                                src="${produk.gambar_produk}"
                                                alt=""
                                                class="product-image"
                                            />
                                            <h2 class="product-name">${produk.nama_produk}</h2>
                                            <div class="description">
                                                <p class="description-text">
                                                    <strong>Product Description:</strong>
                                                </p>
                                            </div>
                                            <p class="justify-text">
                                                ${produk.deskripsi_produk}
                                            </p>
                                            <div class="btn-group">
                                                <button class="btn" onclick="openModal(${produk.id_produk})">
                                                    Edit
                                                </button>
                                                <button class="btn btn-delete" class="btn btn-delete" onclick="konfirmasiHapus(${produk.id_produk})">
                                                    Hapus
                                                </button>
                                            </div>
                                        </div>
                                    `;

                                    // Masukan hasilnya ke HTML
                                    productContainer.innerHTML = productList;
                                });
                            } else {
                                // Jika status gagal
                                console.error(respon.message);
                            }
                        } catch (error) {
                            console.error(error);
                        }
                    }
                };
            }

            // Fungsi tambah produk
            function tambahProduk(event) {
                event.preventDefault();

                const formEditBarang = document.getElementById("edit-barang");
                const kolomInput = formEditBarang.querySelectorAll(
                    "input[required], textarea[required]"
                );
                const editBarang = new FormData(formEditBarang);
                editBarang.append("tambah_produk", true);

                let valid = true;
                kolomInput.forEach((kolom) => {
                    if (kolom.value === "") {
                        valid = false;
                    }
                });

                if (valid) {
                    fetch("/backend/kelola_barang.php", {
                        method: "POST",
                        body: editBarang,
                    })
                        .then((respon) => {
                            if (!respon.ok) {
                                throw new Error(
                                    "Terjadi kesalahan menghubungkan ke server"
                                );
                            }
                            return respon.json();
                        })
                        .then((data) => {
                            if (data.code === 200) {
                                showNotifBerhasil(
                                    "Produk baru berhasil ditambah"
                                );
                                closeModal();
                                muatSemuaDataProduk();
                            } else {
                                showNotifGagal(
                                    "Terjadi kesalahan: " + data.data
                                );
                            }
                        })
                        .catch((error) => {
                            showNotifGagal(error);
                        });
                } else {
                    showNotifGagal("Mohon isi semua kolom");
                }
            }

            // Fungsi simpan perubahan
            function simpanPerubahan(event, idProduk) {
                event.preventDefault();

                const formEditBarang = document.getElementById("edit-barang");
                const kolomInput = formEditBarang.querySelectorAll(
                    "input[required], textarea[required]"
                );
                const editBarang = new FormData(formEditBarang);
                editBarang.append("edit_produk", true);
                editBarang.append("id_produk", idProduk);

                let valid = true;
                kolomInput.forEach((kolom) => {
                    if (kolom.value === "") {
                        valid = false;
                    }
                });

                if (valid) {
                    fetch("/backend/kelola_barang.php", {
                        method: "POST",
                        body: editBarang,
                    })
                        .then((respon) => {
                            if (!respon.ok) {
                                throw new Error(
                                    "Terjadi kesalahan menghubungkan ke server"
                                );
                            }
                            return respon.json();
                        })
                        .then((data) => {
                            if (data.code === 200) {
                                showNotifBerhasil("Data berhasil diubah");
                                closeModal();
                                muatSemuaDataProduk();
                            } else {
                                showNotifGagal(
                                    "Terjadi kesalahan: " + data.data
                                );
                            }
                        })
                        .catch((error) => {
                            showNotifGagal(error);
                        });
                } else {
                    showNotifGagal("Mohon isi semua kolom");
                }
            }

            // Fungsi hapus produk
            function hapusProduk(idProduk) {
                fetch("/backend/kelola_barang.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        hapus_produk: true,
                        id_produk: idProduk,
                    }),
                })
                    .then((respon) => {
                        if (!respon.ok) {
                            throw new Error(
                                "Terjadi kesalahan menghubungkan ke server"
                            );
                        }

                        return respon.json();
                    })
                    .then((data) => {
                        if (data.code === 200) {
                            closePopup();
                            showNotifBerhasil("Produk berhasil dihapus");
                            muatSemuaDataProduk();
                        } else {
                            showNotifGagal("Terjadi kesalahan: " + data.data);
                        }
                    })
                    .catch((error) => {
                        closePopup();
                        showNotifGagal(error);
                    });
            }
            // Jalankan fungsi ketika halaman dibuat
            muatSemuaDataProduk();
        </script>
    </body>
</html>
