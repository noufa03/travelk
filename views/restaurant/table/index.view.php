<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <button style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
        <a href="/tables/Add?id=<?= $userid ?>">
            + Add Table</a></button>
    <form method="post" action="/tables/filter?id=<?php echo $userid ?>">
        <?php $selected = isset($_GET['table']) ? $_GET['table'] : ''; ?>
        <div class="filter-condition">
            <span style="color: black;">Filter By Cuisine</span>
            <select name="table" onchange="this.form.submit(); console.log('Form submitted');">
                <option value="" <?php if ($selected == "") echo "selected"; ?>>Default</option>
                <option value="booked" <?php if ($selected == "booked") echo "selected"; ?>>Booked</option>
                <option value="all" <?php if ($selected == "all") echo "selected"; ?>>All</option>

            </select>
        </div>
    </form>

    <div class="table--content">
        <table>
            <thead>
                <tr>
                    <th>Table Name</th>
                    <th>Table Capacity</th>
                    <th>Reservation Type</th>
                    <th>Reservation Fee(Rs)</th>
                    <th>Availability</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tables as $table) : ?>
                    <tr>
                        <td><?= $table['tablename'] ?></td>
                        <td><?= $table['seatcapacity'] ?></td>
                        <td><?= $table['tablepricetype'] ?></td>
                        <td><?= $table['tableprice'] ?></td>
                        <td style="color: <?= ($table['status'] == 1) ? 'green' : 'red' ?>;"><?= ($table['status'] == 1) ? 'Available' : 'Booked'
                                                                                                ?>
                        </td>
                        <td>
                            <?php if ($table['status'] == 0): ?>
                                <a href="/reservations?id=<?= $userid ?>">
                                    <button class="publish" style="background: linear-gradient(90deg, #4fc3f7, #0288d1); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #0288d1, #4fc3f7)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #4fc3f7, #0288d1)'; this.style.boxShadow='none';">
                                        Check booking
                                    </button>
                                </a>
                            <?php else: ?>
                                <a href="/tables/edit?id=<?= $table['tableid'] ?>" class="edit">
                                    <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 10px 16px; border-radius: 6px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgbaNine,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
                                        Edit
                                    </button>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($table['status'] == 1): ?>
                                <div id="delete-form">
                                    <button type="submit" style="background: linear-gradient(90deg, #e57373, #d32f2f); color: #ffffff; padding: 10px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #d32f2f, #e57373)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #e57373, #d32f2f)';"
                                        onclick="openPopup(<?= $table['tableid'] ?>)">Delete</button>
                                    <div class="popup" id="popup-<?= $table['tableid'] ?>" style="color: black;">
                                        <img src="/restaurants/menus/tick.svg" alt="">
                                        <?php if ($table['status'] == 1): ?>
                                            <h2>Confirm</h2>
                                            <form id="delete-form-<?= $table['tableid'] ?>" method="POST" action="/tables/delete">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="tableid" value="<?= $table['tableid'] ?>">
                                                <p>Note that this item will be deleted permanently from your table list. Are you sure?</p>
                                                <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">Delete</button>
                                            </form>
                                            <button type="reset" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                                                onclick="closePopup(<?= $table['tableid'] ?>)" class="delete">Cancel</button>
                                        <?php else: ?>
                                            <h2>oops!</h2>
                                            <h4>The table is already booked. Cannot delete.</h4>
                                            <button type="reset" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                                                onclick="closePopup(<?= $table['tableid'] ?>)" class="delete">Cancel</button>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </span>
    </div>
</div>
<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>