var urlmsg="api/api.php?q=19&id=";

$(document).ready(function(){
		
	$('#frmsign').submit(function(event){
		event.preventDefault();
		
		$.post("api/api.php?q=1", $('#frmsign').serialize(), function(res)
		{
			
			 if(res=="ok"){
				 $('#frmsign').hide(500);
				 $(".msg").html("<div class=\"alert alert-success\"><strong>Success!</strong> \"You can <a href=\"index.php\" class=\"alert-link\"> login </a>now.\"</div>");
			 }
			 
			 else{
				 $('#frmsign').hide(500);
				 $(".msg").html("<div class=\"alert alert-warning\"><strong>Warning!</strong>\"Your email exists. <a href=\"signup.php\" class=\"alert-link\"> Sign up </a> again.\"</div>");
			 }
		});
	});
	
	
	$('#frmlogin').submit(function(event) {
		event.preventDefault();

		
		$.post("api/api.php?q=2", $('#frmlogin').serialize(), function(res)
		{
			
			if(res=="ok"){
				window.location.href="chatrooms.php";
			}
			
			else{
				$('#frmlogin').hide(500);
				 $(".msg").html("<div class=\"alert alert-warning\"><strong>Warning!</strong>\"Email or password is wrong. <a href=\"index.php\" class=\"alert-link\"> Login </a> again.\"</div>");
			}
			
		});
	});
	
	
	$('#frmprof').submit(function(event){
		event.preventDefault();
		
		$.post("api/api.php?q=5", $('#frmprof').serialize(), function(res)
		{
			if(res=="ok"){
				$('#frmprof').hide(500);
				$(".msg").html("<div class=\"alert alert-success\"><strong>Success!</strong>\"Your data updated\"</div>");
			}
			else{
				$('#frmprof').hide(500);
				$('.msg').html("<div class=\"alert alert-warning\"><strong>Warning!</strong>\"Data error <a href=\"myprofile.php\" class=\"alert-link\"> Try again</a>\"</div>");
			}
		});
	});
	
	
	$('#frmcreate').submit(function(event){
		event.preventDefault();
		
		$.post("api/api.php?q=6", $('#frmcreate').serialize(), function(res)
		{
			console.log(res);
			if(res=="ok"){
				$('#frmcreate').hide(500);
				$(".msg").html("<div class=\"alert alert-success\"><strong>Success!</strong>\"Your chatroom is created\"</div>");
			}
			else{
				$('#frmcreate').hide(500);
				$('.msg').html("<div class=\"alert alert-success\"><strong>Warning!</strong>\"Try again\"</div>");
				
			}
		});
	});
	
	
	$('#formchat').submit(function(event){
		event.preventDefault();
		var id1=$("#id1").val();
		var c=$("#msg").css("color");
		$.post("api/api.php?q=18&id="+id1, $('#formchat').serialize(), function(res)
		{
			
			if(res=="ok"){
				
				$.get(urlmsg+id1, function(res){
					var js=JSON.parse(res);
					$('#msg').val("");
					for (i=0;i<js.length;i++){
			if(js[i].myid==js[i].ms_uid)
				$("#msg2").append("<div class=mymsg><h4><b>"+js[i].uusername+" says:</b></h4><p style='color:"+js[i].color+"'>"+js[i].mstext+"</p><h><i>"+js[i].msdatetime+"<i></h6></div><br><br>");
				else
			$("#msg2").append("<div class=othermsg><h4><b>"+js[i].uusername+" says:</b></h4><p>"+js[i].mstext+"</p><h><i>"+js[i].msdatetime+"<i></h6></div><br><br>");
			
			}
						
						var msg2=document.getElementById("msg2");
							msg2.scrollTop = msg2.scrollHeight+100;
					});
				
				
				
			}
			else{
				alert("error");
			}
		});
	});
		
	
	
	
});
	
	
	function getmyName(){
		
		$.get("api/api.php?q=3", function(res){
			var js=JSON.parse(res);
			
			html1="";
			for(i=0;i<js.length;i++)
			{
				html1+="<div class=pg><i  class='fas'>&#xf2bd;</i>  Hello "+js[i].uusername+"</div>";
			}
			$("#cont").html(html1);
		});
	}
	
	function getmyData(){
		$.get("api/api.php?q=4", function(res){
			var js=JSON.parse(res);
			$('#username').val(js.uusername);
			$('#name').val(js.uname);
			$('#surname').val(js.usurname);
			$('#pwd').val(js.upass);
			$('#email').val(js.uemail);
		});
	}
	
	
	function getmyChatrooms(){
		
		$.get("api/api.php?q=7", function(res){
		
			var js=JSON.parse(res);
			html1="";
			html1="<h2><b>My Chatrooms</b></h2>"
			html1+=" <table class='table table-hover tt1'>";
			html1+="<tr><th>Chatroom name</th><th>Members</th><th>Requests</th><th>Delete</th></tr>";
				for(i=0;i<js.length;i++){
					
					html1+="<tr><td>"+js[i].rname+"</td><td style='cursor:pointer' onclick=\"showmembers("+js[i].rid+")\">"+js[i].m+"</td><td id='rqs' style='cursor:pointer' onclick=\"showrequests("+js[i].rid+")\">"+js[i].r+"</td><td><i class=\"fa fa-trash\" id='cnt'<h2 style='cursor:pointer' onclick=\"putmymodal("+js[i].rid+")\"></i></td></tr>";
					
				
				}
				html1+="</table>";
				
				$("#cont1").html(html1);
		});
		
	}
	
	function showmembers(id1){
		$.get("api/api.php?q=15&id="+id1, function (res){
			
			var js=JSON.parse(res);
			$("#mtitle").html('All Members');
				html1="";
				html1+=" <table class='table table-hover tt1'>";
				html1+="<tr><th>Username</th><th>Delete</th></tr>";
				
				for (i=0;i<js.length;i++){
					
					html1+="<tr><td>"+js[i].uusername+"</td><td><i class=\"fa fa-ban\" id='cnt'<h2 style='cursor:pointer' onclick=\"ignorerequest("+js[i].m_rid+","+js[i].uid+")\"></i></td>";
			
				}
				html1+="</table>";
				$("#mbody").html(html1);
		
					$("#myModal").modal('show');
			});
			
		
		
	}
	
	
	
	function showrequests(id1){
		
		$.getJSON("api/api.php?q=12&id="+id1, function (js){
			
		
				$("#mtitle").html('All Requests');
				html1="";
				html1+=" <table class='table table-hover tt1'>";
				html1+="<tr><th>Username</th><th>Accept</th><th>Not Accept</th></tr>";
				
				for (i=0;i<js.length;i++){
					
					html1+="<tr><td>"+js[i].uusername+"</td><td><i class=\"fa fa-check\" id='cnt'<h2 style='cursor:pointer' onclick=\"checkrequest("+js[i].m_rid+")\"></i></td><td><i class=\"fa fa-ban\" id='cnt'<h2 style='cursor:pointer' onclick=\"ignorerequest("+js[i].m_rid+","+js[i].uid+")\"></i></td>";
			
				}
				html1+="</table>";
				$("#mbody").html(html1);
		
					$("#myModal").modal('show');
			});
			
		
	}
	
	
	
	
	function checkrequest(){
		$.get("api/api.php?q=13", function(res){
			$("#myModal").modal('hide');
				
				getmyChatrooms();
			
		});
	}
	
	function ignorerequest(id1,id2){
		$.get("api/api.php?q=14&rid="+id1+"&uid="+id2, function(res){
			$("#cnt"+id1).remove();
				$("#myModal").modal('hide');
				console.log(res);
				getmyChatrooms();
			
		});
	}
	
	
	
	function putmymodal(id1){
		
		
			
			$.get("api/api.php?q=8&id="+id1, function(res){
				var js=JSON.parse(res);
				
				$("#mtitle").html('Chatroom name');
				$("#mbody").html(js.rname);
				
				html2="<button onclick='delete1("+id1+")'>Delete</button>";
				$("#mfooter").html(html2);
		
					$("#myModal").modal('show');
			});
			
		
	}
	
	function delete1(id1){
		$.get("api/api.php?q=9&id="+id1, function(res){
			$("#cnt"+id1).remove();
			$("#myModal").modal('hide');
			
			getmyChatrooms();
		});
	}
	
	
	function getallChatrooms(){
		
		$.get("api/api.php?q=10", function(res){
		
			var js=JSON.parse(res);
			html1="";
			html1+="<h2><b>Wanna Chat? Join in a Chatroom now!</b></h2>"
			html1+=" <table class='table table-hover tt1'>";
			html1+="<tr><th>Chatroom name</th><th>Members</th><th>Join in</th></tr>";
				for(i=0;i<js.length;i++){
					
					html1+="<tr><td>"+js[i].rname+"</td><td style='cursor:pointer' onclick=\"showallmembers("+js[i].rid+")\">"+js[i].m+"</td><td><i class=\"glyphicon glyphicon-log-in\" id='cnt1'<h2 style='cursor:pointer' onclick=\"putallmodal("+js[i].rid+")\"></i></td></tr>";
					
				
				}
				html1+="</table>";
				$("#cont2").html(html1);
		});
	}
	
	
	function showallmembers(id1) {
	$.get("api/api.php?q=15&id="+id1, function (res){
			
			var js=JSON.parse(res);
			$("#mtitle").html('All Members');
				html1="";
				html1+=" <table class='table table-hover tt1'>";
				html1+="<tr><th>Username</th>";
				
				for (i=0;i<js.length;i++){
					
					html1+="<tr><td>"+js[i].uusername+"</td>";
			
				}
				html1+="</table>";
				$("#mbody").html(html1);
		
					$("#myModal").modal('show');
			});
			
		
		
	}
	
	function putallmodal(id1){
		$.get("api/api.php?q=17&id="+id1, function (res){
			
			if (res==1){
				window.location.href="user.php?id="+id1;
			}
			else {
		
				$.get("api/api.php?q=16&id="+id1, function(res){
								if(res==1){
									
											$("#mtitle").html('You are the owner');
											
											$("#mbody").html("If you want to edit your chatroom :<a href=\"mychat.php\" class=\"alert-link\"> Click here</a>");
											
											
											$("#mfooter").html("<a href='user.php?id="+id1+"'>Chat now</a>");
									
												$("#myModal").modal('show');
								}
							
								else{
					
										$.getJSON("api/api.php?q=8&id="+id1, function(js){
												
											
											$("#mtitle").html('Chat Request');
											
											$("#mbody").html("Wanna be a member in <b>"+js.rname+ "</b> chatroom? Sent request now!");
											
											html2="<button onclick='request1("+id1+")'>Request</button>";
											$("#mfooter").html(html2);
									
												$("#myModal").modal('show');
										});
						
						
								}
				});
		
			}
		
		});
	}
	
	
		
	
	function request1(id1){
		
		$.get("api/api.php?q=11&id="+id1, function(res){
		
		
			$("#myModal").modal('hide');
			
			getallChatrooms();
		

		});
	}
	

	
	function openForm() {
		var id1=$("#id1").val();
		document.getElementById("myForm").style.display = "block";
		$.get(urlmsg+id1, function(res){
			var js=JSON.parse(res);
			$("#msg2").html("");
			for (i=0;i<js.length;i++){
			if(js[i].myid==js[i].ms_uid)
				$("#msg2").append("<div class=mymsg><h4><b>"+js[i].uusername+" says:</b></h4><p style='color:"+js[i].color+"'>"+js[i].mstext+"</p><h><i>"+js[i].msdatetime+"<i></h6></div><br><br>");
				else
			$("#msg2").append("<div class=othermsg><h4><b>"+js[i].uusername+" says:</b></h4><p>"+js[i].mstext+"</p><h><i>"+js[i].msdatetime+"<i></h6></div><br><br>");
			
			}
				var msg2=document.getElementById("msg2");
				msg2.scrollTop = 1000000000;
			});
		
		
	}

	function closeForm() {
	  document.getElementById("myForm").style.display = "none";
	}
	
	
	function Chatnow(id1){
		
		$.get("api/api.php?q=8&id="+id1, function (res){
			var js=JSON.parse(res);
			$("#chat").html(js.rname);
		});
	}
		
	
	function getMessages(){
		var id1=$("#id1").val();
		$.get(urlmsg+id1, function(res){
		var js=JSON.parse(res);
		$("#msg2").html("");
		for (i=0;i<js.length;i++){
			if(js[i].myid==js[i].ms_uid)
				$("#msg2").append("<div class=mymsg><h4><b>"+js[i].uusername+" says:</b></h4><p style='color:"+js[i].color+"'>"+js[i].mstext+"</p><h6><i>"+js[i].msdatetime+"<i></h6></div><br><br>");
				else
			$("#msg2").append("<div class=othermsg><h4><b>"+js[i].uusername+" says:</b></h4><p>"+js[i].mstext+"</p><h><i>"+js[i].msdatetime+"<i></h6></div><br><br>");
			
			}
		});
		
		
	}
	
	
	var CLR=['blue','#9400D3','black','red'];

	function setColor(c){
		
		$("#msg").css("color",CLR[c]);
		$("#color").val(CLR[c]);
		
	}
	
		
		
		
		
	
			
		
		