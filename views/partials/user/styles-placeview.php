<style>
.text-color-active {
    color: #76c07d;
}
.text-color-default {
    color: #000000;
}
.logo-userprofile {
    height: 26px;
    cursor: pointer;
    margin-right: 20px;
    transition: transform 0.3s ease;
}
.logo-userprofile:hover {
    transform: scale(1.05);
}
body {
    font-family: 'Poppins', sans-serif;
    position: relative;
    background-color: #f8fafc;
    color: #1a1a1a;
    padding: 0;
    margin: 0;
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
.place-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 32px;
}
.place-details {
    margin-bottom: 48px;
}
.place-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
}
.place-name {
    font-size: 2.8rem;
    font-weight: 600;
    line-height: 1.3;
    color: #1a1a1a;
    margin: 0;
}
.place-actions {
    display: flex;
    align-items: center;
    gap: 16px;
}
.place-header i {
    font-size: 24px;
    cursor: pointer;
    color: #1a1a1a;
    transition: color 0.3s ease, transform 0.3s ease;
}
.place-header i:hover {
    color: #76c07d;
    transform: scale(1.2);
}
.place-header i.favorite {
    color: #d62839;
}
.plan-trip-button {
    background-color: #76c07d;
    color: #ffffff;
    border: none;
    padding: 12px 24px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.plan-trip-button:hover {
    background-color: #5EBC67;
    transform: translateY(-2px);
}
.plan-trip-button:active {
    transform: translateY(0);
}
.place-description {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #444;
    margin: 0;
}
.key-details {
    margin-bottom: 48px;
}
.key-details h2 {
    font-size: 2rem;
    font-weight: 600;
    line-height: 1.4;
    color: #1a1a1a;
    margin-bottom: 24px;
}
.details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
}
.detail-item {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}
.detail-item:hover {
    transform: translateY(-4px);
}
.detail-label {
    font-weight: 600;
    font-size: 1rem;
    color: #1a1a1a;
    display: block;
    margin-bottom: 8px;
}
.detail-value {
    font-size: 1rem;
    line-height: 1.5;
    color: #444;
}
.location {
    margin-bottom: 48px;
}
.location h2 {
    font-size: 2rem;
    font-weight: 600;
    line-height: 1.4;
    color: #1a1a1a;
    margin-bottom: 24px;
}
.location-details {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}
.address .label {
    font-weight: 600;
    font-size: 1rem;
    color: #1a1a1a;
}
.address .value {
    font-size: 1rem;
    line-height: 1.5;
    color: #444;
}
.map-link a {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: 12px;
    padding: 10px 20px;
    background-color: #76c07d;
    color: #ffffff;
    border-radius: 25px;
    font-weight: 600;
    font-size: 0.95rem;
    text-decoration: none;
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.map-link a:hover {
    background-color: #5EBC67;
    transform: scale(1.05);
}
.photo-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 16px;
    margin-bottom: 48px;
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