<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui formulir
    $id_buku = $_POST['buku'];
    $ulasan = $_POST['ulasan'];

    // Lakukan penyimpanan data ke dalam database
    $sql = "INSERT INTO ulasan_buku (buku_id, rating) VALUES ('$id_buku', '$ulasan')";

    if (mysqli_query($koneksi, $sql)) {
        // Jika penyimpanan berhasil, arahkan kembali ke halaman sebelumnya
        header("Location: ../admin/ulasan.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

// Tutup koneksi database
mysqli_close($koneksi);

?>
