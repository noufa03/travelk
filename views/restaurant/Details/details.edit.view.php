


<?php require base_path('views/partials/restaurants/styles/details/detail.php') ?>
<?php require base_path('views/partials/restaurants/styles/details/details.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>

 <div class="main--content" >
 
 <?php require base_path('views/partials/restaurants/heading.php') ?>
        
        <div class="form--content">
     
        <form  method="POST" action="/details_rest/update?id=<?php echo $details['id']?>" enctype="multipart/form-data">
           <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="<?=  $details['id'] ?>">
              
               
       
      <div class="first--row">
      
                   <div class="first--grp">
                   
                   
                   <div class="form-group">
                                <label for="profile">Profile Picture:</label><br>
                            
                                <?php if (empty($details['profile'])): ?>
                                    <p style="color: red;">Add profile</p>
                                <?php endif; ?>
                            
                                <div class="profile-box">
                                    <?php if (!empty($details['profile'])): ?>
                                        <img id="existingImage" src="/<?= $details['profile'] ?>" alt="Photo" style="width: 200px; margin-top: 10px;">
                                    <?php endif; ?>
                            
                                    <span class="plus-icon">+</span>
                            
                                    <input type="file" id="profile" name="profile" accept="image/*"><br>
                            
                                    <img id="preview" src="" alt="Image Preview" style="display:none; width: 200px; margin-top: 10px;">
                            
                                    <input type="hidden" id="existing_profile" name="existing_profile" value="<?= $details['profile'] ?>">
                                </div>
                            </div>

                                    
                                   <div class="form-group">
                                <label for="hot_line">Hot Line:</label><br>
                                <input type="text" id="hot_line" name="hot_line"  value="<?= $locations['hot_line'] ?>"  required>
                                </div>
                             
                             
                                
                               <div class="form-group">
                                <label for="operatingHoursFrom">Operating Hours (From - To):</label>
                                <input type="time" id="operatingHoursFrom" name="operatingHoursFrom"   value="<?= $details['operatingHoursFrom'] ?>"  required> 
                                <span style="color: black;"> to </span>
                                <input type="time" id="operatingHoursTo" name="operatingHoursTo" value="<?= $details['operatingHoursTo'] ?>"  required><br><br>
                            </div>
                            
                              
                            
                            
                            
                          
                            
                                             

                                
                    </div>
                   
                   <div class="second--grp">
                   
                                      <div class="form-group">
                                  <label for="seatingCapacity">Seating Capacity:</label><br>
                                  <input type="number" id="seatingCapacity" name="seatingCapacity" step="0.01" value="<?= $details['seatingCapacity'] ?>" required>
                                  </div>
                                 
                                  <div class="form-group">
                                <label for="paymentMethods">Payment Methods(Do you accept card payments):</label>
                                  <select id="paymentMethods" name="paymentMethods"  required>
                                  <option value="<?= $details['paymentMethods'] ?>" disabled><?= $details['paymentMethods'] ?></option>
                                    <option value="yes">yes</option>
                                       <option value="no">no</option>
                                 
                                </select>
                                </div>
                                
                                <?php
                                            $selectedOptions = explode(',', $details['deliveryOptions']); 
                                            ?>
                                            
                                            
                                                                                    
                                        <label>Delivery Options:</label>
                                        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr 1fr">
                                          
                                          <label for="dinein" style="display: flex">
                                            Dine In
                                            <input type="checkbox" id="dinein" name="deliveryOptions[]" value="dinein" 
                                              <?= in_array('dinein', $selectedOptions) ? 'checked' : '' ?>>
                                          </label>
                                          
                                          <label for="takeaway" style="display: flex;">
                                            Takeaway
                                            <input type="checkbox" id="takeaway" name="deliveryOptions[]" value="takeaway" 
                                              <?= in_array('takeaway', $selectedOptions) ? 'checked' : '' ?>>
                                          </label>
                                          
                                          <label for="delivery" style="display: flex;">
                                            Delivery
                                            <input type="checkbox" id="delivery" name="deliveryOptions[]" value="delivery" 
                                              <?= in_array('delivery', $selectedOptions) ? 'checked' : '' ?>>
                                          </label>
                                          
                                        </div>
                                
                                  
                              <div class="form-group">
                                <label for="operatingdaysFrom">Operating Days (From - To):</label>
                              
                                <select name="operatingdaysFrom" id="operatingdaysFrom" required>
                                 <option value="<?= $details['operatingdaysFrom'] ?>"><?= $details['operatingdaysFrom'] ?></option>
                                 <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                                
                                </select>
                                
                                
                                <span style="color: black;"> to </span>
                                  <select name="operatingdaysTo" id="operatingdaysTo" required>
                                     <option value="<?= $details['operatingdaysTo'] ?>"><?= $details['operatingdaysTo'] ?></option>
                                 <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                                
                                </select>
                               <br><br>
                            </div>
                            
                                  
                   
                   
                   </div>
                 
                    
      
      </div>
       
 



       
                <ul>
                    <?php if (isset($errors['email'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></li>
                    <?php endif; ?>

                    <?php if (isset($errors['password'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></li>
                    <?php endif; ?>
                </ul>
    
     
        
 
        
          
          
          <br><br>
     
   
       
      <div class="first--row" style="display: flex; justify-content: center; align-items: center;">
      
                 
                               
                             
                                
                               <div class="form-group" style="width:100%;">
                                <label for="display_name">Restuarant name:</label>
                                <input type="text" id="display_name" name="display_name" value="<?= $locations['display_name'] ?>"  required>
                                      <label for="district" > District: </label>
                               
                                <select id="district" name="district" required  onchange="updateCityField()">
                                  <option value="<?= $district['district'] ?>" ><?= $district['district'] ?></option>
                                <option value="Ampara">Ampara</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Galle">Galle</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Hambantota">Hambantota</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kalutara">Kalutara</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala">Kurunegala</option>
                                <option value="Mannar">Mannar</option>
                                <option value="Matale">Matale</option>
                                <option value="Matara">Matara</option>
                                <option value="Monaragala">Monaragala</option>
                                <option value="Mullaitivu">Mullaitivu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Polonnaruwa">Polonnaruwa</option>
                                <option value="Puttalam">Puttalam</option>
                                <option value="Ratnapura">Ratnapura</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>
                            </select>
                                <br><br>
                                <label for="city" > City: </label>
                                <input type="text" id="city" name="city"  value="<?= $locations['city'] ?>"  required>
                                
                                 <label for="street_address">Street Adrress:</label>
                                <input type="text" id="street_address" name="street_address" value="<?= $locations['street_address'] ?>"  required> 
                                <label for="google_map_link" > Google map link: </label>
                                <input type="text" id="google_map_link" name="google_map_link" value="<?= $locations['google_map_link'] ?>"  required>
                          
                                <br><br>
                            </div>
                              
                              
                                 

                                
                    
                   
                 
                 
                    
      
      </div>
      
        <div  style="display:grid;grid-template-columns:1fr ;gap:1rem">
                              <div class="form-group">
                    
                    
                    
                                                      <label for="logo">logo:</label><br>
                                                       <div class="upload-box">
                                                          <?php if (!empty($details['logo'])): ?>
                                                                 <img src="/<?= $details['logo']?>"alt="Photo" width="250px" height="180px">
                    
                                                                    
                                                          <?php   endif; ?>
                                                   <input type="hidden"  name="logo"  id="logo" value="<?=$details['logo']?>"  >
                                                             
                                                      <input type="file" id="logo" name="logo"  >
                                                       <img id="preview3" src="" alt="Image Preview" style="display:none; width: 200px; margin-top: 10px;">
                    
                                                    <h6 style="color: red;">Add the logo of your restuarant</h6>
                                                       </div>
                                                       
                                                       
                                                       
                                                       
                                      </div>
                            
                            
                                    <div class="form-group"  >

   
                                  <label for="photos">Photos:</label><br>
                                   <div class="upload-box">
                                   <?php for($i=0;$i < count($photos);$i++): ?>
                                   
                                    <?php if (!empty($photos[$i])): ?> 
                                                <img src="/<?=$photos[$i]?>" alt="Photo" max-width="300px" height="180px"> 
                                                
                                      <?php   endif; ?>
                 
                                  <input type="file" id="photos" name="photos" accept="image/*"  >
                                   <img id="preview2" src="" alt="Image Preview" style="display:none; width: 200px; margin-top: 10px;">
                                              <input type="hidden"  name="photos"  id="photos" value="<?=$photos[$i]?>"  >
                                <?php endfor; ?>
                                <h6 style="color: red;">Add images of your restuarant</h6>
                                
                                   </div>
                                    </div>
                                    
                                      
                                    
                                    
                                    
                                    
                                    
                                  
                              
                            
             </div>
       
      <div class="second--row">
        
                <button type="submit" class="btn btn-submit" 
          
          >
              Save changes
          </button>
          <button type="reset" class="btn btn-cancel"><a href="/dashboard_rest">Discard Changes</a></button>

          
        
      
      </div>
      



       
                <ul>
                    <?php if (isset($errors['email'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></li>
                    <?php endif; ?>

                    <?php if (isset($errors['password'])) : ?>
                        <li class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></li>
                    <?php endif; ?>
                </ul>
    
     <div>
     <h5 style="color: red;font-weight:lighter;display: flex; justify-content: center; align-items: center;margin-top:10px;">These are the details customers can view</h5>
     
     </div>
           
    </form>
        
          </div>
       
           
       
    
    
</div>


</body>
</html>

<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/detail_js.php') ?>

<?php require base_path('views/partials/footer.php') ?>
