<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

<style>
    /* Header Styles */
    .header {
        position: fixed;
        left: 210px;
        width: calc(100% - 210px); /* Span from 210px to far right */
        height: 60px;
        background-color: #f5f6f5;
        border-bottom: 1px solid #ddd;
        box-shadow: none; /* No shadow at all */
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
        <span class="user-email"><?= $_SESSION['user']['email'] ?></span>
        <img src="/assets/admins/harithyamilakshamainadmin.png" alt="Profile Picture" class="profile-picture">
    </div>
</div>