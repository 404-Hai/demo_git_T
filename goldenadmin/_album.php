<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$id_current=$_REQUEST["id_current"];
$id=$_REQUEST["id"];
$act=$_REQUEST["act"];
$kind=$_REQUEST["kind"];
$id_current=$_REQUEST["id_current"];
$arrprovince=array("Cambodia tours"=>"Cambodia tours","Indonesia tours"=>"Indonesia tours");
$arrstyle=array("Châu Á"=>"Châu Á","Châu Âu"=>"Châu Âu","Châu Úc"=>"Châu Úc","Khác"=>"Khác");
function ActSelect($sql,$Name,$select,$cnn)
{
	echo"<SELECT name='$Name'>";
	$result=mysql_query($sql,$cnn);
	while ($row = mysql_fetch_array ($result))
	{
		$key=$row["Menu_Module"];
		if($select=="") $select=$key;
		$show="<option value='$key' ";
		if($key==$select)
		{
			$show.="selected ";
		}
		$show.=" >".$row["Menu_Name"]."</option>";
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
		<img src="Skin/bt_arrow.gif" width="10" height="9"> Pictrue Manager</td>
        <td width="61%" background="skin/admin_1.jpg" height="19" style="background-repeat:no-repeat; font-family:Verdana; font-size:11px " align="right">
		<a href="?mod=<?=$mod?>&act=add&id_current=<?=$id_current?>&kind=<?=$kind?>"><img src="skin/edit.gif" width="16" height="16" align="absmiddle" border="0"></a> Thêm mới</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="border:1px solid #CCCCCC; padding:8px; font-size:11px" align="center">
<?php 
$sql="SELECT * FROM tbl_Album where Album_Parent='".$id_current."'";
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
				$paging1 .= "<a href='?mod=".$mod."&curPg=".$i."&lang=$lang&kind=$kind&id_current=$id_current'>[".$i."]</a>&nbsp;&nbsp;";	
			$end=$i;	
		}
		$paging.= "Go to page :&nbsp;&nbsp;" ;					
		$paging.=$paging1;					
	}
?>
<table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;" bordercolor="#666666">  	
<tr style="padding:2px; font-size:11px ">
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
			if ($i%5==0) echo "<tr style='padding:2px; font-size:11px'>";
			?>			
    			<td align="center">
				<a href="?mod=<?=$mod?>&id=<?=$row["Album_ID"];?>&act=edit&kind=<?=$kind?>&curPg=<?=$curPg?>&id_current=<?=$id_current?>"><img src="<?=$row["Album_Image"]?>" border="1" height="100" width="100"></a><br>
				<a href="module/Del.php?mod=<?=$mod?>&id=<?=$row["Album_ID"];?>&kind=<?=$kind?>&curPg=<?=$curPg?>&id_current=<?=$id_current?>" onclick="javascript:return confirm('Bạn có muốn xóa không ?')">
				Delete</a>
				</td>		
			<?php
			$i+=1;
		}
	}
}
?>
</tr>
</table>		
	<font color="#333399"><?=$paging?></font>	
	<!--------------------------------------------------------------------->
	<?
	if ($act=="edit")
	{
		$sqlEdit = "select * from tbl_Album where Album_ID=".$id;
		//echo $sqlEdit;
		$result = mysql_query($sqlEdit,$cnn);	
		if ($rowEdit=mysql_fetch_array($result))
		{
			$Album_Image	=$rowEdit['Album_Image'];	
			$Album_Parent	=$rowEdit['Album_Parent'];
			$Album_Name		=$rowEdit['Album_Name'];			
			$Album_Link		=$rowEdit['Album_Link'];
			$f_action		='Edit.php';
			$btnSubmit		='Edit';
		}
	}
	elseif (($act=="add") || ($act==""))
		{
			$Album_Image	="";	
			$Album_Parent	="";
			$Album_Name		="";			
			$Album_Link		="";
			$f_action='Add.php';
			$btnSubmit='Add';
		}
	?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:5px; font-size:11px">
  	<form action="module/<?=$f_action?>?mod=<?=$mod?>&id=<?=$id?>&kind=<?=$kind?>&act=<?=$act?>&curPg=<?=$curPg?>&id_current=<?=$id_current?>" method="post" name="form1">
	<tr>
   	 	<td colspan="2">
		<input name="btnSave" type="submit" value="<?=$btnSubmit?>" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">
		<input name="btnCancel" type="reset" value="Cancel" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">
		</td>
  	</tr>
	<tr>
   		<td>Choose Group:</td>
		<td>
		<? 
		$sql="select * from tbl_Menu";
		ActSelect($sql,"Album_Parent",$Album_Parent,$cnn);
		?>
		</td>
  	</tr>	
	<tr>
   		<td>Choose Image:</td>
		<td><input type="text" id="inpImgURL" name="inpImgURL" class="inpTxt" value="<?=$Album_Image?>" style="width:71%; border:1px solid #CCCCCC; height:18px; ">				
			<input type="button" value="" onClick="openWindow2('/assetmanager/assetmanager_data.asp?win=pop&targetis=inpImgURL')" id="btnAsset" name="btnAsset" style="background:url('../scripts/openAsset.gif');width:23px;height:18px;border:#a5acb2 1px solid;margin-left:1px;"></td>
  	</tr>	
	<tr>
   		<td>Pictrue Name:</td>
		<td><input name="Album_Name" type="text" value="<?=$Album_Name?>" style="width:68%; border:1px solid #CCCCCC; height:18px; "></td>
  	</tr>	
	<tr>
   		<td>Link:</td>
		<td><input name="Album_Link" type="text" value="<?=$Album_Link?>" style="width:68%; border:1px solid #CCCCCC; height:18px; "></td>
  	</tr>				
	</form>	
	</table>	
<!--------------------------------------------------------------------->
	</td>
  </tr>
</table>

