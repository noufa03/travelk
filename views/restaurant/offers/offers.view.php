<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/banner.php') ?>

<main>

<form class="max-w-md mx-auto mt-10">   
    <label for="default-search" class="mb-2 text-sm font-medium text-white-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="offer title..." required />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div>
      <h1 class="text-lg font-semibold text-gray-900">My Offers</h1>
      <p class="text-sm text-gray-500">
        A list of all the offers in your account .
      </p>
    </div>
    <div class="flex justify-between items-center mb-4">
 
 <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none">
 +
         <a href="/myoffers/add">Add Offers</a>
 </button>
</div >
        <ul class="mb-10">
            <?php foreach ($dailyoffers as $dailyoffer) : ?>
            
                <div class="p-6 bg-white rounded-lg shadow">


  <div class="overflow-x-auto ">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-100">
    
  
        <tr>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Offer ID</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">offer Title</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Description</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Start Time</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">End Time</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Discount Percentage</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Status</th>
          
          
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <tr>
          <td class="px-6 py-4 text-sm text-gray-900"><?=$dailyoffer['offer_id'] ?></td>
          <td class="px-6 py-4 text-sm text-gray-500"><?=$dailyoffer['offer_title'] ?></td>
          <td class="px-6 py-4 text-sm text-gray-500"><?=$dailyoffer['offer_description'] ?></td>
          <td class="px-6 py-4 text-sm text-gray-500"><?=$dailyoffer['start_time'] ?></td>
          <td class="px-6 py-4 text-sm text-gray-500"><?=$dailyoffer['end_time'] ?></td>
          <td class="px-6 py-4 text-sm text-gray-500"><?=$dailyoffer['discount_percentage'] ?></td>
          <td class="px-6 py-4 text-sm text-gray-500"><?=isset($dailyoffer['is_active'])? 'active':'inactive' ?></td>
          
          
          
          <td class="px-6 py-4 text-sm">
          
          <td class="px-6 py-4 text-sm">
            <a href="/offers/edit?id=<?= $dailyoffer['offer_id']  ?>" class="text-purple-600 hover:underline">Edit</a>
          </td>
          <td class="px-6 py-4 text-sm">
            <a href="/offers/delete?id=<?= $dailyoffer['offer_id']  ?>" class="text-purple-600 hover:underline">Delete</a>
          </td>
        </tr>
       
      
      </tbody>
    </table>
  </div>
</div>



            <?php endforeach; ?>
        </ul>

       
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
