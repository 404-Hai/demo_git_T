<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td width="70%" valign="top">
		<table width="612" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td background="skin/about.jpg" width="612" height="70" style="font-size:18px; color:#FCB110; font-weight:bold; border-bottom:5px solid #FFFFFF"><?=$Top_About?></td>
		  </tr>
		  <tr>
			<td style="border:1px solid #E58330; padding:5px" height="504" valign="top">
			<?
			$sql = "select * from tbl_About where lang=$lang";
			$result = mysql_query($sql,$cnn);
			while ($row = mysql_fetch_array($result))
			{
			?>
			<?=$row["About_Content"];?>				
			<?
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