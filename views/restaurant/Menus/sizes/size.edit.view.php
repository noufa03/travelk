<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>
<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <p style="font-size: 18px; color: #555;">
        Cuisine / Edit Size
    </p>
    <div class="form--content">
        <form method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?= $cuisinesize['sizeID'] ?>">
            <div class="first--row" style="display: flex;flex-direction: column;align-items:center">
                <div class="form-group">
                   
                    <label>Custom Sizes:</label><br>
                    <div class="checkbox-group">
                        <label>
                           Name:
                               <input type="text" id="size_name" name="size_name" value="<?= $cuisinesize['size'] ?>" placeholder="Name of size">
                         
                        </label>
                        <label>
                        Price:
                           <input type="number" id="price"  value="<?=  $cuisinesize['price'] ?>" name="price" placeholder="Price for size" >
                        
                        </label>
                       
                      
                      
                    </div>
                    <!-- <?php if (isset($errors['sizes'])) : ?>
                        <li class="error-text"><?= $errors['sizes'] ?></li>
                    <?php endif; ?> -->
                </div>
             
               
            </div>
                <div class="second--row">
                    <button type="submit" class="btn btn-submit">
                        Update Size
                    </button>

                    <button type="reset" class="btn btn-cancel"><a href="/mymenus">Cancel</a></button>
                </div>
        </form>
    </div>


    
</div>

</body>


</html>

<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/menus_js.php') ?>
<?php require base_path('views/partials/footer.php') ?>