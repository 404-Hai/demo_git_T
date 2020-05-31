<?php
require("../connect.inc");
$funconnect='ConnectTour';
$cnn=$funconnect();
$id_current=$_REQUEST["id_current"];
$kind=$_REQUEST["kind"];
$curPg=$_REQUEST["curPg"];
$mod=$_REQUEST["mod"];
$id=$_REQUEST["id"];
if ($mod=="mail" || $mod=="tours")
{
	$sql="DELETE FROM tb_".$mod." WHERE ID=".$id;	
}
else
{
	if ($mod=="hotels" || $mod=="location")
		$sql="DELETE FROM tbl_".$mod." WHERE ID=".$id;	
	else
		$sql="DELETE FROM tbl_".$mod." WHERE ".$mod."_ID=".$id;	
}
mysql_query($sql,$cnn);
mysql_close($cnn);
?>
<script>
alert("Delete successfuly !")
location="../?mod=<?=$mod?>&id_current=<?=$id_current?>&kind=<?=$kind?>&curPg=<?=$curPg?>"
</script>