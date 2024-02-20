<?php
require('laporan.php');

require("../koneksi.php");

$id = $_GET['id'];

$sql = "SELECT peminjaman.*, user.nama_lengkap, buku.judul, perpus.nama_perpus 
        FROM peminjaman  
        INNER JOIN user ON peminjaman.user_id=user.user_id 
        INNER JOIN buku ON peminjaman.buku_id=buku.buku_id 
        INNER JOIN perpus ON peminjaman.perpus_id=perpus.perpus_id 
        WHERE peminjaman.peminjaman_id=$id";

$result = mysqli_query($koneksi,$sql);

$data_peminjaman = mysqli_fetch_assoc($result);

// Buat instance dari class LaporanPDF
$pdf = new LaporanPDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$heeader = ['jenal'];

// Buat data yang akan ditampilkan di laporan

$data = array(
    array(
    'perpus_id' => $data_peminjaman['nama_perpus'],
    'user' => $data_peminjaman['nama_lengkap'],
    'buku' => $data_peminjaman['judul'],
    'tgl_peminjaman' => $data_peminjaman["tgl_peminjaman"],
    'tgl_pengembalian' => $data_peminjaman['tgl_pengembalian'],
    'status_peminjaman' => $data_peminjaman['status_peminjaman'],
),

);
// Tambahkan isi laporan dengan memanggil fungsi IsiLaporan
$pdf->IsiLaporan($data);

// Output laporan dalam format PDF
$pdf->Output();
?>s
