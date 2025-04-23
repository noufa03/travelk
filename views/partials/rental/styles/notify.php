<style>


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
    /* Uncomment below if needed */
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
        position:inherit;
        background-color:var(--base-clr);
        min-width: 300px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 8px;
        margin-top: 200px;
        padding: 10px;
    }

.dropdown-content .data{
display: flex;
flex-direction: row;
justify-content: space-between;
color: black;

}






.dropdown-content .data button {
  align-items: center;
  background-color: #FFFFFF;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: .25rem;
  box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
  box-sizing: border-box;
  color: rgba(0, 0, 0, 0.85);
  cursor: pointer;
  display: inline-flex;
  font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 16px;
  font-weight: 600;
  justify-content: center;
  line-height: 1.25;
  margin: 0;
  min-height: 3rem;
  padding: calc(.875rem - 1px) calc(1.5rem - 1px);
  position: relative;
  text-decoration: none;
  transition: all 250ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  width: auto;
}

.dropdown-content .data button:hover,
.dropdown-content .data button:focus {
  border-color: rgba(0, 0, 0, 0.15);
  box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
  color: rgba(0, 0, 0, 0.65);
}

.dropdown-content .data button:hover {
  transform: translateY(-1px);
}

.dropdown-content .data button:active {
  background-color: #F0F0F1;
  border-color: rgba(0, 0, 0, 0.15);
  box-shadow: rgba(0, 0, 0, 0.06) 0 2px 4px;
  color: rgba(0, 0, 0, 0.65);
  transform: translateY(0);
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
        font-size: smaller;
        text-decoration: none;
        margin-bottom: 8px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
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
    
  
</style>