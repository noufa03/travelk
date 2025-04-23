<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Location Details</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      background-color: #f8f9fa;
      color: #333;
    }

    h1 {
      font-size: 28px;
      font-weight: 600;
      color: #222;
      margin-bottom: 20px;
      margin-left: 20px;
    }

    .content {
      margin-left: 250px;
      padding: 30px;
      width: calc(100% - 210px);
      background-color: #ffffff;
      min-height: 100vh;
    }

    .signature-button {
      display: inline-block;
      padding: 12px 18px;
      background-color: #5EBC67;
      color: white;
      font-weight: bold;
      text-decoration: none;
      border-radius: 6px;
      text-align: center;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .signature-button:hover {
      background-color: #4fa858;
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

    table {
      width: 90%;
      border-collapse: collapse;
      margin: 0 20px 50px;
      background-color: #ffffff;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    th, td {
      padding: 14px 16px;
      text-align: left;
      border-bottom: 1px solid #dee2e6;
    }

    th {
      background-color: #f1f3f5;
      color: #333;
      font-weight: 600;
    }

    td {
      color: #555;
      background-color: #ffffff;
    }

    .error-message {
      margin-left: 20px;
      color: #dc3545;
      font-weight: 500;
    }
  </style>
</head>
<body>

    <div class="sidebar">
        <?php include('../Http/controllers/areaadmin/sidebar.php'); ?>
    </div>

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
          <th>District</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ((array) $restaurants as $restaurant): ?>
          <tr>
            <td><?= htmlspecialchars((string) ($restaurant['display_name'] ?? 'N/A')) ?></td>
            <td><?= htmlspecialchars((string) ($restaurant['city'] ?? 'N/A')) ?></td>
            <td><?= htmlspecialchars((string) ($restaurant['hot_line'] ?? 'N/A')) ?></td>
            <td><?= htmlspecialchars((string) ($restaurant['district'] ?? 'N/A')) ?></td>
            <td>
              <a href="#" class="signature-button">View</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

</body>
</html>