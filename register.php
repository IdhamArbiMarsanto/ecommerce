<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('https://i.imgur.com/r4KfHZF.jpeg') no-repeat center center/cover;
      background-attachment: fixed;
      overflow: hidden;
      position: relative;
    }

    /* === Efek aurora lembut biru-ungu === */
    .aurora {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle at 20% 30%, rgba(0, 255, 255, 0.25), transparent 60%),
                  radial-gradient(circle at 80% 70%, rgba(170, 0, 255, 0.25), transparent 60%),
                  radial-gradient(circle at 50% 50%, rgba(0, 128, 255, 0.15), transparent 70%);
      filter: blur(70px);
      animation: auroraMove 18s ease-in-out infinite alternate;
      z-index: 0;
    }

    @keyframes auroraMove {
      0% { transform: translate(0, 0) scale(1); }
      50% { transform: translate(-40px, 20px) scale(1.05); }
      100% { transform: translate(40px, -20px) scale(1); }
    }

    /* === Partikel putih kecil === */
    .particle {
      position: absolute;
      background: rgba(255, 255, 255, 0.8);
      border-radius: 50%;
      animation: floatParticle linear infinite;
      z-index: 1;
    }

    @keyframes floatParticle {
      from {
        transform: translateY(0);
        opacity: 1;
      }
      to {
        transform: translateY(-100vh);
        opacity: 0;
      }
    }

    /* === Form registrasi === */
    .register-container {
      position: relative;
      z-index: 2;
      display: flex;
      flex-direction: column;
      gap: 15px;
      padding: 40px;
      border-radius: 20px;
      backdrop-filter: blur(15px);
      background: rgba(255, 255, 255, 0.1);
      box-shadow: 0 4px 25px rgba(0,0,0,0.5);
      width: 340px;
      text-align: center;
      color: #fff;
    }

    .register-container h2 {
      margin-bottom: 10px;
      font-weight: 500;
      letter-spacing: 1px;
    }

    .register-container input {
      padding: 12px;
      border: none;
      outline: none;
      border-radius: 25px;
      background: rgba(255,255,255,0.2);
      color: #fff;
      font-size: 14px;
      transition: background 0.3s;
    }

    .register-container input::placeholder {
      color: #ddd;
    }

    .register-container input:focus {
      background: rgba(255,255,255,0.3);
    }

    /* === Gender toggle === */
    .gender-select {
      display: flex;
      justify-content: space-between;
      background: rgba(255,255,255,0.2);
      border-radius: 25px;
      overflow: hidden;
      color: #fff;
      font-size: 14px;
    }

    .gender-option {
      flex: 1;
      text-align: center;
      padding: 12px 0;
      cursor: pointer;
      transition: 0.3s;
      user-select: none;
    }

    .gender-option:hover {
      background: rgba(255,255,255,0.3);
    }

    .gender-option.active {
      background: linear-gradient(135deg, #00c6ff, #8a2be2);
      font-weight: bold;
      box-shadow: 0 0 15px rgba(138,43,226,0.6);
    }

    /* === Tombol utama === */
    .register-container button {
      padding: 12px;
      border: none;
      border-radius: 25px;
      background: linear-gradient(135deg, #00c6ff, #8a2be2);
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    .register-container button:hover {
      background: linear-gradient(135deg, #8a2be2, #00c6ff);
      box-shadow: 0 0 15px rgba(138,43,226,0.6);
    }

    .register-container p {
      font-size: 0.9em;
    }

    .register-container a {
      color: #00c6ff;
      text-decoration: none;
    }

    .register-container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="aurora"></div>

  <!-- Partikel putih acak -->
  <script>
    for (let i = 0; i < 30; i++) {
      const particle = document.createElement('div');
      const size = Math.random() * 3 + 1;
      const duration = Math.random() * 10 + 5;
      particle.classList.add('particle');
      particle.style.width = `${size}px`;
      particle.style.height = `${size}px`;
      particle.style.left = `${Math.random() * 100}%`;
      particle.style.bottom = '-10px';
      particle.style.animationDuration = `${duration}s`;
      document.body.appendChild(particle);
    }
  </script>

  <!-- Form register -->
  <form class="register-container" action="register_process.php" method="POST">
    <h2>Create Account</h2>

    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>

    <!-- Gender -->
    <div class="gender-select" id="genderSelect">
      <div class="gender-option" data-value="Laki-laki">Laki-laki</div>
      <div class="gender-option" data-value="Perempuan">Perempuan</div>
    </div>
    <input type="hidden" name="gender" id="genderInput" required>

    <button type="submit">Register</button>
    <p>Already have an account? <a href="login.php">Login</a></p>
    <p><a href="index.php">← Kembali ke Beranda</a></p>
  </form>

  <script>
    // Handle gender toggle
    const options = document.querySelectorAll('.gender-option');
    const genderInput = document.getElementById('genderInput');
    options.forEach(option => {
      option.addEventListener('click', () => {
        options.forEach(o => o.classList.remove('active'));
        option.classList.add('active');
        genderInput.value = option.dataset.value;
      });
    });
  </script>
</body>
</html>
