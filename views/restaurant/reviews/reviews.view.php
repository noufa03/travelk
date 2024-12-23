<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/banner.php') ?>
<?php require base_path('views/partials/sidebar_rest.php') ?>
<main>



    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div>
      <h1 class="text-lg font-semibold text-gray-900">My reviews</h1>
      <p class="text-sm text-gray-500">
        A list of all the reviews.
      </p>
    </div>
    <div class="flex justify-between items-center mb-4">
 

</div >
        <ul class="mb-10">
            <?php foreach ($reviews as $review) : ?>
            
                <div class="p-6 bg-white rounded-lg shadow">


  <div class="overflow-x-auto ">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-100">
    
  
        <tr>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Review ID</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Review</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Ratings</th>
     
          
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <tr>
          <td class="px-6 py-4 text-sm text-gray-900"><?=$review['reviewID'] ?></td>
          <td class="px-6 py-4 text-sm text-gray-500"><?=$review['review'] ?></td>
     
 <td class="px-6 py-4 text-sm text-gray-500"> 
 

 <div class="flex items-center">
    <?php for ($i = 0; $i < $review['rating']; $i++): ?>
        <svg class="w-4 h-4 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
        </svg>
    <?php endfor; ?>
</div>




 </td>


          
          
          
          <td class="px-6 py-4 text-sm">
          
          <td class="px-6 py-4 text-sm">
            <a href="/table/edit" class="text-purple-600 hover:underline">Reply</a>
          </td>
          <td class="px-6 py-4 text-sm">
            <a href="/table/delete" class="text-purple-600 hover:underline">Delete</a>
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
