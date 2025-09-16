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
        <title>Kelola Account</title>
        <link rel="icon" type="image/x-icon" href="/asset/favicon.ico" />
        <link rel="stylesheet" href="/Css/account.css" />
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
        <section id="sidebar">
            <a href="#" class="brand">
                <i class="bx bxs-smile"></i>
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
                <li>
                    <a href="/html/galery_pelanggan.php">
                        <i class="bx bx-image"></i>
                        <span class="text">Galeri Pelanggan</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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
                <a href="/html/kelola_account.php" class="profile">
                    <img src="/asset/taketaka.png" />
                </a>
                </div>
            </nav>
            <!-- NABVAR -->
            <!-- Popup Modal -->
            <div id="productModal" class="modal">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-image">
                            <label for="gambar">Upload Profile</label>
                            <div class="upload-box">
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
                            <form action="#" method="post">
                                <!-- Nama Pengguna -->
                                <label for="nama">Nama Pengguna</label>
                                <div class="input-icon">
                                    <i class="bx bxs-user"></i>
                                    <input
                                        type="text"
                                        id="nama"
                                        name="nama"
                                        placeholder="barang..."
                                        required
                                    />
                                </div>

                                <!-- Kata Sandi -->
                                <label for="password">Kata Sandi</label>
                                <div class="input-split">
                                    <div class="input-icon">
                                        <i class="bx bxs-lock"></i>
                                        <input
                                            type="password"
                                            id="password1"
                                            name="password1"
                                            placeholder="Masukan kata sandi..."
                                            required
                                        />
                                    </div>
                                    <div class="input-icon">
                                        <input
                                            type="password"
                                            id="password2"
                                            name="password2"
                                            placeholder="Ulangi kata sandi..."
                                            required
                                        />
                                    </div>
                                </div>

                                <div class="show-password">
                                    <input type="checkbox" id="showPassword" />
                                    <label for="showPassword"
                                        >Tampilkan Sandi</label
                                    >
                                </div>
                                <div class="btn-group">
                                    <button class="btn">Buat</button>
                                    <button class="btn btn-delete">
                                        Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pop Up End -->
        </section>
        <script src="/js/account.js"></script>
    </body>
</html>
