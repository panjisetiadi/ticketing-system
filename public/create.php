<?php
include '../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <h2 class="mb-4">Buat Tiket Baru</h2>

        <form action="proses_create.php" method="POST">
            <div class="mb-3">
                <label>Nama Pelapor</label>
                <input type="text" class="form-control" name="nama_pelapor" required>
            </div>
            <div class="mb-3">
                <label>Departemen</label>
                <input type="text" class="form-control" name="departemen" required>
            </div>
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea class="form-control" name="deskripsi" required></textarea>
            </div>
            <div class="mb-3">
                <label>Prioritas</label>
                <select class="form-select" name="prioritas" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Lapor</label>
                <input type="date" class="form-control" name="tanggal_lapor" value="<?= date('Y-m-d') ?>" required>
            </div>
    <button type="submit" class="btn btn-success">Simpan Tiket</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>