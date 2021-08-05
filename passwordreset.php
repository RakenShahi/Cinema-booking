<?php
session_start();
include 'dbconnect.php';
include 'navbar.php';
$email=$_GET['email'];

?>
<form class="form-horizontal"  method="post" action="password.php" name="form1">
                <div class="container"><h2>Password reset</h2>
                
</div>
<hr>

                
                <input type=hidden value="<?php echo $email;?>" name="email" id='email'>
                <div class="form-group">
                    <label for="question" class="col-sm-3 control-label">Enter new password : </label>
                    <div class="col-sm-5">
                        <input type="password" id="newp" name="newp"  placeholder="Enter new password" class="form-control" autofocus>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="answer" class="col-sm-3 control-label">Confirm password : </label>
                    <div class="col-sm-5">
                        <input type="password" id="conp" name="conp"  placeholder="Confirm password" class="form-control" autofocus>
                        
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-3">
                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                    </div>
                </div>
            </form> <!-- /form -->


<?php

include'footer.php';
?>