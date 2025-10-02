<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* Atur ulang dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body, html {
            height: 100%;
            width: 100%;
        }

        /* Container utama dengan gambar latar belakang */
        .login-container {
            background: url('https://i.pinimg.com/736x/28/fd/e6/28fde6637a375ec42350c31a6e104b39.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 50px; /* Sedikit geser ke bawah karena ada header pesan exit */
        }

        /* Box form login */
        .login-box {
            background-color: rgba(255, 255, 255, 0.15); 
            backdrop-filter: blur(5px);
            padding: 40px 60px;
            border-radius: 10px;
            text-align: center;
            max-width: 400px;
            width: 90%;
            color: white;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
        }

        .login-box h1 {
            font-size: 2em;
            font-weight: 300;
            margin-bottom: 5px;
        }

        .login-box h2 {
            font-size: 1.2em;
            font-weight: 300;
            margin-bottom: 25px;
            opacity: 0.9;
        }

        /* Input Fields */
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

        /* Password eye icon */
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
        }

        /* Tombol Dasar */
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

        /* Tombol Sign In */
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

        /* Options (Remember Me / Forgot Password) */
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

        /* Social Login Separator */
        .social-login-separator {
            margin: 20px 0;
            font-size: 0.9em;
            opacity: 0.7;
        }

        /* Social Buttons */
        .social-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .social-btn {
            flex-grow: 1;
            background-color: white;
            color: #333;
            font-weight: normal;
            padding: 10px;
            border-radius: 5px;
        }

        .facebook-btn:hover {
            background-color: #e0e0e0;
        }

        .twitter-btn:hover {
            background-color: #e0e0e0;
        }

        /* Fullscreen Exit Message (Header) */
        .fullscreen-exit {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 0.9em;
        }

        .esc-key {
            background-color: white;
            color: black;
            padding: 2px 5px;
            border-radius: 3px;
            margin-left: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="fullscreen-exit">
        </div>

        <div class="login-box">
            <h2>I have an account?</h2>

            <form action="#" method="POST">
                <div class="input-group">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>

                <div class="input-group password-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="password-toggle">👁</span>
                </div>

                <button type="submit" class="btn sign-in-btn">SIGN IN</button>
            </form>

            <div class="options">
                <label class="remember-me">
                    <input type="checkbox" checked> Remember Me
                </label>
                <a href="#" class="forgot-password">Forgot Password</a>
            </div>

            <div class="social-login-separator">
            </div>
              <p class="register-link">
                  Don't have an account? <a href="register.php">Register here</a>
              </p>

            <div class="social-buttons">
            </div>
        </div>
    </div>
    
</body>
</html>