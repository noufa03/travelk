<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <button style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
    <a href="/reservations/add?id=<?= $userid ?>">+ Add a Revsevations</a></button>

    <div class="table--content">
      
        <table>
            <thead>
                <tr>
               
                    <th>Resrvation Code</th>
                  
                    <th>Reservation Details</th>
                    <th>Customer Details</th>
                    <th>special_requests</th>
                    <th>status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation) : ?>
                    <tr>
                   
                        <td><?= $reservation['reservationcode'] ?></td>
    

                        <td><?= "Day :" . date("Y M D h A", strtotime($reservation['reservation_date']));  ?>
                            <br>
                            <?= "Table Details" . "<br>" . "fee:" . $reservation['tableprice'] . "<br>" . "name:" . $reservation['tablename'] ?>
                        </td>
                        <td><?= $reservation['user_name'] ?>
                            <br>
                            <?= $reservation['email(traveler)'] ?>
                        </td>
                        <td><?= isset($reservation['specialrequests']) ? $reservation['specialrequests'] : 'No special requests' ?></td>
                        <td><?= $reservation['reservationstatus'] ?></td>
                        <td>
                            <?php
                            $now = new DateTime();
                            $reservationDate = new DateTime($reservation['reservation_date']);

                            if ($reservationDate > $now):
                                if ($reservation['reservationstatus'] == 'cancelled'): ?>
                                    <button class="delete" onclick="openPopup(<?= $reservation['reservationid'] ?>)" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)'; this.style.boxShadow='none';">
                                        Confirm
                                    </button>
                                <?php else: ?>
                                    <button style="background: linear-gradient(90deg, #e57373, #d32f2f); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #d32f2f, #e57373)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #e57373, #d32f2f)'; this.style.boxShadow='none';" onclick="openPopup(<?= $reservation['reservationid'] ?>)">
                                        Cancel
                                    </button>
                            <?php endif;
                            endif;
                            ?>
                            <div class="popup" id="popup-<?= $reservation['reservationid'] ?>" style="color: black;">
                                <img src="/restaurants/menus/tick.svg" alt="">
                                <?php if ($reservation['reservationstatus'] == 'confirmed'): ?>
                                    <h2>Cancellation</h2>
                                <?php else: ?>
                                    <h2>Confirmation</h2>
                                <?php endif; ?>
                                <form id="delete-form-<?= $reservation['reservationid'] ?>" method="POST" action="/reservation/update?id=<?= $userid ?>">
                                    <input type="hidden" name="id" value="<?= $reservation['reservationid'] ?>">
                                    <input type="hidden" name="tableid" value="<?= $reservation['tableid'] ?>">
                                    <input type="hidden" name="status" value="<?= $reservation['reservationstatus'] ?>">
                                    <?php if ($reservation['reservationstatus'] == 'confirmed'): ?>
                                        <p>Note that this Reservation will be cancelled. Are you sure?</p>
                                    <?php else: ?>
                                        <p>Note that this Reservation will be confirmed. Are you sure?</p>
                                    <?php endif; ?>
                                    <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                                    >Confirm</button>
                                </form>
                                <button type="reset" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                                onclick="closePopup_reservation(<?= $reservation['reservationid'] ?>)">Cancel</button>
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