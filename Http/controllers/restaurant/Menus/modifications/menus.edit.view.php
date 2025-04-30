<?php require base_path('views/partials/restaurants/styles/menus/edit.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
  <?php require base_path('views/partials/restaurants/heading.php') ?>
  <div class="form--content">
    <form action="/menu/update?id=<?php echo $cuisine['cuisineID'] ?>" method="POST" enctype="multipart/form-data">
      <div class="first--row">
        <div class="first--grp">
          <div class="form-group">
            <label for="cuisine_name">Cuisine Name:</label><br>
            <input type="text" id="cuisine_name" name="cuisine_name" value="<?= $cuisine['cuisine_name'] ?>" required>
          </div>
           <div class="form-group">
            <label for="chef">Chef:</label><br>
            <input type="text" id="chef" name="chef" value="<?= $cuisine['chef'] ?>" required>
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
            <input type="text" id="available" name="available" step="0.01" value="<?= ($cuisine['available'] == 1) ? 'yes' : 'no' ?>" required>
          </div>

         
        </div>
        <div class="second--grp">
          <div class="form-group">
            <label for="photo">Photo:</label><br>
            <div class="upload-box">
              <?php if (isset($cuisine['photo']) && !empty($cuisine['photo'])): ?>
                <input type="file" id="photo" name="photo" accept="image/*">
                <img src="/<?= htmlspecialchars($cuisine['photo']) ?>" alt="Photo" width="250px" height="180px">
                <input type="hidden" name="photo" id="photo" value="<?= $cuisine['photo'] ?>">
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
        <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
        Update Cuisine</button>
        <button type="reset" style="background: #ffffff; color: #60a56a; padding: 10px 24px; border-radius: 8px; border: 2px solid #60a56a; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='#f5f5f5';" onmouseout="this.style.transform='scale(1)'; this.style.background='#ffffff';">
        <a href="/mymenus">Discard Changes</a></button>
      </div>
    </form>
  </div>
</div>
</body>

</html>

<?php require base_path('views/partials/restaurants/js/menus_js.php') ?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>