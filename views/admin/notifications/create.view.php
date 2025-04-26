<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Notification</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7f9;
            color: #333;
            display: flex;
        }

        .admin-sidebar {
            width: 210px;
            background-color: #ffffff;
            padding: 30px 20px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            border-right: 1px solid #ddd;
            box-shadow: 2px 0 8px rgba(0,0,0,0.05);
        }

        .container {
            margin-left: 250px;
            padding: 40px;
            width: calc(100% - 250px);
            display: flex;
            margin-top: 50px;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid #5EBC67;
            text-align: center;
        }

        form {
            width: 100%;
            max-width: 900px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 6px;
            font-weight: 600;
            color: #444;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #eaeef2;
            border-radius: 6px;
            font-size: 14px;
            color: #555;
            background-color: #fff;
            font-family: inherit;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='gray' class='bi bi-caret-down-fill' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14l-4.796-5.481c-.566-.648-.106-1.659.753-1.659h9.592c.86 0 1.32 1.01.753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }

        select:focus,
        input:focus,
        textarea:focus {
            outline: none;
            border-color: #5EBC67;
            box-shadow: 0 0 0 3px rgba(94, 188, 103, 0.2);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn-primary,
        [type="submit"] {
            background-color: #5EBC67;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s;
            display: inline-block;
            border: none;
            cursor: pointer;
            margin: 20px 10px 0 0;
        }

        .btn-primary:hover,
        button[type="submit"]:hover {
            background-color: #4fa858;
        }

        .error {
            color: #dc3545;
            font-size: 14px;
            font-weight: 500;
            margin-top: 4px;
            margin-bottom: 10px;
        }

        @media (max-width: 1024px) {
            .container {
                margin-left: 0;
                width: 100%;
                padding: 20px;
            }
        }

        @media (max-width: 600px) {
            form {
                padding: 20px;
            }

            .btn-primary,
            button[type="submit"] {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
<?php include('../Http/controllers/admin/header.php'); ?>
    <div class="admin-sidebar">
        <?php include('../Http/controllers/admin/sidebar.php'); ?>
    </div>
    <div class="container">
        <h1>Send Admin Notification</h1>
        <form action="/admin/notifications" method="POST">
            <label for="recipient">Send To:</label>
            <select id="recipient" name="recipient" required>
                <option value="everyone">Everyone</option>
                <option value="users">Registered Users</option>
                <option value="businesses">All Businesses (Restaurants, Accommodation providers and Vehicle Rental Services)</option>
                <option value="restaurants">Restaurants</option>
                <option value="accommodation Providers">Accommodation Providers</option>
                <option value="car-rentals">Vehicle Rentals</option>
                <option value="area-admins">Area Admins</option>
            </select>
            <?php if (!empty($errors['recipient'])) : ?>
                <p class="error"><?= $errors['recipient'] ?></p>
            <?php endif; ?>
            <label for="body">Notification Message:</label>
            <textarea id="body" name="body" required><?= $_POST['body'] ?? '' ?></textarea>
            <?php if (!empty($errors['body'])) : ?>
                <p class="error"><?= $errors['body'] ?></p>
            <?php endif; ?>
            <button type="submit">Send Notification</button>
            <a href="/admin/notifications" class="btn-primary">Go Back</a>
        </form>
    </div>
</body>
</html>