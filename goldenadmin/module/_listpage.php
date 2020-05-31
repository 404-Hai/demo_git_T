<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
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
    	<td width="70%"><? echo main_title;?></td>
		<? if($mod=="tours" || $mod=="destination" || $mod=="service" || $mod=="stran") echo "<td width='10%' align='center'>Sub Item</td><td width='8%' align='center'>Home</td>";?>
		<td width="8%" align="center">Top</td>
    	<td width="6%" align="center"><? echo btn_edit;?></td>
    	<td width="7%" align="center"><? echo btn_del;?></td>
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
    	<td><?=$row[$mod."_Name"];?></td>	
		<? if($mod=="tours" || $mod=="service" || $mod=="stran"){?>
		<td align="center">
		<?
		$SQL="SELECT * FROM tbl_".$mod." WHERE ".$mod."_Parent=".$row[$mod."_ID"];
		echo $SQL;
		$r = mysql_query($SQL,$cnn);
		if ($rows = mysql_fetch_array($r))
		{
			echo '<a href=?mod='.$mod.'&'.$mod.'_Parent='.$row[$mod."_ID"].'>';
			echo 'Mục con';
			echo '</a>';
		}
		else
		{
			echo '<a href=?mod='.$mod.'&'.$mod.'_Parent='.$row[$mod.'_ID'].'>';
			echo 'Thêm';
			echo '</a>';
		}
		?>		
		</td>			
		<? }?>
		<td align="center">
		<input name="" type="checkbox" <? if ($row[$mod."_Istop"]==1){?> checked <? }?> onClick="document.location.href='module/Settop.php?id=<?=$row['id'];?>&mod=<?=$mod;?>&id_current=<?=$id_current;?>&kind=<?=$kind;?>';"></td>			
    	<td align="center">
		<a href="?mod=<?=$mod?>&id=<?=$row[$mod."_ID"];?>&act=edit&id_current=<?=$id_current?>&curPg=<?=$curPg?>&lang=<?=$lang?>"><img alt="Sửa" src="skin/icon_edit.gif" width="16" height="16" border="0"></a></td>
    	<td align="center">
		<a href="module/Del.php?mod=<?=$mod?>&id=<?=$row[$mod."_ID"];?>&id_current=<?=$id_current?>&curPg=<?=$curPg?>&lang=<?=$lang?>" onclick="javascript:return confirm('Bạn có muốn xóa không ?')">
		<img alt="Delete" src="skin/icon_delete.gif" border="0"></a></td>
  	</tr>
	<?php
			$i+=1;
		}
	}
}
?></table>		
	<font color="#333399"><?=$paging?></font>	