
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
                   
                    
                                 
                                      <div class="welcome--card">
                                            <div class="welcome--header1">
                                                <div class="welcome">
                                                        <div class="title" style="color: black; font-weight:bolder;padding:2rem;">Welcome <?= $name['first_name'] ?> <?=  $name['last_name'] .'!' ?>
                                                            <div class="welcome--value">
                                                            <div style="padding:2rem;display:flex;flex-direction:column;justify-content:space-around">
                                                            <p style="font-size: 1rem;color:brown">We are thrilled to have you on board. Explore the features and make the most out of your journey with us!</p>
                                                            <button class="button-6">Start here </button>
                                                            </div>
                                                            <div>
                                                            
                                                                                                                        <img   src="rental/dashboard_photos/car1.jpg" height="300px" width="300px">
                                                            </div>
            

                                                            </div>

                                                        </div>
                                                
                                                </div>
                                            </div>
                                      </div>
                                      
                               
                                  
                                  
                                  
                        <div class="payment--card1">
                            <div class="card--header1">
                                <div class="amount">
                                    
                                   <div class="profile-card">
                                  <img src="rental/dashboard_photos/driver.jpg" alt="Profile Picture">
                                                  <h2><?= $name['first_name'].' '.$name['last_name'] ?></h2>
                                                  <p><?= $_SESSION['user']['email'] ?></p>
                                                
                                                 <p>Total Trips <?= $totaltrips ?>   ,   Ratings<?= $ratings ?></p>

                                               
                                                                        <a href="/details_rental/edit">
                                                                           <button class="button-6"> Edit Profile</button>
                                                                        </a>
                                               
                                          </div>
                            </div>
                        </div>

                    
                  



</div>


<div class="card--container2">

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
<!-- card cotainer 2 ends -->

  

    
 



     
     
</div>
<!-- main content ends -->

</body>
</html>
<?php require base_path("views/partials/rental/js/header.php"); ?>
<?php require base_path("views/partials/restaurants/filejs.php"); ?>