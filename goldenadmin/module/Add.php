<?php session_start();
require("../connect.inc");
$funconnect='ConnectTour';
$cnn=$funconnect();
$mod=$_REQUEST["mod"];
$id_current=$_REQUEST["id_current"];
$kind=$_REQUEST["kind"];
$lang=$_SESSION["lang"];
$curPg=$_REQUEST["curPg"];

switch ($mod)
{
	//===========================================================================================
	case "service":
		$Service_Name 		= $HTTP_POST_VARS["Service_Name"];
		$Service_Image 		= $HTTP_POST_VARS["inpImgURL"];
		$Service_Teaser 	= $HTTP_POST_VARS["Service_Teaser"];
		$Service_Content 	= $HTTP_POST_VARS["Service_Content"];
		$sql="INSERT INTO tbl_Service(Service_Parent,Service_Name,Service_Image,Service_Teaser,Service_Content,lang) values (".$id_current.",'".$Service_Name."','".$Service_Image."','".$Service_Teaser."','".$Service_Content."',".$lang.")";
	break;
	//===========================================================================================
	case "accomodation":
		$Accomodation_Name 		= $HTTP_POST_VARS["Accomodation_Name"];
		$Accomodation_Image 	= $HTTP_POST_VARS["inpImgURL"];
		$Accomodation_Teaser 	= $HTTP_POST_VARS["Accomodation_Teaser"];
		$Accomodation_Content 	= $HTTP_POST_VARS["Accomodation_Content"];
		$sql="INSERT INTO tbl_Accomodation(Accomodation_Parent,Accomodation_Name,Accomodation_Image,Accomodation_Teaser,Accomodation_Content,lang) values 
		(".$id_current.",'".$Accomodation_Name."','".$Accomodation_Image."','".$Accomodation_Teaser."','".$Accomodation_Content."',".$lang.")";
	break;	
	//===========================================================================================
	case "food":
		$Food_Name 		= $HTTP_POST_VARS["Food_Name"];
		$Food_Image 	= $HTTP_POST_VARS["inpImgURL"];
		$Food_Teaser 	= $HTTP_POST_VARS["Food_Teaser"];
		$Food_Content 	= $HTTP_POST_VARS["Food_Content"];
		$sql="INSERT INTO tbl_Food(Food_Parent,Food_Name,Food_Image,Food_Teaser,Food_Content,lang) values (".$id_current.",'".$Food_Name."','".$Food_Image."','".$Food_Teaser."','".$Food_Content."',".$lang.")";
	break;
	//===========================================================================================
	case "business":
		$Business_Name 		= $HTTP_POST_VARS["Business_Name"];
		$Business_Image 	= $HTTP_POST_VARS["inpImgURL"];
		$Business_Teaser 	= $HTTP_POST_VARS["Business_Teaser"];
		$Business_Content 	= $HTTP_POST_VARS["Business_Content"];
		$sql="INSERT INTO tbl_Business(Business_Parent,Business_Name,Business_Image,Business_Teaser,Business_Content,lang) values (".$id_current.",'".$Business_Name."','".$Business_Image."','".$Business_Teaser."','".$Business_Content."',".$lang.")";
	break;	
	//===========================================================================================
	case "promotion":
		$Promotion_Name 	= $HTTP_POST_VARS["Promotion_Name"];
		$Promotion_Image 	= $HTTP_POST_VARS["inpImgURL"];
		$Promotion_Teaser 	= $HTTP_POST_VARS["Promotion_Teaser"];
		$Promotion_Content 	= $HTTP_POST_VARS["Promotion_Content"];
		$sql="INSERT INTO tbl_Promotion(Promotion_Parent,Promotion_Name,Promotion_Image,Promotion_Teaser,Promotion_Content,lang) values (".$id_current.",'".$Promotion_Name."','".$Promotion_Image."','".$Promotion_Teaser."','".$Promotion_Content."',".$lang.")";
	break;	
		//===========================================================================================
	case "feedback":
		$Feedback_Name 		= $HTTP_POST_VARS["Feedback_Name"];
		$Feedback_Email 	= $HTTP_POST_VARS["Feedback_Email"];
		$Feedback_Tel 		= $HTTP_POST_VARS["Feedback_Tel"];
		$Feedback_Comment 	= $HTTP_POST_VARS["Feedback_Comment"];
		$Feedback_Content 	= $HTTP_POST_VARS["Feedback_Content"];
		$sql="INSERT INTO tbl_Feedback(Feedback_Name,Feedback_Email,Feedback_Tel,Feedback_Comment,Feedback_Content) values ('".$Feedback_Name."','".$Feedback_Email."','".$Feedback_Tel."','".$Feedback_Comment."','".$Feedback_Content."')";
	break;	
	//===========================================================================================
	case "link":
		$Link_Name			=$HTTP_POST_VARS["Link_Name"];			
		$Link_Email			=$HTTP_POST_VARS["Link_Email"];
		$Link_Site			=$HTTP_POST_VARS["Link_Site"];
		$Link_Comment		=$HTTP_POST_VARS["Link_Comment"];
		$Link_Description	=$HTTP_POST_VARS["Link_Description"];
		$sql="INSERT INTO tbl_Link(Link_Name,Link_Email,Link_Site,Link_Comment,Link_Description) values ('".$Link_Name."','".$Link_Email."','".$Link_Site."','".$Link_Comment."','".$Link_Description."')";
	break;
	//===========================================================================================
	case "menu":
		$Menu_Name 		= $HTTP_POST_VARS["Menu_Name"];
		$Menu_Image 	= $HTTP_POST_VARS["inpImgURL"];
		$Menu_Teaser 	= $HTTP_POST_VARS["Menu_Teaser"];
		$Menu_Content 	= $HTTP_POST_VARS["Menu_Content"];
		$sql="INSERT INTO tbl_Menu(Menu_Name,Menu_Image,Menu_Teaser,Menu_Content,lang) values ('".$Menu_Name."','".$Menu_Image."','".$Menu_Teaser."','".$Menu_Content."',".$lang.")";
	break;
	//===========================================================================================	
	case "Adv":		
		$Adv_Image = $HTTP_POST_VARS["inpImgURL"];
		$Adv_Link = $HTTP_POST_VARS["Adv_Link"];
		$sql="INSERT INTO tbl_Adv(Adv_Image,Adv_Link,Adv_Position) VALUES ('".$Adv_Image."','".$Adv_Link."','right')";
	break;	
	//===========================================================================================	
	case "album":		
		$Album_Image	= $HTTP_POST_VARS["inpImgURL"];	
		$Album_Parent	= $HTTP_POST_VARS["Album_Parent"];
		$Album_Name		= $HTTP_POST_VARS["Album_Name"];
		$Album_Link		= $HTTP_POST_VARS["Album_Link"];
		$sql="INSERT INTO tbl_Album(Album_Parent,Album_Image,Album_Name,Album_Link) VALUES ('".$Album_Parent."','".$Album_Image."','".$Album_Name."','".$Album_Link."')";
	break;	
}
//echo $sql;
mysql_query($sql,$cnn);
mysql_close($cnn);
?>
<script>
alert("Add successfuly !")
location="../?mod=<?=$mod?>&id_current=<?=$id_current?>&kind=<?=$kind?>&act=<?=$act?>&curPg=<?=$curPg?>&iposition=<?=$iposition?>"
</script>