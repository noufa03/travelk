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
               <td> 
              <?php if($review['status'] !='flagged'):?>
                <?php if($review['status'] != 'published'): ?>
                  <button class="publish"  onclick="openPopup(<?= $review['reviewid'] ?>)">Publish</button>
                   <div class="popup" id="popup-<?= $review['reviewid'] ?>" style="color: black;">
                       <br>
                                   <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="grey"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
                                        <h2>Publish</h2>
                                          <form action="/myreviews_rest/updatepublishstore?id=<?php echo $review['reviewid']?>" method="POST" enctype="multipart/form-data" >
               
                           
                                               
                                                <input type="hidden" name="reviewid" value="<?= $review['reviewid'] ?>">
                                                <p>By clicking publish you will publish this review </p>
                                                <button type="submit" class="delete" style="background-color: #555;">
                                                   <?php if($review['status']=='published'):?>
                                                   Unpublish
                                                    <input type="hidden" name="status" value="<?= $review['status'] ?>">
                                                     <?php else: ?>
                                                    Publish
                                                     <input type="hidden" name="status" value="<?= $review['status'] ?>">
                                                 <?php endif; ?>
                                                </button>
                                            </form>
                                            <button style="background-color: #555;color:white" onclick="closePopup_review(<?= $review['reviewid'] ?>)" >Cancel</button>
                                        
                         </div>
                  <?php endif; ?>
            
            <?php endif; ?>
            </td>

            <td>
             <?php if($review['status'] !='flagged'  && $review['status'] !='published' ):?>
             
            <button type="submit" class="publish" onclick="openPopup(<?= $review['reviewee_type_id'] ?>)"  style="background-color: #555;">
           
         
            <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#e8eaed"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
            Flag as inappropriate
          
            </button>
              <?php endif; ?>
          
            </td>
         
          
          
   
                       <div class="popup" id="popup-<?= $review['reviewee_type_id'] ?>" style="color: black;">
                       <br>
                                   <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="grey"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
                                        <h2>Flag inappropriate</h2>
                                          <form action="/myreviews_rest/updateflagstore?id=<?php echo $review['reviewee_type_id']?>" method="POST" enctype="multipart/form-data" >
               
                           
                                               
                                                <input type="hidden" name="reviewee_type_id" value="<?= $review['reviewee_type_id'] ?>">
                                                <input type="hidden" name="reviewid" value="<?= $review['reviewid'] ?>">
                                                <p>By clicking yes you will flag the review inappropriate</p>
                                                <button type="submit" class="delete" style="background-color: #555;">
                                                   <?php if($review['status']=='flagged'):?>
                                                   Unflag
                                                    <input type="hidden" name="status" value="<?= $review['status'] ?>">
                                                     <?php else: ?>
                                                    Flag
                                                     <input type="hidden" name="status" value="<?= $review['status'] ?>">
                                                 <?php endif; ?>
                                                </button>
                                            </form>
                                            <button style="background-color: #555;color:white" onclick="closePopup_review(<?= $review['reviewee_type_id'] ?>)" >Cancel</button>
                                        
                         </div>
            
            
                            
                            
                            
                          
            
                                    
                                    
                    
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
          
            <td> 
              <?php if($cuisineReview['status'] !='flagged'):?>
                <?php if($cuisineReview['status'] != 'published'): ?>
                  <button class="publish"  onclick="openPopup(<?= $cuisineReview['reviewid'] ?>)">Publish</button>
                   <div class="popup" id="popup-<?= $cuisineReview['reviewid'] ?>" style="color: black;">
                       <br>
                                   <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="grey"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
                                        <h2>Publish</h2>
                                          <form action="/myreviews_rest/updatepublish?id=<?php echo $cuisineReview['reviewid']?>" method="POST" enctype="multipart/form-data" >
               
                           
                                               
                                                <input type="hidden" name="reviewid" value="<?= $cuisineReview['reviewid'] ?>">
                                                <p>By clicking publish you will publish this review </p>
                                                <button type="submit" class="delete" style="background-color: #555;">
                                                   <?php if($cuisineReview['status']=='published'):?>
                                                   Unpublish
                                                    <input type="hidden" name="status" value="<?= $cuisineReview['status'] ?>">
                                                     <?php else: ?>
                                                    Publish
                                                     <input type="hidden" name="status" value="<?= $cuisineReview['status'] ?>">
                                                 <?php endif; ?>
                                                </button>
                                            </form>
                                            <button style="background-color: #555;color:white" onclick="closePopup_review(<?= $cuisineReview['reviewid'] ?>)" >Cancel</button>
                                        
                         </div>
                  <?php endif; ?>
            
            <?php endif; ?>
            </td>

            <td>
             <?php if($cuisineReview['status'] !='flagged'  && $cuisineReview['status'] !='published' ):?>
             
            <button type="submit" class="publish" onclick="openPopup(<?= $cuisineReview['cuisineID'] ?>)"  style="background-color: #555;">
           
         
            <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#e8eaed"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
            Flag as inappropriate
          
            </button>
              <?php endif; ?>
          
            </td>
         
          
          
   
                       <div class="popup" id="popup-<?= $cuisineReview['cuisineID'] ?>" style="color: black;">
                       <br>
                                   <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="grey"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
                                        <h2>Flag inappropriate</h2>
                                          <form action="/myreviews_rest/updateflag?id=<?php echo $cuisineReview['cuisineID']?>" method="POST" enctype="multipart/form-data" >
               
                           
                                               
                                                <input type="hidden" name="cuisineID" value="<?= $cuisineReview['cuisineID'] ?>">
                                                 <input type="hidden" name="reviewid" value="<?= $cuisineReview['reviewid'] ?>">
                                                <p>By clicking yes you will flag the review inappropriate</p>
                                                <button type="submit" class="delete" style="background-color: #555;">
                                                   <?php if($cuisineReview['status']=='flagged'):?>
                                                   Unflag
                                                    <input type="hidden" name="status" value="<?= $cuisineReview['status'] ?>">
                                                     <?php else: ?>
                                                    Flag
                                                     <input type="hidden" name="status" value="<?= $cuisineReview['status'] ?>">
                                                 <?php endif; ?>
                                                </button>
                                            </form>
                                            <button style="background-color: #555;color:white" onclick="closePopup_review(<?= $cuisineReview['cuisineID'] ?>)" >Cancel</button>
                                        
                         </div>
            
            
                            
                            
                            
                          
            
                                    
                                    
                    
          </tr>
          
          <?php endforeach; ?>
        
  </tbody>
    </table>

</div>



          <h3 style="color: #555;">Flagged Reviews</h3>
             <div class="table--content">
                    <table>
                      <thead>
                        <tr>
                            
                             <th>Review ID</th>
                             <th>Review</th>
                             <th></th>
                            
                        </tr>
                      
                      </thead>
                    <tbody>
                    <tr>
                    <?php foreach($FlaggedReviews as $FlaggedReview): ?>
                     <td><?= "#".$FlaggedReview['reviewid']?> </td>
                       <td>
                      <?= isset($FlaggedReview['review'])? $FlaggedReview['review']:'no reviews' ?>
                      
                      </td>
                      <td>
                       <button type="submit" class="publish" onclick="openPopup(<?= $FlaggedReview['cuisineID'] ?>)"  style="background-color: #555;">
                      <?php if($FlaggedReview['status'] =='flagged'):?>
                   
                      <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#e8eaed"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
                      Unflag
                      <?php endif; ?>
                      </button>
                      
                      </td>
                    <?php endforeach;  ?>
                    
                    </tr>
                    <tr>
                    <?php foreach($FlaggedStoreReviews as $FlaggedStoreReview): ?>
                     <td><?= "#".$FlaggedStoreReview['reviewid']?> </td>
                       <td>
                      <?= isset($FlaggedStoreReview['review'])? $FlaggedStoreReview['review']:'no reviews' ?>
                      
                      </td>
                      <td>
                       <button type="submit" class="publish" onclick="openPopup(<?= $FlaggedStoreReview['reviewee_type_id'] ?>)"  style="background-color: #555;">
                      <?php if($FlaggedStoreReview['status'] =='flagged'):?>
                   
                      <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#e8eaed"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
                      Unflag
                      <?php endif; ?>
                      </button>
                      
                      </td>
                    <?php endforeach;  ?>
                    
                    </tr>
                    
                    
                    </tbody>
                    
                    </table>
             </div>
             
             
             
          <h3 style="color: #555;">Published Reviews</h3>
             <div class="table--content">
                    <table>
                      <thead>
                        <tr>
                            
                             <th>Review ID</th>
                             <th>Review</th>
                             <th></th>
                            
                        </tr>
                      
                      </thead>
                    <tbody>
                    <tr>
                    <?php foreach($PublishedReviews as $PublishedReview): ?>
                     <td><?= "#".$PublishedReview['reviewid']?> </td>
                       <td>
                      <?= isset($PublishedReview['review'])? $PublishedReview['review']:'no reviews' ?>
                      
                      </td>
                      <td>
                      <?php if($PublishedReview['status'] =='published'):?>
                       <button type="submit" class="publish" onclick="openPopup(<?= $PublishedReview['reviewid'] ?>)"  style="background-color: #555;">
                      
                   
                      <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#e8eaed"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
                      Unpublished
                     
                      </button>
                        <div class="popup" id="popup-<?= $PublishedReview['reviewid'] ?>" style="color: black;">
                       <br>
                                   <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="grey"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
                                        <h2>Publish</h2>
                                          <form action="/myreviews_rest/updatepublish?id=<?php echo $PublishedReview['reviewid']?>" method="POST" enctype="multipart/form-data" >
               
                           
                                               
                                                <input type="hidden" name="reviewid" value="<?= $PublishedReview['reviewid'] ?>">
                                                <p>By clicking unpublish you will unpublish this review </p>
                                                <button type="submit" class="delete" style="background-color: #555;">
                                                   <?php if($PublishedReview['status']=='published'):?>
                                                   Unpublish
                                                    <input type="hidden" name="status" value="<?= $PublishedReview['status'] ?>">
                                                     <?php else: ?>
                                                    Publish
                                                     <input type="hidden" name="status" value="<?= $PublishedReview['status'] ?>">
                                                 <?php endif; ?>
                                                </button>
                                            </form>
                                            <button style="background-color: #555;color:white" onclick="closePopup_review(<?= $PublishedReview['reviewid'] ?>)" >Cancel</button>
                                        
                         </div>
                       <?php endif; ?>
                      </td>
                      
                           
                    
                    </tr>
                    <?php endforeach;  ?>
                    
                      <tr>
                    <?php foreach($PublishedStoreReviews as $PublishedStoreReview): ?>
                     <td><?= "#".$PublishedStoreReview['reviewid']?> </td>
                       <td>
                      <?= isset($PublishedStoreReview['review'])? $PublishedStoreReview['review']:'no reviews' ?>
                      
                      </td>
                      <td>
                      <?php if($PublishedStoreReview['status'] =='published'):?>
                       <button type="submit" class="publish" onclick="openPopup(<?= $PublishedStoreReview['reviewid'] ?>)"  style="background-color: #555;">
                      
                   
                      <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 -960 960 960" width="15px" fill="#e8eaed"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
                      Unpublished
                     
                      </button>
                        <div class="popup" id="popup-<?= $PublishedStoreReview['reviewid'] ?>" style="color: black;">
                       <br>
                                   <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="grey"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
                                        <h2>Publish</h2>
                                          <form action="/myreviews_rest/updatepublishstore?id=<?php echo $PublishedStoreReview['reviewid']?>" method="POST" enctype="multipart/form-data" >
               
                           
                                               
                                                <input type="hidden" name="reviewid" value="<?= $PublishedStoreReview['reviewid'] ?>">
                                                <p>By clicking unpublish you will unpublish this review </p>
                                                <button type="submit" class="delete" style="background-color: #555;">
                                                   <?php if($PublishedStoreReview['status']=='published'):?>
                                                   Unpublish
                                                    <input type="hidden" name="status" value="<?= $PublishedStoreReview['status'] ?>">
                                                     <?php else: ?>
                                                    Publish
                                                     <input type="hidden" name="status" value="<?= $PublishedStoreReview['status'] ?>">
                                                 <?php endif; ?>
                                                </button>
                                            </form>
                                            <button style="background-color: #555;color:white" onclick="closePopup_review(<?= $PublishedStoreReview['reviewid'] ?>)" >Cancel</button>
                                        
                         </div>
                       <?php endif; ?>
                      </td>
                      
                           
                    
                    </tr>
                    <?php endforeach;  ?>
                    </tbody>
                    
                    </table>
             </div>
 

 

   
 
</div>




<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>
