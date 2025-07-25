<?php
session_start();
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_laundry = $_POST['id_laundry'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id_laundry='$id_laundry'");
    $admin = mysqli_fetch_assoc($result);

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = $admin;
        header("Location: ../admin/dashboard.php");
        exit;
    } else {
        $error = "IDLaundry atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin Laundry</title>
       <link rel="icon" type="image/png" href="../favicon.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #5ee7df 0%, #b490ca 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .card {
      background: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      width: 90%;
      max-width: 400px;
      text-align: center;
      animation: fadeIn 0.8s ease;
    }

    h2 {
      margin-bottom: 20px;
    }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-family: inherit;
    }

    button {
      background: #6c5ce7;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 10px;
      cursor: pointer;
      font-weight: bold;
      width: 100%;
      margin-top: 10px;
    }

    button:hover {
      background: #341f97;
    }

    .back-link {
      display: block;
      margin-top: 20px;
      color: #6c5ce7;
      text-decoration: none;
    }

    .error {
      color: red;
      margin-top: 10px;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to   { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <form method="POST" class="card">
    <h2>Login Admin</h2>
    <input type="text" name="id_laundry" placeholder="IDLaundry" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <a href="../index.php" class="back-link">← Kembali ke Beranda</a>
    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
  </form>
</body>
</html>
