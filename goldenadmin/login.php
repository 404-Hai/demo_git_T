<html>
<head>
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">

<title>Admin Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK 
href="skin/HCStyles.css" type=text/css rel=stylesheet>
<SCRIPT language=javascript>
//Will do hide for Netscape, since layer position is absolute and will distort
			//page depending on resize
			var doc = document;
			function init() {
				self.focus();
				// Do not allow security login in the edit Frame
				if( parent.name == "editWin" ) {
					parent.close();
					parent.opener.location.reload();
					return;
				}
				// Netscape doesn't see the form inside the div and thinks there are ZERO forms on the page
				if( document.loginfrm ) { document.loginfrm.AdName.focus(); }
				else if( document.login.document.loginfrm ) { document.login.document.loginfrm.AdName.focus(); }
			}
			
		function callhelp(frm)
		{
			frm.action = "help/cphelp.htm";
			frm.submit();	
		}
		function checkit()
		{
			if ((document.loginfrm.AdName.value == "") || (document.loginfrm.AdName.length == 0))
			{
				alert("please enter a valid username");
				document.loginfrm.AdName.focus();
				return false;
			}
			if ((document.loginfrm.pass1.value == "") || (document.loginfrm.pass1.length == 0))
			{
				alert("please enter a valid password");
				document.loginfrm.pass1.focus();
				return false;
			}
		}
		</SCRIPT>

<STYLE type=text/css></STYLE>

<META content="MSHTML 6.00.3790.0" name=GENERATOR></HEAD>
<BODY onload=javascript:document.loginfrm.AdName.focus();>
<TABLE height="100%" width="100%">
  <TBODY>
  <TR>
    <TD vAlign=center align=middle>
      <TABLE cellSpacing=0 cellPadding=0 width=574 align=center border=0>
        <TBODY>
        <TR>
          <TD class=SetImageFace vAlign=top width=17 
          background="skin/topleft.gif"><IMG 
            class=SetImageFace height=68 
            src="skin/spacer.gif" width=18></TD>
          <TD class=header1 vAlign=center width=350 
          background="skin/topbg.gif">Control Panel 
          Login</TD>
          <TD vAlign=top width=207>
            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="207" height="73">
              <param name="movie" value="skin/AutoMation.swf">
              <param name="quality" value="high">
              <embed src="skin/AutoMation.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="207" height="73"></embed>
          </object></TD></TR>
        <TR>
          <TD colSpan=3>
            <TABLE cellSpacing=0 cellPadding=0 width="100%">
              <TBODY>
              <TR>
                <TD width=1><IMG height=1 
                  src="skin/spacer.gif" width=3></TD>
                <TD class=tableHead align=left height=25>
                  <DIV align=left><IMG height=1 
                  src="skin/spacer.gif" width=3>Member 
                  Log-In</DIV></TD>
                <TD width=1><IMG height=1 
                  src="skin/spacer.gif" 
              width=3></TD></TR></TBODY></TABLE></TD></TR>
        <TR>
          <TD colSpan=3>
            <TABLE cellSpacing=0 cellPadding=0 width=574 border=0>
              <TBODY>
              <TR>
                <TD class=SetImageFace width=19 
                background="skin/midleft.gif"></TD>
                <TD vAlign=top width=11><IMG height=304 
                  src="skin/index_r5_c2.gif" width=11></TD>
                <TD vAlign=top width=534>
                  <TABLE cellSpacing=0 cellPadding=0 width=500 align=center 
                  border=0>
                    <TBODY>
                    <TR>
                      <TD></TD>
                      <TD></TD></TR>
                    <TR>
                      <TD width=152></TD>
                      <TD class=NormalText width=348>Enter a valid Username 
                        and Password. Then click the "Sign In" button to access 
                        the User Control Panel.</TD></TR>
                    <TR>
                      <TD><IMG height=137 
                        src="skin/user.gif" 
                        width=147><BR><BR><BR><BR><BR></TD>
                      <TD>
                        <TABLE class=tableborder cellSpacing=0 cellPadding=3 
                        width=312 align=center border=0>
                          <TBODY>
                          <TR>
                            <TD class=tablehead colSpan=3>Control Panel 
                            Login</TD></TR>
                          <FORM id=loginfrm name=loginfrm  onsubmit="return checkit();" action="login_process.php"  method=post>
                          <TR>
                            <TD colSpan=2>
                              <TABLE id=Table6 cellSpacing=0 cellPadding=2 
                              width="100%" border=0>
                                <TBODY>
                                <TR>
                                <TD align=right width=110 
                                height=22><STRONG>Username : </STRONG></TD>
                                <TD width=227 height=22><input name="user" type="text" id="user" size="20" style="font-family: Tahoma; font-size: 10pt"></TD></TR>
                                <TR>
                                <TD colSpan=2 height=10><IMG height=1 
                                src="skin/spacerLight.gif" 
                                width=1></TD></TR>
                                <TR>
                                <TD align=right width=110 
                                height=22><STRONG>Password : </STRONG></TD>
                                <TD width=227 height=22><input name="password" type="password" id="password" size="20" style="font-family: Tahoma; font-size: 10pt"></TD></TR>
								<TR>
                                <TD align=right width=110 
                                height=22><STRONG>Languge : </STRONG></TD>
                                <TD width=227 height=22>
								<select name="lang">
                                <option value="1">Vietnamese</option>
								<option value="2">English</option>
								</select></TD>
								</TR>
                                <TR>
                                <TD colSpan=2 height=10><IMG height=1 
                                src="skin/spacerLight.gif" 
                                width=1></TD></TR>                                
                                <TR>
                                <TD colSpan=2 height=10><IMG height=1 
                                src="skin/spacerLight.gif" 
                                width=1>
                                <TABLE width="100%">
                                <TBODY>
                                <TR>
                                <TD align=right width="50%">
                                <TABLE cellSpacing=0 cellPadding=0 border=0>
                                <TBODY>
                                <TR>
                                <TD width=4><IMG 
                                src="skin/XPButnBGLeft.gif" 
                                width=4></TD>
                                <TD><INPUT class=butn id=Submit1 type=submit value="Sign In" name=Submit1></TD>
                                <TD width=4><IMG 
                                src="skin/XPButnBGRight.gif" 
                                width=4></TD></TR></TBODY></TABLE></TD>
                                <TD>
                                <TABLE cellSpacing=0 cellPadding=0 border=0>
                                <TBODY>
                                <TR>
                                <TD width=4><IMG 
                                src="skin/XPButnBGLeft.gif" 
                                width=4></TD>
                                <TD><INPUT class=butn id=Cancel type=reset value=Reset name=Cancel></TD>
                                <TD width=4><IMG 
                                src="skin/XPButnBGRight.gif" 
                                width=4></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
                          <TR>
                            <TD colSpan=2 height=10><IMG height=1 
                              src="skin/spacerLight.gif" 
                              width=1></TD></TR>
                          <TR>
                            <TD class=Line colSpan=2 height=1></TD></TR>
                          <TR>
                            <TD colSpan=2 height=10><IMG height=1 
                              src="skin/spacerLight.gif" 
                              width=1></TD></TR>
                          <TR>
                            <TD colSpan=2>If you have forgotten your password, 
                              click on the "Forgot your Password" link to have a 
                              reminder sent to you at the e-mail address you 
                              specified during registration. </TD></TR>
                          <TR>
                            <TD colSpan=2 height=10><IMG height=1 
                              src="skin/spacerLight.gif" 
                              width=1></TD></TR>
                          <TR>
                            <TD align=middle colSpan=2>[ <A 
                              href="http://vn84.com/cpanel/forgotpassword.asp">Forgot 
                              your Password</A> ]</TD></TR>
                          <TR>
                            <TD colSpan=2 
                        height=20></TD></TR></FORM><BR></TABLE></TD></TR></TABLE></TD>
                <TD class=SetImageFace width=19 
                background="skin/midright.gif"></TD></TR>
              <TR>
                <TD class=SetImageFace 
                background="skin/midleft.gif"><IMG 
                  height=24 src="skin/botleft.gif" 
                width=19></TD>
                <TD vAlign=top 
                background="skin/botbg.gif"></TD>
                <TD vAlign=top 
                background="skin/botbg.gif"></TD>
                <TD class=SetImageFace 
                background="skin/midright.gif"><IMG 
                  height=24 src="skin/botright.gif" 
                width=19></TD></TR></TABLE></TD></TR>
        <TR>
          <TD class=power align=right colSpan=3>powered by <B>Hosting 
            Controller</B></TD></TR></TABLE></TD></TR></TBODY></TABLE>
</body>
</html>