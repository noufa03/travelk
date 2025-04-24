<?php require(BASE_PATH . 'views/partials/hotel/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/style.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/nav_hotel.php'); ?>
<?php require(BASE_PATH . 'views/partials/hotel/sidebar_hotel.php'); ?>

<main class="dashboard-container">
    <h1 class="welcome-message">Manage Rooms</h1>

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
                            <td><?= ucfirst($room['availability']) ?></td>
                            <td class="review-buttons">
                                <a href="/edit_room?roomid=<?= $room['roomid'] ?>" class="btn btn-edit">Edit</a>
                                <a href="/delete_room?roomid=<?= $room['roomid'] ?>" class="btn btn-delete" onclick="return confirm('Delete this room?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="no-data">No rooms found for this accommodation.</p>
    <?php endif; ?>
</main>

<?php require(BASE_PATH . 'views/partials/hotel/foot.php'); ?>
