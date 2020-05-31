<?php session_start();
require("../connect.inc");
$funconnect='ConnectTour';
$cnn=$funconnect();
//=========================================
$mod=$_REQUEST["mod"];
$id=$_REQUEST["id"];
$id_current=$_REQUEST["id_current"];
$kind=$_REQUEST["kind"];
$lang=$_SESSION["lang"];
$curPg=$_REQUEST["curPg"];
//=========================================
switch ($mod)
{
	//==================================================================================
	case "about":
		$About_Content = $HTTP_POST_VARS["About_Content"];
		$sql="UPDATE tbl_About SET About_Content='".$About_Content."' WHERE About_ID=".$id;
	break;
	//==================================================================================
	case "service":
		$Service_Name 		= $HTTP_POST_VARS["Service_Name"];
		$Service_Image 		= $HTTP_POST_VARS["inpImgURL"];
		$Service_Teaser 	= $HTTP_POST_VARS["Service_Teaser"];
		$Service_Content 	= $HTTP_POST_VARS["Service_Content"];
		$sql="UPDATE tbl_Service SET Service_Name='".$Service_Name."', Service_Image='".$Service_Image."', Service_Teaser='".$Service_Teaser."', Service_Content='".$Service_Content."' WHERE Service_ID=".$id;	
	break;
	//==================================================================================
	case "accomodation":
		$Accomodation_Name 		= $HTTP_POST_VARS["Accomodation_Name"];
		$Accomodation_Image 	= $HTTP_POST_VARS["inpImgURL"];
		$Accomodation_Teaser 	= $HTTP_POST_VARS["Accomodation_Teaser"];
		$Accomodation_Content 	= $HTTP_POST_VARS["Accomodation_Content"];
		$sql="UPDATE tbl_Accomodation SET Accomodation_Name='".$Accomodation_Name."', Accomodation_Image='".$Accomodation_Image."', Accomodation_Teaser='".$Accomodation_Teaser."', Accomodation_Content='".$Accomodation_Content."' WHERE Accomodation_ID=".$id;	
	break;
	//==================================================================================
	case "food":
		$Food_Name 		= $HTTP_POST_VARS["Food_Name"];
		$Food_Image 	= $HTTP_POST_VARS["inpImgURL"];
		$Food_Teaser 	= $HTTP_POST_VARS["Food_Teaser"];
		$Food_Content 	= $HTTP_POST_VARS["Food_Content"];
		$sql="UPDATE tbl_Food SET Food_Name='".$Food_Name."', Food_Image='".$Food_Image."', Food_Teaser='".$Food_Teaser."', Food_Content='".$Food_Content."' WHERE Food_ID=".$id;	
	break;
	//==================================================================================
	case "business":
		$Business_Name 		= $HTTP_POST_VARS["Business_Name"];
		$Business_Image 	= $HTTP_POST_VARS["inpImgURL"];
		$Business_Teaser 	= $HTTP_POST_VARS["Business_Teaser"];
		$Business_Content 	= $HTTP_POST_VARS["Business_Content"];
		$sql="UPDATE tbl_Business SET Business_Name='".$Business_Name."', Business_Image='".$Business_Image."', Business_Teaser='".$Business_Teaser."', Business_Content='".$Business_Content."' WHERE Business_ID=".$id;	
		break;
	//==================================================================================
	case "promotion":
		$Promotion_Name 	= $HTTP_POST_VARS["Promotion_Name"];
		$Promotion_Image 	= $HTTP_POST_VARS["inpImgURL"];
		$Promotion_Teaser 	= $HTTP_POST_VARS["Promotion_Teaser"];
		$Promotion_Content 	= $HTTP_POST_VARS["Promotion_Content"];
		$sql="UPDATE tbl_Promotion SET Promotion_Name='".$Promotion_Name."', Promotion_Image='".$Promotion_Image."', Promotion_Teaser='".$Promotion_Teaser."', Promotion_Content='".$Promotion_Content."' WHERE Promotion_ID=".$id;	
		break;
	//==================================================================================
	case "feedback":
		$Feedback_Name 		= $HTTP_POST_VARS["Feedback_Name"];
		$Feedback_Email 	= $HTTP_POST_VARS["Feedback_Email"];
		$Feedback_Tel 		= $HTTP_POST_VARS["Feedback_Tel"];
		$Feedback_Comment 	= $HTTP_POST_VARS["Feedback_Comment"];
		$Feedback_Content 	= $HTTP_POST_VARS["Feedback_Content"];
		$sql="UPDATE tbl_Feedback SET Feedback_Name='".$Feedback_Name."', Feedback_Email='".$Feedback_Email."', Feedback_Tel='".$Feedback_Tel."', Feedback_Comment='".$Feedback_Comment."', Feedback_Content='".$Feedback_Content."' WHERE Feedback_ID=".$id;	
		break;		
	//==================================================================================
	case "link":
		$Link_Name			=$HTTP_POST_VARS["Link_Name"];			
		$Link_Email			=$HTTP_POST_VARS["Link_Email"];
		$Link_Site			=$HTTP_POST_VARS["Link_Site"];
		$Link_Comment		=$HTTP_POST_VARS["Link_Comment"];
		$Link_Description	=$HTTP_POST_VARS["Link_Description"];
		$sql="UPDATE tbl_Link SET Link_Name='".$Link_Name."',Link_Email='".$Link_Email."', Link_Site='".$Link_Site."', Link_Comment='".$Link_Comment."', Link_Description='".$Link_Description."' WHERE Link_ID=".$id;	
	break;	
	//===========================================================================================
	case "menu":
		$Menu_Name 		= $HTTP_POST_VARS["Menu_Name"];
		$Menu_Image 	= $HTTP_POST_VARS["inpImgURL"];
		$Menu_Teaser 	= $HTTP_POST_VARS["Menu_Teaser"];
		$Menu_Content 	= $HTTP_POST_VARS["Menu_Content"];
		$sql="UPDATE tbl_Menu SET Menu_Name='".$Menu_Name."', Menu_Image='".$Menu_Image."', Menu_Teaser='".$Menu_Teaser."', Menu_Content='".$Menu_Content."' WHERE Menu_ID=".$id;	
	break;
	//==================================================================================
	case "Adv":							
		$Adv_Image = $HTTP_POST_VARS["inpImgURL"];
		$Adv_Link = $HTTP_POST_VARS["Adv_Link"];			
		$sql="UPDATE tbl_Adv SET Adv_Image='".$Adv_Image."', Adv_Link='".$Adv_Link."', Adv_Position='right' WHERE Adv_ID=".$id;	
	break;	
	//==================================================================================
	case "album":		
		$Album_Image	= $HTTP_POST_VARS["inpImgURL"];	
		$Album_Parent	= $HTTP_POST_VARS["Album_Parent"];
		$Album_Name		= $HTTP_POST_VARS["Album_Name"];
		$Album_Link		= $HTTP_POST_VARS["Album_Link"];
		$sql="UPDATE tbl_Album SET Album_Image='".$Album_Image."', Album_Link='".$Album_Link."', Album_Parent='".$Album_Parent."',Album_Name='".$Album_Name."' WHERE Album_ID=".$id;	
	break;	
	//==================================================================================
	case "item":									
		$Top_Home			=$HTTP_POST_VARS["Top_Home"];		
		$Top_About			=$HTTP_POST_VARS["Top_About"];
		$Top_Accomodation	=$HTTP_POST_VARS["Top_Accomodation"];		
		$Top_Food			=$HTTP_POST_VARS["Top_Food"];
		$Top_Service		=$HTTP_POST_VARS["Top_Service"];		
		$Top_Business		=$HTTP_POST_VARS["Top_Business"];
		$Top_Promotion		=$HTTP_POST_VARS["Top_Promotion"];		
		$Top_Feedback		=$HTTP_POST_VARS["Top_Feedback"];
		$Top_Booking		=$HTTP_POST_VARS["Top_Booking"];		
		$Top_Link			=$HTTP_POST_VARS["Top_Link"];
		$Top_Contact		=$HTTP_POST_VARS["Top_Contact"];		
		//========================================
		$Frm_SiteName		=$HTTP_POST_VARS["Frm_SiteName"];		
		$Frm_Siteurl		=$HTTP_POST_VARS["Frm_Siteurl"];
		$Frm_SiteDesc		=$HTTP_POST_VARS["Frm_SiteDesc"];		
		$Frm_Comment		=$HTTP_POST_VARS["Frm_Comment"];
		$Frm_Name			=$HTTP_POST_VARS["Frm_Name"];		
		$Frm_Tel			=$HTTP_POST_VARS["Frm_Tel"];
		$Frm_Country		=$HTTP_POST_VARS["Frm_Country"];		
		$Frm_Email			=$HTTP_POST_VARS["Frm_Email"];
		$Frm_Title			=$HTTP_POST_VARS["Frm_Title"];		
		$Frm_Content		=$HTTP_POST_VARS["Frm_Content"];
		$Frm_Send			=$HTTP_POST_VARS["Frm_Send"];		
		$Frm_Cancel			=$HTTP_POST_VARS["Frm_Cancel"];
		$Frm_ContactInfo	=$HTTP_POST_VARS["Frm_ContactInfo"];		
		//============================================
		$Main_Other			=$HTTP_POST_VARS["Main_Other"];		
		$Main_Detail		=$HTTP_POST_VARS["Main_Detail"];
		$sql="UPDATE tbl_Item SET Top_Home='".$Top_Home."', Top_About='".$Top_About."',
		Top_Accomodation='".$Top_Accomodation."', Top_Food='".$Top_Food."',
		Top_Service='".$Top_Service."', Top_Business='".$Top_Business."',
		Top_Promotion='".$Top_Promotion."', Top_Feedback='".$Top_Feedback."',
		Top_Booking='".$Top_Booking."', Top_Link='".$Top_Link."',
		Top_Contact='".$Top_Contact."', Frm_SiteName='".$Frm_SiteName."',
		Frm_Siteurl='".$Frm_Siteurl."', Frm_SiteDesc='".$Frm_SiteDesc."',
		Frm_Comment='".$Frm_Comment."', Frm_Comment='".$Frm_Comment."',
		Frm_Name='".$Frm_Name."', Frm_Tel='".$Frm_Tel."',
		Frm_Country='".$Frm_Country."', Frm_Email='".$Frm_Email."',
		Frm_Title='".$Frm_Title."', Frm_Content='".$Frm_Content."',
		Frm_Send='".$Frm_Send."', Frm_Cancel='".$Frm_Cancel."',
		Frm_ContactInfo='".$Frm_ContactInfo."',
		Main_Other='".$Main_Other."', Main_Detail='".$Main_Detail."' WHERE lang=".$_SESSION["lang"];
	break;	
	//==================================================================================
	case "changepass":
		$password=md5($HTTP_POST_VARS["password"]);
		$old_password=md5($HTTP_POST_VARS["old"]);
		$password1=md5($HTTP_POST_VARS["new1"]);
		$userid=$_REQUEST["userid"];
		
		$sql="SELECT * FROM tb_member WHERE userid='".$userid."'";
		$sqlpass="UPDATE tb_member SET password='".$password1."' WHERE userid='".$userid."'";
		$result=mysql_query($sql,$cnn);
		$row=mysql_fetch_array($result);
		$password_old=$row["password"];
		if($old_password==$password_old)
		{
			mysql_query($sqlpass,$cnn);
			mysql_close($cnn);
			?>
			<script>
			location="../?mod=<?=$mod?>&userid=<?=$userid?>&act=<?=$act?>&type=thanhcong";
			</script>
			<?			
		}
		else
		{
			?>
			<script>
			location="../?mod=<?=$mod?>&userid=<?=$userid?>&act=<?=$act?>&type=false";
			</script>
			<?
			mysql_close($cnn);
		}
}
//echo $sql;
mysql_query($sql,$cnn);
mysql_close($cnn);
?>
<script>
alert("Update successfuly !")
location="../?mod=<?=$mod?>&id=<?=$id?>&id_current=<?=$id_current?>&act=<?=$act?>&kind=<?=$kind?>&curPg=<?=$curPg?>&iposition=<?=$iposition?>"
</script>