<?php include 'navbar.php';?>
<?php if (isset ($_GET['name']) && isset($_GET['email'])) {
    $name = htmlentities($_GET['name']);
    $email = htmlentities($_GET['email']);
    $gender = htmlentities($_GET['gender']);
}
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

 // post image show START
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_post_image').css({visibility: 'visible'});
                    $('#show_post_image')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        // post image show END

        function numcheck(inputtxt)  
{  
  var phoneno = /^\d{10}$/;  
  if(inputtxt.value.match(phoneno))  
  {  
      return true;  
  }  
  else  
  {  
     alert("Please enter a valid Phone Number");  
      event.preventDefault();  
  }  
  }  
          
</script>

<div class="white" style="color: #11a2345  ">

<div class="container">
</div>  
        
            <form class="form-horizontal"  method="post" action="signup.php" name="form1">
                <div class="container"><h2>Sign up once and Easily book the tickets.</h2>
                
</div>
<hr>

                <div class="form-group">
                    <label for="fullName" class="col-sm-3 control-label">Full Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="name" name="name" value="<?php if(isset($name)) {echo $name;} ?>" placeholder="Full Name" class="form-control" autofocus>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="userName" class="col-sm-3 control-label">User Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="username" name="username"  placeholder="User Name" class="form-control" autofocus>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" id="email" name="email" placeholder="Email" value="<?php if(isset($email)) {echo $email;} ?>" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="Location" class="col-sm-3 control-label">City</label>
                    <div class="col-sm-5">
                        <select id="Location"  name="Location" class="form-control">
                            <option>Kathmandu</option>
                            <option>Bhaktapur</option>
                            <option>Patan</option>
                            <option>Banepa</option>
                            <option>Other</option>
                            
                        </select>
                    </div>
                </div> <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" name="Gender" <?php if (isset ($gender)){ if($gender == "female") {echo "checked";} }?> id="Femaleradio" value="2">Female
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="maleradio" value="1" <?php if (isset ($gender)) { if($gender == "male") {echo "checked";} } ?> name="Gender">Male
                                </label>
                            </div>
                           
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                
               <div class="form-group">
                    <label for="Mobile Number" class="col-sm-3 control-label" >Mobile Number</label>
                    <div class="col-sm-5">
                        <input type="text" id="Mobile" name="Mobile" placeholder="Mobile Number" class="form-control" autofocus>
                        
                    </div>
                </div>

                <div class="form-group">
                    <label for="question" class="col-sm-3 control-label">Enter Question</label>
                    <div class="col-sm-5">
                        <input type="text" id="question" name="question"  placeholder="Enter question for backup reset of password" class="form-control" autofocus>
                        
                    </div>
                </div>

                <div class="form-group">
                    <label for="answer" class="col-sm-3 control-label">Answer</label>
                    <div class="col-sm-5">
                        <input type="text" id="answer" name="answer"  placeholder="Enter answer" class="form-control" autofocus>
                        
                    </div>
                </div>


                	
               <!--  <div class="form-group">
                    <label for="Profile Picture" class="col-sm-3 control-label">Profile Picture</label>
                    <div class="col-sm-9">
                        
    				<input type="file" name="movie_image" id="movie_image" accept="image/*"  onchange="readURL(this);"/><br/>
                        
                        <img id="show_post_image" src="#" alt="your image"  />
                    </div>
                </div> -->


                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-3">
                        <button type="submit" class="btn btn-info btn-block" onclick="numcheck(document.form1.Mobile)">Register</button>
                    </div>
                </div>
            </form> <!-- /form -->
<br>


         <!-- ./container -->
         <?php include'footer.php'?>
        

       
