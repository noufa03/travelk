<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Are you sure you want to proceed?</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7f9;
            color: #333;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-left: 230px;
            padding-top: 80px;
            padding-bottom: 20px;
        }

        /* Form Container */
        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            max-width: 400px;
            width: 90%;
            text-align: center;
            position: relative;
            z-index: 10;
        }

        h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: stretch;
        }

        input[type="password"] {
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            background-color: #5EBC67;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #4fa858;
        }

        /* Error Message Styling */
        .error-message {
            color: #ff0000; /* Red color */
            font-size: 14px;
            font-weight: 400;
            text-align: left;
            margin: 0;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 210px;
            background-color: #f5f6f5;
            padding: 20px;
            position: fixed;
            height: 100%;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            z-index: 100;
        }

        .logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
            padding-left: 10px;
        }

        .logo {
            width: 100px;
            height: auto;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            flex-grow: 1;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
            font-weight: 400;
            padding: 10px 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 6px;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar ul li a:hover {
            background-color: #5EBC67;
            color: #fff;
        }

        .sidebar ul li form {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .sidebar-button {
            all: unset;
            font-size: 14px;
            font-weight: 400;
            padding: 10px 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 6px;
            color: #333;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
            width: 100%;
        }

        .sidebar-button:hover {
            background-color: #5EBC67;
            color: #fff;
        }

        .copyright {
            font-size: 10px;
            font-weight: 300;
            color: #666;
            text-align: center;
            padding: 10px 0;
            font-family: 'Poppins', sans-serif;
        }

        /* Header Styles */
        .header {
            position: fixed;
            top: 20px;
            left: 230px;
            width: calc(100% - 270px);
            height: 60px;
            background-color: #f5f6f5;
            border-bottom: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 20px;
            font-family: 'Poppins', sans-serif;
            z-index: 50;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-email {
            font-size: 14px;
            font-weight: 400;
            color: #333;
        }

        .profile-picture {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding-left: 0;
                padding-top: 80px;
                flex-direction: column;
                align-items: center;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                box-shadow: none;
            }

            .header {
                left: 0;
                width: calc(100% - 40px);
                top: 10px;
            }

            .form-container {
                width: 95%;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <?php include('../Http/controllers/admin/header.php'); ?>

    <!-- Sidebar -->
    <?php include('../Http/controllers/admin/sidebar.php'); ?>

    <!-- Main Content -->
    <div class="form-container">
        <h2>Are you sure you want to proceed?</h2>
        <form method="POST" action="/admin/areaadmins/probation/confirm">
            <input type="hidden" name="confirmAction" value="true">
            <input type="hidden" name="areaadminid" value="<?= htmlspecialchars($_POST['areaadminid'] ?? '') ?>">
            <input type="password" name="password" placeholder="Enter Password">
            <?php if (!empty($errors)): ?>
                <div class="error-message">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>