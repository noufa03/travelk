<?php require base_path("views/partials/rental/styles/main.php"); ?>
<?php require base_path("views/partials/rental/styles/dashboard.php"); ?>
<?php require base_path("views/partials/rental/styles/seemore.php"); ?>
<?php require base_path("views/partials/rental/styles/notify.php"); ?>
<?php require base_path("views/partials/rental/sidebar_car.php"); ?>
<?php

function renderReviewCard($reviewer, $rating, $message, $iconHtml)
{
    echo "
        <div class='daily--card'>
            <div class='daily--header'>
                {$iconHtml}
                <div class='daily-amount'>
                    <span class='daily-title'>" . htmlspecialchars($reviewer) . "</span>
                    
                </div>
            </div>
            <div class='daily-amount'>
                <span class='daily-title'>" . renderStars($rating) . "</span>
            </div>
            <div class='daily-amount'>
                <span class='daily-des'>" . htmlspecialchars($message) . "</span>
            </div>
        </div>
    ";
}

function renderStars($rating)
{
    $stars = '';
    for ($i = 0; $i < 5; $i++) {
        $stars .= ($i < $rating) ? "★" : "☆";
    }
    return $stars;
}

?>

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
    <?php require base_path("views/partials/rental/header.php"); ?>
    <?php require base_path("views/partials/restaurants/heading.php"); ?>

    <p style="font-size: 18px; color: #555;">
        Welcome to the traveLK Dashboard
    </p>

    <div class="card--container">

        <div class="card--wrapper">

            <?php $iconSvg =
                '<svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="M320-704 200-824l56-56 120 120-56 56Zm320 0-56-56 120-120 56 56-120 120Zm-200-56v-200h80v200h-80ZM160 0q-17 0-28.5-11.5T120-40v-320l84-240q6-18 21.5-29t34.5-11h440q19 0 34.5 11t21.5 29l84 240v320q0 17-11.5 28.5T800 0h-40q-17 0-28.5-11.5T720-40v-40H240v40q0 17-11.5 28.5T200 0h-40Zm72-440h496l-42-120H274l-42 120Zm68 240q25 0 42.5-17.5T360-260q0-25-17.5-42.5T300-320q-25 0-42.5 17.5T240-260q0 25 17.5 42.5T300-200Zm360 0q25 0 42.5-17.5T720-260q0-25-17.5-42.5T660-320q-25 0-42.5 17.5T600-260q0 25 17.5 42.5T660-200Zm-460 40h560v-200H200v200Zm0 0v-200 200Z"/></svg>' ?>
            <?php $star =
                '<svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#e8eaed"><path d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143ZM233-120l65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Zm247-350Z"/></svg>' ?>
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
                "/tables?id=$userid",
                $iconSvg,
                "black"
            );
            renderCard(
                "Ratings",
                $ratings,
                "/mymenus?id=$userid",
                $star,
                "orange"
            );
            renderCard(
                "Total Reviews",
                htmlspecialchars($totalreviews),
                "/myreviews_rest?id=$userid",
                $reviewIconSvg,
                "black"
            );
            renderCard(
                "Acceptance Rate",
                htmlspecialchars(round($acceptanceRate, 2) . '%'),
                "/myreviews_rest?id=$userid",
                $openingHoursIcon,
                "orange"
            );





            // renderCard(
            //     "Opening Hours",
            //     ($operatingHours==true)?
            //      $operatingHours['operatingHoursFrom'].'-'.$operatingHours['operatingHoursTo'] : "Not set yet",
            //     "#",
            //     $openingHoursIcon,
            //     "orange"
            // );
            ?>

        </div>



    </div>

    <!-- header wrapper ends -->
    <div class="card--container" style="color: brown;">


        <?php if (!isset($detailsID)): ?>
            <div class="card--wrapper--starthere">
                <div class="starthere--card">

                    <p style="font-size: 1rem;color:black;margin:100px">We are thrilled to have you on board. Explore the features and make the most out of your journey with us!</p>
                    <button class="button-6" style="margin-left:100px ;"> <a href='/details_rental?id=<?= $userid ?>'>Start here</a> </button>
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

                        <p style="font-size: 1rem; color:grey; text-align: center;font-weight:lighter"><?= $name['first_name'] . ' ' . $name['last_name'] ?></p>

                        <p style="text-align: center;">

                            <?php if (isset($Averageratings)) {
                                $roundedRating = round(
                                    $Averageratings
                                );
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $roundedRating) {
                                        echo '<i class="fa-solid fa-star" style="color: gold;"></i> ';
                                    } else {
                                    }
                                }
                                echo " (" .
                                    $Averageratings .
                                    ")";
                            } else {
                                for ($i = 1; $i <= 5; $i++) {
                                    echo '<i class="fa-regular fa-star" style="color: gray;"></i> ';
                                }
                            } ?>
                        </p>
                    </div>
                    <button class="button-6" style="margin-left:0px;height:10px;"> <a href='/details_rental/edit?id=<?= $userid ?>'>Edit profile</a> </button>
                </div>
            </div>
        <?php endif; ?>
        <div style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;color: black;">

            <div class="daily--container">
                <div class="daily--wrapper">
                    <h2 style="color: black;">Past Trips</h2>
                    <?php
                    function renderDailyCard(
                        $date,
                        $iconHtml,
                        $time,
                        $pickuplocation,
                        $dropoff
                    ) {
                        echo "
                                            <div class='daily--card'>
                                                <div class='daily--header'>
                                                  {$iconHtml}
                                                    <div class='daily-amount'>
                                                     
                                                        <span class='daily-title'>" .
                            htmlspecialchars($date) .
                            "</span>
                                                          <span class='daily-des'>" .
                            htmlspecialchars($time) .
                            "</span>
                                                           
                                                    </div>

                                                     
                                                  
                                                   
                                                </div>
                                                     <div class='daily-amount'>
                                                     
                                                        <span class='daily-title'>" .
                            htmlspecialchars($pickuplocation) .
                            " " .
                            "To" .
                            " " .
                            $dropoff .
                            "</span>
                                                         
                                                           
                                                    </div>

                                            </div>
                                            ";
                    }
                    $limited_past_bookings = array_slice(
                        $past_bookings,
                        0,
                        1
                    ); // Limit to 3 bookings
                    foreach (
                        $limited_past_bookings
                        as $past_booking
                    ) {
                        $date = $past_booking["pickupdate"];
                        $time = $past_booking["pickuptime"];
                        $pickuplocation =$past_booking["pickuplocation"];
                        $dropoff = $past_booking["dropofflocation"];
                        $iconHtml = "<img src='./rental/dashboard_photos/car.png' alt='' style='width: 50px; height: 50px;' />";
                        renderDailyCard( $date,$iconHtml, $time,$pickuplocation,$dropoff);
                    }
                    ?>

                    <div class="extra">

                        <?php
                        $remaining_past_bookings = array_slice(
                            $past_bookings,
                            0,
                            3
                        );
                        foreach (
                            $remaining_past_bookings
                            as $past_booking
                        ) {
                            $date =
                                $past_booking["pickupdate"];
                            $time =
                                $past_booking["pickuptime"];
                            $pickuplocation =
                                $past_booking["pickuplocation"];
                            $dropoff =
                                $past_booking["dropofflocation"];
                            $iconHtml =
                                "<img src='./rental/dashboard_photos/car.png' alt='' style='width: 50px; height: 50px;' />";
                            echo "<div class='daily--wrapper '>";
                            renderDailyCard(
                                $date,
                                $iconHtml,
                                $time,
                                $pickuplocation,
                                $dropoff
                            );
                            echo "<br>";
                            echo "</div>";
                        }
                        ?>





                    </div>


                    <!-- <?php if ($totaldailyoffers > 3): ?>
                                          <a href="/myoffers?id=<?= $userid ?>"> -->

                    <div>


                        <button>

                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="black">
                                <path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z" />
                            </svg>
                        </button>

                    </div>
                    </a>
                <?php endif; ?>

                </div>
                <!-- daily wrapper -->
            </div>
            <!-- daily container -->
        </div>

    </div>
</div>
<!-- card contaainer ends -->

<div class="card--container">

    <div style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;color: black;">

        <div class="daily--container">
            <h2>Recent Updates</h2>
            <div class="daily--wrapper" style="display: grid;grid-template-columns:1fr 1fr">



                <div class="stat-box">
                    <h4>Upcoming Rides</h4>


                    <?php
                    $count = 0;

                    foreach ($upcomingrides as $upcomingride) {
                        if ($count >= 2) break;

                        $date = $upcomingride["pickupdate"];
                        $time = $upcomingride["pickuptime"];
                        $pickuplocation = $upcomingride["pickuplocation"];
                        $dropoff = $upcomingride["dropofflocation"];
                        $iconHtml = "<img src='./rental/dashboard_photos/car.png' alt='' style='width: 50px; height: 50px;' />";

                        renderDailyCard($date, $iconHtml, $time, $pickuplocation, $dropoff);

                        $count++;
                    }
                    ?> <br>



                    <a href="/bookings?id=<? $userid ?>" style="text-decoration: none; color: #007BFF; font-weight: bold;">
                        View All Rides →
                    </a>

                </div>


                <!-- 2 update -->
                <div class="stat-box">
                    <h4>Reviews</h4>


                    <?php
                    $count = 0;

                    foreach ($reviews as $review) {
                        if ($count >= 2) break;

                        $content = $review["review"];
                        $ratings = $review["ratings"];
                        $username = $review["user_name"];

                        $profile_pic = $review["profile"];

                        // fallback icon if no profile pic
                        $iconHtml = "<img src='" . ($profile_pic ? $profile_pic : './rental/dashboard_photos/user.png') . "' alt='' style='width: 50px; height: 50px; border-radius: 50%; object-fit: cover;' />";

                        renderReviewCard($username, $ratings, $content, $iconHtml);

                        $count++;
                    }
                    ?>
                    <br><a href="/myreviews_car?id=<? $userid ?>" style="text-decoration: none; color: #007BFF; font-weight: bold;">
                        View All Reviews →
                    </a>

                </div>



            </div>
        </div>
    </div>
</div>
<!-- card cotainer 2 ends -->
</div>
<!-- main content ends -->
</body>

</html>
<?php require (BASE_PATH.'views/partials/user/toast.php');?>
<?php require base_path("views/partials/restaurants/filejs.php"); ?>