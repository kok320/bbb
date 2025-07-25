<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LaundryApp | Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #6c5ce7;
      --bg-light: #ffffff;
      --bg-dark: #1e1e2f;
      --text-light: #000;
      --text-dark: #fff;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #5ee7df 0%, #b490ca 100%);
      transition: background 0.5s ease, color 0.5s ease;
      height: 100vh;
      overflow: hidden;
    }

    body.dark {
      background: var(--bg-dark);
      color: var(--text-dark);
    }

    .container {
      background: var(--bg-light);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 90%;
      max-width: 480px;
      transition: background 0.5s ease, color 0.5s ease;
      position: relative;
      animation: fadeIn 1s ease-out;
    }

    body.dark .container {
      background: #2c2c3e;
      color: var(--text-dark);
    }

    .logo {
      width: 90px;
      margin-bottom: 15px;
      animation: popIn 1.2s ease;
    }

    h1 {
      font-size: 2rem;
      margin-bottom: 5px;
      animation: slideDown 1s ease;
    }

    p {
      font-size: 14px;
      color: #555;
      animation: slideDown 1.2s ease;
    }

    body.dark p {
      color: #ccc;
    }

    .btn {
      display: inline-block;
      margin: 15px 10px;
      padding: 12px 25px;
      background: var(--primary);
      color: white;
      font-weight: 600;
      border-radius: 12px;
      text-decoration: none;
      transition: transform 0.3s ease;
      animation: popIn 1.5s ease;
    }

    .btn:hover {
      transform: scale(1.05);
      background: #341f97;
    }

    .toggle-dark {
      position: absolute;
      top: 20px;
      right: 25px;
      background: transparent;
      border: 2px solid var(--primary);
      border-radius: 30px;
      padding: 5px 15px;
      font-size: 13px;
      cursor: pointer;
      font-weight: 500;
      transition: 0.3s ease;
    }

    .toggle-dark:hover {
      background: var(--primary);
      color: white;
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.95); }
      to   { opacity: 1; transform: scale(1); }
    }

    @keyframes slideDown {
      from { opacity: 0; transform: translateY(-30px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    @keyframes popIn {
      0%   { transform: scale(0); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }
  </style>
</head>
<body>

  <div class="container">
    <button class="toggle-dark" onclick="toggleDarkMode()">Dark Mode</button>

    <img src="logo.png" alt="Logo Laundry" class="logo"/>
    <h1>Selamat Datang!</h1>
    <p>Kelola data laundry kamu dengan mudah dan cepat.</p>
    <a href="auth/login.php" class="btn">Login</a>
    <a href="auth/register.php" class="btn">Register</a>
  </div>

  <script>
    function toggleDarkMode() {
      document.body.classList.toggle('dark');
    }

    // Tambahan animasi masuk antar halaman
    const links = document.querySelectorAll('.btn');
    links.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelector('.container').style.animation = 'fadeIn 0.5s reverse';
        setTimeout(() => window.location.href = link.getAttribute('href'), 400);
      });
    });
  </script>

</body>
</html>
