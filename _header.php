<?php
session_start();
include('goldenadmin/connect.inc');
$funconnect='ConnectTour';
$cnn=$funconnect();
$mod=$_REQUEST["mod"];
$id_current=$_REQUEST["id_current"];
$lang=$_SESSION["lang"];
$lan=$_REQUEST["lang"];
if ($lan!='')	
{
	$_SESSION["lang"]=$lan;
	$lang=$_SESSION["lang"];
}
else
{
	$_SESSION["lang"]=1;
	$lang=$_SESSION["lang"];
}
require("lang.php");
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/style.css" rel="stylesheet">
<script language="javascript" src="goldenadmin/javascript/LeftMenu.js"></script>
<script language="JavaScript">
function LargerPicture(picName)
{
	window.open('view.php?'+ picName,"",'resizable=1,HEIGHT=200,WIDTH=200,top=' + ((screen.height - 500)/2) + ',left=' + ((screen.width - 684)/2));
}
//function ChangeLang(x)
//{
//window.self.location='makeURL.asp?lang='+x;
//}
</script>
<script language="javascript" src="js/calendar.js">
</script>
<script language='Javascript'>
<!--//
var calendar = new Calendar();
calendar.css             = 'css/blue.css';
calendar.date_format     = 'dd/mm/yyyy ';
calendar.datetime_format = 'dd-mm-yyyy ';
calendar.width           = 400;
calendar.height          = 235;
calendar.scrollbars      = 'no';
calendar.startday        = 'mon';
calendar.language        = 'en';
//-->
</script>
</HEAD>
<BODY background="skin/bg.jpg" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding-top:10px ">
		<!--===========================================================================-->
		<table width="900" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
		  <tr>
			<td style="padding-bottom:10px" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
			  <tr>
				<td class="Top" onMouseOver="this.className='Top_Over';" onMouseOut="this.className='Top';" align="center" valign="top"
				onClick="document.location='../';"><?=$Top_Home?></td>
				<td class="Top" onMouseOver="this.className='Top_Over';" onMouseOut="this.className='Top';" align="center" valign="top"
				onClick="document.location='?mod=about&lang=<?=$lang?>';"><?=$Top_About?></td>
				<td class="Top" onMouseOver="this.className='Top_Over';" onMouseOut="this.className='Top';" align="center" valign="top"
				onClick="document.location='?mod=accomodation&lang=<?=$lang?>';"><?=$Top_Accomodation?></td>
				<td class="Top" onMouseOver="this.className='Top_Over';" onMouseOut="this.className='Top';" align="center" valign="top"
				onClick="document.location='?mod=food&lang=<?=$lang?>';"><?=$Top_Food?></td>
				<td class="Top" onMouseOver="this.className='Top_Over';" onMouseOut="this.className='Top';" align="center" valign="top"
				onClick="document.location='?mod=service&lang=<?=$lang?>';"><?=$Top_Service?></td>
				<td class="Top" onMouseOver="this.className='Top_Over';" onMouseOut="this.className='Top';" align="center" valign="top"
				onClick="document.location='?mod=business&lang=<?=$lang?>';"><?=$Top_Business?></td>
				<td class="Top" onMouseOver="this.className='Top_Over';" onMouseOut="this.className='Top';" align="center" valign="top"
				onClick="document.location='?mod=promotion&lang=<?=$lang?>';"><?=$Top_Promotion?></td>
				<td class="Top" onMouseOver="this.className='Top_Over';" onMouseOut="this.className='Top';" align="center" valign="top"
				onClick="document.location='?mod=feedback&lang=<?=$lang?>';"><?=$Top_Feedback?></td>
				<td class="Top" onMouseOver="this.className='Top_Over';" onMouseOut="this.className='Top';" align="center" valign="top"
				onClick="document.location='?mod=bookroom&lang=<?=$lang?>';"><?=$Top_Booking?></td>
				<td class="Top" onMouseOver="this.className='Top_Over';" onMouseOut="this.className='Top';" align="center" valign="top"
				onClick="document.location='?mod=link&lang=<?=$lang?>';"><?=$Top_Link?></td>
				<td class="TopContact" onMouseOver="this.className='TopContact_Over';" onMouseOut="this.className='TopContact';" align="center" valign="top"
				onClick="document.location='?mod=contact&lang=<?=$lang?>';"><?=$Top_Contact?></td>
			  </tr>
			</table></td>
		  </tr>
		  <tr>
			<td>
			<table width="878" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
			  <tr>
				<td style="padding-bottom:10px "><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="881" height="158">
                  <param name="movie" value="skin/banner-halong.swf">
                  <param name="quality" value="high">
                  <embed src="skin/banner-halong.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="881" height="158"></embed>
			    </object></td>
			  </tr>
			  <tr>
				<td bgcolor="#ECE4BD" style="padding-bottom:10px; color:#68560A ">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">				
                  <tr>
                    <td width="26%" align="right" valign="bottom" style="font-size:14px; font-weight:bold; padding-right:8px ">Booking rooms </td>
                    <form name="HeadFrm" action="?mod=bookroom" method="post">
					<td width="22%"><strong>Check in </strong><br>
					<input name="ardate" type="text" id="ardate" size="20" onFocus="javascript:this.blur();" style=" border:1px solid #CCCCCC ">
					&nbsp;<a title="Set Date" onclick="javascript:popupDate('HeadFrm.ardate');"><img src="skin/b_calendar.png" width="16" height="16" align="absmiddle"></a></td>
                    <td width="22%"><strong>Check out</strong><br> 
					<input name="drdate" type="text" id="drdate" size="20" onFocus="javascript:this.blur();" style=" border:1px solid #CCCCCC ">
&nbsp;<a title="Set Date" onclick="javascript:popupDate('HeadFrm.drdate');"><img src="skin/b_calendar.png" width="16" height="16"  align="absmiddle"></a></td>
                    <td width="5%"><strong>Rooms</strong><br>
					<select name="Room">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					</select></td>
                    <td width="13%" valign="bottom"><input name="btnSend" type="image" src="skin/buttom.gif"></td>
					</form>
					<form action="" method="post">
					<td width="10%"><strong>Languge</strong><br>
					<select size="1" name="lang" style="border: 1px solid #868686; width:100px" >							
						<option value="2" <? if ($lang=2) echo "selected" ?> >Vienamese</option>														
						<option value="1" <? if ($lang=1) echo "selected" ?> >English</option>
					</select>
					</td>
					<td width="2%" valign="bottom"><input name="sent" type="image" src="skin/buttom.gif"></td>
					</form>
                  </tr>
				  
                </table></td>
			  </tr>
			  <tr>
				<td style="padding-bottom:10px; padding-top:10px ">
				<!--===============================================Main===============================================-->