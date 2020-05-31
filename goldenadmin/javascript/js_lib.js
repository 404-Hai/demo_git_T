/////////////////////////////////////////////////////////////////////////////////////////////////
function selectAll(objForm){
	intTotal = objForm.chkTotal.value;
	for(intCount = 0; intCount < intTotal; intCount++){
		eval('chkNum = objForm.chk' + intCount);
		if(chkNum.checked)
			chkNum.checked = false;
		else
			chkNum.checked = true;
	}
	return false;
}
/////////////////////////////////////////////////////////////////////////////////////////////////
function ProperControl(objControl){
	objControl.value = ProperCase(objControl.value);
}
/////////////////////////////////////////////////////////////////////////////////////////////////
function ProperCase(STRING){
	var strReturn_Value = "";
	while(STRING.search("  ")!= -1){
		STRING = STRING.replace("  ", " ");
	}
	var iTemp = STRING.length;
	if(iTemp==0){
		return "";
	}
	var UcaseNext = false;
	strReturn_Value += STRING.charAt(0).toUpperCase();
	for(var iCounter=1;iCounter < iTemp;iCounter++){
		if(UcaseNext == true){
			strReturn_Value += STRING.charAt(iCounter).toUpperCase();
		}
		else{
			strReturn_Value += STRING.charAt(iCounter).toLowerCase();
		}
		var iChar = STRING.charCodeAt(iCounter);
		if(iChar == 32 || iChar == 45 || iChar == 46){
			UcaseNext = true;
		}
		else{
			UcaseNext = false
		}
		if(iChar == 99 || iChar == 67){
			if(STRING.charCodeAt(iCounter-1)==77 || STRING.charCodeAt(iCounter-1)==109){
				UcaseNext = true;
			}
		}
	}
	return strReturn_Value;
}
////////////////////////////////////////////////////////////////////////////////
function IsDate(strValue){

	if(IsEmpty(strValue))
		return true;


	var arrDate = strValue.split("/");
	if(arrDate.length < 3)
		return false;
	var strDay = arrDate[0];
	var strMonth = arrDate[1];
	var strYear = arrDate[2];
	if(strYear.charAt(0) != 1&&strYear.charAt(0) != 2){
		if(strYear.charAt("0") == 0){
			strYear = "20" + strYear;
		}
		else{
			strYear = "19" + strYear;
		}
	}
	var strDate = strMonth + "/" + strDay + "/" + strYear;
	var testDate = new Date(strDate);
	if(testDate.getYear() < 90 || testDate.getYear() > 2010){
		return false;
	}
	if(testDate.getMonth() + 1 == strMonth){
		return true;
	} 
	else{
		return false;
	}
	
}
////////////////////////////////////////////////////////////////////////////////
function FormatVietnameseDate(strValue){
	var arrDate = strValue.split("/");
	var strDay = arrDate[0];
	var strMonth = arrDate[1];
	var strYear = arrDate[2];
	var strDate = strMonth + "/" + strDay + "/" + strYear;
	return new Date(strDate);	
}

////////////////////////////////////////////////////////////////////////////////
function DateDiff(strValue1, strValue2){
	if(IsEmpty(strValue2))
		return 0;
	var testDate1 = FormatVietnameseDate(strValue1);
	var testDate2 = FormatVietnameseDate(strValue2);
	if(testDate1 > testDate2)
		return 1;
	else
		return -1;
}
////////////////////////////////////////////////////////////////////////////////
function IsNumeric(strValue){
	if(IsEmpty(strValue))
		return true;
	var strValidChars = "0123456789.,-";
	var intCount; 
	var intDecimal;
	var intNumber;
	intDecimal = 0;
	intNumber = 0;
	for(intCount = 0; intCount < strValue.length; intCount++){
		if(strValidChars.indexOf(strValue.charAt(intCount)) == -1) 
			return false;
		if(strValue.charAt(intCount) == "."||strValue.charAt(intCount) == ","||strValue.charAt(intCount) == "-")
			intDecimal++;
		else
			intNumber++;		
		if(intDecimal > 1)
			return false;
	}
	if(intNumber < 1)
		return false;
	return true;	   
}
////////////////////////////////////////////////////////////////////////////////
function CommaReplacement(fltValue){
	var strValue = new String(fltValue);
	strValue = strValue.replace(",", ".");
	return parseFloat(strValue);
}
////////////////////////////////////////////////////////////////////////////////
function RoundFloat(fltValue, intDecimal){
	var fltDecimal;
	var intIntegerPart;
	var strDecimal;
	intIntegerPart = Math.floor(fltValue);
	fltDecimal = fltValue - intIntegerPart;
	fltDecimal = Math.round(fltDecimal*1000);
	fltDecimal = fltDecimal/1000;
	if(Math.round(fltDecimal) == fltDecimal)
		return (intIntegerPart + fltDecimal);
	else{
		strDecimal = new String(fltDecimal.toString());
		strDecimal = strDecimal.substr(2)
		return parseFloat(intIntegerPart.toString() + "." + strDecimal);
	}
}
////////////////////////////////////////////////////////////////////////////////
function StringFloat(fltValue, intDecimal){
	var strFormat = new String(fltValue);
	strFormat = strFormat.replace(".", ",")
	if(Math.round(fltValue) == fltValue){
		return strFormat + ",000";
	}
	if(Math.round(fltValue*10) == fltValue*10){
		return strFormat + "00";
	}	
	if(Math.round(fltValue*100) == fltValue*100){
		return strFormat + "0";
	}	
	return strFormat;
}
////////////////////////////////////////////////////////////////////////////////
function FormatFloat(fltValue, intDecimal){
	return StringFloat(RoundFloat(fltValue, intDecimal), intDecimal)
}
////////////////////////////////////////////////////////////////////////////////
function IsInteger(strValue){
	if(IsEmpty(strValue))
		return true;
	var strValidChars = "0123456789-";
	var intCount; 
	for(intCount = 0; intCount < strValue.length; intCount++){
		if(strValidChars.indexOf(strValue.charAt(intCount)) == -1) 
			return false;
	}
	return true;	   
}
////////////////////////////////////////////////////////////////////////////////
function IsEmpty(strValue){
	if(strValue=="")
		return true;
	var strValueTest = new String(strValue);
	while(strValueTest.search(" ")!= -1)
		strValueTest = strValueTest.replace(" ", "");
	return (strValueTest.length== 0);
}
////////////////////////////////////////////////////////////////////////////////
function ConvertProperName(strValue){
	if(strValue == "")
		return "";
	var strValueTest = new String(strValue);
	while(strValueTest.search("  ")!= -1)
		strValueTest = strValueTest.replace("  ", " ");
	if(strValueTest.charAt(0)== " ")
		strValueTest = strValueTest.substr(strValueTest, strValueTest.length - 1, 1);	
	return (strValueTest);
}
////////////////////////////////////////////////////////////////////////////////
function RemoveSpace(strValue){
	if(strValue == "")
		return "";
	var strValueTest = new String(strValue);
	while(strValueTest.search(" ")!= -1)
		strValueTest = strValueTest.replace(" ", "");
	return (strValueTest);
}
////////////////////////////////////////////////////////////////////////////////
function ReplaceString(strValue, strStringFind, strStringReplace){
	if(strValue == "")
		return "";
	var strValueTest = new String(strValue);
	while(strValueTest.search(strStringFind)!= -1)
		strValueTest = strValueTest.replace(strStringFind, strStringReplace);
	return (strValueTest);
}
////////////////////////////////////////////////////////////////////////////////
function RemoveCharacter(strValue, strCharacter){
	if(strValue == "")
		return "";
	var strValueTest = new String(strValue);
	while(strValueTest.search(strCharacter)!= -1)
		strValueTest = strValueTest.replace(strCharacter, "");
	return (strValueTest);
}
////////////////////////////////////////////////////////////////////////////////
function ConvertFileName(strValue){
	if(strValue == "")
		return "";
	var strValue;
	strValue = RemoveCharacter(strValue, " ");
	strValue = RemoveCharacter(strValue, "-");
	return (strValueTest);
}
///////////////////////////////////////////////////////////////////////////////////////////////

function doNavigate(strNavigatorList, strUrl, strActionType, intActionValue){
	if(strActionType == "Row")
		strUrl = "navigator.asp?NavigatorType=Navigate&NavigateAction=" + strUrl + "&DisplayRows=" + intActionValue + "&NavigatorList=" + strNavigatorList;
	if(strActionType == "Page")
		strUrl = "navigator.asp?NavigatorType=Navigate&NavigateAction=" + strUrl + "&DisplayPage=" + intActionValue +  "&NavigatorList=" + strNavigatorList;
	location.href = strUrl;
}
///////////////////////////////////////////////////////////////////////////////////////////////

function jumpPage(strNavigatorList, strUrl, intstrPage){
	strUrl = "navigator.asp?NavigatorType=Navigate&NavigateAction=" + strUrl + "&DisplayPage=" + intstrPage +  "&NavigatorList=" + strNavigatorList;
	location.href = strUrl;
}
function BrowseImage(strControlName, strCategory, strFileName){
	window.open("image-upload.asp?Category=" + strCategory +"&ControlName=" + strControlName + "&FileName=" + strFileName, "imgView", "top=50,left=100,width=650,height=450,status=no,menubar=no,scrollable=no,resizable=no,scrollbars=no");
}
function viewImage(strLocation, strCaption){
	window.open("image-view.asp?Location=" + strLocation + "&Caption=" + strCaption, "imgView", "top=1,left=1,width=1,height=1,status=no,statusbar:no,menubar=no,scrollable=no,resizable=no,scrollbars=no");
}
///////////////
function OpenDictionaryAdmin(strDictionName){
	window.open("dictionary-admin.asp?Dictionary=" + strDictionName)
}
/////////////////////////////////////////////////////////////
function AddToFavorit(strDomain)
{
	window.external.AddFavorite(strDomain, "Vietnam Paradise Travel");
}
