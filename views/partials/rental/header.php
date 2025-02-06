     
     
     
     
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
        <span> <?= count($notifications)+count($confirmed_bookings) ?></span>
    </button>
    </button>
    <div class="dropdown-content">
        <?php if (!empty($notifications) || !empty($confirmed_bookings)): ?>
            <?php if (!empty($notifications)): ?>
                <h1 style="color: brown;">Pending Confirmation</h1>
                <?php foreach ($notifications as $notification): ?>
                    <a href="/bookings?<?= $userid ?>" class="notification-item" style="color: black;" >
                        <?= $notification['customername'] ?> has requested a ride on <?= $notification['pickupdate'] ?>. Please confirm the pickup if you're available.
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($confirmed_bookings)): ?>
                <h1 style="color: brown;">Confirmed Bookings</h1>
                <?php foreach ($confirmed_bookings as $confirmed_booking): ?>
                    <a href="/bookings?<?= $userid ?>" class="notification-item" style="color: black;" >
                        You have confirmed a ride for <?= $confirmed_booking['customername'] ?> on <?= $confirmed_booking['pickupdate'] ?>. Please make a note of it.
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <h4 class="no-confirmed-bookings">No confirmed bookings</h4>
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
                  if (isset($logo)) {
                      echo "<img src='/restaurants/folder$userid/logo/$logo' alt=''>";
                  } else {
                      echo "<img src='/restaurants/default_logo/default_logo.png' alt=''>";
                  }
                  ?>


        
        </div>
              
            
            
        </div>
        