<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// import
require "connection.php";
require "generate_api.php";

// Ambil semua galeri
if (isset($_GET['ambil_data'])) {
    $sql = "SELECT * FROM galeri_pelanggan ORDER BY id_galeri DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rows = [];

    if (empty($result)) {
        echo json_encode(generateApi("gagal", 200, "Data tidak tersedia", []));
    } else {
        // while ($row = $result->fetch_assoc()) {
        //     $row['gambar'] = "/uploads/galeri/" . $row['gambar'];
        //     $rows[] = $row;
        // }

        // echo json_encode(["status" => "berhasil", "data" => $rows]);
        echo json_encode(generateApi("berhasil", 200, "Data tersedia", $result));
    }
    exit();
}

// Tangani POST atau JSON
$method = $_SERVER['REQUEST_METHOD'];
if ($method === "POST") {
    // JSON body
    $json = json_decode(file_get_contents("php://input"), true);
    

    // ================= HAPUS GALERI =================
    if (isset($json['hapus_galeri'])) {
        $id = (int) $json['id_galeri'];

        // Ambil nama gambar untuk dihapus dari folder
        $img = $conn->query("SELECT gambar FROM galeri_pelanggan WHERE id_galeri=$id")->fetch_assoc();
        if ($img && file_exists("../../uploads/galeri/" . $img['gambar'])) {
            unlink("../../uploads/galeri/" . $img['gambar']);
        }

        $conn->query("DELETE FROM galeri_pelanggan WHERE id_galeri=$id");
        response(200, "Data berhasil dihapus");
    }

    // ================= TAMBAH GALERI =================
    if (isset($_POST['tambah_galeri'])) {
        $id_galeri = $_POST['id_galeri'];
        $nama_pt = $_POST['nama_pt'];
        $deskripsi = $_POST['deskripsi_galeri'];
        $id_admin = $_POST['id_admin'];

        // Upload gambar
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
            $img_name = uniqid() . "_" . $_FILES['gambar']['name'];
            $target_path = "../../uploads/galeri/" . $img_name;
            move_uploaded_file($_FILES['gambar']['tmp_name'], $target_path);
        } else {
            response(400, "Gambar wajib diunggah");
        }

        $stmt = $conn->prepare("INSERT INTO galeri_pelanggan (id_admin, nama_pt, gambar, deskripsi_galeri) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $id_admin, $nama_pt, $img_name, $deskripsi);
        $stmt->execute();

        response(200, "Data berhasil ditambahkan");
    }

    // ================= EDIT GALERI =================
    if (isset($_POST['edit_galeri'])) {
        $id = $_POST['id_galeri'];
        $nama_pt = $_POST['nama_pt'];
        $deskripsi = $_POST['deskripsi_galeri'];
        $id_admin = $_POST['id_admin'];

        // Cek jika ada file baru
        $gambar = "";
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
            // Ambil gambar lama
            $old = $conn->query("SELECT gambar FROM galeri_pelanggan WHERE id_galeri=$id")->fetch_assoc();
            if ($old && file_exists("../../uploads/galeri/" . $old['gambar'])) {
                unlink("../../uploads/galeri/" . $old['gambar']);
            }

            $gambar = uniqid() . "_" . $_FILES['gambar']['name'];
            move_uploaded_file($_FILES['gambar']['tmp_name'], "../../uploads/galeri/" . $gambar);

            $sql = "UPDATE galeri_pelanggan SET id_admin=?, nama_pt=?, gambar=?, deskripsi_galeri=? WHERE id_galeri=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isssi", $id_admin, $nama_pt, $gambar, $deskripsi, $id);
        } else {
            $sql = "UPDATE galeri_pelanggan SET id_admin=?, nama_pt=?, deskripsi_galeri=? WHERE id_galeri=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issi", $id_admin, $nama_pt, $deskripsi, $id);
        }

        $stmt->execute();
        response(200, "Data berhasil diperbarui");
    }
}

// Method tidak didukung
// http_response_code(405);
// response(405, "Metode tidak didukung");
