<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

<style>
    /* Header Styles */
    .header {
        position: fixed;
        left: 210px; /* Start the header 210px from the left */
        top: 0;
        width: calc(100% - 210px); /* Span the rest of the width to the right */
        height: 60px;
        background-color: #f5f6f5;
        border-bottom: 1px solid #ddd;
        box-shadow: none;
        display: flex;
        align-items: center;
        justify-content: flex-end; /* Keep items aligned to the right */
        padding-right: 20px; /* Space to the right */
        font-family: 'Poppins', sans-serif;
        z-index: 1000;
    }

    .user-info {
        display: flex;
        align-items: center; /* Vertically center the email and profile picture */
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
        border: none; /* Explicitly remove any border */
    }
</style>

<div class="header">
    <div class="user-info">
        <span class="user-email"><?= htmlspecialchars($displayEmail) ?></span>
        <img src="<?= htmlspecialchars($profilePicture) ?>" alt="Profile Picture" class="profile-picture">
    </div>
</div>