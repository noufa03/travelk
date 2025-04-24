<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/script.php'); ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>


 
<div style="display: flex;">
<?php require (BASE_PATH.'views/partials/user/sidebar_trav.php'); ?>
 
<div class="table--content">
<h3 style="color: #555;">My  Reviews</h3>
<table>
        <thead>
            <tr>
              
              
                <th>Review</th>
                <th>Ratings</th>
              <th>Reply</th>
              
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($reviews as $review) : ?>
          <tr>
         
          <td> <?= $review['review'] ?></td>
          <td> <?= $review['ratings'] ?>  </td>
              <td> <?= $review['reply'] ?> </td>
  
           
            <td>
            
                 <form  method="POST" action="/review/delete">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="reviewid" value="<?= $review['reviewid'] ?>">
                <button type="submit" class="btn btn-submit" >Remove</button>
               
                 </form>
            </td>
                 
            
  </tr>
          
          <?php endforeach; ?>
          
          
          
          
            <?php foreach ($cuisine_reviews as $cuisine_review) : ?>
          <tr>
     
          <td> <?= $cuisine_review['review'] ?></td>
          <td> <?= $cuisine_review['ratings'] ?>  </td>
              <td> <?= $cuisine_review['reply'] ?> </td>
  
           
            <td>
            
                 <form  method="POST" action="/review/delete">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="cuisine_reviewid" value="<?= $cuisine_review['reviewid'] ?>">
                <button type="submit" class="btn btn-submit" >Remove</button>
               
                 </form>
            </td>
                 
            
  </tr>
          
          <?php endforeach; ?>
           
         
          
          
   
                      
            
            
            
          
        
    
        
  </tbody>
    </table>

</div>
 

</div>
 
 
 
 
 
 
 
<?php require (BASE_PATH.'views/partials/user/foot.php'); ?>
