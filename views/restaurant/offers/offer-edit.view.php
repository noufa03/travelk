

<?php require base_path('views/partials/restaurants/styles/offers/offer-edit.php') ?>

<?php require base_path('views/partials/restaurants/sidebar.php') ?>
 <div class="main--content" >

 <?php require base_path('views/partials/restaurants/heading.php') ?>
        
        <div class="form--content">
     
        <form  method="POST"   action="/offers/update?id=<?= $offers['offer_id'] ?>" enctype="multipart/form-data">
         
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="<?= $offers['offer_id'] ?>">

       
      <div class="first--row">
      
                   <div class="first--grp">
                                   <div class="form-group">
                                <label for="offer_title">Offer Name:</label><br>
                                <input type="text" id="offer_title" name="offer_title"  value="<?= $offers['offer_title']?>" required>
                                </div>
                             
                                <div class="form-group">
                                <label for="cuisine_name">Cuisine name:</label><br>
                          <select id="cuisine_name" name="cuisine_name" required>
                              <?php 
                              $selectedCuisine = isset($cuisine_one['cuisine_name']) ? htmlspecialchars($cuisine_one['cuisine_name']) : 'other';
                              ?>
                              
                              <option value="<?= $selectedCuisine ?>" selected><?= $selectedCuisine ?></option>
                          
                              <?php foreach ($cuisines as $cuisine): ?>
                                  <?php if (htmlspecialchars($cuisine['cuisine_name']) !== $selectedCuisine): ?>
                                      <option value="<?= htmlspecialchars($cuisine['cuisine_name']) ?>">
                                          <?= htmlspecialchars($cuisine['cuisine_name']) ?>
                                      </option>
                                  <?php endif; ?>
                              <?php endforeach; ?>
                          
                              <?php if ($selectedCuisine !== 'other'): ?>
                                  <option value="other">Other</option>
                              <?php endif; ?>
                          </select>



                                </div>
                                
                                <div class="form-group">
                                <label for="offer_description">Description:</label><br>
                                <textarea id="offer_description" name="offer_description" rows="4" cols="50"><?= $offers['offer_description']?></textarea>
                                </div>
                                
                                
                                  <div class="form-group">
                                          <label for="discount_percentage">Discount Percentage:</label><br>
                                          <input type="number" id="discount_percentage" name="discount_percentage" min="0" max="100"  value="<?= $offers['discount_percentage']?>" required>
                                </div>
                                
                    </div>
                   
                   <div class="second--grp">
                   
                                      <div class="form-group">
                                  <label for="start_time">Start time:</label><br>
                                  <input type="datetime-local" id="start_time" name="start_time"   value="<?= $offers['start_time']?>"  required>
                                  </div>
                                      <div class="form-group">
                                  <label for="end_time">End time:</label><br>
                                  <input type="datetime-local" id="end_time" name="end_time" value="<?= $offers['end_time']?>" required>
                                  </div>
                                  
                                 
                                  
                                    
                                       <div class="form-group">
                                  <label for="is_active">Status:</label><br>
                                
                                  <select name="is_active" id="is_active">
                                  <option value="" disabled <?= isset($offers['is_active'])?'selected':'' ?>><?= ($offers['is_active']==1)?'yes':'no'?></option>
                                  <option value="true">yes</option>
                                  <option value="false">no</option>
                                  
                                  </select>
                                  </div>
                                  
                                 
                                    </div>
                                    
                                   

                                  
                                 
                                   
                   
                   
                   </div>
                      <div class="second--row">
        
                <button type="submit" class="btn btn-submit" 
          
          >
              Update Offer
          </button>
          <button type="reset" class="btn btn-cancel"> <a href="/myoffers">Discard Changes</a> </button>

          
        
      
      </div>
                 
                    
      
      </div>
       
   
     
       
    
     
        
    </form>
        
          </div>
       
           
       
    
    
</div>


</body>
</html>

<?php require base_path('views/partials/restaurants/filejs.php') ?>

<?php require base_path('views/partials/footer.php') ?>
