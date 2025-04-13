     
     
     
     
     <div class="header--wrapper">
         
            <div >
               <button  onclick=toggleSidebar() id="toggle-btn">
                       
                       <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="green"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                          </button>
            </div>
                      
          
        
            
        <div class="info">
           <div class="notification" id="notification">
           
    <button class="dropbtn">
        <a href="/bookings?<?= $userid ?>" >
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="green">
                <path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
            </svg>
            <span> <?= count($notifications)+count($confirmed_bookings)+$count_add_details ?></span>
        </a>
    </button>

    <div class="dropdown-content">
    <div class="data">
    <h1>Notifications</h1>
    <button class="close-all" >
                Close All
            </button>
            </div>
        <?php if (!empty($notifications) || !empty($confirmed_bookings) || !empty($add_details)): ?>
            
            <?php if (!empty($notifications)): ?>
                <?php foreach ($notifications as $notification): ?>
                    <a href="/bookings?<?= $userid ?>" class="notification-item" style="color: black;">
                        <img src='./rental/dashboard_photos/car.png' alt='' style='width: 24px; height: 24px;' />
                        <?= $notification['customername'] ?> has requested a ride on <?= $notification['pickupdate'] ?>. Please confirm the pickup if you're available.
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($confirmed_bookings)): ?>
                <?php foreach ($confirmed_bookings as $confirmed_booking): ?>
                    <a href="/bookings?<?= $userid ?>" class="notification-item" style="color: black;">
                        <img src='./rental/dashboard_photos/car.png' alt='' style='width: 24px; height: 24px;' />
                        You have confirmed a ride for <?= $confirmed_booking['customername'] ?> on <?= $confirmed_booking['pickupdate'] ?>. Please make a note of it.
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if(empty($add_details)): ?>
                <a href="/details_rental" class="notification-item" style="color: black;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="blue">
                        <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/>
                    </svg>
                    Hi! Please fill out the details form (note: these are the details a customer can see)
                </a>
            <?php endif; ?>

            
            

        <?php else: ?>
            <h4 class="no-notifications">No new notifications</h4>
        <?php endif; ?>
    </div>
</div>

                                 
                                    
              
                    
         
          <div class="header--title">
                <span>Hello, <?= $_SESSION["user"]["email"] ?></span>
          
                
                 </div>
                  <?php
                  $profile=$profile['profile_picture'];
                  if (isset($profile)) {
                      echo "<img src='$profile' alt=''>";
                  } else {
                      echo "<img src='rental/dashboard_photos/driver.jpg' alt=''>";
                  }
                  ?>


        
        </div>
   
              
              
            
            
        </div>
        