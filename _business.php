<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td width="70%" valign="top">
		<table width="612" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td background="skin/business.jpg" width="612" height="70" style="font-size:18px; color:#FCB110; font-weight:bold; border-bottom:5px solid #FFFFFF"><?=$Top_Business?></td>
		  </tr>
		  <tr>
			<td style="border:1px solid #E58330; padding:5px" height="504" valign="top">
			<?
				$sql = "select * from tbl_Menu where Menu_Module='business' and lang=$lang limit 1";				
				$result = mysql_query($sql,$cnn);
				while ($row=mysql_fetch_array($result))
				{
					echo "<div>".$row["Menu_Teaser"]."</div>";
					$sqlOther = "select * from tbl_Business where lang=$lang order by Business_ID desc";					
					$resultOther = mysql_query($sqlOther,$cnn);
					echo "<div id='masterdiv'>";
					$i=0;
					while($rowOther = mysql_fetch_array($resultOther))
					{
					?>
					<div class="Menu" onclick="createCookie('Menu','subMenu<?=$i?>',1); SwitchMenu('subMenu<?=$i?>')"
					 onMouseOver="this.className='MenuOver';" onMouseOut="this.className='Menu';">
					&nbsp;<img src="skin/bulletv.gif" align="absmiddle"> <b><?=$rowOther["Business_Name"];?></b></div>
						<span id='subMenu<?=$i?>' class="option">
						<?
						$sqlContent = "select * from tbl_Business where Business_ID=".$rowOther["Business_ID"];					
						$resultContent = mysql_query($sqlContent,$cnn);
						echo "<div id='masterdiv'>";						
						while($rowContent = mysql_fetch_array($resultContent))
						{
						?>			
						<div class='subMenu'>
						<?=$rowContent["Business_Teaser"]?><br>
						<?=$rowContent["Business_Content"]?>
						</div>						
						<?
						}
						?>
						</span>
					<?
					$i++;
					}
					echo "</div>";
					echo "<div>".$row["Menu_Content"]."</div>";
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