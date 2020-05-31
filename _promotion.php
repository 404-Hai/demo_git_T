<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td width="70%" valign="top">
		<table width="612" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td background="skin/promotion.jpg" width="612" height="70" style="font-size:18px; color:#FCB110; font-weight:bold; border-bottom:5px solid #FFFFFF"><?=$Top_Promotion?></td>
		  </tr>
		  <tr>
			<td style="border:1px solid #E58330; padding:5px" height="504" valign="top">
			<?
			$id=$_REQUEST["id"];
			if ($id=="")
			{
				$sql="select * from tbl_Promotion where lang=$lang";
			}
			else
			{
				$sql="select * from tbl_Promotion where lang=$lang and Promotion_ID=".$id;
				$sql_other="select * from tbl_Promotion where lang=$lang and Promotion_id<>".$id;
			}
			$result = mysql_query($sql,$cnn);
			while ($row = mysql_fetch_array ($result))
			{			
			?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:4px ">
			<tr>
				<td><img src="skin/bulletv.gif" align="absmiddle"> 
				<a href="?mod=<?=$mod?>&id=<?=$row["Promotion_ID"]?>&lang=<?=$lang?>" style="font-weight:bold"><?=$row["Promotion_Name"]?></a></td>
			</tr>
			<tr>
				<td style="border-bottom:1px dashed #CCCCCC ">
				<?
				if ($id=="")
				{
					echo $row["Promotion_Teaser"];
					echo "<div align='right'>";
					echo "<img src='skin/icon.offsite.gif' align='absmiddle'> <a href='?mod=".$mod."&id=".$row["Promotion_ID"]."&lang=$lang'>".$Main_Detail."</a> &nbsp;&nbsp;";		
					echo "</div>";
				}
				else
				{
					echo $row["Promotion_Content"];		
					$sql_result_other = mysql_query($sql_other,$cnn);			
					if ($sql_result_other)
					{
						echo "<hr size=1>";	
						echo "<strong>:: ".$Top_Promotion." ".$Main_Other."</strong><br>";
						while ($row_other=mysql_fetch_array($sql_result_other))
						{		
							$id=$row_other["Promotion_ID"];
							$Promotion_Name=$row_other["Promotion_Name"];				
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='skin/bulletv.gif'> ";
							echo "<a href='?mod=".$mod."&id=".$id."&lang=$lang'>".$Promotion_Name."</a><br>";				
						}
					}		
				}
				?>
				</td>
			</tr>
			</table>
			<?php
			}
			?>
			</td>
		  </tr>
		</table>			
	</td>
	<td width="30%" valign="top">
	<? require("_right.php");?>
	</td>
  </tr>
</table>