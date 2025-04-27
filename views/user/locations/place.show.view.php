<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles-placeview.php');?>

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
            <span class="close-lightbox" onclick="closeLightbox()">&times;</span>
            <img id="lightbox-image" class="lightbox-image" src="" alt="Full-size image">
        </div>
    </section>
    <div class="place-details"> 
        <div class="place-header">          
            <h1 class="place-name"><?= htmlspecialchars($place['display_name']) ?></h1>
            <div class="place-actions">
                <i class='bx bx-heart' onclick="toggleFavorite(this)"></i>
                <button class="plan-trip-button" onclick="window.location.href='/planning/place?add_place=<?= urlencode($place['locationid']) ?>'">Start Planning with This Place</button>
            </div>
        </div>
        <p class="place-description"><?= htmlspecialchars($place_details['description']) ?></p>
    </div>

    <!-- Key Details Section -->
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
    
    <!-- Location Section -->
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

<script>
  function openLightbox(src) {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    lightboxImage.src = src;
    lightbox.style.display = 'flex';
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.style.display = 'none';
}

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
</script>
<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>