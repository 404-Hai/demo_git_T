
				<!--===============================================End Main===========================================--></td>
			  </tr>
			  <tr>
				<td bgcolor="#ECE4BD" style="border-bottom:10px solid #FFFFFF ">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="7%" align="center"><img src="skin/logo.gif"></td>
					<td width="93%" onclick="document.location='http://adcvietnam.net'">Golden Halong Hotel, Baichay , Halong, Viet Nam <br>
					  Tel: 033 511 098, Fax: 033 511 098<br>
					  Email: <a href="mailto:goldenhalonghotel@gmail.com">goldenhalonghotel@gmail.com</a><br>
					  Copyright © 2007 <font style="color:#FF0000 ">Golden HaLong Hotel</font>., Design by <font style="color:#FF0000; cursor:pointer ">ADCVietnam.net</font></td>
				  </tr>
				</table>
				</td>
			  </tr>
			</table></td>
		  </tr>  
		</table>
	<!--===========================================================================-->
	</td>
  </tr>
  <tr>
    <td bgcolor="#3173BF" align="right" valign="middle" style="padding-right:50px; height:25px ">
	Visitors: 
	  	<?php 
		session_cache_limiter('');
		@ session_start();
		$file = "hit.txt";
		$user_ip = $_SERVER['REMOTE_ADDR'] . "\n";
		if(!session_is_registered("nguoidung"))
		  {
			session_register("nguoidung");
			$_SESSION["nguoidung"] = "ok";
			$fp = fopen($file,"a");
			fwrite($fp, "$user_ip");
			fclose($fp);
		}
		$ip_list = file($file);
		$visitors = count($ip_list) ;
		for ($i=0;$i<strlen($visitors);$i++) 
		{
			$digit=substr("$visitors",$i,1);
			// Build the image URL ...
			//$src = $base_url . $style_folder . $digit . "." . $ext;
			
			echo "<img src='count/".$digit.".gif' border=0>";
		}
		//echo "<font style='font-size:14px; font-weight:bold; color:FF3300'>".$visitors."</font>";
		?>
	&nbsp;</td>
  </tr>
  <tr>
    <td background="skin/bg_footer.jpg" height="43" style="color:#68560A; font-size:14px; padding-left:50px ">&nbsp;<marquee>Welcome to Golden Halong Hotel</marquee></td>
  </tr>
</table>
</BODY>
</HTML>