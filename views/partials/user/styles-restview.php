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

.save-box,
.hours-box {
  width: 30%;
  border: 1px solid #ddd;
  padding: 16px;
  border-radius: 8px;
  margin-bottom: 20px;
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


</style>

</head>

<body>