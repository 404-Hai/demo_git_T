<?php
require("../connect.inc");
$funconnect='ConnectTour';
$cnn=$funconnect();
$id_current=$_REQUEST["id_current"];
$kind=$_REQUEST["kind"];
$curPg=$_REQUEST["curPg"];
$mod=$_REQUEST["mod"];
$id=$_REQUEST["id"];
$sql="DELETE FROM tb_".$mod." WHERE id=".$id;	
mysql_query($sql,$cnn);
mysql_close($cnn);
?>
<script>
//alert("Delete successfuly !")
location="../?mod=index"
</script>