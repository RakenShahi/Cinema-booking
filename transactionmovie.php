<?php
session_start();
include 'dbconnect.php';
include 'navbar.php';
$t=0;
$movie_name=$_POST['movie_name'];
?>

&nbsp
<div class="page-header" style="padding: 0px">
  <h1>Today's transaction</small></h1>



</div>
<?php
      $sql = "SELECT * from account where booked_movie_name='$movie_name'";
      $sql=mysqli_query($conn,$sql);
      
      
      
      ?>
<table class="table table-condensed">
 <tr> 
 <th> #Booking ID</th>
 <th> #User ID</th>

 <th> Movie  Name</th>
 <th> Show time</th>
 <th> Show date </th>
 <th> Number of Tickets </th>
 <th>price</th>
 </tr>

 <?php
  while($ticket=mysqli_fetch_array($sql)){;
$t=$t+$ticket['price'];
      ?>
 <tr> 
 <td> <?php echo $ticket['booking_id']; ?></td>
 <td> <?php echo $ticket['user_id']; ?></td> 
 
 <td> <?php echo $ticket['booked_movie_name']; ?>e</td>
 <td> <?php echo $ticket['Timee']; ?></td>
 <td> <?php echo $ticket['Datee']; ?> </td>
 <td><?php echo $ticket['no_of_seats']; ?></td>
  <td><?php echo $ticket['price']?></td>
 </tr>
 <?php }?>
</table>
<hr>

<div class="container">
<div class="page-footer" style="padding: 0px">
  <h3>&nbspTotal collection = <?php echo $t?></h3>


</div>
</div>
<br>
<?php

include'footer.php';
?>