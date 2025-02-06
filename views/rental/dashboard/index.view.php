
<?php require base_path("views/partials/rental/styles/dashboard.php"); ?>
<?php require base_path("views/partials/rental/sidebar_car.php"); ?>



 
<?php function renderCard($title, $value, $link, $iconSvg, $bgColor = "gray")
{
    echo "
    <a href='{$link}'>
        <div class='payment--card'>
            <div class='card--header'>
                <div class='amount'>
                    <span class='title'>{$title}</span>
                    <span class='amount--value'>{$value}</span>
                </div>
                <i class='icon' style='background-color:{$bgColor};'>{$iconSvg}</i>
            </div>
        </div>
    </a>";
} ?>

<div class="main--content">
<?php require base_path('views/partials/rental/header.php') ?>
<?php require base_path('views/partials/restaurants/heading.php') ?>

 
 
<div class="card--container1">
                   
                    
                                  <a>
                                      <div class="payment--card1">
                                            <div class="card--header">
                                                <div class="amount">
                                                        <div class="title" style="color: black; font-weight:bolder">Welcome <?= $name['first_name'] ?> <?=  $name['last_name'] .'!' ?>
                                                            <div class="amount--value">
                                                            <p style="font-size: 1rem;color:brown">We are thrilled to have you on board. Explore the features and make the most out of your journey with us!</p>

                                                            </div>
                                                            <!-- <img  style="position:inherit;top:100px;margin-left:1000px" src="rental/dashboard_photos/driver.png" height="100px" width="100px"> -->
                                                        </div>
                                                
                                                </div>
                                            </div>
                                      </div>
                                      
                                  </a>
                    
                  



</div>
    <!-- header wrapper ends -->
     <div class="card--container" style="color: brown;">
          <h3 class="main--title"> Today's Data</h3>
               <div class="card--wrapper">
   
                    <?php $iconSvg =
'<svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="M760-320q-72 0-127-45t-69-115H445l-48-80h167q5-22 13.5-42t22.5-38H348l-48-80h342l-44-120H440v-80h158q26 0 46 14.5t29 38.5l54 147h33q83 0 141.5 58.5T960-520q0 83-58.5 141.5T760-320Zm0-80q50 0 85-35t35-85q0-50-35-85t-85-35h-3l39 107-76 27-38-105q-20 17-31 41t-11 50q0 50 35 85t85 35ZM280-40q-50 0-85-35t-35-85H0v-80h191q15-15 38-27.5t51-12.5q25 0 48 10t41 30h111v-80H0v-80h80v-120H0v-80h280l120 200h80q33 0 56.5 23.5T560-320v80q0 33-23.5 56.5T480-160h-80q0 50-35 85t-85 35ZM160-400h147l-72-120h-75v120Zm120 280q17 0 28.5-11.5T320-160q0-17-11.5-28.5T280-200q-17 0-28.5 11.5T240-160q0 17 11.5 28.5T280-120Zm-40-160Z"/></svg>' ?>
                    <?php $ratingIconSvg =
                        '<svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143ZM233-120l65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Zm247-350Z"/></svg>'; ?>
                    <?php $offerIconSvg =
                        '<svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="m80-80 200-560 360 360L80-80Zm132-132 282-100-182-182-100 282Zm370-246-42-42 224-224q32-32 77-32t77 32l24 24-42 42-24-24q-14-14-35-14t-35 14L582-458ZM422-618l-42-42 24-24q14-14 14-34t-14-34l-26-26 42-42 26 26q32 32 32 76t-32 76l-24 24Zm80 80-42-42 144-144q14-14 14-35t-14-35l-64-64 42-42 64 64q32 32 32 77t-32 77L502-538Zm160 160-42-42 64-64q32-32 77-32t77 32l64 64-42 42-64-64q-14-14-35-14t-35 14l-64 64ZM212-212Z"/></svg>'; ?>
                    <?php $reviewIconSvg =
                        '<svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="M240-400h122l200-200q9-9 13.5-20.5T580-643q0-11-5-21.5T562-684l-36-38q-9-9-20-13.5t-23-4.5q-11 0-22.5 4.5T440-722L240-522v122Zm280-243-37-37 37 37ZM300-460v-38l101-101 20 18 18 20-101 101h-38Zm121-121 18 20-38-38 20 18Zm26 181h273v-80H527l-80 80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z"/></svg>'; ?>
                    <?php
                    $openingHoursIcon =
                        '<svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="M320-160h320v-120q0-66-47-113t-113-47q-66 0-113 47t-47 113v120Zm160-360q66 0 113-47t47-113v-120H320v120q0 66 47 113t113 47ZM160-80v-80h80v-120q0-61 28.5-114.5T348-480q-51-32-79.5-85.5T240-680v-120h-80v-80h640v80h-80v120q0 61-28.5 114.5T612-480q51 32 79.5 85.5T720-280v120h80v80H160Z"/></svg>';
                    $specialOffersIcon =
                        '<svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="m80-80 200-560 360 360L80-80Zm132-132 282-100-182-182-100 282Zm370-246-42-42 224-224q32-32 77-32t77 32l24 24-42 42-24-24q-14-14-35-14t-35 14L582-458ZM422-618l-42-42 24-24q14-14 14-34t-14-34l-26-26 42-42 26 26q32 32 32 76t-32 76l-24 24Zm80 80-42-42 144-144q14-14 14-35t-14-35l-64-64 42-42 64 64q32 32 32 77t-32 77L502-538Zm160 160-42-42 64-64q32-32 77-32t77 32l64 64-42 42-64-64q-14-14-35-14t-35 14l-64 64ZM212-212Z"/></svg>';
                    ?>
        
                    <?php
                    renderCard(
                        "Total Trips",
                        htmlspecialchars($totaltrips),
                        "#",
                        $iconSvg,
                        "red"
                    );
                    renderCard(
                        "Ratings",
                        htmlspecialchars($ratings),
                        "#",
                        $ratingIconSvg,
                        "blue"
                    );
                    // renderCard(
                    //     "Revenue",
                    //     isset($specailOffers) ? $specailOffers : "Nothing Here",
                    //     "/myoffers?id=$userid",
                    //     $offerIconSvg,
                    //     "yellow"
                    // );
                    // renderCard(
                    //     "Total Reviews",
                    //     htmlspecialchars($totalreviews),
                    //     "/myreviews_rest?id=<?= $userid",
                    //     $reviewIconSvg,
                    //     "green"
                    // );
                    // renderCard(
                    //     "Opening Hours",
                    //     isset($openingHours[0]["openingHours"])
                    //         ? $openingHours[0]["openingHours"]
                    //         : "Not set yet",
                    //     "#",
                    //     $openingHoursIcon,
                    //     "orange"
                    // );
                    ?>

               </div>
               <!-- card wrapper ends -->
     </div>
     <!-- card contaainer ends -->
     
<div class="card--container">
  <div class="location--wrapper"> 
              <!-- <div class="location--card">
                     <h2 class="location--title"> My Trips</h2>
              <?php if (isset($photos)): ?>
                    <img src="<?= './restaurants/folder' . $userid . '/locations/' . $photos ?>" width="600" height="400">
                    
                <?php else: ?>
                   <div class="upload-box" style="width: 550px; height: 550px; display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed #ccc; text-align: center;">
                  <a href="/details_rest?id=<?= $userid ?>"> <img src="./restaurants/locations/add.png"  width="120px" height="100px"></a>
                </div>

                <?php endif; ?>

                 </div> -->



                       
              
                   <!-- location  card 1 ends -->
                  
                <a href="/myoffers?id=<?= $userid ?>">
               
                    <div class="location--card">
                        
                            <!-- <div class="daily--container">
                                       <div class="daily--wrapper">
                                        <h2>Daily Offers</h2> -->
                                <?php
                                        // function renderDailyCard($title, $iconHtml, $des,$bgColor = "pink") {
                                        //     echo "
                                        //     <div class='daily--card'>
                                        //         <div class='daily--header'>
                                        //             <div class='daily-amount'>
                                        //                 <span class='daily-title'>" . htmlspecialchars($title) . "</span>
                                        //                   <span class='daily-des'>" . htmlspecialchars($des) . "</span>
                                                           
                                        //             </div>
                                        //             <i class='fas fa-dollar-sign icon' style='background-color:{$bgColor};'>
                                        //                 {$iconHtml}
                                                  
                                        //             </i>
                                        //         </div>
                                        //     </div>
                                        //     ";
                                        // }
                                        
                                    //      foreach($dailyoffers as $dailyoffer){
                                    //     $title = $dailyoffer['offer_title'];
                                    //     $des= $dailyoffer['offer_description'];
                                        
                                    //     $iconHtml = "<img src='./restaurants/dashboard_photos/offers.png' alt='' style='width: 50px; height: 50px;' />";

                                    //     renderDailyCard($title, $iconHtml,$des);
                                    // }
                                    //     ?>
                                                   
                                       </div>
                                       <!-- daily wrapper -->
                            </div>
                            <!-- daily container -->
                   </div>
                   <!-- location card2 ends -->

         </div>
         <!-- location wrapper ends -->
</div>
<!-- card cotainer 2 ends -->

     
     
</div>
<!-- main content ends -->

</body>
</html>

<?php require base_path("views/partials/restaurants/filejs.php"); ?>