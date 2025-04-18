<style>
/* -------------------------------------
   1. Sidebar & Navbar
-------------------------------------- */

/* Body */
body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
    background-color: #121212;
    color: #e0e0e0;
}

/* Main Content */
main {
    margin-left: 250px;
    padding: 3rem;
    padding-top: 80px;
}

/* Sidebar */
.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #1f1f1f;
    padding: 1.5rem 1rem;
    position: fixed;
    left: 0;
    top: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 1000;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
}

.sidebar-header {
    text-align: center;
    margin-bottom: 2rem;
}

.logo {
    width: 140px;
    height: auto;
    margin: 0 auto;
}

/* Sidebar Menu */
.sidebar-menu ul {
    list-style: none;
    padding: 0;
    width: 100%;
}

.sidebar-menu ul li {
    margin: 0.5rem 0;
}

.sidebar-menu ul li a {
    display: block;
    text-decoration: none;
    color: #e6e6e6;
    padding: 0.9rem 1.2rem;
    border-radius: 8px;
    text-align: left;
    background-color: #2a2a2a;
    font-weight: 500;
    transition: all 0.3s ease;
}

.sidebar-menu ul li a:hover {
    background-color: #5cbc64;
    color: #ffffff;
}

/* Logout Button */
.btn-logout {
    width: 100%;
    padding: 0.9rem 1.2rem;
    background-color: #c0392b;
    border: none;
    border-radius: 8px;
    color: white;
    font-weight: 500;
    cursor: pointer;
    margin-top: 1.5rem;
    transition: background 0.3s ease;
}

.btn-logout:hover {
    background-color: #e74c3c;
}

/* Navbar */
.notification-bar {
    position: fixed;
    top: 5px;
    right: 0;
    height: 60px;
    background-color: #1d1d1d;
    color: #e0e0e0;
    padding: 0 2rem 0 1rem;
    display: flex;
    align-items: center;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    box-shadow: -4px 0 10px rgba(0, 0, 0, 0.2);
    z-index: 999;
}

.notification-bar .user-img {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 1rem;
    background-color: #ddd;
}

.notification-bar .user-email {
    margin-right: 1.5rem;
    font-weight: 500;
    color: #e0e0e0;
}

.notification-bar .notification-icon img {
    filter: brightness(0) invert(1);
    width: 24px;
    height: 24px;
    transition: transform 0.2s ease;
}

.notification-bar .notification-icon img:hover {
    transform: scale(1.1);
}

/* -------------------------------------
   2. Buttons & Related Components
-------------------------------------- */

.btn {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    border-radius: 5px;
    transition: background 0.3s ease;
    text-decoration: none;
    cursor: pointer;
    border: none;
}

.btn-edit,
.btn-save {
    background-color: #5cbc64;
    color: white;
}

.btn-edit:hover,
.btn-save:hover {
    background-color: #4aa756;
}

.btn-delete,
.btn-cancel {
    background-color: #e74c3c;
    color: white;
}

.btn-delete:hover,
.btn-cancel:hover {
    background-color: #c0392b;
}

/* Listing and Review Specific Buttons */
.action-buttons,
.review-buttons,
.listing-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 1rem;
}

.review-buttons {
    gap: 0.75rem;
}

/* -------------------------------------
   3. Dashboard 
-------------------------------------- */
.dashboard-container {
    margin-left: 270px; /* Slightly more than sidebar width */
    padding: 2rem;
    background-color: rgb(21, 21, 21);
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    min-height: 100vh;
}

.welcome-message {
    font-size: 2rem;
    color: #5cbc64;
    margin-bottom: 1.5rem;
}

.hotel-details {
    background: #2a2a2a;
    padding: 1.5rem;
    border-radius: 8px;
    text-align: left;
    max-width: 800px;
    margin: 0 auto;
}

.hotel-logo,
.preview-logo {
    max-width: 150px;
    margin: 0 auto 1rem;
    display: block;
    border-radius: 5px;
}

.section-title {
    color: #5cbc64;
    margin-top: 1rem;
}

.payment-options {
    list-style-type: none;
    padding: 0;
}

.payment-options li {
    background: #333;
    display: inline-block;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    margin: 5px;
}

.action-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-top: 2rem;
}

/* -------------------------------------
   4. Listing
-------------------------------------- */

.listings-container {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: flex-start;
    padding: 2rem;
}

.listing {
    width: 250px;
    background: #1d1d1d;
    padding: 1.5rem;
    border-radius: 8px;
    text-align: center;
    border: 1px solid #444;
    transition: transform 0.2s ease-in-out;
}

.listing:hover {
    transform: scale(1.05);
}

.add-new {
    border: 2px dashed #5cbc64;
    background: transparent;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.add-new a {
    text-decoration: none;
    color: #5cbc64;
    font-size: 1.2rem;
    font-weight: bold;
}

.plus {
    font-size: 3rem;
    color: #5cbc64;
}

/* -------------------------------------
   5. Reviews
-------------------------------------- */

.reviews-container {
    padding: 2rem;
    font-family: sans-serif;
}

.review-line {
    padding: 1rem 0;
    border-bottom: 1px solid #333;
}

.review-line p {
    margin: 0.25rem 0;
}

.reviews-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.95rem;
}

.reviews-table th,
.reviews-table td {
    padding: 0.75rem 1rem;
    border-bottom: 1px solid #333;
    text-align: left;
}

/* -------------------------------------
   6. Form Styling
-------------------------------------- */

.edit-form {
    max-width: 600px;
    margin: 2rem auto;
    padding: 2rem;
    background: #2a2a2a;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.edit-form label {
    display: block;
    font-size: 1rem;
    margin-top: 10px;
}

.edit-form input,
.edit-form textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #555;
    border-radius: 5px;
    background: #333;
    color: #e0e0e0;
}

.edit-form .checkbox-group {
    display: flex;
    gap: 10px;
    margin: 10px 0;
}

/* -------------------------------------
   7. Utility & Miscellaneous
-------------------------------------- */

.no-data {
    color: #f0ad4e;
    font-size: 1.2rem;
    margin-top: 1.5rem;
}

/* -------------------------------------
    8. Responsive Design
-------------------------------------- */

@media (max-width: 768px) {
    main {
        margin-left: 0;
        padding: 1rem;
    }

    .navbar {
        width: 100%;
        left: 0;
    }

    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        flex-direction: row;
        justify-content: space-around;
        padding: 0.5rem;
    }

    .sidebar-header {
        margin-bottom: 0;
    }

    .sidebar-menu ul {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
        padding: 0;
    }

    .sidebar-menu ul li {
        margin: 0.25rem;
        flex: 1 1 auto;
        min-width: 100px;
    }

    .listings-container {
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    .listing {
        width: 100%;
        max-width: 300px;
    }

    .dashboard-container {
        margin-left: 0;
        padding: 1rem;
        width: 100%;
        box-sizing: border-box;
    }

    .edit-form {
        padding: 1rem;
        width: 100%;
        box-sizing: border-box;
    }

    .hotel-details {
        padding: 1rem;
    }

    .btn {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }

    .hotel-logo,
    .preview-logo {
        max-width: 120px;
    }
}

</style>

</head>
<body>