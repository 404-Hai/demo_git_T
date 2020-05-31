<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td width="70%" valign="top">
		<table width="612" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td background="skin/feedback.jpg" width="612" height="70" style="font-size:18px; color:#FCB110; font-weight:bold; border-bottom:5px solid #FFFFFF"><?=$Top_Feedback?></td>
		  </tr>
		  <tr>
			<td style="border:1px solid #E58330; padding:5px" height="504" valign="top">
			<?
				$sql = "select * from tbl_Menu where Menu_Module='feedback' and lang=$lang limit 1";				
				$result = mysql_query($sql,$cnn);
				while ($row=mysql_fetch_array($result))
				{
					echo "<div>".$row["Menu_Teaser"]."</div>";
					$sqlOther = "select * from tbl_Feedback where Feedback_Isview=1 order by Feedback_ID desc";					
					$resultOther = mysql_query($sqlOther,$cnn);
					echo "<div id='masterdiv'>";
					$i=0;
					while($rowOther = mysql_fetch_array($resultOther))
					{
					?>
					<div class="Menu" onclick="createCookie('Menu','subMenu<?=$i?>',1); SwitchMenu('subMenu<?=$i?>')"
					 onMouseOver="this.className='MenuOver';" onMouseOut="this.className='Menu';">
					&nbsp;<img src="skin/bulletv.gif" align="absmiddle"> <b><?=$rowOther["Feedback_Comment"];?></b></div>
						<span id='subMenu<?=$i?>' class="option">
						<?
						$sqlContent = "select * from tbl_Feedback where Feedback_ID=".$rowOther["Feedback_ID"];					
						$resultContent = mysql_query($sqlContent,$cnn);
						echo "<div id='masterdiv'>";						
						while($rowContent = mysql_fetch_array($resultContent))
						{
						?>			
						<div class='subMenu'>						
						<?=$rowContent["Feedback_Name"]?> (<?=$rowContent["Feedback_Email"]?>)<br>
						Telephone: <?=$rowContent["Feedback_Tel"]?><br>
						<?=$rowContent["Feedback_Content"]?>
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
			<table align="center" border="0" cellpadding="3" cellspacing="0">
			<form name="frm" action="add.php?lang=<?=$lang?>&mod=<?=$mod?>" method="post" onSubmit="return formSubmit();">
				<tbody><tr>
						<td class="lefont" style="color:#0084C5 "><? echo $Frm_Name?>:</td>
						<td class="lefont"><input maxlength="70" name="Feedback_Name" size="50" type="text"></td>
					</tr>
					<tr>
						<td style="color:#0084C5 ">E-mail:</td>
						<td ><input maxlength="70" name="Feedback_Email" size="50" type="text"></td>
					</tr>					
					<tr>
						<td style="color:#0084C5 "><? echo $Frm_Tel?>:</td>
						<td class="lefont"><input maxlength="300" name="Feedback_Tel" size="50" type="text"></td>
					</tr>																	
					<tr>
						<td style="color:#0084C5 " valign="top"><? echo $Frm_Comment?>:<br></td>
						<td><textarea cols="40" rows="5" name="Feedback_Comment"></textarea></td>
					</tr>							
					<tr>
						<td colspan="2" align="right"><input value="<? echo $Frm_Send?> >>" class="lefont" type="submit" onClick=""></td>
			</tr>
			</tbody>
			</form>	
			</table>
			</td>
		  </tr>
		</table>			
	</td>
	<td width="30%" valign="top">
	<? require("_right.php");?>
	</td>
  </tr>
</table>