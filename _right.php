<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td style="border:1px solid #DCCB83; background-color:#FCF9E4; padding:4px">
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	
	  <tr>
		<td>
		<?
			if ($mod=="") $mod="about";
			if ($mod=="contact") $mod="about";
			if ($mod=="bookroom") $mod="about";
			$sql = "select * from tbl_Menu where Menu_Module='".$mod."'";
			$result = mysql_query($sql,$cnn);
			while ($row = mysql_fetch_array($result))
			{
			?>
				<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="256" height="175">
				<param name="movie" value="<?=$row["Menu_Image"];?>">
				<param name="quality" value="high">
				<embed src="<?=$row["Menu_Image"];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="256" height="175"></embed>
				</object>
			
			<?
			}
		?>
		</td>
	  </tr>
	   <tr>
		<td height="25">Click pictures below to enlarge it above.</td>
	  </tr>
	  <tr>
		<td>
			<table width="100%"  border="0" cellspacing="0" cellpadding="2">
			<tr>
		<?
			if ($mod=="") $mod="about";
			$sql = "select * from tbl_Album where Album_Parent='".$mod."' limit 8";
			$result = mysql_query($sql,$cnn);
			$i=0;
			while ($row = mysql_fetch_array($result))
			{
				if ($i%2==0) echo "</tr>";
			?>
			<td><img src="<?=$row["Album_Image"];?>" width="120" height="85" style="border: 1px solid #DDCC85; cursor:pointer " onClick="LargerPicture('<?= $row["Album_Image"]; ?>','');"></td>
			<?
				$i++;
			}
		?>	
				</tr>
			</table>
		</td>
	  </tr>
	</table>
	</td>
  </tr>
  <tr>
	<td>&nbsp;</td>
  </tr>
</table>