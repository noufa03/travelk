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
    background-color: #f5f5f5;
    color: #333;
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
    background-color: #e6e6e6; /* Noticeably darker gray */
    padding: 1.5rem 1rem;
    position: fixed;
    left: 0;
    top: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 1000;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    border-right: 1px solid #b8b8b8; /* Much darker border */
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
    color: #444; /* Darker text */
    padding: 0.9rem 1.2rem;
    border-radius: 8px;
    text-align: left;
    background-color: #d6d6d6; /* Much darker gray for items */
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
    background-color: #e74c3c;
    border: none;
    border-radius: 8px;
    color: white;
    font-weight: 500;
    cursor: pointer;
    margin-top: 1.5rem;
    transition: background 0.3s ease;
}

.btn-logout:hover {
    background-color: #c0392b;
}

/* Navbar */
.notification-bar {
    position: fixed;
    top: 5px;
    right: 0;
    height: 60px;
    background-color: #e0e0e0; /* Noticeably darker */
    color: #333;
    padding: 0 2rem 0 1rem;
    display: flex;
    align-items: center;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    box-shadow: -4px 0 10px rgba(0, 0, 0, 0.1);
    z-index: 999;
    border: 1px solid #b0b0b0; /* Much darker border */
}

.notification-bar .user-img {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 1rem;
    background-color: #e0e0e0;
}

.notification-bar .user-email {
    margin-right: 1.5rem;
    font-weight: 500;
    color: #555;
}

.notification-bar .notification-icon img {
    filter: brightness(0.7);
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
.get-started-section {
    text-align: center;
    margin: 100px auto;
    padding: 40px 20px;
    max-width: 600px;
    background-color: #1c1c1c;
    border-radius: 20px;
    box-shadow: 0 0 15px rgba(0, 255, 150, 0.2);
}

.get-started-heading {
    font-size: 2rem;
    color: #ffffff;
    margin-bottom: 10px;
}

.get-started-subtext {
    font-size: 1.1rem;
    color: #cccccc;
    margin-bottom: 30px;
}

.btn-get-started {
    display: inline-block;
    background-color: #28a745;
    color: white;
    font-size: 1.1rem;
    padding: 14px 32px;
    border-radius: 8px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-get-started:hover {
    background-color: #218838;
}

.dashboard-container {
    margin-left: 270px;
    padding: 2rem;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
    min-height: 100vh;
    border: 1px solid #e0e0e0;
}

/* Welcome Header */
.welcome-message {
    font-size: 2rem;
    color: #5cbc64;
    text-align: center;
    margin-bottom: 2rem;
}

/* Main Flex Boxes */
.dashboard-boxes {
    display: flex;
    align-items: stretch;
    justify-content: flex-start;
    gap: 2rem;
    flex-wrap: wrap;
    margin-bottom: 2rem;
}

.left-box {
    flex: 0 0 auto;
    width: 300px;
    background: #f9f9f9;
    border-radius: 12px;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid #e0e0e0;
}

.right-box {
    flex: 1;
    background: #f9f9f9;
    border-radius: 12px;
    padding: 1.5rem;
    min-width: 320px;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid #e0e0e0;
}

/* Left Box Contents */
.logo-wrapper {
    text-align: center;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid #ddd;
    width: 100%;
}

.hotel-logo {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 0.5rem;
    border: 3px solid #5cbc64;
}

.star-rating {
    font-size: 1.3rem;
    color: #ffc107;
    font-weight: bold;
    text-align: center;
    line-height: 1.1;
    margin: 0;
}

.star-rating .hotel-label {
    display: block;
    font-size: 0.95rem;
    color: #777;
    margin-top: 0.1rem;
}

/* Hotel Info */
.hotel-info {
    text-align: center;
}

.hotel-name {
    font-size: 1.6rem;
    color: #5cbc64;
    margin-top: 0.5rem;
    margin-bottom: 0.3rem;
    text-align: center;
}

.hotel-email {
    color: #777;
    font-size: 0.85rem;
    margin: 0.1rem 0 0.3rem;
    text-align: center;
}

/* Amenities */
.section-title {
    color: #5cbc64;
    font-size: 1.2rem;
    margin-top: 1rem;
}

.amenities-text {
    background: #f0f0f0;
    padding: 1rem;
    border-radius: 6px;
    color: #555;
    margin-top: 0.5rem;
}

.amenities-tags {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 1rem;
}

.amenity-pill {
    background: #f0f0f0;
    color: #555;
    padding: 0.4rem 0.8rem;
    border-radius: 5px;
    font-size: 0.9rem;
    border: 1px solid #ddd;
}
.no-amenities {
    color: #999;
    font-style: italic;
    font-size: 0.9em;
}

/* Right Box - Stats */
.stats-graph {
    flex-grow: 1;
    padding: 1rem;
    border: 2px dashed #ccc;
    border-radius: 10px;
    background: #ffffff;
    width: 100%;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.graph-placeholder {
    max-height: 180px;
    width: auto;
    margin: 0 auto;
    object-fit: contain;
}

.graph-note {
    margin-top: 0.5rem;
    color: #999;
    font-size: 0.8rem;
}

/* Info Row */
.info-row {
    display: flex;
    justify-content: space-around;
    background: #f0f0f0;
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    font-size: 1.1rem;
    color: #555;
    flex-wrap: wrap;
    text-align: center;
    gap: 1rem;
    border: 1px solid #e0e0e0;
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
    background: #ffffff;
    padding: 1.5rem;
    border-radius: 8px;
    text-align: center;
    border: 1px solid #e0e0e0;
    transition: transform 0.2s ease-in-out;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.listing:hover {
    transform: scale(1.03);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    border: 1px solid #e0e0e0;
}

/* Table Layout */
.reviews-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.95rem;
    background-color: #ffffff;
    border-radius: 8px;
    overflow: hidden;
}

.reviews-table thead {
    background-color: #f5f5f5;
}

.reviews-table th,
.reviews-table td {
    padding: 0.85rem 1.2rem;
    border-bottom: 1px solid #e0e0e0;
    text-align: left;
    vertical-align: top;
}

/* Column coloring */
.reviews-table th.review-col {
    color: #5cbc64;
}
.reviews-table th.reply-col {
    color: #4aaaff;
}

/* Alternating row colors for readability */
.reviews-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Action buttons inside table */
.review-buttons {
    display: flex;
    gap: 0.5rem;
    margin-top: 0.5rem;
}

.review-buttons .btn-reply {
    background-color: #4aaaff;
    color: white;
}

.review-buttons .btn-reply:hover {
    background-color: #3399ff;
}

/* -------------------------------------
   6. Form Styling
-------------------------------------- */

.edit-form {
    max-width: 600px;
    margin: 2rem auto;
    padding: 2rem;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    border: 1px solid #e0e0e0;
}

.edit-form label {
    display: block;
    font-size: 1rem;
    margin-top: 10px;
    color: #555;
}

.edit-form input,
.edit-form textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background: #f9f9f9;
    color: #333;
}

.edit-form .checkbox-group {
    display: flex;
    gap: 10px;
    margin: 10px 0;
}

/* Edit Form Container */
.edit-form-container {
    max-width: 1000px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
    border: 1px solid #e0e0e0;
}

/* Preview Image */
.preview-logo {
    margin-top: 1rem;
    max-width: 150px;
    max-height: 150px;
    object-fit: cover;
    border-radius: 6px;
}

/* No Data / No Logo */
.no-data,
.no-logo {
    text-align: center;
    color: #999;
    font-size: 1.1rem;
    padding: 1rem;
}

/* -------------------------------------
    7. Rooms
-------------------------------------- */
.room-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
    background: #ffffff;
    border-radius: 8px;
    overflow: hidden;
}

.room-table th, .room-table td {
    padding: 10px;
    border-bottom: 1px solid #e0e0e0;
}

.room-table th {
    background-color: #f5f5f5;
}

.room-amenity-pill {
    display: inline-block;
    background-color: #f0f0f0;
    color: #555;
    padding: 0.3rem 0.6rem;
    margin: 0.2rem;
    border-radius: 999px;
    font-size: 0.85rem;
    border: 1px solid #ddd;
}

.status-available {
    color: #5cbc64;
    font-weight: bold;
}

.status-unavailable {
    color: #e74c3c;
    font-weight: bold;
}

/* -------------------------------------
    8. Utility & Miscellaneous
-------------------------------------- */

.no-data {
    color: #f0ad4e;
    font-size: 1.2rem;
    margin-top: 1.5rem;
}

/* -------------------------------------
    9. Responsive Design
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