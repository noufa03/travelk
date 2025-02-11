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
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            position: relative;
        }

        td a {
            color: #007BFF;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            font-weight: bold;
        }

        /* Resizer Styling */
        th .resizer {
            position: absolute;
            right: 0;
            top: 0;
            width: 5px;
            height: 100%;
            cursor: col-resize;
            background-color: transparent;
        }

        /* Add Location Button Styling */
        .add-location-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }

        .add-location-button:hover {
            background-color: #0056b3;
        }

        /* Action Buttons Styling */
        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .update-button, .delete-button {
            padding: 5px 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-button:hover {
            background-color: #0056b3;
        }

        .delete-button {
            background-color: #FF5733;
        }

        .delete-button:hover {
            background-color: #D43F00;
        }
    </style>
</head>

<body>
    <h1><?= $heading ?></h1>

    <?php if (empty($locations) || !is_array($locations)): ?>
        <p class="error-message">No locations found.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Location ID<div class="resizer"></div></th>
                    <th>Location Type<div class="resizer"></div></th>
                    <th>Name<div class="resizer"></div></th>
                    <th>Display Name<div class="resizer"></div></th>
                    <th>Street Address<div class="resizer"></div></th>
                    <th>City<div class="resizer"></div></th>
                    <th>Google Map Link<div class="resizer"></div></th>
                    <th>District ID<div class="resizer"></div></th>
                    <th>Photos<div class="resizer"></div></th>
                    <th>Hotline<div class="resizer"></div></th>
                    <th>User ID<div class="resizer"></div></th>
                    <th>Actions</th> <!-- New column for action buttons -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ((array) $locations as $location): ?>
                    <tr>
                        <td><?= htmlspecialchars((string) ($location['locationid'] ?? 'N/A')) ?></td>
                        <td><?= htmlspecialchars((string) ($location['location_type'] ?? 'N/A')) ?></td>
                        <td><?= htmlspecialchars((string) ($location['name'] ?? 'N/A')) ?></td>
                        <td><?= htmlspecialchars((string) ($location['display_name'] ?? 'N/A')) ?></td>
                        <td><?= htmlspecialchars((string) ($location['street_address'] ?? 'N/A')) ?></td>
                        <td><?= htmlspecialchars((string) ($location['city'] ?? 'N/A')) ?></td>
                        <td>
                            <?php if (!empty($location['google_map_link'])): ?>
                                <a href="<?= htmlspecialchars((string) $location['google_map_link']) ?>" target="_blank">View on Map</a>
                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars((string) ($location['districtid'] ?? 'N/A')) ?></td>
                        <td><?= htmlspecialchars((string) ($location['photos'] ?? 'N/A')) ?></td>
                        <td><?= htmlspecialchars((string) ($location['hot_line'] ?? 'N/A')) ?></td>
                        <td><?= htmlspecialchars((string) ($location['userid'] ?? 'N/A')) ?></td>
                        <td class="action-buttons">
                            <a href="/admin/locations/update?id=<?= $location['locationid'] ?>" class="update-button">Update</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- Add Location Button -->
    <a href="/admin/locations/create" class="add-location-button">Add Location</a>

    <script>
        // Enable table column resizing
        document.querySelectorAll('th').forEach(th => {
            const resizer = th.querySelector('.resizer');
            if (!resizer) return;

            let startX;
            let startWidth;

            const onMouseMove = (event) => {
                const newWidth = startWidth + (event.pageX - startX);
                th.style.width = newWidth + 'px';
            };

            const onMouseUp = () => {
                document.removeEventListener('mousemove', onMouseMove);
                document.removeEventListener('mouseup', onMouseUp);
            };

            resizer.addEventListener('mousedown', (event) => {
                startX = event.pageX;
                startWidth = th.offsetWidth;

                document.addEventListener('mousemove', onMouseMove);
                document.addEventListener('mouseup', onMouseUp);
            });
        });
    </script>
</body>
</html>