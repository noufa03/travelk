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
    background-color: #f8f8f8;
    color: #333;
}

/* Main Content */
main {
    margin-left: 250px;
    padding: 3rem;
    padding-top: 80px;
    background-color:  #f8f8f8;
}

/* Sidebar */
.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #ffffff;
    padding: 1.5rem 1rem;
    position: fixed;
    left: 0;
    top: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 1000;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
    border-right: 1px solid #e0e0e0;
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
    color: #555;
    padding: 0.9rem 1.2rem;
    border-radius: 8px;
    text-align: left;
    background-color: #f5f5f5;
    font-weight: 500;
    transition: all 0.3s ease;
}

.sidebar-menu ul li a:hover {
    background-color: #5EBC67;
    color: #ffffff;
}

/* Logout Button */
.btn-logout {
    width: 100%;
    padding: 0.9rem 1.2rem;
    background-color: #f5f5f5;
    border: none;
    border-radius: 8px;
    color: #555;
    font-weight: 500;
    cursor: pointer;
    margin-top: 1.5rem;
    transition: all 0.3s ease;
}

.btn-logout:hover {
    background-color:rgb(0, 0, 0);
    color: #ffffff;
}

/* Navbar */
.notification-bar {
    position: fixed;
    top: 5px;
    right: 0;
    height: 60px;
    background-color: #ffffff;
    color: #333;
    padding: 0 2rem 0 1rem;
    display: flex;
    align-items: center;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    box-shadow: -4px 0 10px rgba(0, 0, 0, 0.05);
    z-index: 999;
    border: 1px solid #e0e0e0;
}

.notification-bar .user-img {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 1rem;
    background-color: #f0f0f0;
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
    transition: all 0.3s ease;
    text-decoration: none;
    cursor: pointer;
    border: none;
}

.btn-edit,
.btn-save {
    background-color: #5EBC67;
    color: white;
}

.btn-edit:hover,
.btn-save:hover {
    background-color: #4da857;
}

.btn-delete,
.btn-cancel {
    background-color: #f5f5f5;
    color: #555;
}

.btn-delete:hover,
.btn-cancel:hover {
    background-color:rgb(79, 84, 80);
    color: white;
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
   3. Dashboard Styles
-------------------------------------- */

.dashboard-container {
    margin-left: 270px;
    padding: 2rem;
    background-color: #f8f8f8;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    min-height: 100vh;
    border: 1px solid #e0e0e0;
}

.welcome-message {
    font-size: 2rem;
    color: #5EBC67;
    text-align: center;
    margin-bottom: 2rem;
}

/* Dashboard Layout */
.dashboard-boxes {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    margin-bottom: 2rem;
    align-items: stretch;
    justify-content: flex-start;
}

/* Left Box - Hotel Info */
.left-box {
    width: 300px;
    background: #ffffff;
    border-radius: 12px;
    padding: 1.5rem;
    border: 1px solid #e0e0e0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.logo-wrapper {
    text-align: center;
    width: 100%;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid #e0e0e0;
}

.hotel-logo {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 0.5rem;
    border: 3px solid #5EBC67;
}

.hotel-name {
    font-size: 1.6rem;
    color: #5EBC67;
    margin: 0.5rem 0 0.3rem;
}

.star-rating {
    font-size: 1.3rem;
    color: #ffc107;
    font-weight: bold;
    line-height: 1.1;
}

.star-rating .hotel-label {
    display: block;
    font-size: 0.95rem;
    color: #777;
    margin-top: 0.1rem;
}

.hotel-info {
    text-align: center;
    margin-top: 1rem;
}

.amenities-tags {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 0.5rem;
}

.amenity-pill {
    background: #f5f5f5;
    color: #555;
    padding: 0.4rem 0.8rem;
    border-radius: 5px;
    font-size: 0.9rem;
    border: 1px solid #e0e0e0;
}

.no-amenities {
    color: #999;
    font-style: italic;
    font-size: 0.9rem;
}

/* Right Box - Statistics */
.right-box {
    flex-grow: 1;
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    padding: 1.5rem 2rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-width: 300px;
    max-width: 100%;
}

.section-title {
    font-size: 1.4rem;
    font-weight: 600;
    color: #5EBC67;
    margin-bottom: 1.5rem;
    text-align: left;
    width: 100%;
}

/* Stat Cards Grid */
.stats-cards {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: center;
    width: 100%;
}

.stat-card {
    background-color: #ffffff;
    border-radius: 12px;
    padding: 1rem 1.5rem;
    flex: 1 1 180px;
    display: flex;
    align-items: center;
    gap: 1rem;
    min-width: 180px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    transition: all 0.2s ease;
    color: #333;
    cursor: pointer;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    background-color: #f9f9f9;
}

.stat-icon {
    font-size: 1.8rem;
    color: #5EBC67;
}

.stat-info .stat-label {
    font-size: 0.9rem;
    color: #777;
}

.stat-info .stat-value {
    font-size: 1.4rem;
    font-weight: bold;
    color: #333;
}

/* Info Row */
.info-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    background: #f9f9f9;
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    font-size: 1.1rem;
    color: #555;
    text-align: center;
    gap: 1rem;
    border: 1px solid #e0e0e0;
}

/* Action Buttons */
.action-buttons {
    text-align: center;
    margin-top: 1rem;
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}
.get-started-section {
    text-align: center;
    margin-top: 2rem;
}

.get-started-heading {
    font-size: 2rem;
    color: #d9534f;
    margin-bottom: 0.5rem;
}

.get-started-subtext {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 2rem;
}

.get-started-options {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

/* Individual Box */
.get-started-box {
    width: 250px;
    height: 200px;
    border: 2px dashed #d9534f;
    background-color: #fff0f0;
    border-radius: 10px;
    text-align: center;
    padding: 2rem 1rem;
    cursor: pointer;
    transition: transform 0.2s ease;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    color: #d9534f;
    font-weight: bold;
}

.get-started-box:hover {
    transform: scale(1.03);
    background-color: #ffe5e5;
    box-shadow: 0 3px 10px rgba(217, 83, 79, 0.1);
}

.get-started-box .plus {
    color: #d9534f;
    font-size: 3rem;
    margin-bottom: 0.5rem;
    line-height: 1;
}
.get-started-box.completed {
    border-color: #5EBC67; /* Green border */
    color: #5EBC67;
}

.get-started-box.completed .plus {
    color: #5EBC67;
}
.get-started-box.box-complete {
    border: 2px dashed #4caf50;
    background-color: rgba(76, 175, 80, 0.1);
    color: #4caf50;
}

.get-started-box.box-complete .plus {
    color: #4caf50;
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
    background-color: transparent;
    border: none;
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

.listing-image {
    width: 100%;
    aspect-ratio: 1 / 1;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 1rem;
    background-color: #f8f8f8;
}

.add-new {
    border: 2px dashed #5EBC67;
    background: transparent;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.add-new a {
    text-decoration: none;
    color: #5EBC67;
    font-size: 1.2rem;
    font-weight: bold;
}

.plus {
    font-size: 3rem;
    color: #5EBC67;
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
    background-color: #f9f9f9;
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
    color: #5EBC67;
}
.reviews-table th.reply-col {
    color: #5EBC67;
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
    background-color: #5EBC67;
    color: white;
}

.review-buttons .btn-reply:hover {
    background-color: #4da857;
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
    border: 1px solid #e0e0e0;
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
    background-color: #f9f9f9;
}

.room-amenity-pill {
    display: inline-block;
    background-color: #f5f5f5;
    color: #555;
    padding: 0.3rem 0.6rem;
    margin: 0.2rem;
    border-radius: 999px;
    font-size: 0.85rem;
    border: 1px solid #e0e0e0;
}

.status-available {
    color: #5EBC67;
    font-weight: bold;
}

.status-unavailable {
    color: #777;
    font-weight: bold;
}

/* -------------------------------------
    8. Utility & Miscellaneous
-------------------------------------- */

.no-data {
    color: #5EBC67;
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
    .dashboard-boxes {
        flex-wrap: nowrap;
    }
}
</style>