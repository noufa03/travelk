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
    /*.homepage-picture-container {*/
    /*    !*pointer-events: none;*!*/
    /*    content: '';*/
    /*    border-radius: 15px 15px 0 0;*/
    /*    padding-top: 2px;*/
    /*    background: rgba(0, 0, 0, 0.09); !* Semi-transparent overlay *!*/
    /*    z-index: 0;*/
    /*}*/
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
        color: #ffffff;
        border: 3px solid #ffffff;
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
        background-color: rgba(232, 235, 231, 0.22); /* Light green translucent background on hover */
        color: #ffffff; /* Ensure text remains white on hover */
        transform: translateY(-2px); /* Slight lift effect */
    }
    .arrow {
        margin-left: 8px; /* Space between text and arrow */
        font-size: 18px; /* Slightly larger arrow size */
        font-weight: bold; /* Bold arrow */
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Adds thickness and depth */
    }
    .arrow-icon {
        margin-left: 10px; /* Space between text and image */
        width: 20px; /* Adjust width of the icon */
        height: auto; /* Maintain aspect ratio */
    }

    /*!* Search Container *!*/
    .search-container {
        /*background-color: #76c07d; !* Dark green *!*/
        background-color: #3d4a3d;
        padding: 5px 5px;
        /*margin: 0px 25px 0px 25px;*/
        /*text-align: center;*/
    }
    .hero {
        display: flex;
        justify-content: center; /* Centers items horizontally */
        align-items: center; /* Centers items vertically */
        gap: 10px; /* Adds space between items */
        padding: 20px; /* Optional: Adds padding to the hero section */
        /*background-color: #A7D087; !* Optional: Sets the background color *!*/
    }

    .search-bar {
        display: flex;
        flex-grow: 1; /* Allows the input to grow */
        max-width: 660px /* Restricts the total width of the search bar */
    }

    .search-bar input {
        flex-grow: 1; /* Makes the input take up available space */
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px 0 0 5px; /* Rounded corners on the left */
        font-size: 1em;
        width: 530px;
    }

    .search-bar button {
        padding: 10px 20px;
        background-color: transparent; /* No background color */
        color: white;
        border: 2px solid white; /* White outline */
        border-radius: 0 5px 5px 0; /* Rounded corners on the right */
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease; /* Smooth transitions */
    }

    .hero-text {
        color: white;
        font-size: 1.2em;
        font-weight: bold;
        margin-right: 10px; /* Adds space between text and input */
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
        color: var(--text-color-default, #000000); /* Default color from theme */
    }

    .role-boxes {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
        padding: 10px 5%; /* Add consistent padding */
    }

    .role-box {
        width: 200px;
        height: 150px;
        padding: 20px;
        border: 1px solid #ddd; /* Light border */
        border-radius: 8px;
        background-color: #ffffff; /* Match the light theme background */
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .role-box:hover {
        transform: translateY(-5px); /* Lift effect */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15); /* Deeper shadow on hover */
        background-color: #76c07d;
    }

    .role-box a {
        color: #5EBC67; /* Active green color */
        text-decoration: none;
        font-weight: 600; /* Bold text */
        transition: color 0.3s ease, text-decoration 0.3s ease;
    }

    /*.role-box a:hover {*/
    /*    text-decoration: underline;*/
    /*    text-decoration-color: #5EBC67;*/
    /*    color: #76c07d; !* Slightly lighter green on hover *!*/
    /*}*/

    .role-box h3 {
        margin-bottom: 10px;
        font-size: 1.2em;
        color: var(--text-color-default, #000000); /* Default color */
    }

    .role-box p {
        font-size: 0.9em;
        color: #777; /* Subtle text color for descriptions */
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


    /*Discover page*/
    .no-places-watermark {
        text-align: center;
        padding: 50px;
        background-color: #f8f8f8;
        color: #666;
        font-size: 1em;
        font-style: italic;
        /*border: 2px dashed #ddd;*/
        margin: 20px;
        border-radius: 10px;
    }


</style>

</head>

<body>