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

        <!-- Form Container -->
        <div style="margin: 0 0 50px 0; display: flex; justify-content: center;">
            <div style="background: linear-gradient(135deg, #ffffff, #f8fafc); border-radius: 12px; box-shadow: 0 6px 16px rgba(0,0,0,0.15); width: 100%; max-width: 600px; padding: 20px;">
                <form action="/report-issue" method="POST" class="report-form" onsubmit="return confirm('Are you sure you want to submit this issue?');" style="display: flex; flex-direction: column; gap: 20px;">
                    <div>
                        <label for="issue_description" style="font-size: 16px; font-weight: 600; color: #333; display: block; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px;">Report an Issue</label>
                        <textarea 
                            id="issue_description" 
                            name="issue_description" 
                            placeholder="Describe your Issue here" 
                            style="width: 100%; min-height: 150px; padding: 12px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 14px; color: #555; background: #ffffff; resize: vertical; transition: border-color 0.2s ease;"
                            onfocus="this.style.borderColor='#333';"
                            onblur="this.style.borderColor='#e0e0e0';"
                            required
                        ></textarea>
                    </div>
                    <div style="text-align: right;">
                        <button 
                            type="submit" 
                            class="submit-button"
                            style="background: linear-gradient(90deg, #dc3545, #c82333); color: #ffffff; padding: 8px 16px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;"
                            onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #c82333, #dc3545)';"
                            onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #dc3545, #c82333)';"
                        >Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <?php require (BASE_PATH . 'views/partials/user/foot.php'); ?>
    </div>
</div>

<?php require (BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path("views/partials/restaurants/filejs.php"); ?>

<script>
    // Add hover effect for submit button (enhance interactivity)
    document.querySelectorAll('.submit-button').forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.boxShadow = '0 8px 20px rgba(0,0,0,0.2)';
        });
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = 'none';
        });
    });
</script>

<?php require base_path("views/partials/user/toast.php"); ?>