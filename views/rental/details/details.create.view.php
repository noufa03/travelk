


<?php require base_path('views/partials/rental/styles/detail.php') ?>
<?php require base_path('views/partials/rental/sidebar_car.php') ?>

 <div class="main--content" >
 
 <?php require base_path('views/partials/restaurants/heading.php') ?>
        
        <div class="form--content">
     
        <form  method="POST" action="/details_rest" enctype="multipart/form-data">
       
      <div class="first--row">
      
                   <div class="first--grp">
                   
                    <h1 style="color: black;">Personal Info</h1>
                                   <div class="form-group">
                                <label for="first_name">First Name:</label><br>
                                <input type="text" id="first_name" name="first_name" value="<?= $driver_profile['first_name']?>" required>
                                </div>
                             
                             
                              <div class="form-group">
                                <label for="last_name">Last Name:</label><br>
                                <input type="text" id="last_name" name="last_name" value="<?= $driver_profile['last_name']?>" required>
                                </div>
                             
                                  <div class="form-group">
                                <label for="phone_number">Phone Number:</label><br>
                                <input type="text" id="phone_number" name="phone_number" value="<?= $driver_profile['phone_number']?>" required>
                                </div>
                                    <div class="form-group">
                                <label for="date_of_birth">Date of Birth:</label><br>
                                <input type="date" id="date_of_birth" name="date_of_birth" value="<?= $driver_profile['date_of_birth']?>" required>
                                </div>
                                
                                    
                               <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select name="gender">
                              <option value="" disabled <?= empty($driver_profile['gender']) ? 'selected' : '' ?>>Select Gender</option>
                              <option value="male" <?= ($driver_profile['gender'] == 'male') ? 'selected' : '' ?>>Male</option>
                              <option value="female" <?= ($driver_profile['gender'] == 'female') ? 'selected' : '' ?>>Female</option>
                          
                            </select>
                                </div>
                                <h1 style="color: black;">License Info</h1>
                                     <div class="form-group">
                                <label for="license_number">License Number:</label><br>
                                <input type="text" id="license_number" name="license_number" value="<?= $driver_profile['license_number']?>" required>
                                </div>
                                
                                 <div class="form-group">
                                <label for="license_issue_date">Issue Date:</label><br>
                                <input type="date" id="license_issue_date" name="icense_issue_date" value="<?= $driver_profile['license_issue_date']?>" required>
                                </div>
                                
                                <div class="form-group">
                                <label for="license_expiry_date">Expiry Date:</label><br>
                                <input type="date" id="license_expiry_date" name="license_expiry_date" value="<?= $driver_profile['license_expiry_date']?>" required>
                                </div>
                                
                           
                                    <div class="form-group">
                                  <label for="membership_status">Membership Status:</label><br>
                                <select id="membership_status" name="membership_status" required>
                                  <option value="" disabled <?= empty($driver_profile['membership_status']) ? 'selected' : '' ?>>Select an option</option>
                                  <option value="active" <?= ($driver_profile['membership_status'] == 'active') ? 'selected' : '' ?>>Active</option>
                                  <option value="inactive" <?= ($driver_profile['membership_status'] == 'inactive') ? 'selected' : '' ?>>Inactive</option>
                              </select>

                                  </div>
                                             

                                
                    </div>
                   
                   <div class="second--grp">
                   
                                    
                                  
                                    <div class="form-group">

                                  <label for="profile_picture">profile picture:</label><br>
                                   <div class="upload-box">
                                 
                                   </div>
                                   <br>
                                   <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                                 <h6 style="color: red;">Add profile pic</h6>
                                    </div>
                                    
                                     
                                    
                   
                   
                   </div>
                 
                    
      
      </div>
         <div class="second--row">
        
                <button type="submit" class="btn btn-submit" 
          
          >
              Edit
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
    
    
           
    </form>
        
          </div>
          <br><br>
          
       <div class="form--content">
     
        <form  method="POST" action="/details_rest" enctype="multipart/form-data">
       <h1 style="color: black;">Add Details</h1>
      <div class="first--row">
      
                   <div class="first--grp">
                                   <div class="form-group">
                                <label for="hot_line">Hot Line:</label><br>
                                <input type="text" id="hot_line" name="hot_line" required>
                                </div>
                             
                             
                                
                               <div class="form-group">
                                <label for="operatingHoursFrom">Operating Hours (From - To):</label>
                                <input type="time" id="operatingHoursFrom" name="operatingHoursFrom" required> 
                                <span style="color: black;"> to </span>
                                <input type="time" id="operatingHoursTo" name="operatingHoursTo" required><br><br>
                            </div>
                               <div class="form-group">
                                <label for="paymentMethods">Payment Methods:</label>
                                  <select id="paymentMethods" name="paymentMethods" required>
                                  <option value="" disabled selected>Select a option</option>
                                  <option value="credit">Credit Card</option>
                                  <option value="debit">Debit Card</option>
                                  <option value="Cash">Cash</option>
                                 
                                </select>
                                </div>
                                    <div class="form-group">
                                  <label for="deliveryOptions">Delivery Options:</label><br>
                                 <select id="deliveryOptions" name="deliveryOptions" required>
                                  <option value="" disabled selected>Select a option</option>
                                  <option value="credit">Dine In</option>
                                  <option value="takeaway">Takeaway</option>
                                  <option value="Delivery">Delivery</option>
                                 
                                </select>
                                  </div>
                                             

                                
                    </div>
                   
                   <div class="second--grp">
                   
                                      <div class="form-group">
                                  <label for="seatingCapacity">Seating Capacity:</label><br>
                                  <input type="number" id="seatingCapacity" name="seatingCapacity" step="0.01" required>
                                  </div>
                                 
                                  
                                    <!-- <div class="form-group">

                                  <label for="photos">Photos:</label><br>
                                   <div class="upload-box">
                                  <input type="file" id="photos" name="photos" accept="image/*">
                                <h6 style="color: red;">Add images of your restuarant</h6>
                                   </div>
                                    </div>
                                    
                                      <div class="form-group">

                                  <label for="logo">logo:</label><br>
                                   <div class="upload-box">
                                  <input type="file" id="logo" name="logo" >
                                <h6 style="color: red;">Add the logo of your restuarant</h6>
                                   </div>
                                    </div> -->
                                    
                   
                   
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
                                <label for="display_name">Restuarant name:</label>
                                <input type="text" id="display_name" name="display_name"  required>
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
<?php require base_path('views/partials/restaurants/js/detail_js.php') ?>

<?php require base_path('views/partials/footer.php') ?>
