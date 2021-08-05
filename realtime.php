<?php
session_start();
include 'dbconnect.php';
include 'navbar.php';
$datetime=new Datetime('tomorrow');
$newdatetime=new Datetime('tomorrow');
$newdatetime->modify('+1 day');
$sql="SELECT * from movie where movie_status='nowshowing'";
  	$sql=mysqli_query($conn,$sql);

?>

<form class="form-horizontal"  method="post" action="realseat.php" name="form1">
                <div class="container"><h2>Real time booking</h2>
                
</div>
<hr>

                <div class="form-group">
                    <label for="fullName" class="col-sm-3 control-label">Movie name : </label>
                    <div class="col-sm-5">
                        <select name="movie_name">
                        		
                        <?php while ($movie=mysqli_fetch_array($sql)){ ?>
                        	<option value="<?php echo $movie['movie_name']?>"><?php echo $movie['movie_name']?></option>

                        	<?php }?>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="Date" class="col-sm-3 control-label">Date : </label>
                    <div class="col-sm-9">
                        <select name="date">
						  <option value=<?php echo date("Y-m-d");?>><?php echo date("Y-m-d");?></option>
						 <option value=<?php echo $datetime->format('Y-m-d');?>><?php echo $datetime->format('Y-m-d');?></option>
						  <option value=<?php echo $newdatetime->format('Y-m-d');?>><?php echo $newdatetime->format('Y-m-d');?></option>

						</select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Time" class="col-sm-3 control-label">Time : </label>
                    <div class="col-sm-3" >
                        <select name="time">
						<option value=7:00 AM >7:00 AM</option>
						<option value=12:00 PM>12:00 PM</option>
						<option value=4:00 PM>4:00 PM</option>
						</select>
                    </div>
                </div>
                
               




                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-3">
                        <button type="submit" class="btn btn-info btn-block">Book</button>
                    </div>
                </div>
            </form> <!-- /form -->




<?php
include 'footer.php';
?>