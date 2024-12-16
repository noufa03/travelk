<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main>
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                     alt="Your Company">
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Register for a new
                    account</h2>
            </div>

            <form class="mt-8 space-y-6" action="/register_hotel" method="POST">

            <?php require base_path('views/partials/signuproutes.php') ?>
                    <div class="mb-5">
                                   
                    <!-- Star Rating -->
                    <div>
                      <label for="star_rating" class="block text-sm font-medium text-gray-900">Star Rating</label>
                      <select id="star_rating" name="star_rating" required
                              class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                      </select>
                    </div>
                
                    <!-- Email -->
                    <div>
                      <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                      <input id="email" name="email" type="email" required
                             class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                             placeholder="Email address">
                    </div>
                
                    <!-- Number of Rooms -->
                    <div>
                      <label for="no_rooms" class="block text-sm font-medium text-gray-900">Number of Rooms</label>
                      <input id="no_rooms" name="no_rooms" type="number" required
                             class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                             placeholder="Number of Rooms">
                    </div>
                
                    <!-- Amenities -->
                    <div>
                      <label for="amenities" class="block text-sm font-medium text-gray-900">Amenities</label>
                      <textarea id="amenities" name="amenities" rows="4" required
                                class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Amenities provided"></textarea>
                    </div>
                
                    <!-- Payment Methods -->
                    <div>
                      <label class="block text-sm font-medium text-gray-900">Payment Methods</label>
                      <div class="flex items-center space-x-4 mt-2">
                        <label class="flex items-center">
                          <input name="payment_credit" type="checkbox"
                                 class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                          <span class="ml-2 text-sm text-gray-700">Credit</span>
                        </label>
                        <label class="flex items-center">
                          <input name="payment_debit" type="checkbox"
                                 class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                          <span class="ml-2 text-sm text-gray-700">Debit</span>
                        </label>
                        <label class="flex items-center">
                          <input name="payment_cash" type="checkbox"
                                 class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                          <span class="ml-2 text-sm text-gray-700">Cash</span>
                        </label>
                      </div>
                    </div>
                
                    <!-- Check-In Date -->
                    <div>
                      <label for="checkIn" class="block text-sm font-medium text-gray-900">Check-In</label>
                      <input id="checkIn" name="checkIn" type="time" required
                             class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                
                    <!-- Check-Out Date -->
                    <div>
                      <label for="checkOut" class="block text-sm font-medium text-gray-900">Check-Out</label>
                      <input id="checkOut" name="checkOut" type="time" required
                             class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                
                    <!-- Logo Upload -->
                    <div>
                      <label for="logo" class="block text-sm font-medium text-gray-900">Logo</label>
                      <input id="logo" name="logo" type="file"
                             class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                
                    <!-- Business Registration Number -->
                    <div>
                      <label for="business_reg_num" class="block text-sm font-medium text-gray-900">Business Registration Number</label>
                      <input id="business_reg_num" name="business_reg_num" type="text" required
                             class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                             placeholder="Business Registration Number">
                    </div>
                
                    <!-- Licensing Information -->
                    <div>
                      <label for="licensing_info" class="block text-sm font-medium text-gray-900">Licensing Information</label>
                      <textarea id="licensing_info" name="licensing_info" rows="4" required
                                class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                placeholder="Licensing Information"></textarea>
                    </div>
                
                    <!-- Owner Name -->
                    <div>
                      <label for="owner_name" class="block text-sm font-medium text-gray-900">Owner Name</label>
                      <input id="owner_name" name="owner_name" type="text" required
                             class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                             placeholder="Owner Name">
                    </div>
                
                    <!-- Owner Contact -->
                    <div>
                      <label for="owner_contact" class="block text-sm font-medium text-gray-900">Owner Contact</label>
                      <input id="owner_contact" name="owner_contact" type="tel" required
                             class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                             placeholder="Owner Contact">
                    </div>
                
                    <!-- Booking Confirmation -->
                    <div>
                    <label class="flex items-center">
                          <input name="booking_confirmation" type="checkbox"
                                 class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                          <span class="ml-2 text-sm text-gray-700">Booking Confirmation </span>
                        </label>
                    </div>
                
                    <!-- Password -->
                    <div>
                      <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                      <input id="password" name="password" type="password" autocomplete="current-password" required
                             class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                             placeholder="Password">
                    </div>
                
                    <!-- Location ID (Dropdown) -->
                    <div>
                      <label for="locationID" class="block text-sm font-medium text-gray-900">Location</label>
                      <select id="locationID" name="locationID" required
                              class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <!-- Example options, replace with actual location data -->
                        <option value="1">Location 1</option>
                        <option value="2">Location 2</option>
                        <option value="3">Location 3</option>
                      </select>
                    </div>
            
                      
                    </div>
              

                <div>
                    <button type="submit"
                            class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Register
                    </button>
                </div>

                <ul>
                    <?php if (isset($errors['email'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></li>
                    <?php endif; ?>

                    <?php if (isset($errors['password'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></li>
                    <?php endif; ?>
                </ul>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
