     
     
     
     
     <div class="header--wrapper">
         
         <div >
            <button  onclick=toggleSidebar() id="toggle-btn">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="green"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                       </button>
         </div>
                   
       
     
         
     <div class="info">
            
             <div class="notification" id="notification">
 <button class="dropbtn" onclick="toggleDropdown()">
 <a href="/notifications_rest">
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="green">
         <path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
     </svg>
     <span> <?= count($detail_fill_notifications)+count($dailyoffers_expires) ?></span>
 
 </a>
 
 </button>
 <div class="dropdown-content" id="dropdown-content">
     <?php if (!empty($detail_fill_notifications) || !empty($dailyoffers_expires)): ?>
         <a href="/details_rest?id=<?=$userid ?>" style="color: black;">Please fill out your profile</a>
         
            
             <a href="/offers" style="color: black;">Please Remove expired dailyoffers</a>
            
              <?php foreach($dailyoffers_expires as $dailyoffers_expire):?>
             <a style="color: brown;">
            <?= $dailyoffers_expire['offer_title'] ?>
             </a>
             <?php endforeach; ?>
             
             
            
     <?php else: ?>
         <h4 class="no-notifications">No new notifications</h4>
     <?php endif; ?>
     <!-- start -->
     
     
     
     
     <!-- end -->
 </div>
</div>


                      
                                 
           
                 
      
       <div class="header--title">
       
             <span>Hello, <?= $_SESSION["user"]["email"] ?></span>
              </div>
               <?php
               if ($profile==true) {
               
                         $profile=$profile['profile'];
                   echo "<img src='/$profile' alt=''>";
               } else {
                   echo "<img src='/restaurants/default-pics/default-profile.svg' alt=''>";
               }
               ?>


     
     </div>
           
         
          <div class="header--title">
          
                <span>Hello, <?= $_SESSION["user"]["email"] ?></span>
                 </div>
                  <?php
                  if ($profile==true) {
                  
                            $profile=$profile['profile'];
                      echo "<img src='/$profile' alt=''>";
                  } else {
                      echo "<img src='/restaurants/default-pics/default-profile.svg' alt=''>";
                  }
                  ?>


        
        </div>
              
            
            
        </div>
        
