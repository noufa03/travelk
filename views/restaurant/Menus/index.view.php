<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>


 <div class="main--content" >
 <?php require base_path('views/partials/restaurants/header.php') ?>
<?php require base_path('views/partials/restaurants/heading.php') ?>



<div class="table--content">
<table>
        <thead>
            <tr>
                <th>Cuisine ID</th>
                <th>Cuisine Name</th>
                <th>Description</th>
                <th>Cuisine Type</th>
                <th>Price</th>
                <th>Photo</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($cuisines as $cuisine) : ?>
            <tr>
            <td ><?=$cuisine['cuisineID'] ?></td>
          <td ><?=$cuisine['cuisine_name'] ?></td>
          <td ><?=$cuisine['description'] ?></td>
          <td ><?=$cuisine['cuisine_type'] ?></td>
          <td ><?=$cuisine['price'] ?></td>
          <td ><a href=#><?=$cuisine['photo'] ?></a></td>
          <td >
       
          <a href="/menu/edit?id=<?= $cuisine['cuisineID']  ?>"  class="edit" >   <button >Edit   </button></a>
       
      
          </td>
          <td >
              <form id="delete-form" method="POST" action="/menu/delete">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="cuisineID" value="<?= $cuisine['cuisineID']  ?>">
                <button type="submit" class="delete">Delete</button>
            </form>
       
          </td>
       
            </tr>
            <?php endforeach; ?>
        
        </tbody>
    </table>

</div>

   
 




            
 

       
</div>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>
