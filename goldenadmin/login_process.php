<?php	
    session_start();
	require("connect.inc");
	$funconnect='ConnectTour';
	$cnn=$funconnect();
	$username=$HTTP_POST_VARS["user"];
	$lang=$HTTP_POST_VARS["lang"];
	$password=md5($HTTP_POST_VARS["password"]);
	$txtpassword=$HTTP_POST_VARS["password"];
	if((test($username))||(test($txtpassword)))
	{
?>
	<script> 
		alert("Don't enter a Special character!")
		location="login.php?type=false"
	</script>
<?
	}
	$sql="select userid,username,password,fullname,email,permission from tb_member where username='".$username."' and password='".$password."'";	
	$result = mysql_query($sql,$cnn);
	$totalrow = mysql_num_rows($result);
	if($totalrow)
	{
		$row=mysql_fetch_array($result);
		$_SESSION["lang"]=$lang;
		$_SESSION["suid"]=$row["userid"];		
		$_SESSION["susername"]=$row["username"];
		$_SESSION["sfullname"]=$row["fullname"];
		$_SESSION["semail"]=$row["email"];
		$_SESSION["spermission"] = $row["permission"];
		header("Location:index.php?mod=index");
	}
	else
	{
		$_SESSION["susername"]="";
		$_SESSION["permission"]=0;
		$_SESSION["lang"]=$lang;
		header("Location:login.php?type=false");
	}
	function test($txtstring)
	{
		if(strpos($txtstring,"'"))
		{
			return "1";
		}
		elseif(strpos($txtstring,";"))
		{
			return "1";
		}
		elseif(strpos($txtstring,"-"))
		{
			return "1";
		}
		elseif(strpos($txtstring,"~"))
		{
			return "1";
		}
		elseif(strpos($txtstring,"*"))
		{
			return "1";
		}
		elseif(strpos($txtstring,"("))
		{
			return "1";
		}
		elseif(strpos($txtstring,")"))
		{
			return "1";
		}
		elseif(strpos($txtstring,"]"))
		{
			return "1";
		}
		elseif(strpos($txtstring,","))
		{
			return "1";
		}
		else
		return 0;
	}		
?>