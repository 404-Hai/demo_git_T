<script language='Javascript'>
function validateEmail(emailad)
	{
		var exclude=/[^@\-\.\w]|^[_@\.\-]|[\._\-]{2}|[@\.]{2}|(@)[^@]*\1/;
		var check=/@[\w\-]+\./;
		var checkend=/\.[a-zA-Z]{2,3}$/;
		if(((emailad.search(exclude) != -1)||(emailad.search(check)) == -1)||(emailad.search(checkend) == -1))
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	//======================================Check Booking Room ==========================================
	function formSubmit() {
		
		if (document.frm.cname.value=="")
		{
			alert("<? echo frm_alt01?>");
			document.frm.cname.focus();
			return false;
		}
		if (document.frm.cemail.value=="")
		{
			alert("<? echo frm_alt01?>");
			document.frm.cemail.focus();
			return false;
		}
		if (validateEmail(document.frm.cemail.value)){
			alert("<? echo frm_alt02?>")
			document.frm.cemail.focus();
			return false;
		}	
	
		if (document.frm.linktitle.value=="")
		{
			alert("<? echo frm_alt01?>");
			document.frm.linktitle.focus();
			return false;
		}
		//Check Site URL is valid length
		if (frm.linkurl.value.length < 12) {
			alert("<? echo frm_alt05?>")
			return false;
		}	
		if (document.frm.linkdesc.value=="")
		{
			alert("<? echo frm_alt01?>");
			document.frm.linkdesc.focus();
			return false;
		}
		return true;
	}
</script>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td width="70%" valign="top">
		<table width="612" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td colspan="2" background="skin/link.jpg" height="70" style="font-size:18px; color:#FCB110; font-weight:bold; border-bottom:5px solid #FFFFFF"><?=$Top_Link?></td>
		  </tr>
		  <tr>
			<td valign="top" width="317" style="border:1px solid #E58330; padding:5px">
			<?
			$sql = "select * from tbl_Link where Link_Isview=1 and lang=$lang";
			$result = mysql_query($sql,$cnn);
			while ($row = mysql_fetch_array($result))
			{
			?>
			<img src="skin/r_icon.gif" align="absmiddle"> <b><?=$row["Link_Name"];?></b><br>
			&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=$row["Link_Site"]?>" target="_blank"><?=$row["Link_Site"];?></a><br>				
			<?
			}
			?>		
			</td>
			<td width="295" style="border:1px solid #E58330; padding:5px">
			<table align="center" border="0" cellpadding="3" cellspacing="0">
			<form name="frm" action="add.php?lang=<?=$lang?>&mod=<?=$mod?>" method="post" onSubmit="return formSubmit();">
				<tbody><tr>
						<td class="lefont" style="color:#0084C5 "><? echo $Frm_SiteName?>:</td>
						<td class="lefont"><input maxlength="70" name="Link_Name" size="20" type="text"></td>
					</tr>
					<tr>
						<td style="color:#0084C5 ">E-mail:</td>
						<td ><input maxlength="70" name="Link_Email" size="20" type="text"></td>
					</tr>					
					<tr>
						<td style="color:#0084C5 "><? echo $Frm_Siteurl?>:</td>
						<td class="lefont"><input maxlength="300" name="Link_Site" size="20" value="http://" type="text"></td>
					</tr>
					<tr>
						<td style="color:#0084C5 "><? echo $Frm_SiteDesc?>:<br></td>
						<td class="lefont"><input maxlength="300" name="Link_Description" size="20" type="text"></td>
					</tr>														
					<tr>
						<td style="color:#0084C5 " valign="top"><? echo $Frm_Comment?>:<br></td>
						<td><textarea cols="20" rows="5" name="Link_Comment"></textarea></td>
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