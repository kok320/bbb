<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../auth/login.php");
  exit;
}

include '../koneksi.php';

// Ambil data staff
$data = mysqli_query($koneksi, "SELECT * FROM staff");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Staff</title>
    <link rel="icon" type="image/png" href="../favicon.png">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f4f4;
      padding: 40px;
    }
    h2 {
      margin-bottom: 20px;
    }
    a {
      text-decoration: none;
      background: #6c5ce7;
      color: #fff;
      padding: 8px 14px;
      border-radius: 6px;
      font-size: 14px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
    }
    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      font-size: 14px;
      text-align: left;
    }
    th {
      background: #6c5ce7;
      color: white;
    }
    .aksi a {
      margin-right: 6px;
    }
  </style>
</head>
<body>

  <h2>Data Staff</h2>
  <a href="tambah_staff.php">+ Tambah Staff</a>
  <br><br>
  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>ID Laundry</th>
      <th>Email</th>
      <th>No HP</th>
      <th>Level</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </tr>
    <?php $no=1; foreach ($data as $d): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $d['nama'] ?></td>
      <td><?= $d['id_laundry'] ?></td>
      <td><?= $d['email'] ?></td>
      <td><?= $d['no_hp'] ?></td>
      <td><?= $d['level'] ?></td>
      <td><?= $d['alamat'] ?></td>
      <td class="aksi">
        <a href="edit_staff.php?id=<?= $d['id'] ?>">Edit</a>
        <a href="hapus_staff.php?id=<?= $d['id'] ?>" onclick="return confirm('Hapus staff ini?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>

</body>
</html>
