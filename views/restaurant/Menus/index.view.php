<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/styles/popup.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <button  style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"> <a href="/menu/add?id=<?= $userid ?>">+ Add Cuisine</a></button>

    <div style="display: flex;flex-direction:row;justify-content:space-between">

        <p style="font-size: 18px; color: #555;">
            Add Cuisine / Cuisine List
        </p>
        <p style="font-size: 18px; color: #555;">
            <?php
            if (isset($filterby)) {
                echo "Filter by $filterby cuisine";
            }
            ?>

        </p>
        <form method="get" action="/mymenus">
            <div class="filter-condition">
                <span style="color: black;">Filter By Cuisine</span>
                <?php $selected = isset($_GET['category']) ? $_GET['category'] : ''; ?>
                <select name="category" onchange="this.form.submit()">
                    <option value="" <?php if ($selected == "") echo "selected"; ?>>Default</option>
                    <option value="Italian" <?php if ($selected == "Italian") echo "selected"; ?>>Italian</option>
                    <option value="Chinese" <?php if ($selected == "Chinese") echo "selected"; ?>>Chinese</option>
                    <option value="Mexican" <?php if ($selected == "Mexican") echo "selected"; ?>>Mexican</option>
                    <option value="Japanese" <?php if ($selected == "Japanese") echo "selected"; ?>>Japanese</option>
                    <option value="Indian" <?php if ($selected == "Indian") echo "selected"; ?>>Indian</option>
                    <option value="Thai" <?php if ($selected == "Thai") echo "selected"; ?>>Thai</option>
                    <option value="Greek" <?php if ($selected == "Greek") echo "selected"; ?>>Greek</option>
                    <option value="French" <?php if ($selected == "French") echo "selected"; ?>>French</option>
                </select>

            </div>

        </form>
    </div>
    <div class="table--content">
        <table>
            <thead>
                <tr>
                    <th>Cuisine ID</th>
                    <th>Cuisine Name</th>
                    <th>Description</th>
                    <th>Availability</th>
                    <th>sizes(price)</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cuisines as $cuisine) : ?>
                    <tr>
                        <td><?= '#' . $cuisine['cuisineID'] ?></td>
                        <td>
                            <div style="display: flex;flex-direction:row;gap:1rem;">
                                <img src='<?= $cuisine['photo'] ?>' width="50" height="50">
                                <div style="display: flex;flex-direction:column">
                                    <p style="color: #555;"> <?= $cuisine['cuisine_name'] ?></p>
                                    <p>
                                        <?php
                                        if (isset($cuisine['average_rating'])) {
                                            $roundedRating = round($cuisine['average_rating']);
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $roundedRating) {
                                                    echo '<i class="fa-solid fa-star" style="color: gold;"></i> ';
                                                } else {
                                                    echo '<i class="fa-regular fa-star" style="color: gray;"></i> ';
                                                }
                                            }
                                            echo " (" . 'Review ' . round($cuisine['average_rating'], 2) . ")";
                                        } else {
                                            for ($i = 1; $i <= 5; $i++) {
                                                echo '<i class="fa-regular fa-star" style="color: gray;"></i> ';
                                            }
                                        }
                                        ?>

                                    </p>
                                </div>
                            </div>

                            <br>
                        </td>
                        <td><?= $cuisine['description'] ?></td>
                        <td style="color: <?= ($cuisine['available'] == 1) ? 'green' : 'red' ?>;">
                            <?= ($cuisine['available'] == 1) ? 'yes' : 'no' ?>
                        </td>
                        <td>
                            <a href="/menu/add/size?id=<?= $cuisine['cuisineID']  ?>"> <button  style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 40px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">Add Sizes </button></a>
                        </td>
                        <td>
                            <a href="/menu/edit?id=<?= $cuisine['cuisineID']  ?>"> <button  style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">Edit Cuisine </button></a>
                        </td>
                        <td>
                            <div id="delete-form">
                                <div id="delete-form">
                                    <button type="submit"   style="background: linear-gradient(90deg, #e57373, #d32f2f); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #d32f2f, #e57373)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #e57373, #d32f2f)';" 
                                    onclick="openPopup(<?= $cuisine['cuisineID'] ?>)">Delete Cuisine</button>
                                    <div class="popup" id="popup-<?= $cuisine['cuisineID'] ?>" style="color: black;">
                                        <img src="/restaurants/menus/tick.svg" alt="">
                                        <h2>Confirm</h2>

                                        <form id="delete-form-<?= $cuisine['cuisineID'] ?>" method="POST" action="/menu/delete">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="cuisineID" value="<?= $cuisine['cuisineID'] ?>">
                                            <p>Note that this item will be deleted permanently from your Menus list. Are you sure?</p>
                                            <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';" 
                                            >Delete</button>
                                        </form>
                                        <button type="reset" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                                        onclick="closePopup_cuisine(<?= $cuisine['cuisineID'] ?>)">Cancel</button>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>