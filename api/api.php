<?php
include "connect.php";

if($_GET['q']==1)
{
	$s1="insert into users set uusername='$_POST[username]', uname='$_POST[name]', usurname='$_POST[surname]', upass='$_POST[pwd]', uemail='$_POST[email]'";
	
	if(mysqli_query($conn,$s1))
	{
		 echo "ok";
	}
	else
	{
		echo "error";
	}
}


if($_GET['q']==2)
{
	
	$s2="select * from users where uemail='$_POST[email]' and upass='$_POST[pwd]'";
	
	$q=mysqli_query($conn,$s2);
	
	if (mysqli_num_rows($q)>0)
	{
		$r=mysqli_fetch_array($q);
		$_SESSION['idu']=$r['uid'];
		
		echo "ok";
	}
	else{
		$_SESSION['idu']='';
		echo "error";
	}
}

if($_GET['q']==3)
{
	$s3="select uusername from users where users.uid='$_SESSION[idu]'";
	$q=mysqli_query($conn, $s3);
	$A=[];
	while($r=mysqli_fetch_assoc($q))
	{
		$A[]=$r;
	}
	
	
	echo json_encode($A);

}

if($_GET['q']==4)
{
	$s4="select * from users where uid='$_SESSION[idu]'";
	$q=mysqli_query($conn, $s4);
	$r=mysqli_fetch_assoc($q);
	
	echo json_encode($r);

}

if($_GET['q']==5)
{
	$s5="update users set uusername='$_POST[username]', uname='$_POST[name]', usurname='$_POST[surname]', upass='$_POST[pwd]', uemail='$_POST[email]' where uid='$_SESSION[idu]'";
	if(mysqli_query($conn,$s5))
	{
		 echo "ok";
	}
	else
	{
		echo "error";
	}
}

if($_GET['q']==6)
{

	$s6="insert into rooms set rname='$_POST[roomname]', rowner='$_SESSION[idu]'";
	
	if(mysqli_query($conn, $s6))
	{
		echo "ok";
	}
	else{
		echo "error";
	}
}

if($_GET['q']==7)
{
	$s7="select * from rooms where rowner=$_SESSION[idu]";
		
	$q=mysqli_query($conn, $s7);
	$A=[];
	while($r=mysqli_fetch_assoc($q))
	{
		$s71="select count(*) as r from members where m_rid=$r[rid] and mstatus=0";
		
			$q71=mysqli_query($conn, $s71);
			$r71=mysqli_fetch_assoc($q71);
		
		$s72="select count(*) as m from members where m_rid=$r[rid] and mstatus=1";
		
			$q72=mysqli_query($conn, $s72);
			$r72=mysqli_fetch_assoc($q72);
		
		$r["m"]=$r72["m"];
		$r["r"]=$r71["r"];
		
		$A[]=$r;
	}
	
	
	echo json_encode($A);
}

if ($_GET['q']==8)
{
	$s8="select rname from rooms where rooms.rid= '$_GET[id]'";
	
	$q=mysqli_query($conn, $s8);
	$r=mysqli_fetch_assoc($q);
	
	echo json_encode($r);
}

if ($_GET['q']==9)
{
	$s9="delete from rooms where rid='$_GET[id]'";
	$q= mysqli_query($conn, $s9);
}

if ($_GET['q']==10)
{
	$s10="select * from rooms";
	
	$q=mysqli_query($conn, $s10);
	$A=[];
	while($r=mysqli_fetch_assoc($q))
	{
		
		$s71="select count(*) as m from members where m_rid=$r[rid] and mstatus=1";
		
			$q71=mysqli_query($conn, $s71);
			$r71=mysqli_fetch_assoc($q71);
		
		$r["m"]=$r71["m"];
		
		$A[]=$r;
	}
	
	
	echo json_encode($A);
}

if ($_GET['q']==11)
{
	$s11="insert into members set m_uid='$_SESSION[idu]', m_rid='$_GET[id]' , mstatus=0";
	if(mysqli_query($conn, $s11))
	{
		echo "ok";
	}
	else{
		echo "error";
	}
}

if ($_GET['q']==12)
	
{
	$s12="select uusername,uid,m_rid from users inner join members on users.uid=members.m_uid  where m_rid='$_GET[id]' and mstatus=0";
	
	$q=mysqli_query($conn, $s12);
	$A=[];
	while($r=mysqli_fetch_assoc($q))
	{
		$A[]=$r;
	}
	
	
	echo json_encode($A);
}

if ($_GET['q']==13)
{
	$s13="update members inner join users on users.uid=members.m_uid set mstatus=1";
	if(mysqli_query($conn,$s13))
	{
		 echo "ok";
	}
	else
	{
		echo "error";
	}
}

if ($_GET['q']==14)
{
	$s14= "delete from members where m_rid=$_GET[rid] and members.m_uid=$_GET[uid] ";
	echo $s14;
	$q=mysqli_query($conn, $s14);
}


if ($_GET['q']==15)
{
	$s15="select uusername,uid,m_rid from users inner join members on users.uid=members.m_uid where m_rid='$_GET[id]' and mstatus=1";
	$q=mysqli_query($conn, $s15);
	$A=[];
	while($r=mysqli_fetch_assoc($q))
	{
		$A[]=$r;
	}
	
	
	echo json_encode($A);
}

if ($_GET['q']==16)
{
	$s16="select * from rooms where rid=$_GET[id] and rowner='$_SESSION[idu]'";
	 $q=mysqli_query($conn, $s16);
	 if(mysqli_num_rows($q)>0)
	 {
		 echo 1;
	 }
	 else
	 {
		 echo 0;
	 }
}

if ($_GET['q']==17)
{
	$s17="select * from members where m_rid='$_GET[id]' and mstatus=1 and m_uid=$_SESSION[idu]";
	$q=mysqli_query($conn, $s17);
	 if(mysqli_num_rows($q)>0)
	 {
		 echo 1;
	 }
	 else
	 {
		 echo 0;
	 }
}

if ($_GET['q']==18)
{
	$txt=htmlentities($_POST['msg'],ENT_QUOTES);
	$s18="insert into messages set ms_uid='$_SESSION[idu]', ms_rid='$_GET[id]', msdatetime=NOW(), mstext='$txt', color='$_POST[color]'";
	
	
	if(mysqli_query($conn, $s18))
	{
		echo "ok";
	}
	else{
		echo "error";
	}
	
	
}
	
if ($_GET['q']==19)
{
	$s19="select *, '$_SESSION[idu]' as myid from messages inner join users on users.uid=messages.ms_uid where ms_rid='$_GET[id]' order by msid ";
	$q=mysqli_query($conn, $s19);
	$A=[];
	while ($r=mysqli_fetch_assoc($q))
	{
				$A[]=$r;
	}
	
	echo json_encode($A);
	
	
}





























?>