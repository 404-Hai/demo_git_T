<?php 
  function ConnectTour()
  {
  	$link = mysql_connect("localhost","admin","admin") or die("Khong ket noi duoc toi may chu.");
	$product_db=  mysql_select_db("halong",$link) or die("Khong ket noi duoc voi database.");
  	return $link;
  }
?>