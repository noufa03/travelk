<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>


 <div class="main--content" >

<?php require base_path('views/partials/restaurants/heading.php') ?>

<button  class="btn btn-submit" > <a href="/tables/Add?id=<?= $userid ?>" >+ Add Table</a></button>

<div class="table--content">
<table>
        <thead>
            <tr>
                <th>Table ID</th>
                
                <th>Table Type</th>
                <th>Reservation Type</th>
                <th>Reservation Fee(Rs)</th>
                <th>Availability</th>
          
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tables as $table) : ?>
         <tr>
          <td ><?='#'.$table['tableid'] ?></td>
        
      
          <td ><?= $table['category'] ?></td>
           <td ><?=$table['tablepricetype'] ?></td>
          
          <td ><?=$table['tableprice'] ?></td>  
           <td style="color: <?= ($table['status'] == 1) ? 'green' : 'red' ?>;" ><?= ($table['status'] == 1) ? 'Available' : 'Booked'
 ?></td>  
      
   
          <td>
          

          
          <a href="/tables/edit?id=<?= $table['tableid']  ?>"  class="edit" ><button type="submit" >Edit  </button></a>
        
      
          </td>
          <td >
       

          <div id="delete-form">
          
          <button type="submit" class="delete" onclick="openPopup(<?= $table['tableid'] ?>)">Delete</button>
   
           <div class="popup" id="popup-<?= $table['tableid'] ?>" style="color: black;">
                            <img src="/restaurants/menus/tick.svg" alt="">
                            
                            <?php if ($table['status'] == 1): ?>
                            <h2>Confirm</h2>
                                <form id="delete-form-<?= $table['tableid'] ?>" method="POST" action="/tables/delete">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="tableid" value="<?= $table['tableid'] ?>">
                                    <p>Note that this item will be deleted permanently from your table list. Are you sure?</p>
                                    <button type="submit" class="delete">Delete</button>
                                </form>
                                <button type="reset" onclick="closePopup(<?= $table['tableid'] ?>)" class="delete">Cancel</button>
                            <?php else: ?>
                            <h2>oops!</h2>
                                <h4>The table is already booked. Cannot delete.</h4>
                                <button type="reset" onclick="closePopup(<?= $table['tableid'] ?>)" class="delete">Cancel</button>
                            <?php endif; ?>
                        </div>


                
                
                
              

                        
                        
          </div>
       
          </td>
       
            </tr>
            <?php endforeach; ?>
        
        </tbody>
    </table>
    
   
    
    </span>

</div>

   
 




            
 

       
</div>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>
