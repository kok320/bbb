<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $id_laundry = $_POST['id_laundry'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $level = $_POST['level'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO staff (nama, id_laundry, password, email, no_hp, level, alamat) 
              VALUES ('$nama', '$id_laundry', '$password', '$email', '$no_hp', '$level', '$alamat')");

    if ($query) {
        header("Location: staff.php?success=1");
    } else {
        echo "Gagal menambahkan data staff.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Staff</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body.dark-mode {
      background-color: #1e1e2f !important;
      color: #f1f1f1 !important;
    }
    .dark-mode .card {
      background-color: #2e2e3e !important;
      color: #f1f1f1;
    }
    .dark-mode input.form-control,
    .dark-mode select.form-control,
    .dark-mode textarea.form-control {
      background-color: #3a3a4a;
      color: #f1f1f1;
      border-color: #555;
    }
    .dark-mode .btn-secondary {
      background-color: #444;
      border-color: #666;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Tambah Data Staff</h2>
    <button class="btn btn-outline-dark" onclick="toggleDark()">🌓 Mode</button>
  </div>

  <div class="card shadow p-4">
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">ID Laundry</label>
        <input type="text" name="id_laundry" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" minlength="8" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Level</label>
        <select name="level" class="form-control" required>
          <option value="">-- Pilih Level --</option>
          <option value="Admin">Admin</option>
          <option value="Pengunjung">Pengunjung</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" rows="3" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="staff.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>

<script>
  function toggleDark() {
    document.body.classList.toggle("dark-mode");
  }
</script>

</body>
</html>
