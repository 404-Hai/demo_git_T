<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td width="70%" valign="top">
		<table width="612" border="0" cellspacing="0" cellpadding="0">
		  <?
		  $id=$_REQUEST["id"];
		  if($id==3)
		  {
		  ?>
		  <tr>
			<td background="skin/delax.gif" width="611" height="70" style="font-size:18px; color:#FCB110; font-weight:bold; border-bottom:5px solid #FFFFFF"><?=$Top_Accomodation?></td>
		  </tr>
		  <?
		  }
		  else
		  {
		  ?>
		  <tr>
			<td background="skin/accomodation.jpg" width="612" height="70" style="font-size:18px; color:#FCB110; font-weight:bold; border-bottom:5px solid #FFFFFF"><?=$Top_Accomodation?></td>
		  </tr>
		  <?
		  }
		  ?>
		  <tr>
			<td style="border:1px solid #E58330; padding:5px" height="504" valign="top">
			<?
				
				if ($id=="")
				{
					$sql = "select * from tbl_Menu where Menu_Module='Accomodation' and lang=$lang limit 1";				
					$result = mysql_query($sql,$cnn);
					while ($row=mysql_fetch_array($result))
					{
						echo "<div>".$row["Menu_Teaser"]."</div>";
						$sqlOther = "select * from tbl_Accomodation where lang=$lang order by Accomodation_ID";					
						$resultOther = mysql_query($sqlOther,$cnn);
						//echo "<div id='masterdiv'>";					
						while($rowOther = mysql_fetch_array($resultOther))
						{
						?>
						<div class="Menu" onclick="document.location='?mod=Accomodation&id=<?=$rowOther["Accomodation_ID"]?>&lang=<?=$lang?>'"
						 onMouseOver="this.className='MenuOver';" onMouseOut="this.className='Menu';">
						&nbsp;<img src="skin/bulletv.gif" align="absmiddle"> <b><?=$rowOther["Accomodation_Name"];?></b></div>
						<?
						$i++;
						}
						//echo "</div>";
						echo "<div>".$row["Menu_Content"]."</div>";
					}
				}
				else
				{
					$sql = "select * from tbl_Accomodation where Accomodation_ID=".$id." and lang=$lang";				
					$result = mysql_query($sql,$cnn);
					while ($row=mysql_fetch_array($result))
					{
						echo "<div style='padding:2px; border-bottom:2px solid #DCCB83; width:30%; font-weight:bold; font-size:13px; color:#003399'> :: ".$row["Accomodation_Name"]."</div>";
						echo "<div>".$row["Accomodation_Content"]."</div>";
						echo "<div><a href='javascript: history.go(-1);'><img src='skin/arrow1.gif' align='absmiddle' border=0> <b>Back</b></a></div>";
					}
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