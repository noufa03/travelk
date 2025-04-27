<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Location Details</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f7f9;
      color: #333;
      display: flex;
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

    .logout-btn {
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

    .logout-btn:hover {
      background-color: #5EBC67;
      color: #fff;
    }

    /* Header Styles */
    .header {
      position: fixed;
      left: 210px;
      width: calc(100% - 210px);
      height: 60px;
      background-color: #f5f6f5;
      border-bottom: 1px solid #ddd;
      box-shadow: none;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      padding: 0 20px;
      font-family: 'Poppins', sans-serif;
      z-index: 1000;
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

    /* Content Styles */
    .content {
      margin-left: 210px;
      padding: 40px;
      width: calc(100% - 210px);
      min-height: 100vh;
      margin-top: 60px;
      background-color: #ffffff;
    }

    h1 {
      font-size: 24px;
      font-weight: 600;
      color: #333;
      margin-bottom: 20px;
      margin-left: 20px;
      padding-bottom: 15px;
      border-bottom: 3px solid #5EBC67;
    }

    table {
      width: 90%;
      border-collapse: collapse;
      margin: 0 20px 50px;
      background-color: #ffffff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
    }

    th, td {
      padding: 14px 16px;
      text-align: left;
      border-bottom: 1px solid #eaeef2;
    }

    th {
      background-color: #f8fbf8;
      color: #444;
      font-weight: 600;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    td {
      color: #555;
      font-size: 14px;
    }

    .signature-button {
      padding: 12px 24px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      text-decoration: none;
      font-size: 15px;
      font-weight: 600;
      transition: background-color 0.2s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: white;
      background-color: #6c757d;
    }

    .signature-button:hover {
      background-color: #5c636a;
    }

    .error-message {
      margin-left: 20px;
      color: #dc3545;
      font-weight: 500;
      font-size: 14px;
      margin-bottom: 20px;
    }

    @media (max-width: 1024px) {
      .sidebar {
        width: 210px;
      }

      .header {
        left: 0;
        width: 100%;
      }

      .content {
        margin-left: 0;
        width: 100%;
        padding: 20px;
      }
    }

    @media (max-width: 768px) {
      table {
        font-size: 13px;
      }

      th, td {
        padding: 10px 12px;
      }

      .signature-button {
        padding: 10px 12px;
        font-size: 14px;
      }
    }

    @media (max-width: 600px) {
      .content {
        padding: 15px;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <?php include('../Http/controllers/areaadmin/sidebar.php'); ?>
  </div>
  <?php include('../Http/controllers/areaadmin/header.php'); ?>
  <div class="content">
    <h1><?= $heading ?></h1>

    <?php if (empty($restaurants) || !is_array($restaurants)): ?>
      <p class="error-message">No restaurants found.</p>
    <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>City</th>
            <th>Contact</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ((array) $restaurants as $restaurant): ?>
            <tr>
              <td><?= htmlspecialchars((string) ($restaurant['display_name'] ?? 'N/A')) ?></td>
              <td><?= htmlspecialchars((string) ($restaurant['city'] ?? 'N/A')) ?></td>
              <td><?= htmlspecialchars((string) ($restaurant['hot_line'] ?? 'N/A')) ?></td>
              <td>
                <a href="/resturent?id=<?= urlencode($restaurant['locationid']) ?>" class="signature-button">View</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</body>
</html>