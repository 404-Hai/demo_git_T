//===================================== Check mail valid =======================================
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
	var adate=FormatDate(document.booking.adate.value,'dd/mm/yyyy');	
	var ddate=FormatDate(document.booking.ddate.value,'dd/mm/yyyy');		
	var today = GetDate('dd/mm/yyyy')	
	if (adate=="")
	{
		alert("Your booking is uncompleted, please fill in to blank space(s)!");
		document.booking.adate.focus();
		return false;		
	}
	if (adate<today)
	{
		alert("Please reset Arrival!");
		document.booking.adate.focus();
		return false;	
	}
	if (ddate=="")
	{
		alert("Your booking is uncompleted, please fill in to blank space(s)!");
		document.booking.ddate.focus();
		return false;
	}
	if (ddate < today+1)
	{
		alert("Departure False!");
		document.booking.ddate.focus();
		return false;
	}
	if (document.booking.yourname.value=="")
	{
		alert("Your booking is uncompleted, please fill in to blank space(s)!");
		document.booking.yourname.focus();
		return false;
	}
	if(document.booking.email.value==""){
		alert("Your booking is uncompleted, please fill in to blank space(s)!")
		document.booking.email.focus();
		return false;
	}
	if (validateEmail(document.booking.email.value)){
		alert("Invalid your Email !")
		document.booking.email.focus();
		return false;
	}	
	if(document.booking.typecard.value==""){
		alert("Your booking is uncompleted, please fill in to blank space(s)!")
		document.booking.typecard.focus();
		return false;
	}
	if(document.booking.cardnumber.value==""){
		alert("Your booking is uncompleted, please fill in to blank space(s)!")
		document.booking.cardnumber.focus();
		return false;
	}
	if(document.booking.stopdate.value==""){
		alert("Your booking is uncompleted, please fill in to blank space(s)!")
		document.booking.stopdate.focus();
		return false;
	}	
return true;
}
//============================================================================================================
function checkContact()
{
	if (document.frmMain.txtEmail.value=="")
	{
		alert("Your booking is uncompleted, please fill in to blank space(s)!");
		document.frmMain.txtEmail.focus();
		return false;
	}
	if (validateEmail(document.frmMain.txtEmail.value)){
		alert("Invalid your Email !")
		document.frmMain.txtEmail.focus();
		return false;
	}	
	if (document.frmMain.txtHoTen.value=="")
	{
		alert("Your booking is uncompleted, please fill in to blank space(s)!");
		document.frmMain.txtHoTen.focus();
		return false;
	}
	if (document.frmMain.txtDiaChi.value=="")
	{
		alert("Your booking is uncompleted, please fill in to blank space(s)!");
		document.frmMain.txtDiaChi.focus();
		return false;
	}	
return true;
}

//===================================== Check form Send Link =======================================
function formSubmit() {
	
	if (document.frm.cname.value=="")
	{
		alert("Your booking is uncompleted, please fill in to blank space(s)!");
		document.frm.cname.focus();
		return false;
	}
	if (document.frm.cemail.value=="")
	{
		alert("Your booking is uncompleted, please fill in to blank space(s)!");
		document.frm.cemail.focus();
		return false;
	}
	if (validateEmail(document.frm.cemail.value)){
		alert("Invalid your Email !")
		document.frm.cemail.focus();
		return false;
	}	

	if (document.frm.linktitle.value=="")
	{
		alert("Your booking is uncompleted, please fill in to blank space(s)!");
		document.frm.linktitle.focus();
		return false;
	}
	//Check Site URL is valid length
	if (frm.linkurl.value.length < 12) {
		alert("Site URL is invalid")
		return false;
	}

	//Check Site URL contains a dot
	var dot = false
	for (var i=0; i < frm.linkurl.value.length; i++) {
		if (frm.linkurl.value.charAt(i) == ".")  var dot = true
	}
	
	if (!dot) {
		alert("Invalid Site URL")
		return false;
	}	
	if (document.frm.linkdesc.value=="")
	{
		alert("Your booking is uncompleted, please fill in to blank space(s)!");
		document.frm.linkdesc.focus();
		return false;
	}
	return true;
}

