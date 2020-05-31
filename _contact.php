<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td width="70%" valign="top">
		<table width="612" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td background="skin/contact.jpg" width="612" height="70" style="font-size:18px; color:#FCB110; font-weight:bold; border-bottom:5px solid #FFFFFF"><?=$Top_Contact?></td>
		  </tr>
		  <tr>
			<td style="border:1px solid #E58330; padding:5px"><table border="1" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse" bordercolor="#EAEAEA" bgcolor="#F0F0F0">
              <tr>
                <td><table border="0" cellpadding="0" cellspacing="0" width="100%">
                     <tr>
                      <td width="35%" align="center"><img border="0" src="skin/logo.gif"></td>
                      <td width="94%" valign="top" style="font-family:Arial;"><?=$Frm_ContactInfo?></td>
                    </tr>
                    <tr>
                      <td width="35%">&nbsp;</td>
                      <td width="94%">&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
            </table><BR>
			  <table border="1" cellpadding="0" style="border-collapse: collapse" bordercolor="#EAEAEA" width="100%" id="AutoNumber4">
                <tr>
                  <td bgcolor="#F0F0F0" style="padding-top:10px "><form action="contact.php?lang=<?=$lang?>" method="post">
                      <table width="100%" border="0" cellspacing="0" cellpadding="4">
                        <tr>
                          <td width="30%"><?php echo $Frm_Name?> </td>
                          <td width="70%"><input name="fullname" type="text" style="width:90%;">
                          </td>
                        </tr>
                        <tr>
                          <td><?php echo $Frm_Country?> </td>
                          <td><input name="country" type="text" style="width:90%;"></td>
                        </tr>
                        <tr>
                          <td><?php echo $Frm_Email?> </td>
                          <td><input name="email" type="text" style="width:90%;"></td>
                        </tr>
                        <tr>
                          <td><?php echo $Frm_Title?> </td>
                          <td><input name="subject" type="text" style="width:90%;"></td>
                        </tr>
                        <tr>
                          <td valign="top"><?php echo $Frm_Content?> <font color="#FF0000">(*)</font> </td>
                          <td><textarea name="content" id="content" style="width:90%; height:120px;"></textarea></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" ><table border="0" cellspacing="2" cellpadding="2">
                              <tr align="center">
                                <td><input type="submit" name="Submit" value="<?=$Frm_Send?>" style="height:20; border-style:outset; border-width:1; font-family: Verdana; font-size: 8pt; font-weight: bold; background-color: #D7D7D7">
                                </td>
                                <td><input type="reset" name="reset" value="<?=$Frm_Cancel?>" style="height:20; border-style:outset; border-width:1; font-family: Verdana; font-size: 8pt; font-weight: bold; background-color: #D7D7D7">
                                </td>
                              </tr>
                          </table></td>
                        </tr>
                      </table>
                  </form></td>
                </tr>
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