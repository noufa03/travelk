<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/rental/sidebar_car.php') ?>
<style>
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 30px;
        z-index: 999;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
    }

    .popup.open-popup {
        display: block;
    }
</style>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <h3 style="color: brown;">Past Bookings</h3>
    <div class="table--content">
        <table>
            <thead>
                <tr>
                   
                    <th>Customer Details</th>
                    <th>Trip Details</th>
                    <th>Payment Details</th>
                   
                    <th>Ratings</th>
                    <th>Ride completed</th>
                    <th>Confirmation</th>
                    
                </tr>
            </thead>
            <tbody>
            <!-- shows the pastbooking pickupdate is passsed -->
                <?php foreach ($past_bookings as $past_booking) : ?>
                    <tr>
                   
                        <td>
                            Customer Name:<?= $past_booking['customername'] ?><br>
                            Contact Info:<?= $past_booking['contactnumber'] ?><br>
                            Email:<?= $past_booking['emailaddress'] ?>
                        </td>
                        <td>
                            Pickup Date:<?= $past_booking['pickupdate'] ?><br>
                           
                            Pickup Location:<?= $past_booking['pickuplocation'] ?><br>
                            Dropoff Location:<?= $past_booking['dropofflocation'] ?><br>
                            Rental Duration(hours):<?= $past_booking['rentalduration'] * 24 ?>
                        </td>
                        <td>
                            Payment Status: <?= htmlspecialchars($past_booking['paymentstatus']) ?><br>
                            Payment Method:<?= $past_booking['paymentmethod'] ?><br>
                            Total:<?= $past_booking['totalcost'] ?>
                        </td>
                      
                       
                        <td><?= $past_booking['rating'] ?></td>
                        <td><?= $past_booking['ridecompleted'] == 0 ? 'NO' : 'YES' ?></td>
                        <td><?= $past_booking['confirmation_of_driver'] == 1 ? 'Confirmed' : 'Cancelled' ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>


    </div>
    <h3 style="color: brown;">Future Bookings</h3>
    <h4 style="color:green;text-align:center">Confirmed Bookings</h4>

    <div class="table--content">
        <table>
            <thead>
                <tr>
                    <th>Customer Details</th>
                    <th>Trip Details</th>
                    <th>Payment Details</th>
                   
                    <th>Ratings</th>
                    <th>Ride completed</th>
                    <th>Confirmation</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <!-- pickupdate is in future and the confirmation of the driver is true -->
                <?php foreach ($future_bookings_confirmeds as $future_bookings_confirmed) : ?>
                    <tr>
                        <td>
                            Customer Name:<?= $future_bookings_confirmed['customername'] ?><br>
                            Contact Info:<?= $future_bookings_confirmed['contactnumber'] ?><br>
                            Email:<?= $future_bookings_confirmed['emailaddress'] ?>
                        </td>
                        <td>
                            Pickup Date:<?= $future_bookings_confirmed['pickupdate'] ?><br>
                          
                            Pickup Location:<?= $future_bookings_confirmed['pickuplocation'] ?><br>
                            Dropoff Location:<?= $future_bookings_confirmed['dropofflocation'] ?><br>
                            Rental Duration(hours):<?= $future_bookings_confirmed['rentalduration'] * 24 ?>
                        </td>
                        <td>
                            Payment Status: <?= htmlspecialchars($future_bookings_confirmed['paymentstatus']) ?><br>
                            Payment Method:<?= $future_bookings_confirmed['paymentmethod'] ?><br>
                            Total:<?= $future_bookings_confirmed['totalcost'] ?>
                        </td>
                      
                    
                        <td><?= $future_bookings_confirmed['rating'] ?></td>
                        <td><?= $future_bookings_confirmed['ridecompleted'] == 0 ? 'NO' : 'YES' ?></td>
                        <td>
                       <!--  confirmation field->confirmation of the driver is 1 it is confirmed orelse it will be cancalled -->
                        <?= $future_bookings_confirmed['confirmation_of_driver'] == 1 ? "Confirmed" : "Cancelled" ?>
                        </td>
                        <td>
                            <button style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                            onclick='openPopup_booking(<?= $future_bookings_confirmed[`bookingid`] ?>)'>
                            Cancel
                            </button>
                        </td>
                        <div class="popup"  id="popup-<?= $future_bookings_confirmed['bookingid']  ?>" style="color: black;">
                            <form id="delete-form" method="POST" action="/bookings/update">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="bookingid" value="<?= $future_bookings_confirmed['bookingid'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="green">
                                    <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                                </svg>
                                <h2>Cancellation</h2>
                                <p>Are you sure you want to proceed?</p>
                                <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                                name="confirmation_of_driver">Confirm</button>
                                <button type="reset" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                                onclick="closePopup_booking(<?= $future_bookings_confirmed[`bookingid`] ?>)">
                                <a href="/bookings"> Cancel</a>
                                </button>
                            </form>
                        </div>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <h4 style="color:green;text-align:center;overflow:hidden">Pending Bookings</h4>
    <div class="table--content" style="overflow:hidden">
        <table>
            <thead>
                <tr>
                  <th>Customer Details</th>
                    <th>Trip Details</th>
                    <th>Payment Details</th>
                   
                    <th>Ratings</th>
                    <th>Ride completed</th>
                    <th>Confirmation</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <!-- future cancelled bookings are pendings one -->
                <?php foreach ($future_bookings_cancelleds as $future_bookings_cancelled) : ?>
                    <tr>
                       
                     
                        <td>
                            Customer Name:<?=  $future_bookings_cancelled['customername'] ?><br>
                            Contact Info:<?=  $future_bookings_cancelled['contactnumber'] ?><br>
                            Email:<?=  $future_bookings_cancelled['emailaddress'] ?>
                        </td>
                        <td>
                            Pickup Date:<?=  $future_bookings_cancelled['pickupdate'] ?><br>
                      
                            Pickup Location:<?=  $future_bookings_cancelled['pickuplocation'] ?><br>
                            Dropoff Location:<?=  $future_bookings_cancelled['dropofflocation'] ?><br>
                            Rental Duration(hours):<?=  $future_bookings_cancelled['rentalduration'] * 24 ?>
                        </td>
                        <td>
                            Payment Status: <?= htmlspecialchars( $future_bookings_cancelled['paymentstatus']) ?><br>
                            Payment Method:<?=  $future_bookings_cancelled['paymentmethod'] ?><br>
                            Total:<?=  $future_bookings_cancelled['totalcost'] ?>
                        </td>
                      
           
                        <td><?=  $future_bookings_cancelled['rating'] ?></td>
                        <td><?=  $future_bookings_cancelled['ridecompleted'] == 0 ? 'NO' : 'YES' ?></td>


                        <td><?= $future_bookings_cancelled['confirmation_of_driver'] == 1 ? "Confirmed" : "Cancelled" ?></td>
                        <td>
                            <button style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                            onclick='openPopup_booking(<?= $future_bookings_cancelled[`bookingid`] ?>)'>
                            Confirm
                            </button>
                        </td>
                        <div class="popup" id="popup-<?= $future_bookings_cancelled['bookingid'] ?>" style="color: black;">
                            <form id="delete-form" method="POST" action="/bookings/update?id=<?= $future_bookings_cancelled['bookingid'] ?>">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="bookingid" value="<?= $future_bookings_cancelled['bookingid'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="green">
                                    <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                                </svg>
                                <h2>Confirmation</h2>
                                <p>Are you sure you want to proceed?</p>

                                <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                                name="confirmation_of_driver" >Confirm</button>
                                <button type="rest" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                                onclick="closePopup_booking(<?= $future_bookings_cancelled[`bookingid`] ?>)">
                                <a href="/bookings"> Cancel</a>
                               </button>
                            </form>
                        </div>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
<script>
   function openPopup_booking(id) {
        var popup = document.getElementById('popup-' + id); // Get the unique popup
        popup.classList.add("open-popup"); // Add class to show the popup
    }

    function closePopup_booking(id) {
        var popup = document.getElementById('popup-' + id); // Get the unique popup
        popup.classList.remove("open-popup"); // Remove class to hide the popup
        window.location.href = "/bookings"; // Redirect to the tables page
    }
</script>
<?php require (BASE_PATH.'views/partials/user/toast.php');?>
<?php require base_path('views/partials/rental/js/bookings.php') ?>
<?php require base_path("views/partials/restaurants/filejs.php"); ?>
<?php require base_path('views/partials/footer.php') ?>