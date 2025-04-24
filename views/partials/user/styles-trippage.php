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

.trip-container {
    height: 95vh;
    display: grid;
    grid-template-columns: 1fr  1fr 1fr;
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
    /* justify-content: center; */
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
  flex-direction: column; /* vertical layout inside fixed container */
  justify-content: flex-start;
  width: 100%;
}


</style>
</head>

<?php require (BASE_PATH.'views/partials/user/toast.php');?>

