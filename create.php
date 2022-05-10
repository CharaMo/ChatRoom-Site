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
<div class='container frm'>


		<form action="" method=post id='frmcreate'>
		<h2><b>Create a new Chatroom</b></h2><br>
		  <div class="form-group">
              <label for="chat">Name of Chatroom</label>
              <input type="text" class="form-control" id="mtitle" name='roomname' placeholder="Enter the name of Chatroom ex. Holidays" required>
            </div>
		  <input type="submit" name="Create" class='btn btn-primary btn2' value='Create'> 
		  </form>
		  
		  <div class='msg'>
		  </div>
</div>
<?php
include "down.php";
?>