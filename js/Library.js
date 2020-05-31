var fBrw=(navigator.userAgent.indexOf('MSIE')!= -1 && navigator.userAgent.indexOf('Windows')!= -1);
var fDSp=(typeof(document.getElementById)!='undefined');
var RefBanner = new Array();
var RefAdLogo = new Array();
var RefAdLBox = new Array();
var RefAdLBar = new Array();
var RefColumn = new Array();
var RefAdLeft = new Array();
var RefURight = new Array();
var RefUColum = new Array();
var RefDRight = new Array();
var RefDiLeft = new Array();

var RefAdStay = 0;
var SkpFolder = true;
var CurBanner = 0;
var CurFooter = 0;
var LastChild = 0;
var BannerLnk = 0;
var FooterLnk = 0;
var LComplete = 0;

var StAdRight = new Array();
var EnAdRight = new Array();
var CurARight = new Array();
var ARightLnk = new Array();

var CurAdLeft = new Array();
var EndAdLeft = new Array();
var StaAdLeft = new Array();
var AdLeftLnk = new Array();

var strDomain = 'vnexpress.net'
var sLocation = location.href;

var pos = sLocation.indexOf("vnexpress.net")
//if (pos < 1) location.href='http://vnexpress.net';
if (typeof(PageHost) == 'undefined') var PageHost = '';

/*
if (typeof(SkipTopWindow) == 'undefined')
{
	if (window.parent!=window)
	{	
		alert('This website violate "The VnExpress.net © Copyright Notice".\r\nClick OK to Access VnExpress.net!');
		window.open(location.href, '_top', '');
	}
}
*/

var objXML;
var aFlag=true;

function loadXMLDoc(url, callbackFunction, desc, QUERY_STRING) 
{
	aFlag=false;
	if(desc) window.status = desc;
    // branch for native XMLHttpRequest object
    if (window.XMLHttpRequest) {
        objXML = new XMLHttpRequest();
		objXML.onreadystatechange =	function()
									{
										// only if req shows "complete"
										if (objXML.readyState == 4) {
											eval(callbackFunction);
										}
									}
		if(QUERY_STRING)
		{
		    objXML.open("POST", url, true);
			objXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			objXML.send(QUERY_STRING);
		}
        else
        {
	        objXML.open("GET", url, true);
	        objXML.send(null);
	    }
    // branch for IE/Windows ActiveX version
    } else if (window.ActiveXObject) {
        objXML = new ActiveXObject("Microsoft.XMLHTTP");
        if (objXML) {
        	objXML.onreadystatechange =	function()
										{
											// only if req shows "complete"
											if (objXML.readyState == 4) {
												eval(callbackFunction);
											}
										}
			if(QUERY_STRING)
			{
			    objXML.open("POST", url, true);
				objXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				objXML.send(QUERY_STRING);
			}
			else
			{
			    objXML.open("GET", url, true);
			    objXML.send(null);
			}
        }
    }
}

function setCookie(Name, Path, Expires, Value)
{
	var cstr = Name.concat('=').concat(Value);
	
	if (Path=='')
		path='/';

	cstr=cstr.concat(';path=').concat(Path);


	if (Expires=='')
		Expires=(new Date(2020, 11, 14)).toGMTString();

	document.cookie=cstr.concat(';expires=').concat(Expires);
}

function getCookie(Name, Default)
{
	var cookie = document.cookie;
	var ir = 0, ie = 0, sf = '', i = 0, j = 0;
	Name = Name.toLowerCase();

	if (typeof(Default) == 'undefined')
		Default = '';

	if (cookie.length == 0)
		return Default;

	if ((ir = Name.indexOf('.')) == -1)
	{
		if (cookie.substr(0, Name.length + 1).toLowerCase() == Name.concat('='))
		{
			if ((ie = cookie.indexOf(';')) != -1)
			{
				cookie = cookie.substr(0, ie);
			}
		}
		else
		{
			if ((ie = cookie.toLowerCase().indexOf('; '.concat(Name).concat('='))) == -1)
				return Default;

			cookie = cookie.substr(ie + 2);

			if ((ie = cookie.indexOf(';')) != -1)
			{
				cookie = cookie.substr(0, ie);
			}
		}
		sf = ';';
	}
	else
	{
		if ((i=cookie.toLowerCase().indexOf(Name.concat('='))) != -1)
		{
			if ((j = cookie.indexOf(';', i)) > i + Name.length + 1)
			{
				return ReplaceAll(unescape(cookie.substr(i + Name.length + 1, j - i - Name.length - 1)), '+', ' ');
			}
			else
			{
				j = cookie.length;
				return ReplaceAll(unescape(cookie.substr(i + Name.length + 1, j - i - Name.length - 1)), '+', ' ');
			}
		}

		var Root = Name.substr(0, ir);
		Name = Name.substr(ir + 1);

		if (cookie.substr(0, Root.length + 1).toLowerCase() == Root.concat('='))
		{
			if ((ie = cookie.indexOf(';')) != -1)
			{
				cookie = cookie.substr(0, ie);
			}
		}
		else
		{
			if ((ie = cookie.toLowerCase().indexOf('; '.concat(Root).concat('='))) == -1)
				return Default;

			cookie = cookie.substr(ie + 2);

			if ((ie = cookie.indexOf(';')) != -1)
			{
				cookie = cookie.substr(0, ie);
			}
		}

		cookie = cookie.substr(Root.length + 1);
		sf = '&';
	}

	if (cookie.substr(0, Name.length + 1).toLowerCase() == Name.concat('='))
	{
		ir = Name.length + 1;
	}
	else
	{
		if ((ir = cookie.toLowerCase().indexOf('&'.concat(Name).concat('='))) == -1)
			return Default;

		ir+=Name.length + 2;
	}

	if ((ie=cookie.indexOf(sf, ir)) == -1)
	{
		return ReplaceAll(unescape(cookie.substr(ir)), '+', ' ');
	}
	else
	{
		return ReplaceAll(unescape(cookie.substring(ir, ie)), '+', ' ');
	}
}

function ReplaceChar(iStr)
{
	var	r1=/&/g;
	var	r2=/ /g;
	var	r3=/"/g;

	iStr	=iStr.replace(r1, '%26');
	iStr	=iStr.replace(r2, '%20');
	iStr	=iStr.replace(r3, '%22');

	return iStr;
}

function CharReplace(iStr)
{
	var	r1=/%26/g;
	var	r2=/%20/g;
	var	r3=/%22/g;

	iStr	=iStr.replace(r1, '&');
	iStr	=iStr.replace(r2, ' ');
	iStr	=iStr.replace(r3, '"');

	return iStr;
}

function GetPostVariable(vName, vDef)
{
	var	str=location.href;
	var	pos=str.indexOf('?'.concat(vName).concat('='));

	if (pos==-1)
	{
		pos=str.indexOf('&'.concat(vName).concat('='));
		if (pos==-1) return vDef;
	}
	
	str=str.substring(pos + vName.length + 2);
	pos=str.indexOf('&');

	if (pos==-1)
	{
		pos=str.length;
	}	

	if (pos > 0)
	{
		str=str.substring(0, pos);
	}

	return (typeof(vDef)=='number') ? parseInt(str) : CharReplace(str);
}

function GoNothing()
{
}

function ChangeBanner(vAd)
{
	if (RefBanner.length==0) return;
	var vCheckShow = 0;
	var vCheckShowTemp = 0;
	var d = 0;
	CurBanner++;

	if (CurBanner >= RefBanner.length) CurBanner=0;
	vCheckShow = RefBanner[CurBanner][6];

	if (vCheckShow == 3 && vAd < 4) vCheckShow = 0;

	if (vCheckShow != vAd && vCheckShow != 0) 
	{
		for (i=CurBanner; i < RefBanner.length; i++)
		{
			vCheckShowTemp = RefBanner[i][6]
			if (vCheckShowTemp == 3 && vAd < 4) vCheckShowTemp = 0
			if (vCheckShowTemp == vAd || vCheckShowTemp == 0) 
			{
				break;
			}	
			else
			{
				CurBanner++;
			}
		}
	}
	
	if (CurBanner >= RefBanner.length) CurBanner=0;

	document.links[BannerLnk].href= RefBanner[CurBanner][1];
	if (RefBanner[CurBanner][0].substr(0,7).toLowerCase()=='http://')
	{
		document.images['TopBanner'].src = RefBanner[CurBanner][0];
	}
	else
	{
		document.images['TopBanner'].src = PageHost.concat(RefBanner[CurBanner][0]);
	}
	
	if (RefBanner[CurBanner][1] == '')
	{
		document.links[BannerLnk].onclick = function() { return false; };
	}
	else
	{
		document.links[BannerLnk].onclick = function() { return eval('openMeExt(this, '.concat(RefBanner[CurBanner][2]).concat(', 1)')); };
	}
}

function DisplayBanner(rbn,vAd)
{
	if (typeof(vAd)=='undefined') vAd=0;
	var vCheckShow = 0;
	var vCheckShowTemp = 0;
	var d = 0;
	if (RefBanner.length==0)
	{
		document.write('<table cellspacing=0 cellpadding=1 border=0 width=468 height=60 bgcolor="#c0c0c0"><tr><td><table cellspacing=0 cellpadding=0 border=0 width="466" height="58"><tr><td bgcolor="#ffffff" align=center class=LeadFront><a href="http://vnexpress.net/Advertising" class=AdTop>D&#224;nh cho Qu&#7843;ng c&#225;o</a><br>&#272;i&#7879;n tho&#7841;i: 090 417 5952  (HN) / 090 810 7277  (HCM)<br><span class=Time>(Th&#244;ng tin <b>Rao v&#7863;t</b> vui l&#242;ng kh&#244;ng li&#234;n h&#7879; theo s&#7889; n&#224;y)</span></td></tr></table></td></tr></table>');
		return;
	}

	CurBanner=Math.floor(Math.random()*12321) % RefBanner.length;
	BannerLnk=document.links.length;
	vCheckShow=RefBanner[CurBanner][6];
	
	if (vCheckShow == 3 && vAd < 4) vCheckShow = 0
	if (vCheckShow == vAd || vCheckShow == 0)
	{
		if (RefBanner[CurBanner][1]=='')
		{
			if (RefBanner[CurBanner][0].substr(0,7).toLowerCase()=='http://')
			{
				document.write('<a href="', RefBanner[CurBanner][1], '" onClick="return false"><img name="TopBanner" src="', RefBanner[CurBanner][0], '" width=468 height=60 border=0></a>');
			}
			else
			{
				document.write('<a href="', RefBanner[CurBanner][1], '" onClick="return false"><img name="TopBanner" src="', PageHost.concat(RefBanner[CurBanner][0]), '" width=468 height=60 border=0></a>');
			}	
		}
		else
		{
			if (RefBanner[CurBanner][0].substr(0,7).toLowerCase()=='http://')
			{				
				document.write('<a href="', RefBanner[CurBanner][1], '" onClick="return openMeExt(this, ', RefBanner[CurBanner][2], ', 1)"><img name="TopBanner" src="', RefBanner[CurBanner][0], '" width=468 height=60 border=0></a>');		
			}
			else
			{
				document.write('<a href="', RefBanner[CurBanner][1], '" onClick="return openMeExt(this, ', RefBanner[CurBanner][2], ', 1)"><img name="TopBanner" src="', PageHost.concat(RefBanner[CurBanner][0]), '" width=468 height=60 border=0></a>');		
			}	
		}
		d = 1;
	}
	else
	{
		for (i=0; i < RefBanner.length; i++)
		{
			vCheckShowTemp = RefBanner[i][6]
			if (vCheckShowTemp == 3 && vAd < 4) vCheckShowTemp = 0
			if (vCheckShowTemp == vAd || vCheckShowTemp == 0) 
			{
				CurBanner = i;
				d = 1;
				if (RefBanner[CurBanner][1]=='')
				{
					if (RefBanner[CurBanner][0].substr(0,7).toLowerCase()=='http://')
					{			
						document.write('<a href="', RefBanner[i][1], '" onClick="return false"><img name="TopBanner" src="', RefBanner[i][0], '" width=468 height=60 border=0></a>');
					}
					else
					{
						document.write('<a href="', RefBanner[i][1], '" onClick="return false"><img name="TopBanner" src="', PageHost.concat(RefBanner[i][0]), '" width=468 height=60 border=0></a>');
					}	
				}
				else
				{
					if (RefBanner[CurBanner][0].substr(0,7).toLowerCase()=='http://')
					{							
						document.write('<a href="', RefBanner[i][1], '" onClick="return openMeExt(this, ', RefBanner[i][2], ', 1)"><img name="TopBanner" src="', RefBanner[i][0], '" width=468 height=60 border=0></a>');
					}
					else
					{
						document.write('<a href="', RefBanner[i][1], '" onClick="return openMeExt(this, ', RefBanner[i][2], ', 1)"><img name="TopBanner" src="', PageHost.concat(RefBanner[i][0]), '" width=468 height=60 border=0></a>');
					}	
				}	
				break;
			}
		}
	} 

	if (d==0)
	{
		document.write('<table cellspacing=0 cellpadding=1 border=0 width=468 height=60 bgcolor="#c0c0c0"><tr><td><table cellspacing=0 cellpadding=0 border=0 width="466" height="58"><tr><td bgcolor="#ffffff" align=center class=LeadFront><a href="http://vnexpress.net/Advertising" class=AdTop>D&#224;nh cho Qu&#7843;ng c&#225;o</a><br>&#272;i&#7879;n tho&#7841;i: (+84-90) 417 5952 (HN) / (+84-90) 810 7277  (HCM)</td></tr></table></td></tr></table>');
		return;
	}

	if (typeof(rbn) == 'undefined')	rbn = 1;

	if (rbn)
	{
		setInterval('ChangeBanner(' + vAd + ')', 15000);
	}
}

function AddBreakSpace(Pixel)
{
	if (typeof(Pixel)=='undefined')
	{
		Pixel=3;
	}
	document.writeln('<table cellspacing=0 cellpadding=0 border=0 width="100%" bgcolor="#FFFFFF"><tr><td height=', Pixel, '><img src="/Images/White.gif" border=0 height=1 width=1></td></tr></table>');
}

function DisplayCopyright(showType)
{
	if (typeof(showType)=='undefined')
	{
		showType=1;
	}

	document.writeln('<table cellspacing=0 cellpadding=0 border=0>');
	if (showType)
	{
		document.writeln('<tr><td width=1 class=Symbol><b>&#169;&nbsp;</b></td><td class=Copyright nowrap><b><font color=#000000>Copyright 1997-2002 VnExpress.net</font></b>, All rights reserved. <a href="', PageHost, '/ContactUs/?d=webmaster@VnExpress.net">Contact us</a><td></tr>');
		document.writeln('<tr><td height=1 colspan=2 class=BreakLine>&nbsp;</td></tr>');
		document.writeln('<tr><td width=1 class=Symbol><b>&#174;&nbsp;</b></td><td class=Copyright nowrap>Y&#234;u c&#7847;u m&#7885;i t&#7893; ch&#7913;c khi s&#7917; d&#7909;ng th&#244;ng tin c&#7911;a VnExpress.net ph&#7843;i ghi r&#245; ngu&#7891;n tin.</td></tr>');
	}
	else
	{
		document.writeln('<tr><td width=1 class=Symbol><b>&#169;</b></td><td class=Copyright nowrap><b><font color=#000000>Copyright 1997-2002 VnExpress.net</font></b>, All rights reserved.<td></tr>');
	}
	document.writeln('</table>');
}

function AddHeader(Name, Header, Buttons, Symbol, AddChildTable)
{
	document.writeln('<table width="100%" border=0 cellspacing=0 cellpadding=1 bgcolor="#1E5C99"><tr><td>');

	if (Header!='')
	{
		document.writeln('<table width="100%" border=0 cellspacing=0 cellpadding=0>');
		document.writeln('<tr>');

		if (typeof(Symbol)!='undefined')
		{
			document.writeln('<td height=16 class=BoxHeader><img src="', Symbol, '" border=0></td>');
		}

		document.writeln('<td height=16 width="100%" align=left class=BoxHeader>&nbsp;', Header, '</td>');

		if ((Buttons & 1) && fDSp)
		{
			document.write('<td width=15 align=right>');
			document.write('<a href="JavaScript:ItemMinimize(\x27', Name, '\x27)">');
			document.write('<img src="/Images/min.gif" name="IDI_', Name, '" border=0 alt="Minimize | Maximize">');
			document.write('</a></td>');
		}

		document.writeln('</tr></table>');
	}

	//document.writeln('<table width="100%" border=0 cellspacing=0 cellpadding=0 id="tIDM_', Name, '"><tr><td><div class=BreakLine id="IDM_', Name, '">');
	document.writeln('<table width="100%" border=0 cellspacing=0 cellpadding=0><tr><td id="IDM_', Name, '">');
	if (typeof(AddChildTable)=='undefined')
	{
		document.writeln('<table align=center width="100%" cellspacing=0 cellpadding=0 border=1>');
		LastChild = 1;
	}
	else
	{
		LastChild = 0;
	}
	return true;
}

function AddFooter()
{
	if (LastChild)
	{
		document.writeln('</table></td></tr></table></td></tr></table>');
	}
	else
	{
		document.writeln('</td></tr></table></td></tr></table>');
	}
}

function ItemMinimize(Name)
{
	if (!fDSp)
	{
		return;
	}

	var MItem=document.getElementById('IDM_'.concat(Name));
	var Image=document.getElementById('IDI_'.concat(Name));
	
	if (MItem.style.display!='')
	{
		//MItem.setAttribute('style','display:""');
		MItem.style.display='';
		Image.src='/Images/min.gif';
	}
	else
	{
		//MItem.setAttribute('style','display:none');
		MItem.style.display='none';
		Image.src='/Images/max.gif';
	}
}

function SetParameter(pFile, pName, pVal)
{
	if ((cPost=pFile.indexOf('&'.concat(pName).concat('=')))==-1)
		cPost=pFile.indexOf('?'.concat(pName).concat('='));

	if (cPost >= 0)
	{
		if ((pPost=pFile.indexOf('&', cPost + 1))==-1)
		{
			pFile=pFile.substring(0, cPost + pName.length + 2).concat(pVal);
		}
		else
		{
			pFile=pFile.substring(0, cPost + pName.length + 2).concat(pVal).concat(pFile.substr(pPost));
		}
	}
	else
	{
		if (pFile.indexOf('?')==-1)
		{
			pFile=pFile.concat('?').concat(pName).concat('=').concat(pVal);
		}
		else
		{
			pFile=pFile.concat('&').concat(pName).concat('=').concat(pVal);
		}
	}

	return pFile;
}

function ReverseFolderByDate()
{
	Ryear = document.Reverse.fYear.options[document.Reverse.fYear.selectedIndex].value;
	Rmonth = document.Reverse.fMonth.options[document.Reverse.fMonth.selectedIndex].value;
	Rday = document.Reverse.fDay.options[document.Reverse.fDay.selectedIndex].value;

	for (; Rday > 0; Rday--)
	{
		Rdate = new Date(Ryear, Rmonth - 1, Rday);
		if (Rdate.getDate() == Rday)
		{
			break;
		}
	}

	LastDate = Ryear.concat('/').concat(Rmonth).concat('/').concat(Rday).concat(' 23:59:59');
	
	if (RelatedFolder < 1000 )
	{
		location.replace(CurrentFolder.concat('/Default.Asp?d=').concat(escape(LastDate)));
	}
	else
	{
		location.href = SetParameter(location.href, 'd', escape(LastDate));
	}	
	
}

function ShowNextFolderItem(LastDate)
{
	if (RelatedFolder < 1000 )
	{
		location.href = SetParameter(location.href + 'Default.Asp', 'd', escape(LastDate));
	}
	else
	{
		location.href = SetParameter(location.href, 'd', escape(LastDate));
	}	
}

function UnderConst()
{
	alert('Sorry!\nThis Page is under construction!\nPlease try latter!');
}

function openMe(url, inNew, winDef)
{
	if (url == '')
		return;

	if (typeof(inNew)=='undefined')
		inNew = 0;

	if (typeof(winDef)=='undefined')
		winDef = 'scrollbars=yes,status=yes,toolbar=yes,location=yes,menubar=yes,resizable=yes,height=300,width=400,top='.concat((screen.height - 400)/2).concat(',left=0');

	if (inNew)
	{
		open(url, 'Advertising', winDef);
	}
	else
	{
		location.href = url;
	}
}

function openAdWord(id, c)
{
	var url = 'http://srv.vnexpress.net/User/Rao-vat/Counter/?id=' + id + '&c=' + c + '&r=' + Math.random();
	location.href = url;
	return false;
}

function openMeExt(vLink, vStatus, vResizeable, vScrollbars, vToolbar, vLocation, vFullscreen, vTitlebar, vCentered, vHeight, vWidth, vTop, vLeft, vID, vCounter)
{
	var sLink = (typeof(vLink.href) == 'undefined') ? vLink : vLink.href;

	winDef = '';
	winDef = winDef.concat('status=').concat((vStatus) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('resizable=').concat((vResizeable) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('scrollbars=').concat((vScrollbars) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('toolbar=').concat((vToolbar) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('location=').concat((vLocation) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('fullscreen=').concat((vFullscreen) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('titlebar=').concat((vTitlebar) ? 'yes' : 'no').concat(',');
	winDef = winDef.concat('height=').concat(vHeight-140).concat(',');
	winDef = winDef.concat('width=').concat(vWidth).concat(',');

	if (vCentered)
	{
		winDef = winDef.concat('top=').concat((screen.height - vHeight)/2).concat(',');
		winDef = winDef.concat('left=').concat((screen.width - vWidth)/2);
	}
	else
	{
		winDef = winDef.concat('top=').concat(vTop).concat(',');
		winDef = winDef.concat('left=').concat(vLeft);
	}

	if (typeof(vCounter) == 'undefined')
	{
		vCounter = 0;
	}

	if (typeof(vID) == 'undefined')
	{
		vID = 0;
	}
	
	if (vCounter)
	{
		sLink = 'http://srv.vnexpress.net/Counter/?n='.concat(vID).concat('&u=').concat(escape(sLink)).concat('&r=').concat(Math.random());
	}

	open(sLink, '_blank', winDef);

	if (typeof(vLink.href) != 'undefined')
	{
		return false;
	}
}

function openImage(vLink, vHeight, vWidth)
{
	var sLink = (typeof(vLink.href) == 'undefined') ? vLink : vLink.href;

	if (sLink == '')
	{
		return false;
	}

	winDef = 'status=no,resizable=no,scrollbars=no,toolbar=no,location=no,fullscreen=no,titlebar=yes,height='.concat(vHeight).concat(',').concat('width=').concat(vWidth).concat(',');
	winDef = winDef.concat('top=').concat((screen.height - vHeight)/2).concat(',');
	winDef = winDef.concat('left=').concat((screen.width - vWidth)/2);
	newwin = open('', '_blank', winDef);

	newwin.document.writeln('<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">');
	newwin.document.writeln('<a href="" onClick="window.close(); return false;"><img src="', sLink, '" alt="', (fBrw) ? '&#272;&#243;ng l&#7841;i' : 'Dong lai', '" border=0></a>');
	newwin.document.writeln('</body>');

	if (typeof(vLink.href) != 'undefined')
	{
		return false;
	}
}

function SetFont()
{
	if (fBrw)
	{
		rs=window.showModalDialog('/SetFont.htm', '', 'dialogHeight:215px;dialogWidth:385px;status:no;help:no');
		if (typeof(rs)!='undefined')
		{
			if (rs)
			{
				location.reload(true);
			}
		}
	}
	else
	{
		open('/SetFont.htm', 'SetFont', 'toolbar=no,height=185,width=370,top='.concat((screen.height - 185)/2).concat(',left=').concat((screen.width - 370)/2));
	}
}

function PageSet(vPage)
{
	location.replace(SetParameter(location.href, 'p', vPage));
}

function ShowAdBox()
{
	if (RefAdLBox.length==0)
		return;

	document.writeln('<table width="100%" cellspacing=0 cellpadding=0 border=0 bgcolor=red>');
	document.writeln('<tr>');
	document.writeln('<td width=190>');
	if (RefAdLBox[0][1] != '')
	{
		document.writeln('<a href="javascript:openMe(\'', RefAdLBox[0][1], '\', ', RefAdLBox[0][2], ')"><img src="', RefAdLBox[0][0], '" border=0></a>');
	}
	else
	{
		document.writeln('<img src="', RefAdLBox[0][0], '" border=0>');
	}
	document.writeln('</td>');
	document.writeln('<td width=1 bgcolor="#FFFFFF"><img src="/Images/white.gif" border=0></td>');
	document.writeln('<td><img src="/Images/Advertising.gif" border=0></td>');
	document.writeln('</tr>');
	document.writeln('</table>');
}

function ShowAdLogoNew(sType)
{
	if (typeof(sType)=='undefined')
		sType = 2;

	switch (sType)
	{
	case 1:
		ShowAdLogoLeft();
		break;
	case 2:
		ShowAdLogoRight();
		break;
	}
}


function ShowAdLogoLeft(vAd)
{
	if (typeof(vAd) == 'undefined') vAd = 0;
	var vCheckShow = 0;
	
	if (RefAdLeft.length==0)
	{
		document.write('<table width=130 cellspacing=0 cellpadding=0 border=0 bgcolor="#808080">');
		document.write('<tr>');
		document.write('<td valign=top>');
		document.write('<table cellspacing=1 cellpadding=4 border=0 width="100%">');

		document.write('<tr><td height=60 align=center bgcolor="#ffffff"><a href="http://vnexpress.net/Advertising" class=AdTitle>D&#224;nh cho <BR>Qu&#7843;ng c&#225;o</a></td></tr>');
		
		document.write('</table>');	
		document.write('</td>');
		document.write('</tr>');
		document.write('</table>');
		
		return;
	}
	
	CurAdLeft = new Array(RefAdLeft.length);
	EndAdLeft = new Array(RefAdLeft.length);
	StaAdLeft = new Array(RefAdLeft.length);
	AdLeftLnk = new Array(RefAdLeft.length);

	for (j=0; j < RefAdLeft.length; j++)
	{
		StaAdLeft[j] = 0;
		EndAdLeft[j] = 0;
		CurAdLeft[j] = 0;
		AdLeftLnk[j] = 0;
	}	
	
	document.writeln('<table cellspacing=0 cellpadding=0 border=0>');
	for (i=0; i < RefAdLeft.length; i++)
	{
		w = 130;
		h = RefAdLeft[i][4];
		vCheckShow = RefAdLeft[i][6];
		AdLeftLnk[i]=document.links.length;		
					
		if (vCheckShow == 3 && vAd < 4) vCheckShow = 0;
		
			if (vCheckShow==0 || vCheckShow==vAd)
			{
				document.writeln('<tr><td>');
								
					if(i > 0)
					{
						if(RefAdLeft[i][5] != RefAdLeft[i-1][5])
						{
							for (j=0; j < RefAdLeft.length; j++)
							{								
								if ((RefAdLeft[j][5]) == RefAdLeft[i][5]) EndAdLeft[i]++;
							}	
						}	
					}	
					else
					{
							for (j=0; j < RefAdLeft.length; j++)
							{								
								if ((RefAdLeft[j][5]) == RefAdLeft[i][5]) EndAdLeft[i]++;
							}							
					}
					
					if (i > 0)
					{
						if (RefAdLeft[i][5] != RefAdLeft[i-1][5])
						{
							if (RefAdLeft[i][1] != '')
							{
								if (RefAdLeft[i][0].substr(0,7).toLowerCase() == 'http://')
								{
									document.writeln('<a href="', RefAdLeft[i][1], '" onClick="return openMeExt(this, ', RefAdLeft[i][2], ', 1)"><img name="LeftLogo', RefAdLeft[i][5],'" src="', RefAdLeft[i][0], '" width=', w, ' height=', h, ' border=0></a>');						
								}
								else
								{
									document.writeln('<a href="', RefAdLeft[i][1], '" onClick="return openMeExt(this, ', RefAdLeft[i][2], ', 1)"><img name="LeftLogo', RefAdLeft[i][5],'" src="', PageHost.concat(RefAdLeft[i][0]), '" width=', w, ' height=', h, ' border=0></a>');						
								}	
							}
							else
							{
								if (RefAdLeft[i][0].substr(0,7).toLowerCase() == 'http://')
								{								
									document.writeln('<a href=""><img name="LeftLogo', RefAdLeft[i][5],'" src="', RefAdLeft[i][0], '" width=', w, ' height=', h, ' border=0></a>');
								}
								else
								{
									document.writeln('<a href=""><img name="LeftLogo', RefAdLeft[i][5],'" src="', PageHost.concat(RefAdLeft[i][0]), '" width=', w, ' height=', h, ' border=0></a>');									
								}	
							}	
						}	
					}	
					else
					{
						if (RefAdLeft[i][0].substr(0,7).toLowerCase() == 'http://')
						{								
							document.writeln('<a href="', RefAdLeft[i][1], '" onClick="return openMeExt(this, ', RefAdLeft[i][2], ', 1)"><img name="LeftLogo', RefAdLeft[i][5],'" src="', RefAdLeft[i][0], '" width=', w, ' height=', h, ' border=0></a>');						
						}
						else
						{
							document.writeln('<a href="', RefAdLeft[i][1], '" onClick="return openMeExt(this, ', RefAdLeft[i][2], ', 1)"><img name="LeftLogo', RefAdLeft[i][5],'" src="', PageHost.concat(RefAdLeft[i][0]), '" width=', w, ' height=', h, ' border=0></a>');													
						}	
					}
					
					var RanLTime = 15000;
					RanLTime = RanLTime + (i*10)
					if (EndAdLeft[i] > 1) setInterval('ChangeLeftLogo(' + i + ',' + RefAdLeft[i][5] +')', RanLTime);																	
				document.writeln('</td></tr>');
			}
	}
	document.writeln('</table>');
}


function ChangeLeftLogo(iItem, iImageNo)
{
	if (RefAdLeft.length==0)
		return;
		
	CurAdLeft[iItem]++;
			
	if (CurAdLeft[iItem] >= EndAdLeft[iItem] || CurAdLeft[iItem] >= RefAdLeft.length) CurAdLeft[iItem] = StaAdLeft[iItem];

	var CurItem = iItem+CurAdLeft[iItem];
	document.links[AdLeftLnk[iItem]].href = RefAdLeft[CurItem][1];
	
	if (RefAdLeft[CurAdLeft[iItem]][0].substr(0,7).toLowerCase() == 'http://')
	{
		document.images['LeftLogo' + iImageNo].src = RefAdLeft[CurItem][0];
	}
	else
	{
		document.images['LeftLogo' + iImageNo].src = PageHost.concat(RefAdLeft[CurItem][0]);
	}
	
	if (RefAdLeft[CurItem][1] == '')
	{
		document.links[AdLeftLnk[iItem]].onclick = function() { return false; };
	}
	else
	{
		document.links[AdLeftLnk[iItem]].onclick = function() { return eval('openMeExt(this, '.concat(RefAdLeft[CurItem][2]).concat(', 1)')); };
	}
}

function ShowDivLogoLeft()
{
	if (RefDiLeft.length==0) return;
	
	document.writeln('<table cellspacing=0 cellpadding=0 border=0>');
	for (i=0; i < RefDiLeft.length; i++)
	{
		if (RefDiLeft[i][1]=='')
		{
			document.writeln('<tr><td><img name="LeftDivLogo', RefDiLeft[i][5],'" src="', PageHost.concat(RefDiLeft[i][0]), '" width=100 border=0></td></tr>');							
		}
		else
		{
			document.writeln('<tr><td><a href="', RefDiLeft[i][1], '" onClick="return openMeExt(this, ', RefDiLeft[i][2], ', 1)"><img name="LeftDivLogo', RefDiLeft[i][5],'" src="', PageHost.concat(RefDiLeft[i][0]), '" width=100 border=0></a></td></tr>');								
		}
		document.writeln('<tr><td height=2></td></tr>');							
	}	
	document.writeln('</table>');	
}

function ShowDivLogoRight()
{
	if (RefDRight.length==0) return;
	
	document.writeln('<table cellspacing=0 cellpadding=0 border=0>');
	for (i=0; i < RefDRight.length; i++)
	{
		if( RefDRight[i][1]=='')
		{
			document.writeln('<tr><td><img name="RightDivLogo', RefDRight[i][5],'" src="', PageHost.concat(RefDRight[i][0]), '" width=115 border=0></td></tr>');							
		}
		else
		{
			document.writeln('<tr><td><a href="', RefDRight[i][1], '" onClick="return openMeExt(this, ', RefDRight[i][2], ', 1)"><img name="RightDivLogo', RefDRight[i][5],'" src="', PageHost.concat(RefDRight[i][0]), '" width=115 border=0></a></td></tr>');									
		}
		document.writeln('<tr><td height=2></td></tr>');							
	}	
	document.writeln('</table>');	
}

function ShowAdLogoRight(vAd)
{
	if (typeof(vAd) == 'undefined') vAd = 0;
	var vCheckShow = 0;
	var Shown = 0;
	var Shown2 = 0;
	var iRan = 0;
	
	if (RefAdLBox.length > 0)
	{
		StAdRight = new Array(RefAdLBox.length);
		EnAdRight = new Array(RefAdLBox.length);
		CurARight = new Array(RefAdLBox.length);
		ARightLnk = new Array(RefAdLBox.length);

		document.writeln('<table cellspacing=0 cellpadding=0 border=0>');

		for (j=0; j < RefAdLBox.length; j++)
		{
			StAdRight[j] = 0;
			EnAdRight[j] = 0;
			CurARight[j] = 0;
			ARightLnk[j] = 0;
		}	

		for (i=0; i < RefAdLBox.length; i++)
		{
			w = 210;
			h = RefAdLBox[i][4];
			vCheckShow = RefAdLBox[i][6];
			ARightLnk[i]=document.links.length;			
			
			if (vCheckShow == 3 && vAd < 4) vCheckShow = 0;
			
				if (vCheckShow==0 || vCheckShow==vAd)
				{
					document.writeln('<tr><td>');	

						if(i > 0)
						{
							if(RefAdLBox[i][5] != RefAdLBox[i-1][5])
							{
								for (j=0; j < RefAdLBox.length; j++)
								{								
									if ((RefAdLBox[j][5]) == RefAdLBox[i][5]) EnAdRight[i]++;
								}	
							}	
						}	
						else
						{
								for (j=0; j < RefAdLBox.length; j++)
								{								
									if ((RefAdLBox[j][5]) == RefAdLBox[i][5]) EnAdRight[i]++;
								}							
						}

						if (i > 0)
						{
							if (RefAdLBox[i][5] != RefAdLBox[i-1][5])
							{
								if (RefAdLBox[i][1] != '')
								{
									if (RefAdLBox[i][0].substr(0,7).toLowerCase() == 'http://')
									{
										document.writeln('<a href="', RefAdLBox[i][1], '" onClick="return openMeExt(this, ', RefAdLBox[i][2], ', 1)"><img name="RightLogo', RefAdLBox[i][5],'" src="', RefAdLBox[i][0], '" width=', w, ' height=', h, ' border=0></a>');						
									}
									else
									{
										document.writeln('<a href="', RefAdLBox[i][1], '" onClick="return openMeExt(this, ', RefAdLBox[i][2], ', 1)"><img name="RightLogo', RefAdLBox[i][5],'" src="', PageHost.concat(RefAdLBox[i][0]), '" width=', w, ' height=', h, ' border=0></a>');						
									}	
								}
								else
								{
									if (RefAdLBox[i][0].substr(0,7).toLowerCase() == 'http://')
									{								
										document.writeln('<a href=""><img name="RightLogo', RefAdLBox[i][5],'" src="', RefAdLBox[i][0], '" width=', w, ' height=', h, ' border=0></a>');
									}
									else
									{
										document.writeln('<a href=""><img name="RightLogo', RefAdLBox[i][5],'" src="', PageHost.concat(RefAdLBox[i][0]), '" width=', w, ' height=', h, ' border=0></a>');									
									}	
								}	
							}	
						}	
						else
						{
							if (RefAdLBox[i][0].substr(0,7).toLowerCase() == 'http://')
							{								
								document.writeln('<a href="', RefAdLBox[i][1], '" onClick="return openMeExt(this, ', RefAdLBox[i][2], ', 1)"><img name="RightLogo', RefAdLBox[i][5],'" src="', RefAdLBox[i][0], '" width=', w, ' height=', h, ' border=0></a>');						
							}
							else
							{
								if (RefAdLBox[i][2]=='') RefAdLBox[i][2] = 1;
								document.writeln('<a href="', RefAdLBox[i][1], '" onClick="return openMeExt(this, ', RefAdLBox[i][2], ', 1)"><img name="RightLogo', RefAdLBox[i][5],'" src="', PageHost.concat(RefAdLBox[i][0]), '" width=', w, ' height=', h, ' border=0></a>');													
							}	
						}
						
						var RanRTime = 15000;
						RanRTime = RanRTime + (i*10)
						if (EnAdRight[i] > 1) 
						{
							while (iRan == 0)
							{
							iRan = Math.floor(Math.random()*5);
							}
							//ChangeRightLogo((RefAdStay + (Math.floor(Math.random()*12311) % (EnAdRight[i] - RefAdStay))), RefAdLBox[i][5], iRan);
							//ChangeRightLogo(Math.floor(Math.random()*12311) % EnAdRight[i], RefAdLBox[i][5], iRan);
							ChangeRightLogo(i, RefAdLBox[i][5], iRan);
							setInterval('ChangeRightLogo(' + i + ',' + RefAdLBox[i][5] +')', RanRTime);												
						}

					document.writeln('</td></tr>');
				}
		}
		document.writeln('</table>');
	}
	
	//Show Right Small Advertising Logo
	document.write('<table width=210 cellspacing=0 cellpadding=0 border=0 bgcolor="#808080">');
	document.write('<tr>');
	document.write('<td valign=top>');
	document.write('<table cellspacing=1 cellpadding=4 border=0 width="100%">');
	if (RefAdLogo.length==0)
	{
		document.write('<tr><td height=64 align=center bgcolor="#ffffff"><a href="/Advertising" class=TopStory>D&#224;nh cho Qu&#7843;ng c&#225;o</a></td></tr>');
	}
	else
	{
		CurAdLogo=RefAdStay + (Math.floor(Math.random()*12311) % (RefAdLogo.length - RefAdStay));
	
		var AdPost = new Array(new Array(0, RefAdStay), new Array(CurAdLogo, RefAdLogo.length), new Array(RefAdStay, CurAdLogo));
		
		var d = 0;
		var c = 0;
		
		for (k=0, j=0; k < 3; k++)
		{
			for (i=AdPost[k][0]; i < AdPost[k][1]; i++, j++)
			{
				vCheckShow = RefAdLogo[i][6];
				if (vCheckShow == 3 && vAd < 4) vCheckShow = 0;
				if (RelatedFolder==9998)
					if (RefAdLogo[i][1]=='http://www.sonnguyenvn.com')
					{
						if (sLocation.indexOf("c=12")>0 || sLocation.indexOf("c=14")>0)
							{vCheckShow=0} else {vCheckShow=4}
					}
				if (vCheckShow == vAd || vCheckShow == 0) document.write('<tr>');
			
				if (RefAdLogo[i][1] != '')
				{
					if (vCheckShow == vAd || vCheckShow == 0)
					{ 
						if (RefAdLogo[i][0].substr(0,7).toLowerCase() == 'http://')
						{
							document.write('<td width="1%" bgcolor="#FFFFFF"><a href="', RefAdLogo[i][1], '" onClick="return openMeExt(this, ', RefAdLogo[i][2], ', 1)"><img src="', RefAdLogo[i][0] , '" border=0 width=130 height=60></a></td>'); 
						}
						else
						{
							document.write('<td width="1%" bgcolor="#FFFFFF"><a href="', RefAdLogo[i][1], '" onClick="return openMeExt(this, ', RefAdLogo[i][2], ', 1)"><img src="', PageHost.concat(RefAdLogo[i][0]), '" border=0 width=130 height=60></a></td>'); 
						}	
						d = 1 ;
					}	
				}
				else
				{
					if (RefAdLogo[i][0].substr(0,7).toLowerCase() == 'http://')
					{
						document.write('<td width="1%" bgcolor="#FFFFFF"><img src="', RefAdLogo[i][0] , '" border=0 width=130 height=60></td>');
					}
					else
					{
						document.write('<td width="1%" bgcolor="#FFFFFF"><img src="', PageHost.concat(RefAdLogo[i][0]), '" border=0 width=130 height=60></td>');
					}	
					d = 1; 
				}

				if (d == 1 && c == 0)
				{
					c = 1;
					document.write('<td valign=top rowspan=', RefAdLogo.length, ' bgcolor="#FFFFFF">');
					document.write('<table width="100%" cellspacing=0 cellpadding=0 border=0>');

					if (RefColumn.length==0)
					{
						document.write('<tr><td height=64 align=center bgcolor="#CC0000"><a href="/Advertising" class=PnDTitle>D&#224;nh<BR>cho<BR>Qu&#7843;ng<BR>c&#225;o</a></td></tr>');
					}
					else
					{
						for (p=0; p < RefColumn.length; p++)
						{
							vCheckShow = RefColumn[p][6];
							if (vCheckShow == 3 && vAd < 4) vCheckShow = 0;
							if (vCheckShow == vAd || vCheckShow == 0) document.write('<tr>');
							h = Math.floor(RefColumn[p][4]/60);
							h = (h > 1) ? h*60 + (h - 1)*9 : h*60;

							if (RefColumn[p][1] != '')
							{
								if (vCheckShow == vAd || vCheckShow == 0)
								{	
									if (RefColumn[p][0].substr(0,7).toLowerCase() == 'http://')
									{
										document.write('<td width="1%" bgcolor="#FFFFFF"><a href="', RefColumn[p][1], '" onClick="return openMeExt(this, ', RefColumn[p][2], ', 1)" nofocus><img src="', RefColumn[p][0] , '" border=0 height=', h , ' width=60></a></td>');
									}
									else
									{
										document.write('<td width="1%" bgcolor="#FFFFFF"><a href="', RefColumn[p][1], '" onClick="return openMeExt(this, ', RefColumn[p][2], ', 1)" nofocus><img src="', PageHost.concat(RefColumn[p][0]), '" border=0 height=', h , ' width=60></a></td>');
									}	
									c = 2
								}	
								
							}
							else
							{
								if (RefColumn[p][0].substr(0,7).toLowerCase() == 'http://')
								{
									document.write('<td width="1%" bgcolor="#FFFFFF"><img src="', RefColumn[p][0] , '" border=0 height=', h, ' width=60></td>');
								}
								else
								{
									document.write('<td width="1%" bgcolor="#FFFFFF"><img src="', PageHost.concat(RefColumn[p][0]), '" border=0 height=', h, ' width=60></td>');
								}	
								c = 2
							}
							if (vCheckShow == vAd || vCheckShow == 0) document.write('</tr>');
							if (vCheckShow == vAd || vCheckShow == 0) document.write('<tr><td height=9></td></tr>');
						}
					}
					if (c == 1 && RefColumn.length > 0) document.write('<tr><td height=64 align=center bgcolor="#CC0000"><a href="/Advertising" class=PnDTitle>D&#224;nh<BR>cho<BR>Qu&#7843;ng<BR>c&#225;o</a></td></tr>');
					document.write('</table>');	
					document.write('</td>');
				}
				
				if (vCheckShow == vAd || vCheckShow == 0)	document.write('</tr>');
			}
		}
	}
	if (d==0) document.write('<tr><td height=64 align=center bgcolor="#ffffff"><a href="/Advertising" class=TopStory>D&#224;nh cho Qu&#7843;ng c&#225;o</a></td></tr>');
	document.write('</table>');	
	document.write('</td>');
	document.write('</tr>');
	document.write('</table>');
	
	
	//Show Under Right Small Advertising Logo
	if (RefURight.length==0) return 
	document.write('<Table border=0 cellspacing=0 cellpadding=0><tr><td height=2 align=center></td></tr></Table>');
	document.write('<table width=210 cellspacing=0 cellpadding=0 border=0 bgcolor="#808080">');
	document.write('<tr>');
	document.write('<td valign=top>');
	document.write('<table cellspacing=1 cellpadding=4 border=0 width="100%">');
	
	CurAdLogo = 0;
	RefAdStay = 0;
	j = 0;
	CurAdLogo=RefAdStay + (Math.floor(Math.random()*12311) % (RefURight.length - RefAdStay));

	var AdPost = new Array(new Array(0, RefAdStay), new Array(CurAdLogo, RefURight.length), new Array(RefAdStay, CurAdLogo));
	
	var d = 0;
	var c = 0;
	
	for (k=0, j=0; k < 3; k++)
	{
		for (i=AdPost[k][0]; i < AdPost[k][1]; i++, j++)
		{
			vCheckShow = RefURight[i][6];
			if (vCheckShow == 3 && vAd < 4) vCheckShow = 0;
			
			if (vCheckShow == vAd || vCheckShow == 0) document.write('<tr>');
		
			if (RefURight[i][1] != '')
			{
				if (vCheckShow == vAd || vCheckShow == 0)
				{ 
					if (RefURight[i][0].substr(0,7).toLowerCase() == 'http://')
					{
						document.write('<td width="1%" bgcolor="#FFFFFF"><a href="', RefURight[i][1], '" onClick="return openMeExt(this, ', RefURight[i][2], ', 1)"><img src="', RefURight[i][0] , '" border=0 width=130></a></td>'); 
					}
					else
					{
						document.write('<td width="1%" bgcolor="#FFFFFF"><a href="', RefURight[i][1], '" onClick="return openMeExt(this, ', RefURight[i][2], ', 1)"><img src="', PageHost.concat(RefURight[i][0]), '" border=0 width=130></a></td>'); 
					}	
					d = 1 ;
				}	
			}
			else
			{
				if (RefURight[i][0].substr(0,7).toLowerCase() == 'http://')
				{
					document.write('<td width="1%" bgcolor="#FFFFFF"><img src="', RefURight[i][0] , '" border=0 width=130></td>');
				}
				else
				{
					document.write('<td width="1%" bgcolor="#FFFFFF"><img src="', PageHost.concat(RefURight[i][0]), '" border=0 width=130></td>');
				}	
				d = 1; 
			}

			if (d == 1 && c == 0)
			{
				c = 1;
				document.write('<td valign=top rowspan=', RefURight.length, ' bgcolor="#FFFFFF">');
				document.write('<table width="100%" cellspacing=0 cellpadding=0 border=0>');

				if (RefUColum.length==0)
				{
					//document.write('<tr><td height=64 align=center bgcolor="#CC0000"><a href="/Advertising" class=PnDTitle>D&#224;nh<BR>cho<BR>Qu&#7843;ng<BR>c&#225;o</a></td></tr>');
				}
				else
				{
					for (p=0; p < RefUColum.length; p++)
					{
						vCheckShow = RefUColum[p][6];
						if (vCheckShow == 3 && vAd < 4) vCheckShow = 0;
						if (vCheckShow == vAd || vCheckShow == 0) document.write('<tr>');
						h = Math.floor(RefUColum[p][4]/60);
						h = (h > 1) ? h*60 + (h - 1)*9 : h*60;

						if (RefUColum[p][1] != '')
						{
							if (vCheckShow == vAd || vCheckShow == 0)
							{	
								if (RefUColum[p][0].substr(0,7).toLowerCase() == 'http://')
								{
									document.write('<td width="1%" bgcolor="#FFFFFF"><a href="', RefUColum[p][1], '" onClick="return openMeExt(this, ', RefUColum[p][2], ', 1)" nofocus><img src="', RefUColum[p][0] , '" border=0 height=', h , ' width=60></a></td>');
								}
								else
								{
									document.write('<td width="1%" bgcolor="#FFFFFF"><a href="', RefUColum[p][1], '" onClick="return openMeExt(this, ', RefUColum[p][2], ', 1)" nofocus><img src="', PageHost.concat(RefUColum[p][0]), '" border=0 height=', h , ' width=60></a></td>');
								}	
								c = 2
							}	
							
						}
						else
						{
							if (RefUColum[p][0].substr(0,7).toLowerCase() == 'http://')
							{
								document.write('<td width="1%" bgcolor="#FFFFFF"><img src="', RefUColum[p][0] , '" border=0 height=', h, ' width=60></td>');
							}
							else
							{
								document.write('<td width="1%" bgcolor="#FFFFFF"><img src="', PageHost.concat(RefUColum[p][0]), '" border=0 height=', h, ' width=60></td>');
							}	
							c = 2
						}
						if (vCheckShow == vAd || vCheckShow == 0) document.write('</tr>');
						if (vCheckShow == vAd || vCheckShow == 0) document.write('<tr><td height=9></td></tr>');
					}
				}
				if (c == 1 && RefUColum.length > 0) document.write('<tr><td height=64 align=center bgcolor="#CC0000"><a href="/Advertising" class=PnDTitle>D&#224;nh<BR>cho<BR>Qu&#7843;ng<BR>c&#225;o</a></td></tr>');
				document.write('</table>');	
				document.write('</td>');
			}
			
			if (vCheckShow == vAd || vCheckShow == 0)	document.write('</tr>');
		}
	}
	
	if (d==0) document.write('<tr><td height=64 align=center bgcolor="#ffffff"><a href="/Advertising" class=TopStory>D&#224;nh cho Qu&#7843;ng c&#225;o</a></td></tr>');
	document.write('</table>');	
	document.write('</td>');
	document.write('</tr>');
	document.write('</table>');
}


function ChangeRightLogo(iItem, iImageNo, iRan)
{
	if (RefAdLBox.length==0)
		return;
	
	if (typeof(iRan) == 'undefined') 
	{
		CurARight[iItem]++;
	}
	else
	{
		CurARight[iItem] = Math.floor(Math.random()*12311) % EnAdRight[i];
	}
		
	if (CurARight[iItem] >= EnAdRight[iItem] || CurARight[iItem] >= RefAdLBox.length) CurARight[iItem] = StAdRight[iItem];

	var CurItem = iItem + CurARight[iItem];
	document.links[ARightLnk[iItem]].href = RefAdLBox[CurItem][1];

	if (RefAdLBox[CurARight[iItem]][0].substr(0,7).toLowerCase() == 'http://')
	{
		document.images['RightLogo' + iImageNo].src = RefAdLBox[CurItem][0];
	}
	else
	{
		document.images['RightLogo' + iImageNo].src = PageHost.concat(RefAdLBox[CurItem][0]);
	}
	
	if (RefAdLBox[CurItem][1] == '')
	{
		document.links[ARightLnk[iItem]].onclick = function() { return false; };
	}
	else
	{
		document.links[ARightLnk[iItem]].onclick = function() { return eval('openMeExt(this, '.concat(RefAdLBox[CurItem][2]).concat(', 1)')); };
	}
}

function UnicodeSet(iStr)
{
	for (i=0, oStr=''; i < iStr.length; i++)
	{
		switch ((j=iStr.charCodeAt(i)))
		{
		case 34:
			oStr=oStr.concat('&quot;');
			break;
		case 38:
			oStr=oStr.concat('&amp;');
			break;
		case 39:
			oStr = oStr.concat('&#39;');
			break;
		case 60:
			oStr = oStr.concat('&lt;');
			break;
		case 62:
			oStr = oStr.concat('&gt;');
			break;
		default:
			if (j < 32 || j > 127 || j==34 || j==39)
			{
				oStr=oStr.concat('&#').concat(j).concat(';');
			}
			else
			{
				oStr=oStr.concat(iStr.charAt(i)); 
			}
			break;
		}
	}
	
	return oStr;
}

function UnicodeGet(iStr)
{
	for (i=0, oStr=''; i < iStr.length; )
	{
		if (iStr.charCodeAt(i)==38)
		{
			if (iStr.charCodeAt(i + 1)==35)
			{
				p=iStr.indexOf(';', i  + 2);
				if (p!=-1)
				{
					if (p - i <= 7)
					{
						if (isFinite(iStr.substr(i + 2, p - i - 2)))
						{
							oStr = oStr.concat(String.fromCharCode(iStr.substr(i + 2, p - i - 2)));
							i = p + 1;
							continue;
						}
					}
				}
			}
			else
			{
				p=iStr.indexOf(';', i  + 1);
				if (p!=-1)
				{
					switch (iStr.substr(i + 1, p - i - 1))
					{
					case 'amp':
						oStr = oStr.concat('&');
						i = p + 1;
						break;
					case 'quot':
						oStr = oStr.concat('"');
						i = p + 1;
						break;
					case 'lt':
						oStr = oStr.concat('<');
						i = p + 1;
						break;
					case 'gt':
						oStr = oStr.concat('>');
						i = p + 1;
						break;
					}
				}
			}
		}
	
	
		oStr=oStr.concat(iStr.charAt(i));
		i++;
	}
	
	return oStr;
}

function SearchMe(s, a)
{
	while (s.length > 0 && s.charAt(0) <= ' ')
	{
		s = s.substr(1);
	}

	while ((i=s.length) > 0 && s.charAt(i - 1) <= ' ')
	{
		s = s.substr(0, i - 1);
	}

	if (s=='')
	{
		document.Search.TSearch.value = s;
		return false;
	}
	
	f = GetPostVariable('r', RelatedFolder);
	s = escape(UnicodeSet(s));
	r = '/Search/?p=1&r='.concat(f).concat('&a=').concat(a).concat('&s=').concat(s);

	if (location.pathname.toLowerCase()=='/search/')
	{
		location.replace(r);
	}
	else
	{
		location.href=r;
	}
	return false;
}

function SearchOnFocus(field)
{
	if(field.value=='Search')
	{
		field.value = '';
	}
}

function SearchOnBlur(field)
{
	if(field.value=='')
	{
		field.value='Search';
	}
}

function ShowSearch()
{
	if ((s=GetPostVariable('s', ''))!='')
	{
		s = unescape(s);
	}

	s=UnicodeGet(s);

	document.writeln('<table height=30 cellspacing=0 cellpadding=0 border=0 align=center>');
	document.writeln('<form method="POST" name="Search" onSubmit="return SearchMe(document.Search.TSearch.value, 1)">');
	document.writeln('<tr>');
	document.writeln('<td><div><input type="text" name="TSearch" size=9 value="Search" class=SearchBox onfocus="SearchOnFocus(this)" onkeyup="initTyper(this)" onblur="SearchOnBlur(this)"></div></td>');
	document.writeln('<td class=BreakLine width=3>&nbsp;</td>');
	document.writeln('<td><a href="javascript:SearchMe(document.Search.TSearch.value, 1)"><img src="/Images/Go.gif" border=0></a></td>');
	document.writeln('</tr>');
	document.writeln('</form>');
	document.writeln('</table>');

	if (s!='')
	{
		document.Search.TSearch.value = s;
	}
}

function CheckThisVote(field)
{
	form = field.form;
	if (field.checked)
	{
		form.fvotefor.value = field.value;
	}
	else
	{
		form.fvotefor.value = '';
		return;
	}

	for (i=0; i < form.elements.length - 2; i++)
	{
		if(form.elements[i].type=='checkbox')
			if (form.elements[i] != field)
				if (form.elements[i].checked)
					form.elements[i].checked = false;
	}
}

function SubmitVote(sform, saction)
{
	if (saction==0)
	{
		if (sform.fvotefor.value=='')
		{
			alert('Hay chon mot trong cac muc truoc khi bieu quyet.');
			return;
		}
	}

	var form = sform;
	var j = 0
	for (i=0; i < form.elements.length - 2; i++)
		{
			if(form.elements[i].type=='checkbox'){
				j = j + 1
			}
		}
	var sheight = (j * 40) + 50;
	if (sheight < 250){
		sheight = 250;
	}
	open('', sform.name, 'scrollbars=yes,resizeable=no,locationbar=no,width=500,height='+sheight+',left='.concat((screen.width - 500)/2).concat(',top=').concat((screen.height - 250)/2));
	sform.faction.value = saction;
	sform.action = 'http://srv.vnexpress.net/User/Vote/Default.Asp' ;
	sform.submit();
}

function AddVote(SubjectID, PageID, VoteID, Align, VoteTitle, Color, BgColor, Width, NumItem, ItemArray, Description, Column)
{
	document.writeln('<table width="', Width, '" border=0 cellspacing=0 cellpadding=2 bgcolor="', BgColor, '"', (Align=='') ? '' : ' align='.concat(Align), '>');
	if (VoteTitle!='')
	{
		document.writeln('<tr><td><p class=BoxTitle style="margin-left: 3; color: ', Color, '">', VoteTitle, '</p></td></tr>');
	}

	if (typeof(Description)=='undefined')
	{
		Description = '';
	}

	if (typeof(Column)=='undefined')
	{
		Column = 1;
	}

	document.writeln('<tr>');
	document.writeln('<form method="POST" target="Frm_', VoteID, '" name="Frm_', VoteID, '">');
	document.writeln('<td>');
	document.writeln('<table border=0 cellpadding=0 cellspacing=0 width="100%" bgcolor="#FFFFFF">');

	document.writeln('<input type="hidden" name="fsubjectid" value=', SubjectID, '>');
	document.writeln('<input type="hidden" name="fpageid" value=', PageID, '>');
	document.writeln('<input type="hidden" name="ffolder" value="', CurrentFolder, '">');
	document.writeln('<input type="hidden" name="fvoteid" value=', VoteID, '>');
	document.writeln('<input type="hidden" name="fvotetitle" value="', ReplaceAll(VoteTitle, '"', '&quot;'), '">');
	document.writeln('<input type="hidden" name="fvotefor" value="">');
	document.writeln('<input type="hidden" name="faction" value="0">');
	document.writeln('<input type="hidden" name="fDescription" value="', ReplaceAll(Description, '"', '&quot;'), '">');

	document.writeln('<input type="hidden" name="fnumitem" value=', NumItem, '>');
	document.writeln('<tr><td width="100%" height=5><img src="/Images/White.gif" border=0></td></tr>');
    
	document.writeln('<tr><td>');
	document.writeln('<table width="100%" cellspacing=0 cellpadding=0 border=0>');

	var i, j, k;

	for (i=0; i < NumItem; )
	{
		document.writeln('<tr>');
		
		for (j=0; j < Column && i < NumItem; j++, i++)
		{
			document.writeln('<input type="hidden" name="fT_', i, '" value="', ReplaceAll(ItemArray[i][0], '"', '&quot;'), '">');
			document.writeln('<input type="hidden" name="fI_', i, '" value="', ItemArray[i][1], '">');
			document.writeln('<input type="hidden" name="fN_', i, '" value="', ItemArray[i][2], '">');
			document.writeln('<td valign=top width=20 align=right><input type="checkbox" name="fC_', i, '" value=', ItemArray[i][2], ' class=VoteField onClick="CheckThisVote(this)"></td>');
			if (i + 1 < NumItem || Column==1)
			{
				document.writeln('<td><p  class=VoteItem>', ItemArray[i][0], '</p></td>');
			}
			else
			{
				document.writeln('<td colspan=', (Column - j - 1)*2,'><p  class=VoteItem>', ItemArray[i][0], '</p></td>');
			}
		}		

		document.writeln('</tr>');
	}

	document.writeln('</table>');
	document.writeln('</td></tr>');

	document.writeln('<tr><td width="100%" class=BreakLine height=4>&nbsp;</td></tr>');
	document.writeln('<tr><td width="100%" class=BreakLine height=1 bgcolor="', BgColor, '"></td></tr>');
	document.writeln('<tr><td width="100%" height=32>&nbsp;<input type="button" value="Bi&#7875;u quy&#7871;t" name="Vote" class=VoteButton style="width: 60" onClick="SubmitVote(this.form, 0)">&nbsp;<input type="button" value="K&#7871;t qu&#7843;" name="View" class=VoteButton style="width: 60" onClick="SubmitVote(this.form, 1)"></td></tr>');

	//if (VirtualFolder=='/vietnam/vi-tinh'){
	//	document.writeln('<tr><td width="100%" align=center>&nbsp;<a href="JavaScript:Showsurvey();"><img src="/Customize/ADSLsurvey/ADSLsurvey.jpg" border=1></a></td></tr>');	
	//}	
	
	document.writeln('</table>');
	document.writeln('</td>');
	document.writeln('</form>');
	document.writeln('</tr>');
	document.writeln('</table>');
	document.writeln('<table height=2 cellspacing=0 cellpadding=0 border=0><tr><td class=BreakLine>&nbsp;</td></tr></table>');
}

function Showsurvey(){
	vWH = 500;
	vWW = 440;
	vWN = 'ContactUs';
	winDef = 'status=no,resizable=no,scrollbars=yes,toolbar=no,location=no,fullscreen=no,titlebar=yes,height='.concat(vWH).concat(',').concat('width=').concat(vWW).concat(',');
	winDef = winDef.concat('top=').concat((screen.height - vWH)/2).concat(',');
	winDef = winDef.concat('left=').concat((screen.width - vWW)/2);
	newwin = open('/Customize/ADSLSurvey/', vWN, winDef);
}

function ShowExpand(sobj1, sobj2)
{
	sobj1.style.display = 'none';
	sobj2.style.display = '';
}

function SetSelectValue(Field, iStr)
{
	if (iStr=='')
	{
		iStr=' ';
	}

	for (i=0; i < Field.options.length; i++)
	{
		if (Field.options[i].value==iStr)
		{
			Field.selectedIndex=i;
			return;
		}
	}
}

function LTrim(iStr)
{
	while (iStr.charCodeAt(0) <= 32)
	{
		iStr=iStr.substr(1);
	}
	return iStr;
}

function RTrim(iStr)
{
	while (iStr.charCodeAt(iStr.length - 1) <= 32)
	{
		iStr=iStr.substr(0, iStr.length - 1);
	}
	return iStr;
}

function Trim(iStr)
{
	while (iStr.charCodeAt(0) <= 32)
	{
		iStr=iStr.substr(1);
	}

	while (iStr.charCodeAt(iStr.length - 1) <= 32)
	{
		iStr=iStr.substr(0, iStr.length - 1);
	}

	return iStr;
}

function Left(str, n)
{
	if (n <= 0)
	    return "";
	else if (n > String(str).length)
	    return str;
	else
	    return String(str).substring(0,n);
}


function Right(str, n)
{
    if (n <= 0)
       return "";
    else if (n > String(str).length)
       return str;
    else {
       var iLen = String(str).length;
       return String(str).substring(iLen, iLen - n);
    }
}

function CheckEmailAddress(Email)
{
	Email = Trim(Email);

	while (Email != '')
	{
		c = Email.charAt(0);	
		if (c==' ' || c=='<' || c==39 || c==':' || c=='.')
		{
			Email = Email.substr(1);
		}
		else
		{
			break;
		}
	}

	i = Email.indexOf('>');
	if (i==-1)
	{
		while (Email != '')
		{
			c = Email.charAt(Email.length - 1);
			if (c==' ' || c==39 || c=='.')
			{
				Email = Email.substr(0, Email.length - 1);
			}
			else
			{
				break;
			}
		}
	}
	else
	{
		Email = Email.substr(0, i);
	}

	if (Email.length > 96)
		return '';

	i = Email.lastIndexOf('@');
	j = Email.lastIndexOf('.');
	if (i < j)
		i = j;

	switch (Email.length - i - 1)
	{
	case 2:
		break;
	case 3:
		switch (Email.substr(i))
		{
		case '.com':
		case '.net':
		case '.org':
		case '.edu':
		case '.mil':
		case '.gov':
		case '.biz':
		case '.pro':
		case '.int':
			break;
		default:
			return '';
		}
		break;
	default:
		switch (Email.substr(i))
		{
		case '.name':
		case '.info':
			break;
		default:
			return '';
		}
		break;
	}

	Email = Email.toLowerCase();

	if (Email == '')
		return '';

	if (Email.indexOf(' ') != -1)
		return '';

	if (Email.indexOf('..') != -1)
		return '';

	if (Email.indexOf('.@') != -1)
		return '';

	if (Email.indexOf('@.') != -1)
		return '';

	if (Email.indexOf(':') != -1)
		return '';

	for (i=0; i < Email.length; i++)
	{
		c = Email.charAt(i);

		if (c >= '0' && c <= '9')
			continue;
		
		if (c >= 'a' && c <= 'z')
			continue;
		
		if ('`~!#$%^&*-_+=?/\\|@.'.indexOf(c) != -1)
			continue;

		return '';
	}

	if ((i=Email.indexOf('@'))==-1)
		return '';

	if (Email.substr(i + 1).indexOf('@')!=-1)
		return '';

	if (Email.charAt(0)=='.' || Email.charAt(Email.length - 1)=='.')
		return '';

	return Email;
}

function ShowAdWordByCate(Field)
{
	location.replace(SetParameter('/User/Rao-vat/Source/List.Asp', 'c', Field.options[Field.selectedIndex].value));
}

function ReplaceAll(iStr, v1, v2)
{
	var i = 0, oStr = '', j = v1.length;

	while (i < iStr.length)
	{
		if (iStr.substr(i, j) == v1)
		{
			oStr+=v2;
			i+=j
		}
		else
		{
			oStr+=iStr.charAt(i);
			i++;
		}
	}

	return oStr;
}

function TrimAndRDS(iStr)
{
	function IsHyperLink(iStr)
	{
		var i = 0, c = ' ';

		if (iStr.charAt(0) == '.')
			return false;

		for (i=0; i < iStr.length; i++)
		{
			c = iStr.charAt(i).toLowerCase();
			if (c >= '0' && c <= '9')
				continue;
		
			if (c >= 'a' && c <= 'z')
				continue;
		
			if ('@_-&.?#+-/:'.indexOf(c) != -1)
				continue;

			return false;
		}
	
		return true;
	}

	function GetLastBreak(iStr, s)
	{
		var f = new Array('(', ')', '<', '>', ' ', '\r', '\n', '\t', ',', ';', '!'), p = 0, i = 0, r = -1;
	
		for (i = 0; i < f.length; i++)
			if ((p = iStr.lastIndexOf(f[i], s)) != -1)
				if (r == -1 || p > r)
					r = p;
		return r;
	}

	function GetNextBreak(iStr, s)
	{
		var f = new Array('(', ')', '<', '>', ' ', '\r', '\n', '\t', ',', ';', '!'), p = 0, i = 0, r = -1;
	
		for (i = 0; i < f.length; i++)
			if ((p = iStr.indexOf(f[i], s)) != -1)
				if (r == -1 || p < r)
					r = p;
		return r;
	}

	function CheckDotAfter(iStr)
	{
		var p0 = 0, p1 = 0, p2 = 0, p3 = 0;

		while ((p1 = iStr.indexOf('.', p0)) != -1)
		{
			if (iStr.charAt(p1 - 1) == ' ')
			{
				iStr = iStr.substr(0, p1 - 1).concat(iStr.substr(p1));
				p0 = p1;
			}
			else
			{
				p0 = p1 + 1;
			}

			if (iStr.charAt(p0) != ' ')
			{
				if ((p3 = GetLastBreak(iStr, p0)) == -1)
				{
					p3 = p0;
				}
				else
				{
					p3 = p3 + 1;
				}
		
				if ((p2 = GetNextBreak(iStr, p3)) == -1)
				{
					if (IsHyperLink(iStr.substr(p3)))
					{
						iStr = iStr.substr(0, p3).concat(iStr.substr(p3).toLowerCase())
						break;
					}
					else
					{
						if (iStr.charAt(p0) < '0' || iStr.charAt(p0) > '9')
						{
							iStr = iStr.substr(0, p0).concat(' ').concat(iStr.substr(p0, 1).toUpperCase()).concat(iStr.substr(p0 + 1));
							p0++;
						}
					}
				}
				else
				{
					if (IsHyperLink(iStr.substring(p3, p2)))
					{
						iStr = iStr.substr(0, p3).concat(iStr.substring(p3, p2).toLowerCase()).concat(iStr.substr(p2));
						p0 = p2 + 1;
					}
					else
					{
						if (iStr.charAt(p0) < '0' || iStr.charAt(p0) > '9')
						{
							iStr = iStr.substr(0, p0).concat(' ').concat(iStr.substr(p0, 1).toUpperCase()).concat(iStr.substr(p0 + 1));
							p0++;
						}
					}
				}
			}
			else
			{
				iStr = iStr.substr(0, p0 + 1).concat(iStr.substr(p0 + 1, 1).toUpperCase()).concat(iStr.substr(p0 + 2));
			}
		}	

		return iStr;
	}

	function CheckCharAfter(iStr, iChar, iUp)
	{
		var p0 = 0, p1 = 0;

		while ((p1 = iStr.indexOf(iChar, p0)) != -1)
		{
			if (iStr.charAt(p1 - 1) == ' ')
			{
				iStr = iStr.substr(0, p1 - 1).concat(iStr.substr(p1));
				p0 = p1;
			}
			else
			{
				p0 = p1 + 1;
			}

			if (iStr.charAt(p0) != ' ')
			{
				if (iStr.charAt(p0) < '0' || iStr.charAt(p0) > '9')
				{
					if (iUp)
					{
						iStr = iStr.substr(0, p0).concat(' ').concat(iStr.substr(p0, 1).toUpperCase()).concat(iStr.substr(p0 + 1));
					}
					else
					{
						iStr = iStr.substr(0, p0).concat(' ').concat(iStr.substr(p0));
					}
					p0++;
				}
			}
			else
			{
				if (iUp)
				{
					iStr = iStr.substr(0, p0 + 1).concat(iStr.substr(p0 + 1, 1).toUpperCase()).concat(iStr.substr(p0 + 2));
				}
			}
		}

		return iStr;
	}

	function CheckScope(iStr, s1, s2)
	{
		var p0 = 0, p1 = 0;

		for (p0 = 0; (p1 = iStr.indexOf(s1, p0)) != -1; )
		{
			if (iStr.charAt(p1 + 1) == ' ')
				iStr = iStr.substr(0, p1 + 1).concat(iStr.substr(p1 + 2));

			if (p1 > 0)
				if (iStr.charAt(p1 - 1) != ' ')
				{
					iStr = iStr.substr(0, p1).concat(' ').concat(iStr.substr(p1));
					p1++;
				}
			
			p0 = p1 + 1;
		}

		for (p0 = 0; (p1 = iStr.indexOf(s2, p0)) != -1; )
		{
			var SkipChar = ':,.;!?'.concat(s2);

			if (p1 > 0)
				if (iStr.charAt(p1 - 1) == ' ')
				{
					iStr = iStr.substr(0, p1 - 1).concat(iStr.substr(p1));
					p1--;
				}

			if (iStr.charAt(p1 + 1) != ' ' && SkipChar.indexOf(iStr.charAt(p1 + 1)) == -1)
				iStr = iStr.substr(0, p1 + 1).concat(' ').concat(iStr.substr(p1 + 1));

			p0 = p1 + 1;
		}		

		return iStr;
	}
	
	iStr = ReplaceAll(iStr, '  ', ' ');
	iStr = ReplaceAll(iStr, ' \r\n', '\r\n');
	iStr = ReplaceAll(iStr, '\r\n ', '\r\n');

	iStr = CheckCharAfter(iStr, ',', false);
	iStr = CheckCharAfter(iStr, ':', false);
	iStr = CheckCharAfter(iStr, ';', false);
	iStr = CheckCharAfter(iStr, '?', true);
	iStr = CheckCharAfter(iStr, '!', true);

	iStr = CheckScope(iStr, '(', ')');
	iStr = CheckScope(iStr, '[', ']');

	iStr = ReplaceAll(iStr, 'http: //', 'http://');
	iStr = CheckDotAfter(iStr);

	iStr = ReplaceAll(iStr, ', \r\n', ',\r\n');
	iStr = ReplaceAll(iStr, ': \r\n', ':\r\n');
	iStr = ReplaceAll(iStr, '; \r\n', ';\r\n');
	iStr = ReplaceAll(iStr, '? \r\n', '!\r\n');
	iStr = ReplaceAll(iStr, '! \r\n', '!\r\n');
	iStr = ReplaceAll(iStr, '. \r\n', '.\r\n');


	if (iStr.charAt(0) == ' ')
		iStr = iStr.substr(1);

	if (iStr.charAt(iStr.length - 1) == ' ')
		iStr = iStr.substr(0, iStr.length - 1);

	return iStr.substr(0, 1).toUpperCase().concat(iStr.substr(1));
}

function dw(wstr)
{
	document.writeln(unescape(wstr));
}

function ShowFooterAd(vAd)
{
	if (RefAdLogo.length==0) return;
	if (typeof(vAd) == 'undefined') vAd = 0;
	var vCheckShow = 0;		


	CurAdLogo=RefAdStay + (Math.floor(Math.random()*12311) % (RefAdLogo.length - RefAdStay));

	document.writeln('<table width="100%" cellspacing=0 cellpadding=0 border=0 bgcolor="#c0c0c0">');
	document.writeln('<tr><td align=center>');
	document.writeln('<table width="100%" cellspacing=1 cellpadding=4 border=0>');
	document.writeln('<tr>');	

	var AdPost = new Array(new Array(0, RefAdStay), new Array(CurAdLogo, RefAdLogo.length), new Array(RefAdStay, CurAdLogo));

	for (k=0, c=0; c < 4 && k < 3; k++)
	{
		for (i=AdPost[k][0]; c < 4 && i < AdPost[k][1]; i++, c++)
		{
			document.writeln('<td height=64 align=center valign=middle align=right bgcolor="#FFFFFF">');
			if (RefAdLogo[i][1] != '')
			{
				document.writeln('<a href="', RefAdLogo[i][1], '"><img src="', PageHost.concat(RefAdLogo[i][0]), '" border=0 width=130 height=60></a>');
			}
			else
			{
				document.writeln('<img src="', PageHost.concat(RefAdLogo[i][0]), '" border=0 width=130 height=60>');
			}
			document.writeln('</td>');
		}
	}

	document.writeln('</tr>');
	document.writeln('</table>');	
	document.writeln('</td></tr>');
	document.writeln('</table>');
}

function PrintSubject()
{
	w=open(location.href.concat('?q=1'), '_blank', '');
	return false;
	w.document.writeln('<html>');
	w.document.writeln('<head>');
	w.document.writeln('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">');
	w.document.writeln('<link rel="stylesheet" href="http://vnexpress.net/Resource/Default.css" type="text/css">');
	w.document.writeln('</head>');
	w.document.writeln('<body topmargin=3 leftmargin=0 marginheight=3 marginwidth=0>');
	w.document.writeln('<table cellspacing=0 cellpadding=0 border=0 width=420 align=center>');
	w.document.writeln('<tr>');
	w.document.writeln('<td>');
	w.document.writeln(document.getElementById('CContainer').innerHTML);
	w.document.writeln('</td>');
	w.document.writeln('</tr>');
	w.document.writeln('</table>');
	w.document.writeln('</body>');
	w.document.writeln('</html>');
	w.document.title = document.title;
	return false;
}

function EmailSubject(PageID)
{
	openMeExt('http://srv.vnexpress.net/User/EmailSubject/?u='.concat(escape(location.href)), 0, 0, 0, 0, 0, 0, 1, 1, 515, 480, 0, 0, '', 0);
	return false;
}

function openPopup(vImage, vLink, vTitle, vScrollbars, vHeight, vWidth, vTop, vLeft, vHide)
{
	if (typeof(vHide) == 'undefined')
	{
		vHide = false;
	}

	if (vHide)
	{
		var pw = open('/Library/PopupUnder.Asp?vImage='.concat(escape(vImage)).concat('&vLink=').concat(escape(vLink)).concat('&vTitle=').concat(escape(vTitle)), 'Popup_'.concat(ReplaceAll(vTitle, ' ', '_')), 'status=no,resizable=no,scrollbars='.concat(vScrollbars).concat(',toolbar=no,location=no,fullscreen=no,titlebar=no,height=').concat(vHeight).concat(',').concat('width=').concat(vWidth).concat(',').concat('top=').concat(0).concat(',').concat('left=').concat(0));
		var LinkStr = vLink;
		window.focus();
		return pw;
	}
	else
	{
		return open('/Library/Popup.Asp?vImage='.concat(escape(vImage)).concat('&vLink=').concat(escape(vLink)).concat('&vTitle=').concat(escape(vTitle)), 'Popup_'.concat(ReplaceAll(vTitle, ' ', '_')), 'status=no,resizable=no,scrollbars=no,toolbar=no,location=no,fullscreen=no,titlebar=yes,height='.concat(vHeight).concat(',').concat('width=').concat(vWidth).concat(',').concat('top=').concat(vTop).concat(',').concat('left=').concat(vLeft));
	}
}

function ShowPopupAd()
{
	if (typeof(RefAPopup) == 'undefined')
		return;
	
	if (RefAPopup.length==0)
		return;
	
	vIndex = RefAPopup[0][2].lastIndexOf(',');
	vID = RefAPopup[0][2].substr(vIndex + 2);
	sLink = 'http://srv.vnexpress.net/Counter/?n='.concat(vID).concat('&u=').concat(escape(RefAPopup[0][1])).concat('&r=').concat(Math.random());
	var arrPara = RefAPopup[0][2].split(",");	
	openPopup(RefAPopup[0][0], sLink, 'Advertisment', arrPara[2], arrPara[9], arrPara[8], screen.height - arrPara[9] - 80, (screen.width - 770)/2 + 410 - 5, false);
}


function ShowPopupUnder()
{
	if (typeof(RefUPopup) == 'undefined')
		return;
	
	if (RefUPopup.length==0)
		return;
	
	if(VirtualFolder != CurrentFolder) 
		return;
	
	vIndex = RefUPopup[0][2].lastIndexOf(',');
	vID = RefUPopup[0][2].substr(vIndex + 2);
	sLink = 'http://srv.vnexpress.net/Counter/?n='.concat(vID).concat('&u=').concat(escape(RefUPopup[0][1])).concat('&r=').concat(Math.random());
	var arrPara = RefUPopup[0][2].split(",");
	openPopup(RefUPopup[0][0], sLink, 'Advertisment Popup', arrPara[2], arrPara[8], arrPara[9], 0, 0, true);
}

function AddLineSpace(height)
{
	document.writeln('<tr><td class=BreakLine height=', (typeof(height)=='undefined' ? 1 : height), '></td></tr>');
}

function ShowMenuAd(vAd)
{
	var i;
	if (typeof(RefAdMenu) == 'undefined') return;
	if (RefAdMenu.length==0) return;
	if (typeof(vAd) == 'undefined') vAd = 0;
	var vCheckShow = 0;
	
	for (i=0; i < RefAdMenu.length; i++)
	{
		w = 130;
		h = RefAdMenu[i][4];
		vCheckShow=RefFooter[CurFooter][6];
		if (vCheckShow == 3 && vAd < 4) vCheckShow = 0	
		if (vCheckShow == vAd || vCheckShow == 0)		
		{
			if (RefFooter[CurFooter][1] != '')
			{
				document.writeln('<tr><td colspan=2><a href="', RefAdMenu[i][1], '" onClick="return openMeExt(this, ', RefAdMenu[i][2], ', 1)"><img align=center src="', PageHost.concat(RefAdMenu[i][0]), '" width=', w, ' height=', h, ' border=0></a></td></tr>');
				AddLineSpace();					
			}
			else
			{
				document.writeln('<tr><td colspan=2><a href="', RefAdMenu[i][1], '" onClick="return false"><img align=center src="', PageHost.concat(RefAdMenu[i][0]), '" width=', w, ' height=', h, ' border=0></a></td></tr>');
				AddLineSpace();	
			}		
		}
	}
}

/*
function ShowFooterAd()
{
	function FooterAdRef(vID)
	{
		if (typeof(RefFooter) == 'undefined')
		{
			return '<table border=1 cellpadding=10 width="100%" height='.concat((vID==0 || vID==4) ? 130: 60).concat('><tr><td class=ColTitle><a href="http://vnexpress.net/Advertising" class=PnLTitle>D&#224;nh cho Qu&#7843;ng c&#225;o</a></td></tr></table>');
		}

		if (RefFooter[vID][1] != '')
		{
			return '<a href="'.concat(RefFooter[vID][1]).concat('" onClick="return openMeExt(this, ').concat(RefFooter[vID][2]).concat(', 1)"><img src="').concat(PageHost).concat(RefFooter[vID][0]).concat('" border=0 width=130 height=60></a>');
		}
		else
		{
			return '<img src="'.concat(PageHost).concat(RefFooter[vID][0]).concat('" border=0 width=130 height=60>');
		}
	}

	document.writeln('<table border=0 cellpadding=0 cellspacing=0 width=770 height=136>');
	document.writeln('<tr>');
	document.writeln('<td>');
	document.writeln('<table border=0 cellpadding=0 cellspacing=0 width=770 height=130>');
	document.writeln('<tr>');
	document.writeln('<td rowspan=2 width=130>', FooterAdRef(0), '</td>');
	document.writeln('<td class=BreakLine rowspan=2 width=10>&nbsp;</td>');
	document.writeln('<td width=130 valign=top>', FooterAdRef(1), '</td>');
	document.writeln('<td class=BreakLine rowspan=2 width=10>&nbsp;</td>');
	document.writeln('<td width=130 valign=top>', FooterAdRef(2), '</td>');
	document.writeln('<td class=BreakLine rowspan=2 width=10>&nbsp;</td>');
	document.writeln('<td width=130 valign=top>', FooterAdRef(3), '</td>');
	document.writeln('<td class=BreakLine rowspan=2 width=10>&nbsp;</td>');
	document.writeln('<td rowspan=2 width=210>', FooterAdRef(4), '</td>');
	document.writeln('</tr>');
	document.writeln('<tr>');
	document.writeln('<td width=130 valign=bottom>', FooterAdRef(5), '</td>');
	document.writeln('<td width=130 valign=bottom>', FooterAdRef(6), '</td>');
	document.writeln('<td width=130 valign=bottom>', FooterAdRef(7), '</td>');
	document.writeln('</tr>');
	document.writeln('</table>');
	document.writeln('</td>');
	document.writeln('</tr>');
	document.writeln('</table>');
}
*/

function ShowFooterAd(vAd)
{
	if (typeof(RefFooter) == 'undefined') return;
	if (typeof(vAd) == 'undefined') vAd = 0;
	var vCheckShow = 0;
	var vCheckShowTemp = 0;
	var strFooter = '';
	
	CurFooter=Math.floor(Math.random()*12321) % RefFooter.length;
	FooterLnk = document.links.length;
	vCheckShow=RefFooter[CurFooter][6];
	if (vCheckShow == 3 && vAd < 4) vCheckShow = 0
	
	if (vCheckShow == vAd || vCheckShow == 0)		
	{
		if (RefFooter[CurFooter][1] != '')
		{
			strFooter += '<a href="'.concat(RefFooter[CurFooter][1]).concat('" onClick="return openMeExt(this, ').concat(RefFooter[CurFooter][2]).concat(', 1)"><img name="FooterBanner" src="').concat(PageHost).concat(RefFooter[CurFooter][0]).concat('" border=0></a>');
		}
		else
		{
			strFooter += '<img name="FooterBanner" src="'.concat(PageHost).concat(RefFooter[CurFooter][0]).concat('" border=0>');
		}		
	}
	else
	{
		for (i=0; i < RefFooter.length; i++)
		{
			vCheckShowTemp = RefFooter[i][6];
			if (vCheckShowTemp == 3 && vAd < 4) vCheckShowTemp = 0
			if (vCheckShowTemp == vAd || vCheckShowTemp == 0) 
			{
				CurFooter = i;
				if (RefFooter[CurFooter][1] != '')
				{
					strFooter += '<a href="'.concat(RefFooter[i][1]).concat('" onClick="return openMeExt(this, ').concat(RefFooter[i][2]).concat(', 1)"><img name="FooterBanner" src="').concat(PageHost).concat(RefFooter[i][0]).concat('" border=0></a>');
				}
				else
				{
					strFooter += '<img name="FooterBanner" src="'.concat(PageHost).concat(RefFooter[i][0]).concat('" border=0>');
				}	
				break;
			}
		}		
	}
	
	if (strFooter != '')
	{
		document.writeln('<table border=0 cellpadding=0 cellspacing=0 width=770 height=136>');
		document.writeln('<tr>');
		document.writeln('<td>', strFooter ,'</td>');
		document.writeln('</td>');
		document.writeln('</tr>');
		document.writeln('</table>');
		setInterval('ChangeFooterAd(' + vAd + ')', 15000);
	}
}


function ChangeFooterAd(vAd)
{
	if (RefFooter.length==0) return;
	var vCheckShow = 0;
	var vCheckShowTemp = 0;
	var d = 0;
	CurFooter++;

	if (CurFooter >= RefFooter.length) CurFooter=0;
	vCheckShow = RefFooter[CurFooter][6];

	if (vCheckShow == 3 && vAd < 4) vCheckShow = 0;

	if (vCheckShow != vAd && vCheckShow != 0) 
	{
		for (i=CurFooter; i < RefFooter.length; i++)
		{
			vCheckShowTemp = RefFooter[i][6]
			if (vCheckShowTemp == 3 && vAd < 4) vCheckShowTemp = 0
			if (vCheckShowTemp == vAd || vCheckShowTemp == 0) 
			{
				break;
			}	
			else
			{
				CurFooter++;
			}
		}
	}
	
	if (CurFooter >= RefFooter.length) CurFooter=0;
	document.links[FooterLnk].href= RefFooter[CurFooter][1];
	if (RefFooter[CurFooter][0].substr(0,7).toLowerCase()=='http://'){
		document.images['FooterBanner'].src = RefFooter[CurFooter][0];
	}
	else
	{
		document.images['FooterBanner'].src = PageHost.concat(RefFooter[CurFooter][0]);
	}
	if (RefFooter[CurFooter][1] == '')
	{
		document.links[FooterLnk].onclick = function() { return false; };
	}
	else
	{
		document.links[FooterLnk].onclick = function() { return eval('openMeExt(this, '.concat(RefFooter[CurFooter][2]).concat(', 1)')); };
	}
}