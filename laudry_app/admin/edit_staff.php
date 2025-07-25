<?php
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM staff WHERE id = $id"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $id_laundry = $_POST['id_laundry'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $data['password'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $level = $_POST['level'];
    $alamat = $_POST['alamat'];

    $update = mysqli_query($koneksi, "UPDATE staff SET 
        nama='$nama', 
        id_laundry='$id_laundry', 
        password='$password', 
        email='$email', 
        no_hp='$no_hp', 
        level='$level', 
        alamat='$alamat' 
        WHERE id=$id");

    if ($update) {
        header("Location: staff.php?update=1");
    } else {
        echo "Gagal mengupdate data.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Staff</title>
    <link rel="icon" type="image/png" href="../favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body.dark-mode { background-color: #1e1e2f !important; color: #f1f1f1; }
    .dark-mode .card { background-color: #2e2e3e !important; color: #f1f1f1; }
    .dark-mode .form-control { background-color: #3a3a4a; color: #f1f1f1; border-color: #555; }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Data Staff</h2>
    <button class="btn btn-outline-dark" onclick="toggleDark()">🌓 Mode</button>
  </div>

  <div class="card shadow p-4">
    <form method="POST">
      <div class="mb-3"><label>Nama</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required></div>
      <div class="mb-3"><label>ID Laundry</label>
        <input type="text" name="id_laundry" value="<?= $data['id_laundry'] ?>" class="form-control" required></div>
      <div class="mb-3"><label>Password (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="form-control" minlength="8"></div>
      <div class="mb-3"><label>Email</label>
        <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control" required></div>
      <div class="mb-3"><label>No HP</label>
        <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" class="form-control" required></div>
      <div class="mb-3"><label>Level</label>
        <select name="level" class="form-control" required>
          <option value="Admin" <?= $data['level'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
          <option value="Pengunjung" <?= $data['level'] == 'Pengunjung' ? 'selected' : '' ?>>Pengunjung</option>
        </select></div>
      <div class="mb-3"><label>Alamat</label>
        <textarea name="alamat" class="form-control" rows="3" required><?= $data['alamat'] ?></textarea></div>

      <button type="submit" class="btn btn-primary">Update</button>
      <a href="staff.php" class="btn btn-secondary">Batal</a>
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
