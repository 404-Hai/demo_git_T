<META http-equiv=Content-Type content="text/html; charset=UTF-8">
<?php
session_start();
function SendMail($From,$FromName,$To,$ToName,$Subject,$Text,$Html,$AttmFiles)
{
$OB="----=_OuterBoundary_000";
$IB="----=_InnerBoundery_001";
$Html=$Html?$Html:preg_replace("/\n/","{br}",$Text) 
 or die("neither text nor html part present.");
$Text=$Text?$Text:"Sorry, but you need an html mailer to read this mail.";
//$From or die("sender address missing");
//$To or die("recipient address missing");
$headers="From: ".$FromName." <".$From.">\n"; 
$headers.="To: ".$ToName." <".$To.">\n"; 
$headers.="Reply-To: ".$FromName." <".$From.">\n"; 
$headers.="X-Priority: 1\n"; 
$headers.="X-MSMail-Priority: High\n"; 
$headers.="X-Mailer: My PHP Mailer\n"; 
$headers.="Content-Type: multipart/mixed;\n\tboundary=\"".$OB."\"\n";

//Messages start with text/html alternatives in OB
$Msg ="This is a multi-part message in MIME format.\n";
$Msg.="\n--".$OB."\n";
$Msg.="Content-Type: multipart/alternative;\n\tboundary=\"".$IB."\"\n\n";

//plaintext section 
$Msg.="\n--".$IB."\n";
$Msg.="Content-Type: text/plain;\n\tcharset=\"utf-8\"\n";
$Msg.="Content-Transfer-Encoding: quoted-printable\n\n";
// plaintext goes here
$Msg.=$Text."\n\n";

// html section 
$Msg.="\n--".$IB."\n";
$Msg.="Content-Type: text/html;\n\tcharset=\"utf-8\"\n";
$Msg.="Content-Transfer-Encoding: base64\n\n";
// html goes here 
$Msg.=chunk_split(base64_encode($Html))."\n\n";

// end of IB
$Msg.="\n--".$IB."--\n";

// attachments
if($AttmFiles){
 foreach($AttmFiles as $AttmFile){
 $patharray = explode ("/", $AttmFile); 
  $FileName=$patharray[count($patharray)-1];
  $Msg.= "\n--".$OB."\n";
  $Msg.="Content-Type: application/octetstream;\n\tname=\"".$FileName."\"\n";
 $Msg.="Content-Transfer-Encoding: base64\n";
  $Msg.="Content-Disposition: attachment;\n\tfilename=\"".$FileName."\"\n\n";

 //file goes here
  $fd=fopen ($AttmFile, "r");
  $FileContent=fread($fd,filesize($AttmFile));
  fclose ($fd);
  $FileContent=chunk_split(base64_encode($FileContent));
  $Msg.=$FileContent;
  $Msg.="\n\n";
 }
}
//message ends
$Msg.="\n--".$OB."--\n";
mail($To,$Subject,$Msg,$headers); 
//syslog(LOG_INFO,"Mail: Message sent to $ToName <$To>");
}
$lang=$_REQUEST["lang"];
//$lang=$_SESSION["lang"];
switch ($lang)
{
	case 1:		
		define('alt05','Bạn đã đặt dịch vụ thành công, chúng tôi sẽ trả lời trong vòng 24 tiếng!');		
	break;
	
	case 2:				
		define("alt05","Your booking is successful! we'll feedback your infomaiton in 24h!");		
	break;
}
$adate=$HTTP_POST_VARS["adate"];
$ddate=$HTTP_POST_VARS["ddate"];
$hour=$HTTP_POST_VARS["hour"];
$minute=$HTTP_POST_VARS["minute"];
$roomstyle=$HTTP_POST_VARS["roomstyle"];
$npersion=$HTTP_POST_VARS["npersion"];
$children=$HTTP_POST_VARS["children"];
$adults=$HTTP_POST_VARS["adults"];

$yourname=$HTTP_POST_VARS["yourname"];
$email=$HTTP_POST_VARS["email"];
$address=$HTTP_POST_VARS["address"];
$tel=$HTTP_POST_VARS["tel"];
$fax=$HTTP_POST_VARS["fax"];
$typecard=$HTTP_POST_VARS["typecard"];
$cardnumber=$HTTP_POST_VARS["cardnumber"];
$stopdate=$HTTP_POST_VARS["stopdate"];
$detail=$HTTP_POST_VARS["detail"];

$message = "<table width=100% align=center border=1 cellspacing=2 cellpadding=2 style='border-collapse:collapse; font-family:Verdana; font-size:11px' bordercolor='#000033'>";
$message = $message."<tr>";
$message = $message."<td width=40% bgcolor='#FF9900'> Arrival </td>";
$message = $message."<td width=60%>".$adate."</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'> Departure </td>";
$message = $message."<td>".$ddate."</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'> Arrival time </td>";
$message = $message."<td>".$hour." - ".$minute."</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'> Room style </td>";
$message = $message."<td>".$roomstyle." - Number of person ".$npersion."</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'> Children</td>";
$message = $message."<td>".$children." Adults ".$adults."</td>";
$message = $message."</tr>"; 
$message = $message."<tr>";
$message = $message."<td colspan=2>&nbsp;</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'><strong> Guest Name * :</strong>  </td>";
$message = $message."<td>".$yourname."</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'><strong> E-mail address * :</strong> </td>";
$message = $message."<td>".$email."</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'><strong> Address :</strong> </td>";
$message = $message."<td>".$address."</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'><strong> Tel :</strong></td>";
$message = $message."<td>".$tel."</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'><strong> Fax :</strong> </td>";
$message = $message."<td>".$fax."</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'><strong> Type of credit card :</strong> </td>";
$message = $message."<td>".$typecard."</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'><strong> Credit card number :</strong> </td>";
$message = $message."<td>".$cardnumber."</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'><strong> Expiry date :</strong> </td>";
$message = $message."<td>".$stopdate."</td>";
$message = $message."</tr>";
$message = $message."<tr>";
$message = $message."<td bgcolor='#FF9900'><strong> Indicate here for any special request :</strong> </td>";
$message = $message."<td>".$detail."</td>";
$message = $message."</tr>";
$message = $message."</table>";

SendMail($email,$yourname,"adconline811@yahoo.com","Hop Thu","Booking room!","",$message,"");
?>
<script>
alert("<? echo alt05?>")
location="index.php?mod=reservation&id=1&lang=<? echo $lang?>"
</script>