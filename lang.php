<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$sqlItem="SELECT * FROM tbl_Item where lang=".$_SESSION["lang"];
$r = mysql_query($sqlItem,$cnn);
	if ($rowItem = mysql_fetch_array($r))
	{
		//====================Top======================
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
		//====================From ======================
		$Frm_ContactInfo	=$rowItem["Frm_ContactInfo"];
		$Frm_Name			=$rowItem["Frm_Name"];
		$Frm_Send			=$rowItem["Frm_Send"];
		$Frm_Cancel			=$rowItem["Frm_Cancel"];
		$Frm_Content		=$rowItem["Frm_Content"];
		$Frm_Title			=$rowItem["Frm_Title"];
		$Frm_Email			=$rowItem["Frm_Email"];
		$Frm_Country		=$rowItem["Frm_Country"];		
		$Frm_SiteName		=$rowItem["Frm_SiteName"];		
		$Frm_Siteurl		=$rowItem["Frm_Siteurl"];		
		$Frm_SiteDesc		=$rowItem["Frm_SiteDesc"];		
		$Frm_Comment		=$rowItem["Frm_Comment"];		
		$Frm_Tel			=$rowItem["Frm_Tel"];		
		//====================Main======================
		$Main_Detail		=$rowItem["Main_Detail"];
		$Main_Other			=$rowItem["Main_Other"];
	}
$lang=$_SESSION["lang"];
switch ($lang)
{
	case 1:
		define('frm_office','Main Office');
		define('frm_address','Address');
		define('frm_addressinfo','Halong road, Baichay ward, Halong <br> Quangninh province - Vietnam');
		define('frm_tel','Tel');
		define('frm_messinfo','Send Message');
		define('frm_title','Message title');
		define('frm_name','Full name');
		define('frm_content','Message content');
		define('frm_adate','Arrival');
		define('frm_ddate','Departure');
		define('frm_time','Arrival time');
		define('frm_hour','Clock');
		define('frm_minute','Minute');
		define('frm_roomstyle','Room style');
		define('frm_roomnumber','Number of Room(s)');
		define('frm_npersion','Number of Persion(s)');
		define('frm_npersion1','Number of Room(s)');
		define('frm_persion','Person(s)'); 
		define('frm_children','Children'); 
		define('frm_adult','Adult(s)'); 
		define('frm_request','Special request');
		define('frm_typecard','Type of credit card');
		define('frm_cardnumber','Credit card number');
		define('frm_stopdate','Expiry date');
		define('frm_book','Book Now'); 
		define('frm_smys','Submit your site');
		define('frm_sitetitle','Site title');
		define('frm_siteurl','Site URL');
		define('frm_sitedescription','Site Description');
		define('frm_comment','Comments');
		define('frm_submit','Submit');
		define('frm_room','Room(s)'); 
	break;
	
	case 2:
		define('frm_office','Trụ sở chính');
		define('frm_address','Địa chỉ');
		define('frm_addressinfo','Đường Hạ Long - Phường Bãi Cháy - TP.Hạ Long <br> Quảng Ninh - Việt Nam');
		define('frm_tel','Điện thoại');
		define('frm_messinfo','Thông tin liên hệ');
		define('frm_title','Tiêu đề');
		define('frm_name','Họ tên');
		define('frm_content','Nội dung liên hệ');
		define('frm_adate','Ngày đến');
		define('frm_ddate','Ngày đi');
		define('frm_time','Thời gian đến');
		define('frm_hour','Giờ');
		define('frm_minute','Phút');
		define('frm_roomstyle','Loại phòng');
		define('frm_roomnumber','Số phòng');
		define('frm_npersion','Số người'); 
		define('frm_npersion1','Số phòng');
		define('frm_persion','Người'); 
		define('frm_room','Phòng'); 
		define('frm_children','Trẻ em'); 
		define('frm_adult','Người lớn'); 
		define('frm_request','Điền thêm các thông tin cần thiết');
		define('frm_typecard','Loại thẻ');
		define('frm_cardnumber','Số thẻ');
		define('frm_stopdate','Ngày hết hạn');
		define('frm_book','Đặt ngay');
		define('frm_smys','Gửi đường dẫn'); 
		define('frm_sitetitle','Tiêu đề site');
		define('frm_siteurl','Đường dẫn site');
		define('frm_sitedescription','Chú thích site');
		define('frm_comment','Nội dung');
		define('frm_submit','Gửi');
		break;
	}
?>