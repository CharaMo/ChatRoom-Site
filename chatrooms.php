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

<div class='container'>
<div class='row'>
	<div class='col-md-12' id=cont2>
	
	</div>
</div>
</div>

<script>getallChatrooms();</script>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id='mtitle'>Chat Request</h4>
        </div>
        <div class="modal-body" id='mbody'>
      
        </div>
        <div class="modal-footer" id='mfooter'>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
	 </div>
</div>

<?php
include "down.php";
?>