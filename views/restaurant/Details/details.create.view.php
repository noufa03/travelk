<?php require base_path('views/partials/head.php') ?>


<main>
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                     alt="Your Company">
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Add details</h2>
            </div>

            <form class="mt-8 space-y-6" action="/details_rest" method="POST" enctype="multipart/form-data"  >

            <div class="mb-5">
                   

                    <div>
                        <label for="hot_line" class="block text-sm font-medium text-gray-900">hot_line</label>
                        <input id="hot_line" name="hot_line" type="text" autocomplete="current-hot_line" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="hot_line">
                    </div>
                    
                    
                    
                  
                    <div>
                        <label for="operatingHours" class="block text-sm font-medium text-gray-900">operatingHours</label>
                        <input id="operatingHours" name="operatingHours" type="text" autocomplete="current-operatingHours" required
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="operatingHours">
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
                        <label for="images" class="block text-sm font-medium text-gray-900">images</label>
                        <input id="images" name="images" type="varchar" autocomplete="current-images" 
                               class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                               placeholder="images">
                    </div>
                  
                  
                </div>
              

                <div>
                    <button type="submit"
                            class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    > Submit
                    </button>
                </div>
            
                <h2 class="mt-6 text-center text-1xl font-semibold text-red-800">These are the details customers can view</h2>


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
