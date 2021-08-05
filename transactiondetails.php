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

<br>




<form class="form-horizontal"  method="post" action="transactionmovie.php" name="form1">
                <div class="container"><h2>Today's Transactions</h2>
                
</div>
<hr>
                 <div class="form-group">
                <center class="col-sm-4">View transaction by :- </center><br>
                </div>
              
                <div class="form-group">
                    <label for="movie_name" class="col-sm-3 control-label">Movie name </label>
                    <div class="col-sm-5">
                        <select name="movie_name">
                            
                        <?php while ($movie=mysqli_fetch_array($sql)){ ?>
                          <option value="<?php echo $movie['movie_name']?>"><?php echo $movie['movie_name']?></option>

                          <?php }?>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group">
                    
                </div>



                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-3">
                        <button type="submit" class="btn btn-info btn-block" >Submit</button>
                    </div>
                </div>
            </form> <!-- /form -->


<hr><br>
<center class="col-sm-6" style="position: absolute;"><a href="transaction.php"><button class="btn btn-info" type="button">Total today's collection  </button></a></center>
&nbsp
&nbsp<br>

&nbsp<br>
&nbsp
&nbsp


<?php

include'footer.php';
?>