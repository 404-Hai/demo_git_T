<META http-equiv=Content-Type content="text/html; charset=UTF-8">
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td width="70%" valign="top">
		<table width="612" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td background="skin/book.jpg" width="612" height="70" style="font-size:18px; color:#FCB110; font-weight:bold; border-bottom:5px solid #FFFFFF"><?=$Top_Booking?></td>
		  </tr>
		  <tr>
			<td style="border:1px solid #E58330; padding:5px">			
				<?
				//$lang=$_SESSION["lang"];
				switch ($lang)
				{
					case 1:
						define('frm_alt01','Thông tin cập nhật chưa đầy đủ. Đề nghị cập nhật lại!');
						define('frm_alt02','Địa chỉ email không hợp lệ !');
						define('frm_alt03','Điền lại ngày đến!');
						define('frm_alt04','Điền lại ngày đi!');
						define('frm_alt05','Bạn đã đặt dịch vụ thành công, chúng tôi sẽ trả lời trong vòng 24 tiếng!');
						define('frm_alt06','Email đã gửi thành công, chúng tôi sẽ trả lời trong vòng 24 tiếng!');
					break;
					
					case 2:		
						define('frm_alt01','Your booking is uncompleted, please fill in to blank space(s)!');
						define('frm_alt02','Invalid your Email !');
						define('frm_alt03','Please reset Arrival!');
						define('frm_alt04','Please reset Departure!');
						define("frm_alt05","Your booking is successful! we'll feedback your information in 24h!");
						define('frm_alt06','Your sending is successful. We will feedback within 24 hours!');
					break;
				}
				?>
				<script language='Javascript'>
				<!--//
				
				//-->
				function validateEmail(emailad)
				{
					var exclude=/[^@\-\.\w]|^[_@\.\-]|[\._\-]{2}|[@\.]{2}|(@)[^@]*\1/;
					var check=/@[\w\-]+\./;
					var checkend=/\.[a-zA-Z]{2,3}$/;
					if(((emailad.search(exclude) != -1)||(emailad.search(check)) == -1)||(emailad.search(checkend) == -1))
					{
						return true;
					}
					else 
					{
						return false;
					}
				}
				//======================================Check Booking Room ==========================================
				function checkInput()
				{	
					var adate= document.booking.adate.value;
					var ngayden=CDbl(Left(FormatDate(adate,'dd/mm/yyyy'),2));
					var thangden=CDbl(Left(FormatDate(adate,'mm/dd/yyyy'),2));
					var namden=CDbl(Mid(FormatDate(adate,'dd/mm/yyyy'),6,4));
					//=====================================================
					var ddate= document.booking.ddate.value;
					var ngaydi=CDbl(Left(FormatDate(ddate,'dd/mm/yyyy'),2));
					var thangdi=CDbl(Left(FormatDate(ddate,'mm/dd/yyyy'),2));
					var namdi=CDbl(Mid(FormatDate(ddate,'dd/mm/yyyy'),6,4));
					//=====================================================
					var today= new Date();
					var ngayht=today.getDate();
					var thanght=(today.getMonth()+1);
					var namht=today.getYear();
					//============================ Kiem tra ngay den ======================================
					if (adate=="")
					{
						alert("<? echo frm_alt01?>");
						document.booking.adate.focus();
						return false;		
					}
					if(namden < namht)
					{
						alert("<? echo frm_alt03?>");
						document.booking.adate.focus();
						return false;
					}
					else
						if(namden==namht)
							if(thangden < thanght)
							{
								alert("<? echo frm_alt03?>");
								document.booking.adate.focus();
								return false;
							}
							else
								if(thangden==thanght)
									if(ngayden < ngayht)
									{
										alert("<? echo frm_alt03?>");
										document.booking.adate.focus();
										return false;
									}	
					//============================ Kiem tra ngay di ======================================
					if (ddate=="")
					{
						alert("<? echo frm_alt01?>");
						document.booking.ddate.focus();
						return false;
					}
					if(namdi < namden)
					{
						alert("<? echo frm_alt04?>");
						document.booking.ddate.focus();
						return false;
					}
					else
						if(namdi==namden)
							if(thangdi<thangden)
							{
								alert("<? echo frm_alt04?>");
								document.booking.ddate.focus();
								return false;
							}
							else
								if(thangdi==thangden)
									if(ngaydi < ngayden)
									{
										alert("<? echo frm_alt04?>");
										document.booking.ddate.focus();
										return false;
									}
					//==================================================================
					if (document.booking.yourname.value=="")
					{
						alert("<? echo frm_alt01?>");
						document.booking.yourname.focus();
						return false;
					}
					if(document.booking.email.value==""){
						alert("<? echo frm_alt01?>")
						document.booking.email.focus();
						return false;
					}
					if (validateEmail(document.booking.email.value)){
						alert("<? echo frm_alt02?>")
						document.booking.email.focus();
						return false;
					}	
					if(document.booking.typecard.value==""){
						alert("<? echo frm_alt01?>")
						document.booking.typecard.focus();
						return false;
					}
					if(document.booking.cardnumber.value==""){
						alert("<? echo frm_alt01?>")
						document.booking.cardnumber.focus();
						return false;
					}
					if(document.booking.stopdate.value==""){
						alert("<? echo frm_alt01?>")
						document.booking.stopdate.focus();
						return false;
					}	
				return true;
				}
				</script>
				<?
				$adate 			= $HTTP_POST_VARS["adate"];				
				$ddate 			= $HTTP_POST_VARS["ddate"];
				$room 			= $HTTP_POST_VARS["room"];
				?>
				<br>
				<form action="bookroom.php?lang=<?=$lang?>" method="post" name="booking" onsubmit="return checkInput();">
				<table width="98%" align="center" border="0" cellspacing="0" cellpadding="2" style="color:#0084C5 ">
				  <tr>
					<td width="21%"> <? echo frm_adate?> </td>
					<td width="79%">
					<input value="<?=$adate?>" name="adate" type="text" id="adate" size="30" onFocus="javascript:this.blur();" style="width:84%; border:1px solid #CCCCCC ">
					&nbsp;<a title="Set Date" onclick="javascript:popupDate('booking.adate');"><img src="skin/b_calendar.png" width="16" height="16"  align="absmiddle"></a>
					</td>
				  </tr>
				  <tr>
					<td>  <? echo frm_ddate?> </td>
					<td><input value="<?=$ddate?>" name="ddate" type="text" id="ddate" size="30" onFocus="javascript:this.blur();" style="width:84%; border:1px solid #CCCCCC ">
					&nbsp;<a title="Set Date" onclick="javascript:popupDate('booking.ddate');"><img src="skin/b_calendar.png" width="16" height="16"  align="absmiddle"></a></td>
				  </tr>
				  <tr>
					<td> <? echo frm_time?> </td>
					<td>
					<select name="hour">
					<?
					for($i=1;$i<=23;$i++)
					{
						if ($i<=9) $i="0".$i;			
						echo "<option value=".$i.">".$i." ".frm_hour."</option>";
					}
					?>
					</select>
				
					<select name="minute">
					<?
					for($i=0;$i<=59;$i++)
					{
						if ($i<=9) $i="0".$i;			
						echo "<option value=".$i.">".$i." ".frm_minute."</option>";
					}
					?>
					 </select>
					&nbsp;&nbsp;<? echo frm_roomnumber?>&nbsp;
					<select name="room">
					<?
					for($i=1;$i<=20;$i++)
					{
						if ($i<=9) $i="0".$i;			
						echo "<option value=".$i.">".$i." Room(s)</option>";
					}
					?>
					 </select>
					  </td>
				  </tr>
				  <tr>
					<td><? echo frm_roomstyle?></td>
					<td>
					<select name="roomstyle" style="width:100px ">
					<?
					$sql="SELECT * FROM tbl_Accomodation where lang=$lang";
					$result = mysql_query($sql,$cnn);
					while($row = mysql_fetch_array ($result))
					{
						echo "<option value=".$row["Accomodation_Name"].">".$row["Accomodation_Name"]."</option>";
					}
					?>	
					</select>
					&nbsp;&nbsp;&nbsp;<? echo frm_npersion?>&nbsp;&nbsp;&nbsp;
					<select name="npersion" style="width:100px">
					<?
					for($i=1;$i<=19;$i++)
					{
						$i="0".$i;			
						echo "<option value=".$i.">".$i." ".frm_persion."</option>";
					}
					?>
					</select>
					</td>
				  </tr>
				  <tr>
					<td><? echo frm_children?></td>
					<td>
					<select name="children" style="width:100px ">
					  <?
					for($i=0;$i<=49;$i++)
					{
						$i="0".$i;			
						echo "<option value=".$i.">".$i." ".frm_children."</option>";
					}
					?>
					</select>
					&nbsp;&nbsp;&nbsp;<? echo frm_adult?>&nbsp;&nbsp;&nbsp;
					<select name="adults" style="width:100px ">
					  <?
					for($i=0;$i<=49;$i++)
					{
						$i="0".$i;			
						echo "<option value=".$i.">".$i." ".frm_adult."</option>";
					}
					?>
					</select></td>
				  </tr>  
				  <tr>
					<td colspan="2">&nbsp;</td>
					</tr>
				  <tr>
					<td><strong> <? echo frm_name?> * :</strong>  </td>
					<td><input type="text" name="yourname" style="width:90%; border:1px solid #CCCCCC "></td>
				  </tr>
				  <tr>
					<td><strong> E-mail * :</strong> </td>
					<td><input type="text" name="email" style="width:90%; border:1px solid #CCCCCC "></td>
				  </tr>
				  <tr>
					<td><strong> <? echo frm_address?> :</strong> </td>
					<td><input type="text" name="address" style="width:90%; border:1px solid #CCCCCC "></td>
				  </tr>
				  <tr>
					<td><strong> <? echo frm_tel?> :</strong> </td>
					<td><input type="text" name="tel" style="width:90%; border:1px solid #CCCCCC "></td>
				  </tr>
				  <tr>
					<td><strong> Fax :</strong> </td>
					<td><input type="text" name="fax" style="width:90%; border:1px solid #CCCCCC "></td>
				  </tr>
				  <tr>
					<td><strong> <? echo frm_typecard?> * :</strong> </td>
					<td><input type="text" name="typecard" style="width:90%; border:1px solid #CCCCCC "></td>
				  </tr>
				  <tr>
					<td><strong> <? echo frm_cardnumber?> * :</strong></td>
					<td><input type="text" name="cardnumber" style="width:90%; border:1px solid #CCCCCC "></td>
				  </tr>
				  <tr>
					<td><strong> <? echo frm_stopdate?> * :</strong> </td>
					<td><input type="text" name="stopdate" style="width:84%; border:1px solid #CCCCCC " onFocus="javascript:this.blur();">	
					&nbsp;<a title="Set Date" onclick="javascript:popupDate('booking.stopdate');"><img src="skin/b_calendar.png" width="16" height="16"  align="absmiddle"></a></td>
				  </tr>
				  <tr>
					<td valign="top"><strong> <? echo frm_request?> :</strong> </td>
					<td><textarea name="detail" style="width:90%; height:80px; border:1px solid #CCCCCC "></textarea></td>
				  </tr>
				  <tr>
					<td><strong> </strong></td>
					<td><input type="submit" name="Submit" value="<? echo frm_book?>"></td>
				  </tr>
				</table>
				
				</form>

			</td>
		  </tr>
		</table>			
	</td>
	<td width="30%" valign="top">
	<? require("_right.php");?>
	</td>
  </tr>
</table>