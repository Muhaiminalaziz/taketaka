<?php
session_start();
require "connection.php";
require "generate_api.php";

// Request POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dataJSON = json_decode(file_get_contents("php://input"), true);
    
    if (isset($_SESSION["id_admin"])) {
        $id_admin = $_SESSION["id_admin"];
        // Edit Sosial Media
        if (isset($_POST["edit_sosmed"]) && isset($_POST["id_sosmed"])) {
            try {
                $idSosmed = htmlspecialchars($_POST["id_sosmed"]);
                $nama = htmlspecialchars($_POST["nama_sosmed"]);
                $link = htmlspecialchars($_POST["link_sosmed"]);
    
                $sql = "UPDATE sosmed SET id_admin = :idAdmin, nama_sosmed = :nama, link_sosmed = :link WHERE id_sosmed = :idSosmed";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    "nama" => $nama,
                    "link" => $link,
                    "idSosmed" => $idSosmed,
                    "idAdmin" => $id_admin
                ]);
    
                header("HTTP/1.1 200 OK");
                echo json_encode(generateApi("berhasil", 200, "Sosmed berhasil diubah", []));
            } catch (\Throwable $th) {
                header("HTTP/1.1 500 Internal Server Error");
                echo json_encode(generateApi("gagal", 500, "Terjadi kesalahan saat edit", strval($th)));
            }
        }
    
        // Tambah Sosial Media
        if (isset($_POST["tambah_sosmed"])) {
            try {
                $nama = htmlspecialchars($_POST["nama_sosmed"]);
                $link = htmlspecialchars($_POST["link_sosmed"]);
    
                $sql = "INSERT INTO sosmed (id_sosmed, id_admin, nama_sosmed, link_sosmed) VALUES (NULL, :idAdmin, :nama, :link)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    "idAdmin" => $id_admin,
                    "nama" => $nama,
                    "link" => $link
                ]);
    
                header("HTTP/1.1 200 OK");
                echo json_encode(generateApi("berhasil", 200, "Sosmed berhasil ditambah", []));
            } catch (\Throwable $th) {
                header("HTTP/1.1 500 Internal Server Error");
                echo json_encode(generateApi("gagal", 500, "Terjadi kesalahan saat tambah", strval($th)));
            }
        }
    
        // Hapus Sosial Media
        if (isset($dataJSON["hapus_sosmed"]) && isset($dataJSON["id_sosmed"])) {
            try {
                $idSosmed = htmlspecialchars($dataJSON["id_sosmed"]);
    
                $sql = "DELETE FROM sosmed WHERE id_sosmed = :idSosmed AND id_admin = :idAdmin";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    "idSosmed" => $idSosmed,
                    "idAdmin" => $id_admin
                ]);
    
                echo json_encode(generateApi("berhasil", 200, "Sosmed berhasil dihapus", []));
            } catch (\Throwable $th) {
                echo json_encode(generateApi("gagal", 500, "Terjadi kesalahan saat hapus", strval($th)));
            }
        }
        
    } else {
        header("HTTP/1.1 403 Forbidden");
        echo json_encode(generateApi("error", 403, "Anda tidak memiliki akses", []));
    }
    

} else {

    if (isset($_SESSION["id_admin"])) {
        $id_admin = $_SESSION["id_admin"];
        try {
            $query = null;
            $stmt = null;
            
            // Jika request yang spesifik
            if (isset($_GET["id_sosmed"])) {
                $id_sosmed = htmlspecialchars($_GET["id_sosmed"]);
                    
                // Query SQL
                $query = "SELECT * FROM sosmed WHERE id_sosmed = :id_sosmed";
    
                // Siapkan query SQL menggunakan prepare
                $stmt = $pdo->prepare($query);
    
                // Hubungkan variable dengan placeholder
                $stmt->bindParam(":id_sosmed", $id_sosmed);
    
                // Eksekusi query sql nya
                $stmt->execute();
    
                // Ambil hasil query
                $data_sosmed = $stmt->fetch();
            } else {
                // Query SQL
                $query = "SELECT * FROM sosmed";
    
                // Siapkan query SQL menggunakan prepare
                $stmt = $pdo->prepare($query);
    
                // Eksekusi query sql nya
                $stmt->execute();
                    
                // Ambil hasil query
                $data_sosmed = $stmt->fetchAll();
            }
    
            // Cek apakah produknya ada atau tidak
            // tampilkan hasilnya menjadi API
            if (empty($data_sosmed)) {
                // Jika produk tidak tersedia
                header("HTTP/1.1 404 Not Found");
                echo json_encode(generateApi("gagal", 404, "Data tidak ditemukan", []));
            } else {
                // Jika produk tersedia
                header("HTTP/1.1 200 OK");
                echo json_encode(generateApi("berhasil", 200, "Data berhasil ditemukan", $data_sosmed));
            }
        } catch (\Throwable $th) {
            echo json_encode(generateApi("gagal", 500, "Terjadi kesalahan", strval($th)));
        }
    } else {
        header("HTTP/1.1 403 Forbidden");
        echo json_encode(generateApi("error", 403, "Anda tidak memiliki akses", []));
    }
}
?>
