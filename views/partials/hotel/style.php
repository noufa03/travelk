<style>
/* General Styling */
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
    margin-left: 250px; /* Matches sidebar width */
    padding: 3rem;
    padding-top: 80px; /* Space for navbar */
}

/* Sidebar */
.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #1d1d1d;
    padding: 1rem;
    position: fixed;
    left: 0;
    top: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.sidebar-header {
    text-align: center;
    margin-bottom: 1.5rem;
}

.logo {
    width: 150px;
    height: auto;
    margin-bottom: 0.5rem;
    margin-top: 0.5rem;
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
    color: #e0e0e0;
    padding: 1rem;
    text-align: center;
    background-color: #333;
    transition: background 0.3s, color 0.3s;
}

.sidebar-menu ul li a:hover {
    background-color: #5cbc64;
    color: white;
}

/* Navbar */
.navbar {
    position: fixed;
    width: calc(100% - 250px); /* Adjust for sidebar width */
    left: 250px;
    top: 0;
    height: 40px;
    background: #2a2a2a;
    color: #e0e0e0;
    padding: 1rem 2rem;
    display: flex;
    justify-content: flex-end; /* Align links to the right */
    align-items: center;
}

/* Navbar Links */
.nav-links {
    list-style: none;
    display: flex;
    gap: 1.5rem;
    margin-right: 2rem;
    padding: 0;
}

.nav-links li {
    display: inline;
}

.nav-links a {
    color: #e0e0e0;
    text-decoration: none;
    font-weight: bold;
    padding: 0.5rem 1rem;
    transition: color 0.3s ease, background 0.3s ease;
}

.nav-links a:hover {
    color: #5cbc64;
    background-color: #333;
    border-radius: 5px;
}
.dashboard-container {
    max-width: 800px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: #1e1e1e;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    color: #e0e0e0;
    text-align: center;
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
}
.hotel-logo {
    max-width: 150px;
    display: block;
    margin: 0 auto 1rem;
    border-radius: 5px;
}
.section-title {
    color: #5cbc64;
    margin-top: 1rem;
}

/* Payment Options */
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

/* Action Buttons */
.action-buttons {
    margin-top: 1.5rem;
}

.btn {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    border-radius: 5px;
    transition: background 0.3s ease;
    text-decoration: none;
}

/* Button Variants */
.btn-edit {
    background-color: #5cbc64;
    color: white;
}

.btn-edit:hover {
    background-color: #4aa756;
}

.btn-delete {
    background-color: #e74c3c;
    color: white;
}

.btn-delete:hover {
    background-color: #c0392b;
}

/* No Data Message */
.no-data {
    color: #f0ad4e;
    font-size: 1.2rem;
    margin-top: 1.5rem;
}

/* Responsive Styling */
@media (max-width: 768px) {
    .dashboard-container {
        padding: 1rem;
    }
    
    .btn {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
}
.edit-form {
    max-width: 600px;
    margin: 2rem auto;
    padding: 2rem;
    background: #2a2a2a;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    color: #e0e0e0;
}

.edit-form label {
    display: block;
    font-size: 1rem;
    margin-top: 10px;
}

.edit-form input, .edit-form textarea {
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

.preview-logo {
    display: block;
    max-width: 150px;
    margin-top: 10px;
    border-radius: 5px;
}

.action-buttons {
    margin-top: 1.5rem;
    display: flex;
    justify-content: space-between;
}

.btn-save {
    background-color: #5cbc64;
    color: white;
}

.btn-save:hover {
    background-color: #4aa756;
}

.btn-cancel {
    background-color: #e74c3c;
    color: white;
}

.btn-cancel:hover {
    background-color: #c0392b;
}
.notification-bar {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    background-color: #1d1d1d;
    padding: 10px 20px;
}

.user-img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.user-email {
    color: #e0e0e0;
    font-size: 1rem;
    margin-right: 15px;
}

.notification-icon img {
    width: 25px;
    height: 25px;
}

.notification-icon:hover {
    opacity: 0.8;
}

/* CSS for Listing */

.listings-container {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: flex-start;
    padding: 2rem;
}

/* Individual Listing Box */
.listing {
    width: 250px;
    background: #1d1d1d;
    color: #e0e0e0;
    padding: 1.5rem;
    border-radius: 8px;
    text-align: center;
    border: 1px solid #444;
    transition: transform 0.2s ease-in-out;
}

.listing:hover {
    transform: scale(1.05);
}

/* Add New Listing Box */
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

/* Buttons */
.listing-actions {
    margin-top: 1rem;
    display: flex;
    justify-content: space-between;
}

.btn {
    display: inline-block;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    font-size: 0.9rem;
    font-weight: bold;
    text-align: center;
    transition: background-color 0.3s ease;
}

.btn-edit {
    background: #5cbc64;
    color: white;
    border: none;
}

.btn-edit:hover {
    background: #4aa756;
}

.btn-delete {
    background: #e74c3c;
    color: white;
    border: none;
}

.btn-delete:hover {
    background: #c0392b;
}

/* Responsive */
@media (max-width: 768px) {
    .listings-container {
        justify-content: center;
    }

    .listing {
        width: 100%;
        max-width: 300px;
    }
}


</style>
</head>
<body>