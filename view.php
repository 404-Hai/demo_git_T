<?
$picName= $_REQUEST["pic"];
$FolderName = $_REQUEST["folder"];
?>
<html>
<script language='javascript'> 
   var arrTemp=self.location.href.split("?"); 
   var picUrl = (arrTemp.length>0)?arrTemp[1]:""; 
   var NS = (navigator.appName=="Netscape")?true:false; 

     function FitPic() { 
       iWidth = (NS)?
       window.innerWidth:document.body.clientWidth; 
       iHeight = (NS)?window.innerHeight:document.body.clientHeight; 
       iWidth = document.images[0].width - iWidth + 20; 
       iHeight = document.images[0].height - iHeight + 20; 
       window.resizeBy(iWidth, iHeight); 
       self.focus(); 
     }; 
 </script>
<head>

<title>Enlarge picture</title>
</head>

<body topmargin="0" leftmargin="0" onload =FitPic(); >
<table cellspacing="0" cellpadding="0" width="100%" height="100%">
<tr>
<td align="center" valign="middle">
 <script language='javascript'> 
 	var picUrl = (arrTemp.length>0)?arrTemp[1]:"";
 	document.write( "<img src='"+ picUrl + "' border=0>" ); 
 </script>
</td>
</tr>
</table>
</body>

</html>
