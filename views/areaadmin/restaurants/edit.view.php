<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Location</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Update Location</h1>

    <form action="/admin/locations/update" method="POST">
        <input type="hidden" name="_method" value="PATCH"> <!-- This ensures the form uses PATCH -->
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

        <label for="districtid">District ID:</label>
        <input type="number" id="districtid" name="districtid" value="<?= $location['districtid'] ?>" required>

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
</body>
</html>