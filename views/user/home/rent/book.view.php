<?php require base_path("views/partials/rental/styles/main.php"); ?>
<?php require base_path("views/partials/rental/styles/dashboard.php"); ?>
<?php require base_path("views/partials/rental/styles/notify.php"); ?>
<?php require (BASE_PATH.'views/partials/user/sidebar_trav.php'); ?>

<div style="background: linear-gradient(135deg, #f5f7fa, #e4e7eb); min-height: 100vh; font-family: 'Poppins', 'Segoe UI', Arial, sans-serif; padding: 40px 20px;">
    <p style="font-size: 24px; color: #2d3748; font-weight: 600; margin: 0 0 30px 20px; letter-spacing: 0.5px;">
        Booking Details
    </p>
    <?php if(isset($mybookings) && !empty($mybookings)): ?>
    <div style="padding: 40px; max-width: 1400px; margin: 0 auto; background: #ffffff; border-radius: 16px; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);">
        <form method="POST" enctype="multipart/form-data" action="/book/rental/delete">
         <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="bookingid" value="<?= $mybookings['bookingid'] ?>" >
            <div class="first--row" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px;">
                <!-- Driver Details -->
                <div class="form-group">
                    <h1 style="font-size: 20px; color: #2d3748; font-weight: 600; margin-bottom: 20px;">Driver Details</h1>
                    <label for="name" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin-bottom: 8px;">Driver Name:</label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($drivers_details['name'] ?? 'N/A') ?>" disabled
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #f7fafc; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <style>
                        #name:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['name'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['name'] ?></li>
                    <?php endif; ?>

                    <label for="phone_number" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin: 12px 0 8px;">Driver Contact:</label>
                    <input type="tel" id="phone_number" name="phone_number" value="<?= htmlspecialchars($drivers_details['phone_number'] ?? 'N/A') ?>" disabled
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #f7fafc; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <style>
                        #phone_number:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['phone_number'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['phone_number'] ?></li>
                    <?php endif; ?>

                    <label style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin: 12px 0 8px;">Driver Confirmation:</label>
                    <input type="text" id="confirmation_of_driver" name="confirmation_of_driver" value="<?= ($mybookings['confirmation_of_driver'] == true) ? 'YES' : 'NO' ?>" disabled
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #f7fafc; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <?php if (isset($errors['confirmation_of_driver'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['confirmation_of_driver'] ?></li>
                    <?php endif; ?>

                    <label for="rating" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin: 12px 0 8px;">Rating (0-5):</label>
                    <select id="rating" name="rating"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #ffffff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                        <option value="0" <?= (($mybookings['rating'] ?? '') === '0') ? 'selected' : '' ?>>0</option>
                        <option value="1" <?= (($mybookings['rating'] ?? '') === '1') ? 'selected' : '' ?>>1</option>
                        <option value="2" <?= (($mybookings['rating'] ?? '') === '2') ? 'selected' : '' ?>>2</option>
                        <option value="3" <?= (($mybookings['rating'] ?? '') === '3') ? 'selected' : '' ?>>3</option>
                        <option value="4" <?= (($mybookings['rating'] ?? '') === '4') ? 'selected' : '' ?>>4</option>
                        <option value="5" <?= (($mybookings['rating'] ?? '') === '5') ? 'selected' : '' ?>>5</option>
                    </select>
                    <style>
                        #rating:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['rating'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['rating'] ?></li>
                    <?php endif; ?>
                </div>

                <!-- Vehicle Details -->
                <div class="form-group">
                    <h1 style="font-size: 20px; color: #2d3748; font-weight: 600; margin-bottom: 20px;">Vehicle Details</h1>
                    <label for="carid" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin-bottom: 8px;">Vehicle Type:</label>
                    <select id="carid" name="carid"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #ffffff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                        <option value="" disabled selected>Select a car</option>
                        <option value="car" <?= ($mybookings['vehicle_type'] == 'CAR') ? 'selected' : '' ?>>Car</option>
                        <option value="van" <?= ($mybookings['vehicle_type'] == 'VAN') ? 'selected' : '' ?>>Van</option>
                        <option value="suv" <?= ($mybookings['vehicle_type'] == 'SUV') ? 'selected' : '' ?>>SUV</option>
                        <option value="motorcycle" <?= ($mybookings['vehicle_type'] == 'MOTORCYCLE') ? 'selected' : '' ?>>Motorcycle</option>
                        <option value="tuk" <?= ($mybookings['vehicle_type'] == 'TUK TUK') ? 'selected' : '' ?>>Tuk Tuk</option>
                    </select>
                    <style>
                        #carid:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['carid'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['carid'] ?></li>
                    <?php endif; ?>

                    <label for="numberplate" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin: 12px 0 8px;">Number Plate:</label>
                    <input type="text" id="numberplate" name="numberplate" value="<?= htmlspecialchars($mybookings['numberplate'] ?? '') ?>" pattern="[A-Za-z0-9]+" disabled
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #ffffff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <style>
                        #numberplate:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['numberplate'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['numberplate'] ?></li>
                    <?php endif; ?>
                </div>


                <!-- Trip Details -->
                <div class="form-group">
                    <h1 style="font-size: 20px; color: #2d3748; font-weight: 600; margin-bottom: 20px;">Trip Details</h1>
                    <label for="pickupdate" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin-bottom: 8px;">Pick Up Date:</label>
                    <input type="date" id="pickupdate" name="pickupdate" value="<?= htmlspecialchars($mybookings['pickupdate'] ?? '') ?>"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #ffffff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <style>
                        #pickupdate:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['pickupdate'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['pickupdate'] ?></li>
                    <?php endif; ?>

                    <label for="pickuplocation" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin: 12px 0 8px;">Pick Up Location:</label>
                    <input type="text" id="pickuplocation" name="pickuplocation" value="<?= htmlspecialchars($mybookings['pickuplocation'] ?? '') ?>"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #ffffff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <style>
                        #pickuplocation:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['pickuplocation'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['pickuplocation'] ?></li>
                    <?php endif; ?>

                    <label for="dropofflocation" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin: 12px 0 8px;">Drop Off Location:</label>
                    <input type="text" id="dropofflocation" name="dropofflocation" value="<?= htmlspecialchars($mybookings['dropofflocation'] ?? '') ?>"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #ffffff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <style>
                        #dropofflocation:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['dropofflocation'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['dropofflocation'] ?></li>
                    <?php endif; ?>

                    <label for="rentalduration" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin: 12px 0 8px;">Rental Duration (hours):</label>
                    <input type="number" id="rentalduration" name="rentalduration" value="<?= htmlspecialchars($mybookings['rentalduration'] ?? '') ?>" min="1"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #ffffff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <style>
                        #rentalduration:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['rentalduration'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['rentalduration'] ?></li>
                    <?php endif; ?>

                    <label for="pickuptime" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin: 12px 0 8px;">Pick Up Time:</label>
                    <input type="time" id="pickuptime" name="pickuptime" value="<?= htmlspecialchars($mybookings['pickuptime'] ?? '') ?>"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #ffffff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <style>
                        #pickuptime:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['pickuptime'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['pickuptime'] ?></li>
                    <?php endif; ?>

                    <label style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin: 12px 0 8px;">Ride Completed:</label>
                    <input type="text" id="ridecompleted" name="ridecompleted" value="<?= ($mybookings['ridecompleted'] == 'true') ? 'YES' : 'NO' ?>" disabled
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #f7fafc; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <?php if (isset($errors['ridecompleted'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['ridecompleted'] ?></li>
                    <?php endif; ?>
                </div>
                  <!-- Payment Details -->
                <div class="form-group">
                    <h1 style="font-size: 20px; color: #2d3748; font-weight: 600; margin-bottom: 20px;">Payment Details</h1>
                    <label for="paymentstatus" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin-bottom: 8px;">Payment Status:</label>
                    <input type="text" id="paymentstatus" name="paymentstatus" value="<?= htmlspecialchars($mybookings['paymentstatus'] ?? '') ?>" disabled
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #f7fafc; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <style>
                        #paymentstatus:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['paymentstatus'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['paymentstatus'] ?></li>
                    <?php endif; ?>

                    <label for="paymentmethod" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin: 12px 0 8px;">Payment Method:</label>
                    <select id="paymentmethod" name="paymentmethod"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #ffffff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                        <option value="" disabled selected>Select method</option>
                        <option value="CARD" <?= (($mybookings['paymentmethod'] ?? '') === 'CARD') ? 'selected' : '' ?>>Card</option>
                        <option value="CASH" <?= (($mybookings['paymentmethod'] ?? '') === 'CASH') ? 'selected' : '' ?>>Cash</option>
                        <option value="ONLINE" <?= (($mybookings['paymentmethod'] ?? '') === 'ONLINE') ? 'selected' : '' ?>>Online</option>
                    </select>
                    <style>
                        #paymentmethod:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['paymentmethod'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['paymentmethod'] ?></li>
                    <?php endif; ?>

                    <label for="totalcost" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin: 12px 0 8px;">Total Cost (RS):</label>
                    <input type="number" id="totalcost" name="totalcost" value="<?= htmlspecialchars($mybookings['totalcost'] ?? '') ?>" step="0.01" min="0" disabled
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #f7fafc; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <style>
                        #totalcost:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['totalcost'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['totalcost'] ?></li>
                    <?php endif; ?>
                </div>
            </div>
            <br>
                <!-- Contact Info -->
                <div class="form-group">
                    <h1 style="font-size: 20px; color: #2d3748; font-weight: 600; margin-bottom: 20px;">My Contact Info</h1>
                    <label for="contactnumber" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin-bottom: 8px;">Contact Number:</label>
                    <input type="tel" id="contactnumber" name="contactnumber" value="<?= htmlspecialchars($mybookings['contactnumber'] ?? '') ?>" pattern="[0-9]{10}"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #ffffff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <style>
                        #contactnumber:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['contactnumber'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['contactnumber'] ?></li>
                    <?php endif; ?>

                    <label for="emailaddress" style="font-size: 0.95rem; color: #4a5568; font-weight: 500; display: block; margin: 12px 0 8px;">Email Address:</label>
                    <input type="email" id="emailaddress" name="emailaddress" value="<?= htmlspecialchars($mybookings['emailaddress'] ?? $user['email'] ?? '') ?>"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 1rem; color: #4a5568; background: #ffffff; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); transition: border-color 0.3s ease, box-shadow 0.3s ease;">
                    <style>
                        #emailaddress:focus { border-color: #48bb78; box-shadow: 0 0 8px rgba(72, 187, 120, 0.3); }
                    </style>
                    <?php if (isset($errors['emailaddress'])) : ?>
                        <li class="error-text" style="color: #e53e3e; font-size: 0.85rem; margin-top: 6px;"><?= $errors['emailaddress'] ?></li>
                    <?php endif; ?>
                </div>
  <!-- Button Row -->
            <div class="second--row" style="margin-top: 40px; display: flex; gap: 20px; justify-content: flex-start;">
                <button type="submit" class="btn btn-submit" 
                    style="background: linear-gradient(90deg, #48bb78, #38a169); color: #ffffff; padding: 14px 40px; border-radius: 8px; border: none; font-size: 1rem; font-weight: 600; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease, box-shadow 0.3s ease; letter-spacing: 0.5px;"
                    onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #38a169, #48bb78)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.2)';"
                    onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #48bb78, #38a169)'; this.style.boxShadow='none';">
                    Cancel Booking
                </button>
                
            </div>

            <!-- Responsive Styles -->
            <style>
                @media (max-width: 768px) {
                    .first--row {
                        grid-template-columns: 1fr;
                    }
                    .second--row {
                        flex-direction: column;
                        align-items: stretch;
                    }
                    .btn-submit {
                        width: 100%;
                        padding: 14px;
                    }
                }
                @media (max-width: 480px) {
                    .form-group h1 {
                        font-size: 18px;
                    }
                    input, select {
                        font-size: 0.95rem;
                        padding: 10px;
                    }
                }
            </style>
        </form>
    </div>
 <?php else: ?>
<div style="background: linear-gradient(135deg, #f5f7fa, #e4e7eb); min-height: 100vh; font-family: 'Poppins', 'Segoe UI', Arial, sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 20px; text-align: center;">
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
</div>