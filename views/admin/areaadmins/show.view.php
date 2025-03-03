<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        /* Main Content */
        .content {
            margin-left: 280px;
            padding: 20px;
            width: calc(100% - 280px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .button {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            text-decoration: none;
            display: flex;           /* Added */
            align-items: center;     /* Added */
            justify-content: center; /* Added for horizontal centering */
        }

        .update-button {
            background-color: #007BFF;
            display: flex;           /* Added */
            align-items: center;     /* Added */
            justify-content: center; /* Added */
        }

        .delete-button {
            background-color: #FF5733;
        }

        .view-button {
            background-color: #28a745;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
            max-height: 70vh;
            overflow-y: auto;
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }

        .btn-primary {
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            margin-top: 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Popup Background */
        .popup-background {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        /* Popup Container */
        .popup {
            background: white;
            width: 50%;
            max-width: 600px;
            padding: 20px;
            margin: 5% auto;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
            position: relative;
            max-height: 80vh; /* Set maximum height */
            overflow-y: auto; /* Allow vertical scrolling */
        }

        /* Close Button */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
            color: #333;
        }

        /* Close Button Hover Effect */
        .close-btn:hover {
            color: red;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input, textarea {
            padding: 10px;
            margin: 10px 0 20px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 12px;
            font-size: 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>

    <?php include('../Http/controllers/admin/sidebar.php'); ?>

    <div class="content">
        <h1><?= $heading ?></h1>

        <?php if (empty($areaadmins) || !is_array($areaadmins)): ?>
            <p class="error-message">No admins found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Admin Name</th>
                        <th>Administrating District</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ((array) $areaadmins as $areaadmin): ?>
                        <tr>
                            <td><?= htmlspecialchars(($areaadmin['first_name'] ?? 'N/A') . ' ' . ($areaadmin['last_name'] ?? '')) ?></td>
                            <td><?= htmlspecialchars((string) ($areaadmin['district'] ?? 'N/A')) ?></td>
                            <td><?= htmlspecialchars((string) ($areaadmin['con_num'] ?? 'N/A')) ?></td>
                            <td><?= htmlspecialchars((string) ($areaadmin['email'] ?? 'N/A')) ?></td>
                            <td class="action-buttons">
                                <a href="/admin/locations/edit?id=<?= $location['locationid'] ?>" class="button update-button">Edit</a>
                                <form action="/admin/locations/delete" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($location['locationid']) ?>">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="button delete-button">Delete</button>
                                </form>
                                <button class="button view-button" onclick="openModal(<?= htmlspecialchars(json_encode($location)) ?>)">View More</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/admin/locations/create" class="btn-primary" id="openPopup">Recruit</a>
        <?php endif; ?>
    </div>

    <!-- Modal -->
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <h2>Location Details</h2>
            <p><strong>Location Type:</strong> <span id="modal-location-type"></span></p>
            <p><strong>Name:</strong> <span id="modal-name"></span></p>
            <p><strong>Display Name:</strong> <span id="modal-display-name"></span></p>
            <p><strong>Street Address:</strong> <span id="modal-street-address"></span></p>
            <p><strong>City:</strong> <span id="modal-city"></span></p>
            <p><strong>Google Map Link:</strong> <a id="modal-map-link" href="#" target="_blank">View on Map</a></p>
            <p><strong>Hotline:</strong> <span id="modal-hotline"></span></p>
            

            <h3>Place Details</h3>
            <p><strong>Description:</strong> <span id="modal-description"></span></p>
            <p><strong>Keywords:</strong> <span id="modal-keywords"></span></p>
            <p><strong>Category ID:</strong> <span id="modal-categoryid"></span></p>
            <p><strong>Open Hours:</strong> <span id="modal-open-hours"></span></p>
            <p><strong>Entry Fee Type:</strong> <span id="modal-entry-fee-type"></span></p>
            <p><strong>Entry Fee:</strong> <span id="modal-entry-fee"></span></p>
            <p><strong>Best Travel Time:</strong> <span id="modal-travel-time"></span></p>
            <p><strong>Accessibility:</strong> <span id="modal-accessibility"></span></p>
        </div>
    </div>

    <!-- Popup Background -->
    <div id="popupBackground" class="popup-background">
        <div class="popup">
            <span class="close-btn" id="closePopup">&times;</span>
            <h2>Add New Location</h2>

            <form action="/admin/locations" method="POST">
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

                <label for="districtid">District ID:</label>
                <input type="number" id="districtid" name="districtid" required>

                <label for="photos">Photos:</label>
                <input type="text" id="photos" name="photos">

                <label for="hot_line">Hotline:</label>
                <input type="text" id="hot_line" name="hot_line">

                <label for="userid">User ID:</label>
                <input type="number" id="userid" name="userid">

                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>

                <label for="key_words">Key Words (comma-separated):</label>
                <input type="text" id="key_words" name="key_words">

                <label for="categoryid">Category ID:</label>
                <input type="number" id="categoryid" name="categoryid" required>

                <label for="open_h">Opening Hours:</label>
                <input type="text" id="open_h" name="open_h">

                <label for="entry_fee_type">Entry Fee Type:</label>
                <input type="text" id="entry_fee_type" name="entry_fee_type">

                <label for="entry_fee">Entry Fee:</label>
                <input type="number" id="entry_fee" name="entry_fee">

                <label for="best_travel_time">Best Travel Time:</label>
                <input type="text" id="best_travel_time" name="best_travel_time">

                <label for="accessibility">Accessibility:</label>
                <input type="text" id="accessibility" name="accessibility">

                <button type="submit">Add Location</button>
            </form>
        </div>
    </div>

    <div id="editPopupBackground" class="popup-background">
        <div class="popup">
            <span class="close-btn" onclick="closeEditPopup()">&times;</span>
            <h2>Edit Location</h2>

            <form id="editLocationForm" action="/admin/locations/update" method="POST">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" id="edit-locationid" name="id">

                <label for="edit-location_type">Location Type:</label>
                <input type="text" id="edit-location_type" name="location_type" required>

                <label for="edit-name">Name:</label>
                <input type="text" id="edit-name" name="name" required>

                <label for="edit-display_name">Display Name:</label>
                <input type="text" id="edit-display_name" name="display_name">

                <label for="edit-street_address">Street Address:</label>
                <textarea id="edit-street_address" name="street_address" required></textarea>

                <label for="edit-city">City:</label>
                <input type="text" id="edit-city" name="city" required>

                <label for="edit-google_map_link">Google Map Link:</label>
                <input type="url" id="edit-google_map_link" name="google_map_link">

                <label for="edit-districtid">District ID:</label>
                <input type="number" id="edit-districtid" name="districtid" required>

                <label for="edit-photos">Photos:</label>
                <input type="text" id="edit-photos" name="photos">

                <label for="edit-hot_line">Hotline:</label>
                <input type="text" id="edit-hot_line" name="hot_line">

                <label for="edit-userid">User ID:</label>
                <input type="number" id="edit-userid" name="userid">

                <label for="edit-description">Description:</label>
                <textarea id="edit-description" name="description"></textarea>

                <label for="edit-key_words">Key Words (comma-separated):</label>
                <input type="text" id="edit-key_words" name="key_words">

                <label for="edit-categoryid">Category ID:</label>
                <input type="number" id="edit-categoryid" name="categoryid" required>

                <label for="edit-open_h">Opening Hours:</label>
                <input type="text" id="edit-open_h" name="open_h">

                <label for="edit-entry_fee_type">Entry Fee Type:</label>
                <input type="text" id="edit-entry_fee_type" name="entry_fee_type">

                <label for="edit-entry_fee">Entry Fee:</label>
                <input type="number" step="0.01" id="edit-entry_fee" name="entry_fee" min="0">

                <label for="edit-best_travel_time">Best Travel Time:</label>
                <input type="text" id="edit-best_travel_time" name="best_travel_time">

                <label for="edit-accessibility">Accessibility:</label>
                <textarea id="edit-accessibility" name="accessibility"></textarea>

                <button type="submit">Update Location</button>
            </form>
        </div>
    </div>

    <script>
        // Open the popup modal
        document.getElementById('openPopup').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('popupBackground').style.display = 'block';
        });

        // Close the popup modal when clicking "X"
        document.getElementById('closePopup').addEventListener('click', function() {
            document.getElementById('popupBackground').style.display = 'none';
        });

        // Close modal when clicking outside the popup
        window.onclick = function(event) {
            if (event.target === document.getElementById('popupBackground')) {
                document.getElementById('popupBackground').style.display = 'none';
            }
        };

        function closeEditPopup() {
            document.getElementById('editPopupBackground').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target === document.getElementById('editPopupBackground')) {
                closeEditPopup();
        }
}

        // Modal (View More) functionality
        function openModal(location) {
            document.getElementById('modal-location-type').textContent = location.location_type || 'N/A';
            document.getElementById('modal-name').textContent = location.name || 'N/A';
            document.getElementById('modal-display-name').textContent = location.display_name || 'N/A';
            document.getElementById('modal-street-address').textContent = location.street_address || 'N/A';
            document.getElementById('modal-city').textContent = location.city || 'N/A';
            document.getElementById('modal-map-link').href = location.google_map_link || '#';
            document.getElementById('modal-hotline').textContent = location.hot_line || 'N/A';
            document.getElementById('modal-description').textContent = location.description || 'N/A';
            document.getElementById('modal-keywords').textContent = location.key_words || 'N/A';
            document.getElementById('modal-categoryid').textContent = location.categoryid || 'N/A';
            document.getElementById('modal-open-hours').textContent = location.open_h || 'N/A';
            document.getElementById('modal-entry-fee-type').textContent = location.entry_fee_type || 'N/A';
            document.getElementById('modal-entry-fee').textContent = location.entry_fee || 'N/A';
            document.getElementById('modal-travel-time').textContent = location.best_travel_time || 'N/A';
            document.getElementById('modal-accessibility').textContent = location.accessibility || 'N/A';

            document.getElementById('detailModal').style.display = 'block';
        }

        function openEditPopup(location) {
            document.getElementById('edit-locationid').value = location.locationid || '';
            document.getElementById('edit-location_type').value = location.location_type || '';
            document.getElementById('edit-name').value = location.name || '';
            document.getElementById('edit-display_name').value = location.display_name || '';
            document.getElementById('edit-street_address').value = location.street_address || '';
            document.getElementById('edit-city').value = location.city || '';
            document.getElementById('edit-google_map_link').value = location.google_map_link || '';
            document.getElementById('edit-districtid').value = location.districtid || '';
            document.getElementById('edit-photos').value = location.photos || '';
            document.getElementById('edit-hot_line').value = location.hot_line || '';
            document.getElementById('edit-userid').value = location.userid || '';
            document.getElementById('edit-description').value = location.description || '';
            document.getElementById('edit-key_words').value = (location.key_words || []).join(', ');
            document.getElementById('edit-categoryid').value = location.categoryid || '';
            document.getElementById('edit-open_h').value = location.open_h || '';
            document.getElementById('edit-entry_fee_type').value = location.entry_fee_type || '';
            document.getElementById('edit-entry_fee').value = location.entry_fee || '';
            document.getElementById('edit-best_travel_time').value = location.best_travel_time || '';
            document.getElementById('edit-accessibility').value = location.accessibility || '';

            document.getElementById('editPopupBackground').style.display = 'block';
        }

        // Close the modal
        function closeModal() {
            document.getElementById('detailModal').style.display = 'none';
        }

        // Close modal when clicking "X"
        document.querySelector('.close-modal').addEventListener('click', closeModal);
        
        // Close modal when clicking outside the modal
        window.onclick = function(event) {
            if (event.target === document.getElementById('detailModal')) {
                closeModal();
            }
        }
    </script>

</body>
</html>