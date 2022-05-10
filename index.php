<?php
include "up.php";
?>

<div style='height:400px;'>
<div class='container up1'>
	<div class='row'>
		<div class='col-md-3'>
		</div>
		<div class='col-md-6'>
			<h1>WELCOME <i  id='i1' class='far'>&#xf086;</i> </h1>
		
			
		</div>
		<div class='col-md-3 '>
		
		</div>
	</div>
</div>
</div>

<div class='container up3'>
	<div class='row'>
		<div class='col-md-9'>
		</div>
		<div class='col-md-3 up2 '>
		<button type="button" class="btn btn-default btn-lg" id="myBtn" > Login <i class="fa fa-sign-in"></i></button>
		
		<h3>Not a member?  <br><a href='signup.php'>Sign up </a>now!</h3>
		</div>
	</div>

</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form action="" method=post id='frmlogin'>
		 
            <div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
              <input type="email" class="form-control" id="email" name='email' placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="pwd"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="pwd" name='pwd' placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
			
              <button type="submit" class="btn btn-success btn-block" name='login' value='login'><span class="glyphicon glyphicon-off"></span>  Login</button>
          </form>
        </div>
        <div class="modal-footer" style='background-color:#f9f9f9; padding:20px;'>
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="signup.php">Sign Up</a></p>
         </div>
	  <div class= "msg">
        </div>
      
  
</div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});
</script>