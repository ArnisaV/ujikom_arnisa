<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #667eea, #764ba2);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* Adjusted shadow */
            width: 350px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            margin: auto;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px); /* Adjusted for padding */
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .sign-up-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .sign-up-link a {
            color: #007bff;
            text-decoration: none;
        }

        .sign-up-link a:hover {
            text-decoration: underline;
        }

        .password-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Halaman Login</h1>
        <form action="proses_login.php" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Login">
        </form>
        <div class="sign-up-link">
            Belum punya akun? <a href="register.php">Sign Up</a>
        </div>
    </div>
</body>
</html>