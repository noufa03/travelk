<?php require(BASE_PATH . 'views/partials/user/head.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/styles.php'); ?>
<?php require(BASE_PATH . 'views/partials/user/nav.php'); ?>
<br>
<?php require(BASE_PATH . 'views/partials/user/nav-2.php'); ?>

<br>
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

<div class="search-container" style="width: 100%; max-width: 1200px; margin: 0 auto; padding: 20px; background: #fff; border-radius: 10px;">
    <section class="hero" style="text-align: center; padding: 20px;">
        <div class="search-bar" style="padding: 20px; border-radius: 8px;">
            <form method="GET" action="/rent" style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center;">
                <div class="search-inputs" style="display: flex; flex-wrap: wrap; gap: 15px; width: 100%; justify-content: center;">
                    <div class="input-group" style="flex: 1; min-width: 200px;">
                        <label for="location" style="display: block; font-size: 0.9rem; color: #333; margin-bottom: 5px; font-weight: 500;">Pickup Location</label>
                        <input type="text" id="location" name="location" placeholder="Enter pickup location" style="width: 100%; padding: 10px; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; outline: none; background: #fff;">
                    </div>
                    <div class="input-group" style="flex: 1; min-width: 200px;">
                        <label for="vehicle_type" style="display: block; font-size: 0.9rem; color: #333; margin-bottom: 5px; font-weight: 500;">Vehicle Type</label>
                        <select id="vehicle_type" name="vehicle_type" style="width: 100%; padding: 10px; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; outline: none; background: #fff;">
                            <option value="">All Types</option>
                            <option value="car">Car</option>
                            <option value="van">Van</option>
                            <option value="suv">SUV</option>
                            <option value="motorcycle">Motorcycle</option>
                            <option value="tuk">Tuk Tuk</option>
                        </select>
                    </div>
                    <div class="input-group" style="flex: 1; min-width: 200px;">
                        <label for="driver" style="display: block; font-size: 0.9rem; color: #333; margin-bottom: 5px; font-weight: 500;">Driver Option</label>
                        <select id="driver" name="driver" style="width: 100%; padding: 10px; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; outline: none; background: #fff;">
                            <option value="">Select Option</option>
                            <option value="with_driver">With Driver</option>
                            <option value="without_driver">Without Driver</option>
                        </select>
                    </div>
                    <div class="input-group" style="flex: 1; min-width: 200px;">
                        <label for="pickup_date" style="display: block; font-size: 0.9rem; color: #333; margin-bottom: 5px; font-weight: 500;">Pickup Date</label>
                        <input type="date" id="pickup_date" name="pickup_date" style="width: 100%; padding: 10px; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; outline: none; background: #fff;">
                    </div>
                    <div class="input-group" style="flex: 1; min-width: 200px;">
                        <label for="return_date" style="display: block; font-size: 0.9rem; color: #333; margin-bottom: 5px; font-weight: 500;">Return Date</label>
                        <input type="date" id="return_date" name="return_date" style="width: 100%; padding: 10px; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; outline: none; background: #fff;">
                    </div>
                    <button type="submit" class="search-button" style="padding: 10px 20px; background: #4CAF50; color: #fff; border: none; border-radius: 5px; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                        <i class='bx bx-search' style="font-size: 1.2rem;"></i>
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
<br>
<br>
<?php if (!empty($getavailablecars)): ?>
    <div class="driver-cards-container" style="width: 100%; max-width: 1200px; margin: 0 auto; padding: 20px; display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        <?php foreach ($getavailablecars as $vehicle): ?>
            <?php
            $vehicle_name = isset($vehicle['vehicle_model']) ? htmlspecialchars($vehicle['vehicle_model']) : 'Unknown Vehicle';
            $driver_availability = ($vehicle['driver_availability'] == true) ? 'A' : 'N/A';
            $vehicle_type = isset($vehicle['vehicle_type']) ? htmlspecialchars($vehicle['vehicle_type']) : 'Unknown Type';
            $location = isset($vehicle['city']) ? htmlspecialchars($vehicle['city']) : 'Unknown Location';
            $hourlyrate = (isset($vehicle['hourlyrate']) && isset($vehicle['hourlyrate_driver']))
                ? $vehicle['hourlyrate'] + $vehicle['hourlyrate_driver']
                : $vehicle['hourlyrate'];
            ?>
            <div class="driver-card" style="background: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05); width: 100%; max-width: 300px; overflow: hidden;">
                <div class="card-content" style="padding: 15px;">
                    <h3 style="font-size: 1.2rem; color: #333; margin: 0 0 10px;"><?= strtoupper($vehicle_name) ?></h3>
                    <p style="font-size: 0.9rem; color: #666; margin: 5px 0;">Driver: <?= $driver_availability ?></p>
                    <p style="font-size: 0.9rem; color: #666; margin: 5px 0;">Vehicle Type: <?= $vehicle_type ?></p>
                    <p style="font-size: 0.9rem; color: #666; margin: 5px 0;">Location: <?= $location ?></p>
                    <p style="font-size: 0.9rem; color: #666; margin: 5px 0;">Rate per hour: <?= $hourlyrate ?></p>
                    <div style="display: flex; gap: 10px; margin-top: 15px;">
                        <button onclick="openPopup_book(<?= $vehicle['id'] ?>)" style="flex: 1; padding: 10px; background: #4CAF50; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 0.9rem; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                            Book Now
                        </button>
                        <button style="flex: 1; padding: 10px; background: #fff; color: #4CAF50; border: 1px solid #4CAF50; border-radius: 5px; cursor: pointer; font-size: 0.9rem; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                            View Details
                        </button>
                    </div>
                </div>
            </div>


            <div class="popup" id="popup-<?= $vehicle['id'] ?>" style="color: black;">
                <h2>Add Details</h2>

                <form id="booking-form-<?= $vehicle['id'] ?>" method="POST" action="/book/rental" style="width:95%">
                    <input type="hidden" name="vehicleid" value="<?= $vehicle['id'] ?>">
                    <input type="hidden" name="driverid" value="<?= $vehicle['driverid'] ?>">
                    <input type="hidden" name="rateperhour" value="<?= $hourlyrate ?>">

                    <label style="font-size: 0.9rem; color: #333; font-weight: 500;" for="pickupdate">Pick Up Date:</label>
                    <input type="date" id="pickupdate" name="pickupdate" required
                        style="width: 95%; padding: 10px; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; outline: none; background: #fff; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);">


                    <label style="font-size: 0.9rem; color: #333; font-weight: 500;" for="pickuplocation">Pick Up Location:</label>
                    <input type="text" id="pickuplocation" name="pickuplocation" required
                        style="width: 95%; padding: 10px; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; outline: none; background: #fff; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);">

                    <label style="font-size: 0.9rem; color: #333; font-weight: 500;" for="dropofflocation">Drop Off Location:</label>
                    <input type="text" id="dropofflocation" name="dropofflocation" required
                        style="width: 95%; padding: 10px; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; outline: none; background: #fff; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);">

                    <label style="font-size: 0.9rem; color: #333; font-weight: 500;" for="rentalduration">Rental Duration:</label>
                    <div style="display: flex;gap:0.5rem">

                        <input type="time" id="rentaldurationfrom" name="rentaldurationfrom"
                            style=" padding: 10px; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; outline: none; background: #fff; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);">
                        <p>to</p>
                        <input type="time" id="rentaldurationto" name="rentaldurationto"
                            style=" padding: 10px; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; outline: none; background: #fff; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);">
                    </div>
                    <label style="font-size: 0.9rem; color: #333; font-weight: 500;" for="contactnumber">Contact No:</label>
                    <input type="text" id="contactnumber" name="contactnumber" required
                        style="width: 95%; padding: 10px; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; outline: none; background: #fff; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);">


                    <label style="font-size: 0.9rem; color: #333; font-weight: 500;" for="paymentmethod">Payment Method:</label>
                    <select id="paymentmethod" name="paymentmethod"
                        style="width: 95%; padding: 10px; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; outline: none; background: #fff; box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);">
                        <option value="" disabled selected>Select Payment Method</option>
                        <option value="CARD">Card</option>
                        <option value="CASH">Cash</option>
                    </select>


                    <div style="display: flex;gap:1rem">

                        <button type="submit" aria-label="Save booking details"
                            style="margin-top:10px;background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;"
                            onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';"
                            onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                            Book
                        </button>
                        <button type="button" aria-label="Cancel and close popup"
                            style="margin-top:10px;background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;"
                            onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';"
                            onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                            onclick="closePopup_book(<?= $userid ?>)">
                            Cancel
                        </button>
                    </div>

                </form>

            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p style="text-align: center; color: #666; padding: 20px;">No vehicles found matching your criteria.</p>
<?php endif; ?>



<!-- Footer -->
<!-- <footer style="text-align: center; padding: 20px; background: #2f2f2f; color: #fff; font-size: 0.9rem;">
    © 2024 traveLK. All rights reserved.
</footer> -->

<script>
    function openPopup_book($id) {
        var popup = document.getElementById('popup-' + $id); // Get the unique popup
        popup.classList.add("open-popup"); // Add class to show the popup
    }

    function closePopup_book($id) {
        var popup = document.getElementById('popup-' + $id); // Get the unique popup
        popup.classList.remove("open-popup"); // Remove class to hide the popup
        window.location.href = "/rent"; // Redirect to the tables page
    }
</script>
<?php require(BASE_PATH . 'views/partials/user/foot.php'); ?>