<!DOCTYPE html>
<html lang="en">

<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        /* Main Content */
        .content {
            margin-left: 250px;
            padding: 30px;
            width: calc(100% - 280px);
            background-color: #ffffff;
            min-height: 100vh;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .button {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            text-decoration: none;
            display: flex;           /* Added */
            align-items: center;     /* Added */
            justify-content: center; /* Added for horizontal centering */
        }

        .update-button {
            background-color: #007BFF;
            display: flex;           /* Added */
            align-items: center;     /* Added */
            justify-content: center; /* Added */
        }

        .delete-button {
            background-color: #FF5733;
        }

        .view-button {
            background-color: #28a745;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
            max-height: 70vh;
            overflow-y: auto;
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }

        .btn-primary {
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            margin-top: 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Popup Background */
        .popup-background {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        /* Popup Container */
        .popup {
            background: white;
            width: 50%;
            max-width: 600px;
            padding: 20px;
            margin: 5% auto;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
            position: relative;
            max-height: 80vh; /* Set maximum height */
            overflow-y: auto; /* Allow vertical scrolling */
        }

        /* Close Button */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
            color: #333;
        }

        /* Close Button Hover Effect */
        .close-btn:hover {
            color: red;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input, textarea {
            padding: 10px;
            margin: 10px 0 20px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 12px;
            font-size: 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }
    </style>

<?php include('../Http/controllers/areaadmin/sidebar.php'); ?>