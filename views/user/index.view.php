<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>

<main class="dashboard">
    <section class="profile">
        <div class="profile-image">
            <img src="<?php echo $user['profile'] ? $user['profile'] : 'profile-placeholder.png'; ?>" alt="Profile">
        </div>
        <div class="profile-info">
            <label>Username</label>
            <input type="text" value="<?php echo htmlspecialchars($user['user_name']); ?>" class="input-field" readonly>
            <label>Email</label>
            <input type="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="input-field" readonly>
        </div>
    </section>

    <section class="trips">
        <?php if (!empty($trips)): ?>
            <h2 class="section-title">Trips</h2>
            <?php $tripCounter = 1; ?>
            <?php foreach ($trips as $trip): ?>
                <div class="trip-item">
                    <span class="trip-title">Trip <?php echo htmlspecialchars($tripCounter); ?></span>
                    <span>Start Date: <?php echo htmlspecialchars($trip['start_date']); ?></span>
                    <span>End Date: <?php echo htmlspecialchars($trip['end_date']); ?></span>
                    <form action="/trip" method="GET">
                        <input type="hidden" name="tripID" value="<?php echo htmlspecialchars($trip['tripID']); ?>">
                        <button type="submit" class="view-btn">View</button>
                    </form>
                </div>
                <?php $tripCounter++; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-trips">No trips found.</p>
        <?php endif; ?>
    </section>
</main>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>