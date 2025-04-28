<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8fafc;
    color: #1a1a1a;
    padding: 0;
    margin: 0;
}
.trip-container-create {
    /* max-width: 1400px; */
    margin: 32px auto;
    display: grid;
    grid-template-columns: 1fr 3fr;
    gap: 24px;
    border-radius: 16px;
    box-shadow: 0 4px 15px rgba(118, 192, 125, 0.15);
    background: linear-gradient(to bottom, rgba(107, 202, 117, 0.2), rgba(255, 255, 255, 0.05));
    padding: 24px;
}
.trip-container-places {
    display: flex;
    flex-direction: column;
    background-color: #ffffff;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(118, 192, 125, 0.1);
    transition: box-shadow 0.3s ease;
}
.trip-container-places:hover {
    box-shadow: 0 6px 18px rgba(118, 192, 125, 0.15);
}
.trip-container-section {
    display: flex;
    flex-direction: column;
    margin-bottom: 24px;
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
.next-button {
    background-color: #76c07d;
    color: #ffffff;
    border: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    width: 100%;
}
.next-button:hover {
    background-color: #5EBC67;
    transform: scale(1.05);
}
.trip-container-budget {
    display: flex;
    flex-direction: column;
    background-color: #ffffff;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(118, 192, 125, 0.1);
    transition: box-shadow 0.3s ease;
}
.trip-container-budget:hover {
    box-shadow: 0 6px 18px rgba(118, 192, 125, 0.15);
}
.sticky-summary {
    position: sticky;
    top: 20px;
    max-height: 80vh;
    overflow-y: auto;
    padding: 16px;
    border-radius: 8px;
}
.trip-container-budget-item-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
    padding: 16px;
    font-size: 1rem;
    color: #444;
}
.summary-item {
    display: flex;
    flex-direction: column;
    gap: 8px;
    background-color: #f8fff9;
    padding: 12px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}
.summary-item:hover {
    transform: translateY(-2px);
}
.summary-item span {
    font-size: 0.95rem;
    color: #1a1a1a;
}
.edit-button {
    background: none;
    border: none;
    color: #76c07d;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: color 0.3s ease;
}
.edit-button:hover {
    color: #5EBC67;
}
.edit-budget-form,
.edit-dates-form {
    display: flex;
    flex-direction: column;
    gap: 12px;
    width: 100%;
}
.date-input-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.form-label {
    font-size: 0.9rem;
    font-weight: 600;
    color: #1a1a1a;
}
.form-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #d6e9da;
    border-radius: 6px;
    font-size: 0.95rem;
    background-color: #f8fff9;
    transition: border 0.3s ease, box-shadow 0.3s ease;
}
.form-input:focus {
    outline: none;
    border: 1px solid #76c07d;
    box-shadow: 0 0 5px rgba(118, 192, 125, 0.3);
}
.save-button,
.cancel-button {
    background-color: #76c07d;
    color: #ffffff;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}
.save-button:hover {
    background-color: #5EBC67;
    transform: scale(1.05);
}
.cancel-button {
    background-color: #a0aec0;
}
.cancel-button:hover {
    background-color: #8b97a8;
    transform: scale(1.05);
}
.budget-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 24px;
    font-size: 0.95rem;
    color: #1a1a1a;
}
.budget-table th,
.budget-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #d6e9da;
}
.budget-table th {
    background: linear-gradient(135deg, #e8f7ea, #f0fff2);
    font-weight: 600;
}
.budget-table tfoot {
    background-color: #e8f7ea;
    font-weight: 600;
}
.budget-note {
    margin-top: 16px;
    padding: 12px;
    background-color: #e8f7ea;
    border-left: 4px solid #76c07d;
    border-radius: 6px;
    color: #1a1a1a;
    font-size: 0.9rem;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}
.budget-warning {
    margin-top: 16px;
    padding: 12px;
    background-color: #ffe6e6;
    border-left: 4px solid #ff4d4d;
    border-radius: 6px;
    color: #1a1a1a;
    font-size: 0.9rem;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}
.create-trip-form {
    margin-top: 24px;
    text-align: center;
}
.create-trip-button {
    background-color: #76c07d;
    color: #ffffff;
    border: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    width: 100%;
}
.create-trip-button:hover {
    background-color: #5EBC67;
    transform: scale(1.05);
}
.right-logo-traveLK {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 100;
    width: 200px;
    max-width: 40vw;
    cursor: pointer;
}
@media (max-width: 1024px) {
    .trip-container-create {
        grid-template-columns: 1fr;
        grid-template-rows: auto auto;
    }
    .trip-container-places,
    .trip-container-budget {
        max-width: 100%;
    }
}
@media (max-width: 768px) {
    .trip-container-create {
        margin: 16px;
        padding: 16px;
    }
    .trip-container-places,
    .trip-container-budget {
        padding: 16px;
    }
    .trip-container-left-item h4 {
        font-size: 1.1rem;
    }
    .budget-table th,
    .budget-table td {
        font-size: 0.85rem;
        padding: 8px;
    }
    .right-logo-traveLK {
        width: 120px;
        top: 10px;
    }
}
@media (max-width: 480px) {
    .right-logo-traveLK {
        width: 100px;
        top: 8px;
    }
    .budget-table th,
    .budget-table td {
        font-size: 0.8rem;
        padding: 6px;
    }
}
</style>
</head>

<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>