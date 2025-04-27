<style>
   .text-color-active {
        color: #76c07d; /* Active color */
    }
    .text-color-default {
        color: #000000; /* Default color */
    }

    .left-logo-traveLK {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 100;
        width: 200px;
        max-width: 40vw;
        cursor: pointer;
    }

    .right-logo-traveLK {
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 100;
        width: 200px;
        max-width: 40vw;
        cursor: pointer;
    }

    /* Responsive tweaks for smaller screens */
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

.trip-container {
    height: 95vh;
    display: grid;
    grid-template-columns: 1fr  2fr 1fr;
    border-radius: 16px;
    box-shadow: 0 0px 15px rgba(118, 192, 125, 0.15);
    transition: all 0.3s ease-in-out;
}

.trip-container-left {
    display: flex;
    flex-direction: column;
    flex: 1;
    min-width: 280px;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(118, 192, 125, 0.1);
    transition: box-shadow 0.3s ease;
}

.trip-container-left:hover {
    box-shadow: 0 6px 18px rgba(118, 192, 125, 0.15);
}

.trip-container-left-item {
    background: linear-gradient(135deg, #e8f7ea, #f0fff2);
    border-left: 5px solid #5EBC67;
    border-radius: 6px;
    font-size: 15.5px;
    font-weight: 500;
    color: #2c2c2c;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 10px 15px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    transition: background-color 0.3s ease;
}
.trip-container-section{
  display: flex;
  flex-direction: column;
  margin-bottom: 10px;
}
.trip-container-left-item-list{
  display: flex;
  flex-direction: column;
  padding: 20px;
  font-size: 16px;
  gap: 10px;

}

.next-button{
  background-color: #76c07d;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 25px;
  width: 100%;
}

#traveler-form-change-places{
    display: flex;
    justify-content: center;
    background-color: #76c07d;
    color: white;
    border: none;
    border-radius: 25px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 10px;
}

.trip-container-middle {
    display: flex;
    flex-direction: column;
    
    align-items: center;
    gap: 20px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 12px;
    transition: box-shadow 0.3s ease;
    flex: 1;
    position: sticky;
}

.trip-container-middle:hover {
    box-shadow: 0 6px 18px rgba(118, 192, 125, 0.15);
}
#questions-container{
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  padding: 20px;
}
#questions-container label {
    font-size: 28px;
    font-weight: 500;
    color: #2c2c2c;
    display: block;
    margin-bottom: 10px;
}
#questions-container ::placeholder{
  font-size: 20px;
}

#questions-container input,
#questions-container select {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #d6e9da;
    border-radius: 8px;
    font-size: 15px;
    background-color: #f8fff9;
    transition: border 0.3s ease;
    margin-top: 6px;
}

#questions-container input[type="checkbox"] {
  width: 20px;
  height: 20px;
}

#questions-container input:focus,
#questions-container select:focus {
    outline: none;
    border: 1px solid #76c07d;
    background-color: #ffffff;
}

#questions-container input[type="range"] {
    width: 100%;
    margin-top: 10px;
}

#questions-container span {
    display: block;
    margin-top: 8px;
    font-size: 14px;
    color: #5EBC67;
}

.form-buttons {
    display: flex;
    justify-content:space-between;
    gap: 12px;
    margin-top: 20px;
}

.form-buttons button {
    background-color: #76c07d;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-buttons button:hover {
    background-color: #5EBC67;
}

.trip-container-right {
    display: flex;
    flex-direction: column;
    flex: 1;
    min-width: 280px;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    transition: box-shadow 0.3s ease;
}

.trip-container-right:hover {
    box-shadow: 0 6px 18px rgba(118, 192, 125, 0.15);
}

#responses div {
    background-color: #e8f7ea;
    border-left: 4px solid #76c07d;
    padding: 10px 15px;
    margin-bottom: 10px;
    border-radius: 6px;
    font-size: 15px;
    color: #2c2c2c;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}

.tooltip {
    cursor: help;
    font-weight: bold;
    margin-left: 5px;
  }
  .group-title {
    margin-top: 20px;
  }
  .sticky-summary {
    position: sticky;
    top: 10px;
    padding: 10px;
    background: #f5f5f5;
    border-radius: 8px;
    max-height: 90vh;
    overflow-y: auto;
  }
  .response-item {
    margin-bottom: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .response-item button {
    background: none;
    border: none;
    color: #007BFF;
    cursor: pointer;
  }
  .range-container {
    display: flex;
    align-items: center;
    gap: 10px;
  }


#traveler-form {
  display: flex;
  flex-direction: column; 
  justify-content: flex-start;
  width: 100%;
}
.trip-container-create{
    height: 95vh;
    display: grid;
    grid-template-columns: 1fr 3fr;
    border-radius: 16px;
    box-shadow: 0 0px 15px rgba(118, 192, 125, 0.15);
    transition: all 0.3s ease-in-out;
}

    
.trip-container-places{
    display: flex;
    flex-direction: column;
    flex: 1;
    min-width: 280px;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(118, 192, 125, 0.1);
    transition: box-shadow 0.3s ease;
}

.trip-container-budget {
    display: flex;
    flex-direction: column;
    flex: 2;
    min-width: 280px;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(118, 192, 125, 0.1);
    transition: box-shadow 0.3s ease;
}

.trip-container-budget:hover {
    box-shadow: 0 6px 18px rgba(118, 192, 125, 0.15);
}

.trip-container-budget-item-list{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  font-size: 16px;
  gap: 10px;

}
.budget-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 15px;
    color: #2c2c2c;
}

.budget-table th, .budget-table td {
    padding: 10px;
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

.budget-warning {
    margin-top: 20px;
    padding: 10px;
    background-color: #ffe6e6;
    border-left: 4px solid #ff4d4d;
    border-radius: 6px;
    color: #2c2c2c;
    font-size: 15px;
}

.budget-note {
    margin-top: 20px;
    padding: 10px;
    background-color: #e8f7ea;
    border-left: 4px solid #76c07d;
    border-radius: 6px;
    color: #2c2c2c;
    font-size: 15px;
}

.sticky-summary {
    position: sticky;
    top: 20px;
    max-height: 90vh;
    overflow-y: auto;
}

.change-form {
    display: inline-block;
    vertical-align: middle;
    margin-left: 10px;
}

.change-button {
    background-color: #76c07d;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(118, 192, 125, 0.3);
    transition: all 0.3s ease;
}

.change-button:hover {
    background-color: #5EBC67;
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(118, 192, 125, 0.4);
}

.create-trip-form {
    margin-top: 25px;
    text-align: center;
}

.create-trip-button {
    background-color: #76c07d;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 20px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(118, 192, 125, 0.3);
    transition: all 0.3s ease;
    width: 100%;
}

.create-trip-button:hover {
    background-color: #5EBC67;
    transform: scale(1.005);
    box-shadow: 0 4px 10px rgba(118, 192, 125, 0.4);
} 

.trip-container-budget-item-list .form-input {
    width: 100%;
    padding: 8px;
    border: 1px solid #dddddd;
    border-radius: 5px;
    font-family: Poppins, sans-serif;
    font-size: 14px;
    color: #333;
}

.trip-container-budget-item-list .form-input:focus {
    outline: none;
    border-color: #76c07d;
    box-shadow: 0 0 4px rgba(118, 192, 125, 0.5);
}

.date-input-group {
    margin-bottom: 10px;
}

.date-input-group .form-label {
    display: block;
    margin-bottom: 5px;
    font-size: 0.9em;
    color: #333;
}

.edit-budget-form,
.edit-dates-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 100%;
}

.edit-dates-form {
    flex-direction: column;
}

.save-button,
.cancel-button {
    background-color: #76c07d;
    color: white;
    border: none;
    border-radius: 6px;
    padding: 8px 16px;
    font-family: Poppins, sans-serif;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.save-button:hover {
    background-color: #5EBC67;
}

.cancel-button {
    background-color: #a0aec0;
}

.cancel-button:hover {
    background-color: #8b97a8;
}

.toggle-budget,
.toggle-dates {
    margin-left: 10px;
}


.summary-item{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}


</style>
</head>

<?php require (BASE_PATH.'views/partials/user/toast.php');?>

