<?php
session_start();
include '../config/database.php';
if (!isset($_SESSION['admin'])) {
    header("Location: ../auth/login.php");
    exit;
}

$staff = mysqli_query($conn, "SELECT * FROM staff");
?>

<h2>Data Staff Laundry</h2>
<a href="dashboard.php">Kembali</a> | <a href="staff_add.php">+ Tambah Staff</a><br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Nama</th>
        <th>IDLaundry</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Level</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($staff)): ?>
        <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['id_laundry'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['no_hp'] ?></td>
            <td><?= $row['level'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td>
                <a href="staff_edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="staff_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
