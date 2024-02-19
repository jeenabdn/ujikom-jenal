<?php 
include '../koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $perpus_id = $_POST['perpus_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $namalengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];
    
    $sql = "INSERT INTO user (perpus_id, username, password, email, nama_lengkap, alamat, role) VALUES ('$perpus_id', '$username', '$hashed_password', '$email', '$namalengkap', '$alamat', '$role')";

    if (mysqli_query($koneksi, $sql)) {
        header("location:../admin/pengguna.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>