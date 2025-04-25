<?php require base_path("views/partials/restaurants/styles/dashboard-styles.php"); ?>
<?php require base_path("views/partials/restaurants/sidebar.php"); ?>
<?php require base_path("views/partials/rental/styles/notify.php"); ?>

<?php
function renderCard($title, $value, $link, $iconSvg, $bgColor = "gray") {
    echo "
    <a href='{$link}' style='text-decoration: none;'>
        <div style='background: linear-gradient(135deg, #ffffff, #f5f7fa); border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; align-items: center;'>
            <div style='flex: 1;'>
                <span style='font-size: 16px; color: #555; font-weight: 500; display: block; margin-bottom: 10px;'>{$title}</span>
                <span style='font-size: 24px; color: #222; font-weight: bold;'>{$value}</span>
            </div>
            <i style='background: {$bgColor}; padding: 12px; border-radius: 8px; display: flex; align-items: center; justify-content: center;'>
                {$iconSvg}
            </i>
        </div>
    </a>";
}

function renderDailyCard($title, $iconHtml, $des, $bgColor = "black") {
    echo "
    <div style='background: linear-gradient(135deg, #ffffff, #f5f7fa); border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; align-items: center;'>
        <div style='flex: 1;'>
            <span style='font-size: 16px; color: #555; font-weight: 500; display: block; margin-bottom: 10px;'>" . htmlspecialchars($title) . "</span>
            <span style='font-size: 14px; color: #777;'>" . htmlspecialchars($des) . "</span>
        </div>
        <i style='background: {$bgColor}; padding: 12px; border-radius: 8px; display: flex; align-items: center; justify-content: center;'>
            {$iconHtml}
        </i>
    </div>";
}
?>

<div style="background: #f0f2f5; min-height: 100vh; font-family: 'Segoe UI', Arial, sans-serif;">
    <?php require base_path('views/partials/restaurants/header.php') ?>
    
    <!-- Main container -->
    <div style="padding: 30px 20px; max-width: 1400px; margin: 0 auto;">
        <?php require base_path('views/partials/restaurants/heading.php') ?>
        <p style="font-size: 18px; color: #444; margin-bottom: 30px; font-weight: 500;">Welcome to the traveLK Dashboard</p>

        <!-- Grid container -->
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); grid-auto-rows: 200px; gap: 20px;">
            <!-- Profile Card -->
            <div style="grid-column: span 2; grid-row: span 2; background: linear-gradient(135deg, #ffffff, #f8fafc); border-radius: 12px; padding: 30px; box-shadow: 0 6px 16px rgba(0,0,0,0.15); display: flex; flex-direction: column; align-items: center; justify-content: center; transition: transform 0.3s ease;">
                <img 
                    src='<?= $profile ? $profile['profile'] : "/restaurants/default-pics/default-profile.svg" ?>' 
                    alt='Profile Picture' 
                    style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; margin-bottom: 15px; border: 3px solid #e0e0e0;" 
                />
                <p style="font-size: 18px; color: #333; font-weight: 600; margin-bottom: 10px;"><?= $name ?></p>
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
                <a href='/details_rest/edit?id=<?= $userid ?>' 
                   style="background: #007bff; color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 500; transition: background 0.3s ease;">
                    Edit Profile
                </a>
            </div>

            <!-- Total Tables Card -->
            <div style="height: 100%;">
                <a href="/tables?id=<?= $userid ?>" style="text-decoration: none; display: block; height: 100%;">
                    <div style="background: linear-gradient(135deg, #ffffff, #f5f7fa); border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <span style="font-size: 16px; color: #555; font-weight: 500; display: block; margin-bottom: 10px;">Total Tables</span>
                            <span style="font-size: 24px; color: #222; font-weight: bold;"><?= $totalTables ?></span>
                        </div>
                        <i style="background: #28a745; padding: 12px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#fff"><path d="m240-160 60-150q9-23 29-36.5t45-13.5h66v-161q-153-5-256.5-45T80-660q0-58 117-99t283-41q167 0 283.5 41T880-660q0 54-103.5 94T520-521v161h66q24 0 44.5 13.5T660-310l60 150h-80l-48-120H368l-48 120h-80Zm240-440q97 0 183-17t126-43q-40-26-126-43t-183-17q-97 0-183 17t-126 43q40 26 126 43t183 17Zm0-60Z"/></svg>
                        </i>
                    </div>
                </a>
            </div>

            <!-- Total Menus Card -->
            <div style="height: 100%;">
                <a href="/mymenus?id=<?= $userid ?>" style="text-decoration: none; display: block; height: 100%;">
                    <div style="background: linear-gradient(135deg, #ffffff, #f5f7fa); border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <span style="font-size: 16px; color: #555; font-weight: 500; display: block; margin-bottom: 10px;">Total Menus</span>
                            <span style="font-size: 24px; color: #222; font-weight: bold;"><?= $totalMenus ?></span>
                        </div>
                        <i style="background: #007bff; padding: 12px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#fff"><path d="M560-564v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-600q-38 0-73 9.5T560-564Zm0 220v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-380q-38 0-73 9t-67 27Zm0-110v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-490q-38 0-73 9.5T560-454ZM260-320q47 0 91.5 10.5T440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6Zm260 42q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-396q-33-14-68.5-21t-71.5-7q-47 0-93 12t-87 36v394Zm-40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740q51-30 106.5-45T700-800q52 0 102 12t96 36q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59ZM280-494Z"/></svg>
                        </i>
                    </div>
                </a>
            </div>

            <!-- Total Reviews Card -->
            <div style="height: 100%;">
                <a href="/myreviews_rest?id=<?= $userid ?>" style="text-decoration: none; display: block; height: 100%;">
                    <div style="background: linear-gradient(135deg, #ffffff, #f5f7fa); border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <span style="font-size: 16px; color: #555; font-weight: 500; display: block; margin-bottom: 10px;">Total Reviews</span>
                            <span style="font-size: 24px; color: #222; font-weight: bold;"><?= $totalReviews ?? 'no reviews' ?></span>
                        </div>
                        <i style="background: #dc3545; padding: 12px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#fff"><path d="M172-120v-60h616v60H172Zm0-170v-60h616v60H172Zm0-170v-60h616v60H172Zm708-170H80v-280h800v280Zm-80-60v-160H160v160h640Zm-640 0h640-640Z"/></svg>
                        </i>
                    </div>
                </a>
            </div>

            <!-- Opening Hours Card -->
            <div style="height: 100%;">
                <div style="text-decoration: none; display: block; height: 100%;">
                    <div style="background: linear-gradient(135deg, #ffffff, #f5f7fa); border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <span style="font-size: 16px; color: #555; font-weight: 500; display: block; margin-bottom: 10px;">Opening Hours</span>
                            <span style="font-size: 24px; color: #222; font-weight: bold;"><?= $operatingHours ? date('H:i A', strtotime($operatingHours['operatingHoursFrom'])).'-'.$operatingHours['operatingHoursTo'] : "Not set yet" ?></span>
                        </div>
                        <i style="background: #ffc107; padding: 12px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#fff"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-60q142 0 241-99t99-241q0-142-99-241t-241-99q-142 0-241 99t-99 241q0 142 99 241t241 99Zm0-140q-54 0-92-38t-38-92q0-54 38-92t92-38q54 0 92 38t38 92q0 54-38 92t-92 38Zm0-60q29 0 49.5-20.5T550-480q0-29-20.5-49.5T480-550q-29 0-49.5 20.5T410-480q0 29 20.5 49.5T480-410Zm0-70Zm0-330q-13 0-21.5 8.5T450-710v230q0 13 8.5 21.5T480-450q13 0 21.5-8.5T510-480v-230q0-13-8.5-21.5T480-740Z"/></svg>
                        </i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<?php require base_path("views/partials/restaurants/filejs.php"); ?>