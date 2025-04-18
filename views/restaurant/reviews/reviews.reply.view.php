

<?php require base_path('views/partials/restaurants/styles/details/detail.php') ?>
<?php require base_path('views/partials/restaurants/styles/details/details.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
 <div class="main--content" >

 <?php require base_path('views/partials/restaurants/heading.php') ?>
        
        <div class="form--content" >
     
        <form  method="POST" enctype="multipart/form-data"   action="reply/store">
     
      
                   <div style="display: flex;flex-direction:column">
                    
                   
                    <div class="form-group">
                                          <label for="review">Review:</label><br>
                               <input type="hidden" id="id" name="id" value="<?= $review['reviewid'] ?>">

                                          <input type="varchar" id="review" name="review" min="0" max="100" value="<?= $review['review'] ?>" required disabled>
                                </div>
                                   <div class="form-group">
                                <label for="ratings">Ratings:</label><br>
                                 <input type="email" id="ratings" name="ratings" min="0" max="100" value="<?= $review['ratings'] ?>" required disabled>
                                
                                </div>
                                  
                                
                                   
                         
                               
                         </div>    
                         
                         <div>
                          <div class="form-group">
                                  <label for="reply">Reply:</label><br>
                                  <textarea name="reply" id="reply"><?= isset($review['reply'])? $review['reply']:'' ?></textarea>
                                  
                                  
                                  </div>
                                  
                                  
                                   <div style="display: flex;gap:2rem;justify-content:center">
                                
                                    <button type="submit" class="btn btn-submit" >
                                      Send
                                  </button>
                                  <button type="reset" class="btn btn-cancel">Cancel</button>
                                </div>
                             
                        </div>
                                
                               
                                
                                
                               
                 
                   
              
                              
                                    

          
          
      
   
                 
                    

       
   
     
       
    
     
        
    </form>
        
          </div>
       
           
       
    
    
</div>


</body>
</html>

<?php require base_path('views/partials/restaurants/filejs.php') ?>

<?php require base_path('views/partials/footer.php') ?>
