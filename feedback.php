<META http-equiv=Content-Type content="text/html; charset=UTF-8">
<?php
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
switch ($lang)
{
	case 1:		
		define('alt05','Bạn đã đặt dịch vụ thành công, chúng tôi sẽ trả lời trong vòng 24 tiếng!');		
	break;
	
	case 2:				
		define("alt05","Your booking is successful! we'll feedback your infomaiton in 24h!");		
	break;
}
$TB_hoten		= $HTTP_POST_VARS["TB_hoten"];
$Drl_thang_kh	= $HTTP_POST_VARS["Drl_thang_kh"];
$Drl_ngay_kh	= $HTTP_POST_VARS["Drl_ngay_kh"];
$Drl_nam_kh		= $HTTP_POST_VARS["Drl_nam_kh"];
$TB_phongso		= $HTTP_POST_VARS["TB_phongso"];
$nhanvien		= $HTTP_POST_VARS["nhanvien"];
$letan			= $HTTP_POST_VARS["letan"];
$thungan		= $HTTP_POST_VARS["thungan"];
$dienthoai		= $HTTP_POST_VARS["dienthoai"];
$khuanvac		= $HTTP_POST_VARS["khuanvac"];
$canhquan		= $HTTP_POST_VARS["canhquan"];
$CB_bar			= $HTTP_POST_VARS["CB_bar"];
$cb_nhahang		= $HTTP_POST_VARS["cb_nhahang"];	
$thucdon		= $HTTP_POST_VARS["thucdon"];
$dapung			= $HTTP_POST_VARS["dapung"];	
$dapung_an		= $HTTP_POST_VARS["dapung_an"];
$chatluong		= $HTTP_POST_VARS["chatluong"];
$thanthien		= $HTTP_POST_VARS["thanthien"];
$chatluong_an	= $HTTP_POST_VARS["chatluong_an"];
$dongia			= $HTTP_POST_VARS["dongia"];
$dadang			= $HTTP_POST_VARS["dadang"];
$phongnghi		= $HTTP_POST_VARS["phongnghi"];
$nhatam			= $HTTP_POST_VARS["nhatam"];
$giatla			= $HTTP_POST_VARS["giatla"];
$minibar		= $HTTP_POST_VARS["minibar"];
$trangtri		= $HTTP_POST_VARS["trangtri"];
$TB_yeucau		= $HTTP_POST_VARS["TB_yeucau"];

$message = "We wish to make each of your stay apleasant and memorable experience.Therefore your comments would appreciated";
$message = $message."<TABLE id=Table2 width=100% cellSpacing=1 cellPadding=1 border=1 style=border-collapse:collapse;  bordercolor=#666666>";
$message = $message."<TBODY>";
$message = $message."  <TR>";
$message = $message."	<TD colSpan=3 rowSpan=0 align=center bgcolor=#F3F3F3><strong>Your evaluations</strong></TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Your full name:</TD>";
$message = $message."	<TD>".$TB_hoten."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Date of staying in Congdoan Halong Hotel:</TD>";
$message = $message."	<TD> Month:".$Drl_thang_kh." Day:".$Drl_ngay_kh." Year: ".$Drl_nam_kh."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Room number:</TD>";
$message = $message."	<TD>".$TB_phongso."</TD>";
$message = $message."  </TR>";
$message = $message."</TBODY>";
$message = $message."</TABLE>";
$message = $message."<br>";

$message = $message."<TABLE id=Table1 cellSpacing=1 cellPadding=1 width=100% border=1 style=border-collapse:collapse;  bordercolor=#666666>";
$message = $message."<TBODY>";
$message = $message."  <TR>";
$message = $message."	<TD colSpan=4 rowSpan=0 align=center bgcolor=#F3F3F3><strong>OverView</strong></TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD width=41%>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </TD>";
$message = $message."	<TD width=21% align=center>Satisfatory</TD>";
$message = $message."	<TD width=20% align=center>Fair</TD>";
$message = $message."	<TD width=18% align=center>Unsatisfatory</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD align=center>Reservation staff:</TD>";
$message = $message."	<TD align=center>".$nhanvien."</TD><TD align=center>".$nhanvien."</TD><TD align=center>".$nhanvien."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Receptionists</TD>";
$message = $message."	<TD align=center>".$letan."</TD><TD align=center>".$letan."</TD><TD align=center>".$letan."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Cashiers</TD>";
$message = $message."	<TD align=center>".$thungan."</TD><TD align=center>".$thungan."</TD><TD align=center>".$thungan."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Tel operator</TD>";
$message = $message."	<TD align=center>".$dienthoai."</TD><TD align=center>".$dienthoai."</TD><TD align=center>".$dienthoai."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Porters</TD>";
$message = $message."	<TD align=center>".$khuanvac."</TD><TD align=center>".$khuanvac."</TD><TD align=center>".$khuanvac."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Ornametal trees</TD>";
$message = $message."	<TD align=center>".$canhquan."</TD><TD align=center>".$canhquan."</TD><TD align=center>".$canhquan."</TD>";
$message = $message."  </TR>";
$message = $message."</TBODY>";
$message = $message."</TABLE>";
$message = $message."<BR>";
$message = $message."<TABLE id=Table3 width=100% cellSpacing=1 cellPadding=1 border=1 style=border-collapse:collapse;  bordercolor=#666666>";
$message = $message."<TBODY>";
$message = $message."  <TR>";
$message = $message."	<TD colSpan=5 align=center bgcolor=#F3F3F3><strong>Food &amp; Beverage</strong></TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD colSpan=5 rowSpan=0>Meals and drink taken at:".$CB_bar."&nbsp; Bar&nbsp;&nbsp;".$cb_nhahang."&nbsp;Restaurants</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </TD>";
$message = $message."	<TD align=center>Excellent</TD>";
$message = $message."	<TD align=center>Good</TD>";
$message = $message."	<TD align=center>Average</TD>";
$message = $message."	<TD align=center>Poor</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Menu and beverage list written in understandable?</TD>";
$message = $message."	<TD align=center>".$thucdon."</TD><TD align=center>".$thucdon."</TD>";
$message = $message."	<TD align=center>".$thucdon."</TD><TD align=center>".$thucdon."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Was your order&nbsp;taken promply?</TD>";
$message = $message."	<TD align=center>".$dapung."</TD><TD align=center>".$dapung."</TD>";
$message = $message."	<TD align=center>".$dapung."</TD><TD align=center>".$dapung."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Was your food served promptly?</TD>";
$message = $message."	<TD align=center>".$dapung_an."</TD><TD align=center>".$dapung_an."</TD>";
$message = $message."	<TD align=center>".$dapung_an."</TD><TD align=center>".$dapung_an."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Service efficiency?</TD>";
$message = $message."	<TD align=center>".$chatluong."</TD><TD align=center>".$chatluong."</TD>";
$message = $message."	<TD align=center>".$chatluong."</TD><TD align=center>".$chatluong."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Friendly and hospitable services?</TD>";
$message = $message."	<TD align=center>".$thanthien."</TD><TD align=center>".$thanthien."</TD>";
$message = $message."	<TD align=center>".$thanthien."</TD><TD align=center>".$thanthien."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Quality of food?</TD>";
$message = $message."	<TD align=center>".$chatluong_an."</TD><TD align=center>".$chatluong_an."</TD>";
$message = $message."	<TD align=center>".$chatluong_an."</TD><TD align=center>".$chatluong_an."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Value of price pair?</TD>";
$message = $message."	<TD align=center>".$dongia."</TD><TD align=center>".$dongia."</TD>";
$message = $message."	<TD align=center>".$dongia."</TD><TD align=center>".$dongia."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Menu variety?</TD>";
$message = $message."	<TD align=center>".$dadang."</TD><TD align=center>".$dadang."</TD>";
$message = $message."	<TD align=center>".$dadang."</TD><TD align=center>".$dadang."</TD>";
$message = $message."  </TR>";
$message = $message."</TBODY>";
$message = $message."</TABLE>";
$message = $message."<BR>";
$message = $message."<TABLE id=Table5 cellSpacing=1 cellPadding=1 width=100% border=1 style=border-collapse:collapse;  bordercolor=#666666>";
$message = $message."<TBODY>";
$message = $message."  <TR>";
$message = $message."	<TD colSpan=5 align=center bgcolor=#F3F3F3><strong>Houskeeping</strong></TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </TD>";
$message = $message."	<TD align=center>Excellent</TD><TD align=center>Good</TD><TD align=center>Average</TD><TD align=center>Poor</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Cleanliness of room</TD>";
$message = $message."	<TD align=center>".$phongnghi."</TD><TD align=center>".$phongnghi."</TD>";
$message = $message."	<TD align=center>".$phongnghi."</TD><TD align=center>".$phongnghi."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Cleanliness of bathroom</TD>";
$message = $message."	<TD align=center>".$nhatam."</TD><TD align=center>".$nhatam."</TD>";
$message = $message."	<TD align=center>".$nhatam."</TD><TD align=center>".$nhatam."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Laundry service</TD>";
$message = $message."	<TD align=center>".$giatla."</TD><TD align=center>".$giatla."</TD>";
$message = $message."	<TD align=center>".$giatla."</TD><TD align=center>".$giatla."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Minibar</TD>";
$message = $message."	<TD align=center>".$minibar."</TD><TD align=center>".$minibar."</TD>";
$message = $message."	<TD align=center>".$minibar."</TD><TD align=center>".$minibar."</TD>";
$message = $message."  </TR>";
$message = $message."  <TR>";
$message = $message."	<TD>Decor</TD>";
$message = $message."	<TD align=center>".$trangtri."</TD><TD align=center>".$trangtri."</TD>";
$message = $message."	<TD align=center>".$trangtri."</TD><TD align=center>".$trangtri."</TD>";
$message = $message."  </TR>";
$message = $message."</TBODY>";
$message = $message."</TABLE>";
$message = $message."<BR>";
$message = $message."<strong>Others Comments:</strong><br>".$TB_yeucau."<br>";

SendMail("adconline811@yahoo.com",$TB_hoten,"checkonline811@yahoo.com","Hop Thu","Booking room!","",$message,"");
?>
<script>
alert("<? echo alt05?>")
location="index.php?mod=feedback&id=1&lang=<? echo $lang?>"
</script>