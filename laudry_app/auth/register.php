<?php
include '../config/database.php';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = trim($_POST['nama']);
    $id_laundry = trim($_POST['id_laundry']);
    $password = $_POST['password'];
    $email = trim($_POST['email']);

    if (!$nama || !$id_laundry || !$password || !$email) {
        $errors[] = "Semua field wajib diisi!";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password minimal 8 karakter.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    } else {
        $cek = mysqli_query($conn, "SELECT * FROM admin WHERE id_laundry='$id_laundry'");
        if (mysqli_num_rows($cek) > 0) {
            $errors[] = "IDLaundry sudah digunakan.";
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "INSERT INTO admin (nama, id_laundry, password, email) 
                                VALUES ('$nama','$id_laundry','$password_hash','$email')");
            header("Location: login.php?success=1");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register Admin Laundry</title>
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
      font-size: 13px;
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
    <h2>Register Admin</h2>
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="id_laundry" placeholder="IDLaundry" required>
    <input type="password" name="password" placeholder="Password (min. 8 karakter)" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Register</button>
    <a href="../index.php" class="back-link">← Kembali ke Beranda</a>
    <?php
    foreach ($errors as $e) {
        echo "<div class='error'>$e</div>";
    }
    ?>
  </form>
</body>
</html>
