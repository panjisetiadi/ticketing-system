<?php
include '../config/koneksi.php';

$id = $_POST['id'];
$status = $_POST['status'];

$conn->query("UPDATE tickets SET status='$status' WHERE id=$id");

header('Location: index.php');
?>
