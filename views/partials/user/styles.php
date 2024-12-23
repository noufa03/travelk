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
    }

    .role-boxes {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
    }

    .role-box {
        width: 200px;
        height: 150px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .role-box a {
        color: #333;
        text-decoration: none;
    }

    .role-box a:hover {
        text-decoration: underline;
    }

    .role-box h3 {
        margin-bottom: 10px;
    }

    .role-box p {
        font-size: 14px;
        color: #777;
    }


</style>

</head>

<body>