<?php 
include '../koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $perpustakaan = $_POST['perpustakaan'];
    $nama = $_POST['nama'];
    $buku = $_POST['buku'];
    $tgl_peminjaman = $_POST['tanggal_pinjam'];
    $status = $_POST['status'];

    $sql = "INSERT INTO peminjaman (perpus_id, user_id, buku_id, tgl_peminjaman, status_peminjaman) VALUES ('$perpustakaan', '$nama', '$buku', '$tgl_peminjaman', '$status')";

    if (mysqli_query($koneksi, $sql)) {
        header("location:../admin/index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>