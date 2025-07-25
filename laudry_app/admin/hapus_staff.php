<?php
include '../koneksi.php';

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "DELETE FROM staff WHERE id=$id");

if ($hapus) {
    header("Location: staff.php?hapus=1");
} else {
    echo "Gagal menghapus data staff.";
}
?>
