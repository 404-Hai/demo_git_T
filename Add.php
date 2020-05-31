<?php session_start();
require("goldenadmin/connect.inc");
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
	case "feedback":
		$Feedback_Name = $HTTP_POST_VARS["Feedback_Name"];
		$Feedback_Email = $HTTP_POST_VARS["Feedback_Email"];
		$Feedback_Tel = $HTTP_POST_VARS["Feedback_Tel"];
		$Feedback_Comment = $HTTP_POST_VARS["Feedback_Comment"];
		$sql="INSERT INTO tbl_Feedback(Feedback_Name,Feedback_Email,Feedback_Tel,Feedback_Comment) values 
		('".$Feedback_Name."','".$Feedback_Email."','".$Feedback_Tel."','".$Feedback_Comment."')";
	break;
	//===========================================================================================
	case "link":
		$Link_Name 			= $HTTP_POST_VARS["Link_Name"];
		$Link_Email 		= $HTTP_POST_VARS["Link_Email"];
		$Link_Site 			= $HTTP_POST_VARS["Link_Site"];
		$Link_Description 	= $HTTP_POST_VARS["Link_Description"];
		$Link_Comment		= $HTTP_POST_VARS["Link_Comment"];
		$sql="INSERT INTO tbl_Link(Link_Name,Link_Email,Link_Site,Link_Description,Link_Comment,lang) values 
		('".$Link_Name."','".$Link_Email."','".$Link_Site."','".$Link_Description."','".$Link_Comment."',".$lang.")";
	break;	
	//===========================================================================================
	case "restaurent":
		$Restaurent_Name = $HTTP_POST_VARS["Restaurent_Name"];
		$Restaurent_Image = $HTTP_POST_VARS["inpImgURL"];
		$Restaurent_Teaser = $HTTP_POST_VARS["Restaurent_Teaser"];
		$Restaurent_Content = $HTTP_POST_VARS["Restaurent_Content"];
		$sql="INSERT INTO tbl_Restaurent(Restaurent_Parent,Restaurent_Name,Restaurent_Image,Restaurent_Teaser,Restaurent_Content,lang) values (".$id_current.",'".$Restaurent_Name."','".$Restaurent_Image."','".$Restaurent_Teaser."','".$Restaurent_Content."',".$lang.")";
	break;
	//===========================================================================================
}
//echo $sql;
mysql_query($sql,$cnn);
mysql_close($cnn);
?>
<script>
alert("Add successfuly !")
location="index.php?mod=<?=$mod?>&id_current=<?=$id_current?>&kind=<?=$kind?>&act=<?=$act?>&curPg=<?=$curPg?>&iposition=<?=$iposition?>"
</script>