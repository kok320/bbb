<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../auth/login.php");
  exit;
}

include '../koneksi.php';

$customers = mysqli_query($koneksi, "SELECT * FROM costumer");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Customer</title>
  <link rel="icon" href="/favicon.ico" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #6c5ce7;
      --background-light: #f7f8fc;
      --background-dark: #1e1e2f;
      --text-light: #333;
      --text-dark: #f1f1f1;
      --card-light: #fff;
      --card-dark: #2e2e3e;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--background-light);
      color: var(--text-light);
      transition: 0.3s ease;
    }

    body.dark {
      background: var(--background-dark);
      color: var(--text-dark);
    }

    .container {
      display: flex;
      height: 100vh;
    }

    .sidebar {
      width: 250px;
      background: var(--primary);
      color: white;
      padding: 20px;
    }

    .sidebar h2 {
      margin-bottom: 30px;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      margin: 10px 0;
    }

    .sidebar a:hover {
      text-decoration: underline;
    }

    .main {
      flex: 1;
      padding: 30px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .btn-toggle {
      padding: 6px 12px;
      border: 2px solid var(--primary);
      background: transparent;
      border-radius: 20px;
      cursor: pointer;
      color: var(--primary);
    }

    body.dark .btn-toggle {
      border-color: #fff;
      color: #fff;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: var(--card-light);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    body.dark table {
      background: var(--card-dark);
    }

    table th, table td {
      padding: 12px 16px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    body.dark table th, body.dark table td {
      border-color: #444;
    }

    table th {
      background: var(--primary);
      color: white;
    }

    table tr:hover {
      background: rgba(108, 92, 231, 0.1);
    }

    body.dark table tr:hover {
      background: rgba(255,255,255,0.05);
    }
  </style>
</head>
<body>

<div class="container">
  <div class="sidebar">
    <h2>LaundryApp</h2>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="customer.php">👥 Data Customer</a>
    <a href="staff.php">🧍 Data Staff</a>
    <a href="../auth/logout.php">🚪 Logout</a>
  </div>

  <div class="main">
    <div class="topbar">
      <h1>Data Customer</h1>
      <button onclick="toggleDarkMode()" class="btn-toggle">🌙 Mode Gelap</button>
    </div>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>No HP</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>Tanggal Daftar</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; while($row = mysqli_fetch_assoc($customers)): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td><?= htmlspecialchars($row['no_hp']) ?></td>
          <td><?= htmlspecialchars($row['alamat']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['tanggal_daftar']) ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  function toggleDarkMode() {
    document.body.classList.toggle("dark");
  }
</script>

</body>
</html>
