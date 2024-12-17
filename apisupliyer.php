<?php
// Koneksi ke database
$host = "localhost"; // atau 127.0.0.1
$user = "root"; // default user MySQL
$pass = ""; // kosong jika default XAMPP
$dbname = "db_perusahaan"; // nama database Anda

$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query data dari tabel supliyer
$sql = "SELECT * FROM supliyer";
$result = $conn->query($sql);

// Buat array untuk menyimpan data
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Tutup koneksi
$conn->close();

// Tampilkan data dalam format JSON
header("Content-Type: application/json");
echo json_encode($data);
?>
