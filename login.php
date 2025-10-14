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
      background-color: #f7a18f;
      color: white;
      margin-bottom: 15px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .sign-in-btn:hover {
      background-color: #e6907e;
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
      accent-color: #f7a18f;
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

  </style>
</head>
<body>

  <div class="login-container">
    <div class="gradient-overlay"></div>
    <canvas id="particles"></canvas>

    <div class="login-box">
      <h2>I have an account?</h2>

      <form action="#" method="POST">
        <div class="input-group">
          <input type="text" id="username" name="username" placeholder="Username" required>
        </div>

        <div class="input-group password-group">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <span class="password-toggle" onclick="togglePassword()">👁</span>
        </div>

        <button type="submit" class="btn sign-in-btn">SIGN IN</button>
      </form>

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
    </div>
  </div>

  <script>
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
  </script>
</body>
</html>
