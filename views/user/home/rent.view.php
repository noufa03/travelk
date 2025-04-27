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

<br><br>
<div class="container">
    <?php if (!empty($allcars)): ?>
        <div class="places-container">
            <?php foreach ($allcars as $allcar): ?>
                <div class="place-card">


                    <div class="place-details">
                        <!-- <a href="/resturent?id=<?= urlencode($allcar['locationid']) ?>"> -->
                        <h3><?= htmlspecialchars($allcar['vehicle_type']) ?></h3>
                        <p>MODEL: <?= htmlspecialchars($allcar['vehicle_model']) ?></p>
                        <p class="price">Rate per hour:(Rs) <?= (($allcar['hourlyrate_driver']) == NULL) ? $allcar['hourlyrate']  : $allcar['hourlyrate'] + $allcar['hourlyrate_driver']  ?></p>
                        <p class="rating">Driver:<?= (($allcar['driverid']) == NULL) ? 'N/A' : 'AVAILABLE' ?></p>
                        <!-- <p class="price">Rs. <?= htmlspecialchars($allcar['price']) ?> night</p>  -->
                        <div style="display: flex; gap: 10px; margin-top: 15px;">
                            <button onclick="openPopup_book(<?= $allcar['id'] ?>)" style="flex: 1; padding: 10px; background: #4CAF50; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 0.9rem; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                                Book Now
                            </button>

                        </div>
                        </a>
                    </div>
                </div>

                <div class="popup" id="popup-<?= $allcar['id'] ?>" style="color: black;">
                    <h2>Add Details</h2>
                    <?php if ($userid == NULL): ?>
                     <a href="/login" role="button" aria-label="Go to login page"
                       style="margin-top:10px;margin-right:10px;background:linear-gradient(90deg, #76c07d, #60a56a);color:#ffffff;padding:12px 24px;border-radius:8px;border:none;font-size:14px;font-weight:500;cursor:pointer;text-decoration:none;display:inline-block;transition:transform 0.2s ease, background 0.3s ease;"
                       onmouseover="this.style.transform='scale(1.05)';this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';"
                       onmouseout="this.style.transform='scale(1)';this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                       Already have an account? Login
                    </a>
                    <a href="/register" role="button" aria-label="Go to registration page"
                       style="margin-top:10px;background:linear-gradient(90deg, #76c07d, #60a56a);color:#ffffff;padding:12px 24px;border-radius:8px;border:none;font-size:14px;font-weight:500;cursor:pointer;text-decoration:none;display:inline-block;transition:transform 0.2s ease, background 0.3s ease;"
                       onmouseover="this.style.transform='scale(1.05)';this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';"
                       onmouseout="this.style.transform='scale(1)';this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                       Create an Account
                    </a>
                    <?php else: ?>
                        <form id="booking-form-<?= $allcar['id'] ?>" method="POST" action="/book/rental" style="width:95%">
                            <input type="hidden" name="vehicleid" value="<?= $allcar['id'] ?>">
                            <input type="hidden" name="driverid" value="<?= $allcar['driverid'] ?>">
                            <input type="hidden" name="rateperhour" value="<?= (isset($allcar['hourlyrate_driver'])) ? $allcar['hourlyrate'] + $allcar['hourlyrate_driver'] : $allcar['hourlyrate'] ?>">


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
                                    onclick="closePopup_book(<?= $allcar['id'] ?>)">
                                    Cancel
                                </button>
                            </div>

                        </form>
                    <?php endif; ?>
                </div>

            <?php endforeach; ?>
        </div>

    <?php endif; ?>
</div>






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