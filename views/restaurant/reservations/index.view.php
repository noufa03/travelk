<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>


 <div class="main--content" >

<?php require base_path('views/partials/restaurants/heading.php') ?>



<div class="table--content">
<table>
        <thead>
            <tr>
                <th>Resrvation ID</th>
                <th>Resrvation Code</th>
                <th>Table ID</th>
                <th>Reservation Details</th>
                 <th>Customer Details</th>
                
                
                <th>special_requests</th>
                <th>status</th>
                
            </tr>
        </thead>
        <tbody>
        <?php foreach ($reservations as $reservation) : ?>
            <tr>
            <td ><?= "#".$reservation['reservationid'] ?></td>
             <td ><?=$reservation['reservationcode'] ?></td>
          <td ><?= "#".$reservation['tableid'] ?></td>
          <td 
          
          ><?= "Day :" .$reservation['reservation_date']?>
          <br>
          <?= "Table Details"."<br>"."fee:". $reservation['tableprice'] ."<br>" ."type:". $reservation['category'] ?>
    
          </td>
           <td 
          
          ><?=  $reservation['user_name']?>
          
          <br>
          <?=  $reservation['email(traveler)']?>
    
          </td>
          
          
          
        
          <td ><?= isset($reservation['specialrequests'])? $reservation['specialrequests']:'No special requests' ?></td>
          <td ><?= $reservation['reservationstatus'] ?></td>
          
        
       
            </tr>
            <?php endforeach; ?>
            
            
        
        </tbody>
    </table>

</div>

   
 




            
 

       
</div>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>
