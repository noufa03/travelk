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
    display: flex;
    flex-wrap: wrap;
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
/* .trip-container-middle{
  flex: 1;
}

.trip-container-right{
  flex: 1;
} */


.trip-container-middle {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 20px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(118, 192, 125, 0.1);
    transition: box-shadow 0.3s ease;
    flex: 2;
    min-width: 320px;
}

.trip-container-middle:hover {
    box-shadow: 0 6px 18px rgba(118, 192, 125, 0.15);
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
    font-size: 30px;
    background-color: #f8fff9;
    transition: border 0.3s ease;
    margin-top: 6px;
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

#resetBtn {
    background-color: #f8d7da;
    color: #8a1c1c;
}

#resetBtn:hover {
    background-color: #f3b7bb;
}

.trip-container-right {
    display: flex;
    flex-direction: column;
    flex: 1;
    min-width: 280px;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(118, 192, 125, 0.1);
    transition: box-shadow 0.3s ease;
    overflow-y: auto;
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
/* .questions-container{
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.question-box {
    background-color: #f8fdf8;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #d1ecd4;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    margin-bottom: 10px;
}

.response-box {
    background-color: #f1f8f1;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #cbe6d0;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    font-size: 15px;
    color: #333;
    height: 100%;
}

 */


/* Container Styling */
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
}




.trip-container-right {
    flex: 2;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(118, 192, 125, 0.08);
    min-width: 300px;
}

#traveler-form {
    display: flex;
    flex-direction: row;
    gap: 20px;
}

.trip-container-right-right,
.trip-container-right-left {
    display: flex;
    flex-direction: column;
    gap: 20px;
    flex: 1;
}

.question-box {
    background-color: #f8fdf8;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #d1ecd4;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    margin-bottom: 10px;
}

.response-box {
    background-color: #f1f8f1;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #cbe6d0;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    font-size: 15px;
    color: #333;
    height: 100%;
}


.button-nav {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    margin-top: 20px;
}

.button-nav button {
    background-color: #76c07d;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.button-nav button:hover {
    background-color: #5EBC67;
}

button[disabled] {
    opacity: 0.6;
    cursor: not-allowed;
}

 */

</style>
</head>

<?php require (BASE_PATH.'views/partials/user/toast.php');?>

