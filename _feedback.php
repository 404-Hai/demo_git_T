<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td width="70%" valign="top">
		<table width="612" border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td background="skin/feedback.jpg" width="612" height="70" style="font-size:18px; color:#FCB110; font-weight:bold; border-bottom:5px solid #FFFFFF"><?=$Top_Feedback?></td>
		  </tr>
		  <tr>
			<td style="border:1px solid #E58330; padding:5px" height="504" valign="top">
			<form action="feedback.php?lang=<?=$lang?>" method="post"  name="feedback" >
			We wish to make each of your stay apleasant and memorable experience. 
			Therefore your comments would appreciated
              <TABLE id=Table2 width="100%" cellSpacing=1 cellPadding=1 border="1" style="border-collapse:collapse; " bordercolor="#666666">
                <TBODY>
                  <TR>
                    <TD colSpan=3 rowSpan=0 align="center" bgcolor="#F3F3F3"><strong>Your evaluations</strong></TD>
                  </TR>
                  <TR>
                    <TD>Your full name:</TD>
                    <TD><INPUT id=TB_hoten size=49 name=TB_hoten type="text"></TD>
                  </TR>
                  <TR>
                    <TD>Date of staying in Congdoan Halong Hotel:</TD>
                    <TD>Month:
                        <SELECT id=Drl_thang_kh tabIndex=25 name=Drl_thang_kh>
                        <?
							for($i=1;$i<=12;$i++)
							{
								if ($i<=9) $i="0".$i;			
								echo "<option value=".$i.">".$i."</option>";
							}
						?>
                        </SELECT>
                        <SELECT id=Drl_ngay_kh tabIndex=25 name=Drl_ngay_kh>
                          <?
							for($i=1;$i<=31;$i++)
							{
								if ($i<=9) $i="0".$i;			
								echo "<option value=".$i.">".$i."</option>";
							}
						?>
                        </SELECT>
                        <SELECT id=Drl_nam_kh tabIndex=25 name=Drl_nam_kh>
                        <?
							for($i=1990;$i<=2010;$i++)
							{
								echo "<option value=".$i.">".$i."</option>";
							}
						?>
                      </SELECT></TD>
                  </TR>
                  <TR>
                    <TD>Room number:</TD>
                    <TD><INPUT id=TB_phongso name=TB_phongso type="text">
                    </TD>
                  </TR>
                </TBODY>
              </TABLE>
			  <br>
              <TABLE id=Table1 cellSpacing=1 cellPadding=1 width=100% border="1" style="border-collapse:collapse; " bordercolor="#666666">
                <TBODY>
                  <TR>
                    <TD colSpan=4 rowSpan=0 align="center" bgcolor="#F3F3F3"><strong>OverView</strong></TD>
                  </TR>
                  <TR>
                    <TD width="41%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                    <TD width="21%" align="center">Satisfatory</TD>
                    <TD width="20%" align="center">Fair</TD>
                    <TD width="18%" align="center">Unsatisfatory</TD>
                  </TR>
                  <TR>
                    <TD align="center">Reservation staff:</TD>
                    <TD align="center"><INPUT checked id=RB_nhanvien3 type=radio value=Radio1 name=nhanvien></TD>
                    <TD align="center"><INPUT id=Rb_nhanvien2 type=radio value=Radio1 name=nhanvien></TD>
                    <TD align="center"><INPUT id=RB_nhanvien1 type=radio value=Radio1 name=nhanvien></TD>
                  </TR>
                  <TR>
                    <TD>Receptionists</TD>
                    <TD align="center"><INPUT checked id=RB_letan3 type=radio value=Radio1 name=letan></TD>
                    <TD align="center"><INPUT id=Rb_letan2 type=radio value=Radio1 name=letan></TD>
                    <TD align="center"><INPUT id=RB_letan1 type=radio value=Radio1 name=letan></TD>
                  </TR>
                  <TR>
                    <TD>Cashiers</TD>
                    <TD align="center"><INPUT checked id=RB_thungan3 type=radio value=Radio1 name=thungan></TD>
                    <TD align="center"><INPUT id=RB_thungan2 type=radio value=Radio1 name=thungan></TD>
                    <TD align="center"><INPUT id=RB_thungan1 type=radio value=Radio1 name=thungan></TD>
                  </TR>
                  <TR>
                    <TD>Tel operator</TD>
                    <TD align="center"><INPUT checked id=RB_dienthoai3 type=radio value=Radio1 name=dienthoai></TD>
                    <TD align="center"><INPUT id=RB_dienthoai2 type=radio value=Radio1 name=dienthoai></TD>
                    <TD align="center"><INPUT id=RB_dienthoai1 type=radio value=Radio1 name=dienthoai></TD>
                  </TR>
                  <TR>
                    <TD>Porters</TD>
                    <TD align="center"><INPUT checked id=RB_khuanvac3 type=radio value=Radio1 name=khuanvac></TD>
                    <TD align="center"><INPUT id=RB_khuanvac2 type=radio value=Radio1 name=khuanvac></TD>
                    <TD align="center"><INPUT id=RB_khuanvac1 type=radio value=Radio1 name=khuanvac></TD>
                  </TR>
                  <TR>
                    <TD>Ornametal trees</TD>
                    <TD align="center"><INPUT checked id=RB_canhquan3 type=radio value=Radio1 name=canhquan></TD>
                    <TD align="center"><INPUT id=RB_canhquan2 type=radio value=Radio1 name=canhquan></TD>
                    <TD align="center"><INPUT id=RB_canhquan1 type=radio value=Radio1 name=canhquan></TD>
                  </TR>
                </TBODY>
              </TABLE>
              <BR>
              <TABLE id=Table3 width="100%" cellSpacing=1 cellPadding=1 border="1" style="border-collapse:collapse; " bordercolor="#666666">
                <TBODY>
                  <TR>
                    <TD colSpan=5 align="center" bgcolor="#F3F3F3"><strong>Food &amp; Beverage</strong></TD>
                  </TR>
                  <TR>
                    <TD colSpan=5 rowSpan=0>Meals and drink taken at:
                    <INPUT id=CB_bar type=checkbox name=CB_bar>
                  	&nbsp; Bar&nbsp;&nbsp;
                  	<INPUT id=cb_nhahang type=checkbox name=cb_nhahang>
                  &nbsp;Restaurants</TD>
                  </TR>
                  <TR>
                    <TD>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                    <TD align="center">Excellent</TD>
                    <TD align="center">Good</TD>
                    <TD align="center">Average</TD>
                    <TD align="center">Poor</TD>
                  </TR>
                  <TR>
                    <TD>Menu and beverage list written in understandable?</TD>
                    <TD align="center"><INPUT id=rb_thucdon4 type=radio value=Radio1 name=thucdon></TD>
                    <TD align="center"><INPUT checked id=rb_thucdon3 type=radio value=Radio1 name=thucdon></TD>
                    <TD align="center"><INPUT id=rb_thucdon2 type=radio value=Radio1 name=thucdon></TD>
                    <TD align="center"><INPUT id=rb_thucdon1 type=radio value=Radio1 name=thucdon></TD>
                  </TR>
                  <TR>
                    <TD>Was your order&nbsp;taken promply?</TD>
                    <TD align="center"><INPUT id=rb_dapung4 type=radio value=Radio1 name=dapung></TD>
                    <TD align="center"><INPUT checked id=rb_dapung3 type=radio value=Radio1 name=dapung></TD>
                    <TD align="center"><INPUT id=rb_dapung2 type=radio value=Radio1 name=dapung></TD>
                    <TD align="center"><INPUT id=rb_dapung1 type=radio value=Radio1 name=dapung></TD>
                  </TR>
                  <TR>
                    <TD>Was your food served promptly?</TD>
                    <TD align="center"><INPUT id=rb_dapung_an4 type=radio value=Radio1 name=dapung_an></TD>
                    <TD align="center"><INPUT checked id=rb_dapung_an3 type=radio value=Radio1 name=dapung_an></TD>
                    <TD align="center"><INPUT id=RB_dapung_an2 type=radio value=Radio1 name=dapung_an></TD>
                    <TD align="center"><INPUT id=RB_dapung_an1 type=radio value=Radio1 name=dapung_an></TD>
                  </TR>
                  <TR>
                    <TD>Service efficiency?</TD>
                    <TD align="center"><INPUT id=RB_chatluong4 type=radio value=Radio1 name=chatluong></TD>
                    <TD align="center"><INPUT checked id=rb_chatluong3 type=radio value=Radio1 name=chatluong></TD>
                    <TD align="center"><INPUT id=RB_chatluong2 type=radio value=Radio1 name=chatluong></TD>
                    <TD align="center"><INPUT id=RB_chatluong1 type=radio value=Radio1 name=chatluong></TD>
                  </TR>
                  <TR>
                    <TD>Friendly and hospitable services?</TD>
                    <TD align="center"><INPUT id=rb_thanthien4 type=radio value=Radio1 name=thanthien></TD>
                    <TD align="center"><INPUT checked id=rb_thanthien3 type=radio value=Radio1 name=thanthien></TD>
                    <TD align="center"><INPUT id=RB_thanthien2 type=radio value=Radio1 name=thanthien></TD>
                    <TD align="center"><INPUT id=RB_thanthien1 type=radio value=Radio1 name=thanthien></TD>
                  </TR>
                  <TR>
                    <TD>Quality of food?</TD>
                    <TD align="center"><INPUT id=rb_chatluong_an4 type=radio value=Radio1 name=chatluong_an></TD>
                    <TD align="center"><INPUT checked id=Rb_chatluong_an3 type=radio value=Radio1 name=chatluong_an></TD>
                    <TD align="center"><INPUT id=Rb_chatluong_an2 type=radio value=Radio1 name=chatluong_an></TD>
                    <TD align="center"><INPUT id=RB_chatluong_an1 type=radio value=Radio1 name=chatluong_an></TD>
                  </TR>
                  <TR>
                    <TD>Value of price pair?</TD>
                    <TD align="center"><INPUT id=rb_dongia4 type=radio value=Radio1 name=dongia></TD>
                    <TD align="center"><INPUT checked id=Rb_dongia3 type=radio value=Radio1 name=dongia></TD>
                    <TD align="center"><INPUT id=rb_dongia2 type=radio value=Radio1 name=dongia></TD>
                    <TD align="center"><INPUT id=rb_dongia1 type=radio value=Radio1 name=dongia></TD>
                  </TR>
                  <TR>
                    <TD>Menu variety?</TD>
                    <TD align="center"><INPUT id=rb_dadang4 type=radio value=Radio1 name=dadang></TD>
                    <TD align="center"><INPUT checked id=rb_dadang3 type=radio value=Radio1 name=dadang></TD>
                    <TD align="center"><INPUT id=rb_dadang2 type=radio value=Radio1 name=dadang></TD>
                    <TD align="center"><INPUT id=rb_dadang1 type=radio value=Radio1 name=dadang></TD>
                  </TR>
                </TBODY>
              </TABLE>
              <BR>
              <TABLE id=Table5 cellSpacing=1 cellPadding=1 width=100% border="1" style="border-collapse:collapse; " bordercolor="#666666">
                <TBODY>
                  <TR>
                    <TD colSpan=5 align="center" bgcolor="#F3F3F3"><strong>Houskeeping</strong></TD>
                  </TR>
                  <TR>
                    <TD>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </TD>
                    <TD align="center">Excellent</TD>
                    <TD align="center">Good</TD>
                    <TD align="center">Average</TD>
                    <TD align="center">Poor</TD>
                  </TR>
                  <TR>
                    <TD>Cleanliness of room</TD>
                    <TD align="center"><INPUT id=rb_phongnghi4 type=radio value=Radio1 name=phongnghi></TD>
                    <TD align="center"><INPUT id=rb_phongnghi3 type=radio value=Radio1 name=phongnghi></TD>
                    <TD align="center"><INPUT checked id=rb_phongnghi2 type=radio value=Radio1 name=phongnghi></TD>
                    <TD align="center"><INPUT id=rb_phongnghi1 type=radio value=Radio1 name=phongnghi></TD>
                  </TR>
                  <TR>
                    <TD>Cleanliness of bathroom</TD>
                    <TD align="center"><INPUT id=rb_nhatam4 type=radio value=Radio1 name=nhatam></TD>
                    <TD align="center"><INPUT id=RB_nhatam3 type=radio value=Radio1 name=nhatam></TD>
                    <TD align="center"><INPUT checked id=RB_nhatam2 type=radio value=Radio1 name=nhatam></TD>
                    <TD align="center"><INPUT id=rb_nhatam1 type=radio value=Radio1 name=nhatam></TD>
                  </TR>
                  <TR>
                    <TD>Laundry service</TD>
                    <TD align="center"><INPUT id=rb_giatla4 type=radio value=Radio1 name=giatla></TD>
                    <TD align="center"><INPUT id=rb_giatla3 type=radio value=Radio1 name=giatla></TD>
                    <TD align="center"><INPUT checked id=rb_giatla2 type=radio value=Radio1 name=giatla></TD>
                    <TD align="center"><INPUT id=rb_giatla1 type=radio value=Radio1 name=giatla></TD>
                  </TR>
                  <TR>
                    <TD>Minibar</TD>
                    <TD align="center"><INPUT id=rb_minibar4 type=radio value=Radio1 name=minibar></TD>
                    <TD align="center"><INPUT id=Rb_minibar3 type=radio value=Radio1 name=minibar></TD>
                    <TD align="center"><INPUT checked id=rb_minibar2 type=radio value=Radio1 name=minibar></TD>
                    <TD align="center"><INPUT id=rb_minibar1 type=radio value=Radio1 name=minibar></TD>
                  </TR>
                  <TR>
                    <TD>Decor</TD>
                    <TD align="center"><INPUT id=rb_trangtri4 type=radio value=Radio1 name=trangtri></TD>
                    <TD align="center"><INPUT id=rb_trangtri3 type=radio value=Radio1 name=trangtri></TD>
                    <TD align="center"><INPUT checked id=rb_trangtri2 type=radio value=Radio1 name=trangtri></TD>
                    <TD align="center"><INPUT id=rb_trangtri1 type=radio value=Radio1 name=trangtri></TD>
                  </TR>
                </TBODY>
              </TABLE>
              <BR>
              <TABLE id=Table6 cellSpacing=1 cellPadding=1 width=100% border="1" style="border-collapse:collapse; " bordercolor="#666666">
                <TBODY>
                  <TR>
                    <TD align="center" bgcolor="#F3F3F3"><strong>Others Comments</strong></TD>
                  </TR>
                  <TR>
                    <TD align="center"><TEXTAREA id=TB_yeucau style="WIDTH: 457px; HEIGHT: 100px" name=TB_yeucau rows=3 cols=54></TEXTAREA></TD>
                  </TR>
                </TBODY>
              </TABLE>
              <P align="center">
                <INPUT id=BT_Guitin style="WIDTH: 77px; HEIGHT: 26px" type=submit value=Send name=BT_Guitin>
                <INPUT id=Bt_nhapmoi style="WIDTH: 81px; HEIGHT: 26px" type=submit value=New name=Bt_nhapmoi>
              </P></form></td>
		  </tr>
		</table>			
	</td>
	<td width="30%" valign="top">
	<? require("_right.php");?>
	</td>
  </tr>
</table>