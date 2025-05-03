<?php
include '../config/database.php';

$id = $_POST['id'];
$status = $_POST['status'];

$query = "UPDATE tickets SET status='$status' WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
    Swal.fire({
        title: 'Update Berhasil!',
        text: 'Status tiket berhasil diubah!',
        icon: 'success'
    }).then(function() {
        window.location.href='index.php';
    });
    </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
