<style>
    body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8fafc;
    color: #1a1a1a;
    padding: 0;
    margin: 0;
}
.trip-container {
    /* max-width: 1400px; */
    margin: 32px auto;
    display: grid;
    grid-template-columns: 1fr 2fr 1fr;
    gap: 24px;
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(118, 192, 125, 0.15);
    background: linear-gradient(to bottom, rgba(107, 202, 117, 0.2), rgba(255, 255, 255, 0.05));
    padding: 24px;
}
.trip-container-left {
    display: flex;
    flex-direction: column;
    background-color: #ffffff;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(118, 192, 125, 0.1);
    transition: box-shadow 0.3s ease;
    gap: 16px;
}
.trip-container-left:hover {
    box-shadow: 0 6px 18px rgba(118, 192, 125, 0.15);
}
.trip-container-section {
    display: flex;
    flex-direction: column;
    margin-bottom: 16px;
}
.trip-container-left-item {
    background: linear-gradient(135deg, #e8f7ea, #f0fff2);
    border-left: 5px solid #76c07d;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    color: #1a1a1a;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}
.trip-container-left-item h4 {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0;
    font-size: 1.2rem;
}
.trip-container-left-item i {
    color: #76c07d;
}
.trip-container-left-item-list {
    display: flex;
    flex-direction: column;
    padding: 16px;
    font-size: 0.95rem;
    color: #444;
    gap: 8px;
}
.change-places-form {
    display: flex;
    justify-content: center;
}
.change-button {
    background-color: #76c07d;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    width: 100%;
}
.change-button:hover {
    background-color: #5EBC67;
    transform: scale(1.05);
}
.trip-container-middle-form {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 24px;
}
.trip-container-middle {
    width: 100%;
    max-width: 800px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(118, 192, 125, 0.1);
    transition: box-shadow 0.3s ease;
}
.trip-container-middle:hover {
    box-shadow: 0 6px 18px rgba(118, 192, 125, 0.15);
}
#step-indicator {
    width: 100%;
    text-align: center;
    margin-bottom: 20px;
    background: linear-gradient(135deg, #76c07d, #6ac870);
    color: #ffffff;
    padding: 10px;
    border-radius: 20px;
    font-size: 1rem;
    font-weight: 600;
    box-shadow: 0 2px 6px rgba(59, 106, 64, 0.2);
}
#questions-container {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
    padding: 24px;
    background-color: #ffffff;
    box-shadow: 0 2px 12px rgba(59, 106, 64, 0.15);
    border-radius: 12px;
}
#questions-container .group-title {
    text-align: center;
    margin-bottom: 16px;
}
#questions-container h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #1a1a1a;
    margin: 0;
}
#questions-container p {
    font-size: 1rem;
    color: #444;
    margin: 8px 0 0;
}
#questions-container .input-wrapper {
    width: 100%;
    max-width: 500px;
}
#questions-container label {
    font-size: 1.2rem;
    font-weight: 500;
    color: #1a1a1a;
    display: block;
    margin-bottom: 8px;
}
#questions-container input,
#questions-container select {
    width: 100%;
    padding: 12px;
    border: 1px solid #d6e9da;
    border-radius: 8px;
    font-size: 1rem;
    background-color: #f8fff9;
    transition: border 0.3s ease, box-shadow 0.3s ease;
}
#questions-container input:focus,
#questions-container select:focus {
    outline: none;
    border: 1px solid #76c07d;
    background-color: #ffffff;
    box-shadow: 0 0 5px rgba(118, 192, 125, 0.3);
}
#questions-container input.invalid {
    border: 1px solid #ff4d4d;
    background-color: #fff5f5;
}
#questions-container input[type="checkbox"] {
    width: 20px;
    height: 20px;
}
#questions-container .error-message {
    display: block;
    color: #ff4d4d;
    font-size: 0.85rem;
    margin-top: 4px;
    min-height: 20px;
}
#questions-container input[type="range"] {
    width: 100%;
    margin-top: 10px;
}
#questions-container .range-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}
#questions-container .range-container span {
    font-size: 0.95rem;
    color: #444;
}
.form-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    margin-top: 24px;
    width: 100%;
    max-width: 500px;
}
.form-buttons button {
    background-color: #76c07d;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    min-width: 120px;
}
.form-buttons button:hover {
    background-color: #5EBC67;
    transform: scale(1.05);
}
.form-buttons button:disabled {
    background-color: #a0aec0;
    cursor: not-allowed;
}
.trip-container-right {
    display: flex;
    flex-direction: column;
    background-color: #ffffff;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(118, 192, 125, 0.1);
    transition: box-shadow 0.3s ease;
}
.trip-container-right:hover {
    box-shadow: 0 6px 18px rgba(118, 192, 125, 0.15);
}
.sticky-summary {
    position: sticky;
    top: 20px;
    max-height: 90vh;
    overflow-y: auto;
}
#responses .response-item {
    background: linear-gradient(135deg, #e8f7ea, #f0fff2);
    border-left: 4px solid #76c07d;
    padding: 12px 16px;
    margin-bottom: 12px;
    border-radius: 8px;
    font-size: 0.95rem;
    color: #1a1a1a;
    box-shadow: 0 2px 8px rgba(85, 93, 86, 0.15);
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: transform 0.3s ease;
}
#responses .response-item:hover {
    transform: translateY(-2px);
}
#responses .response-item button {
    background: none;
    border: none;
    color: #76c07d;
    cursor: pointer;
    font-size: 0.9rem;
    font-weight: 600;
    transition: color 0.3s ease;
}
#responses .response-item button:hover {
    color: #5EBC67;
}
@media (max-width: 1024px) {
    .trip-container {
        grid-template-columns: 1fr;
        grid-template-rows: auto auto auto;
    }
    .trip-container-middle {
        min-width: 100%;
    }
}
@media (max-width: 768px) {
    .trip-container {
        margin: 16px;
        padding: 16px;
    }
    .trip-container-left,
    .trip-container-middle,
    .trip-container-right {
        padding: 16px;
    }
    #questions-container label {
        font-size: 1.1rem;
    }
    #questions-container input,
    #questions-container select {
        font-size: 0.9rem;
    }
}
</style>
</head>

<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>