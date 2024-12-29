


<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>

 <div class="main--content" >
  <?php require base_path('views/partials/restaurants/header.php') ?>
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
                                <input type="text" id="cuisine_type" name="cuisine_type">
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
        
            <button type="submit" class="btn btn-submit" onclick="openPopup()">Add Cuisine</button>
              <button type="reset" class="btn btn-cancel">Cancel</button>
        
      
      </div>
     
       
    
          <!-- pop up -->
        <div class="popup" id="popup" style="color: black;">
        <img src="/restaurants/menus/tick.svg" alt="">
        <h2>success!</h2>
        <p>New menu item is successfully added to your menu list </p>
        <button type="button" onclick="closePopup()">Ok</button>
        </div>
         
        
    </form>
        
          </div>
       
           
       
    
    
</div>


</body>
</html>

<?php require base_path('views/partials/restaurants/filejs.php') ?>

<?php require base_path('views/partials/footer.php') ?>








