<?php
include '../config/koneksi.php';

// Filter Query
$filter = [];
if (!empty($_GET['status'])) {
    $filter[] = "status='" . $_GET['status'] . "'";
}
if (!empty($_GET['prioritas'])) {
    $filter[] = "prioritas='" . $_GET['prioritas'] . "'";
}
if (!empty($_GET['departemen'])) {
    $filter[] = "departemen='" . $_GET['departemen'] . "'";
}
if (!empty($_GET['search'])) {
    $filter[] = "(nama_pelapor LIKE '%" . $_GET['search'] . "%' OR judul LIKE '%" . $_GET['search'] . "%')";
}
if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
    $filter[] = "(tanggal_lapor BETWEEN '" . $_GET['start_date'] . "' AND '" . $_GET['end_date'] . "')";
}

$where = '';
if (!empty($filter)) {
    $where = "WHERE " . implode(' AND ', $filter);
}

$tickets = $conn->query("SELECT * FROM tickets $where ORDER BY tanggal_lapor DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IT Support Ticketing System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/style.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4 text-center">IT Support Ticketing System</h2>

    <!-- Filter Form -->
    <form class="row g-3 mb-4" method="GET">
        <div class="col-md-2">
            <input type="text" class="form-control" name="search" placeholder="Search..." value="<?= $_GET['search'] ?? '' ?>">
        </div>
        <div class="col-md-2">
            <select class="form-select" name="status">
                <option value="">Status</option>
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Closed">Closed</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-select" name="prioritas">
                <option value="">Prioritas</option>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>
        <div class="col-md-2">
            <input  type="text" class="form-select" name="departemen" value="Departemen">
            </select>
        </div>
        <div class="col-md-2">
            <input type="date" class="form-control" name="start_date">
        </div>
        <div class="col-md-2">
            <input type="date" class="form-control" name="end_date">
        </div>
        <div class="col-12">
            <button class="btn btn-primary">Filter</button>
            <a href="create.php" class="btn btn-success">+ Create Ticket</a>
        </div>
    </form>

    <!-- Tickets Card -->
    <div class="row">
    <?php while($row = $tickets->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['judul']) ?></h5>
                    <p class="card-text"><strong>Pelapor:</strong> <?= htmlspecialchars($row['nama_pelapor']) ?></p>
                    <p class="card-text"><strong>Prioritas:</strong> 
                        <span class="badge bg-<?= $row['prioritas'] == 'High' ? 'danger' : ($row['prioritas'] == 'Medium' ? 'warning' : 'secondary') ?>">
                            <?= $row['prioritas'] ?>
                        </span>
                    </p>
                    <p class="card-text"><strong>Status:</strong> 
                        <span class="badge bg-<?= $row['status'] == 'Closed' ? 'secondary' : ($row['status'] == 'In Progress' ? 'warning' : 'success') ?>">
                            <?= $row['status'] ?>
                        </span>
                    </p>
                    <p class="card-text"><small class="text-muted">Tanggal Lapor: <?= $row['tanggal_lapor'] ?></small></p>
                    <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">View Details</a>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
