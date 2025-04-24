     <div class="header--wrapper">

         <div>
             <button onclick=toggleSidebar() id="toggle-btn">

                 <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="green">
                     <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                 </svg>
             </button>
         </div>




         <div class="info">
             <div class="notification" id="notification">

                 <button class="dropbtn">
                     <a href="/bookings?<?= $userid ?>">
                         <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="green">
                             <path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
                         </svg>
                         <span> <?= count($notifications) ?></span>
                     </a>
                 </button>

                 <div class="dropdown-content">
                     <div class="data">
                         <h1>Notifications</h1>

                     </div>
                     <?php if (!empty($notifications)): ?>
                         <?php foreach ($notifications as $notification): ?>

                             <div style="display: flex;justify-content:space-between">
                                 <div style="display: flex;gap:10px">
                                     <img src='./rental/dashboard_photos/car.png' alt='' style='width: 24px; height: 24px;' />
                                     <?= $notification['message'] ?>

                                 </div>

                                 <a href="/notifications_rental?id=<?= $notification['id'] ?>"
                                     style="font-size: smaller; background-color: #f0f0f0; padding: 5px 10px; border-radius: 5px; text-decoration: none; color: #333; border: 1px solid #ccc; transition: background-color 0.3s;"
                                     onmouseover="this.style.backgroundColor='#ddd';"
                                     onmouseout="this.style.backgroundColor='#f0f0f0';">
                                     Mark as read
                                 </a>


                             </div>
                             <br>
                         <?php endforeach; ?>
                         
                     <?php else: ?>
                         <h4 class="no-notifications">No new notifications</h4>
                     <?php endif; ?>

                    
                 </div>
             </div>
             <div class="header--title">
                 <span>Hello, <?= $_SESSION["user"]["email"] ?></span>


             </div>
             <?php

                if (isset($profile)) {
                    echo "<img src='$profile' alt=''>";
                } else {
                    echo "<img src='rental/dashboard_photos/driver.jpg' alt=''>";
                }
                ?>



         </div>





     </div>