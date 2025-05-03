<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$tiket = $conn->query("SELECT * FROM tickets WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4">Detail Tiket</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($tiket['judul']) ?></h5>
            <p class="card-text"><strong>Nama Pelapor:</strong> <?= htmlspecialchars($tiket['nama_pelapor']) ?></p>
            <p class="card-text"><strong>Departemen:</strong> <?= htmlspecialchars($tiket['departemen']) ?></p>
            <p class="card-text"><strong>Deskripsi:</strong> <?= nl2br(htmlspecialchars($tiket['deskripsi'])) ?></p>
            <p class="card-text"><strong>Prioritas:</strong> <?= htmlspecialchars($tiket['prioritas']) ?></p>
            <p class="card-text"><strong>Status:</strong> <?= htmlspecialchars($tiket['status']) ?></p>
            <p class="card-text"><strong>Tanggal Lapor:</strong> <?= htmlspecialchars($tiket['tanggal_lapor']) ?></p>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
