<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Admin Login</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 420px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            padding: 40px;
        }

        .login-logo {
            display: block;
            margin: 0 auto 30px auto;
            width: 120px;
            height: auto;
        }

        .login-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #555;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #fff;
            color: #333;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #5EBC67;
            outline: none;
        }

        .login-button {
            background-color: #5EBC67;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #4aac59;
        }

        .error-message {
            color: #ff5c5c;
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
        }

        .form-footer {
            margin-top: 20px;
            text-align: center;
        }

        .form-footer a {
            color: #5EBC67;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="/assets/admins/TravelkLOGO.png" alt="Logo" class="login-logo">
        <h2>Main Admin Login</h2>
        <form method="POST" action="/admin/login">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" required placeholder="admin@example.com">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" class="login-button">Log In</button>

            <?php if (!empty($errors['auth'])): ?>
                <p class="error-message"><?= htmlspecialchars($errors['auth']) ?></p>
            <?php endif; ?>
        </form>

        <div class="form-footer">
            <a href="/admin/forgot-password">Forgot Password?</a>
        </div>
    </div>
</body>
</html>