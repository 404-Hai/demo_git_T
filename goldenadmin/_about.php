<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$act=$_REQUEST["act"];
$SQL="select * from tbl_About where lang=$lang";
$result = mysql_query($SQL,$cnn);
if($row = mysql_fetch_array($result))
{	
	$id=$row["About_ID"];
	$About_Content=$row["About_Content"];	
	$f_action='Edit.php';
	$btnSubmit="Edit";	
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="39%" bgcolor="#6695CD" style="padding-left:3px; font-family:Verdana; font-size:12px; font-weight:bold; color:#FFFFFF ">
		<img src="Skin/bt_arrow.gif" width="10" height="9"> About us</td>
        <td width="61%" background="skin/admin_1.jpg" height="19" style="background-repeat:no-repeat; font-family:Verdana; font-size:11px " align="right">
		</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="border:1px solid #CCCCCC; padding:8px" align="center">
	  <!--------------------------------------------------------------------->
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:5px; font-size:11px">
  	<form action="module/<?=$f_action?>?mod=<?=$mod?>&id=<?=$id?>&id_current=<?=$id_current?>" method="post">
	<tr>
   	 	<td>
		<input name="btnSave" type="submit" value="<?=$btnSubmit;?>" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">
		<input name="btnCancel" type="reset" value="Cancel" style="background-color:#E4E3ED; border:1px solid #CCCCCC ">
		</td>
  	</tr>			
  	<tr>
    	<td><textarea name="About_Content"><?=$About_Content;?></textarea>		
		<script>
			var oEdit2 = new InnovaEditor("oEdit2");		
			//oEdit2.width=700;
			oEdit2.height=410;								
			oEdit2.cmdAssetManager = "modalDialogShow('/assetmanager/assetmanager.asp',640,465)";
			oEdit2.cmdInternalLink = "modelessDialogShow('links.htm',365,270)";
			oEdit2.cmdCustomObject = "modelessDialogShow('objects.htm',365,270)";
			oEdit2.mode="HTMLBody";
			oEdit2.REPLACE("About_Content");
		</script>	</td>
  	</tr>  
	</form>	
	</table>	
<!--------------------------------------------------------------------->
	</td>
  </tr>
</table>

