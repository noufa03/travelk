<?php require base_path('views/partials/restaurants/styles.php') ?>
<?php require base_path('views/partials/restaurants/styles/table.php') ?>
<?php require base_path('views/partials/rental/sidebar_car.php') ?>
<div class="main--content">
    <?php require base_path('views/partials/restaurants/heading.php') ?>
    <h3 style="color: brown;">Past Bookings</h3>
    <div class="table--content">
        <table>
            <thead>
                <tr>
                   
                    <th>Customer Details</th>
                    <th>Trip Details</th>
                    <th>Payment Details</th>
                   
                    <th>Ratings</th>
                    <th>Ride completed</th>
                    <th>Booking status</th>
                    <th>Confirmation</th>
                   
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($past_bookings as $past_booking) : ?>
                    <tr>
                   
                        <td>
                            Customer Name:<?= $past_booking['customername'] ?><br>
                            Contact Info:<?= $past_booking['contactnumber'] ?><br>
                            Email:<?= $past_booking['emailaddress'] ?>
                        </td>
                        <td>
                            Pickup Date:<?= $past_booking['pickupdate'] ?><br>
                           
                            Pickup Location:<?= $past_booking['pickuplocation'] ?><br>
                            Dropoff Location:<?= $past_booking['dropofflocation'] ?><br>
                            Rental Duration(hours):<?= $past_booking['rentalduration'] * 24 ?>
                        </td>
                        <td>
                            Payment Status: <?= htmlspecialchars($past_booking['paymentstatus']) ?><br>
                            Payment Method:<?= $past_booking['paymentmethod'] ?><br>
                            Total:<?= $past_booking['totalcost'] ?>
                        </td>
                      
                       
                        <td><?= $past_booking['rating'] ?></td>
                        <td><?= $past_booking['ridecompleted'] == 0 ? 'NO' : 'YES' ?></td>
                        <td><?= $past_booking['confirmation_of_driver'] == 1 ? 'Confirmed' : 'Cancelled' ?></td>
                        <td> <?$past_booking['bookingcancelled']==1?'cancelled':'active'?><br>
                          <?= $past_booking['cancellationreason'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>


    </div>
    <h3 style="color: brown;">Future Bookings</h3>
    <h4 style="color:green;text-align:center">Confirmed Bookings</h4>

    <div class="table--content">
        <table>
            <thead>
                <tr>
                    <th>Customer Details</th>
                    <th>Trip Details</th>
                    <th>Payment Details</th>
                   
                    <th>Ratings</th>
                    <th>Ride completed</th>
                    <th>Booking Status</th>
                    <th>Confirmation</th>
                    
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($future_bookings_confirmeds as $future_bookings_confirmed) : ?>
                    <tr>
                        <td>
                            Customer Name:<?= $future_bookings_confirmed['customername'] ?><br>
                            Contact Info:<?= $future_bookings_confirmed['contactnumber'] ?><br>
                            Email:<?= $future_bookings_confirmed['emailaddress'] ?>
                        </td>
                        <td>
                            Pickup Date:<?= $future_bookings_confirmed['pickupdate'] ?><br>
                          
                            Pickup Location:<?= $future_bookings_confirmed['pickuplocation'] ?><br>
                            Dropoff Location:<?= $future_bookings_confirmed['dropofflocation'] ?><br>
                            Rental Duration(hours):<?= $future_bookings_confirmed['rentalduration']  ?>
                        </td>
                        <td>
                            Payment Status: <?= htmlspecialchars($future_bookings_confirmed['paymentstatus']) ?><br>
                            Payment Method:<?= $future_bookings_confirmed['paymentmethod'] ?><br>
                            Total:<?= $future_bookings_confirmed['totalcost'] ?>
                        </td>
                      
                    
                        <td><?= $future_bookings_confirmed['rating'] ?></td>
                        <td><?= $future_bookings_confirmed['ridecompleted'] == 0 ? 'NO' : 'YES' ?></td>
                        <td> 
                        <?=$future_bookings_confirmed['bookingcancelled']==1?'cancelled':'active'?><br>
                          <?= $future_bookings_confirmed['cancellationreason'] ?>
                        </td>
                        <td>
                        <?= $future_bookings_confirmed['confirmation_of_driver'] == 1 ? "Confirmed" : "Cancelled" ?>
                        </td>
                        <td>
                          <button 
                            style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;"
                            onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';"
                            onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                            
                        >
                          <a href="/bookings/update?id=<?= urlencode($future_bookings_confirmed['bookingid'] ?? '') ?>">Cancel</a>

                        </button>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <h4 style="color:green;text-align:center;overflow:hidden">Pending Bookings</h4>
    <div class="table--content" style="overflow:hidden">
        <table>
            <thead>
                <tr>
                  <th>Customer Details</th>
                    <th>Trip Details</th>
                    <th>Payment Details</th>
                   
                    <th>Ratings</th>
                    <th>Ride completed</th>
                    <th>Booking Status</th>
                    <th>Confirmation</th>
                
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($future_bookings_cancelleds as $future_bookings_cancelled) : ?>
                    <tr>
                       
                     
                        <td>
                            Customer Name:<?=  $future_bookings_cancelled['customername'] ?><br>
                            Contact Info:<?=  $future_bookings_cancelled['contactnumber'] ?><br>
                            Email:<?=  $future_bookings_cancelled['emailaddress'] ?>
                        </td>
                        <td>
                            Pickup Date:<?=  $future_bookings_cancelled['pickupdate'] ?><br>
                      
                            Pickup Location:<?=  $future_bookings_cancelled['pickuplocation'] ?><br>
                            Dropoff Location:<?=  $future_bookings_cancelled['dropofflocation'] ?><br>
                            Rental Duration(hours):<?=  $future_bookings_cancelled['rentalduration'] * 24 ?>
                        </td>
                        <td>
                            Payment Status: <?= htmlspecialchars( $future_bookings_cancelled['paymentstatus']) ?><br>
                            Payment Method:<?=  $future_bookings_cancelled['paymentmethod'] ?><br>
                            Total:<?=  $future_bookings_cancelled['totalcost'] ?>
                        </td>
                      
           
                        <td><?=  $future_bookings_cancelled['rating'] ?></td>
                        <td><?=  $future_bookings_cancelled['ridecompleted'] == 0 ? 'NO' : 'YES' ?></td>
                        
                        <td> 
                           <?$future_bookings_cancelled['bookingcancelled']==1?'cancelled':'active'?><br>
                           <?= $future_bookings_cancelled['cancellationreason'] ?>
                        </td>

                        <td><?= $future_bookings_cancelled['confirmation_of_driver'] == 1 ? "Confirmed" : "Cancelled" ?></td>
                      
                        <td>
                          <button style="background: linear-gradient(90deg, #76c07d, #60a56a); color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: transform 0.2s ease, background 0.3s ease;"
                            onmouseover="this.style.transform='scale(1.05)'; this.style.background='linear-gradient(90deg, #60a56a, #76c07d)';"
                            onmouseout="this.style.transform='scale(1)'; this.style.background='linear-gradient(90deg, #76c07d, #60a56a)';"
                            > <a href="/bookings/update?id=<?= $future_bookings_cancelled['bookingid'] ?>">Confirm</a>
                    
                    </button>
                     </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
<script>
   const toggleButton = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');
    const copyright = document.querySelector('#copyright');




    function toggleSidebar() {
        sidebar.classList.toggle('close')
        toggleButton.classList.toggle('rotate')
        
            if (copyright.style.display === "none") {
        copyright.style.display = "block";
    } else {
        copyright.style.display = "none";
    }

        CloseAllSubMenus()


    }


    function toggleSubMenu(button) {

        if (!button.nextElementSibling.classList.contains('show')) {
            closeAllSubMenus()
        }


        button.nextElementSibling.classList.toggle('show')
        button.classList.toggle('rotate')

        if (sidebar.classList.contains('close')) {
            sidebar.classList.toggle('close')
            toggleButton.classList.toggle('rotate')
        }


    }
 
    function closeAllSubMenus() {

        Array.from(sidebar.getElementsByClassName('show')).forEach((ul) => {
            ul.classList.remove('show');
            ul.previousElementSibling.classList.remove('rotate');
        });


    }
    function openPopup(tableid) {
        var popup = document.getElementById('popup-' + tableid); 
        popup.classList.add("open-popup"); 
    }

    function closePopup(tableid) {
        var popup = document.getElementById('popup-' + tableid); 
        popup.classList.remove("open-popup"); 
        window.location.href = "/tables";
    }


</script>
<?php require (BASE_PATH.'views/partials/user/toast.php');?>
<?php require base_path('views/partials/rental/js/bookings.php') ?>

<?php require base_path('views/partials/footer.php') ?>