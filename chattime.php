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

<script>Chattime();</script>