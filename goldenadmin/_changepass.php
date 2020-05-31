<?php
$userid=$_REQUEST["userid"];
$type=$_REQUEST["type"];
$sql="SELECT * FROM tb_member WHERE userid='".$userid."'";
$result=mysql_query($sql,$cnn);
$row=mysql_fetch_array($result);
$password=$row["password"];
switch ($type)
{
case "":
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script language="javascript">
function checkInput()
{
  if(document.form1.old.value=="")
  {
  alert("Plese enter Old Password ");
  document.form1.old.focus();
  return false;
  }
  if(document.form1.new1.value=="")
  {
  alert("Please enter New Password");
  document.form1.new1.focus();
  return false;
  }
  new1=document.form1.new1.value;
  if(document.form1.new2.value!=new1)
  {
  alert("Please Confirm New Password!!");
  document.form1.new2.focus();
  return false;
  }
 return true;
}
</script>

<form name="form1" method="post" action="module/Edit.php?mod=<?=$mod?>&act=<?=$act?>&userid=<?=$userid?>" onSubmit="return checkInput();">

<table width="100%" border="0" align="center" style="font-size:11px ">
  <tr>
    <td colspan="2" align="center"><strong style="font-size:12px "> CHANGE PASSWORD</strong></td>
  
 </tr>
  <tr>
    <td width="27%">Enter your <strong>Current Password:</strong></td>
    <td width="73%"><input name="old" type="password" id="old" style=" width:90%; border:1px solid #CCCCCC "></td>
  </tr>
  <tr>
    <td>Choose a <strong>New Password:</strong></td>
    <td><input name="new1" type="password" id="new1" style=" width:90%; border:1px solid #CCCCCC "></td>
  </tr>
  <tr>
    <td>Confirm your <strong>New Password:</strong></td>
    <td><input name="new2" type="password" id="new2" style=" width:90%; border:1px solid #CCCCCC "></td>
  </tr>
  <tr><td align="center" colspan="2"><input type="submit" name="Submit" value="Change" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">&nbsp;
  <input name="" type="reset" value="Reset" style="background-color:#E4E3ED; border:1px solid #CCCCCC "></td></tr>
</table>
</form>
<?php
break;
case "thanhcong":
?>
<title>Success</title>
<p align="center"><font face="Arial, Helvetica, sans-serif" size="2" color="#6595CC">ĐỔI MẬT KHẨU THÀNH CÔNG</font></p>
<p align="center">&nbsp;</p>
<?php
break;
case "false":
?>
<title>False</title>
<p align="center"><font face="Arial, Helvetica, sans-serif" size="2" color="#6595CC">BẠN NHẬP SAI PASS CŨ</font></p>
<p align="center"><font face="Arial, Helvetica, sans-serif" size="2" color="#6595CC">HÃY KIỂM TRA LẠI PASS CỦA MÌNH</font></p>
<p align="center"><input type="button" value="Back" onClick='window.history.back(-1)'>&nbsp;<input type="button" value="Close" onClick='window.close()'></p>
<?php
}
?>
</body>