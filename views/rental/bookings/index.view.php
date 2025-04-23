<?php require base_path('views/partials/rental/styles/booking.php') ?>
<?php require base_path('views/partials/rental/sidebar_car.php') ?>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <h3 style="color: brown;">Past Bookings</h3>
    <div class="table--content">
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Customer Name</th>
                    <th>Contact Info</th>
                    <th>Email</th>
                    <th>Pick up date</th>
                    <th>Drop off Date</th>
                    <th>Pick up Location</th>
                    <th>Drop off Location</th>
                    <th>Rental Duration(Hours)</th>
                    <th>Payment Status</th>
                    <th>Payment Method</th>
                    <th>Total Cost(Rs.)</th>

                    <th>Additional request</th>
                    <th>Ratings</th>
                    <th>Ride completed</th>
                    <th>Confirmation</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($past_bookings as $past_booking) : ?>
                    <tr>
                        <td><?= '#' . $past_booking['bookingid'] ?></td>
                        <td><?= $past_booking['customername'] ?></td>
                        <td><?= $past_booking['contactnumber'] ?></td>
                        <td><?= $past_booking['emailaddress'] ?></td>
                        <td><?= $past_booking['pickupdate'] ?></td>
                        <td><?= $past_booking['dropoffdate'] ?></td>
                        <td><?= $past_booking['pickuplocation'] ?></td>
                        <td><?= $past_booking['dropofflocation'] ?></td>
                        <td><?= $past_booking['rentalduration'] * 24 ?></td>
                        <td><?= $past_booking['paymentstatus'] ?></td>
                        <td><?= $past_booking['paymentmethod'] ?></td>
                        <td><?= $past_booking['totalcost'] ?></td>
                        <td><?= $past_booking['additionalrequests'] ?></td>
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
                    <th>Booking ID</th>
                    <th>Customer Name</th>
                    <th>Contact Info</th>
                    <th>Email</th>
                    <th>Pick up date</th>
                    <th>Drop off Date</th>
                    <th>Pick up Location</th>
                    <th>Drop off Location</th>
              
                    <th>Payment Status</th>
                    <th>Payment Method</th>
                    <th>Total Cost(Rs.)</th>

                    <th>Additional request</th>
                    <th>Ratings</th>

                    <th>Confirmation</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($future_bookings_confirmeds as $future_bookings_confirmed) : ?>
                    <tr>
                        <td><?= '#' . $future_bookings_confirmed['bookingid'] ?></td>
                        <td><?= $future_bookings_confirmed['customername'] ?></td>
                        <td><?= $future_bookings_confirmed['contactnumber'] ?></td>
                        <td><?= $future_bookings_confirmed['emailaddress'] ?></td>
                        <td><?= $future_bookings_confirmed['pickupdate'] ?></td>
                        <td><?= $future_bookings_confirmed['dropoffdate'] ?></td>
                        <td><?= $future_bookings_confirmed['pickuplocation'] ?></td>
                        <td><?= $future_bookings_confirmed['dropofflocation'] ?></td>
                        <!-- <td><?= $future_bookings_confirmed['rentalduration'] * 24 ?></td> -->
                        <td><?= $future_bookings_confirmed['paymentstatus'] ?></td>
                        <td><?= $future_bookings_confirmed['paymentmethod'] ?></td>
                        <td><?= $future_bookings_confirmed['totalcost'] ?></td>
                        <td><?= $future_bookings_confirmed['additionalrequests'] ?></td>
                        <td><?= $future_bookings_confirmed['rating'] ?></td>


                        <td><?= $future_bookings_confirmed['confirmation_of_driver'] == 1 ? "Confirmed" : "Cancelled" ?></td>
                        <td><button onclick='openPopup()'>Cancel</button></td>
                        <div class="popup" id="popup" style="color: black;">
                            <form id="delete-form" method="POST" action="/bookings/update?id=<?= $future_bookings_confirmed['bookingid'] ?>">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="bookingid" value="<?= $future_bookings_confirmed['bookingid'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="green">
                                    <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                                </svg>
                                <h2>Confirmation</h2>
                                <p>Are you sure you want to proceed?</p>
                                <button type="submit" name="confirmation_of_driver" onclick="closePopup(); return true;">Confirm</button>
                                <button type="submit" onclick="closePopup()">Cancel</button>
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
                    <th>Booking ID</th>
                    <th>Customer Name</th>
                    <th>Contact Info</th>
                    <th>Email</th>
                    <th>Pick up date</th>
                    <th>Drop off Date</th>
                    <th>Pick up Location</th>
                    <th>Drop off Location</th>
              
                    <th>Payment Status</th>
                    <th>Payment Method</th>
                    <th>Total Cost(Rs.)</th>

                    <th>Additional request</th>
                    <th>Ratings</th>

                    <th>Confirmation</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($future_bookings_cancelleds as $future_bookings_cancelled) : ?>
                    <tr>
                        <td><?= '#' . $future_bookings_cancelled['bookingid'] ?></td>
                        <td><?= $future_bookings_cancelled['customername'] ?></td>
                        <td><?= $future_bookings_cancelled['contactnumber'] ?></td>
                        <td><?= $future_bookings_cancelled['emailaddress'] ?></td>
                        <td><?= $future_bookings_cancelled['pickupdate'] ?></td>
                        <td><?= $future_bookings_cancelled['dropoffdate'] ?></td>
                        <td><?= $future_bookings_cancelled['pickuplocation'] ?></td>
                        <td><?= $future_bookings_cancelled['dropofflocation'] ?></td>
                        <!-- <td><?= $future_bookings_cancelled['rentalduration'] * 24 ?></td> -->
                        <td><?= $future_bookings_cancelled['paymentstatus'] ?></td>
                        <td><?= $future_bookings_cancelled['paymentmethod'] ?></td>
                        <td><?= $future_bookings_cancelled['totalcost'] ?></td>
                        <td><?= $future_bookings_cancelled['additionalrequests'] ?></td>
                        <td><?= $future_bookings_cancelled['rating'] ?></td>


                        <td><?= $future_bookings_cancelled['confirmation_of_driver'] == 1 ? "Confirmed" : "Cancelled" ?></td>
                        <td><button onclick='openPopup()'>Confirm</button></td>
                        <div class="popup" id="popup" style="color: black;">
                            <form id="delete-form" method="POST" action="/bookings/update?id=<?= $future_bookings_cancelled['bookingid'] ?>">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="bookingid" value="<?= $future_bookings_cancelled['bookingid'] ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="green">
                                    <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                                </svg>
                                <h2>Confirmation</h2>
                                <p>Are you sure you want to proceed?</p>

                                <button type="submit" name="confirmation_of_driver" onclick="closePopup(); return true;">Confirm</button>
                                <button type="submit" onclick="closePopup()">Cancel</button>
                            </form>
                        </div>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
<?php require (BASE_PATH.'views/partials/user/toast.php');?>
<?php require base_path('views/partials/rental/js/bookings.php') ?>
<?php require base_path('views/partials/footer.php') ?>