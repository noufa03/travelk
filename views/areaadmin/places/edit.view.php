<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Location</title>
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
        <h1>Update Location</h1>

        <form action="/admin/places/update" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $location['locationid'] ?>">

            <label for="location_type">Location Type:</label>
            <input type="text" id="location_type" name="location_type" value="<?= $location['location_type'] ?>" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= $location['name'] ?>" required>

            <label for="display_name">Display Name:</label>
            <input type="text" id="display_name" name="display_name" value="<?= $location['display_name'] ?>">

            <label for="street_address">Street Address:</label>
            <textarea id="street_address" name="street_address" required><?= $location['street_address'] ?></textarea>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="<?= $location['city'] ?>" required>

            <label for="google_map_link">Google Map Link:</label>
            <input type="url" id="google_map_link" name="google_map_link" value="<?= $location['google_map_link'] ?>">

            <label for="photos">Photos:</label>
            <input type="text" id="photos" name="photos" value="<?= $location['photos'] ?>">

            <label for="hot_line">Hotline:</label>
            <input type="text" id="hot_line" name="hot_line" value="<?= $location['hot_line'] ?>">

            <label for="userid">User ID:</label>
            <input type="number" id="userid" name="userid" value="<?= $location['userid'] ?>">

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?= $place['description'] ?></textarea>

            <?php
                $keywords = isset($place['key_words']) ? (is_array($place['key_words']) ? $place['key_words'] : explode(',', trim($place['key_words'], '{}'))) : [];
                $keywordsString = implode(', ', $keywords);
            ?>
            <label for="key_words">Key Words (comma-separated):</label>
            <input type="text" id="key_words" name="key_words" value="<?= htmlspecialchars($keywordsString) ?>">

            <label for="categoryid">Category ID:</label>
            <input type="number" id="categoryid" name="categoryid" value="<?= $place['categoryid'] ?>" required>

            <label for="open_h">Opening Hours:</label>
            <input type="text" id="open_h" name="open_h" value="<?= $place['open_h'] ?>">

            <label for="entry_fee_type">Entry Fee Type:</label>
            <input type="text" id="entry_fee_type" name="entry_fee_type" value="<?= $place['entry_fee_type'] ?>">

            <label for="entry_fee">Entry Fee:</label>
            <input type="number" step="0.01" id="entry_fee" name="entry_fee" value="<?= $place['entry_fee'] ?>" min="0">

            <label for="best_travel_time">Best Travel Time:</label>
            <input type="text" id="best_travel_time" name="best_travel_time" value="<?= $place['best_travel_time'] ?>">

            <label for="accessibility">Accessibility:</label>
            <textarea id="accessibility" name="accessibility"><?= $place['accessibility'] ?></textarea>

            <button type="submit">Update Location</button>
        </form>
    </div>
</body>
</html>