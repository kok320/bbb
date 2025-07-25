<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../auth/login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin</title>
    <link rel="icon" type="image/png" href="../favicon.png">
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
      transition: all 0.4s ease;
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
      color: #fff;
      padding: 20px;
      transition: all 0.4s ease;
    }

    .sidebar h2 {
      margin-bottom: 40px;
    }

    .sidebar a {
      display: block;
      margin: 15px 0;
      color: #fff;
      text-decoration: none;
      font-weight: 500;
    }

    .sidebar a:hover {
      text-decoration: underline;
    }

    .main {
      flex: 1;
      padding: 30px;
      background: inherit;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 40px;
    }

    .btn-toggle {
      background: transparent;
      border: 2px solid var(--primary);
      padding: 6px 12px;
      border-radius: 20px;
      cursor: pointer;
      color: var(--primary);
      font-weight: 500;
    }

    body.dark .btn-toggle {
      border-color: #fff;
      color: #fff;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }

    .card {
      padding: 20px;
      background: var(--card-light);
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      transition: 0.3s ease;
    }

    body.dark .card {
      background: var(--card-dark);
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }

    .card h3 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .card p {
      font-size: 14px;
      color: #777;
    }

    body.dark .card p {
      color: #ccc;
    }

    @media (max-width: 768px) {
      .sidebar {
        display: none;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="sidebar">
    <h2>LaundryApp</h2>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="staff.php">🧍 Data Staff</a>
    <a href="../auth/logout.php">🚪 Logout</a>
  </div>

  <div class="main">
    <div class="topbar">
      <h1>Dashboard Admin</h1>
      <button class="btn-toggle" onclick="toggleDarkMode()">🌓 Mode</button>
    </div>

    <div class="cards">
      <div class="card">
        <h3>Data Staff</h3>
        <p>Kelola data staf laundry dan akses mereka.</p>
      </div>
      <div class="card">
        <h3>Laporan</h3>
        <p>Lihat statistik dan laporan transaksi laundry.</p>
      </div>
    </div>
  </div>
</div>

<script>
  function toggleDarkMode() {
    document.body.classList.toggle("dark");
  }
</script>

</body>
</html>
