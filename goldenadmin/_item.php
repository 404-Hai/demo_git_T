<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$sqlMenu="SELECT * FROM tbl_Item where lang=".$_SESSION["lang"];
$r = mysql_query($sqlMenu,$cnn);
	if ($rowItem = mysql_fetch_array($r))
	{		
		$Top_Home			=$rowItem["Top_Home"];
		$Top_About			=$rowItem["Top_About"];
		$Top_Accomodation	=$rowItem["Top_Accomodation"];
		$Top_Food			=$rowItem["Top_Food"];
		$Top_Service		=$rowItem["Top_Service"];
		$Top_Business		=$rowItem["Top_Business"];
		$Top_Promotion		=$rowItem["Top_Promotion"];
		$Top_Feedback		=$rowItem["Top_Feedback"];
		$Top_Booking		=$rowItem["Top_Booking"];
		$Top_Link			=$rowItem["Top_Link"];
		$Top_Contact		=$rowItem["Top_Contact"];
		//========================================
		$Frm_SiteName		=$rowItem["Frm_SiteName"];
		$Frm_Siteurl		=$rowItem["Frm_Siteurl"];
		$Frm_SiteDesc		=$rowItem["Frm_SiteDesc"];
		$Frm_Comment		=$rowItem["Frm_Comment"];
		$Frm_Name			=$rowItem["Frm_Name"];
		$Frm_Tel			=$rowItem["Frm_Tel"];
		$Frm_Country		=$rowItem["Frm_Country"];
		$Frm_Email			=$rowItem["Frm_Email"];
		$Frm_Title			=$rowItem["Frm_Title"];
		$Frm_Content		=$rowItem["Frm_Content"];
		$Frm_Send			=$rowItem["Frm_Send"];
		$Frm_Cancel			=$rowItem["Frm_Cancel"];
		$Frm_ContactInfo	=$rowItem["Frm_ContactInfo"];
		//============================================
		$Main_Other			=$rowItem["Main_Other"];
		$Main_Detail		=$rowItem["Main_Detail"];
	}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="39%" bgcolor="#6695CD" style="padding-left:3px; font-family:Verdana; font-size:12px; font-weight:bold; color:#FFFFFF ">
		<img src="Skin/bt_arrow.gif" width="10" height="9"> Website Item</td>
        <td width="61%" background="skin/admin_1.jpg" height="19" style="background-repeat:no-repeat; font-family:Verdana; font-size:11px " align="right">
		</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="border:1px solid #CCCCCC; padding:8px" align="center">
	  <!--------------------------------------------------------------------->
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:2px; font-size:11px">
<form action="module/Edit.php?mod=<?=$mod?>&id=<?=$id?>" method="post">
	<tr>
   	 	<td colspan="4">
		<input name="btnSave" type="submit" value="Save" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">
		<input name="btnCancel" type="reset" value="Cancel" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">
		</td>
  	</tr>			
	<tr>
   	 	<td><?=$Top_Home;?></td>
		<td><input name="Top_Home" type="text" size="40" value="<?=$Top_Home;?>"></td>
		<td><?=$Top_About?></td>
		<td><input name="Top_About" type="text" size="40" value="<?=$Top_About;?>"></td>
  	</tr>
	<tr>
   	 	<td><?=$Top_Accomodation;?></td>
		<td><input name="Top_Accomodation" type="text" size="40" value="<?=$Top_Accomodation;?>"></td>
		<td><?=$Top_Food;?></td>
		<td><input name="Top_Food" type="text" size="40" value="<?=$Top_Food;?>"></td>
  	</tr>
	<tr>
   	 	<td><?=$Top_Service;?></td>
		<td><input name="Top_Service" type="text" size="40" value="<?=$Top_Service;?>"></td>
		<td><?=$Top_Business;?></td>
		<td><input name="Top_Business" type="text" size="40" value="<?=$Top_Business;?>"></td>
  	</tr>
	<tr>
   	 	<td><?=$Top_Promotion;?></td>
		<td><input name="Top_Promotion" type="text" size="40" value="<?=$Top_Promotion;?>"></td>
		<td><?=$Top_Feedback;?></td>
		<td><input name="Top_Feedback" type="text" size="40" value="<?=$Top_Feedback;?>"></td>
  	</tr>
	<tr>
   	 	<td><?=$Top_Booking;?></td>
		<td><input name="Top_Booking" type="text" size="40" value="<?=$Top_Booking;?>"></td>
		<td><?=$Top_Link;?></td>
		<td><input name="Top_Link" type="text" size="40" value="<?=$Top_Link;?>"></td>
  	</tr>
	<tr>
   	 	<td><?=$Top_Contact;?></td>
		<td><input name="Top_Contact" type="text" size="40" value="<?=$Top_Contact;?>"></td>
		<td><?=$Frm_SiteName;?></td>
		<td><input name="Frm_SiteName" type="text" size="40" value="<?=$Frm_SiteName;?>"></td>
  	</tr>
	<tr>
   	 	<td><?=$Frm_Siteurl;?></td>
		<td><input name="Frm_Siteurl" type="text" size="40" value="<?=$Frm_Siteurl;?>"></td>
		<td><?=$Frm_SiteDesc;?></td>
		<td><input name="Frm_SiteDesc" type="text" size="40" value="<?=$Frm_SiteDesc;?>"></td>
  	</tr>
	<tr>
   	 	<td><?=$Frm_SiteDesc;?></td>
		<td><input name="Frm_SiteDesc" type="text" size="40" value="<?=$Frm_SiteDesc;?>"></td>
		<td><?=$Frm_Comment;?></td>
		<td><input name="Frm_Comment" type="text" size="40" value="<?=$Frm_Comment;?>"></td>
  	</tr>
	<tr>
   	 	<td><?=$Frm_Tel;?></td>
		<td><input name="Frm_Tel" type="text" size="40" value="<?=$Frm_Tel;?>"></td>
		<td><?=$Frm_Country;?></td>
		<td><input name="Frm_Country" type="text" size="40" value="<?=$Frm_Country;?>"></td>
  	</tr>
	<tr>
   	 	<td><?=$Frm_Name;?></td>
		<td><input name="Frm_Name" type="text" size="40" value="<?=$Frm_Name;?>"></td>
		<td><?=$Frm_Content;?></td>
		<td><input name="Frm_Content" type="text" size="40" value="<?=$Frm_Content;?>"></td>
  	</tr>
	<tr>
   	 	<td><?=$Frm_Email;?></td>
		<td><input name="Frm_Email" type="text" size="40" value="<?=$Frm_Email;?>"></td>
		<td><?=$Frm_Title;?></td>
		<td><input name="Frm_Title" type="text" size="40" value="<?=$Frm_Title;?>"></td>
  	</tr>	
	<tr>
   	 	<td><?=$Frm_Send;?></td>
		<td><input name="Frm_Send" type="text" size="40" value="<?=$Frm_Send;?>"></td>
		<td><?=$Frm_Cancel;?></td>
		<td><input name="Frm_Cancel" type="text" size="40" value="<?=$Frm_Cancel;?>"></td>
  	</tr>
	<tr>
   	 	<td><?=$Main_Other;?></td>
		<td><input name="Main_Other" type="text" size="40" value="<?=$Main_Other;?>"></td>
		<td><?=$Main_Detail;?></td>
		<td><input name="Main_Detail" type="text" size="40" value="<?=$Main_Detail;?>"></td>
  	</tr>	
  	<tr>
    	<td colspan="4" align="center"><textarea name="Frm_ContactInfo"><?=$Frm_ContactInfo;?></textarea>		
		<script>
			var oEdit2 = new InnovaEditor("oEdit2");		
			//oEdit2.width=700;
			oEdit2.height=200;								
			oEdit2.cmdAssetManager = "modalDialogShow('/assetmanager/assetmanager.asp',640,465)";
			oEdit2.cmdInternalLink = "modelessDialogShow('links.htm',365,270)";
			oEdit2.cmdCustomObject = "modelessDialogShow('objects.htm',365,270)";
			oEdit2.mode="HTMLBody";
			oEdit2.REPLACE("Frm_ContactInfo");
		</script>	</td>
  	</tr>
	<tr>
   	 	<td colspan="4">
		<input name="btnSave" type="submit" value="Save" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">
		<input name="btnCancel" type="reset" value="Cancel" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">
		</td>
  	</tr>		  
	</form>	
	</table>	
<!--------------------------------------------------------------------->
	</td>
  </tr>
</table>

