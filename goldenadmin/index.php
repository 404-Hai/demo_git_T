<?php 
function Domod()
{
	require("inc_header.php");
	$mod=$_REQUEST["mod"];	
	if ($mod=="")
	{
		$mod="index";
	}
	$f="_".$mod.".php";
	require("$f");
	require("inc_footer.php");	
}
Domod();
?>