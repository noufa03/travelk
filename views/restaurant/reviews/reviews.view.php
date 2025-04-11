<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>



 <div class="main--content" >

<?php require base_path('views/partials/restaurants/heading.php') ?>

<h3 style="color: #555;">Store Reviews</h3>
<div class="table--content">
<table>
        <thead>
            <tr>
                <th>Review ID</th>
                <th>Customer Profile</th>
                <th>Review</th>
                <th>Ratings</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($reviews as $review) : ?>
          <tr>
          <td><?= "#".$review['reviewid']?> </td>
          <td>
          
          <div  style="display: flex;flex-direction:row;gap:1rem;">
                <img src='<?= $review['profile'] ?>' width="50" height="50">
    
      
                    
                           
                 <p style="color: #555;">  <?=$review['user_name'] ?></p>
           
                        
                                       
                            
                           
                      
                         
                
              </div>
          
          </td>
                
            <td>
            <?= $review['review'] ?>
            
            </td>
       
 
              <td>
              
               <div  style="display: flex;flex-direction:column;gap:1rem;">
                 <?= $review['ratings'] ?>
    
       <p>
                     <?php 
                                                        if (isset($review['ratings'])) {
                                                            $roundedRating = round($review['ratings']);
                                                            for ($i = 1; $i <= 5; $i++) {
                                                                if ($i <= $roundedRating) {
                                                                    echo '<i class="fa-solid fa-star" style="color: gold;"></i> '; 
                                                                } else {
                                                                    echo '<i class="fa-regular fa-star" style="color: gray;"></i> '; 
                                                                }
                                                            }
                                                            echo " (" .'Review '. $review['ratings'] . ")";
                                                        } else {
                                                          for ($i = 1; $i <= 5; $i++) {
                                                              echo '<i class="fa-regular fa-star" style="color: gray;"></i> '; }
                                                        }
                                                    ?>
                     
                     </p>
                    
                           
                
           
                        
                                       
                            
                           
                      
                         
                
              </div>
              
              </td>
              <td><?php  if(!empty($review['reply'])): ?>
              
             <?= $review['reply'] ?>
             <?php else: ?>
               <a href=""><button class="edit">Reply</button></a> 
              
             <?php endif; ?>
             </td>
              <td> <button class="delete">Delete</button> </td>
            <td> <button class="publish">Publish</button> </td>
          
          </tr>
          
          <?php endforeach; ?>
        
  </tbody>
    </table>

</div>


<h3 style="color: #555;">Cuisine Reviews</h3>
<div class="table--content">
<table>
        <thead>
            <tr>
                <th>Cuisine ID</th>
                 <th>Review ID</th>
                <th>Customer Profile</th>
                <th>Review</th>
                <th>Ratings</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($cuisineReviews as $cuisineReview) : ?>
          <tr>
          <td><?= "#".$cuisineReview['cuisineID']?> </td>
            <td><?= "#".$cuisineReview['reviewid']?> </td>
          <td>
          
          <div  style="display: flex;flex-direction:row;gap:1rem;">
                <img src='<?= $cuisineReview['profile'] ?>' width="50" height="50">
    
      
                    
                           
                 <p style="color: #555;">  <?=$cuisineReview['user_name'] ?></p>
           
                        
                                       
                            
                           
                      
                         
                
              </div>
          
          </td>
                
            <td>
            <?= isset($cuisineReview['review'])? $cuisineReview['review']:'no reviews' ?>
            
            </td>
       
 
              <td>
              
               <div  style="display: flex;flex-direction:column;gap:1rem;">
                 <?= $cuisineReview['ratings'] ?>
    
       <p>
                     <?php 
                                                        if (isset($cuisineReview['ratings'])) {
                                                            $roundedRating = round($cuisineReview['ratings']);
                                                            for ($i = 1; $i <= 5; $i++) {
                                                                if ($i <= $roundedRating) {
                                                                    echo '<i class="fa-solid fa-star" style="color: gold;"></i> '; 
                                                                } else {
                                                                    echo '<i class="fa-regular fa-star" style="color: gray;"></i> '; 
                                                                }
                                                            }
                                                            echo " (" .'Review '. $cuisineReview['ratings'] . ")";
                                                        } else {
                                                          for ($i = 1; $i <= 5; $i++) {
                                                              echo '<i class="fa-regular fa-star" style="color: gray;"></i> '; }
                                                        }
                                                    ?>
                     
                     </p>
                    
                           
                
           
                        
                                       
                            
                           
                      
                         
                
              </div>
              
              </td>
              <td><?php  if(!empty($cuisineReview['reply'])): ?>
              
             <?= $cuisineReview['reply'] ?>
             <a href="">  <button class="edit">Edit reply</button></a>
           
             <?php else: ?>
             <a href=""> <button>Reply</button></a>
             
              
             <?php endif; ?>
             </td>
              <td> <button class="delete">Delete</button> </td>
            <td> <button class="publish">Publish</button> </td>
          
          </tr>
          
          <?php endforeach; ?>
        
  </tbody>
    </table>

</div>

   
 

   
 
</div>




<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>
