<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>
<?php require base_path('views/partials/restaurants/styles/menus/category.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>


 <div class="main--content" >

<?php require base_path('views/partials/restaurants/heading.php') ?>

            <div  style="display: flex;flex-direction:row;justify-content:space-between">
            
            <p style="font-size: 18px; color: #555;">
                Menu List / Categories
            </p>
            <div class="filter-condition">
                <span style="color: black;">Filter By Cuisine</span>
                <select name="" id="select" >
                    <option value="Default">Default</option>
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
            
            </div>
            <br>

<div  style="  display: grid;
  grid-template-columns: 1fr 1fr 1fr;">
  
  
  
  
     <?php foreach ($cuisines as $cuisine) : ?>
            <div class="card">
                    <img src='<?= $cuisine['photo'] ?>' class="card-img"   >
              <div class="card-body"  style="display: flex;flex-direction:column;gap:1rem">
                              
                                <h3 class="card-title"><?= $cuisine['cuisine_name'] ?></h3>
                           
                    
                                
                              
                            
          
                
                               <p  style="color: #555;"> 
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
                                                                for ($i = 1; $i <= 5; $i++){
                                                                    echo '<i class="fa-regular fa-star" style="color: gray;"></i> '; 
                                                                }
                                                                }
                                                            ?>
                             
                             </p>
             
                   
                             
                            <div  style="display:grid;grid-template-columns:1fr 1fr 1fr ; gap:0.5rem">
                                
                      
                          
                              <button class="card-btn"> Small <br>   
                              
                              
                              <?php
          
                                  if (isset($cuisine['small_price']) && $cuisine['small_price'] !== NULL) {
                                  
                                    
                                           $value=$cuisine['small_price'];
                                          $value = str_replace(['{', '}'], '', $value);
                                         
                                          
                                           $price = explode(',', $value); 
                                              echo  'Rs.'.implode('<br>', $price);
                                    } else {
                                        echo 'Rs.0.00';
                                    }
                                  
                                
                                
                                 ?>
                          
                                </button>
                                
                                     <button class="card-btn"> Medium <br>     <?php
          
                                  if (isset($cuisine['medium_price']) && $cuisine['medium_price'] !== NULL) {
                                  
                                    
                                           $value=$cuisine['medium_price'];
                                          $value = str_replace(['{', '}'], '', $value);
                                         
                                          
                                           $price = explode(',', $value); 
                                              echo  'Rs.'.implode('<br>', $price);
                                    } else {
                                        echo 'Rs.0.00';
                                    }
                                  
                                
                                
                                 ?></button>
                         

                              <button class="card-btn"> Large <br>  
                                    <?php
          
                                  if (isset($cuisine['large_price']) && $cuisine['large_price'] !== NULL) {
                                  
                                    
                                           $value=$cuisine['large_price'];
                                          $value = str_replace(['{', '}'], '', $value);
                                         
                                          
                                           $price = explode(',', $value); 
                                              echo  'Rs.'.implode('<br>', $price);
                                    } else {
                                        echo 'Rs.0.00';
                                    }
                                  
                                
                                
                                 ?>
                              </button>
                         
                         
                          
                                               
                               
                            </div>
                               
                                
                                              
                                
                           
              
              </div>
            </div>
            
            <?php endforeach ?>
</div>


 




            
 

       
</div>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>
