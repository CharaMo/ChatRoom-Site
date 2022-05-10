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

<button class="open-button" onclick="openForm()" id='chat'>Chat</button>

<div class="chat-popup" id="myForm">
  <form action="" class="form-container" id="formchat" method=post >
    <div class='chatcont' id=msg2>
	
	</div>
	
	
    <textarea placeholder="Type message.." name="msg" id='msg' required>
	</textarea>
	<input type=hidden name=color id=color>
    <button type="submit" class="btn" name="Save" value='Save'>Send</button>
	<button type='button' class='btn color1' id=cl1 onclick='setColor(0)'></button>
	<button type='button' class='btn color2' id=cl2 onclick='setColor(1)'></button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	
	<button type='button' class='btn color3' id=cl3 onclick='setColor(2)'></button>
	<button type='button' class='btn color4' id=cl4 onclick='setColor(3)'></button>
</div>
<input type=hidden name='id1' id=id1 value='<?php echo $_GET['id']; ?>'>

<script>Chatnow(<?php echo $_GET['id']; ?>);

setInterval(function(){getMessages()},1000);





</script>




