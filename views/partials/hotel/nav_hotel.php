
<div class="notification-bar">
    <img src="/assets/icons/account_circle.png" alt="User Image" class="user-img">
    <span class="user-email">
        <?php echo isset($_SESSION['email']) ?  htmlspecialchars($_SESSION['email']) : 'Guest'; ?>
    </span>
    <a href="/notifications" class="notification-icon">
        <img src="/assets/hotel/bell.png" alt="Notifications">
    </a>
</div>