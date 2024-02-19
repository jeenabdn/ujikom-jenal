<?php
include '../koneksi.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $user = $_GET['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori_id'];
    
    $updateSql = "UPDATE buku SET judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit', kategori_id = '$kategori' WHERE buku_id = $user";
    print_r($updateSql);

    if (mysqli_query($koneksi, $updateSql)) {
        echo "updated successfully!";
        header("Location: ../admin/buku.php");
        exit();
    } else {
        echo "Error updating: " . mysqli_error($koneksi);
    }
} else {
    exit();
}
?>