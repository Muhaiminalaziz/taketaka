<?php
session_start();
require 'connection.php';
require 'generate_api.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM `admin` WHERE email = ?");
    $stmt->execute([$email]);
    $admin = $stmt->fetch();

    if (!$admin || !password_verify($password, $admin['password'])) {
        http_response_code(403);
        echo json_encode(generateApi("gagal", 403, $email, []));
        exit;
    }

    // Simpan session
    $_SESSION['id_admin'] = $admin['id_admin'];
    $_SESSION['nama'] = $admin['nama'];
    $_SESSION['email'] = $admin['email'];

    // Buat token dan simpan di cookie (misalnya token random hash)
    $token = bin2hex(random_bytes(32));
    setcookie("admin_token", $token, time() + (86400 * 7), "/"); // 7 hari

    // Simpan token ke database (opsional)
    $pdo->prepare("UPDATE admin SET sesi = ? WHERE id_admin = ?")->execute([$token, $admin['id_admin']]);

    echo json_encode(generateApi("sukses", 200, "Login berhasil", [
        "nama" => $admin['nama'],
        "email" => $admin['email']
    ]));
}
