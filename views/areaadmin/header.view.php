<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

<style>
    /* Header Styles */
    .header {
        position: fixed;
        top: 20px;
        left: 230px; /* Offset to account for the sidebar width */
        width: 1180px; /* Fixed width in pixels to prevent resizing with viewport */
        height: 60px;
        background-color: #f5f6f5;
        border-bottom: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding: 0 20px;
        font-family: 'Poppins', sans-serif;
        z-index: 1000;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-email {
        font-size: 14px;
        font-weight: 400;
        color: #333;
    }

    .profile-picture {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>

<div class="header">
    <div class="user-info">
        <span class="user-email"><?= htmlspecialchars($displayEmail) ?></span>
        <img src="<?= htmlspecialchars($profilePicture) ?>" alt="Profile Picture" class="profile-picture">
    </div>
</div>