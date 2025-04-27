<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8fafc;
    color: #1a1a1a;
    padding: 0;
    margin: 0;
}
.place-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 32px;
}
.back-button {
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 1000;
}
.back-button a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    background-color: #1a1a1a;
    color: #ffffff;
    border-radius: 50%;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s ease, transform 0.3s ease;
}
.back-button a i {
    font-size: 28px;
}
.back-button a:hover {
    background-color: #76c07d;
    transform: scale(1.1);
}
.back-button a:active {
    transform: scale(0.95);
}
.restaurant-header {
    margin-bottom: 48px;
}
.restaurant-header h1 {
    font-size: 2.8rem;
    font-weight: 600;
    line-height: 1.3;
    color: #1a1a1a;
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
}
.restaurant-header h1 i {
    color: #76c07d;
}
.photo-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 16px;
}
.gallery-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.3s ease;
}
.gallery-image:hover {
    transform: scale(1.05);
}
.lightbox {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    z-index: 2000;
    justify-content: center;
    align-items: center;
}
.lightbox-image {
    max-width: 90%;
    max-height: 90vh;
    object-fit: contain;
}
.close-lightbox {
    position: absolute;
    top: 20px;
    right: 20px;
    color: #ffffff;
    font-size: 40px;
    cursor: pointer;
    transition: color 0.3s ease;
}
.close-lightbox:hover {
    color: #76c07d;
}
.resturant-details-container {
    display: flex;
    gap: 32px;
    margin-bottom: 48px;
}
.restaurant-details {
    width: 70%;
    background-color: #ffffff;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}
.restaurant-details p {
    font-size: 1rem;
    line-height: 1.6;
    color: #444;
    margin: 12px 0;
    display: flex;
    align-items: center;
    gap: 8px;
}
.restaurant-details p strong {
    color: #1a1a1a;
    font-weight: 600;
}
.restaurant-details p a {
    color: #76c07d;
    text-decoration: none;
    transition: color 0.3s ease;
}
.restaurant-details p a:hover {
    color: #5EBC67;
}
.opening-hours {
    width: 30%;
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.save-box, .hours-box {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}
.save-box h3, .hours-box h3 {
    font-size: 1.3rem;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 16px;
}
.save-button {
    width: 100%;
    padding: 10px;
    border: 2px solid #76c07d;
    border-radius: 25px;
    font-size: 0.95rem;
    font-weight: 600;
    background-color: transparent;
    color: #76c07d;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: background-color 0.3s ease, color 0.3s ease, transform 0.2s ease;
}
.save-button:hover {
    background-color: #76c07d;
    color: #ffffff;
    transform: scale(1.05);
}
.save-button i.favorite {
    color: #d62839;
}
.opens {
    font-size: 0.95rem;
    color: #76c07d;
    margin: 12px 0;
    font-weight: 500;
}
.hours-list {
    list-style: none;
    padding: 0;
}
.hours-list li {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
    font-size: 0.95rem;
    color: #444;
}
.hours-list li span:first-child {
    font-weight: 500;
    color: #1a1a1a;
}
.hours-list li .bold {
    font-weight: 600;
    color: #1a1a1a;
}
.restaurant-menu {
    margin-bottom: 48px;
}
.restaurant-menu h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 24px;
}
.cuisine-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 16px;
}
.cuisine-item {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    transition: transform 0.3s ease;
}
.cuisine-item:hover {
    transform: scale(1.05);
}
.cuisine-item img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}
.cuisine-name {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 8px;
    background: rgba(0, 0, 0, 0.5);
    color: #ffffff;
    font-weight: 600;
    text-align: center;
    margin: 0;
}
.menu-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}
.menu-popup-content {
    background: #ffffff;
    padding: 32px;
    max-height: 90vh;
    width: 90%;
    max-width: 600px;
    overflow-y: auto;
    border-radius: 12px;
    position: relative;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}
.menu-popup-content img {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 16px;
}
.menu-popup-content p {
    font-size: 1rem;
    line-height: 1.6;
    color: #444;
    margin: 8px 0;
}
.menu-popup-content p strong {
    color: #1a1a1a;
}
.menu-popup .close-btn {
    position: absolute;
    top: 16px;
    right: 16px;
    font-size: 24px;
    cursor: pointer;
    color: #1a1a1a;
    transition: color 0.3s ease;
}
.menu-popup .close-btn:hover {
    color: #76c07d;
}
.sizes {
    display: flex;
    gap: 12px;
    margin: 12px 0;
}
.size-item {
    display: flex;
    align-items: center;
    gap: 8px;
}
.size {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 4px 8px;
    font-size: 0.85rem;
    font-weight: 600;
    background-color: #f9f9f9;
}
.price {
    font-size: 0.95rem;
    color: #1a1a1a;
}
.cuisine-reviews {
    margin-top: 16px;
}
.menu-review {
    border-top: 1px solid #eee;
    padding-top: 12px;
    margin-top: 12px;
}
.menu-review-author {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    color: #1a1a1a;
}
.menu-review-profile {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    object-fit: cover;
}
.menu-review-rating {
    font-size: 0.95rem;
    color: #f39c12;
    margin: 8px 0;
}
.menu-review-text {
    font-size: 0.95rem;
    color: #444;
    margin: 0;
}
.bx.bxs-star {
    color: #f39c12;
}
.restaurant-reviews {
    margin-bottom: 48px;
}
.reviews-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}
.reviews-header h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #1a1a1a;
}
.write-review {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 1rem;
    font-weight: 600;
    color: #76c07d;
    text-decoration: none;
    transition: color 0.3s ease;
}
.write-review:hover {
    color: #5EBC67;
}
.reviews-container {
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.review {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}
.review:hover {
    transform: translateY(-4px);
}
.review-author {
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 8px;
}
.review-profile {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #76c07d;
}
.review-rating {
    font-size: 0.95rem;
    color: #f39c12;
    margin: 8px 0;
}
.review-text {
    font-size: 1rem;
    line-height: 1.6;
    color: #444;
    margin: 0;
}
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
.modal-content {
    background-color: #ffffff;
    margin: 5% auto;
    padding: 32px;
    border-radius: 12px;
    width: 90%;
    max-width: 600px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}
.modal-content .close {
    position: absolute;
    right: 16px;
    top: 16px;
    font-size: 24px;
    cursor: pointer;
    color: #1a1a1a;
    transition: color 0.3s ease;
}
.modal-content .close:hover {
    color: #76c07d;
}
.modal-content h2 {
    font-size: 1.8rem;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 24px;
}
.modal-content form {
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.modal-content label {
    font-size: 1rem;
    font-weight: 600;
    color: #1a1a1a;
}
.modal-content textarea {
    width: 100%;
    height: 120px;
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 12px;
    font-size: 1rem;
    resize: vertical;
}
.modal-content select {
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 1rem;
    width: 100%;
}
.modal-content button {
    background-color: #76c07d;
    color: #ffffff;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.modal-content button:hover {
    background-color: #5EBC67;
    transform: scale(1.05);
}
.auth-warning {
    font-size: 1rem;
    color: #444;
}
.auth-warning a {
    color: #76c07d;
    text-decoration: none;
}
.auth-warning a:hover {
    color: #5EBC67;
}
footer {
    text-align: center;
    padding: 24px;
    background-color: #1a1a1a;
    color: #ffffff;
    font-size: 0.9rem;
    margin-top: 48px;
}
</style>

</head>

<body>