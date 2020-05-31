function Popup(url,name,width,height) {
  var winX = 0;
  var winY = 0;
  var w = width;
  var h = height;
  // only set new values if 4.0 browser
  if (parseInt(navigator.appVersion) >= 4) {
    winX = (screen.availWidth - w)*.5;
    winY = (screen.availHeight - h)*.5;
  }
  popupWin = window.open(url, name, 'resizable=yes, width=' + w + ',height=' + h + ',left=' + winX + ',top=' + winY);
}

//-------------Check mail----------------

function validateEmail(emailad) {

var exclude=/[^@\-\.\w]|^[_@\.\-]|[\._\-]{2}|[@\.]{2}|(@)[^@]*\1/;
var check=/@[\w\-]+\./;
var checkend=/\.[a-zA-Z]{2,3}$/;

	if(((emailad.search(exclude) != -1)||(emailad.search(check)) == -1)||(emailad.search(checkend) == -1)){
		return true;
	}
	else {
		return false;
	}
}
//-------------Check mail----------------

function Checkmail(form) {
		
		
			if(form.Email.value==""){
			alert("Enter your email !")
				form.Email.focus();
				return false;
			}
			if (validateEmail(form.Email.value)){
				alert("Email incorrect!\nPlease enter email: yourname@hostserver.com !")
				form.Email.focus();
				return false;
			}
				
			else {
				return true;
			}
		}

//Change Lang
function ChangeLang(x)
{
window.self.location='Lang.aspx?lang='+x;
}
