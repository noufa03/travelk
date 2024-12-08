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

            <form class="mt-8 space-y-6" action="/register_rental" method="POST">

            <?php require base_path('views/partials/signuproutes.php') ?>
                   <div  class="mb-5">
                  
    <div>
        <label for="first_name" class="block text-sm font-medium text-gray-900">First Name</label>
        <input id="first_name" name="first_name" type="text" required
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            placeholder="First Name">
    </div>

    <div>
        <label for="last_name" class="block text-sm font-medium text-gray-900">Last Name</label>
        <input id="last_name" name="last_name" type="text" required
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            placeholder="Last Name">
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
        <input id="email" name="email" type="email" autocomplete="email" required
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            placeholder="Email Address">
    </div>

    <div>
        <label for="phone_number" class="block text-sm font-medium text-gray-900">Phone Number</label>
        <input id="phone_number" name="phone_number" type="text" required
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            placeholder="Phone Number">
    </div>

    <div>
        <label for="address" class="block text-sm font-medium text-gray-900">Address</label>
        <input id="address" name="address" type="text" required
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            placeholder="Full Address">
    </div>

    <div>
        <label for="date_of_birth" class="block text-sm font-medium text-gray-900">Date of Birth</label>
        <input id="date_of_birth" name="date_of_birth" type="date" required
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
    </div>

    <div>
        <label for="gender" class="block text-sm font-medium text-gray-900">Gender</label>
        <select id="gender" name="gender" required
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>

    <div>
        <label for="license_number" class="block text-sm font-medium text-gray-900">License Number</label>
        <input id="license_number" name="license_number" type="number" required
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            placeholder="Driving License Number">
    </div>

    <div>
        <label for="license_issue_date" class="block text-sm font-medium text-gray-900">License Issue Date</label>
        <input id="license_issue_date" name="license_issue_date" type="date" required
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
    </div>

    <div>
        <label for="license_expiry_date" class="block text-sm font-medium text-gray-900">License Expiry Date</label>
        <input id="license_expiry_date" name="license_expiry_date" type="date" required
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
    </div>

    <div>
        <label for="profile_picture" class="block text-sm font-medium text-gray-900">Profile Picture</label>
        <input id="profile_picture" name="profile_picture" type="file"
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
    </div>

    <div>
        <label for="membership_status" class="block text-sm font-medium text-gray-900">Membership Status</label>
        <select id="membership_status" name="membership_status" required
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
    </div>
    
    <div>
        <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
        <input id="password" name="password" type="text" placeholder="password"
            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
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
                    <?php if (isset($errors['license_number'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['license_number'] ?></li>
                    <?php endif; ?>
                </ul>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
