<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles-placeview.php');?>

<!-- Assuming a CSRF token is provided by the backend in a meta tag -->
<meta name="csrf-token" content="<?php echo isset($_SESSION['csrf_token']) ? htmlspecialchars($_SESSION['csrf_token']) : ''; ?>">

<div class="place-container">
    <div class="back-button">
        <a href="javascript:void(0);" onclick="goBackAndReload();">
            <i class='bx bxs-left-arrow-circle'></i>
        </a>
    </div>
    <section class="photos">
        <div class="photo-gallery">
            <?php if (!empty($place['photo_names'])) : ?>
                <?php foreach ($place['photo_names'] as $photo_name) : ?>
                    <img src="<?= htmlspecialchars($place['photos'] . DIRECTORY_SEPARATOR . $photo_name) ?>" alt="<?= htmlspecialchars($place['display_name']) ?>" class="gallery-image" onclick="openLightbox('<?= htmlspecialchars($place['photos'] . DIRECTORY_SEPARATOR . $photo_name) ?>')">
                <?php endforeach; ?>
            <?php else : ?>
                <p>No photos available.</p>
            <?php endif; ?>
        </div>
        <div id="lightbox" class="lightbox">
            <span class="close-lightbox" onclick="closeLightbox()">×</span>
            <img id="lightbox-image" class="lightbox-image" src="" alt="Full-size image">
        </div>
    </section>
    <div class="place-details"> 
        <div class="place-header">          
            <h1 class="place-name"><?= htmlspecialchars($place['display_name']) ?></h1>
            <div class="place-actions">
                <?php if (!$userid) : ?>
                    <a href="/login" class="save-button"><i class='bx bx-heart'></i> Login to Save</a>
                <?php else : ?>
                    <button class="save-button" id="save-button" data-locationid="<?= htmlspecialchars($place['locationid']) ?>" onclick="toggleWishlist(this)">
                        <i class='bx bx-heart'></i> <span class="save-text">Save</span>
                    </button>
                <?php endif; ?>
                <a href="/planning/place" class="plan-trip-button">Start Planning with This Place</a>
            </div>
        </div>
        <p class="place-description"><?= htmlspecialchars($place_details['description']) ?></p>
    </div>

    <section class="key-details">
        <h2>Key Details</h2>
        <div class="details-grid">
            <div class="detail-item">
                <span class="detail-label">Opening Hours:</span>
                <span class="detail-value"><?= htmlspecialchars($place_details['open_h']) ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Entry Fee:</span>
                <span class="detail-value"><?= htmlspecialchars($place_details['entry_fee']) ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Best Time to Visit:</span>
                <span class="detail-value"><?= htmlspecialchars($place_details['best_travel_time']) ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Accessibility:</span>
                <span class="detail-value"><?= htmlspecialchars($place_details['accessibility']) ?></span>
            </div>
        </div>
    </section>
    
    <section class="location">
        <h2>Location</h2>
        <div class="location-details">
            <div class="address">
                <span class="label">Address:</span>
                <span class="value"><?= htmlspecialchars($place['street_address'] . ', ' . $place['city']) ?></span>
            </div>
            <div class="map-link">
                <a href="<?= htmlspecialchars($place['google_map_link']) ?>" target="_blank">View on Google Maps <i class='bx bx-map'></i></a>
            </div>
        </div>
    </section>
</div>

<script src="/assets/js/lightbox.js"></script>
<script>
function goBackAndReload() {
    sessionStorage.setItem('reloadAfterBack', 'true');
    history.back();
}

window.addEventListener('pageshow', function(event) {
    if (sessionStorage.getItem('reloadAfterBack')) {
        sessionStorage.removeItem('reloadAfterBack');
        location.reload();
    }
});

// Check if the place is already in the wishlist on page load
document.addEventListener('DOMContentLoaded', function() {
    const saveButton = document.getElementById('save-button');
    if (saveButton) {
        const locationId = saveButton.getAttribute('data-locationid');
        fetch('/wishlist/check', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ locationid: locationId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.isInWishlist) {
                saveButton.classList.add('saved');
                saveButton.querySelector('.save-text').textContent = 'Saved';
                saveButton.querySelector('i').classList.add('favorite');
            }
        })
        .catch(error => {
            console.error('Error checking wishlist status:', error);
        });
    }
});

function toggleAddPlace(button) {
    const locationId = button.getAttribute('data-locationid');
    fetch('/planning/place', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ locationid: locationId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            button.textContent = 'Remove from Planning';
            button.classList.add('remove-button');
        } else {
            button.textContent = 'Add to Planning';
            button.classList.remove('remove-button');
        }
    })
    .catch(error => {
        console.error('Error toggling add place:', error);
    });
}



</script>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>