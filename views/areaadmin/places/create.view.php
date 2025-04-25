<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Location</title>
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

    .sidebar {
      width: 210px;
      background-color: #ffffff;
      padding: 30px 20px;
      position: fixed;
      height: 100%;
      left: 0;
      top: 0;
      border-right: 1px solid #ddd;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.05);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      max-width: 250px;
      min-width: 250px;
    }

    .logo-container {
      text-align: center;
      margin-bottom: 30px;
    }

    .logo {
      width: 120px;
      height: auto;
      display: block;
      margin: 0 auto;
      object-fit: contain;
      margin-top: 30px;
    }

    .sidebar ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
      flex-grow: 1;
    }

    .sidebar ul li {
      margin-bottom: 18px;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: #333;
      font-size: 16px;
      font-weight: 500;
      padding: 10px 14px;
      display: flex;
      align-items: center;
      gap: 10px;
      border-radius: 6px;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .sidebar ul li a:hover {
      background-color: #5EBC67;
      color: #fff;
    }

    .sidebar ul li form {
      margin: 0;
      padding: 0;
      box-shadow: none;
      background: none;
      width: auto;
    }

    .logout-btn {
      background: none;
      border: none;
      text-decoration: none;
      color: #333;
      font-size: 16px;
      font-weight: 500;
      padding: 10px 14px;
      display: flex;
      align-items: center;
      gap: 10px;
      border-radius: 6px;
      transition: background-color 0.3s ease, color 0.3s ease;
      width: 100%;
      text-align: left;
      cursor: pointer;
      font-family: inherit;
    }

    .logout-btn:hover {
      background-color: #5EBC67;
      color: #fff;
    }

    .content-area {
      margin-left: 210px;
      padding: 30px;
      width: calc(100% - 210px);
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

    .form-container {
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
    }

    select {
      appearance: none;
      background-image: url("data:image/svg+xml;utf8,<svg fill='%23333' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
      background-repeat: no-repeat;
      background-position: right 12px center;
      background-size: 18px 18px;
      padding-right: 40px;
      cursor: pointer;
    }

    textarea {
      resize: vertical;
      min-height: 100px;
    }

    button[type="submit"].form-submit {
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

    button[type="submit"].form-submit:hover {
      background-color: #4fa858;
    }

    @media (max-width: 1024px) {
      .sidebar {
        width: 100%;
        position: relative;
        height: auto;
      }

      .content-area {
        margin-left: 0;
        width: 100%;
        padding: 20px;
      }
    }

    @media (max-width: 600px) {
      .form-container {
        padding: 20px;
      }

      input,
      textarea,
      select {
        font-size: 14px;
        padding: 10px;
      }

      button[type="submit"].form-submit {
        width: 100%;
      }
    }
  </style>
</head>
<body>

  <?php include('../Http/controllers/areaadmin/sidebar.php'); ?>

  <div class="content-area">
    <h1>Add New Location</h1>

    <form action="/areaadmin/places" method="POST" class="form-container" enctype="multipart/form-data">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="display_name">Display Name:</label>
      <input type="text" id="display_name" name="display_name">

      <label for="street_address">Street Address:</label>
      <textarea id="street_address" name="street_address" required></textarea>

      <label for="city">City:</label>
      <input type="text" id="city" name="city" required>

      <label for="google_map_link">Google Map Link:</label>
      <input type="url" id="google_map_link" name="google_map_link">

      <label for="photos">Photos:</label>
      <input type="file" id="photos" name="photos[]" multiple accept="image/*">

      <label for="description">Description:</label>
      <textarea id="description" name="description"></textarea>

      <label for="key_words">Key Words (comma-separated):</label>
      <input type="text" id="key_words" name="key_words">

      <label for="categoryid">Category:</label>
      <select id="categoryid" name="categoryid" required>
        <option value="">Select Category</option>
        <option value="1">Historical</option>
        <option value="2">Pilgrimage</option>
        <option value="3">Natural</option>
      </select>

      <label for="open_h">Opening Hours:</label>
      <input type="text" id="open_h" name="open_h">

      <label for="entry_fee_type">Entry Fee Type:</label>
      <input type="text" id="entry_fee_type" name="entry_fee_type">

      <label for="entry_fee">Entry Fee:</label>
      <input type="number" step="0.01" id="entry_fee" name="entry_fee" min="0">

      <label for="best_travel_time">Best Travel Time:</label>
      <input type="text" id="best_travel_time" name="best_travel_time">

      <label for="accessibility">Accessibility:</label>
      <textarea id="accessibility" name="accessibility"></textarea>

      <button type="submit" class="form-submit">Add Location</button>
    </form>
  </div>

  <script>
  const photoInput = document.getElementById('photos');

  photoInput.addEventListener('change', function () {
    const fileCount = this.files.length;
    alert(`You have selected ${fileCount} image(s).`);
  });
</script>

</body>
</html>