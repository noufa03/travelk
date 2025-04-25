<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Notification</title>
  <style>
  * {
    box-sizing: border-box;
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
    color: #333;
  }

  /* Main container - renamed to avoid conflicts */
  .form-page-container {
    margin-left: 250px; /* Match sidebar width */
    padding: 30px;
    width: calc(100% - 250px);
    background-color: #ffffff;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .sidebar {
            width: 250px;
            background-color: #5EBC67;
            color: white;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1000;
            overflow-y: auto;
            min-width: 250px;
            max-width: 250px;
        }

  /* Make sure our form buttons don't affect sidebar */
  .form-page-container .btn-primary,
  .form-page-container button[type="submit"] {
    display: inline-block;
    background-color: #5EBC67;
    color: white;
    padding: 12px 18px;
    margin-left: 20px;
    border-radius: 6px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .form-page-container h1 {
    font-size: 28px;
    font-weight: 600;
    color: #222;
    margin-bottom: 30px;
    text-align: center;
  }

  .form-page-container form {
    width: 100%;
    max-width: 800px;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
  }

  .form-page-container label {
    display: block;
    margin-top: 18px;
    margin-bottom: 6px;
    font-weight: bold;
    color: #222;
  }

  .form-page-container input,
  .form-page-container textarea,
  .form-page-container select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 15px;
    color: #333;
    background-color: #fff;
    font-family: inherit;
  }

  .form-page-container select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='gray' class='bi bi-caret-down-fill' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14l-4.796-5.481c-.566-.648-.106-1.659.753-1.659h9.592c.86 0 1.32 1.01.753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 16px;
  }

  .form-page-container select:focus {
    outline: none;
    border-color: #5EBC67;
    box-shadow: 0 0 0 3px rgba(94, 188, 103, 0.2);
  }

  .form-page-container textarea {
    resize: vertical;
    min-height: 100px;
  }

  .form-page-container button[type="submit"] {
    background-color: #5EBC67;
    color: white;
    padding: 14px 24px;
    font-size: 16px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    margin-top: 30px;
    transition: background-color 0.3s ease;
  }

  .form-page-container button[type="submit"]:hover {
    background-color: #4fa858;
  }

  .form-page-container .error {
    color: #d9534f;
    font-size: 14px;
    margin-top: 4px;
  }

  @media (max-width: 1024px) {
    .form-page-container {
      margin-left: 0;
      width: 100%;
      padding: 20px;
    }
  }

  @media (max-width: 600px) {
    .form-page-container form {
      padding: 20px;
    }

    .form-page-container input,
    .form-page-container textarea,
    .form-page-container select {
      font-size: 14px;
      padding: 10px;
    }

    .form-page-container button[type="submit"] {
      width: 100%;
    }
  }
</style>
</head>
<body>

    <div class="sidebar">
        <?php include('../Http/controllers/areaadmin/sidebar.php'); ?>
    </div>

<div class="form-page-container">
  <h1>Send admin Notification</h1>

  <form action="/areaadmin/notifications" method="POST">
  <label for="recipient">Send To:</label>
  <select id="recipient" name="recipient" required>
    <option value="everyone">Everyone</option>
    <option value="users">Registered Users</option>
    <option value="businesses">All Businesses (Restaurants, Accommodation providers and Vehicle Rental Services)</option>
    <option value="restaurants">Restaurants</option>
    <option value="accommodation Providers">Accommodation Providers</option>
    <option value="car-rentals">Vehicle Rentals</option>
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
    <a href="/areaadmin/notifications" class="btn-primary" style="background-color: #6c757d;">Go Back</a>
  </form>
</div>

</body>
</html>