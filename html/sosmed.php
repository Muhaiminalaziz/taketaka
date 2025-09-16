<?php
    session_start();
    if (!isset($_SESSION["id_admin"])) {
        header("Location: /html/login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sosial Media</title>
        <link rel="icon" type="image/x-icon" href="/asset/favicon.ico" />
        <link rel="stylesheet" href="/Css/sosmed.css" />
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
                    <a href="/html/admin.html">
                        <i class="bx bxs-dashboard"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
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
                <li class="active">
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
            <!-- <ul class="side-menu">
                <li>
                    <a href="#" class="logout">
                        <i class="bx bxs-log-out-circle"></i>
                        <span class="text">Keluar</span>
                    </a>
                </li>
            </ul> -->
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
                            <button class="close-btn" id="close-popup">
                                ×
                            </button>
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
                    <h1>Sosial Media</h1>
                    <br />
                </div>

                <!-- Product Content -->
                <div class="products-conatiner">
                    <!-- Box 1 -->
                    <div class="box" id="sosmed-items">
                        <div class="sosmed-item">
                            <i class="bx bxl-instagram-alt sosmed-icon"></i>
                            <div class="sosmed-info">
                                <strong>Abu Gosok</strong>
                                <p>Abu https://www.facebook.com/</p>
                            </div>
                            <div class="btn-group">
                                <button class="edit" onclick="openModal()">
                                    <i class="bx bx-edit-alt"></i>
                                </button>
                                <button
                                    class="delete"
                                    onclick="konfirmasiHapus()"
                                >
                                    <i class="bx bx-trash"></i>
                                </button>
                            </div>
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
            <div class="modal-content">
                <h3>Update Link Sosmed</h3>
                <span class="close" onclick="closeModal()"> &times;</span>
                <div class="modal-body">
                    <div class="form-container">
                        <form action="#" method="post" id="edit-sosmed">
                            <!-- Nama sosmed -->
                            <label for="nama">Nama</label>
                            <div class="input-icon">
                                <i class="bx bxs-user"></i>
                                <input
                                    type="text"
                                    id="nama_sosmed"
                                    name="nama_sosmed"
                                    placeholder="Instagram, Facebook, etc"
                                    required
                                />
                            </div>
                            <!-- Link sosmed -->
                            <label for="nama">Link</label>
                            <div class="input-icon">
                                <i class="bx bx-link-alt"></i>
                                <input
                                    type="text"
                                    id="link_sosmed"
                                    name="link_sosmed"
                                    placeholder="https://instagram.com/"
                                    required
                                />
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
                        </form>
                        <!-- Pop Up Nontifikasi Berhasil -->
                        <div class="popup-notif" id="popupNotif">
                            <div class="notif-content">
                                <div class="icon-success">
                                    <i class="bx bx-check"></i>
                                </div>
                                <h2>Berhasil!</h2>
                                <p>Data berhasil di simpan</p>
                                <button onclick="closeNotif()">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pop Up End -->

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
                    <button class="btn-cancel" onclick="tutupPopup()">
                        Cancel
                    </button>
                </div>
            </div>
        </div>

        <script src="/js/sosmed.js"></script>
        <script>
            // Tambah sosmed
            function tambahSosmed(event) {
                event.preventDefault();

                const formSosmed = document.getElementById("edit-sosmed");
                const dataSosmed = new FormData(formSosmed);
                dataSosmed.append("tambah_sosmed", "");
                fetch("/backend/sosmed.php", {
                    method: "POST",
                    body: dataSosmed,
                })
                    .then(async (respon) => {
                        const data = await respon.json();

                        if (!respon.ok) {
                            alert(data.message);

                            // Lempar error agar proses dibawah tidak dijalankan
                            throw new Error(
                                data.message || "Terjadi Kesalahan"
                            );
                        }
                        return data;
                    })
                    .then((data) => {
                        requestSosmed();
                        alert(data.message);
                        closeModal();
                    })
                    .catch((error) => {
                        console.error("Request gagal: ", error);
                    });
            }

            // Edit Sosmed
            function editSosmed(event, idSosmed) {
                event.preventDefault();

                const formSosmed = document.getElementById("edit-sosmed");
                const dataSosmed = new FormData(formSosmed);
                dataSosmed.append("edit_sosmed", "");
                dataSosmed.append("id_sosmed", idSosmed);
                fetch("/backend/sosmed.php", {
                    method: "POST",
                    body: dataSosmed,
                })
                    .then(async (respon) => {
                        const data = await respon.json();
                        if (!respon.ok) {
                            alert(data.message);

                            // Lempar error agar proses dibawah tidak dijalankan
                            throw new Error(
                                data.message || "Terjadi Kesalahan"
                            );
                        }
                        return data;
                    })
                    .then((data) => {
                        requestSosmed();
                        alert(data.message);
                        closeModal();
                    })
                    .catch((error) => {
                        console.error("Request gagal: ", error);
                    });
            }

            // Request data sosmed
            function requestSosmed(idSosmed) {
                // Cek apakah id sosmed diperlukan
                let url = idSosmed
                    ? "/backend/sosmed.php?id_sosmed=" + idSosmed
                    : "/backend/sosmed.php";

                fetch(url, {
                    method: "GET",
                    headers: {
                        "Content-Type": "application/json", // Sets the Content-Type header
                    },
                })
                    .then(async (respon) => {
                        const data = await respon.json();
                        if (!respon.ok) {
                            alert(data.message);

                            // Lempar error agar proses dibawah tidak dijalankan
                            throw new Error(
                                data.message || "Terjadi Kesalahan"
                            );
                        }
                        return data;
                    })
                    .then((data) => {
                        if (idSosmed) {
                            //
                        } else {
                            listSosmed(data.data);
                        }
                    })
                    .catch((error) => {
                        console.error("Request gagal: ", error);
                    });
            }

            // Tampilkan list sosmed
            function listSosmed(listData) {
                let sosmedAbu = "";
                const sosmedItems = document.getElementById("sosmed-items");

                listData.forEach((sosmed) => {
                    sosmedAbu += `
                        <div class="sosmed-item">
                            <i class="bx bxl-instagram-alt sosmed-icon"></i>
                            <div class="sosmed-info">
                                <strong>${sosmed.nama_sosmed}</strong>
                                <p>${sosmed.link_sosmed}</p>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="edit" onclick="openModal(${sosmed.id_sosmed})">
                                    <i class="bx bx-edit-alt"></i>
                                </button>
                                <button
                                    class="delete"
                                    type="button"
                                    onclick="konfirmasiHapus(${sosmed.id_sosmed})"
                                >
                                    <i class="bx bx-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                });

                sosmedItems.innerHTML = sosmedAbu;
            }

            requestSosmed();
        </script>
    </body>
</html>
