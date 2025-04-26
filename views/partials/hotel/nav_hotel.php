<div class="notification-bar">
    <!-- TEMP Logo -->
    <!-- <img src="/assets/hotel/hotel.png" alt="User Image" class="user-img"> -->
    <!-- <img src="/assets/hotel/logo/<?= htmlspecialchars($hotel['logo']) ?>" alt="User Image" class="user-img"
    onerror="this.onerror=null;this.src='/assets/hotel/prof.png';"> -->

    <picture>
        <source srcset="/assets/hotel/logo/<?= htmlspecialchars($hotel['logo']) ?>">
        <img src="/assets/hotel/prof.png" alt="User Image" class="user-img">
    </picture>

    <!-- User Email Display -->
    <span class="user-email">
        <?= isset($hotelEmail) ? htmlspecialchars($hotelEmail) : 'Guest'; ?>
    </span>

    <!-- Notifications Icon -->
    <a href="/notifications" class="notification-icon">
        <img src="/assets/hotel/bell.png" alt="Notifications">
    </a>
</div>
