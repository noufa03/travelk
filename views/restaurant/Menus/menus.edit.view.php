


<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>



 <div class="main--content" >
  <?php require base_path('views/partials/restaurants/header.php') ?>
  <?php require base_path('views/partials/restaurants/heading.php') ?>
       
        <div class="form--content">
        <form action="/menu/edit" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $cuisine['cuisineID'] ?>">
        
        <label for="cuisine_name">Cuisine Name:</label><br>
        <input type="text" id="cuisine_name" name="cuisine_name"  value="<?= $cuisine['cuisine_name'] ?>"  required><br><br>
        
        <label for="cuisineID">Cuisine ID:</label><br>
        <span style="color: grey; font-size:15px">Example:<?= $userid ?>01</span>
        <input type="text" id="cuisineID" name="cuisineID" value="<?= $cuisine['cuisineID'] ?>" required>
    
        <br><br>

        <label for="cuisine_type">Cuisine Type:</label><br>
        <input type="text" id="cuisine_type" name="cuisine_type" value="<?= $cuisine['cuisine_type']?>"><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"><?= $cuisine['description'] ?></textarea><br><br>

        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" step="0.01"  value="<?= $cuisine['price'] ?>"  required><br><br>

        <label for="photo">Photo:</label><br>
        <input type="file" id="photo" name="photo" accept="image/*"   value="<?= isset($cuisine['photo'])?$cuisine['photo'] :"Not set yet" ?>" ><br><br>

     

        <button type="submit" onclick="openPopup()">Save the changes</button>
  
    
          <!-- pop up -->
        <div class="popup" id="popup" style="color: black;">
        <img src="/restaurants/menus/tick.svg" alt="">
        <h2>Updated!</h2>
        <p>Updated menu item is successfully added to your menu list </p>
        <button type="button" onclick="closePopup()">Ok</button>
        </div>
         
        
    </form>
    <button type="submit"  ><a href="/dashboard_rest">Discard the changes</a></button>
          </div>
       
           
       
    
    
</div>


</body>
</html>

<?php require base_path('views/partials/restaurants/filejs.php') ?>

<?php require base_path('views/partials/footer.php') ?>








