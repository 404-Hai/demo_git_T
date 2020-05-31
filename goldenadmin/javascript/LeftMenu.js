
    if (document.getElementById){
    document.write('<style type="text/css">\n')
    document.write('.option{display: none;}\n')
    document.write('</style>\n')
    }

 function SwitchMenu(obj){
	//Create 	
	createCookie('Menu',obj,1);
	
    	if(document.getElementById){
    	var el = document.getElementById(obj);
    	var ar = document.getElementById("masterdiv").getElementsByTagName("span");
    		if(el.style.display != "block"){
    			for (var i=0; i<ar.length; i++){
    				if (ar[i].className=="option")
    				ar[i].style.display = "none";
    			}
    			el.style.display = "block";
    		}else{
    			el.style.display = "none";
    			//Delete cookie
    			eraseCookie('Menu');
    		}
    	}
    }



function createCookie(name,value,days)
{
	if (days)
	{
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name)
{
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0){
			return c.substring(nameEQ.length,c.length);
			 }
	}
	return null;	
	
}

function LoadMenu(){
	var x = readCookie('Menu');

	if (x!=null){
		SwitchMenu(x);
		}
	}
function eraseCookie(name)
{
	createCookie(name,"",-1);
}



