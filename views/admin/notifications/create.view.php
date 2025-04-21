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

  .container {
    margin-left: 280px;
    padding: 30px;
    width: calc(100% - 280px);
    background-color: #ffffff;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  h1 {
    font-size: 28px;
    font-weight: 600;
    color: #222;
    margin-bottom: 30px;
    text-align: center;
  }

  form {
    width: 100%;
    max-width: 800px;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
  }

  label {
    display: block;
    margin-top: 18px;
    margin-bottom: 6px;
    font-weight: bold;
    color: #222;
  }

  input,
  textarea,
  select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 15px;
    color: #333;
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

  select:focus {
    outline: none;
    border-color: #5EBC67;
    box-shadow: 0 0 0 3px rgba(94, 188, 103, 0.2);
  }

  textarea {
    resize: vertical;
    min-height: 100px;
  }

  button[type="submit"] {
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

  button[type="submit"]:hover {
    background-color: #4fa858;
  }

  .error {
    color: #d9534f;
    font-size: 14px;
    margin-top: 4px;
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

    input,
    textarea,
    select {
      font-size: 14px;
      padding: 10px;
    }

    button[type="submit"] {
      width: 100%;
    }
  }
</style>
</head>
<body>

<?php include('../Http/controllers/admin/sidebar.php'); ?>

<div class="container">
  <h1>Send admin Notification</h1>

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
  </form>
</div>

</body>
</html>