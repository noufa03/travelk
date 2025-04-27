<?php require base_path("views/partials/rental/styles/main.php"); ?>
<?php require base_path("views/partials/rental/styles/dashboard.php"); ?>
<?php require base_path('views/partials/user/sidebar_trav.php'); ?>

<div style="background: #f0f2f5; min-height: 100vh;">
    <!-- Header -->
    <?php require base_path('views/partials/user/header.php') ?>

    <!-- Main Container -->
    <div style="padding: 30px 20px; max-width: 1400px; margin: 0 auto;">
        <!-- Heading -->
        <?php require base_path('views/partials/user/heading.php') ?>

        <!-- Trips Container -->
        <div style="margin: 0 0 50px 0; display: flex; justify-content: center;">
            <div style=" border-radius: 12px; box-shadow: 0 6px 16px rgba(0,0,0,0.15); width: 100%; padding: 20px;">
                <div class="trip-list" style="display: flex; flex-direction: column; gap: 20px;">
                    <?php foreach ($upcomingTrips as $trip): ?>
                        <div class="trip-card" style="background: #ffffff; border-radius: 8px; border: 1px solid #e0e0e0; padding: 16px; transition: transform 0.2s ease, box-shadow 0.2s ease;">
                            <!-- Checkbox for toggling details -->
                            <input type="checkbox" class="toggle-checkbox" id="toggle-<?php echo htmlspecialchars($trip['tripid']); ?>" style="display: none;">
                            <div class="trip-header" style="display: flex; align-items: center; justify-content: space-between;">
                                <div class="trip-info" style="display: flex; align-items: center; gap: 10px;">
                                    <label for="toggle-<?php echo htmlspecialchars($trip['tripid']); ?>" style="cursor: pointer;">
                                        <svg class="arrow-down" style="width: 20px; height: 20px; color: #555; transition: transform 0.3s ease;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </label>
                                    <div class="trip-main">
                                        <h2 style="font-size: 16px; font-weight: 600; color: #333; margin: 0 0 8px; text-transform: uppercase; letter-spacing: 0.5px;">Trip #<?php echo htmlspecialchars($trip['tripid']); ?></h2>
                                        <p style="color: #555; font-size: 14px; margin: 4px 0;">Start: <?php echo htmlspecialchars($trip['start_date']); ?></p>
                                        <p style="color: #555; font-size: 14px; margin: 4px 0;">End: <?php echo htmlspecialchars($trip['end_date']); ?></p>
                                        <p style="color: #555; font-size: 14px; margin: 4px 0;">Country: <?php echo htmlspecialchars($trip['country']) ?: 'Not specified'; ?></p>
                                        <p style="color: #555; font-size: 14px; margin: 4px 0;">Budget: <?php echo htmlspecialchars($trip['t_budget']); ?> <?php echo htmlspecialchars($trip['currency']); ?></p>
                                    </div>
                                </div>
                                <form action="/trips/delete" method="POST" onsubmit="return confirm('Are you sure you want to delete Trip #<?php echo htmlspecialchars($trip['tripid']); ?>?');">
                                    <input type="hidden" name="tripid" value="<?php echo htmlspecialchars($trip['tripid']); ?>">
                                    <button type="submit" style="background: linear-gradient(90deg, #dc3545, #c82333); color: #ffffff; padding: 8px 16px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #c82333, #dc3545)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #dc3545, #c82333)';
                                    " onclick="return confirm('Are you sure you want to delete Trip #<?php echo htmlspecialchars($trip['tripid']); ?>?');">Delete</button>
                                </form>
                            </div>
                            <div class="trip-details" style="display: none; margin-top: 16px; color: #555; font-size: 14px;">
                                <p style="margin: 4px 0;"><strong>Created:</strong> <?php echo htmlspecialchars($trip['create_date']); ?> <?php echo htmlspecialchars($trip['create_time']); ?></p>
                                <p style="margin: 4px 0;"><strong>Date Flexibility:</strong> <?php echo $trip['date_flexibility'] ? 'Yes' : 'No'; ?></p>
                                <p style="margin: 4px 0;"><strong>Number of People:</strong> <?php echo htmlspecialchars($trip['no_of_ppl']) ?: 'Not specified'; ?></p>
                                <p style="margin: 4px 0;"><strong>Age Group:</strong> <?php echo htmlspecialchars($trip['age_gap']); ?></p>
                                <p style="margin: 4px 0;"><strong>Places:</strong> 
                                    <ul style="margin: 4px 0; padding-left: 20px;">
                                        <?php foreach ($trip['place_names'] as $place): ?>
                                            <li><?php echo htmlspecialchars($place['display_name']); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </p>
                                <p style="margin: 4px 0;"><strong>Stays:</strong>
                                    <ul style="margin: 4px 0; padding-left: 20px;">
                                        <?php foreach ($trip['stay_names'] as $stay): ?>
                                            <li><?php echo htmlspecialchars($stay['display_name']); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </p>
                                <p style="margin: 4px 0;"><strong>Restaurants:</strong>
                                    <ul style="margin: 4px 0; padding-left: 20px;">
                                        <?php foreach ($trip['rest_names'] as $rest): ?>
                                            <li><?php echo htmlspecialchars($rest['display_name']); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </p>
                                <p style="margin: 4px 0;"><strong>Planning Status:</strong> <?php echo htmlspecialchars($trip['planning_status']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require (BASE_PATH . 'views/partials/user/foot.php'); ?>
    </div>
</div>

<?php require (BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path("views/partials/restaurants/filejs.php"); ?>

<script>
    // Apply CSS for checkbox toggle
    document.querySelectorAll('.toggle-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const details = this.nextElementSibling.nextElementSibling;
            const arrow = this.nextElementSibling.querySelector('.arrow-down');
            if (this.checked) {
                details.style.display = 'block';
                arrow.style.transform = 'rotate(180deg)';
            } else {
                details.style.display = 'none';
                arrow.style.transform = 'rotate(0deg)';
            }
        });
    });

    // Add hover effect for trip cards
    document.querySelectorAll('.trip-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.02)';
            this.style.boxShadow = '0 8px 20px rgba(0,0,0,0.2)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '0 6px 16px rgba(0,0,0,0.15)';
        });
    });
</script>