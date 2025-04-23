<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <style>
    *{
    padding: 0px;
    margin: 0px;
    
    
    }
    body{
    font-family: sans-serif;
    }
    
    /* .notifications a span{
    background-color: #f00;
    padding: 7px;
    border-radius: 50%;
    color: #fff;
    vertical-align: top;
    margin-left: -25px;
    } */
    
 .notification--content{
/* background-color:var(--accent-clr); */
padding: 2rem;
border-radius: 10px;
display: grid;
grid-template-columns: 1fr 1fr;
}
    
    .notification--card{
/* background-color:#F5EFE6; */
border: radius 10px; ;
padding:1.2rem ;
width: 290px;
height: 150px;
display: flex;
flex-direction: column;
justify-content: space-between;
transition: all 0.5s ease-in-out;
border-radius: 10px;
box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
}

.notification--card:hover{
transform: translateY(-5px);

}


/* notifications */




.notification {
    position: relative;
    display: inline-block;
}

.notification a {
    text-decoration: none;
    color: inherit;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
}

.notification svg {
    transition: transform 0.2s ease-in-out;
}

.notification svg:hover {
    transform: scale(1.2);
}

.notification span {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: red;
    color: white;
    font-size: 12px;
    font-weight: bold;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  
    /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); */
}

 .dropbtn {
        /* background-color: #4CAF50; */
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .dropbtn svg {
        vertical-align: middle;
    }

    .dropbtn:hover {
        background-color: #45a049;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 300px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 8px;
        margin-top: 10px;
        padding: 10px;
        
    }

    .notification:hover .dropdown-content {
        display: block;
    }

    .dropdown-content h1 {
        font-size: 18px;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .notification-item {
        /* color: black; */
        display: block;
        padding: 10px;
        text-decoration: none;
        margin-bottom: 8px;
        border-radius: 5px;
        transition: background-color 0.5s ease;
    }

    .notification-item:hover {
        background-color: #f1f1f1;
    }

    .no-confirmed-bookings, .no-notifications {
        color: red;
        font-weight: bold;
        text-align: center;
    }

    .no-confirmed-bookings {
        font-size: 16px;
    }

    .no-notifications {
        font-size: 16px;
    }
    .show {
    display: block;
}


    </style>
</head>

