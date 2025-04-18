

<?php require base_path('views/partials/restaurants/styles/menus/menus.php') ?>

<?php require base_path('views/partials/rental/sidebar_car.php') ?>

 <div class="main--content" >

 <?php require base_path('views/partials/restaurants/heading.php') ?>
 
 <p style="font-size: 18px; color: #555;">
 General / Report Issue
</p>
        
        <div class="form--content">
     
        <form  method="POST" enctype="multipart/form-data">
       
      <div class="first--row"  style="display: grid;grid-template-rows: 1fr 2fr">
      
                 
                              <div class="form-group">
                            
                                <!-- <input type="hidden" id="userid" name="userid" value="<?= $_GET['id']?>"> -->
                                </div>
                                
                                
                                 <div class="form-group">                          
                                            <label for="reportIssue">Select Issue Type:</label>
                                          <select name="reportIssue" id="reportIssue">
                                            <option value="vehicleIssue">Vehicle Issue (Breakdown, maintenance needed)</option>
                                            <option value="appMalfunction">App Malfunction (Navigation, trip not showing, crash)</option>
                                            <option value="paymentProblem">Payment Problem (Missing or incorrect payment)</option>
                                            <option value="passengerAbuse">Passenger Misconduct (Abuse, threats, or bad behavior)</option>
                                            <option value="routeDispute">Route Dispute (Passenger forcing unsafe/illegal route)</option>
                                            <option value="fakeBooking">Fake or Canceled Booking (No-show or spam request)</option>
                                            <option value="safetyConcern">Safety Concern (Unsafe location, dangerous behavior)</option>
                                            <option value="other">Other</option>
                                        </select>

                                   </div>
                                    
                                  <div class="form-group">
                                                <label for="issue">Provide Details (optional):</label><br>
                                                <textarea name="issue" id="issue"  cols="75" rows="10"><?= $_POST['issue'] ?? '' ?></textarea>
                                                
                                                <?php if (isset($errors['issue'])) : ?>
                                               <li class="error-text"><?= $errors['issue'] ?></li>

                                            <?php endif; ?>
                                </div>
                                
                                
                                  
    
   


  </div>
       
      <div class="second--row">
        
                <button type="submit" class="btn btn-submit" 
          
          >
              Report Issue
          </button>
          <button type="reset" class="btn btn-cancel">Cancel</button>

          
        
      
      </div>
     
       
    
     
        
    </form>
        
          </div>
       
       
       
<p style="font-size: 18px; color: #555;">
 Reported Issues
</p>   
       
   <div class="table--content">
      <table>
        <thead>
            <tr>
               
                <th>Issue</th>
                <th>status</th>
                
              
                <th></th>
               
            </tr>
        </thead>
        <tbody>  
        <?php foreach($issues as $issue) :?>
        <tr>
      
        <td><?= $issue['issue'] ?></td>
        <td><?= $issue['status'] ?></td>
        <td> 
           <form  method="POST" action="/issues/rental/delete">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="issueid" value="<?= $issue['issueid'] ?>">
                <button type="submit" class="btn btn-submit" >Remove</button>
               
            </form>

        
        </td>
        
        </tr>
        
        <?php endforeach; ?>
        
        
        </tbody>
      </table>
   </div>
       
       
       
    
    
</div>


</body>
</html>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/restaurants/js/menus_js.php') ?>

<?php require base_path('views/partials/footer.php') ?>
