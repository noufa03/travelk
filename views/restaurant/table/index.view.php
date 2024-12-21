<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-4">
    <div>
      <h1 class="text-lg font-semibold text-gray-900">My Tables</h1>
      <p class="text-sm text-gray-500">
        A list of all the tables in your account including their name, price, categories.
      </p>
    </div>
    <button class="px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none">
     
            <a href="/tables/create">Add A table</a>
    </button>
  </div>
        <ul>
        
            <?php foreach ($tables as $table) : ?>
            
                <div class="p-6 bg-white rounded-lg shadow">


  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Table ID</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Name</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Price</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Category</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-700"></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <tr>
          <td class="px-6 py-4 text-sm text-gray-900"><?=$table['tableid'] ?></td>
          <td class="px-6 py-4 text-sm text-gray-500"><?=$table['tablename'] ?></td>
          <td class="px-6 py-4 text-sm text-gray-500"><?=$table['tableprice'] ?></td>
          <td class="px-6 py-4 text-sm text-gray-500"><?=$table['category'] ?></td>
          <td class="px-6 py-4 text-sm">
            <a href="/table/edit" class="text-purple-600 hover:underline">Edit</a>
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
