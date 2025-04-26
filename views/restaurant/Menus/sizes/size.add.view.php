<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>
<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <p style="font-size: 18px; color: #555;">
        Cuisine / Add Size
    </p>
    <div class="form--content">
        <form method="POST" enctype="multipart/form-data" action="/menu/add/size">
        <input type="hidden" name="id" value="<?= $cuisine['cuisineID'] ?>">
            <div class="first--row" style="display: flex;flex-direction: column;align-items:center">
                <div class="form-group">
                  
                    <label>Custom Sizes:</label><br>
                    <div class="checkbox-group">
                        <label>
                           Name:
                               <input type="text" id="size_name" name="size_name" value="<?= old('size_name') ?>" placeholder="Name of size">
                         
                        </label>
                        <label>
                        Price:
                           <input type="number" id="price"  value="<?= old('price') ?? '' ?>" name="price" placeholder="Price for size" >
                        
                        </label>
                       
                      
                      
                    </div>
                    <!-- <?php if (isset($errors['sizes'])) : ?>
                        <li class="error-text"><?= $errors['sizes'] ?></li>
                    <?php endif; ?> -->
                </div>
             
               
            </div>
                <div class="second--row">
                    <button type="submit" style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';">
                 
                        Add Size
                    </button>

                    <button type="reset" style="background: #ffffff; color: #60a56a; padding: 12px 24px; border-radius: 8px; border: 2px solid #60a56a; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='#f5f5f5';" onmouseout="this.style.transform='scale(1)'; this.style.background='#ffffff';">
          <a href="/mymenus" style="color: #60a56a; text-decoration: none;">Cancel</a></button>
                </div>
        </form>
    </div>


    <div class="table--content">
     <p style="font-size: 18px; color: #555;">
        Sizes
    </p>
        <table>
            <thead>
                <tr>
             
                    <th>Size Type</th>
                    <th>Price</th>
                    <th></th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customsizes as $customsize) : ?>
                    <tr>
          
                        <td><?= $customsize['size'] ?></td>
                        <td><?= $customsize['price'] ?></td>
                        <!-- <td><a href="/menu/edit/size?id=<?= $customsize['sizeID']  ?>"> <button class="btn btn-submit">Edit </button></a></td>  -->
                         <td>
                      <form method="POST" action="/menu/delete/size">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $customsize['sizeID'] ?>">
                        <button type="submit" style="background: linear-gradient(90deg, #e57373, #d32f2f); color: #ffffff; padding: 10px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #d32f2f, #e57373)';" onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #e57373, #d32f2f)';" >
                        Remove</button>
                      </form>
                    </td>
                      
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </span>
    </div>
</div>

</body>


</html>

<?php require(BASE_PATH . 'views/partials/user/toast.php'); ?>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/menus_js.php') ?>
<?php require base_path('views/partials/footer.php') ?>