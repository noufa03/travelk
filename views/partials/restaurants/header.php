     
     
     
     
     <div class="header--wrapper">
         
         <div >
            <button  onclick=toggleSidebar() id="toggle-btn">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="green"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                       </button>
         </div>
                   
       
     
         
     <div class="info">
            
             <div class="notification" id="notification">
 <button class="dropbtn" onclick="toggleDropdown()">
 <a href="/notifications_rest?id=<?= $userid ?>">
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="green">
         <path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
     </svg>
     <span> <?= count($notifications) ?></span>
 </a>

 </button>
 <div class="dropdown-content" id="dropdown-content">
 
 <?php if(!empty($notifications)) :?>
 
<ul style="list-style: none; padding: 0; margin: 0; max-width: 600px; background: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); font-family: Arial, sans-serif;">
  <?php foreach($notifications as $notification): ?>
    <li style="padding: 15px 20px; border-bottom: 1px solid #eee; transition: background-color 0.3s;">
      <?= htmlspecialchars($notification['message']) ?>
    </li>
  <?php endforeach; ?>
</ul>

 
 </ul>
  <?php else: ?>  
         <h4 class="no-notifications">No new notifications</h4>
    
     
   <?php endif; ?>  
     
     
    
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
           
         
     </div>
        
