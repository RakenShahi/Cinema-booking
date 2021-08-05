<?php
session_start();
include 'dbconnect.php';
include 'navbar.php';

?>

 &nbsp
<div class="page-header" style="padding: 0px">
  <h1>All users <br</h1>
</div>
<?php
$name=$_SESSION['username'];


 $sql = "SELECT * from users";
      $sql=mysqli_query($conn,$sql);
       
      ?>  
<table class="table table-striped">
  <tr> 
 <th> #User id</th>
 <th> User Name</th>
 <th> User Email</th>
 <th> Gender</th>
 <th> Location</th>
 <th> Contact </th>
 <th> Access</th>
 <th>Confirmation code</th>
 <?php if(isset($_SESSION['admin'])){ ?>
<th>Edit Access of user</th>
 <?php } ?>
 
 </tr>
 <?php
while($ticket=mysqli_fetch_array($sql)){ ; 
 ?>
 <tr>
 <td><?php echo $ticket['user_id'];?></td>
 <td><?php echo $ticket['user_name'];?></td>
 <td><?php echo $ticket['user_email'];?></td>
 <td><?php echo $ticket['gender'];?></td>
 <td><?php echo $ticket['location'];?></td>
 <td><?php echo $ticket['mobile'];?></td>
 <td><?php echo $ticket['access'];?></td>
 <td><?php echo $ticket['Confirmation_code'];?></td>
 <?php if(isset($_SESSION['admin'])){ ?>
 <td><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="modal" data-target="#Edit" aria-haspopup="true" aria-expanded="false">Edit access</button> </td>

 <!--modal box ko start-->

<div class="modal fade" tabindex="-1" role="dialog" id="Edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit User Access</h4>
      </div>
      <div class="modal-body">
        <FORM method="POST" action="editaccess.php">
          <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">User id:</label>
                    <div class="col-sm-9">
                        <input type="text" id="id" placeholder="id" class="form-control" name="id">
                    </div>
                    </div>
          &nbsp
                    
          <div class="form-group">
                    <label for="Access type" class="col-sm-3 control-label">Access type:</label>
                    <div class="col-sm-9">
                        <select name="access">
						  <option value=<?php echo "admin";?>>Admin</option>
						 <option value=<?php echo "normal";?>>Normal</option>
						  <option value=<?php echo "accountant";?>>Accountant</option>

						</select>
                        &nbsp
                    </div>
                </div>


 

          <div align="right" style="position:relative;">
          <input type=submit class="btn btn-info" value="Update">


          </div>
          
               </FORM>

          
          

          
      </div>
      
      <?php include'footer.php';?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

 <?php } ?>

 
 <?php 
}

?>
</table>



<?php
include 'footer.php';

?>
