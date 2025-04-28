

<?php require base_path("views/partials/rental/styles/main.php"); ?>
<?php require base_path("views/partials/rental/styles/dashboard.php"); ?>
<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/user/sidebar_trav.php'); ?>

<div style="background: #f0f2f5; min-height: 100vh;">
    <!-- Header -->
    <?php require base_path('views/partials/user/header.php') ?>

    <!-- Main Container -->
    <div style="padding: 30px 20px; max-width: 1400px; margin: 0 auto;">
        <!-- Heading -->
        <?php require base_path('views/partials/user/heading.php') ?>
        <?php if (isset($mybookings) && !empty($mybookings)): ?>
            <div class="table--content">
                <table>
                    <thead>
                        <tr>
                            <th>Booking Details</th>
                            <th>Driver Details</th>
                            <th>Vehicle Details</th>
                            <th>Payment Details</th>
                            <th>Confirmation</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($mybookings as $mybooking): ?>
                        <tr>
                            <td>
                                Pickup Date:<?= $mybooking['pickupdate'] ?><br>
                                Pickup Location:<?= $mybooking['pickuplocation'] ?><br>
                                Dropoff Location:<?= $mybooking['dropofflocation'] ?><br>
                                Rental Duration(hours):<?= $mybooking['rentalduration'] ?>

                            </td>
                            <td>
                                <?php if (!empty($mybooking['driverid'])): ?>
                                    Name: <?= $mybooking['name'] ?> <br>
                                    Contact NO: <?= $mybooking['phone_number'] ?>
                                <?php else: ?>
                                    No driver
                                <?php endif; ?>
                            </td>
                            <td>
                                Vehicle Type: <?= strtolower($mybooking['vehicle_type']) ?><br>
                                Vehicle Model: <?= $mybooking['vehicle_model'] ?><br>
                                Number plate: <?= $mybooking['numberplate'] ?>

                            </td>
                            <td>
                                Total Cost: <?= $mybooking['totalcost'] ?>
                            </td>
                            
                            <td>  <?php if($mybooking['bookingcancelled']==0) : ?>
                                
                                <?= ($mybooking['confirmation_of_driver'] == false) ? 'pending' : 'confirmed' ?>
                                <?php endif; ?>
                            </td>
                        <td>
                                <form action="/book/rental/delete" method="POST" >
                                    <input type="hidden" name="bookingid" value="<?= htmlspecialchars($mybooking['bookingid']) ?>">
                                    <input type="hidden" name="driverid" value="<?= htmlspecialchars($mybooking['driverid']) ?>">
                                    <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf_token) ?>"> <!-- CSRF token -->
                                    <?php if($mybooking['bookingcancelled']==1) : ?>
                                    You have cancelled the booking 
                                    <?php else: ?>
                                    <button type="submit" style="padding: 8px 16px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;" onmouseover="this.style.backgroundColor='#218838'" onmouseout="this.style.backgroundColor='#28a745'" aria-label="Cancel booking <?= htmlspecialchars($mybooking['bookingid']) ?>">
                                        Cancel Booking
                                    </button>
                                    <?php endif; ?>
                                </form>
                            </td>


                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>

            </div>
            <?php else: ?>
            <div style="background: linear-gradient(135deg, #f5f7fa, #e4e7eb); min-height: 80vh; font-family: 'Poppins', 'Segoe UI', Arial, sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 20px; text-align: center;">
            <h1 style="font-size: 32px; color: #2d3748; font-weight: 700; margin-bottom: 20px; letter-spacing: 0.5px; line-height: 1.3;">No Bookings Yet</h1>
            <p style="font-size: 18px; color: #4a5568; margin-bottom: 30px; max-width: 500px; line-height: 1.6;">It looks like you haven't made any bookings. Start your journey by booking a vehicle now!</p>
            <a href="/rent" style="display: inline-block; background: linear-gradient(90deg, #48bb78, #38a169); color: #ffffff; padding: 14px 40px; border-radius: 8px; font-size: 1rem; font-weight: 600; text-decoration: none; letter-spacing: 0.5px; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease;"
            onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #38a169, #48bb78)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.2)';"
            onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #48bb78, #38a169)'; this.style.boxShadow='none';">
            Book A Vehicle
            </a>
            <style>
            @media (max-width: 768px) {
                h1 { font-size: 28px; }
                p { font-size: 16px; }
                a { padding: 12px 30px; font-size: 0.95rem; }
            }
            @media (max-width: 480px) {
                h1 { font-size: 24px; }
                p { font-size: 14px; max-width: 90%; }
                a { padding: 10px 25px; width: 100%; max-width: 300px; }
            }
            </style>


            </div>
            <?php endif; ?>

        <!-- Footer -->
        <?php require (BASE_PATH . 'views/partials/user/foot.php'); ?>
    </div>
</div>