<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/script.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles-userpage.php');?>
<div class='profile-page-body'>
    <?php require (BASE_PATH.'views/partials/user/sidebar_trav.php'); ?>
    

<!-- <main class="dashboard">
    <section class="profile">
        <div class="profile-image">
            <img src="<?php echo $user['profile'] ? $user['profile'] : 'profile-placeholder.png'; ?>" alt="Profile">
        </div>
        <div class="profile-info">
            <label>Username</label>
            <input type="text" value="<?php echo htmlspecialchars($user['user_name']); ?>" class="input-field" readonly>
            <label>Email</label>
            <input type="email" value="<?php echo htmlspecialchars($userEmail); ?>" class="input-field" readonly>
        </div>
    </section> -->

    <!-- <section class="trips">
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
</main> -->


<!-- Main Profile Section -->
<main class="main-profile">
    <?php require (BASE_PATH.'views/partials/user/nav-userprofile.php');?>
    <!-- Profile Header -->
    <section class="profile-header">
        <div class="profile-info">
            <?php if ($user['profile']): ?>
                <img src="<?php echo $user['profile']; ?>" alt="Profile">
            <?php else: ?>
                <img src="assets/icons/face.png" alt="Profile Icon">
            <?php endif; ?>
            <div class="profile-details">
                <h1 class="username"><?php echo htmlspecialchars($user['user_name']); ?></h1>
                <p class="email"><?php echo htmlspecialchars($userEmail); ?></p>
            </div>
        </div>
        <button class="edit-profile-btn start-planning-btn">Edit Profile</button>
    </section>

    <!-- User Statistics -->
    <section class="user-statistics">
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Trips Taken</h3>
                <p>25</p>
            </div>
            <div class="stat-card">
                <h3>Places Visited</h3>
                <p>10</p>
            </div>
            <div class="stat-card">
                <h3>Wishlist</h3>
                <p>8</p>
            </div>
            <div class="stat-card">
                <h3>Travel Style</h3>
                <p>Adventure</p>
            </div>
            <div class="stat-card">
                <h3>Last Trip Date</h3>
                <p>Dec 15, 2024</p>
            </div>
        </div>
    </section>
    
</main>
</div>
<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>