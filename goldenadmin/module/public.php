<?
require("../connect.inc");
$funconnect='ConnectTour';
$cnn=$funconnect();
$IsStatus=$_REQUEST["use"];
$ID=$_REQUEST["id"];
$curPg=$_REQUEST["curPg"];
$mod=$_REQUEST["mod"];
$sql="UPDATE tbl_".$mod." SET  ".$mod."_Isview=".$IsStatus." WHERE ".$mod."_ID=".$ID;	
mysql_query($sql,$cnn);
mysql_close($cnn);
?>
<script>
location="../index.php?mod=<?=$mod?>&curPg=<?=$curPg?>&act="
</script>