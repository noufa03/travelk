<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">Rooms</h1>

    <?php if (!empty($rooms)): ?>
        <div class="reviews-container">
            <table class="reviews-table">
                <thead>
                    <tr>
                        <th class="review-col">Room #</th>
                        <th>Type</th>
                        <th>Bed</th>
                        <th>Capacity</th>
                        <th>Price/Night</th>
                        <th>Amenities</th>
                        <th>Images</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rooms as $room): ?>
                        <tr>
                            <td><?= htmlspecialchars($room['room_number']) ?></td>
                            <td><?= htmlspecialchars($room['room_type']) ?></td>
                            <td><?= htmlspecialchars($room['bed_type']) ?></td>
                            <td><?= htmlspecialchars($room['capacity']) ?></td>
                            <td>$<?= htmlspecialchars($room['price_per_night']) ?></td>
                            <td>
                                <?php
                                $amenities = explode(',', $room['amenities']);
                                foreach ($amenities as $item): ?>
                                    <span class="room-amenity-pill"><?= htmlspecialchars(trim($item)) ?></span>
                                <?php endforeach; ?>
                            </td>
                            <td class="room-images-cell">
                                <?php
                                if (!empty($room['images'])) {
                                    $images = explode(',', $room['images']);
                                    $imageList = array_map('htmlspecialchars', $images);
                                    $firstImage = reset($imageList);
                                    $imageListJson = htmlspecialchars(json_encode($imageList));

                                    echo '<img src="' . $firstImage . '" class="room-thumbnail" onclick="openGallery(' . $imageListJson . ')" />';
                                } else {
                                    echo '<span>No Images</span>';
                                }
                                ?>
                            </td>
                            <td><?= ucfirst($room['availability']) ?></td>
                            <td class="review-buttons">
                                <div class="action-buttons">
                                <a href="/edit_room?roomid=<?= $room['roomid'] ?>" class="btn btn-edit">Edit</a>
                                <a href="/delete_room?roomid=<?= $room['roomid'] ?>" class="btn btn-delete" onclick="return confirm('Delete this room?');">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="no-data">No rooms found for this accommodation.</p>
    <?php endif; ?>
    <div class="action-buttons">
        <a href="/add_room" class="btn btn-save">Add New Room</a>
    </div>
</main>

<!-- Lightbox -->
<div id="lightbox" class="lightbox" style="display:none;">
    <span class="close" onclick="closeGallery()">×</span>
    <div id="lightbox-content"></div>
</div>

<script>
    function openGallery(imageList) {
        const lightbox = document.getElementById('lightbox');
        const content = document.getElementById('lightbox-content');
        content.innerHTML = ''; // Clear previous content

        imageList.forEach(img => {
            const imageElement = document.createElement('img');
            imageElement.src = img;
            imageElement.className = 'lightbox-image';
            content.appendChild(imageElement);
        });
        lightbox.style.display = 'block';
    }

    function closeGallery() {
        document.getElementById('lightbox').style.display = 'none';
    }
</script>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>