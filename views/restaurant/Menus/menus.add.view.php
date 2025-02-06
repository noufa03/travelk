


<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>

 <div class="main--content" >

 <?php require base_path('views/partials/restaurants/heading.php') ?>
        
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
                                </select>
                                </div>
                                
                                <div class="form-group">
                                <label for="description">Description:</label><br>
                                <textarea id="description" name="description" rows="4" cols="50"></textarea>
                                </div>
                                
                    </div>
                   
                   <div class="second--grp">
                   
                                      <div class="form-group">
                                  <label for="price">Price:</label><br>
                                  <input type="number" id="price" name="price" step="0.01" required>
                                  </div>
                                  
                                    <div class="form-group">
                                  <label for="photo">Photo:</label><br>
                                   <div class="upload-box">
                                  <input type="file" id="photo" name="photo" accept="image/*">
                                   </div>
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

<?php require base_path('views/partials/footer.php') ?>
