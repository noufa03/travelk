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

            <form class="mt-8 space-y-6" action="/register_admin" method="POST">

            <?php require base_path('views/partials/signuproutes.php') ?>
             <div class="mb-5">
                <div>
                <label for="first_name" class="block text-sm font-medium text-gray-900">First Name</label>
                <input id="first_name" name="first_name" type="text" required
                 class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                     placeholder="First Name">
                </div>
                
                <!-- Last Name -->
                <div >
                  <label for="last_name" class="block text-sm font-medium text-gray-900">Last Name</label>
                  <input id="last_name" name="last_name" type="text" required
                         class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                         placeholder="Last Name">
                </div>
            
                <!-- NIC -->
                <div >
                  <label for="NIC" class="block text-sm font-medium text-gray-900">NIC</label>
                  <input id="NIC" name="NIC" type="text" required
                         class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                         placeholder="NIC">
                </div>
            
                <!-- LinkedIn -->
                <div >
                  <label for="linkedin" class="block text-sm font-medium text-gray-900">LinkedIn Profile</label>
                  <input id="linkedin" name="linkedin" type="url"
                         class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                         placeholder="LinkedIn URL">
                </div>
            
                <!-- Address -->
                <div >
                  <label for="address" class="block text-sm font-medium text-gray-900">Address</label>
                  <input id="address" name="address" type="text" required
                         class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                         placeholder="Address">
                </div>
            
                <!-- DOB -->
                <div >
                  <label for="dob" class="block text-sm font-medium text-gray-900">Date of Birth</label>
                  <input id="dob" name="dob" type="date" required
                         class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            
                <!-- Contact Number -->
                <div >
                  <label for="con_num" class="block text-sm font-medium text-gray-900">Contact Number</label>
                  <input id="con_num" name="con_num" type="tel" required
                         class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                         placeholder="Contact Number">
                </div>
            
                <!-- Languages -->
                <div >
                  <label class="block text-sm font-medium text-gray-900">Languages Spoken</label>
                  <div class="flex items-center space-x-4 mt-2">
                    <label class="flex items-center">
                      <input name="language_eng" type="checkbox"
                             class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                      <span class="ml-2 text-sm text-gray-700">English</span>
                    </label>
                    <label class="flex items-center">
                      <input name="language_sin" type="checkbox"
                             class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                      <span class="ml-2 text-sm text-gray-700">Sinhala</span>
                    </label>
                    <label class="flex items-center">
                      <input name="language_tam" type="checkbox"
                             class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                      <span class="ml-2 text-sm text-gray-700">Tamil</span>
                    </label>
                  
                  </div>
                </div>
            
                <!-- CV Upload -->
                <div >
                  <label for="cv" class="block text-sm font-medium text-gray-900">Upload CV</label>
                  <input id="cv" name="cv" type="file"
                         class="block w-full border-gray-300 rounded-md px-3 py-2 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

   
            
                    <div>
                    <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required
                               class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="Email address">
                    </div>

                    <div>
                    <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="Password">
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
