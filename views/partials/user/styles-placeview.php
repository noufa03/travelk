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

.place-details h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #333;
}

.place-details p {
    font-size: 1.1rem;
    color: #555;
    line-height: 1.8;
}

.place-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px; /* Space between icon and text */
}

.place-header i {
    /* display: inline-flex; */
    font-size: 23px; /* Adjust size */
    cursor: pointer;
    margin-right: 16px;
    transition: transform 0.3s ease;
}
.bx bx-heart {
    margin-top: 10px;
}
.place-header i:hover {
    transform: scale(1.2);
}


.plan-trip-button {
    background-color: #ffffff; 
    color: #76c07d;
    border: 1px solid #76c07d; /* Remove default border */
    padding: 10px 20px; /* Comfortable padding */
    font-size: 23px; /* Readable font size */
    border-radius: 10px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transitions */

}

.plan-trip-button:hover {
    color: #ffffff;
    background-color: #5ca063; /* Darker green on hover */
    transform: translateY(-2px); /* Slight lift effect */
}


.plan-trip-button:active {
    transform: translateY(0); /* Reset lift effect when clicked */
}
/* Key Details Section */
.key-details {
    margin-bottom: 40px;
}

.key-details h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #333;
}

.details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.detail-item {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.detail-label {
    font-weight: 600;
    color: #333;
    display: block;
    margin-bottom: 5px;
}

.detail-value {
    color: #555;
    font-size: 1rem;
}

/* Location Section */
.location {
    margin-bottom: 40px;
}

.location h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #333;
}

.location-details {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.address .label {
    font-weight: 600;
    color: #333;
}

.address .value {
    color: #555;
    font-size: 1rem;
}

.map-link a {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #76c07d;
    color: #fff;
    border-radius: 25px;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

.map-link a:hover {
    background-color: #5ca063;
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