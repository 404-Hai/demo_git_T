<? session_start();
$lang=$_GET["lang"];
$mod=$_GET["mod"];
$_SESSION["lang"]==$lang;
//require("../?mod=$mod");
header("Location:../?mod=$mod");
?>