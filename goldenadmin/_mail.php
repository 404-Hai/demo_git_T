<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$id_current=$_REQUEST["id_current"];
$id=$_REQUEST["id"];
$act=$_REQUEST["act"];
$kind=$_REQUEST["kind"];
if ($kind==0) $kindname="Miền Bắc";
if ($kind==1) $kindname="Miền Trung";
if ($kind==2) $kindname="Miền Nam";
function PrintSelect($Mang,$Name,$select)
{
	echo"<SELECT name='$Name'>";
	for(reset($Mang);$key=key($Mang);next($Mang))
	{
		if($select=="") $select=$key;
		$show="<option value='$key' ";
		if($key==$select)
		{
			$show.="selected ";
		}
		//$show.=" ><font face='Arial' size='2'>$Mang[$key]</font></option>";
		$show.=" >$Mang[$key]</option>";
		echo $show;
	}
	echo "</SELECT>";
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="39%" bgcolor="#6695CD" style="padding-left:3px; font-family:Verdana; font-size:12px; font-weight:bold; color:#FFFFFF ">
		<img src="Skin/bt_arrow.gif" width="10" height="9"> Quản lý đăng ký mail</td>
        <td width="61%" background="skin/admin_1.jpg" height="19" style="background-repeat:no-repeat; font-family:Verdana; font-size:11px " align="right">
		<a href="?mod=<?=$mod?>&act=add&id_current=<?=$id_current?>&kind=<?=$kind?>"><img src="skin/edit.gif" width="16" height="16" align="absmiddle" border="0"></a> Thêm mới</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="border:1px solid #CCCCCC; padding:8px; font-size:11px" align="center">
<?php
$sql="SELECT * FROM tb_mail order by id desc";
$result=mysql_query($sql,$cnn);
$totalRows=mysql_num_rows($result);
$maxRows = 10;
if($totalRows%$maxRows==0)  
	$totalPages = (int)($totalRows/$maxRows);
else 
	$totalPages = (int)($totalRows/$maxRows+1);
	$curPg =1;
	if($_REQUEST["curPg"]=="") 
		$curPg =1;
	else 
		$curPg =$_REQUEST["curPg"];
	$curRow = ($curPg-1)*$maxRows+1;
	$paging ="Current Page :&nbsp;<font color=red>".$curPg."</font>&nbsp;&nbsp;&nbsp;"."Total pages :&nbsp;<FONT color=red>".$totalPages."</FONT><br> "; 
	if($totalRows>$maxRows)
	{
		$paging1 ="";				 	 
		for($i=1;$i<=$totalPages;$i++)
		{	
			if($i==$curPg)      
				$paging1 .=  $i."&nbsp;&nbsp;";
			else    
				$paging1 .= "<a href='?mod=".$mod."&curPg=".$i."&lang=$lang&kind=$kind'>[".$i."]</a>&nbsp;&nbsp;";	
			$end=$i;	
		}
		$paging.= "Go to page :&nbsp;&nbsp;" ;					
		$paging.=$paging1;					
	}
?>	
	<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;" bordercolor="#666666">
  	<tr style="background-color:#6695CD; font-family:Verdana; color:#FFFFFF; font-size:11px; font-weight:bold; padding:2px ">
    	<td width="72%">E-mail</td>
    	<td width="15%" align="center">Send mail </td>
    	<td width="13%" align="center">Xoá</td>
  	</tr>
	<?php
if($totalRows>0)
{
	$i=0; 						 
	$low=$curRow;
	$curRow=1;
	while (($row = mysql_fetch_array ($result))&&($curRow<=$totalRows) && ($curRow <= $curPg*$maxRows))
	{
		$curRow++;
		if($curRow>$low)
		{
?>
  	<tr style="padding:2px; font-size:11px ">
    	<td>
		<a href="#" onclick="JavaScript:openWin('ViewAction.php?id=<?=$row['id'];?>&mod=<?=$mod?>','0','toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=0,width=500,height=500,left=270,top=80')">
		<?=$row["txtemail"];?></a></td>			
    	<td align="center">
		<a href="#" onclick="JavaScript:openWin('sendmail.php?txtmail=<?=$row["txtemail"];?>','0','toolbar=0,location=0,status=0,menubar=0,scrollbars=0,resizable=0,width=500,height=500,left=270,top=80')">
		<img src="skin/mail.gif" border="0"></a></td>
    	<td align="center">
		<a href="module/Del.php?mod=<?=$mod?>&id=<?=$row["id"];?>&kind=<?=$kind?>" onclick="javascript:return confirm('Bạn có muốn xóa không ?')">
		<img alt="Delete" src="skin/icon_delete.gif" border="0"></a></td>
  	</tr>
	<?php
			$i+=1;
		}
	}
}
?>
	<?
	if ($act=="edit")
	{
		$sqlEdit = "select * from tb_mail where id=".$id;
		$result = mysql_query($sqlEdit,$cnn);	
		if ($rowEdit=mysql_fetch_array($result))
		{
			$txtemail=$rowEdit['txtemail'];				
			$f_action='Edit.php';
			$btnSubmit='Sửa';
		}
	}
	elseif (($act=="add") || ($act==""))
		{
			$txtemail="";				
			$f_action='Add.php';
			$btnSubmit='Thêm';
		}
	?>	
	</table>
	<font color="#333399"><?=$paging?></font>	
<!--------------------------------------------------------------------->	
<!--------------------------------------------------------------------->
	</td>
  </tr>
</table>

