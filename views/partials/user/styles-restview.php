<style>
.text-color-active {
  color: #76c07d; /* Active color */
}
.text-color-default {
  color: #000000; /* Default color */
}

.logo-userprofile {
  height: 26px;
  cursor: pointer;
  margin-right: 20px;
}
body {
  font-family: Poppins, sans-serif;
  position: relative;
  background-color: #ffffff;
  color: black;
  padding: 0;
  margin: 0;
}

.back-button {
    position: fixed; /* Keeps it in place while scrolling */
    top: 20px;
    left: 20px;
    z-index: 1000; /* Ensures it's above other elements */
}
.back-button a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    background-color: #333; /* Dark background */
    color: #fff; /* White icon */
    border-radius: 50%;
    text-decoration: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}
.back-button a i {
    font-size: 30px;
}
.back-button a:hover {
    background-color: #555; /* Lighter on hover */
    transform: scale(1.1);
}
.back-button a:active {
    transform: scale(0.95);
}

/* Container Styles */
.place-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.place-details {
    margin-bottom: 40px;
}


.photo-gallery {
    display: flex;
    gap: 15px;
    overflow-x: auto; /* Enables horizontal scrolling */
    white-space: nowrap; /* Prevents wrapping */
    padding-bottom: 10px;
    scrollbar-width: none; /* For Firefox */
    scrollbar-color: #888 #f1f1f1; /* For Firefox */
}


/* Custom scrollbar for Webkit browsers */
.photo-gallery::-webkit-scrollbar {
    height: 8px;
}

.photo-gallery::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.photo-gallery::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
}

.photo-gallery::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.photo-gallery img {
    flex-shrink: 0; /* Prevents images from shrinking */
    height: 290px;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.photo-gallery img:hover {
    transform: scale(1.05);
}

.resturant-details-container{
  display: flex;
  justify-content: space-between;
  gap: 20px;
}
.restaurant-details{
  width: 70%;
} 
.opening-hours{
  width: 30%;
}

.save-box,
.hours-box {
  border: 1px solid #ddd;
  padding: 16px;
  border-radius: 8px;
  margin-top: 10px;
}

.save-box h3 {
  font-size: 16px;
  margin-bottom: 10px;
}

.save-button {
  width: 100%;
  padding: 10px;
  border: 1.5px solid black;
  border-radius: 25px;
  font-size: 14px;
  background-color: transparent;
  cursor: pointer;
}

.hours-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.hours-header h3 {
  font-size: 16px;
}

.hours-header a {
  font-size: 12px;
  text-decoration: underline;
  color: #007bff;
  cursor: pointer;
}

.opens {
  font-size: 13px;
  color: green;
  margin: 10px 0;
}

.hours-list {
  list-style: none;
  padding: 0;
}

.hours-list li {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
  font-size: 14px;
}

.hours-list li span:first-child {
  font-weight: 500;
  width: 100px;
  flex-shrink: 0;
}

.bold {
  font-weight: bold;
}

.review-author {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: bold;
    margin: 0;
    color: #333;
}

.review {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 8px;
  padding: 16px;
  border: 1px solid #ddd;
  border-radius: 12px;
  margin-bottom: 16px;
  background-color: #f9f9f9;
  box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.reviews-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.write-review {
  text-decoration: underline;
  color: black;
  cursor: pointer;
}

.review-profile {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #ccc;
}


.review-rating {
  font-size: 0.95rem;
  color: #f39c12;
  font-weight: 500;
  margin: 0;
}

.review-text {
  font-size: 0.95rem;
  color: #555;
  margin: 0;
}

/* Footer Styles */
footer {
    text-align: center;
    padding: 20px;
    background-color: #f9f9f9;
    margin-top: 40px;
    border-top: 1px solid #ddd;
}


/* Menu Styles */
/* Container for the horizontal scroll */
.cuisine-container {
    display: flex;
    overflow-x: auto;
    padding: 1rem;
    gap: 1rem;
    position: relative;
    scroll-behavior: smooth;
}

/* Each cuisine item */
.cuisine-item {
    position: relative;
    flex: 0 0 auto;
    width: 200px;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    background-color: #fff;
    transition: transform 0.2s ease;
}
.cuisine-item:hover {
    transform: scale(1.05);
}

/* Cuisine image */
.cuisine-item img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

/* Name overlay */
.cuisine-item p:first-of-type {
    position: absolute;
    bottom: 0;
    left: 0;
    margin: 0;
    width: 100%;
    padding: 0.5rem;
    background: rgba(0,0,0,0.5);
    color: #fff;
    font-weight: bold;
    text-align: center;
}


/* Inside details */
.cuisine-details-box p,
.cuisine-details-box .sizes,
.cuisine-details-box .cuisine-reviews {
    margin-bottom: 1rem;
}

/* Menu Review styling */
.menu-review {
    border-top: 1px solid #ddd;
    padding-top: 0.5rem;
}
.menu-review .menu-review-author {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}
.menu-review .menu-review-author .menu-review-profile {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover;
}
.bx.bxs-star {
    color: gold;
}

.size{
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 0.2rem 0.5rem;
    font-size: 0.8rem;
    font-weight: 700;
    margin: 0 0.5rem;
    background-color: #f9f9f9;
   
}

.menu-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.menu-popup-content {
    background: #fff;
    padding: 50px;
    max-height: 90vh;
    width: 90%;
    max-width: 600px;
    overflow-y: auto;
    border-radius: 10px;
    position: relative;
    box-shadow: 0 0 20px rgba(0,0,0,0.3);
}

.menu-popup .close-btn {
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 22px;
    cursor: pointer;
    font-weight: bold;
}

.menu-popup-content img {
    width: 400px;
    height: 300px;
    object-fit: cover;
    margin-bottom: 10px;
}

.menu-popup-content .sizes,
.menu-popup-content .cuisine-reviews {
    margin-top: 15px;
    font-weight: bold;
}


/* Write Review Modal */
/* Modal Overlay */
.modal {
  display: none;
  position: fixed;
  z-index: 999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

/* Modal Box */
.modal-content {
  background-color: #fff;
  margin: 8% auto;
  padding: 20px;
  border-radius: 12px;
  width: 90%;
  max-width: 500px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
  position: relative;
}

/* Close Button */
.modal-content .close {
  position: absolute;
  right: 15px;
  top: 10px;
  font-size: 24px;
  cursor: pointer;
}

/* Form Styling */
.modal-content form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.modal-content textarea {
  width: 100%;
  height: 120px;
  padding: 10px;
  border-radius: 8px;
  border: 1px solid #ccc;
  resize: vertical;
}

.modal-content select {
  padding: 8px;
  border-radius: 6px;
  border: 1px solid #ccc;
}

.modal-content button {
  background-color: #333;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 6px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.modal-content button:hover {
  background-color: #555;
}



</style>

</head>

<body>