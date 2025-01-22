<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/sidebar.php') ?>


 <div class="main--content" >
 <?php require base_path('views/partials/restaurants/header.php') ?>
<?php require base_path('views/partials/restaurants/heading.php') ?>



<div class="table--content">
<table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Table ID</th>
                <th>booking_date</th>
                <th>booking_time</th>
                <th>guests</th>
                <th>special_requests</th>
                <th>status</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($reservations as $reservation) : ?>
            <tr>
            <td ><?=$reservation['booking_id'] ?></td>
          <td ><?=$reservation['tableid'] ?></td>
          <td ><?=$reservation['booking_date'] ?></td>
          <td ><?=$reservation['booking_time'] ?></td>
          <td ><?=$reservation['guests'] ?></td>
          <td ><?=$reservation['special_requests'] ?></td>
          <td ><?=$reservation['status'] ?></td>
          
          <td >
       
          <a href="/menu/edit?id=<?= $reservation['resevationID']  ?>"  class="edit" >   <button >Edit   </button></a>
       
      
          </td>
          <td >
              <form id="delete-form" method="POST" action="/menu/delete">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="resevationID" value="<?= $resevation['resevationID']  ?>">
                <button type="submit" class="delete">Delete</button>
            </form>
       
          </td>
       
            </tr>
            <?php endforeach; ?>
        
        </tbody>
    </table>

</div>

   
 




            
 

       
</div>
<?php require base_path('views/partials/restaurants/filejs.php') ?>
<?php require base_path('views/partials/footer.php') ?>
