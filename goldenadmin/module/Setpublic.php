<?php
require("../connect.inc");
$funconnect='ConnectTour';
$cnn=$funconnect();
$mod=$_REQUEST["mod"];
$id=$_REQUEST["id"];
$act=$_REQUEST["act"];
$id_current=$_REQUEST["id_current"];
$kind=$_REQUEST["kind"];	
$sql="UPDATE tb_".$mod." SET ispublic = not ispublic WHERE id=".$id;
mysql_query($sql,$cnn);
mysql_close($cnn);
?>
<script>
alert("Update successfuly !")
location="../?mod=<?=$mod?>&id=<?=$id?>&id_current=<?=$id_current?>&kind=<?=$kind?>"
</script>