<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php'); ?>
<?php require (BASE_PATH.'views/partials/user/nav.php'); ?>

<main class="register-page">
    <div class="register-containerform">
        <div class="register-header">
            <h2 class="register-title">Register for a New Account</h2>
        </div>
        <form class="register-form" action="/register_hotel" method="POST">
            <!-- Star Rating -->
            <div class="form-group">
                <label class="form-label" for="star_rating">Star Rating</label>
                <select class="form-select" id="star_rating" name="star_rating" required>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input class="form-input" id="email" name="email" type="email" required placeholder="Email address">
            </div>

            <!-- Number of Rooms -->
            <div class="form-group">
                <label class="form-label" for="no_rooms">Number of Rooms</label>
                <input class="form-input" id="no_rooms" name="no_rooms" type="number" required placeholder="Number of Rooms">
            </div>

            <!-- Amenities -->
            <div class="form-group">
                <label class="form-label" for="amenities">Amenities</label>
                <textarea class="form-textarea" id="amenities" name="amenities" rows="4" required placeholder="Amenities provided"></textarea>
            </div>

            <!-- Payment Methods -->
            <div class="form-group">
                <label class="form-label">Payment Methods</label>
                <div class="checkbox-group">
                    <label>
                        <input name="payment_credit" type="checkbox">
                        <span>Credit</span>
                    </label>
                    <label>
                        <input name="payment_debit" type="checkbox">
                        <span>Debit</span>
                    </label>
                    <label>
                        <input name="payment_cash" type="checkbox">
                        <span>Cash</span>
                    </label>
                </div>
            </div>

            <!-- Check-In -->
            <div class="form-group">
                <label class="form-label" for="checkIn">Check-In</label>
                <input class="form-input" id="checkIn" name="checkIn" type="time" required>
            </div>

            <!-- Check-Out -->
            <div class="form-group">
                <label class="form-label" for="checkOut">Check-Out</label>
                <input class="form-input" id="checkOut" name="checkOut" type="time" required>
            </div>

            <!-- Logo Upload -->
            <div class="form-group">
                <label class="form-label" for="logo">Logo</label>
                <input class="form-input file-input" id="logo" name="logo" type="file">
            </div>

            <!-- Business Registration Number -->
            <div class="form-group">
                <label class="form-label" for="business_reg_num">Business Registration Number</label>
                <input class="form-input" id="business_reg_num" name="business_reg_num" type="text" required placeholder="Business Registration Number">
            </div>

            <!-- Licensing Information -->
            <div class="form-group">
                <label class="form-label" for="licensing_info">Licensing Information</label>
                <textarea class="form-textarea" id="licensing_info" name="licensing_info" rows="4" required placeholder="Licensing Information"></textarea>
            </div>

            <!-- Owner Name -->
            <div class="form-group">
                <label class="form-label" for="owner_name">Owner Name</label>
                <input class="form-input" id="owner_name" name="owner_name" type="text" required placeholder="Owner Name">
            </div>

            <!-- Owner Contact -->
            <div class="form-group">
                <label class="form-label" for="owner_contact">Owner Contact</label>
                <input class="form-input" id="owner_contact" name="owner_contact" type="tel" required placeholder="Owner Contact">
            </div>

            <!-- Booking Confirmation -->
            <div class="form-group">
                <label>
                    <input name="booking_confirmation" type="checkbox">
                    <span>Booking Confirmation</span>
                </label>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input class="form-input" id="password" name="password" type="password" autocomplete="current-password" required placeholder="Password">
            </div>

            <!-- Location -->
            <div class="form-group">
                <label class="form-label" for="locationID">Location</label>
                <select class="form-select" id="locationID" name="locationID" required>
                    <option value="1">Location 1</option>
                    <option value="2">Location 2</option>
                    <option value="3">Location 3</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="form-actions">
                <button class="register-button" type="submit">Register</button>
            </div>

            <!-- Error Messages -->
            <ul class="error-messages">
                <?php if (isset($errors['email'])) : ?>
                    <li class="error-item"><?= $errors['email'] ?></li>
                <?php endif; ?>
                <?php if (isset($errors['password'])) : ?>
                    <li class="error-item"><?= $errors['password'] ?></li>
                <?php endif; ?>
            </ul>
        </form>
    </div>
</main>

<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>
