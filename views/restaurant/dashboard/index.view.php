<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/banner.php') ?>
<?php require base_path('views/partials/sidebar_rest.php') ?>






<div class="p-4 sm:ml-64 mr-60">
   <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
      <div class="grid grid-cols-6 gap-4 mb-4">
         <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <a href="/mymenus?id=<?= $resid ?>">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img
        class="w-10 h-10 object-cover ml-5 mt-5"
        src="/dashboard_photos/menus.png"
        alt="Card Image"
      />
      <div class="p-4">
        <h2 class="text-lg font-bold text-gray-800">Total Menus</h2>
        <p class="text-gray-600">
          <?= htmlspecialchars($totalMenus) ?>
        </p>
      </div>
    </div>
  </a>
  <a href="/mymenus?id=<?= $userid ?>">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img
        class="w-10 h-10 object-cover ml-5 mt-5"
        src="/dashboard_photos/review.png"
        alt="Card Image"
      />
      <div class="p-4">
        <h2 class="text-lg font-bold text-gray-800">Total reviews</h2>
        <p class="text-gray-600">
          <?= htmlspecialchars($totalreviews) ?>
        </p>
      </div>
    </div>
  </a>
    

  
  <a href="/profile?id=<?= $resid ?>">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img
        class="w-10 h-10 object-cover ml-5 mt-5"
        src="/dashboard_photos/open.png"
        alt="Card Image"
      />
      <div class="p-4">
        <h2 class="text-lg font-bold text-gray-800">Opennig Hours</h2>
        <p class="text-gray-600">
          <?= htmlspecialchars($operatingHours) ?>
        </p>
      </div>
    </div>
  </a>
  <a href="/myoffers?id=<?= $resid ?>">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img
        class="w-10 h-10 object-cover ml-5 mt-5"
        src="/dashboard_photos/offers.png"
        alt="Card Image"
      />
      <div class="p-4">
        <h2 class="text-lg font-bold text-gray-800">Specail Offers</h2>
        <p class="text-gray-600">
          <?= isset($specailOffers[0]['specialOffers'])? $specailOffers[0]['specialOffers'] :" Nothing Here"; ?>
        </p>
      </div>
    </div>
  </a>
        
         <!-- <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div> -->
      </div>
      <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-white-800">
         <p class="text-2xl text-gray-400 dark:text-gray-500">
         <h3 class="text-lg font-bold mr-2 ml-0">Daily Offers</h3>
         
  <?php foreach ($dailyoffers as $dailyoffer) : ?>
    <a href="/myoffers?id=<?= htmlspecialchars($resid) ?>" class="flex bg-white rounded-lg shadow-lg overflow-hidden w-64 min-w-64">
      <img
        class="w-20 h-20 object-cover m-4"
        src="/dashboard_photos/offers.png"
        alt="Card Image"
      />
      <div class="p-4 mr-3 ">
        <h2 class="text-gray-800 font-bold text-base mb-2"><?= htmlspecialchars($dailyoffer['offer_title']) ?></h2>
        <p class="text-gray-600 text-sm"><?= htmlspecialchars($dailyoffer['offer_description'] ?? '') ?></p>
      </div>
    </a>
  <?php endforeach; ?>
         </p>
      </div>
   

         
      <!-- <div class="grid grid-cols-2 gap-4">
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
      </div>
   </div> -->
   
   <a href="/profile?id=<?= $resid ?>">
    <div class="bg-white rounded-lg shadow-md overflow-hidden p-2">
        <div class="flex items-center mb-2 ">
            <svg class="w-6 h-6 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
            </svg>
            <svg class="w-6 h-6 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
            </svg>
            <svg class="w-6 h-6 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
            </svg>
            <svg class="w-6 h-6 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
            </svg>
            <svg class="w-6 h-6 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
            </svg>
            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">4.95</p>
            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of</p>
            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
        </div>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">1,745 global ratings</p>
        <div class="flex items-center mt-4">
            <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">5 star</a>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width: <?php echo "($fivestar/$totalnoofratings)*100%)"?>"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?=  htmlspecialchars((($fivestar/$totalnoofratings)*100)."%") ?></span>
        </div>
        <div class="flex items-center mt-4">
            <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">4 star</a>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width: 17%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">17%</span>
        </div>
        <div class="flex items-center mt-4">
            <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">3 star</a>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width: 8%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8%</span>
        </div>
        <div class="flex items-center mt-4">
            <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">2 star</a>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width: 4%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">4%</span>
        </div>
        <div class="flex items-center mt-4">
            <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">1 star</a>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width: 1%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">1%</span>
        </div>
    </div>
</a>


<?php require base_path('views/partials/footer.php') ?>








