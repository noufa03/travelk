


<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>

 <div class="main--content" >
  <?php require base_path('views/partials/restaurants/header.php') ?>
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
                                  <label for="price">Price:</label><br>
                                  <input type="number" id="price" name="price" step="0.01"  value="<?= $cuisine['price'] ?>" required>
                                  </div>
                                
                    </div>
                   
                   <div class="second--grp">
                   
                                   
                                  
                                    <div class="form-group">
                                  <label for="photo">Photo:</label><br>
                                   <div class="upload-box">
                                        <?php
                                  if (isset($cuisine['photo'])) {
                                      // If the photo exists, display the image
                                      echo '<img src="/restaurants/storage/images/' . $cuisine['photo'] . '" alt="Photo" width="250px" height="180px">';
                                      
                                      echo '<input type="file" id="photo" name="photo" accept="image/*">';
                                  } else {
                                      // If the photo doesn't exist, show the file input field
                                      echo 'Not Set Yet';
                                      echo '<input type="file" id="photo" name="photo" accept="image/*" >';
                                  }
                                  ?>

                                    
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

<?php require base_path('views/partials/restaurants/filejs.php') ?>

<?php require base_path('views/partials/footer.php') ?>








