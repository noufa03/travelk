<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Admin Login</title>
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

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            appearance: none;
            background-color: #fff;
            color: #333;
            transition: border-color 0.3s ease;
        }

        .form-group select {
            background-image: url('data:image/svg+xml;charset=US-ASCII,<svg width="12" height="12" viewBox="0 0 20 20" fill="%23555" xmlns="http://www.w3.org/2000/svg"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 12px 12px;
            padding-right: 40px;
        }

        .form-group input:focus,
        .form-group select:focus {
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

        /* Hide default dropdown arrow in some browsers */
        select::-ms-expand {
            display: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="/assets/admins/TravelkLOGO.png" alt="Logo" class="login-logo">
        <h2>Area Admin Login</h2>
        <form method="POST" action="/areaadmin/login">
            <div class="form-group">
                <label for="district">Select District</label>
                <select name="district_id" id="district" required>
                    <option value="" disabled selected>Choose District</option>
                    <?php foreach ($districts as $district): ?>
                        <option value="<?= $district['districtid'] ?>"><?= htmlspecialchars($district['district']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" required placeholder="areaadmin@example.com">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" class="login-button">Log In</button>

            <?php if (!empty($errors)): ?>
                <p class="error-message"><?= htmlspecialchars($errors) ?></p>
            <?php endif; ?>
        </form>

        <div class="form-footer">
            <a href="/areaadmin/forgot-password">Forgot Password?</a>
        </div>
    </div>
</body>
</html>