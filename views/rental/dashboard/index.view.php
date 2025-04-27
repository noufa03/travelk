<?php require base_path("views/partials/rental/styles/main.php"); ?>
<?php require base_path("views/partials/rental/styles/dashboard.php"); ?>
<?php require base_path("views/partials/rental/styles/seemore.php"); ?>
<?php require base_path("views/partials/rental/styles/notify.php"); ?>
<?php require base_path("views/partials/rental/sidebar_car.php"); ?>

<?php
function renderDailyCard($date, $iconHtml, $time, $pickuplocation, $dropoff) {
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
            <span class='daily-title' style='margin-bottom:10px'>" . 
                htmlspecialchars($pickuplocation) . " To " . htmlspecialchars($dropoff) . 
            "</span>
        </div>
    </div>
    ";
}
?>



<div style="background: #f0f2f5; min-height: 100vh; font-family: 'Segoe UI', Arial, sans-serif;">

    <?php require base_path('views/partials/rental/header.php') ?>


    <div style="padding: 30px 20px; max-width: 1400px; margin: 0 auto;">
        <?php require base_path('views/partials/restaurants/heading.php') ?>
        <p style="font-size: 18px; color: #444; margin-bottom: 30px; font-weight: 500;">Welcome to the traveLK Dashboard</p>

     
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); grid-template-rows: 200px 200px auto; gap: 20px;">
           
            <div style="grid-column: span 2; grid-row: span 2; background: linear-gradient(135deg, #ffffff, #f8fafc); border-radius: 12px; padding: 30px; box-shadow: 0 6px 16px rgba(0,0,0,0.15); display: flex; flex-direction: column; align-items: center; justify-content: center; transition: transform 0.3s ease;">

                <?php if (!isset($detailsID)): ?>


                    <p style="font-size: 1rem;color:black;margin:100px">We are thrilled to have you on board. Explore the features and make the most out of your journey with us!</p>
                    <button class="button-6" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';" onmouseover="this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                        <a href='/details_rental?id=<?= $userid ?>' style="text-decoration: none; color: #ffffff;">Start here</a>
                    </button>

                <?php else: ?>

                    <img
                        src='<?= $add_details['profile_picture'] ??  "/restaurants/default-pics/default-profile.svg" ?>'
                        alt='Profile Picture'
                        style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin-bottom: 15px; border: 3px solid #e0e0e0;" />
                    <p style="font-size: 18px; color: #333; font-weight: 600; margin-bottom: 10px;"><?= $name['first_name'] . ' ' . $name['last_name'] ?></p>
                    <p style="text-align: center; margin-bottom: 20px;">
                        <?php
                        if (isset($Averageratings)) {
                            $roundedRating = round($Averageratings);
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $roundedRating) {
                                    echo '<i class="fa-solid fa-star" style="color: #f4c430; font-size: 14px;"></i> ';
                                } else {
                                    echo '<i class="fa-regular fa-star" style="color: #ccc; font-size: 14px;"></i> ';
                                }
                            }
                            echo " <span style='color: #555; font-size: 14px;'>(" . $roundedRating . ")</span>";
                        } else {
                            for ($i = 1; $i <= 5; $i++) {
                                echo '<i class="fa-regular fa-star" style="color: #ccc; font-size: 14px;"></i> ';
                            }
                        }
                        ?>
                    </p>
                    <button  style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';" onmouseover="this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                        <a href='/details_rental/edit?id=<?= $userid ?>' style="text-decoration: none; color: #ffffff;"> Edit Profile</a>
                    </button>


                <?php endif; ?>
            </div>

            <div style="height: 100%;">
                <a href="#" style="text-decoration: none; display: block; height: 100%;">
                    <div style="background: linear-gradient(135deg, #ffffff, #f5f7fa); border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <span style="font-size: 16px; color: #555; font-weight: 500; display: block; margin-bottom: 10px;">Total Trips</span>
                            <span style="font-size: 24px; color: #222; font-weight: bold;"><?= $totaltrips ?></span>
                        </div>
                        <i style="background: #28a745; padding: 12px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed">
                            <path d="M320-704 200-824l56-56 120 120-56 56Zm320 0-56-56 120-120 56 56-120 120Zm-200-56v-200h80v200h-80ZM160 0q-17 0-28.5-11.5T120-40v-320l84-240q6-18 21.5-29t34.5-11h440q19 0 34.5 11t21.5 29l84 240v320q0 17-11.5 28.5T800 0h-40q-17 0-28.5-11.5T720-40v-40H240v40q0 17-11.5 28.5T200 0h-40Zm72-440h496l-42-120H274l-42 120Zm68 240q25 0 42.5-17.5T360-260q0-25-17.5-42.5T300-320q-25 0-42.5 17.5T240-260q0 25 17.5 42.5T300-200Zm360 0q25 0 42.5-17.5T720-260q0-25-17.5-42.5T660-320q-25 0-42.5 17.5T600-260q0 25 17.5 42.5T660-200Zm-460 40h560v-200H200v200Zm0 0v-200 200Z"/>
                            </svg>
                         </i>
                    </div>
                </a>
            </div>
            <div style="height: 100%;">
                <a href="#" style="text-decoration: none; display: block; height: 100%;">
                    <div style="background: linear-gradient(135deg, #ffffff, #f5f7fa); border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <span style="font-size: 16px; color: #555; font-weight: 500; display: block; margin-bottom: 10px;">Ratings</span>
                            <span style="font-size: 24px; color: #222; font-weight: bold;"><?=  $ratings ?></span>
                        </div>
                        <i style="background: #007bff; padding: 12px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed">
                            <path d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143ZM233-120l65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Zm247-350Z"/>
                            </svg>
                         </i>
                    </div>
                </a>
            </div>

  
            <div style="height: 100%;">
                <a href="/myreviews_car?id=<?= $userid ?>" style="text-decoration: none; display: block; height: 100%;">
                    <div style="background: linear-gradient(135deg, #ffffff, #f5f7fa); border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <span style="font-size: 16px; color: #555; font-weight: 500; display: block; margin-bottom: 10px;">Total Reviews</span>
                            <span style="font-size: 24px; color: #222; font-weight: bold;"><?= $totalreviews ?? '0' ?></span>
                        </div>
                        <i style="background: #dc3545; padding: 12px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#fff">
                                <path d="M172-120v-60h616v60H172Zm0-170v-60h616v60H172Zm0-170v-60h616v60H172Zm708-170H80v-280h800v280Zm-80-60v-160H160v160h640Zm-640 0h640-640Z" />
                            </svg>
                        </i>
                    </div>
                </a>
            </div>

         
            <div style="height: 100%;">
                <div style="text-decoration: none; display: block; height: 100%;">
                    <div style="background: linear-gradient(135deg, #ffffff, #f5f7fa); border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <span style="font-size: 16px; color: #555; font-weight: 500; display: block; margin-bottom: 10px;">Acceptance Rate</span>
                            <span style="font-size: 24px; color: #222; font-weight: bold;"><?= htmlspecialchars(round($acceptanceRate, 2) . '%')?></span>
                        </div>
                        <i style="background: #ffc107; padding: 12px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#fff">
                                <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-60q142 0 241-99t99-241q0-142-99-241t-241-99q-142 0-241 99t-99 241q0 142 99 241t241 99Zm0-140q-54 0-92-38t-38-92q0-54 38-92t92-38q54 0 92 38t38 92q0 54-38 92t-92 38Zm0-60q29 0 49.5-20.5T550-480q0-29-20.5-49.5T480-550q-29 0-49.5 20.5T410-480q0 29 20.5 49.5T480-410Zm0-70Zm0-330q-13 0-21.5 8.5T450-710v230q0 13 8.5 21.5T480-450q13 0 21.5-8.5T510-480v-230q0-13-8.5-21.5T480-740Z" />
                            </svg>
                        </i>
                    </div>
                    </a>
                </div>
            </div>

         
            <div style="grid-column: span 2;">
           
                <div style="background: #ffffff; border-radius: 16px; box-shadow: 0 6px 20px rgba(0,0,0,0.08); padding: 30px; background: #f8fafc;">
                    <div>
                        <div>
                            <h2 style="color: #1a1a1a; font-size: 24px; font-weight: 600; margin-bottom: 24px;">Past Trips</h2>


                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                <?php

                                foreach (array_slice($past_bookings, 0, 3) as $past_booking) {
                                  
                                        $date =  $past_booking["pickupdate"];;
                                        $time = $past_booking["pickuptime"];
                                        $pickuplocation =$past_booking["pickuplocation"];
                                        $dropoff = $past_booking["dropofflocation"];
                                        $iconHtml = "<img src='./rental/dashboard_photos/car.png' alt='' style='width: 50px; height: 50px;' />";
                                        renderDailyCard( $date,$iconHtml, $time,$pickuplocation,$dropoff);
                                    
                                }
                                ?>
                            </div>
                            <?php if (count($past_bookings) > 2): ?>
                                <a href="/bookings?id=<?= $userid ?>" style="text-decoration: none; display: block; text-align: right; margin-top: 1rem">
                                    <div>
                                        <button style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 20px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';" onmouseover="this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#ffffff">
                                                <path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z" />
                                            </svg>
                                            <span style="margin-left: 8px;">View More</span>
                                        </button>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>
            </div>
            <div style="grid-column: span 2;">

                <div style="background: #ffffff; border-radius: 16px; box-shadow: 0 6px 20px rgba(0,0,0,0.08); padding: 30px; background: #f8fafc;">
                    <div>
                        <div>
                            <h2 style="color: #1a1a1a; font-size: 24px; font-weight: 600; margin-bottom: 24px;">Upcoming Rides</h2>


                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                <?php 
                                foreach (array_slice($upcomingrides, 0, 3) as $upcomingride) {
                                  
                                        $date =  $upcomingride["pickupdate"];;
                                        $time = $upcomingride["pickuptime"];
                                        $pickuplocation =$upcomingride["pickuplocation"];
                                        $dropoff = $upcomingride["dropofflocation"];
                                        $iconHtml = "<img src='./rental/dashboard_photos/car.png' alt='' style='width: 50px; height: 50px;' />";
                                        renderDailyCard( $date,$iconHtml, $time,$pickuplocation,$dropoff);
                                    
                                }
                                ?>


                                <?php if (count($upcomingrides) > 2): ?>
                                    <a href="/bookings?id=<?= $userid ?>" style="text-decoration: none; display: block; text-align: right; margin-top: 1rem">

                                        <div>

                                            <button style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 20px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';" onmouseover="this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#ffffff">
                                                    <path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z" />
                                                </svg>
                                                <span style="margin-left: 8px;">View More</span>
                                            </button>

                                        </div>
                                    </a>
                                <?php endif; ?>

                            </div>

                        </div>

                    </div>
                </div>

            </div>



        </div>

<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path("views/partials/restaurants/filejs.php"); ?>