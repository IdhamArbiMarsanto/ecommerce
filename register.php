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
      backdrop-filter: blur(5px);
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
  <form class="register-container" id="registerForm" action="register_process.php" method="POST">
    <h2>Create Account</h2>

    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <input type="telepon" name="no_telepon" id="no_telepon" placeholder="no telepon" required>
    <input type="date" id="birthdate" name="birthdate" placeholder="Tanggal Lahir" required>

    <!-- Gender -->
    <div class="gender-select" id="genderSelect">
      <div class="gender-option" data-value="Laki-laki">Laki-laki</div>
      <div class="gender-option" data-value="Perempuan">Perempuan</div>
    </div>
    <input type="hidden" name="gender" id="genderInput" required>

    <button type="submit">Register</button>
    <div id="msg" style="margin-top:8px;color:#fff;"></div>

    <p>Already have an account? <a href="login.php">Login</a></p>
    <p><a href="index.php">← Kembali ke Beranda</a></p>
  </form>

  <script>
    // Keep CSS unchanged. JS: map gender and submit JSON to backend API.
    const options = document.querySelectorAll('.gender-option');
    const genderInput = document.getElementById('genderInput');
    const phoneInput = document.getElementById('no_telepon');
    const msgEl = document.getElementById('msg');

    options.forEach(option => {
      option.addEventListener('click', () => {
        options.forEach(o => o.classList.remove('active'));
        option.classList.add('active');
        // backend expects 'L' or 'P'
        genderInput.value = option.dataset.value === 'Laki-laki' ? 'L' : 'P';
      });
    });

    // Intercept form submit and send JSON to backend API
    const form = document.getElementById('registerForm');
    const API_REGISTER = 'http://localhost/backend/api/register.php'; // sesuaikan jika perlu

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      msgEl.style.color = '#fff';
      msgEl.textContent = '';

      const fd = new FormData(form);
      const payload = {
        username: (fd.get('username') || '').trim(),
        email: (fd.get('email') || '').trim(),
        password: fd.get('password') || '',
        confirm_password: fd.get('confirm_password') || '',
        phone: (fd.get('no_telepon') || '').trim(),
        birthdate: fd.get('birthdate') || null,
        gender: fd.get('gender') || null
      };

      // basic client validation
      if (!payload.username || !payload.email || !payload.password) {
        msgEl.style.color = '#ffdddd';
        msgEl.textContent = 'Lengkapi username, email, dan password.';
        return;
      }
      if (payload.password !== payload.confirm_password) {
        msgEl.style.color = '#ffdddd';
        msgEl.textContent = 'Password dan konfirmasi tidak sama.';
        return;
      }
      if (!payload.gender) {
        msgEl.style.color = '#ffdddd';
        msgEl.textContent = 'Pilih jenis kelamin.';
        return;
      }

      try {
        const res = await fetch(API_REGISTER, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(payload),
          credentials: 'include'
        });
        const j = await res.json();
        if (res.ok && j.success) {
          msgEl.style.color = '#b3ffb3';
          msgEl.textContent = j.message || 'Registrasi berhasil. Mengalihkan ke login...';
          setTimeout(() => { window.location.href = 'login.php'; }, 1200);
        } else {
          msgEl.style.color = '#ffdddd';
          msgEl.textContent = j.message || ('Error: ' + res.status);
        }
      } catch (err) {
        console.error(err);
        msgEl.style.color = '#ffdddd';
        msgEl.textContent = 'Gagal terhubung ke server.';
      }
    });
  </script>
</body>
</html>
