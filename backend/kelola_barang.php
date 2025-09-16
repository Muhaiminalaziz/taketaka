<?php
require "connection.php";
require "generate_api.php";
session_start();

// Request GET
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Minta data produk
    if (isset($_GET["request_product"])) {
        try {
            // Jika request produk yang spesifik
            $query = null;
            $stmt = null;

            if (isset($_GET["id_produk"])) {
                $id_produk = htmlspecialchars($_GET["id_produk"]);
                
                // Query SQL
                $query = "SELECT * FROM produk WHERE id_produk = :id_produk";

                // Siapkan query SQL menggunakan prepare
                $stmt = $pdo->prepare($query);

                // Hubungkan variable dengan placeholder
                $stmt->bindParam(":id_produk", $id_produk);

                // Eksekusi query sql nya
                $stmt->execute();

                // Ambil hasil query
                $data_produk = $stmt->fetch();
            } else if (isset($_GET["jenis_produk"])) {
                $jenisProduk = htmlspecialchars($_GET["jenis_produk"]);

                // Query SQL
                $query = "SELECT * FROM produk WHERE jenis_produk = :jenisProduk";

                // Siapkan query SQL menggunakan prepare
                $stmt = $pdo->prepare($query);

                // Eksekusi query sql nya
                $stmt->execute(["jenisProduk" => $jenisProduk]);

                // Ambil hasil query
                $data_produk = $stmt->fetchAll();
            } else {
                // Query SQL
                $query = "SELECT * FROM produk";

                // Siapkan query SQL menggunakan prepare
                $stmt = $pdo->prepare($query);

                // Eksekusi query sql nya
                $stmt->execute();
                
                // Ambil hasil query
                $data_produk = $stmt->fetchAll();
            }

            // Cek apakah produknya ada atau tidak
            // tampilkan hasilnya menjadi API
            if (empty($data_produk)) {
                // Jika produk tidak tersedia
                echo json_encode(generateApi("gagal", 404, "Data tidak ditemukan", []));
            } else {
                // Jika produk tersedia
                 echo json_encode(generateApi("berhasil", 200, "Data berhasil ditemukan", $data_produk));
            }
        } catch (\Throwable $th) {
            echo json_encode(generateApi("kesalahan", 500, "Terjadi kesalahan", $th));
        }
    } else {
        http_response_code(400);
        echo json_encode(generateApi("error", 400, "Bad Request", []));
    }
}

// Request POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dataJSON = json_decode(file_get_contents("php://input"), true);

    // Kirim data perubahan
    if (isset($_POST["edit_produk"]) && isset($_POST["id_produk"])) {
        try {
            $idProduk = htmlspecialchars($_POST["id_produk"]);
            $kategori = htmlspecialchars($_POST["kategori"]);
            $nama = htmlspecialchars($_POST["nama"]);
            $link = htmlspecialchars($_POST["tokopedia"]);
            $deskripsi = htmlspecialchars($_POST["deskripsi"]);

            //  Query SQL
            $sql = "UPDATE produk SET id_admin = :idAdmin, nama_produk = :nama, jenis_produk = :kategori, deskripsi_produk = :deskripsi, link_produk = :link WHERE id_produk = :idProduk";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "idAdmin" => $_SESSION["id_admin"],
                "nama" => $nama,
                "kategori" => $kategori,
                "deskripsi" => $deskripsi,
                "link" => $link,
                "idProduk" => $idProduk
            ]);

            // Kirim respon
            echo json_encode(generateApi("berhasil", 200, "Produk berhasil diubah", []));
        } catch (\Throwable $th) {
            echo json_encode(generateApi("gagal", 404, "Terjadi kesalahan", print_r($th)));
        }
    }

    // Kirim data produk baru
    if (isset($_POST["tambah_produk"])) {
        try {
            $kategori = htmlspecialchars($_POST["kategori"]);
            $nama = htmlspecialchars($_POST["nama"]);
            $link = htmlspecialchars($_POST["tokopedia"]);
            $gambar = "link-gambar";
            $deskripsi = htmlspecialchars($_POST["deskripsi"]);

            //  Query SQL
            $sql = "INSERT INTO produk (`id_produk`, `id_admin`, `nama_produk`, `jenis_produk`, `deskripsi_produk`, `gambar_produk`, `link_produk`) VALUES (NULL, :idAdmin, :nama, :kategori, :deskripsi, :gambar, :link)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "idAdmin" => $_SESSION["id_admin"],
                "nama" => $nama,
                "kategori" => $kategori,
                "deskripsi" => $deskripsi,
                "gambar" => $gambar,
                "link" => $link
            ]);

            // Kirim respon
            echo json_encode(generateApi("berhasil", 200, "Produk berhasil ditambah", []));
        } catch (\Throwable $th) {
            echo json_encode(generateApi("gagal", 404, "Terjadi kesalahan", strval($th)));
        }
    }

    // Hapus produk
    if (isset($dataJSON["hapus_produk"])) {
        try {
            $idProduk = htmlspecialchars($dataJSON["id_produk"]);
            
            //  Query SQL
            $sql = "DELETE FROM produk WHERE id_produk = :idProduk";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                "idProduk" => $idProduk
            ]);
            
            // Kirim respon
            echo json_encode(generateApi("berhasil", 200, "Produk berhasil dihapus", []));
        } catch (\Throwable $th) {
            echo json_encode(generateApi("gagal", 404, "Terjadi kesalahan", strval($th)));
        }
    }
}
?>