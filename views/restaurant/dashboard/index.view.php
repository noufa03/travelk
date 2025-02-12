
<?php require base_path("views/partials/restaurants/styles.php"); ?>


<?php require base_path("views/partials/restaurants/sidebar.php"); ?>


 
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

 <?php require base_path("views/restaurant/popups/welcome.php"); ?>
 
<div class="main--content">
<?php require base_path('views/partials/restaurants/header.php') ?>
<?php require base_path('views/partials/restaurants/heading.php') ?>

<p style="font-size: 18px; color: #555;">
   Welcome to the traveLK Dashboard
</p>


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
                            ? "/restaurants/folder$userid/profile/$profile" 
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
     
     
     
     
     
          <!-- <h3 class="main--title"><?= isset($name)? "$name's Data": "Today's Data" ?></h3> -->
          
          
          
          
               <div class="card--wrapper">
   
                    <?php $iconSvg =
                        '<svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="m240-160 60-150q9-23 29-36.5t45-13.5h66v-161q-153-5-256.5-45T80-660q0-58 117-99t283-41q167 0 283.5 41T880-660q0 54-103.5 94T520-521v161h66q24 0 44.5 13.5T660-310l60 150h-80l-48-120H368l-48 120h-80Zm240-440q97 0 183-17t126-43q-40-26-126-43t-183-17q-97 0-183 17t-126 43q40 26 126 43t183 17Zm0-60Z"/></svg>'; ?>
                    <?php $menuIconSvg =
                        '<svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="M560-564v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-600q-38 0-73 9.5T560-564Zm0 220v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-380q-38 0-73 9t-67 27Zm0-110v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-490q-38 0-73 9.5T560-454ZM260-320q47 0 91.5 10.5T440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6Zm260 42q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-396q-33-14-68.5-21t-71.5-7q-47 0-93 12t-87 36v394Zm-40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740q51-30 106.5-45T700-800q52 0 102 12t96 36q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59ZM280-494Z"/></svg>'; ?>
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
                        "Total Tables",
                        htmlspecialchars($totalTables),
                        "/tables?id=$userid",
                        $iconSvg,
                        "red"
                    );
                    renderCard(
                        "Total Menus",
                        htmlspecialchars($totalMenus),
                        "/mymenus?id=$userid",
                        $menuIconSvg,
                        "blue"
                    );
                  
                    renderCard(
                        "Total Reviews",
                        htmlspecialchars($totalreviews),
                        "/myreviews_rest?id=<?= $userid",
                        $reviewIconSvg,
                        "green"
                    );
                    renderCard(
                        "Opening Hours",
                        isset($openingHours[0]["openingHours"])
                            ? $openingHours[0]["openingHours"]
                            : "Not set yet",
                        "#",
                        $openingHoursIcon,
                        "orange"
                    );
                    ?>

               </div>
               <!-- card wrapper ends -->
     </div>
     <!-- card contaainer ends -->
     
<div class="card--container">
  <div class="location--wrapper"> 
       



                       
              
                   <!-- location  card 1 ends -->
                  
                <a href="/myoffers?id=<?= $userid ?>">
               
                    <div class="location--card">
                        
                            <div class="daily--container">
                                       <div class="daily--wrapper">
                                        <h2>Daily Offers</h2>
                                <?php
                                        function renderDailyCard($title, $iconHtml, $des,$bgColor = "pink") {
                                            echo "
                                            <div class='daily--card'>
                                                <div class='daily--header'>
                                                    <div class='daily-amount'>
                                                        <span class='daily-title'>" . htmlspecialchars($title) . "</span>
                                                          <span class='daily-des'>" . htmlspecialchars($des) . "</span>
                                                           
                                                    </div>
                                                    <i class='icon' style='background-color:{$bgColor};'>{$iconHtml}</i>
                                                        
                                                  
                                                    </i>
                                                </div>
                                            </div>
                                            ";
                                        }
                                        
                                         foreach($dailyoffers as $dailyoffer){
                                        $title = $dailyoffer['offer_title'];
                                        $des= $dailyoffer['offer_description'];
                                        
                                        $iconHtml =$specialOffersIcon;

                                        renderDailyCard($title, $iconHtml,$des);
                                    }
                                        ?>
                                                   
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