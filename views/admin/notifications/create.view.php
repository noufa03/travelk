<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Notification</title>
  <style>
    <?php // You can move this to a separate CSS file if reused ?>
    /* Reusing your styles from the original form */
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
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 15px;
      color: #333;
      background-color: #fff;
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
      textarea {
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