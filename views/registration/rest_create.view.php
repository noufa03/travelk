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

            <form class="mt-8 space-y-6" action="/register_rest" method="POST" enctype="multipart/form-data"  >

            <?php require base_path('views/partials/signuproutes.php') ?>
            <div class="mb-5">
                    <div>
                        <label for="businessType" class="block text-sm font-medium text-gray-900">Business Type</label>
                        <input id="businessType" name="businessType" type="text" autocomplete="businessType" required
                               class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="Business Type">
                    </div>

                    <div>
                        <label for="hot_line" class="block text-sm font-medium text-gray-900">hot_line</label>
                        <input id="hot_line" name="hot_line" type="text" autocomplete="current-hot_line" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="hot_line">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900">email</label>
                        <input id="email" name="email" type="email" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="email">
                    </div>
                    
                  
                    <div>
                        <label for="operatingHours" class="block text-sm font-medium text-gray-900">operatingHours</label>
                        <input id="operatingHours" name="operatingHours" type="text" autocomplete="current-operatingHours" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="operatingHours">
                    </div>
                    <div>
                        <label for="specialOffers" class="block text-sm font-medium text-gray-900">specialOffers</label>
                        <input id="specialOffers" name="specialOffers" type="text" autocomplete="current-specialOffers" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="specialOffers">
                    </div>
                    <div>
                        <label for="seatingCapacity" class="block text-sm font-medium text-gray-900">seatingCapacity</label>
                        <input id="seatingCapacity" name="seatingCapacity" type="textapacity" autocomplete="current-seatingCapacity" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="seatingCapacity">
                    </div>
                    <div>
                        <label for="deliveryOptions" class="block text-sm font-medium text-gray-900">deliveryOptions</label>
                        <input id="deliveryOptions" name="deliveryOptions" type="text" autocomplete="current-deliveryOptions" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="deliveryOptions">
                    </div>
                    <div>
                        <label for="paymentMethods" class="block text-sm font-medium text-gray-900">paymentMethods</label>
                        <input id="paymentMethods" name="paymentMethods" type="text" autocomplete="current-paymentMethods" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="paymentMethods">
                    </div>
                    <div>
                    <label for="logo" class="block text-sm font-medium text-gray-900">Logo</label>
                     <input id="logo" name="logo" type="file" autocomplete="off" 
                                     class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                 placeholder="Upload your logo">

                    </div>
                    <div>
                        <label for="businessRegNo" class="block text-sm font-medium text-gray-900">businessRegNo</label>
                        <input id="businessRegNo" name="businessRegNo" type="number" autocomplete="current-businessRegNo" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="businessRegNo">
                    </div>
                    <div>
                        <label for="licensingInfo" class="block text-sm font-medium text-gray-900">licensingInfo</label>
                        <input id="licensingInfo" name="licensingInfo" type="text" autocomplete="current-licensingInfo" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="licensingInfo">
                    </div>
                    <div>
                        <label for="ownerName" class="block text-sm font-medium text-gray-900">ownerName</label>
                        <input id="ownerName" name="ownerName" type="text" autocomplete="current-ownerName" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="ownerName">
                    </div>
                    <div>
                        <label for="emergencyContact" class="block text-sm font-medium text-gray-900">emergencyContact</label>
                        <input id="emergencyContact" name="emergencyContact" type="number" autocomplete="current-emergencyContact" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="emergencyContact">
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                        <input id="password" name="password" type="text" autocomplete="current-password" required
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
