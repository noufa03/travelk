<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>


 <div class="main--content" >

<?php require base_path('views/partials/restaurants/heading.php') ?>

<button  class="btn btn-submit" > <a href="/tables/Add?id=<?= $userid ?>" >+ Add Table</a></button>

<div class="table--content">
<table>
        <thead>
            <tr>
                <th>Table ID</th>
                <th>Table Name</th>
             
                <th>Table Type</th>
                <th>Reservation Type</th>
                <th>Reservation Fee</th>
                <th>Availability</th>
          
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tables as $table) : ?>
         <tr>
          <td ><?='#'.$table['tableid'] ?></td>
          <td ><?=$table['tablename'] ?></td>
      
          <td ><?= $table['category'] ?></td>
           <td ><?=$table['tablepricetype'] ?></td>
          
          <td ><?=$table['tableprice'] ?></td>  
           <td ><?= ($table['status'] == 1) ? 'yes' : 'no'
 ?></td>  
      
   
          <td>
          

          
          <a href="/tables/edit?id=<?= $table['tableid']  ?>"  class="edit" ><button type="submit" >Edit  </button></a>
        
      
          </td>
          <td >
           <form id="delete-form" method="POST" action="/tables/delete">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="tableid" value="<?= $table['tableid'] ?>">
                <button type="submit" class="delete">Delete</button>
            </form>

       
       
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
