<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/banner.php') ?>
<?php require base_path('views/partials/sidebar_rest.php') ?>






<div class="p-4 sm:ml-64 mr-60">
   <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
      <div class="grid grid-cols-6 gap-4 mb-4">
      <a href="/tables?id=<?= $userid?>">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <img
        class="w-10 h-10 object-cover ml-5 mt-5"
        src="/dashboard_photos/table.png"
        alt="Card Image"
      />
      <div class="p-4">
        <h2 class="text-lg font-bold text-gray-800">Total tables</h2>
        <p class="text-gray-600">
          <?= htmlspecialchars($totalTables) ?>
        </p>
      </div>
    </div>
  </a>
         <!-- <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div> -->
         <a href="/mymenus?id=<?= $userid?>">
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
  <a href="/myreviews?id=<?= $userid ?>">
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
    

  
  <a href="/profile?id=<?= $userid?>">
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
  <a href="/myoffers?id=<?= $userid?>">
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
   
   <a href="/myreviews?id=<?= $userid?>">
    <div class="bg-white rounded-lg shadow-md overflow-hidden p-2">
       
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Ratings Summary</p>
        <img
        class="w-10 h-10 object-cover ml-5 mt-5"
        src="/dashboard_photos/star.png"
        alt="Card Image"
      />
        <div class="flex items-center mt-4">
            <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">5 star</a>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width: <?=($fivestar/$totalnoofratings)*100?>%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?=  htmlspecialchars((($fivestar/$totalnoofratings)*100)."%") ?></span>
        </div>
        <div class="flex items-center mt-4">
            <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">4 star</a>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width: <?=($fourstar/$totalnoofratings)*100?>%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?=  htmlspecialchars((($fourstar/$totalnoofratings)*100)."%") ?></span>
        </div>
        <div class="flex items-center mt-4">
            <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">3 star</a>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width:<?=($threestar/$totalnoofratings)*100?>%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?=  htmlspecialchars((($threestar/$totalnoofratings)*100)."%") ?></span>
        </div>
        <div class="flex items-center mt-4">
            <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">2 star</a>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width:<?=($twostar/$totalnoofratings)*100?>%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?=  htmlspecialchars((($twostar/$totalnoofratings)*100)."%") ?></span>
        </div>
        <div class="flex items-center mt-4">
            <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-500 hover:underline">1 star</a>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width:<?=($onestar/$totalnoofratings)*100?>%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?=  htmlspecialchars((($onestar/$totalnoofratings)*100)."%") ?></span>
        </div>
     
    </div>
    
  
</a>


<?php require base_path('views/partials/footer.php') ?>








