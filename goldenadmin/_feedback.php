<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$id_current=$_REQUEST["id_current"];
$id=$_REQUEST["id"];
$act=$_REQUEST["act"];
$sqlMenu="SELECT * FROM tbl_Menu where Menu_Module='Feedback' and lang=$lang";
$r = mysql_query($sqlMenu,$cnn);
if ($rowMenu = mysql_fetch_array($r))
{
	$HeadPage=$rowMenu["Menu_Name"];
}
?>
<script language="javascript">
function SetView(mod,use,id,curPg)
{
	if (use ==0)
	{
		use = 1;
	}
	else
	{
		use=0;
		
	}			
	window.location = "module/public.php?use="+use+"&mod="+mod+"&id="+id+"&curPg="+curPg;
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="39%" bgcolor="#6695CD" style="padding-left:3px; font-family:Verdana; font-size:12px; font-weight:bold; color:#FFFFFF ">
		<img src="Skin/bt_arrow.gif" width="10" height="9"> <? echo $HeadPage;?>  
		<?
		if ($id_current!=0)
		{
			$sqlsub="SELECT * FROM tbl_Feedback where Feedback_ID=".$id_current." and lang=$lang";
			$rsub = mysql_query($sqlsub,$cnn);
			if ($rowsubMenu = mysql_fetch_array($rsub))
			{
				echo "<img src='skin/navpil_home.gif'>";
				echo "<a href='?mod=".$mod."&act=add&id_current=".$id_current."&kind=".$kind."&lang=".$lang."'>".$rowsubMenu["Feedback_Name"]."</a>";
			}
		}
		?>
		</td>
        <td width="61%" background="skin/admin_1.jpg" height="19" style="background-repeat:no-repeat; font-family:Verdana; font-size:11px " align="right">
		<a href="?mod=<?=$mod?>&act=add&id_current=<?=$id_current?>&kind=<?=$kind?>&lang=<?=$lang?>"><img src="skin/edit.gif" width="16" height="16" align="absmiddle" border="0"></a> Add</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="border:1px solid #CCCCCC; padding:8px; font-size:11px" align="center">
<?php 
$sql="SELECT * FROM tbl_Feedback order by Feedback_ID DESC";
//================================================================================
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
				$paging1 .= "<a href='?mod=".$mod."&curPg=".$i."&kind=".$kind."&id_current=".$id_current."&lang=".$lang."'>[".$i."]</a>&nbsp;&nbsp;";	
			$end=$i;	
		}
		$paging.= "Go to page :&nbsp;&nbsp;" ;					
		$paging.=$paging1;					
	}
?>
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;" bordercolor="#666666">
  	<tr style="background-color:#6695CD; font-family:Verdana; color:#FFFFFF; font-size:11px; font-weight:bold; padding:2px ">
    	<td width="35%">Feedback Name</td>
		<td width="35%">Feedback Email</td>
		<td width='10%' align='center'>Public</td>		
    	<td width="6%" align="center">Edit</td>
    	<td width="7%" align="center">Delete</td>
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
    	<td><?=$row["Feedback_Name"];?></td>
		<td><?=$row["Feedback_Email"];?></td>
		<td align="center">
		<? if($row["Feedback_Isview"]==1) 
		  		{
		  ?>
		  	<img src="skin/publish_g.png" onClick="SetView('<?=$mod;?>','<?=$row["Feedback_Isview"];?>','<?=$row["Feedback_ID"];?>','<?=$curPg?>')">
		  <?
		  		}
			 else
		  		{
		  ?>
		  	<img src="skin/publish_r.png" onClick="SetView('<?=$mod;?>','<?=$row["Feedback_Isview"];?>','<?=$row["Feedback_ID"];?>','<?=$curPg?>')">
		  <?
		  		}
		  ?>          
		</td>		
    	<td align="center">
		<a href="?mod=<?=$mod?>&id=<?=$row["Feedback_ID"];?>&act=edit&id_current=<?=$id_current?>&curPg=<?=$curPg?>&lang=<?=$lang?>"><img alt="Sửa" src="skin/icon_edit.gif" width="16" height="16" border="0"></a></td>
    	<td align="center">
		<a href="module/Del.php?mod=<?=$mod?>&id=<?=$row["Feedback_ID"];?>&id_current=<?=$id_current?>&curPg=<?=$curPg?>&lang=<?=$lang?>" onclick="javascript:return confirm('Bạn có muốn xóa không ?')">
		<img alt="Delete" src="skin/icon_delete.gif" border="0"></a></td>
  	</tr>
	<?php
			$i+=1;
		}
	}
}
//================================================================================
?></table>		
<font color="#333399"><?=$paging?></font>	
<!--------------------------------------------------------------------->
	<?
	if ($act=="edit")
	{
		$sqlEdit = "select * from tbl_Feedback where Feedback_ID=".$id;
		$result = mysql_query($sqlEdit,$cnn);	
		if ($rowEdit=mysql_fetch_array($result))
		{
			$Feedback_Name		=$rowEdit['Feedback_Name'];			
			$Feedback_Email		=$rowEdit['Feedback_Email'];
			$Feedback_Tel		=$rowEdit['Feedback_Tel'];
			$Feedback_Comment	=$rowEdit['Feedback_Comment'];
			$Feedback_Content	=$rowEdit['Feedback_Content'];
			$f_action		='Edit.php';
			$btnSubmit		="Edit";
		}
	}
	elseif (($act=="add") || ($act==""))
		{				
			$Feedback_Name		="Name";			
			$Feedback_Email		="Email";
			$Feedback_Tel		="Tel";
			$Feedback_Comment	="Comment";
			$Feedback_Content	="Content";
			$f_action		='Add.php';
			$btnSubmit		="Add";
		}
	?>
	<table border="0" cellspacing="0" cellpadding="0" style="padding:5px; font-size:11px">
  	<form action="module/<?=$f_action?>?mod=<?=$mod?>&id=<?=$id?>&id_current=<?=$id_current?>" method="post">
	<tr>
   	 	<td align="center">
		<input name="btnSave" type="submit" value="<?=$btnSubmit?>" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">
		<input name="btnCancel" type="reset" value="Cancel" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">
		</td>
  	</tr>
	<tr>
   		<td><input name="Feedback_Name" type="text" value="<?=$Feedback_Name;?>" style="width:100%; border:1px solid #CCCCCC "></td>
  	</tr>	
	<tr>
   		<td><input name="Feedback_Email" type="text" value="<?=$Feedback_Email;?>" style="width:100%; border:1px solid #CCCCCC "></td>
  	</tr>	
	<tr>
   		<td><input name="Feedback_Tel" type="text" value="<?=$Feedback_Tel;?>" style="width:100%; border:1px solid #CCCCCC "></td>
  	</tr>
	<tr>
    	<td><textarea name="Feedback_Comment"><?=$Feedback_Comment;?></textarea>		
		<script>
			var oEdit1 = new InnovaEditor("oEdit1");		
			//oEdit2.width=700;
			oEdit1.height=200;								
			oEdit1.cmdAssetManager = "modalDialogShow('/assetmanager/assetmanager.asp',640,465)";
			oEdit1.cmdInternalLink = "modelessDialogShow('links.htm',365,270)";
			oEdit1.cmdCustomObject = "modelessDialogShow('objects.htm',365,270)";
			oEdit1.mode="HTMLBody";
			oEdit1.REPLACE("Feedback_Comment");
		</script>	</td>
  	</tr>  	
  	<tr>
    	<td><textarea name="Feedback_Content"><?=$Feedback_Content;?></textarea>		
		<script>
			var oEdit2 = new InnovaEditor("oEdit2");		
			//oEdit2.width=700;
			oEdit2.height=410;								
			oEdit2.cmdAssetManager = "modalDialogShow('/assetmanager/assetmanager.asp',640,465)";
			oEdit2.cmdInternalLink = "modelessDialogShow('links.htm',365,270)";
			oEdit2.cmdCustomObject = "modelessDialogShow('objects.htm',365,270)";
			oEdit2.mode="HTMLBody";
			oEdit2.REPLACE("Feedback_Content");
		</script>	</td>
  	</tr>  
	<tr>
   	 	<td align="center">
		<input name="btnSave" type="submit" value="<?=$btnSubmit?>" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">
		<input name="btnCancel" type="reset" value="Cancel" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">
		</td>
  	</tr>
	</form>	
	</table>	
<!--------------------------------------------------------------------->
	</td>
  </tr>
</table>