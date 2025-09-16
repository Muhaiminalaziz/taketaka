<?php
session_start();
if (isset($_SESSION["id_admin"])) {
    header("Location: /html/admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>
        <link rel="icon" type="image/x-icon" href="/asset/favicon.ico" />
        <link rel="stylesheet" href="/Css/login.css" />
        <link
            rel="stylesheet"
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        />
    </head>
    <body>
        <div class="login-wrapper">
            <div class="login-box">
                <div class="top-header">
                    <img src="/asset/taketaka.png" alt="Logo" class="logo" />
                    <div class="top-header">
                        <header>CV TAKETAKA</header>
                        <div class="alert-error" id="alertError">
                            <span>Password Salah</span>
                            <button onclick="closeAlert()" class="close-btn">
                                &times;
                            </button>
                        </div>
                    </div>
                    <form
                        method="post"
                        name="loginForm"
                        id="loginForm"
                        class="login-form"
                    >
                        <div class="input-field">
                            <input
                                type="text"
                                class="input"
                                name="email"
                                placeholder="Id user"
                                required
                            />
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-field">
                            <input
                                type="password"
                                class="input"
                                name="password"
                                placeholder="Password"
                                required
                            />
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <input type="submit" class="submit" value="Login" />
                    </form>
                </div>
            </div>
        </div>
        <!-- Pop Up Nontifikasi Berhasil -->
        <div class="popup-notif" id="popupNotif">
            <div class="notif-content">
                <div class="icon-success">
                    <i class="bx bx-check"></i>
                </div>
                <h2>Berhasil!</h2>
                <p id="kalimat-berhasil">Berhasil Masuk</p>
                <button onclick="closeNotif()">OK</button>
            </div>
        </div>
        <script src="/js/login.js"></script>
        <script>
            document
                .getElementById("loginForm")
                .addEventListener("submit", async function (e) {
                    e.preventDefault();
                    const formData = new FormData(this);

                    const response = await fetch("/backend/login.php", {
                        method: "POST",
                        body: formData,
                    });

                    const result = await response.json();
                    // document.getElementById("pesan").textContent =
                    //     result.message;

                    console.log(result.message);

                    if (result.status === "sukses") {
                        // Redirect ke dashboard atau halaman lain
                        window.location.href = "/html/admin.php";
                    }
                });
        </script>
    </body>
</html>
