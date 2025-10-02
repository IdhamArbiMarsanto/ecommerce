<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('https://i.pinimg.com/736x/28/fd/e6/28fde6637a375ec42350c31a6e104b39.jpg') no-repeat center center/cover;
      background-attachment: fixed;
      font-family: Arial, sans-serif;
    }

    .register-container {
      display: flex;
      flex-direction: column;
      gap: 15px;
      padding: 40px;
      border-radius: 20px;
      backdrop-filter: blur(15px);
      background: rgba(255, 255, 255, 0.1);
      box-shadow: 0 4px 20px rgba(0,0,0,0.3);
      width: 320px;
    }

    .register-container h2 {
      text-align: center;
      color: #fff;
      margin-bottom: 10px;
    }

    .register-container input {
      padding: 12px;
      border: none;
      outline: none;
      border-radius: 25px;
      background: rgba(255,255,255,0.2);
      color: #fff;
      font-size: 14px;
    }

    .register-container input::placeholder {
      color: #ddd;
    }

    .register-container button {
      padding: 12px;
      border: none;
      border-radius: 25px;
      background: linear-gradient(135deg, #00c6ff, #0072ff);
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
    }

    .register-container button:hover {
      background: linear-gradient(135deg, #0072ff, #00c6ff);
    }

    .register-container p {
      text-align: center;
      color: #fff;
      margin-top: 10px;
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
  <form class="register-container" action="register_process.php" method="POST">
    <h2>Register</h2>
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <button type="submit">Register</button>
    <p>Already have an account? <a href="login.php">Login</a></p>
  </form>
</body>
</html>
