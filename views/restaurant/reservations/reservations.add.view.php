

<?php require base_path('views/partials/restaurants/styles/details/detail.php') ?>
<?php require base_path('views/partials/restaurants/styles/details/details.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>
 <div class="main--content" >

 <?php require base_path('views/partials/restaurants/heading.php') ?>
        
        <div class="form--content">
     
        <form  method="POST" enctype="multipart/form-data"   action="/reservations/store">
       
      <div class="first--row" >
      
                   <div class="first--grp">
                   
                            <div class="form-group">
                                          <label for="name">Name:</label><br>
                                          <input type="varchar" id="name" name="name" min="0" max="100" required>
                                </div>
                                   <div class="form-group">
                                <label for="email(traveler)">Email:</label><br>
                                 <input type="email" id="email(traveler)" name="email(traveler)" min="0" max="100" required>
                                
                                </div>
                                  
                             
                                <div class="form-group">
                                <label for="category">Available tables:</label><br>
                                  <select id="category" name="category" required>
                                <option selected="">Select table category</option>
                                      <?php foreach($available_tables as $available_table): ?>
                                        <option value="<?= $available_table['category'] ?>"><?= $available_table['category'] ?></option>
                                      <?php endforeach ; ?>
                                      
                                  
                                </select>
                                </div>
                                
                                
                             \
                                
                                
                               
                    </div>
                   
                   <div class="second--grp">
                   
                                      <div class="form-group">
                                  <label for="reservation_date">Reservation date and time:</label><br>
                                  <input type="datetime-local" id="reservation_date" name="reservation_date" step="0.01" required>
                                  </div>
                                      <div class="form-group">
                                  <label for="specialrequests">Special request:</label><br>
                                  <textarea name="specialrequests" id="specialrequests"></textarea>
                                  
                                  </div>
                                  
                                 
                                    </div>
                                    
                                   

                                  
                                 
                                   
                   
                   
                   </div>
                      <div class="second--row">
        
                <button type="submit" class="btn btn-submit" 
          
          >
              Book
          </button>
          <button type="reset" class="btn btn-cancel">Cancel</button>

          
        
      
      </div>
                 
                    
      
      </div>
       
   
     
       
    
     
        
    </form>
        
          </div>
       
           
       
    
    
</div>


</body>
</html>

<?php require base_path('views/partials/restaurants/filejs.php') ?>

<?php require base_path('views/partials/footer.php') ?>
