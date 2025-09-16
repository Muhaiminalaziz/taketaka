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
        <title>Admin</title>
        <link rel="icon" type="image/x-icon" href="/asset/favicon.ico" />
        <link rel="stylesheet" href="/Css/admin.css" />
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
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
                <li class="active">
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

            <!-- MAIN -->
            <main>
                <div class="head-title">
                    <div class="left">
                        <h1>Dashboard</h1>
                        <ul class="breadcrumb">
                            <li>
                                <a class="active" href="#">Dashboard</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i></li>
                            <li>
                                <a href="#">Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="box-info">
                    <li>
                        <i class="bx bxs-component"></i>
                        <span class="text">
                            <h3>General Tranding</h3>
                        </span>
                    </li>
                    <li>
                        <i class="bx bxs-group"></i>
                        <span class="text">
                            <h3>Pagar & Kanopy</h3>
                        </span>
                    </li>
                    <li>
                        <i class="bx bx-calendar-check"></i>
                        <span class="text">
                            <h3>Pabrikasi</h3>
                        </span>
                    </li>
                    <li>
                        <i class="bx bx-calendar-check"></i>
                        <span class="text">
                            <h3>Jasa</h3>
                        </span>
                    </li>
                </ul>
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>General Trading</h3>
                            <div class="tools">
                                <div class="search-box">
                                    <input
                                        type="text"
                                        id="searchInput"
                                        placeholder="Cari..."
                                    />
                                    <i class="bx bx-search" id="searchIcon"></i>
                                </div>
                                <i class="bx bx-filter" id="filterIcon"></i>
                            </div>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Link</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="/asset/conveyor.jpg" alt="" />
                                        <p>Koveyor</p>
                                    </td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>
                                        Komveyor ini memiliki berbagai jenis dan
                                        <br />masing-masing memilki kelebihan
                                        nya
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/asset/conveyor.jpg" alt="" />
                                        <p>Koveyor</p>
                                    </td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>
                                        Komveyor ini memiliki berbagai jenis dan
                                        <br />masing-masing memilki kelebihan
                                        nya
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/asset/conveyor.jpg" alt="" />
                                        <p>Koveyor</p>
                                    </td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>
                                        Komveyor ini memiliki berbagai jenis dan
                                        <br />masing-masing memilki kelebihan
                                        nya
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="/asset/conveyor.jpg" alt="" />
                                        <p>Koveyor</p>
                                    </td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td>
                                        Komveyor ini memiliki berbagai jenis dan
                                        <br />masing-masing memilki kelebihan
                                        nya
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
            <!-- MAIN -->
        </section>
        <script src="/js/admin.js"></script>
    </body>
</html>
