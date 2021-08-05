<?php
session_start();
include 'dbconnect.php';
include 'navbar.php';

?>
<style>
.body
{
    font-family: 'Lato', 'sans-serif';
    }
.profile 
{
    min-height: 355px;
    display: inline-block;
    }
figcaption.ratings
{
    margin-top:20px;
    }
figcaption.ratings a
{
    color:#f1c40f;
    font-size:11px;
    }
figcaption.ratings a:hover
{
    color:#f39c12;
    text-decoration:none;
    }
.divider 
{
    border-top:1px solid rgba(0,0,0,0.1);
    }
.emphasis 
{
    border-top: 4px solid transparent;
    }
.emphasis:hover 
{
    border-top: 4px solid #1abc9c;
    }
.emphasis h2
{
    margin-bottom:0;
    }
span.tags 
{
    background: #1abc9c;
    border-radius: 2px;
    color: #f5f5f5;
    font-weight: bold;
    padding: 2px 4px;
    }
.dropdown-menu 
{
    background-color: #34495e;    
    box-shadow: none;
    -webkit-box-shadow: none;
    width: 250px;
    margin-left: -125px;
    left: 50%;
    }
.dropdown-menu .divider 
{
    background:none;    
    }
.dropdown-menu>li>a
{
    color:#f5f5f5;
    }
.dropup .dropdown-menu 
{
    margin-bottom:10px;
    }
.dropup .dropdown-menu:before 
{
    content: "";
    border-top: 10px solid #34495e;
    border-right: 10px solid transparent;
    border-left: 10px solid transparent;
    position: absolute;
    bottom: -10px;
    left: 50%;
    margin-left: -10px;
    z-index: 10;
    }

  </style>
<script type="text/javascript">
function cancel()	{
var txt;
var r = confirm("Are you sure you want to cancel the ticket?");
if (r == true) {
    
} else {
    event.preventDefault();
}
}
</script>

 &nbsp




<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Your movie Voucher</h3>
  </div>
  <div class="panel-body">
    



<?php
$name=$_SESSION['username'];
$bid=$_GET['booking_id'];

 $sql = "SELECT * from booking where username='$name' AND booking_id='$bid' ";
      $sql=mysqli_query($conn,$sql);
       
      ?>   



<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2><?php 
                    		//$sql = "SELECT * from booking where username='$name' ";
     						//$sql=mysqli_query($conn,$sql);
                    	 	$ticket=mysqli_fetch_array($sql);
                    	 	$m=$ticket['booked_movie_name'];
              

                    	echo $ticket['username'];?> </h2>
                    <p><strong>Movie name : </strong> <?php echo $ticket['booked_movie_name'];?> </p>
                    <p><strong>Show Date : </strong><?php echo $ticket['Datee'];?></p>
                    <p><strong>Show Time : </strong><?php echo $ticket['Timee'];?></p>
                    <p><strong>Number of tickets : </strong><?php echo $ticket['no_of_seats'];?></p>
                    <p><strong>Total Price : </strong><?php echo $ticket['no_of_seats']*450;?></p>
                    <p><strong>Confirmation Code : </strong><?php echo $_SESSION['code'];?></p>

                </div>       
                <?php 
                	$sql1="SELECT * from movie where movie_name='$m' ";
					$sql1=mysqli_query($conn,$sql1);
					$movie=mysqli_fetch_array($sql1);
                ?>

                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="data:image/jpeg;base64, <?php echo $movie['movie_image']?>" alt="" class="img-circle img-responsive">
                        <figcaption class="ratings">
                            <p>Ratings
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                 <span class="fa fa-star-o"></span>
                            </a> 
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div>      

            <div class="col-xs-12 divider text-center">
                <small style="color:grey">Please Visit one hour before the booking time. <br>And please note the confirmation code for taking tickets. Thank you!!!</small><br>

                <div class="col-xs-12 col-sm-4 emphasis">
                    
                    <?php echo "<a href='cancelticket.php?booking_id=".$ticket['booking_id']."&user_id=".$ticket['user_id']."' class='btn btn-primary' role='button' data-dismiss='alert' onclick='cancel()'>Cancel Ticket</a>" ?>
                </div>
                
                <div class="col-xs-12 col-sm-8 emphasis">
                    
                    <div class="btn-group dropup btn-block">
                      <a href="mytickets.php"><button type="button" class="btn btn-primary pull-right"> My tickets </button></a>

                      
                    </div>
                </div>

            </div>

    	 </div> 

		</div>

	</div>

</div>


  </div>
</div>	

<br/>
<?php
include 'footer.php';

?>


