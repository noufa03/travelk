<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Details</title>
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

        .content {
            margin-left: 250px;
            padding: 40px;
            width: calc(100% - 250px);
            min-height: 100vh;
            margin-top: 50px;
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

        .btn-primary {
            display: inline-block;
            background-color: #5EBC67;
            color: white;
            padding: 12px 24px;
            margin-left: 20px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-bottom: 20px;
        }

        .btn-primary:hover {
            background-color: #4fa858;
        }

        input[type="text"] {
            margin-left: 20px;
            padding: 10px 12px;
            width: 300px;
            margin-bottom: 20px;
            font-size: 14px;
            border: 1px solid #dfe3e9;
            border-radius: 6px;
            color: #333;
            background-color: #fff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #5EBC67;
            box-shadow: 0 0 0 3px rgba(94, 188, 103, 0.15);
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

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .button {
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
        }

        .view-button {
            background-color: #6c757d;
        }

        .update-button {
            background-color: #5EBC67;
        }

        .delete-button {
            background-color: #dc3545;
        }

        .view-button:hover {
            background-color: #5c636a;
        }

        .update-button:hover {
            background-color: #4fa858;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        .error-message {
            margin-left: 20px;
            color: #dc3545;
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .loading-spinner {
            margin-left: 20px;
            width: 20px;
            height: 20px;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-top: 4px solid #5EBC67;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (max-width: 1024px) {
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

            .button {
                padding: 10px 12px;
                font-size: 14px;
            }
        }

        @media (max-width: 600px) {
            .content {
                padding: 15px;
            }

            input[type="text"] {
                width: 100%;
                font-size: 14px;
                padding: 10px;
            }

            .btn-primary {
                font-size: 14px;
                padding: 10px 12px;
            }
        }
    </style>
</head>
<body>


    <div class="sidebar">
        <?php include('../Http/controllers/admin/sidebar.php'); ?>
    </div>
    <?php include('../Http/controllers/admin/header.php'); ?>
<div class="content">
    <h1><?= $heading ?? 'Location Details' ?></h1>

    <a href="/admin/places/create" class="btn-primary" id="openPopup">Add Place</a>

    <input type="text" id="searchInput" placeholder="Search places by name or city...">

    <div id="loading" class="loading-spinne" style="display: none;"></div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>District</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="placesTableBody">
            <?php if (empty($places) || !is_array($places)): ?>
                <tr>
                    <td colspan="4">No places found.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($places as $place): ?>
                    <tr>
                        <td><?= htmlspecialchars($place['name'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($place['city'] ?? 'N/A') ?></td>
                        <td><?= htmlspecialchars($place['district'] ?? 'N/A') ?></td>
                        <td class="action-buttons">
                            <a href="/place?id=<?= urlencode($place['placeid']) ?>" class="button view-button">View More</a>
                            <a href="/admin/places/edit?id=<?= urlencode($place['placeid']) ?>" class="button update-button">Edit</a>
                            <form action="/admin/places/delete" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($place['placeid']) ?>">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="button delete-button" onclick="return confirm('Are you sure you want to delete this place?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('placesTableBody');
    const loadingSpinner = document.getElementById('loading');

    searchInput.addEventListener('input', async () => {
        const query = searchInput.value.trim();
        loadingSpinner.style.display = 'inline-block';

        let endpoint = `/admin/places/search?q=${encodeURIComponent(query)}`;

        try {
            const response = await fetch(endpoint);

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();
            tableBody.innerHTML = '';

            if (!data || data.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="4">No places found.</td></tr>';
            } else {
                data.forEach(place => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${place.name ?? 'N/A'}</td>
                        <td>${place.city ?? 'N/A'}</td>
                        <td>${place.district ?? 'N/A'}</td>
                        <td class="action-buttons">
                            <a href="/place?id=${place.placeid}" class="button view-button">View More</a>
                            <a href="/admin/places/edit?id=${place.placeid}" class="button update-button">Edit</a>
                            <form action="/admin/places/delete" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="${place.placeid}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="button delete-button" onclick="return confirm('Are you sure you want to delete this place?');">Delete</button>
                            </form>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });
            }
        } catch (error) {
            console.error('Error fetching places:', error);
            tableBody.innerHTML = '<tr><td colspan="4">An error occurred. Please try again later.</td></tr>';
        } finally {
            loadingSpinner.style.display = 'none';
        }
    });
</script>

</body>
</html>