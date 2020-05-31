<?php
function ActSelect($sql,$Name,$select,$cnn)
{
	echo"<SELECT name='$Name'>";
	$result=mysql_query($sql,$cnn);
	while ($row = mysql_fetch_array ($result))
	{
		$key=$row["txtname"];
		if($select=="") $select=$key;
		$show="<option value='$key' ";
		if($key==$select)
		{
			$show.="selected ";
		}
		$show.=" >".$row["txtname"]."</option>";
		echo $show;
	}
	echo "</SELECT>";
}
//-----------------------------------------------------------------------------------------
function PrintSelect($Mang,$Name,$select)
{
	echo"<SELECT name='$Name'>";
	for(reset($Mang);$key=key($Mang);next($Mang))
	{
		if($select=="") $select=$key;
		$show="<option value='$key' ";
		if($key==$select)
		{
			$show.="selected ";
		}
		//$show.=" ><font face='Arial' size='2'>$Mang[$key]</font></option>";
		$show.=" >$Mang[$key]</option>";
		echo $show;
	}
	echo "</SELECT>";
}
?>