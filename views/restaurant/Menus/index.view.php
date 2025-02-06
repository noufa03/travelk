<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>


 <div class="main--content" >

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
            <td ><?='#'.$cuisine['cuisineID'] ?></td>
          <td ><?=$cuisine['cuisine_name'] ?></td>
          <td ><?=$cuisine['description'] ?></td>
          <td ><?=$cuisine['cuisine_type'] ?></td>
          <td ><?=$cuisine['price'] ?></td>
          <td ><?= isset($cuisine['photo'])?$cuisine['cuisine_name']." "."pic":'Not Set' ?></td>
          <td >
        
          <a href="/menu/edit?id=<?= $cuisine['cuisineID']  ?>"  class="edit" >   <button >Edit   </button></a>
       
      
          </td>
          <td >
          <div id="delete-form">
          
             <button type="submit" class="delete" onclick="openPopup()">Delete</button>
                               <div class="popup" id="popup" style="color: black;">
                        <img src="/restaurants/menus/tick.svg" alt="">
                        <h2>Confirm</h2>
                        <form id="delete-form" method="POST" action="/menu/delete">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="cuisineID" value="<?= $cuisine['cuisineID']  ?>">
                          <p>Note that this item will be deleted permanently from your menu list. Are you sure? </p>
                   
                             <button type="submit" class="delete" >Delete</button>
                        </form>
                        <button type="reset" onclick="cancelPopup()" class="delete">Cancel</button>
                        </div>
          </div>
             
         
       
          </td>
       
            </tr>
            <?php endforeach; ?>
        
        </tbody>
    </table>
    
  

</div>

   
 




            
 

       
</div>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>
