

<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>

<?php require base_path('views/partials/restaurants/sidebar.php') ?>

 <div class="main--content" >

 <?php require base_path('views/partials/restaurants/heading.php') ?>
 
 <p style="font-size: 18px; color: #555;">
 Menus / Add Menu
</p>
        
        <div class="form--content">
     
        <form  method="POST" enctype="multipart/form-data">
       
      <div class="first--row">
      
                   <div class="first--grp">
                                   <div class="form-group">
                                <label for="cuisine_name">Cuisine Name:</label><br>
                                <input type="text" id="cuisine_name" name="cuisine_name" required>
                                </div>
                             
                                <div class="form-group">
                                <label for="cuisine_type">Cuisine Type:</label><br>
                                  <select id="cuisine_type" name="cuisine_type" required>
                                  <option value="" disabled selected>Select a cuisine</option>
                                  <option value="Italian">Italian</option>
                                  <option value="Chinese">Chinese</option>
                                  <option value="Mexican">Mexican</option>
                                  <option value="Japanese">Japanese</option>
                                  <option value="Indian">Indian</option>
                                  <option value="Thai">Thai</option>
                                  <option value="Greek">Greek</option>
                                  <option value="French">French</option>
                                   <option value="srilankan">Srilankan</option>
                                </select>
                                </div>
                                
                                <div class="form-group">
                                <label for="description">Description:</label><br>
                                <textarea id="description" name="description" rows="4" cols="50"></textarea>
                                </div>
                                
                                 <div class="form-group">
                                  <label>Portion Sizes:</label><br>
                                  <div class="checkbox-group">
                                      <label>
                                          <input type="checkbox" id="size-small" name="sizes[]" value="small" onchange="togglePrice('small')">
                                          Small
                                      </label>
                                      <label>
                                          <input type="checkbox" id="size-medium" name="sizes[]" value="medium" onchange="togglePrice('medium')">
                                          Medium
                                      </label>
                                      <label>
                                          <input type="checkbox" id="size-large" name="sizes[]" value="large" onchange="togglePrice('large')">
                                          Large
                                      </label>
                                    
                                  </div>
                              </div>
                          
                              <div class="form-group">
                                  <label for="price">Price (Rs):</label><br>
                          
                                  <input type="number" id="price_small" class="price-input" name="prices[small]" step="0.01" placeholder="Price for Small">
                                  <input type="number" id="price_medium" class="price-input" name="prices[medium]" step="0.01" placeholder="Price for Medium">
                                  <input type="number" id="price_large" class="price-input" name="prices[large]" step="0.01" placeholder="Price for Large">
                               
                          
                                  <p style="color: red; font-size: smaller;">Mention prices for all the sizes selected</p>
                              </div>
                             

                    </div>
                   
                   <div class="second--grp">
                   
                                    
                                  
                                  <div class="form-group">
                                        <label for="photo">Photos:</label><br>
                                        <div class="upload-box">
                                            <input type="file" id="photo" name="photo[]" accept="image/*" multiple>
                                        </div>
                                        
                                        <ul id="fileList">
                                      <li></li>
                                        
                                        </ul>
                                    </div>

                                   
                   
                   
                   </div>
                 
                    
      
      </div>
       
      <div class="second--row">
        
                <button type="submit" class="btn btn-submit" 
          
          >
              Add Cuisine
          </button>
          <button type="reset" class="btn btn-cancel">Cancel</button>

          
        
      
      </div>
     
       
    
     
        
    </form>
        
          </div>
       
           
       
    
    
</div>


</body>
</html>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/menus_js.php') ?>

<?php require base_path('views/partials/footer.php') ?>
