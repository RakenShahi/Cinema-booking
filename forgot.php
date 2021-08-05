<?php
session_start();
include 'dbconnect.php';
include 'navbar.php';

?>
<form class="form-horizontal"  method="post" action="forgotpassword.php" name="form1">
                <div class="container"><h2>Forgot password?</h2>
                
</div>
<hr>

                
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email : </label>
                    <div class="col-sm-5">
                        <input type="email" id="email" name="email" placeholder="Email"  class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="question" class="col-sm-3 control-label">Enter your question : </label>
                    <div class="col-sm-5">
                        <input type="text" id="question" name="question"  placeholder="Enter your question to reset password." class="form-control" autofocus>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="answer" class="col-sm-3 control-label">Enter your Answer : </label>
                    <div class="col-sm-5">
                        <input type="text" id="answer" name="answer" placeholder="Enter answer." class="form-control" autofocus>
                        
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-3">
                        <button type="submit" class="btn btn-info btn-block" >Submit</button>
                    </div>
                </div>
            </form> <!-- /form -->


<?php

include'footer.php';
?>