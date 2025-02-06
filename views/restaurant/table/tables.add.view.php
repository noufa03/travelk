


<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>

 <div class="main--content" >

 <?php require base_path('views/partials/restaurants/heading.php') ?>
        
        <div class="form--content">
     
        <form action="/tables/Add" method="POST" enctype="multipart/form-data"  >
       
      <div class="first--row">
      
                   <div class="first--grp">
                              <div class="form-group">
                             
                                <input type="hidden" id="tableid" name="tableid" required>
                                </div>
                                   <div class="form-group">
                                <label for="tablename">Table Name:</label><br>
                                <input type="text" id="tablename" name="tablename" required>
                                </div>
                             
                               <div class="form-group">
                                <label for="category">Table Type:</label><br>
                                <select id="category" name="category" class="form-control" onchange="handleTableTypeChange()">
                                    <option value="">Select Table Type</option>
                                    <option value="two-seater">Two-Seater Tables (Deuce Tables): Small tables designed for two diners, often found in cafes or intimate dining spaces.</option>
                                    <option value="four-seater">Four-Seater Tables: Standard size for small groups or families.</option>
                                    <option value="six-seater">Six-Seater Tables: Larger tables for medium-sized groups.</option>
                                    <option value="eight-seater">Eight-Seater Tables (or More): Typically used for large families or group reservations.</option>
                                    <option value="outdoor">Outdoor Tables: Designed for outdoor dining, often weather-resistant and paired with umbrellas or canopies.</option>
                                    <option value="custom">Custom Table</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="custom-table-container" style="display: none;">
                                <label for="customtable">Enter Custom Table Type:</label><br>
                                <input type="text" id="customtable" name="customtable" class="form-control" placeholder="Enter custom table type">
                            </div>

                                
                             
                    </div>
                   
                   <div class="second--grp">
                   
                                <div class="form-group">
                                  <label for="tablepricetype">Price:</label>
                                    <span style="color: grey;font-size:smaller;">Add the revervation fee for the table</span><br>
                                 <select id="tablepricetype" name="tablepricetype"  onchange="handleReserveTypeChange()" required>
                                      <option value="" disabled selected>Select an option</option>
                                      <option value="NoCharge">No Charge for Reservation</option>
                                      <option value="Advance Deposit">Advance Deposit</option>
                                      <option value="Prepayment">Prepayment for Special Events</option>
                                      <option value="Cancellation Fee">Cancellation or No-Show Fee</option>
                                    </select>
                                    <br><br>
                                      <div class="form-group" id="tableprice-container">
                                            <label for="tableprice">Fee:</label>
                                            <input type="number" id="tableprice" name="tableprice" step="0.01" placeholder="Enter fee amount" >
                                          </div>
                                                                  
                                
                                        
                                  </div>
                                  
                                   
                   
                   
                   </div>
                 
                    
      
      </div>
       
      <div class="second--row">
        
            <button type="submit" class="btn btn-submit" >Add Table</button>
              <button type="reset" class="btn btn-cancel"><a href="/dashboard_rest">Cancel</a></button>
        
      
      </div>
     
       
    
          <!-- pop up -->
        <!-- <div class="popup" id="popup" style="color: black;">
        <img src="/restaurants/menus/tick.svg" alt="">
        <h2>success!</h2>
        <p>New menu item is successfully added to your menu list </p>
        <button type="button" onclick="closePopuptable()">Ok</button>
        </div>
          -->
        
    </form>
        
          </div>
       
           
       
    
    
</div>


</body>
</html>

<?php require base_path('views/partials/restaurants/filejs.php') ?>

<?php require base_path('views/partials/footer.php') ?>








