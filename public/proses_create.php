<?php
include '../config/koneksi.php';

$nama_pelapor = $_POST['nama_pelapor'];
$departemen = $_POST['departemen'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$prioritas = $_POST['prioritas'];
$tanggal_lapor = $_POST['tanggal_lapor'];

$conn->query("INSERT INTO tickets (nama_pelapor, departemen, judul, deskripsi, prioritas, tanggal_lapor) 
VALUES ('$nama_pelapor', '$departemen', '$judul', '$deskripsi', '$prioritas', '$tanggal_lapor')");

header('Location: index.php');
?>
