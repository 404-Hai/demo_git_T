<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? require("connect.inc");?>
<?php
$funconnect='ConnectTour';
$cnn=$funconnect();
$id=$_REQUEST['id'];
$mod=$_REQUEST['mod'];
$act=$_REQUEST['act'];
$lang=$_REQUEST['lang'];

if ($HTTP_POST_VARS["btnSubmit"]=='')
{
	switch ($act)
	{
		case "add":
			$txt='Thêm';
			$txtname='';
		break;
	
		case "edit":
			$sql = "select * from tb_".$mod." where id=".$id;
			$result = mysql_query($sql,$cnn);	
			if ($row=mysql_fetch_array($result))
			{
				$txt='Lưu';
				$txtname=$row["txtname"];
			}
		break;
	}
}
else
{
	$txtname = $HTTP_POST_VARS["txtname"];	
	switch ($act)
	{
		case "add":
			$sql="INSERT INTO tb_".$mod."(id_current,txtname,lang) VALUES(0,'".$txtname."',".$lang.")";
		break;
	
		case "edit":
			$sql="UPDATE tb_".$mod." SET txtname='".$txtname."' WHERE id=".$id;
		break;
	}
	mysql_query($sql,$cnn);
	mysql_close($cnn);		
?>
<script language="javascript">
	alert('Update Successfuly !');
	window.close();		
</script>
<?
}
?>

<form method="post" name="frmGroup">
<input type="hidden" name="btnSubmit" value="1">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td bgcolor="#6695CD" height="20px">
	<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="padding-left:3px; font-family:Verdana; font-size:11px; color:#FFFFFF ">
  <tr>
    <td width="2%"><input name="btnSave" type="image" src="skin/save.gif" width=14 height=14 align="baseline" value="save"></td>
    <td width="98%"><?=$txt;?></td>
  </tr>
</table>
 </td>
</tr>
<tr>
	<td style="border:1px solid " align="center">
	<input name="txtname" type="text" value="<?=$txtname?>" style="border:1px solid #CCCCCC;width:90% ">
	</td>
</tr>
</table>
</form>