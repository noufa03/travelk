

<?php require base_path('views/partials/restaurants/styles/menus/edit.php') ?>





<?php require base_path('views/partials/restaurants/sidebar.php') ?>

 <div class="main--content" >
 
 <?php require base_path('views/partials/restaurants/heading.php') ?>
        
        <div class="form--content">
     
        <form action="/menu/update?id=<?php echo $cuisine['cuisineID']?>" method="POST" enctype="multipart/form-data" >
        
       
      <div class="first--row">
      
                   <div class="first--grp">
                                   <div class="form-group">
                                <label for="cuisine_name">Cuisine Name:</label><br>
                                <input type="text" id="cuisine_name" name="cuisine_name" value="<?= $cuisine['cuisine_name'] ?>" required>
                                </div>
                             
                                <div class="form-group">
                                <label for="cuisine_type">Cuisine Type:</label><br>
                                <input type="text" id="cuisine_type" name="cuisine_type" value="<?= $cuisine['cuisine_type'] ?>">
                                </div>
                                
                                <div class="form-group">
                                <label for="description">Description:</label><br>
                                <textarea id="description" name="description" rows="4" cols="50"><?= $cuisine['description'] ?></textarea>
                                </div>
                                
                                 <div class="form-group">
                                  <label for="available">Availability:</label><br>
                                  <input type="text" id="available" name="available" step="0.01"  value="<?= ($cuisine['available']==1)?'yes':'no' ?>" required>
                                  </div>
                                
                                    <div class="form-group">
                                  <label>Portion Sizes:</label><br>
                                  <div class="checkbox-group">
                                  
                                  
                                <label>
                                <input type="checkbox" id="size-small" name="sizes[]" value="small" 
                                    onchange="togglePrice('small')" 
                                    <?= ($cuisinesize_small_size == 'small') ? 'checked' : null ?>>

                                        Small
                                      </label>
                                      
                                      <label>
                                          <input type="checkbox" id="size-medium" name="sizes[]" value="medium" onchange="togglePrice('medium')"
                                             <?= ($cuisinesize_medium_size == 'medium') ? 'checked' : null ?>>
                                          
                                          
                                          Medium
                                      </label>
                                      <label>
                                          <input type="checkbox" id="size-large" name="sizes[]" value="large" onchange="togglePrice('large')"
                                          
                                             <?= ($cuisinesize_large_size == 'large') ? 'checked' : null ?>>
                                          Large
                                      </label>
                                    
                                  </div>
                              </div>
                          
                              <div class="form-group">
                                  <label for="price">Price (Rs):</label><br>
                          
                                  <input type="number" id="price_small" class="price-input" name="prices[small]" step="0.01" placeholder="Price for Small" value="<?= $cuisinesize_small_price?>" >
                                  <input type="number" id="price_medium" class="price-input" name="prices[medium]" step="0.01" placeholder="Price for Medium" value="<?= $cuisinesize_medium_price?>" >
                                  <input type="number" id="price_large" class="price-input" name="prices[large]" step="0.01" placeholder="Price for Large" value="<?= $cuisinesize_large_price?>" >
                               
                          
                                  <p style="color: red; font-size: smaller;">Mention prices for all the sizes selected</p>
                              </div>
                             
                                

                              
                              
                           
                          
                         
                    </div>
                   
                   <div class="second--grp">
                        
                                
                                  
                                  
                                  
                                  
                                    <div class="form-group">
                                  <label for="photo">Photo:</label><br>
                                   <div class="upload-box">
                         <?php if (isset($cuisine['photo']) && !empty($cuisine['photo'])): ?>
                         
                           <input type="file" id="photo" name="photo" accept="image/*">
                         
                               
                            <img src="/<?= htmlspecialchars($cuisine['photo']) ?>" alt="Photo" width="250px" height="180px" >
                            <input type="hidden"  name="photo"  id="photo" value="<?=$cuisine['photo']?>"  >
                          
                          
                            
                            
                         
                        <?php else: ?>
                            <p>Not Set Yet</p>
                              <input type="file" id="photo" name="photo" accept="image/*">
                            <button class="btn btn-submit">Add Image</button>
                        <?php endif; ?>
                        
                                                      
                                    
                                   </div>
                                    </div>
                   
                   
                   </div>
                 
                    
      
      </div>
       
      <div class="second--row">
        
            <button type="submit" class="btn btn-submit">Update Cuisine</button>
              <button type="reset" class="btn btn-cancel"><a href="/mymenus">Discard Changes</a></button>
        
      
      </div>
     
       
    
        
         
        
    </form>
        
          </div>
       
           
       
    
    
</div>


</body>
</html>
<?php require base_path('views/partials/restaurants/js/menus_js.php') ?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>

<?php require base_path('views/partials/footer.php') ?>








