<?php
session_start();
if(@$_SESSION['idu']=='')
{
	echo 'error';
	die();
}
include "up.php";
include "menu.php";
?>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
 background-color:#E6E6FA;
 color: black;
}
</style>

<div class='container prof'>
	<div class='row'>
	
		<form action="" method=post id='frmprof' style="max-width:500px;margin:auto">
		<h2><b> My Profile</b></h2><br>
		  <div class="input-container">
			<i class="fa fa-user icon"></i>
			<input class="input-field" type="text" class='form-control' placeholder="Enter your username" name="username" id='username' required>
		  </div>

		  <div class="input-container">
			<i class="fa fa-user icon"></i>
			<input class="input-field" type="text" class='form-control' placeholder="Enter your name" name="name" id='name' required>
		  </div>
		  
		  <div class="input-container">
			<i class="fa fa-user icon"></i>
			<input class="input-field" type="text" class='form-control' placeholder="Enter your surname" name="surname" id='surname' required>
		  </div>
		  
		  <div class="input-container">
			<i class="fa fa-key icon"></i>
			<input class="input-field" type="password" class='form-control' placeholder="Enter your password" name="pwd" id='pwd' required>
		  </div>
		  
		  <div class="input-container">
			<i class="fa fa-envelope icon"></i>
			<input class="input-field" type="email" class='form-control' placeholder="Enter your email" name="email" id='email' required>
		  </div>

		  <input type="submit" name="Save" class='btn btn-primary btn1' value='Save'> 
	  <br><br>
	
	
		</form>
	</div>
	<div class= "msg">
  
</div>
</div>

<script>getmyData();</script>

<?php
include "down.php";
?>