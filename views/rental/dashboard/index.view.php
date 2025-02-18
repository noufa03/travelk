
<?php require base_path("views/partials/rental/styles/main.php"); ?>
<?php require base_path("views/partials/rental/styles/sidecar.php"); ?>
<?php require base_path("views/partials/rental/styles/header-maincontent.php"); ?>
<?php require base_path("views/partials/rental/styles/dashboard.php"); ?>


<?php require base_path("views/partials/rental/styles/seemore.php"); ?>
<?php require base_path("views/partials/rental/styles/notify.php"); ?>

<?php require base_path("views/partials/rental/sidebar_car.php"); ?>




<div class="main--content">
<?php require base_path('views/partials/rental/header.php') ?>
<?php require base_path('views/partials/restaurants/heading.php') ?>

 
 
<div class="card--container1">
                   
                   
                       <!-- header wrapper ends -->
     <div class="card--container" style="color: brown;">
     
     
     <?php if(!isset($detailsID)): ?>
     <div class="card--wrapper--starthere">
                 <div class="starthere--card">
                
                 <p style="font-size: 1rem;color:black;margin:100px">We are thrilled to have you on board. Explore the features and make the most out of your journey with us!</p>
                 <button class="button-6" style="margin-left:100px ;">  <a href='/details_rest?id=<?=$userid?>'>Start here</a>  </button>
                 </div>
                        
     
     
     
     </div>
     
     <?php else: ?>
     
          <div class="card--wrapper--profile">
                 <div class="starthere--profile">
                <div>
             
                 <img src='<?= isset($profile) && !empty($profile) 
                            ? $profile
                            : "/restaurants/default-pics/default-profile.svg" ?>' 
                     alt='Profile Picture'  
                     width="200px" height="200px" 
                     style="border-radius: 50%; display: block; margin: auto;">


                     <br>

                 <p style="font-size: 1rem; color:grey; text-align: center;font-weight:lighter"><?= $name ?></p>
             
                            <p style="text-align: center;">
                              
                                <?php 
                                    if (isset($Averageratings)) {
                                        $roundedRating = round($Averageratings);
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $roundedRating) {
                                                echo '<i class="fa-solid fa-star" style="color: gold;"></i> '; 
                                            } else {
                                              
                                            }
                                        }
                                        echo " (" . $Averageratings . ")";
                                    } else {
                                     for ($i = 1; $i <= 5; $i++) {
                                        echo '<i class="fa-regular fa-star" style="color: gray;"></i> '; }
                                    }
                                ?>
                            </p>

                

                
                </div>

                  
                 <button class="button-6" style="margin-left:0px;height:10px;">  <a href='/details_rest/edit?id=<?=$userid?>'>Edit profile</a>  </button>
                 </div> 
                        
     
     
     
      </div>
     <?php endif;?>
     
     
     
      <a href="#" style="text-decoration: none;">
               
                    <div class="location--card" >
                        
                           <div class="daily--container">
                              <h2>Last Trips</h2> 
                                 <div class="daily--wrapper original">
                                       
                                <?php
                                        function renderDailyCard($date, $iconHtml, $time,$pickuplocation,$dropoff) {
                                            echo "
                                            <div class='daily--card'>
                                                <div class='daily--header'>
                                                  {$iconHtml}
                                                    <div class='daily-amount'>
                                                     
                                                        <span class='daily-title'>" . htmlspecialchars($date) . "</span>
                                                          <span class='daily-des'>" . htmlspecialchars($time) . "</span>
                                                           
                                                    </div>

                                                     
                                                  
                                                   
                                                </div>
                                                     <div class='daily-amount'>
                                                     
                                                        <span class='daily-title'>" . htmlspecialchars($pickuplocation) .' '.'To'.' '.htmlspecialchars($dropoff)."</span>
                                                         
                                                           
                                                    </div>

                                            </div>
                                            ";
                                        }
                                        
                                        $limited_past_bookings = array_slice($past_bookings, 0, 1); // Limit to 3 bookings

                                foreach ($limited_past_bookings as $past_booking) {
                                    $date = $past_booking['pickupdate'];
                                    $time = $past_booking['pickuptime'];
                                    $pickuplocation = $past_booking['pickuplocation'];
                                    $dropoff = $past_booking['dropofflocation'];
                                    $iconHtml = "<img src='./rental/dashboard_photos/car.png' alt='' style='width: 50px; height: 50px;' />";
                                
                                    renderDailyCard($date, $iconHtml, $time, $pickuplocation, $dropoff);
                                }
                                                                        
                                                                    ?>
                                                                    
                                                                                   
                                       </div>
                                       
                                       <!-- daily wrapper -->
                
               
                        <div class="extra">
                        
                        <?php  $remaining_past_bookings = array_slice($past_bookings, 0,3);
                                    
                                   
                                    foreach ($remaining_past_bookings as $past_booking) {
                                        $date = $past_booking['pickupdate'];
                                        $time = $past_booking['pickuptime'];
                                        $pickuplocation = $past_booking['pickuplocation'];
                                        $dropoff = $past_booking['dropofflocation'];
                                        $iconHtml = "<img src='./rental/dashboard_photos/car.png' alt='' style='width: 50px; height: 50px;' />";
                                        
                                        echo "<div class='daily--wrapper '>";
                                        renderDailyCard($date, $iconHtml, $time, $pickuplocation, $dropoff);
                                        echo "<br>";
                                        echo "</div>";
                                    }
                                    ?>
                                                            
                      
                        
                       
                        
                        </div>

                        <!-- daily wrapper 2,extra one -->
                          <input type="checkbox" id="btn">
                        <label for="btn" class="button-6" ></label> 
                      
                            </div>
                            <!-- daily container -->
             </div>
                   <!-- location card2 ends -->
                
  
     



 
     
       
          
          
          
          
               
                  
     </div>
     <!-- card contaainer ends -->





  

    
 



     
     
</div>
<!-- main content ends -->

</body>
</html>
<?php require base_path("views/partials/rental/js/header.php"); ?>
<?php require base_path("views/partials/restaurants/filejs.php"); ?>