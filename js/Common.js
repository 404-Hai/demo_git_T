var is_ie = (navigator.userAgent.indexOf('MSIE') >= 0) ? 1 : 0; 
var is_ie5 = (navigator.appVersion.indexOf("MSIE 5.5")!=-1) ? 1 : 0; 
var is_opera = ((navigator.userAgent.indexOf("Opera6")!=-1)||(navigator.userAgent.indexOf("Opera/6")!=-1)) ? 1 : 0; 
var is_netscape = (navigator.userAgent.indexOf('Netscape') >= 0) ? 1 : 0; 

var Counter = 0;
var Interval = 1000;
var ShowStatus = false;	
	
window.setTimeout("FirstRefresh()", 1000);

function FirstRefresh()
{ 

	if (__AJAXObjectList == undefined)
		return;
	for (var i=0;i<__AJAXObjectList.length;i++)
	{
		if (__AJAXObjectList[i].NoOfPeriods == 0)
		{
			__AJAXObjectList[i].xmlHttpObj = GetXmlHttpObject(eval('CallBackHandler' + i));             
			//Send the xmlHttp get to the specified url 
			xmlHttp_Get(__AJAXObjectList[i].xmlHttpObj, __AJAXObjectList[i].URL); 
		}
		else
			ShowStatus = true;			
	}
	window.setTimeout("RefreshMe()", 1000);
}

function RefreshMe()
{ 
	if (__AJAXObjectList == undefined)
		return;
	for (var i=0;i<__AJAXObjectList.length;i++)
	{
		if ((__AJAXObjectList[i].NoOfPeriods>0) && (Counter%__AJAXObjectList[i].NoOfPeriods == 0))
		{
			__AJAXObjectList[i].xmlHttpObj = GetXmlHttpObject(eval('CallBackHandler' + i));             
			//Send the xmlHttp get to the specified url 
			xmlHttp_Get(__AJAXObjectList[i].xmlHttpObj, __AJAXObjectList[i].URL); 
		}
    }
	Counter = (Counter+1)%Periods;    
	if (ShowStatus)
		window.status="Tự động cập nhật sau "+(Periods - Counter)+" giây"
	window.setTimeout("RefreshMe()", Interval);    
}

//============ AJAXObject class =======================
function AJAXObject(ElementID, URL, NoOfPeriods) 
{
	this.ElementID = ElementID;
	this.URL = URL;	
	this.NoOfPeriods = NoOfPeriods;
	
}

// XMLHttp send GET request 
function xmlHttp_Get(xmlhttp, url) 
{ 
    xmlhttp.open('GET', url, true); 
    xmlhttp.send(null); 
} 

function GetXmlHttpObject(handler) 
{ 
    var objXmlHttp = null;    //Holds the local xmlHTTP object instance 
    //Depending on the browser, try to create the xmlHttp object 
    if (is_ie)
    { 
        //The object to create depends on version of IE 
        //If it isn't ie5, then default to the Msxml2.XMLHTTP object 
        var strObjName = (is_ie5) ? 'Microsoft.XMLHTTP' : 'Msxml2.XMLHTTP'; 
            
        //Attempt to create the object 
        try
        { 
            objXmlHttp = new ActiveXObject(strObjName); 
            objXmlHttp.onreadystatechange = handler; 
        } 
        catch(e)
        { 
        //Object creation errored 
            alert('IE detected, but object could not be created. Verify that active scripting and activeX controls are enabled'); 
            return; 
        } 
    } 
    else if (is_opera)
    { 
        //Opera has some issues with xmlHttp object functionality 
        alert('Opera detected. The page may not behave as expected.'); 
        return; 
    } 
    else
    { 
        // Mozilla | Netscape | Safari 
        objXmlHttp = new XMLHttpRequest(); 
        objXmlHttp.onload = handler; 
        objXmlHttp.onerror = handler; 
    } 
        
    //Return the instantiated object 
    return objXmlHttp; 
} 
function findPosX(obj)
{
    var curleft = 0;
    if(obj.offsetParent)
        while(1) 
        {
          curleft += obj.offsetLeft;
          if(!obj.offsetParent)
            break;
          obj = obj.offsetParent;
        }
    else if(obj.x)
        curleft += obj.x;
    return curleft;
}

function findPosY(obj)
{
    var curtop = 0;
    if(obj.offsetParent)
        while(1)
        {
          curtop += obj.offsetTop;
          if(!obj.offsetParent)
            break;
          obj = obj.offsetParent;
        }
    else if(obj.y)
        curtop += obj.y;
    return curtop;
}
