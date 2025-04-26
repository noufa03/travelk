<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/script.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles-userpage.php');?>
  <?php require (BASE_PATH.'views/partials/user/sidebar_trav.php'); ?>
  
<div class='profile-page-body'>
    <?php require (BASE_PATH.'views/partials/user/nav-userprofile.php');?>

 
<div style="display: flex;flex-direction:column">

 <main >
    
    <section class="user-statistics">
        <div class="stats-grid" >
            <div class="stat-card" >
                 <div style="display: flex;justify-content:space-between">
                    <h3>Total Trips Taken</h3>
                     <i class='icon' style='background-color:orange;'><svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="black"><path d="M160-80v-240h120v240H160Zm200 0v-476q-50 17-65 62.5T280-400h-80q0-128 75-204t205-76q100 0 150-49.5T680-880h80q0 88-37.5 157.5T600-624v544h-80v-240h-80v240h-80Zm120-640q-33 0-56.5-23.5T400-800q0-33 23.5-56.5T480-880q33 0 56.5 23.5T560-800q0 33-23.5 56.5T480-720Z"/></svg></i>

                </div>

                 <p><?php echo count($trips) ?></p>

              
            </div>
            <div class="stat-card">
             <div style="display: flex;justify-content:space-between">
                     <h3>Places Visited</h3>
                     <i class='icon' style='background-color:orange;'><svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="black"><path d="M480-360q56 0 101-27.5t71-72.5q-35-29-79-44.5T480-520q-49 0-93 15.5T308-460q26 45 71 72.5T480-360Zm0-200q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0 374q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg></i>

                </div>
               
                
                <p>10</p>
            </div>
            <div class="stat-card">
              <div style="display: flex;justify-content:space-between">
                      <h3>Wishlist</h3>
                     <i class='icon' style='background-color:black;'><svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z"/></svg></i>

                </div>
               
                <p>8</p>
            </div>
            <div class="stat-card">
                 <div style="display: flex;justify-content:space-between">
                       <h3>Travel Style</h3>
                     <i class='icon' style='background-color:black;'><svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="m280-40 123-622q6-29 27-43.5t44-14.5q23 0 42.5 10t31.5 30l40 64q18 29 46.5 52.5T700-529v-71h60v560h-60v-406q-48-11-89-35t-71-59l-24 120 84 80v300h-80v-240l-84-80-72 320h-84Zm17-395-85-16q-16-3-25-16.5t-6-30.5l30-157q6-32 34-50.5t60-12.5l46 9-54 274Zm243-305q-33 0-56.5-23.5T460-820q0-33 23.5-56.5T540-900q33 0 56.5 23.5T620-820q0 33-23.5 56.5T540-740Z"/></svg></i>

                </div>
               
                <p>Adventure</p>
            </div>
            <div class="stat-card">
            <div style="display: flex;justify-content:space-between">
                        <h3>Last Trip Date</h3>
                     <i class='icon' style='background-color:black;'><svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v200h-80v-40H200v400h280v80H200Zm0-560h560v-80H200v80Zm0 0v-80 80ZM560-80v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8 9 12.5 20t4.5 22q0 11-4 22.5T903-300L683-80H560Zm300-263-37-37 37 37ZM620-140h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z"/></svg></i>

                </div>
               
                <p>Dec 15, 2024</p>
            </div>
        </div>
    </section>
    
    </main>
    
    <div style="display: flex;">
       <main class="main-profile">
    
     <section class="profile-header">
        <div class="profile-info" >
            <?php if ($user['profile']): ?>
                <img src="<?php echo $user['profile']; ?>" alt="Profile">
            <?php else: ?>
                <img src="assets/icons/face.png" alt="Profile Icon">
            <?php endif; ?>
            <div class="profile-details">
                <h1 class="username"><?php echo htmlspecialchars($user['user_name']); ?></h1>
                <!-- <p class="email"><?php echo htmlspecialchars($userEmail); ?></p> -->
            </div>
        </div>
        <button class="edit-profile-btn start-planning-btn">Edit Profile</button>
    </section>
    
    

    </main>
    
      <main class="main-profile">
    
     <section class="profile-header">
        <div class="profile-info" >
            <h3 >My Reviews</h3>
            <div class="profile-details">
        <?php 
                        $count = 0; 
                        foreach ($reviews as $review) {
                            if ($count >= 2) break;
                            ?>
                            <div class="review-card">
                                <div style="display: flex; justify-content: space-between;">
                                    <p><?php echo htmlspecialchars($review['review']); ?></p>
                        
                                    <i class='icon' style='background-color: black;'>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed">
                                            <path d="M240-400h122l200-200q9-9 13.5-20.5T580-643q0-11-5-21.5T562-684l-36-38q-9-9-20-13.5t-23-4.5q-11 0-22.5 4.5T440-722L240-522v122Zm280-243-37-37 37 37ZM300-460v-38l101-101 20 18 18 20-101 101h-38Zm121-121 18 20-38-38 20 18Zm26 181h273v-80H527l-80 80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z"/>
                                        </svg>
                                    </i>
                                </div>
                            </div>
                            <?php 
                              $count++;
                          
                        } 
                        
                           ?>
                             <?php  if ($count > 2): ?>
                                        ?>
                                        <a href="/review?id=<?= $userID ?>" style="text-decoration: none; color: #007BFF; font-weight: bold;">
                                            View All Reviews →
                                        </a>
                             <?php else: ?>          
                               
                                            <?php foreach ($reviews as $review): ?>
                                            <?php if(!empty($review['reply'])): ?>
                                           <a href="/review?id=<?= $userID ?>" style="text-decoration: none; color: #007BFF; font-weight: bold;">
                                                    View reply →
                                                </a>
                                            
                                            <?php endif; ?>
                                            
                                          <?php endforeach; ?>
                                          
                            <?php endif ;?>
                                

               
            </div>
        </div>
       
        <!-- <button class="edit-profile-btn start-planning-btn">Delete</button> -->
    </section>
    
    </div>

    
    

    </main>
    
    
    
    
   
    

</div>
 
    
</div>   

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>