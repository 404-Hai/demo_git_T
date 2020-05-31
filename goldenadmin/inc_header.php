<? session_start();
require("connect.inc");?>
<?php
$mod=$_REQUEST["mod"];
$id_current=$_REQUEST["id_current"];
$lang=$_SESSION["lang"];
$lan=$_REQUEST["lang"];
if ($lan!='')	
{
	$_SESSION["lang"]=$lan;
	$lang=$_SESSION["lang"];
}
if($_SESSION["susername"]=="")
{	
	header("Location:login.php");
}
$funconnect='ConnectTour';
$cnn=$funconnect();
require("module/lang.php");
?>
<HTML>
<HEAD>
<script language="javascript" src="javascript/LeftMenu.js"></script>
<script language="javascript" src="javascript/Global.js"></script>
<script language="javascript" src="javascript/load.js"></script>
<script language=JavaScript src='../scripts/innovaeditor.js'></script>

<script  language="JavaScript">
function openWin(theURL,winName,features) {
  	window.open(theURL,winName,features);
}
function openWindow2(url) {
  popupWin = window.open(url,'new_page','width=640,height=465')
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK href="styleadmin.css" type="text/css" rel="stylesheet">
</HEAD>
<BODY>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr><td bgcolor="#6595CC" height="20" align="right" style="BORDER-BOTTOM: #CCCCCC 10px solid">
<font color="#FFFFFF" face="Arial, Helvetica, sans-serif" size="2" >
<a href="../" style="color:#FFFFFF"><? echo $Menu_Home;?></a> | 
<a href="login.php" style="color:#FFFFFF"><? echo $Menu_Logout;?></a> | 
<?php 
if ($lang==2) echo '<a href="?lang=1&mod='.$mod.'&id_current='.$id_current.'" style="color:#FFFFFF">English</a>'; 
else echo '<a href="?lang=2&mod='.$mod.'&id_current='.$id_current.'" style="color:#FFFFFF">Vietnamese</a>';
?>&nbsp;&nbsp;&nbsp;</font>
</td></tr>
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="21%" style="padding-bottom:8px; padding-top:8px " valign="top">
	<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-right:#666666 1px solid; border-bottom:#666666 1px solid">
      <tr>
        <td height="26" align="left" bgcolor="#6595CC" style="border-bottom:#ffffff 1px solid; font-size:11px; color:#FFFFFF">
		&nbsp;&nbsp;<img src="Skin/bt_arrow.gif" width="10" height="9">&nbsp;<strong>System Manager</strong></td>
      </tr>
      <tr>
        <td>
		<div id="masterdiv">
            <div class="Menu" onclick="createCookie('Menu','subMenu1',1); SwitchMenu('subMenu1')">&nbsp;<img src="skin/arrow.jpg"> System</div>
            <span id='subMenu1' class="option">
            	<div class="subMenu" onmouseover="this.style.backgroundColor='ffffff'" onmouseout="this.style.backgroundColor='f3f5f5'">
				&nbsp;&nbsp;- <a href="../">Homepage</a></div>
            	<div class="subMenu" onmouseover="this.style.backgroundColor='ffffff'" onmouseout="this.style.backgroundColor='f3f5f5'">
				&nbsp;&nbsp;- <a href="?mod=changepass&act=edit&userid=<?=$_SESSION["suid"];?>">Change Password</a></div>				
            </span> 
			<div class="Menu" onClick="document.location.href='?mod=menu&id_current=0';">&nbsp;<img src="skin/arrow.jpg"> Main menu</div>			
			<?
			$sql = "select * from tbl_Menu where lang=1";
			$result = mysql_query($sql,$cnn);
			while ($row = mysql_fetch_array($result))
			{
			?>			
			<div class="Menu" onClick="document.location.href='?mod=<?=$row["Menu_Module"]?>&id_current=0';">&nbsp;<img src="skin/arrow.jpg"> <?=$row["Menu_Name"]?></div>				
			<?
			}
			?>
			<div class="Menu" onclick="createCookie('Menu','subMenu2',1); SwitchMenu('subMenu2')">&nbsp;<img src="skin/arrow.jpg"> Pictrue Manager</div>
            <span id='subMenu2' class="option">
            	<?
				$sql = "select * from tbl_Menu where lang=1";
				$result = mysql_query($sql,$cnn);
				while ($row = mysql_fetch_array($result))
				{
				?>		
				<div class="subMenu" onmouseover="this.style.backgroundColor='ffffff'" onmouseout="this.style.backgroundColor='f3f5f5'"
				onClick="document.location.href='?mod=album&id_current=<?=$row["Menu_Module"]?>';">&nbsp; <a href="#"><?=$row["Menu_Name"]?></a></div>				
				<?
				}
				?>
            </span> 
			<div class="Menu" onClick="document.location.href='?mod=item&id_current=0';">&nbsp;<img src="skin/arrow.jpg"> Website Item</div>
		  </div> 
		</td>
      </tr>
    </table></td>
    <td width="79%" valign="top" style="padding:8px; ">