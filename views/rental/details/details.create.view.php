


<?php require base_path('views/partials/rental/styles/detail.php') ?>
<?php require base_path('views/partials/rental/sidebar_car.php') ?>

 <div class="main--content" >
 
 <?php require base_path('views/partials/restaurants/heading.php') ?>
        
     
     
   
         
       <div class="form--content">
     
        <form  method="POST" action="/details_rental" enctype="multipart/form-data">
       <h1 style="color: black;">Add Details</h1>
      <div class="first--row">
      
                   <div class="first--grp">
                      <div class="form-group">
                             <label for="profile_picture">Profile Picture:</label><br>
                            
                              <div class="upload-box" style="margin-bottom: 10px;">
                                <img id="preview" src="" alt="Image Preview" class="preview-img" style="display:none; width: 200px; margin-top: 10px;">
                              </div>
                            
                              <input type="file" id="profile_picture" name="profile_picture" accept="image/*" onchange="previewImage(event)">
                              <h6 style="color: red;">Add profile pic</h6>
                            </div>
                                          
                                             

                                
                  
                   
    
                   
                                      
                         <div class="form-group">
                                                           <label for="payment_methods">Payment Methods(Do you accept card payments):</label>
                                                        
                                                          <select id="payment_methods" name="payment_methods" required>
                                                          <option value="" disabled selected>Select a option</option>
                                                         <option value="yes">yes</option>
                                                         <option value="no">no</option>
                                                         
                                                        </select>
                                                          <h6 style="color: red;">Add the methods the customer can use to pay you</h6>
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
          <!-- location details -->
   
       
      <div class="first--row" style="display: flex; justify-content: center; align-items: center;">
      
               
                              
                                
                               <div class="form-group" style="width:100%;">
                                <h2 style="color: black;"> Add Location info</h2>
                               <h6 style="color: red;">Add your operational area</h6>
                                <!-- <label for="display_name">V:</label>
                                <input type="text" id="display_name" name="display_name"  required> -->
                                      <label for="district" > District: </label>
                               
                                <select id="district" name="district" required  onchange="updateCityField()">
                                  <option value="">-- Select District --</option>
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
                                <input type="text" id="city" name="city" required>
                                
                                 <label for="street_address">Street Adrress:</label>
                                <input type="text" id="street_address" name="street_address" required> 
                                <label for="google_map_link" > Google map link: </label>
                                <input type="text" id="google_map_link" name="google_map_link" required>
                          
                                <br><br>
                            </div>
                              
                                 

                                
                    
                   
                 
                 
                    
      
      </div>
       <div class="form-group" style="width:100%;">
         <h2 style="color: black;"> Add Vehicle info</h2>
            <h6 style="color: red;">Add your vehicle information</h6>
            
               <label for="vehicle_type" > Type: </label>
                     <input type="text" id="vehicle_type" name="vehicle_type"  placeholder="car,tuk,van......" required>
                     
               <label for="vehicle_model" > Model: </label>
                     <input type="text" id="vehicle_model" name="vehicle_model" placeholder="suzuki,bently....." required>
       
       </div>
       
      
       
      <div class="second--row">
        
                <button type="submit" class="btn btn-submit" 
          
          >
              Submit
          </button>
          <button type="reset" class="btn btn-cancel">Cancel</button>

          
        
      
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
<?php require base_path('views/partials/rental/js/detail_js.php') ?>

<?php require base_path('views/partials/footer.php') ?>
