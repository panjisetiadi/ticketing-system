<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$tiket = $conn->query("SELECT * FROM tickets WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4">Edit Tiket</h2>

    <form action="proses_update.php" method="POST">
        <input type="hidden" name="id" value="<?= $tiket['id'] ?>">
        <div class="mb-3">
            <label>Status</label>
            <select class="form-select" name="status" required>
                <option value="Open" <?= $tiket['status'] == 'Open' ? 'selected' : '' ?>>Open</option>
                <option value="In Progress" <?= $tiket['status'] == 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                <option value="Closed" <?= $tiket['status'] == 'Closed' ? 'selected' : '' ?>>Closed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Status</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
