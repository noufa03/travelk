<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>


 <div class="main--content" >

<?php require base_path('views/partials/restaurants/heading.php') ?>

<p style="font-size: 18px; color: #555;">
   Add Menu / Menu List
</p>


<button  class="btn btn-submit" > <a href="/menu/add?id=<?= $userid ?>" >+ Add Menu</a></button>

<div class="table--content">
<table>
        <thead>
            <tr>
                <th>Cuisine ID</th>
                <th>Cuisine Name</th>
                <th>Description</th>
                <th>Availability</th>
                <th>Small(price)</th>
                <th>Medium(price)</th>
                <th>Large(price)</th>
              
              
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
      
        <?php foreach ($cuisines as $cuisine) : ?>
            <tr>
            <td ><?='#'.$cuisine['cuisineID'] ?></td>
          <td >
          <div  style="display: flex;flex-direction:row;gap:1rem;">
            <img src='<?= "/restaurants/folder{$cuisine['resID']}/menus/{$cuisine['photo']}" ?>' width="50" height="50">


              <div  style="display: flex;flex-direction:column">
                     
                     <p style="color: #555;">  <?=$cuisine['cuisine_name'] ?></p>
     
                     <p>
                     <?php 
                                                        if (isset($cuisine['ratings'])) {
                                                            $roundedRating = round($cuisine['ratings']);
                                                            for ($i = 1; $i <= 5; $i++) {
                                                                if ($i <= $roundedRating) {
                                                                    echo '<i class="fa-solid fa-star" style="color: gold;"></i> '; 
                                                                } else {
                                                                    echo '<i class="fa-regular fa-star" style="color: gray;"></i> '; 
                                                                }
                                                            }
                                                            echo " (" .'Review '. $cuisine['ratings'] . ")";
                                                        } else {
                                                          for ($i = 1; $i <= 5; $i++) {
                                                              echo '<i class="fa-regular fa-star" style="color: gray;"></i> '; }
                                                        }
                                                    ?>
                     
                     </p>
                                 
                      
                     
                 </div>
                     
            
          </div>
       
          <br>
              
        
          
      
          </td>
          <td ><?=$cuisine['description'] ?></td>
        <td style="color: <?= ($cuisine['available'] == 1) ? 'green' : 'red' ?>;">
    <?= ($cuisine['available'] == 1) ? 'yes' : 'no' ?>
            </td>

        
          <td ><?php
          
          if (isset($cuisine['small_price']) && $cuisine['small_price'] !== NULL) {
          
            
                   $value=$cuisine['small_price'];
                  $value = str_replace(['{', '}'], '', $value);
                 
                  
                   $price = explode(',', $value); 
                      echo  'Rs.'.implode('<br>', $price);
            } else {
                echo 'No small portion available';
            }
          
        
        
         ?>
          </td>
          
                  <td ><?php
                  
                   
          if (isset($cuisine['medium_price']) && $cuisine['medium_price'] !== NULL) {
          
              $value=$cuisine['medium_price'];
          $value = str_replace(['{', '}'], '', $value);
         
          
           $price = explode(',', $value);  

       
          echo 'Rs.'. implode('<br>', $price);
            } else {
                echo 'No Medium portion available';
            }

          
         
        
         ?>
          </td>

                  <td ><?php
         

       
          if (isset($cuisine['large_price']) && $cuisine['large_price'] !== NULL) {
          
            
                   $value=$cuisine['large_price'];
                  $value = str_replace(['{', '}'], '', $value);
                 
                  
                   $price = explode(',', $value); 
                      echo  'Rs.'.implode('<br>', $price);
            } else {
                echo 'No large portion available';
            }

        
         ?>
          </td>
         
          <td >
        
          <a href="/menu/edit?id=<?= $cuisine['cuisineID']  ?>"  class="edit" >   <button >Edit   </button></a>
       
      
          </td>
          <td >
          <div id="delete-form">
          
             <div id="delete-form">
          
          <button type="submit" class="delete" onclick="openPopup(<?= $cuisine['cuisineID'] ?>)">Delete</button>
   
                       <div class="popup" id="popup-<?= $cuisine['cuisineID'] ?>" style="color: black;">
                                        <img src="/restaurants/menus/tick.svg" alt="">
                                        <h2>Confirm</h2>
                                    
                                            <form id="delete-form-<?= $cuisine['cuisineID'] ?>" method="POST" action="/tables/delete">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="tableid" value="<?= $cuisine['cuisineID'] ?>">
                                                <p>Note that this item will be deleted permanently from your Menus list. Are you sure?</p>
                                                <button type="submit" class="delete">Delete</button>
                                            </form>
                                            <button type="reset" onclick="closePopup_cuisine(<?= $cuisine['cuisineID'] ?>)" class="delete">Cancel</button>
                                        
                                    </div>
            
            
                            
                            
                            
                          
            
                                    
                                    
                      </div>
          </div>
             
         
       
          </td>
       
            </tr>
            <?php endforeach; ?>
        
        </tbody>
    </table>
    
  

</div>

   
 




            
 

       
</div>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>
