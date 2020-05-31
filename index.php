<?php 
function Domod()
{
	require("_header.php");
	$mod=$_REQUEST["mod"];	
	if ($mod=="")
	{
		$mod="about";
	}
	$f="_".$mod.".php";
	require("$f");
	require("_footer.php");	
}
Domod();
?>