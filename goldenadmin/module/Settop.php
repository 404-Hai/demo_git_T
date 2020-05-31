<?php
require("../connect.inc");
$funconnect='ConnectTour';
$cnn=$funconnect();
$mod=$_REQUEST["mod"];
$id=$_REQUEST["id"];
$act=$_REQUEST["act"];
$id_current=$_REQUEST["id_current"];
$kind=$_REQUEST["kind"];
if ($mod="tours")
{
	$sql="UPDATE tb_".$mod." SET Istop = not Istop WHERE ID=".$id;	
}
else
{
	if ($mod=="hotels" || $mod=="location")
		$sql="UPDATE tbl_".$mod." SET Istop = not Istop WHERE ID=".$id;	
	else
		$sql="UPDATE tbl_".$mod." SET ".$mod."_Istop = not ".$mod."_Istop WHERE ".$mod."_ID=".$id;	
}
//echo $sql;
mysql_query($sql,$cnn);
mysql_close($cnn);
?>
<script>
alert("Update successfuly !")
location="../?mod=<?=$mod?>&id=<?=$id?>&id_current=<?=$id_current?>&kind=<?=$kind?>"
</script>