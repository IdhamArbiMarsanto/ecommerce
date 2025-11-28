<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
    }

    body, html {
      height: 100%;
      width: 100%;
      overflow: hidden;
    }

    /* Background gunung + efek aurora */
    .login-container {
      position: relative;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('https://i.imgur.com/r4KfHZF.jpeg') no-repeat center center/cover;
      overflow: hidden;
    }

    /* Gradient lembut yang bergerak (aurora) */
    .gradient-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(120deg, rgba(255, 154, 158, 0.3), rgba(250, 208, 196, 0.3), rgba(161, 140, 209, 0.3), rgba(251, 194, 235, 0.3));
      background-size: 400% 400%;
      animation: gradientMove 15s ease infinite;
      z-index: 1;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Efek partikel kecil */
    #particles {
      position: absolute;
      top: 0;
      left: 0;
      width: 200%;
      height: 200%;
      pointer-events: none;
      z-index: 5;
    }

    /* Kotak login */
    .login-box {
      position: relative;
      z-index: 3;
      background-color: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(2px);
      padding: 40px 60px;
      border-radius: 10px;
      text-align: center;
      max-width: 400px;
      width: 90%;
      color: white;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
    }

    .login-box h2 {
      font-size: 1.4em;
      font-weight: 300;
      margin-bottom: 25px;
      opacity: 0.9;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group input {
      width: 100%;
      padding: 15px 20px;
      border: none;
      border-radius: 25px;
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
      font-size: 1em;
      outline: none;
      transition: background-color 0.3s;
    }

    .input-group input::placeholder {
      color: rgba(255, 255, 255, 0.8);
    }

    .input-group input:focus {
      background-color: rgba(255, 255, 255, 0.3);
    }

    .password-group {
      position: relative;
    }

    .password-toggle {
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: rgba(255, 255, 255, 0.8);
      user-select: none;
    }

    .btn {
      padding: 15px 30px;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      font-size: 1em;
      font-weight: bold;
      text-transform: uppercase;
      transition: background-color 0.3s;
    }

    .sign-in-btn {
      width: 100%;
      background: linear-gradient(135deg, #00c6ff, #8a2be2);
      color: white;
      margin-bottom: 15px;
      box-shadow: 0 6px 18px rgba(138,43,226,0.18);
    }

    .sign-in-btn:hover {
      filter: brightness(0.95);
      transform: translateY(-1px);
      transition: transform 0.15s ease, filter 0.15s ease;
    }

    .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.9em;
      margin-bottom: 20px;
    }

    .remember-me {
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    .remember-me input[type="checkbox"] {
      margin-right: 5px;
      accent-color: #8a2be2;
    }

    .forgot-password {
      color: white;
      text-decoration: none;
      opacity: 0.8;
    }

    .forgot-password:hover {
      text-decoration: underline;
    }

    .register-link a {
      color: #ffd8d2;
      text-decoration: underline;
    }

    .register-link a:hover {
      color: #fff;
    }

    /* Popup Forgot Password */
.forgot-popup {
  display: none;
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 90%;
  max-width: 350px;
  background: rgba(255,255,255,0.2);
  backdrop-filter: blur(4px);
  padding: 20px;
  border-radius: 12px;
  text-align: center;
  color: white;
  animation: popupShow 0.3s ease;
  box-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

@keyframes popupShow {
  from { opacity: 0; transform: translate(-50%, 20px); }
  to { opacity: 1; transform: translate(-50%, 0); }
}

.forgot-popup input {
  width: 100%;
  margin-top: 10px;
  padding: 12px;
  border-radius: 20px;
  border: none;
  outline: none;
  background: rgba(255,255,255,0.2);
  color: white;
}

.send-btn {
  margin-top: 12px;
  width: 100%;
  background: linear-gradient(135deg, #ff7eb3, #ff758c);
  color: white;
}

.close-popup {
  position: absolute;
  top: 8px;
  right: 12px;
  cursor: pointer;
  font-size: 18px;
  color: white;
}

  </style>
</head>
<body>

  <div class="login-container">
    <div class="gradient-overlay"></div>
    <canvas id="particles"></canvas>

    <div class="login-box">
      <h2>I have an account?</h2>

      <form id="loginForm" action="#" method="POST">
        <div class="input-group">
          <input type="text" id="username" name="username" placeholder="Username" required>
        </div>

        <div class="input-group password-group">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <span class="password-toggle" onclick="togglePassword()">👁</span>
        </div>

        <button type="submit" class="btn sign-in-btn">SIGN IN</button>
      </form>

      <div id="loginMsg" style="margin-top:10px;color:#ffd8d2;"></div>

      <div class="options">
        <label class="remember-me">
          <input type="checkbox" checked> Remember Me
        </label>
        <a href="#" class="forgot-password">Forgot Password</a>
      </div>

      <p class="register-link">
        Don't have an account? <a href="register.php">Register here</a>
      </p>
      <p><a href="index.php">Kembali ke Beranda</a></p>
      <!-- Reset Password Inline -->
<div id="resetSection" style="display:none; margin-top:15px; animation:fadeIn 0.3s;">
  <input type="email" id="forgotEmail" 
         placeholder="Enter your email..." 
         style="
           width: 100%;
           padding: 14px;
           border-radius: 25px;
           border: none;
           background: rgba(255,255,255,0.2);
           color: white;
           outline: none;">
  
  <button class="btn" 
          onclick="sendReset()" 
          style="
            margin-top: 10px; 
            width: 100%;
            background: linear-gradient(135deg,#00c6ff, #8a2be2);
            color: white;">
    SEND RESET LINK
  </button>

  <p id="resetStatus" style="margin-top:8px;"></p>
</div>

<style>
@keyframes fadeIn {
  from { opacity:0; transform:translateY(8px); }
  to   { opacity:1; transform:translateY(0); }
}
</style>

    </div>

  </div>

  <script>

document.querySelector(".forgot-password").addEventListener("click", function (e) {
  e.preventDefault();

  const section = document.getElementById("resetSection");

  // toggle
  if (section.style.display === "none") {
    section.style.display = "block";
  } else {
    section.style.display = "none";
    document.getElementById("resetStatus").textContent = "";
  }
});

function sendReset() {
  let email = document.getElementById("forgotEmail").value;

  if (email.trim() === "") {
    document.getElementById("resetStatus").textContent = "Email wajib diisi!";
    document.getElementById("resetStatus").style.color = "#ffcccc";
    return;
  }

  document.getElementById("resetStatus").textContent =
    "✔ Link reset sudah dikirim.";
  document.getElementById("resetStatus").style.color = "#b3ffb3";
}
  

    // Toggle password
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const toggleIcon = document.querySelector(".password-toggle");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.textContent = "🙈";
      } else {
        passwordInput.type = "password";
        toggleIcon.textContent = "👁";
      }
    }

    // Efek partikel
    const canvas = document.getElementById('particles');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const particles = [];
    const numParticles = 80;

    class Particle {
      constructor() {
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.size = Math.random() * 2 + 0.5;
        this.speedX = Math.random() * 0.6 - 0.3;
        this.speedY = Math.random() * 0.6 - 0.3;
      }

      update() {
        this.x += this.speedX;
        this.y += this.speedY;
        if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
        if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
      }

      draw() {
        ctx.fillStyle = 'rgba(255, 255, 255, 0.7)';
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.closePath();
        ctx.fill();
      }
    }

    function initParticles() {
      for (let i = 0; i < numParticles; i++) {
        particles.push(new Particle());
      }
    }

    function animateParticles() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      particles.forEach(p => {
        p.update();
        p.draw();
      });
      requestAnimationFrame(animateParticles);
    }

    initParticles();
    animateParticles();

    window.addEventListener('resize', () => {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    });

    // --- LOGIN: submit to backend API and redirect admin to backend panel ---
    (function(){
      const form = document.getElementById('loginForm');
      const msg = document.getElementById('loginMsg');
      const API_LOGIN = 'http://localhost/backend/api/login.php'; // sesuaikan jika perlu

      form.addEventListener('submit', async function(e){
        e.preventDefault();
        msg.style.color = '#ffd8d2';
        msg.textContent = 'Memproses...';

        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value;

        try {
          const res = await fetch(API_LOGIN, {
            method: 'POST',
            credentials: 'include',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username, password })
          });

          // Try parse JSON safely
          let json = null;
          try { json = await res.json(); } catch(e){ json = null; }

          if (res.ok && json && json.success) {
            // determine role (support several response shapes)
            const role = (json.role || (json.data && json.data.role) || (json.user && json.user.role) || '').toString().toLowerCase();

            // Redirect admin to backend panel, others to frontend homepage
            if (role && role.indexOf('admin') !== -1) {
              window.location.href = 'http://localhost/backend/pages/produk.php';
            } else {
              window.location.href = 'index.php';
            }
            return;
          }

          // handle common errors
          if (res.status === 401 || (json && json.message && /invalid|credential|auth/i.test(json.message))) {
            msg.style.color = '#ffb3b3';
            msg.textContent = json && json.message ? json.message : 'Username atau password salah.';
            return;
          }

          // fallback message
          msg.style.color = '#ffb3b3';
          msg.textContent = (json && json.message) ? json.message : ('Login gagal. HTTP ' + res.status);
        } catch (err) {
          console.error(err);
          msg.style.color = '#ffb3b3';
          msg.textContent = 'Gagal terhubung ke server.';
        }
      });
    })();
  </script>
</body>
</html>

