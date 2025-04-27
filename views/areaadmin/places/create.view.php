<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Location</title>
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
    }

    .header {
      position: fixed;
      top: 0;
      left: 250px;
      width: calc(100% - 250px);
      height: 60px;
      background-color: #f5f6f5;
      border-bottom: 1px solid #ddd;
      box-shadow: none;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      padding: 0 20px;
      font-family: 'Poppins', sans-serif;
      z-index: 1200;
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
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .container {
      margin-left: 250px;
      margin-top: 60px;
      padding: 40px;
      width: calc(100% - 250px);
      background-color: #f5f7f9;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      z-index: 1100;
    }

    h1 {
      font-size: 24px;
      font-weight: 600;
      color: #333;
      margin-bottom: 30px;
      padding-bottom: 15px;
      border-bottom: 3px solid #5EBC67;
      text-align: left;
      width: 100%;
      max-width: 800px;
    }

    .form-container {
      width: 100%;
      max-width: 800px;
      background-color: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
    }

    .form-section {
      margin-bottom: 25px;
      padding-bottom: 20px;
      border-bottom: 1px solid #eaeef2;
    }

    .form-section:last-child {
      border-bottom: none;
    }

    .section-title {
      font-size: 14px;
      font-weight: 600;
      color: #444;
      margin-bottom: 15px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .form-row {
      margin-bottom: 16px;
    }

    .form-row:last-child {
      margin-bottom: 0;
    }

    .form-row-flex {
      display: flex;
      gap: 20px;
      margin-bottom: 16px;
    }

    .form-col {
      flex: 1;
    }

    .form-col-60 {
      flex: 6;
    }

    .form-col-40 {
      flex: 4;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
      color: #444;
      font-size: 14px;
    }

    input,
    textarea,
    select {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #dfe3e9;
      border-radius: 6px;
      font-size: 14px;
      color: #333;
      background-color: #fff;
      transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    input:focus,
    textarea:focus,
    select:focus {
      outline: none;
      border-color: #5EBC67;
      box-shadow: 0 0 0 3px rgba(94, 188, 103, 0.15);
    }

    select {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
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

    .add-location-btn {
      background-color: #5EBC67;
      color: #fff;
      padding: 8px 16px;
      font-size: 14px;
      font-weight: 500;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      transition: background-color 0.2s;
      width: 100%;
      max-width: 200px;
      text-align: center;
      margin-top: 10px;
    }

    .add-location-btn:hover {
      background-color: #4fa858;
    }

    .button-container {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .cancel-btn {
      background-color: #6c757d;
      color: #fff;
      padding: 8px 16px;
      font-size: 14px;
      font-weight: 500;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      transition: background-color 0.2s;
      width: 100%;
      max-width: 200px;
      text-align: center;
      text-decoration: none;
      margin-top: 10px;
      display: inline-block;
    }

    .cancel-btn:hover {
      background-color: #5c636a;
    }

    .fee-input-container {
      position: relative;
    }

    .fee-input-container input {
      padding-right: 50px;
    }

    .fee-input-container::after {
      content: "LKR";
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #666;
      font-size: 14px;
      pointer-events: none;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .slider-container {
      padding: 18px 20px;
      background-color: #f8fbf8;
      border: 1px solid #e0e9e2;
      border-radius: 8px;
      height: 100%;
    }

    .slider-title {
      font-weight: 600;
      color: #444;
      margin-bottom: 15px;
      font-size: 14px;
    }

    .slider-controls {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .slider-wrapper {
      position: relative;
    }

    input[type="range"] {
      width: 100%;
      height: 8px;
      background-color: #e6e6e6;
      border-radius: 4px;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      margin: 8px 0;
      cursor: pointer;
      border: none;
      padding: 0;
    }

    input[type="range"]::-webkit-slider-runnable-track {
      height: 8px;
      border-radius: 4px;
      background-color: #e6e6e6;
    }

    input[type="range"]::-webkit-slider-thumb {
      width: 20px;
      height: 20px;
      background-color: #5EBC67;
      border-radius: 50%;
      border: 2px solid white;
      cursor: pointer;
      -webkit-appearance: none;
      appearance: none;
      transition: background-color 0.2s ease;
      margin-top: -6px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    input[type="range"]::-moz-range-track {
      height: 8px;
      border-radius: 4px;
      background-color: #e6e6e6;
    }

    input[type="range"]::-moz-range-thumb {
      width: 20px;
      height: 20px;
      background-color: #5EBC67;
      border-radius: 50%;
      border: 2px solid white;
      cursor: pointer;
      transition: background-color 0.2s ease;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    input[type="range"]:focus {
      outline: none;
    }

    input[type="range"]:focus::-webkit-slider-thumb {
      background-color: #4fa858;
      box-shadow: 0 0 0 3px rgba(94, 188, 103, 0.2);
    }

    input[type="range"]:focus::-moz-range-thumb {
      background-color: #4fa858;
      box-shadow: 0 0 0 3px rgba(94, 188, 103, 0.2);
    }

    input[type="range"]:active::-webkit-slider-thumb {
      background-color: #488f45;
    }

    input[type="range"]:active::-moz-range-thumb {
      background-color: #488f45;
    }

    .slider-label {
      font-size: 13px;
      color: #555;
      margin-bottom: 5px;
      display: block;
    }

    .time-display {
      background-color: white;
      border: 1px solid #dfe3e9;
      border-radius: 5px;
      padding: 8px 10px;
      font-size: 15px;
      font-weight: 500;
      color: #333;
      text-align: center;
      margin-top: 10px;
      box-shadow: inset 0 1px 3px rgba(0,0,0,0.03);
    }

    .file-upload-container {
      height: 100%;
      padding: 18px 20px;
      background-color: #f8fbf8;
      border: 1px solid #e0e9e2;
      border-radius: 8px;
    }

    .file-upload-title {
      font-weight: 600;
      color: #444;
      margin-bottom: 15px;
      font-size: 14px;
    }

    .file-upload-area {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 15px;
      border: 2px dashed #dfe3e9;
      border-radius: 6px;
      background-color: #fafbfc;
      transition: border-color 0.2s ease, background-color 0.2s ease;
      height: calc(100% - 30px);
    }

    .file-upload-area:hover {
      border-color: #5-madeEBC67;
      background-color: #f9fcf9;
    }

    input[type="file"] {
      width: 0.1px;
      height: 0.1px;
      opacity: 0;
      overflow: hidden;
      position: absolute;
      z-index: -1;
    }

    input[type="file"] + label {
      display: inline-block;
      cursor: pointer;
      background-color: #5EBC67;
      color: white;
      padding: 8px 16px;
      font-size: 14px;
      border-radius: 4px;
      transition: background-color 0.2s ease;
      margin-bottom: 8px;
      font-weight: 500;
      text-align: center;
    }

    input[type="file"] + label:hover {
      background-color: #4fa858;
    }

    #photo-info {
      font-size: 13px;
      color: #666;
      margin-top: 8px;
    }

    .fee-container {
      height: 100%;
      padding: 18px 20px;
      background-color: #f8fbf8;
      border: 1px solid #e0e9e2;
      border-radius: 8px;
    }

    .fee-title {
      font-weight: 600;
      color: #444;
      margin-bottom: 15px;
      font-size: 14px;
    }

    .checkbox-grid {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      grid-gap: 10px;
      margin-top: 5px;
    }

    .checkbox-item {
      display: flex;
      align-items: center;
    }

    .checkbox-item input[type="checkbox"] {
      width: auto;
      margin-right: 6px;
      cursor: pointer;
    }

    .checkbox-item label {
      font-size: 13px;
      margin-bottom: 0;
      cursor: pointer;
      color: #444;
      font-weight: normal;
    }

    .checkbox-item input[type="checkbox"] {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      width: 18px;
      height: 18px;
      border: 1px solid #dfe3e9;
      border-radius: 4px;
      outline: none;
      transition: all 0.2s ease;
      position: relative;
      cursor: pointer;
      flex-shrink: 0;
    }

    .checkbox-item input[type="checkbox"]:checked {
      background-color: #5EBC67;
      border-color: #5EBC67;
    }

    .checkbox-item input[type="checkbox"]:checked::after {
      content: '';
      position: absolute;
      left: 6px;
      top: 2px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 2px 2px 0;
      transform: rotate(45deg);
    }

    .checkbox-item input[type="checkbox"]:focus {
      border-color: #5EBC67;
      box-shadow: 0 0 0 3px rgba(94, 188, 103, 0.15);
    }

    @media (max-width: 768px) {
      .checkbox-grid {
        grid-template-columns: repeat(3, 1fr);
      }

      .container {
        margin-left: 0;
        width: 100%;
        padding: 20px;
      }

      .header {
        left: 0;
        width: 100%;
      }

      .sidebar {
        width: 100%;
        height: auto;
        position: static;
        box-shadow: none;
        border-bottom: 1px solid #ddd;
      }

      .form-container {
        padding: 20px;
      }

      .form-row-flex {
        flex-direction: column;
        gap: 16px;
      }

      .form-col,
      .form-col-60,
      .form-col-40 {
        width: 100%;
      }
    }

    @media (max-width: 480px) {
      .checkbox-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }
  </style>
  <script>
    function formatTime(minutes) {
      const hrs = String(Math.floor(minutes / 60)).padStart(2, '0');
      const mins = String(minutes % 60).padStart(2, '0');
      return `${hrs}:${mins}`;
    }

    function updateTimeDisplay(startId, endId, displayId, hiddenId) {
      let start = parseInt(document.getElementById(startId).value);
      let end = parseInt(document.getElementById(endId).value);
      if (end <= start) {
        end = start + 30;
        document.getElementById(endId).value = end;
      }
      const display = `${formatTime(start)} - ${formatTime(end)}`;
      document.getElementById(displayId).textContent = display;
      document.getElementById(hiddenId).value = display;
    }

    window.addEventListener('DOMContentLoaded', () => {
      document.getElementById('startTimeVisit').value = 540;
      document.getElementById('endTimeVisit').value = 960;
      updateTimeDisplay('startTimeVisit', 'endTimeVisit', 'timeDisplayVisit', 'open_h');

      const fileInput = document.getElementById('photos');
      const photoInfo = document.getElementById('photo-info');

      fileInput.addEventListener('change', function(e) {
        const count = this.files.length;
        photoInfo.textContent = count > 0 ?
          `${count} photo${count !== 1 ? 's' : ''} selected` :
          'No photos selected';
      });
    });
  </script>
</head>
<body>
  <?php include('../Http/controllers/areaadmin/header.php'); ?>
  <div class="sidebar">
    <?php include('../Http/controllers/areaadmin/sidebar.php'); ?>
  </div>

  <div class="container">
    <h1>Add New Location</h1>

    <div class="form-container">
      <form action="/areaadmin/places" method="POST" enctype="multipart/form-data">
        <div class="form-section">
          <div class="section-title">Basic Information</div>
          <div class="form-row-flex">
            <div class="form-col">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" required>
            </div>
            <div class="form-col">
              <label for="display_name">Display Name:</label>
              <input type="text" id="display_name" name="display_name">
            </div>
          </div>
          <div class="form-row">
            <label for="street_address">Street Address:</label>
            <textarea id="street_address" name="street_address" required></textarea>
          </div>
          <div class="form-row-flex">
            <div class="form-col">
              <label for="city">City:</label>
              <input type="text" id="city" name="city" required>
            </div>
            <div class="form-col">
              <label for="latitude">Latitude:</label>
              <input type="number" step="any" id="latitude" name="latitude">
            </div>
            <div class="form-col">
              <label for="longitude">Longitude:</label>
              <input type="number" step="any" id="longitude" name="longitude">
            </div>
          </div>
        </div>

        <div class="form-section">
          <div class="section-title">Location Details</div>
          <div class="form-row-flex">
            <div class="form-col-60">
              <label for="google_map_link">Google Map Link:</label>
              <input type="url" id="google_map_link" name="google_map_link">
            </div>
            <div class="form-col-40">
              <label for="categoryid">Category:</label>
              <select id="categoryid" name="categoryid" required>
                <option value="">Select Category</option>
                <option value="1">Historical</option>
                <option value="2">Pilgrimage</option>
                <option value="3">Natural</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
          </div>
          <div class="form-row">
            <label>Tags:</label>
            <div class="checkbox-grid">
              <div class="checkbox-item">
                <input type="checkbox" id="tag-adventure" name="tags[]" value="Adventure">
                <label for="tag-adventure">Adventure</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-relaxation" name="tags[]" value="Refresh">
                <label for="tag-relaxation">Refresh</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-sightseeing" name="tags[]" value="Sightseeing">
                <label for="tag-sightseeing">Sightseeing</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-cultural" name="tags[]" value="Cultural">
                <label for="tag-cultural">Cultural</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-wildlife" name="tags[]" value="Wildlife">
                <label for="tag-wildlife">Wildlife</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-solo" name="tags[]" value="Solo">
                <label for="tag-solo">Solo</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-couple" name="tags[]" value="Couple">
                <label for="tag-couple">Couple</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-family" name="tags[]" value="Family">
                <label for="tag-family">Family</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-friends" name="tags[]" value="Friends">
                <label for="tag-friends">Friends</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-business" name="tags[]" value="Business">
                <label for="tag-business">Business</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-mountains" name="tags[]" value="Mountains">
                <label for="tag-mountains">Mountains</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-beaches" name="tags[]" value="Beaches">
                <label for="tag-beaches">Beaches</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-forests" name="tags[]" value="Forests">
                <label for="tag-forests">Forests</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-urban" name="tags[]" value="Urban">
                <label for="tag-urban">Urban</label>
              </div>
              <div class="checkbox-item">
                <input type="checkbox" id="tag-country" name="tags[]" value="Country">
                <label for="tag-country">Country</label>
              </div>
            </div>
          </div>
        </div>

        <div class="form-section">
          <div class="section-title">Visitor Information</div>
          <div class="form-row-flex">
            <div class="form-col">
              <div class="slider-container">
                <div class="slider-title">Best Visiting Hours</div>
                <div class="slider-controls">
                  <div class="slider-wrapper">
                    <span class="slider-label">Start Time</span>
                    <input type="range" id="startTimeVisit" name="startTimeVisit" min="0" max="1410" step="30"
                      oninput="updateTimeDisplay('startTimeVisit', 'endTimeVisit', 'timeDisplayVisit', 'open_h')" />
                  </div>
                  <div class="slider-wrapper">
                    <span class="slider-label">End Time</span>
                    <input type="range" id="endTimeVisit" name="endTimeVisit" min="0" max="1410" step="30"
                      oninput="updateTimeDisplay('startTimeVisit', 'endTimeVisit', 'timeDisplayVisit', 'open_h')" />
                  </div>
                  <div class="time-display" id="timeDisplayVisit">09:00 - 16:00</div>
                  <input type="hidden" id="open_h" name="open_h" value="09:00 - 16:00">
                </div>
              </div>
            </div>
            <div class="form-col">
              <div class="fee-container">
                <div class="fee-title">Entry Fee</div>
                <div class="fee-input-container">
                  <input type="number" step="0.01" id="entry_fee" name="entry_fee" min="0" placeholder="0.00">
                </div>
              </div>
            </div>
            <div class="form-col">
              <div class="file-upload-container">
                <div class="file-upload-title">Location Photos</div>
                <div class="file-upload-area">
                  <input type="file" id="photos" name="photos[]" accept="image/*" multiple>
                  <label for="photos">Choose Files</label>
                  <p id="photo-info">No photos selected</p>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <label for="accessibility">Accessibility:</label>
            <textarea id="accessibility" name="accessibility"></textarea>
          </div>
          <div class="form-row">
            <label for="best_travel_time">Best Travel Time:</label>
            <input type="text" id="best_travel_time" name="best_travel_time">
          </div>
        </div>

        <div class="button-container">
          <button class="add-location-btn" type="submit">Add Location</button>
          <a href="/areaadmin/places" class="cancel-btn">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>