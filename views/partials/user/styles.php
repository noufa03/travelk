<style>

/* Home Page */
.text-color-active {
    color: #76c07d;
}
.text-color-default {
    color: #000000;
}
.left-logo-traveLK {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 100;
    width: 180px;
    max-width: 35vw;
    cursor: pointer;
    transition: transform 0.3s ease;
}
.left-logo-traveLK:hover {
    transform: scale(1.05);
}
.right-logo-traveLK {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 100;
    width: 180px;
    max-width: 35vw;
    cursor: pointer;
    transition: transform 0.3s ease;
}
.right-logo-traveLK:hover {
    transform: scale(1.05);
}
@media (max-width: 768px) {
    .left-logo-traveLK,
    .right-logo-traveLK {
        width: 120px;
        top: 10px;
    }
}
@media (max-width: 480px) {
    .left-logo-traveLK,
    .right-logo-traveLK {
        width: 100px;
        top: 8px;
    }
}
.logo {
    width: 220px;
    cursor: pointer;
    transition: transform 0.3s ease;
}
.logo:hover {
    transform: scale(1.05);
}
html {
    scroll-behavior: smooth;
    height: 100%;
}
body {
    font-family: 'Poppins', sans-serif;
    position: relative;
    background-color: #f8fafc;
    color: #1a1a1a;
    margin: 0;
    padding: 0;
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
    gap: 25px;
}
nav a {
    text-decoration: none;
    color: #1a1a1a;
    font-weight: 600;
    font-size: 1rem;
    transition: color 0.3s ease;
}
nav a:hover {
    color: #76c07d;
}
.profile-icon {
    width: 36px;
    height: 36px;
    transition: transform 0.3s ease;
}
.profile-icon:hover {
    transform: scale(1.1);
}
.homepage-picture-container {
    position: relative;
    height: 80vh;
    color: #ffffff;
    overflow: hidden;
    background-size: cover;
    background-position: center;
    animation: backgroundSlide 15s infinite ease-in-out;
}
@keyframes backgroundSlide {
    0% { background-image: url('assets/4.jpeg'); }
    33.33% { background-image: url('assets/1.jpg'); }
    66.66% { background-image: url('assets/2.jpg'); }
    100% { background-image: url('assets/4.jpeg'); }
}
.homepage-picture-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    z-index: 1;
}
.container {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}
.header-1 {
    text-align: center;
    font-size: 3.5rem;
    font-weight: 700;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}
.h1-SriLK {
    color: #76c07d;
    font-family: 'Love Light', cursive;
    font-weight: 600;
    font-size: 4.5rem;
    letter-spacing: 8px;
}
.slogan {
    text-align: center;
    font-size: 1.25rem;
    font-weight: 400;
    margin-top: 10px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
}
.search-container {
    padding: 40px 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
}
.hero {
    text-align: center;
}
.search-bar {
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 600px;
    margin: 0 auto;
}
.search-bar form {
    width: 100%;
}
.search-inputs {
    display: flex;
    align-items: center;
    background-color: #ffffff;
    border-radius: 50px;
    padding: 8px 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}
.search-inputs:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}
.input-group {
    flex: 1;
    margin: 0 10px;
}
.input-group label {
    display: block;
    font-size: 0.85rem;
    color: #555;
    font-weight: 500;
    margin-bottom: 5px;
}
.input-group input {
    border: none;
    outline: none;
    padding: 10px;
    width: 100%;
    font-size: 1rem;
    border-radius: 20px;
}
.search-button {
    background-color: #76c07d;
    color: #ffffff;
    border: none;
    border-radius: 50px;
    padding: 12px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.search-button:hover {
    background-color: #5EBC67;
    transform: scale(1.05);
}
.nav-2 {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px 0;
}
.nav-2 a {
    text-decoration: none;
    color: #1a1a1a;
    margin: 0 20px;
    font-weight: 600;
    font-size: 1rem;
    transition: color 0.3s ease;
}
.nav-2 a:hover {
    color: #76c07d;
}
.places-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    padding: 20px 0;
}
.place-card {
    background-color: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.place-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}
.place-details a {
    text-decoration: none;
    color: inherit;
    display: block;
}
.place-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 2px solid #76c07d;
}
.place-details h3 {
    font-size: 1.25rem;
    margin: 15px;
    font-weight: 600;
}
.place-details p {
    margin: 0 15px 15px;
    font-size: 0.9rem;
    color: #555;
}
.no-places-watermark {
    text-align: center;
    padding: 40px;
    font-size: 1.1rem;
    color: #555;
}
footer {
    text-align: center;
    padding: 20px;
    background-color: #1a1a1a;
    color: #ffffff;
    font-size: 0.9rem;
    margin-top: 40px;
}





    .register-container {
        height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-family: Poppins, sans-serif;
        color: var(--text-color-default, #000000);
    }

    .admin-container {
        display: flex;
        flex-direction: column;
        gap:15px;
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #76c07d; 
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
        padding: 40px;
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
        width: 95%;
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
        width: 95%;
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
    .center-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        gap: 20px;
        flex-wrap: wrap;
    }
    


    .places-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
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
    .place-details a{
        text-decoration: none;
    }
    .place-details h3 {
        color:purple;
        margin: 0 0 10px; /* Space below the title */
    }

    .rating {
        color: #FFD700; /* Gold color for the rating */
    }

    .price {
        font-weight: bold; /* Make the price bold */
        margin-top: 10px; /* Space above the price */
    }


    /* Planning Page Questions*/
    .question-container {
        min-height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-width: 700px;
        margin: 30px auto;
        background: #ffffff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .question {
        display: none;
        animation: fadeIn 0.5s ease-in-out;
    }

    .question.active {
        display: block;
    }

    .question h3 {
        margin-bottom: 20px;
        color: #333;
        font-size: 1.3rem;
    }

    .options {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .option {
        background: #f1f5f9;
        border-radius: 8px;
        padding: 12px 15px;
        display: flex;
        align-items: center;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .option:hover {
        background-color: #e0f2fe;
    }

    .option input[type="checkbox"] {
        margin-right: 10px;
        transform: scale(1.2);
    }

    .buttons {
        text-align: center;
        margin-top: 30px;
    }

    .btn {
        padding: 10px 22px;
        margin: 8px 6px;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s ease;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-back {
        background-color: #a0aec0;
        color: black;
    }

    .btn-next {
        background-color: #76c07d;
        color: black;
    }

    .btn-skip {
        background-color: #f4a261;
        color: black;
    }

    .btn-next-step {
        background-color: #2a9d8f;
        color: black;
    }

    .btn:hover {
        opacity: 0.95;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }



    /* place/stay/rest plan page */
    .main-container {
        display: grid;
        grid-template-columns: 1fr 3fr;
        background-color: #ffffff;
        color: #222;
        height: 100vh;
        overflow: hidden; 
    }

    #left-pane {
    position: sticky;
    top: 20px;
    padding: 24px;
    background-color: #ffffff;
    border-radius: 16px;
    height: calc(100vh - 40px);
    overflow-y: auto;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    scrollbar-width: none;
    -ms-overflow-style: none;
}
#left-pane::-webkit-scrollbar {
    display: none;
}
#left-pane h3 {
    font-size: 1.8rem;
    font-weight: 600;
    line-height: 1.4;
    margin-bottom: 16px;
    color: #1a1a1a;
}
.watermark {
    font-size: 1rem;
    line-height: 1.6;
    color: #666;
    text-align: center;
    margin: 24px 0;
}
.watermark strong {
    color: #1a1a1a;
    font-weight: 600;
}
#selected-places {
    list-style-type: none;
    padding: 0;
}
.selected-places-container {
    height: calc(100vh - 180px);
}
.selected-place {
    background-color: #f1fdf3;
    border-left: 5px solid #76c07d;
    border-radius: 10px;
    padding: 16px;
    margin-bottom: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}
.selected-place h4 {
    margin: 0 0 8px;
    font-size: 1.3rem;
    font-weight: 600;
    line-height: 1.4;
    color: #1a1a1a;
}
.selected-place .place-info {
    margin: 4px 0;
    font-size: 0.95rem;
    line-height: 1.5;
    color: #444;
}
.selected-place button {
    background-color: #d62839;
    color: #ffffff;
    border: none;
    border-radius: 6px;
    padding: 8px 16px;
    cursor: pointer;
    font-size: 0.9rem;
    font-weight: 500;
    margin-top: 12px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.selected-place button:hover {
    background-color: #b02130;
    transform: scale(1.05);
}
.next-button, .skip-button, .back-button {
    background-color: #76c07d !important;
    color: #ffffff !important;
    border: none !important;
    border-radius: 8px;
    padding: 12px 24px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    margin-top: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
.back-button {
    background-color: #4a927d important;
}
.next-button:hover, .skip-button:hover {
    background-color: #5EBC67 !important;
    transform: scale(1.05);
}
.back-button:hover {
    background-color: #3a7e6c !important;
    transform: scale(1.05);
}
.sticky-container {
    position: sticky;
    z-index: 100;
    bottom: 0;
    padding: 16px;
    background-color: #f9f9f9;
    border-radius: 8px;
}
#right-pane {
    padding: 24px;
    border-radius: 16px;
    overflow-y: auto;
    scrollbar-width: none;
    -ms-overflow-style: none;
}
#right-pane::-webkit-scrollbar {
    display: none;
}
.place-plan-header {
    margin-bottom: 24px;
}
.place-plan-header span {
    font-size: 1.8rem;
    font-weight: 600;
    line-height: 1.4;
    color: #1a1a1a;
}
.place-plan-header-text {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #444;
    margin-top: 8px;
}
.search-container {
    padding: 16px 0;
}
.search-bar {
    display: flex;
    align-items: center;
    max-width: 500px;
    margin: 0 auto;
}
.search-inputs {
    flex: 1;
    background-color: #ffffff;
    border-radius: 50px;
    padding: 8px 16px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}
.input-group input {
    border: none;
    outline: none;
    padding: 10px;
    width: 100%;
    font-size: 1rem;
    line-height: 1.5;
}
.search-button {
    background-color: #76c07d;
    color: #ffffff;
    border: none;
    border-radius: 50px;
    padding: 12px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.search-button:hover {
    background-color: #5EBC67;
    transform: scale(1.05);
}
#places-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
    margin-top: 24px;
}
.place-card {
    background-color: #ffffff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.place-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}
.place-card img {
    width: 100%;
    border-radius: 8px;
    object-fit: cover;
    margin-bottom: 12px;
    max-height: 180px;
}
.place-card h4 {
    margin: 0 0 8px;
    font-size: 1.3rem;
    font-weight: 600;
    line-height: 1.4;
    color: #1a1a1a;
}
.place-card p {
    margin: 6px 0;
    font-size: 0.95rem;
    line-height: 1.5;
    color: #444;
}
.place-card .add-button {
    background-color: #76c07d;
    color: #ffffff;
    border: none;
    border-radius: 6px;
    padding: 10px 20px;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.place-card .add-button:hover {
    background-color: #5EBC67;
    transform: scale(1.05);
}
.place-card .details-button {
    background-color: #4a927d;
    color: #ffffff;
    border: none;
    border-radius: 6px;
    padding: 10px 20px;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.place-card .details-button:hover {
    background-color: #3a7e6c;
    transform: scale(1.05);
}
.place-info {
    margin: 4px 0;
    font-size: 0.95rem;
    line-height: 1.5;
    color: #444;
}
@media (max-width: 768px) {
    .main-container {
        grid-template-columns: 1fr;
    }
    .place-card {
        width: 100%;
    }
    .next-button, .skip-button, .back-button {
        font-size: 0.95rem;
        padding: 10px 18px;
    }
}

    /* .trip-container {
    display: flex;
    gap: 30px;
    padding: 20px;
    flex-wrap: wrap;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(118, 192, 125, 0.1);
}

.trip-container-left {
    display: flex;
    flex-direction: column;
    gap: 20px;
    flex: 1;
    min-width: 280px;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(118, 192, 125, 0.08);
}

.trip-container-left-item {
    background-color: #e8f7ea;
    padding: 12px 18px;
    border-left: 4px solid #76c07d;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 10px;
    color: #2c2c2c;
}

.trip-container-left-item i {
    color: #5EBC67;
    font-size: 20px;
}

.trip-container-left p {
    margin-left: 10px;
    color: #555;
    font-size: 14px;
}

.next-button {
    background-color: #76c07d;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 10px;
}

.next-button:hover {
    background-color: #5EBC67;
}

.trip-container-right{
    flex: 3;
}
#traveler-form{
    display: flex;
    flex-direction: row;
    justify-content:left;
}

.trip-container-right-right{
    display: flex;
    flex-direction: column;
    flex: 1;
}

.trip-container-right-left{
    display: flex;
    flex-direction: column;
    flex: 1;
} */



    
    
</style>
</head>

<?php require (BASE_PATH.'views/partials/user/toast.php');?>


    