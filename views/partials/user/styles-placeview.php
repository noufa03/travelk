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
.photos {
    margin-bottom: 48px;
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
.place-details {
    margin-bottom: 48px;
}
.place-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}
.place-name {
    font-size: 2.8rem;
    font-weight: 600;
    line-height: 1.3;
    color: #1a1a1a;
}
.place-actions {
    display: flex;
    align-items: center;
    gap: 16px;
}
.place-actions i {
    font-size: 1.8rem;
    color: #76c07d;
    cursor: pointer;
    transition: color 0.3s ease;
}
.place-actions i:hover {
    color: #5EBC67;
}
.place-actions i.favorite {
    color: #d62839;
}
.save-button {
    padding: 10px 20px;
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
.plan-trip-button {
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
.plan-trip-button:hover {
    background-color: #5EBC67;
    transform: scale(1.05);
}
.place-description {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #444;
    background-color: #ffffff;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}
.key-details {
    margin-bottom: 48px;
}
.key-details h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 24px;
}
.details-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 16px;
}
.detail-item {
    background-color: #ffffff;
    padding: 16px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}
.detail-item:hover {
    transform: translateY(-4px);
}
.detail-label {
    font-size: 1rem;
    font-weight: 600;
    color: #1a1a1a;
    display: block;
    margin-bottom: 8px;
}
.detail-value {
    font-size: 0.95rem;
    color: #444;
}
.location {
    margin-bottom: 48px;
}
.location h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 24px;
}
.location-details {
    background-color: #ffffff;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.address {
    display: flex;
    flex-direction: column;
}
.label {
    font-size: 1rem;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 8px;
}
.value {
    font-size: 0.95rem;
    color: #444;
}
.map-link a {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 1rem;
    font-weight: 600;
    color: #76c07d;
    text-decoration: none;
    transition: color 0.3s ease;
}
.map-link a:hover {
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