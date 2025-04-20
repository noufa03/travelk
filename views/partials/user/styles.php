<style>
    .text-color-active {
        color: #76c07d; /* Active color */
    }
    .text-color-default {
        color: #000000; /* Default color */
    }

    /* Home Page */
    .logo {
        width: 250px;
        cursor: pointer;
    }
    body {
        font-family: Poppins, sans-serif;
        position: relative;
        background-color: #ffffff;
        color: black;
        padding: 5px 5px;
        margin: 25px 25px 0px 25px;
    }
    .logo-and-navigation {
        margin: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    nav {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    nav a {
        text-decoration: none;
        color: black;
        font-weight: 700;
    }
    .profile-icon {
        width: 40px;
        height: 40px;
    }
    .homepage-picture-container {
        background-image: url('assets/4.jpeg');
        background-size: cover;
        height: 80vh;
        background-position: 0px -60px;
        background-repeat: no-repeat;
        color: white;
        position: relative;
        overflow: hidden;
        border-radius: 12px 12px 0 0;
    }
   
    .header-1{
        text-align: center;
    }
    .slogan{
        text-align: center;
    }
    .h1-SriLK {
        color: #ffffff;
        margin-left: 12px;
        font-family: "Love Light", cursive;
        font-weight: 600;
        font-size: 5.5rem;
        font-style: normal;
        letter-spacing: 12px;
    }
    .center-container{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .start-planning-btn {
        background-color: transparent;
        color: #000000;
        border: 3px solid #000000;
        border-radius: 25px;
        padding: 15px 30px;
        font-size: 18px;
        font-weight: bold;
        display: inline-flex;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .start-planning-btn:hover {
        background-color: rgba(232, 235, 231, 0.22); 
        color: #000000; 
        transform: translateY(-2px); 
    }
    .arrow {
        margin-left: 8px; 
        font-size: 18px; 
        font-weight: bold; 
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }
    .arrow-icon {
        margin-left: 10px; 
        width: 20px; 
        height: auto; 
    }

    .search-container {
        padding: 20px;
        background-color: #f9f9f9; 
    }

    .hero {
        text-align: center;
    }

    .hero-text {
        font-size: 2em;
        margin-bottom: 20px;
    }

    .search-bar {
        display: flex;
        justify-content: center;
        align-items: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .search-inputs {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 25px;
        background-color: #fff;
        padding: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .input-group {
        margin: 0 10px;
    }

    .input-group label {
        display: block;
        font-size: 0.8em;
        color: #555;
    }

    .input-group input {
        border: none;
        outline: none;
        padding: 10px;
        border-radius: 20px;
        width: 150px;
    }
    .search-button {
        background-color: #76c07d;
        color: white;
        border: none;
        border-radius: 100px;
        padding: 10px 15px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-left: 10px;
    }

    .search-button:hover {
        background-color: #d62839; 
    }





    /*!* Search Container *!*/
    /* .search-container {
        background-color: #3d4a3d;
        padding: 5px 5px;
    }
    .hero {
        display: flex;
        justify-content: center; 
        align-items: center; 
        gap: 10px; 
        padding: 20px; 
    } */

    /* .search-bar {
        display: flex;
        flex-grow: 1; 
        max-width: 660px 
    }

    .search-bar input {
        flex-grow: 1; 
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px 0 0 5px; 
        font-size: 1em;
        width: 530px;
    }

    .search-bar button {
        padding: 10px 20px;
        background-color: transparent; 
        color: white;
        border: 2px solid white; 
        border-radius: 0 5px 5px 0; 
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease; 
    } */

    .hero-text {
        color: white;
        font-size: 1.2em;
        font-weight: bold;
        margin-right: 10px; 
    }

    .nav-2 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 8.6%;

    }
    .nav-2 a {
        text-decoration: none;
        color: black;
        margin-left: 20px;
        transition: color 0.3s ease;
        font-weight: 700;
        cursor: pointer;
    }
    .nav-2 a:hover {
        color: #5EBC67;
        text-decoration: underline;
        text-decoration-color: #5EBC67;
    }
    .feature-grid {
        margin: 40px 8%;
    }
    .feature-title {
        text-align: center;
        font-size: 1.8em;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }
    .card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }
    .card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }
    .card h3 {
        margin: 0;
        padding: 15px;
        font-size: 1.2em;
        color: #333;
        background-color: #fff;
    }
    .card:hover {
        transform: translateY(-5px);
    }

    footer {
        text-align: center;
        padding: 20px;
        background-color: #333;
        color: white;
        font-size: 0.9em;
    }







    .register-container {
        text-align: center;
        font-family: Poppins, sans-serif;
        color: var(--text-color-default, #000000); 
    }

    .role-boxes {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
        padding: 10px 5%; 
    }

    .role-box {
        width: 200px;
        height: 150px;
        padding: 20px;
        border: 1px solid #ddd; 
        border-radius: 8px;
        background-color: #ffffff; 
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .role-box:hover {
        transform: translateY(-5px); 
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15); 
        background-color: #76c07d;
    }

    .role-box a {
        color: #5EBC67; 
        text-decoration: none;
        font-weight: 600; 
        transition: color 0.3s ease, text-decoration 0.3s ease;
    }
    .role-box h3 {
        margin-bottom: 10px;
        font-size: 1.2em;
        color: var(--text-color-default, #000000); 
    }

    .role-box p {
        font-size: 0.9em;
        color: #777; 
    }





    /* Login Page Styles */
    .login-page {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        background-color: #f8f8f8;
        padding: 20px;
    }

    .login-container {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        padding: 30px;
    }

    .login-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .login-title {
        font-size: 1.8em;
        font-weight: 600;
        color: #76c07d;
    }

    .login-form {
        display: flex;
        flex-direction: column;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .input-container {
        margin-bottom: 15px;
    }

    .form-label {
        display: block;
        margin-bottom: 5px;
        font-size: 0.9em;
        color: #333333;
    }

    .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #dddddd;
        border-radius: 5px;
        font-size: 1em;
    }

    .form-input:focus {
        outline: none;
        border-color: #76c07d;
        box-shadow: 0 0 4px rgba(118, 192, 125, 0.5);
    }

    .form-actions {
        text-align: center;
    }

    .login-button {
        background-color: #76c07d;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .login-button:hover {
        background-color: #5EBC67;
    }

    .error-messages {
        margin-top: 15px;
        list-style: none;
        padding: 0;
        color: #FF0000;
        font-size: 0.9em;
    }

    .error-item {
        margin-bottom: 5px;
    }




    /* Register Page Styles */
    .register-page {
        display: flex;
        justify-content: center;
        align-items: center;
        /*height: 80vh;*/
        background-color: #f8f8f8;
        padding: 20px 20px;
    }

    .register-containerform{
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        padding: 30px;
    }

    .register-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .register-title {
        font-size: 1.8em;
        font-weight: 600;
        color: #76c07d;
    }

    .register-form {
        display: flex;
        flex-direction: column;
    }

    .form-group {
        margin-bottom: 20px;
    }

    /*qwe*/
    .input-container {
        margin-bottom: 15px;
    }

    .form-label {
        display: block;
        margin-bottom: 5px;
        font-size: 0.9em;
        color: #333333;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #dddddd;
        border-radius: 5px;
        font-size: 1em;
    }
    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: #76c07d;
        box-shadow: 0 0 4px rgba(118, 192, 125, 0.5);
    }

    .form-select {
        height: 40px;
        background-color: #ffffff;
    }

    .form-textarea {
        resize: vertical;
    }

    .checkbox-group {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .checkbox-group label {
        font-size: 0.9em;
        color: #333333;
    }

    .file-input {
        margin-top: 10px;
    }

    .form-actions {
        text-align: center;
    }

    .register-button {
        background-color: #76c07d;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .register-button:hover {
        background-color: #5EBC67;
    }

    #profile-preview {
        max-width: 200px;
        max-height: 200px;
        object-fit: cover;
        border-radius: 4px;
    }
    #imagePreview {
        margin-top: 10px;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 4px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }
    .btn-danger {
        position: absolute;
        margin-left: 5px;
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 2px 8px;
        font-size: 12px; 
        border-radius: 4px;
        cursor: pointer;
        z-index: 1; 
    }
    .btn-danger:hover {
        background-color: #c82333;
    }



    /*Discover page*/
    .no-places-watermark {
        text-align: center;
        padding: 50px;
        background-color: #f8f8f8;
        color: #666;
        font-size: 1em;
        font-style: italic;
        margin: 20px;
        border-radius: 10px;
    }
    .places-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Space between cards */
        justify-content: center; /* Center the cards */
    }

    .place-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden; /* Ensure the image doesn't overflow */
        width: 300px; /* Set a fixed width for the cards */
        transition: transform 0.2s; /* Smooth hover effect */
    }

    .place-card:hover {
        transform: scale(1.05); /* Slightly enlarge on hover */
    }

    .place-image {
        width: 100%; /* Make the image fill the card */
        height: 200px; /* Set a fixed height for the image */
        object-fit: cover; /* Ensure the image covers the area */
    }

    .place-details {
        padding: 15px; /* Add padding inside the card */
    }

    .place-details h3 {
        margin: 0 0 10px; /* Space below the title */
    }

    .rating {
        color: #FFD700; /* Gold color for the rating */
    }

    .price {
        font-weight: bold; /* Make the price bold */
        margin-top: 10px; /* Space above the price */
    }



    .question-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .question {
        display: none;
    }
    .question.active {
        display: block;
    }
    .options {
        margin: 20px 0;
    }
    .option {
        display: block;
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
    }
    .option.selected {
        background-color: #5EBC67;
        color: white;
    }
    .option:hover {
        background-color: #f5f5f5;
    }
    .buttons {
        margin-top: 20px;
    }
    .btn {
        padding: 10px 20px;
        margin-right: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-next {
        background-color: #4CAF50;
        color: white;
    }
    .btn-skip {
        background-color: #f0f0f0;
    }
    .btn-next-step {
        display: none;
        background-color: #2196F3;
        color: white;
    }
    .btn-back {
        background-color: #f44336;
        color: white;
    }



/* CSS for Popup Overlay */
.popup-overlay {
    position: fixed; /* Stay in place */
    top: 0;
    left: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    background-color: rgba(0, 0, 0, 0.7); /* Black with opacity */
    display: flex; /* Center the popup */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    z-index: 1000; /* Sit on top */
}

/* CSS for Popup Content */
.popup-content {
    background-color: #fff; /* White background */
    padding: 20px;
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
    text-align: center; /* Center text */
    width: 300px; /* Set a width for the popup */
}

/* CSS for Popup Buttons */
.popup-buttons {
    margin: 20px 0; /* Space between buttons */
}

.popup-buttons button {
    margin: 0 10px; /* Space between buttons */
    padding: 10px 15px; /* Button padding */
    border: none; /* Remove border */
    border-radius: 5px; /* Rounded corners */
    background-color: #007BFF; /* Bootstrap primary color */
    color: white; /* White text */
    cursor: pointer; /* Pointer cursor on hover */
}

.popup-buttons button:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

/* Close Button */
.popup-close {
    background: none; /* No background */
    border: none; /* No border */
    color: #aaa; /* Gray color */
    font-size: 20px; /* Font size */
    cursor: pointer; /* Pointer cursor */
}

.popup-close:hover {
    color: black; /* Change color on hover */
}



/* Place Planning Page */
.main-container {
    display: grid;
    grid-template-columns: 1fr 3fr;
    justify-content: space-between;
    /* padding: 20px; */
    background-color: #ffffff;
    color: black;
}
#left-pane {
    position: sticky;
    top: 0;
    /* height: 100vh; */
    width: 100%;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

#left-pane h3 {
    font-size: 1.5em;
    margin-left: 10px;
    /* margin-bottom: 20px; */
    color: #333;
}

#selected-places {
    list-style-type: none;
    padding: 0;
}
.selected-place {
    margin-bottom: 15px;
    padding: 10px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.selected-place button {
    background-color: #d62839;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.selected-place button:hover {
    background-color: #b02130;
}

.next-button {
    background-color: #76c07d;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 20px;
}

.next-button:hover {
    background-color: #5EBC67;
}
.selected-place button:hover {
    background-color: #b02130;
}
.watermark {
    text-align: center;
    color: #ccc;
    font-size: 1.2em;
    margin-top: 50px;
}
#right-pane {
    width: 100%;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.map-container iframe {
    width: 100%;
    height: 400px;
    border: none;
    border-radius: 12px;
}

.search-container {
    margin-top: 20px;
}
#places-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
}

.place-card {
    background-color: #fff;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.place-card h4 {
    margin: 0;
    font-size: 1.2em;
    color: #333;
}
.place-card p {
    margin: 5px 0;
    color: #555;
}

.place-card button {
    background-color: #76c07d;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.place-card button:hover {
    background-color: #5EBC67;
}

</style>
</head>

<?php require (BASE_PATH.'views/partials/user/toast.php');?>


    