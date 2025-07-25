<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_laundry");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>