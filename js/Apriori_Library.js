function TitleCase(STRING){var Exceptions = "About/about|Above/above|Across/across|After/after|Against/against|Around/around|At/at|Before/before|Behind/behind|Below/below|Beneath/beneath|Beside/beside|Besides/besides|Between/between|Beyond/beyond|By/by|Down/down|During/during|Except/except|For/for|From/from|In/in|Inside/inside|Into/into|Like/like|Near/near|Of/of|Off/off|On/on|Out/out|Outside/outside|Over/over|Since/since|Through/through|Throughout/throughout|Till/till|To/to|Toward/toward|Under/under|Until/until|Up/up|Upon/upon|With/with|Without/without";var arrExceptions = Exceptions.split("|");STRING = PCase(STRING);var arrExValues;

for(var iEx = 0; iEx < arrExceptions.length;iEx++){
arrExValues = arrExceptions[iEx].split("/");
var SearchThisValue = " " + arrExValues[0] + " ";
var ReplaceThisValue = " " + arrExValues[1] + " ";
while(STRING.indexOf(SearchThisValue)>-1){
STRING = STRING.replace(SearchThisValue,ReplaceThisValue);
}

}

return STRING;
} //End Function

function Eval(STRING){
eval(STRING);
}

function GetDate(FORMAT){
var m_TODAY = new Date();
var m_Day = m_TODAY.getDate();
var m_Month = (m_TODAY.getMonth()+1)
var MY_DATE = m_Day + "/" + m_Month + "/" + m_TODAY.getYear();

if(!FORMAT){
FORMAT = "mm/dd/yyyy";
MY_DATE = m_Month + "/" + m_Day + "/" + m_TODAY.getYear();
}
MY_DATE = FormatDate(MY_DATE,FORMAT);
return MY_DATE;
}


function strComp(STRING1,STRING2,COMPARE){
if(IsNull(COMPARE)){
COMPARE = 1;
}
if(CBool(COMPARE)){
STRING1 = STRING1.toLowerCase();
STRING2 = STRING2.toLowerCase();
}

if(STRING1==STRING2){
return true;
}else
{
return false;
}
}


function IsNull(ITEM){
if(ITEM == null || ITEM == undefined){
return true;
}
return false;
}


function IsArray(MY_ARRAY){
MY_ARRAY = MY_ARRAY.constructor.toString();
if(InStr(MY_ARRAY,"Array") > 0){
return true;
}
else{
return false;
}
}


function CreateObject(STRING){
var MY_OBJECT = new ActiveXObject(STRING);
return MY_OBJECT
}


function FormatPercent(NUMBER,PLACES){
NUMBER = NUMBER * 100
if(PLACES){
NUMBER = Round(NUMBER,PLACES);
}
else{
NUMBER = Round(NUMBER,2);
NUMBER = FormatCurrency(NUMBER);
}

NUMBER += "%";
return NUMBER;
}


function PCase(STRING){
var strReturn_Value = "";
var iTemp = STRING.length;
if(iTemp==0){
return"";
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


} //End For

return strReturn_Value;

}


function Now(){
var NOW = new Date().toString();
var arrNOW = NOW.split("UTC")
NOW = arrNOW[0];
return NOW;
}

function FormatCurrency(FIGURE){
if(!FIGURE||FIGURE==""){
return "0.00";
}
var strTemp = FIGURE.toString();
while(strTemp.indexOf(",") > -1){
strTemp = strTemp.replace(",","");
}

strTemp = parseFloat(strTemp);

FIGURE = Round(FIGURE,2);
FIGURE = FIGURE.toString();
var Place = FIGURE.indexOf(".");
if(Place >-1){
	if((FIGURE.length - Place) == 2){
	FIGURE += "0";
	}
}
else{
FIGURE += ".00";
}

if(FIGURE=="0.00"){
return"";
}

return FIGURE;

}



function Round(NUMBER,PLACES){
if(!IsNumeric(NUMBER)){
return "0";
}
NUMBER = CStr(NUMBER);
arrNUMBER = NUMBER.split(".");
if(arrNUMBER.length==1){return NUMBER;}
if(PLACES){
NUMBER = Math.round(NUMBER*Math.pow(10,PLACES))/Math.pow(10,PLACES);
}
else{
NUMBER = Math.round(NUMBER);
}
return NUMBER;
}


function Join(ARRAY,DELIMITER){
ARRAY = ARRAY.toString();
if(DELIMITER){
ARRAY = Replace(ARRAY,",",DELIMITER);
}
else{
ARRAY = Replace(ARRAY,","," ");
}

return ARRAY;
}


function FormatDate(DateToFormat,FormatAs){
if(DateToFormat==""){return"";}
if(!FormatAs){FormatAs="dd/mm/yyyy";}

var strReturnDate;
FormatAs = FormatAs.toLowerCase();
DateToFormat = DateToFormat.toLowerCase();
var arrDate
var arrMonths = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
var strMONTH;
var Separator;

while(DateToFormat.indexOf("st")>-1){
DateToFormat = DateToFormat.replace("st","");
}

while(DateToFormat.indexOf("nd")>-1){
DateToFormat = DateToFormat.replace("nd","");
}

while(DateToFormat.indexOf("rd")>-1){
DateToFormat = DateToFormat.replace("rd","");
}

while(DateToFormat.indexOf("th")>-1){
DateToFormat = DateToFormat.replace("th","");
}

if(DateToFormat.indexOf(".")>-1){
Separator = ".";
}

if(DateToFormat.indexOf("-")>-1){
Separator = "-";
}


if(DateToFormat.indexOf("/")>-1){
Separator = "/";
}

if(DateToFormat.indexOf(" ")>-1){
Separator = " ";
}

arrDate = DateToFormat.split(Separator);
DateToFormat = "";
	for(var iSD = 0;iSD < arrDate.length;iSD++){
		if(arrDate[iSD]!=""){
		DateToFormat += arrDate[iSD] + Separator;
		}
	}
DateToFormat = DateToFormat.substring(0,DateToFormat.length-1);
arrDate = DateToFormat.split(Separator);

if(arrDate.length < 3){
return "";
}

var DAY = arrDate[0];
var MONTH = arrDate[1];
var YEAR = arrDate[2];




if(parseFloat(arrDate[1]) > 12){
DAY = arrDate[1];
MONTH = arrDate[0];
}

if(parseFloat(DAY) && DAY.toString().length==4){
YEAR = arrDate[0];
DAY = arrDate[2];
MONTH = arrDate[1];
}


for(var iSD = 0;iSD < arrMonths.length;iSD++){
var ShortMonth = arrMonths[iSD].substring(0,3).toLowerCase();
var MonthPosition = DateToFormat.indexOf(ShortMonth);
	if(MonthPosition > -1){
	MONTH = iSD + 1;
		if(MonthPosition == 0){
		DAY = arrDate[1];
		YEAR = arrDate[2];
		}
	break;
	}
}

var strTemp = YEAR.toString();
if(strTemp.length==2){

	if(parseFloat(YEAR)>40){
	YEAR = "19" + YEAR;
	}
	else{
	YEAR = "20" + YEAR;
	}

}


	if(parseInt(MONTH)< 10 && MONTH.toString().length < 2){
	MONTH = "0" + MONTH;
	}
	if(parseInt(DAY)< 10 && DAY.toString().length < 2){
	DAY = "0" + DAY;
	}
	switch (FormatAs){
	case "dd/mm/yyyy":
	return DAY + "/" + MONTH + "/" + YEAR;
	case "mm/dd/yyyy":
	return MONTH + "/" + DAY + "/" + YEAR;
	case "dd/mmm/yyyy":
	return DAY + " " + arrMonths[MONTH -1].substring(0,3) + " " + YEAR;
	case "mmm/dd/yyyy":
	return arrMonths[MONTH -1].substring(0,3) + " " + DAY + " " + YEAR;
	case "dd/mmmm/yyyy":
	return DAY + " " + arrMonths[MONTH -1] + " " + YEAR;	
	case "mmmm/dd/yyyy":
	return arrMonths[MONTH -1] + " " + DAY + " " + YEAR;
	}

return DAY + "/" + strMONTH + "/" + YEAR;;


}




function IsDate(DateToCheck){
if(DateToCheck==""){return true;}
var m_strDate = FormatDate(DateToCheck);
if(m_strDate==""){
return false;
}
var m_arrDate = m_strDate.split("/");
var m_DAY = m_arrDate[0];
var m_MONTH = m_arrDate[1];
var m_YEAR = m_arrDate[2];
if(m_YEAR.length > 4){return false;}
m_strDate = m_MONTH + "/" + m_DAY + "/" + m_YEAR;
var testDate=new Date(m_strDate);
if(testDate.getMonth()+1==m_MONTH){
return true;
} 
else{
return false;
}
}//end function



function IsNumeric(VALUE){
for(var ivA = 0; ivA < VALUE.length;ivA ++){
if(VALUE.charCodeAt(ivA) < 48 || VALUE.charCodeAt(ivA) > 57){
	if(VALUE.charCodeAt(ivA) != 46 && VALUE.charCodeAt(ivA) != 32 && VALUE.charAt(ivA) != ","){
	return false;
	}
}																					
}
return true;
}



function Asc(CHARACTER){

return CHARACTER.charCodeAt(0)

}


function Chr(CHARACTER_CODE){

return String.fromCharCode(CHARACTER_CODE);

}


function CInt(NUMBER){
return parseInt(NUMBER);
}


function CStr(VALUE){
return VALUE.toString();
}


function CSng(NUMBER){
return parseFloat(NUMBER);
}

function CDbl(NUMBER){
return parseFloat(NUMBER);
}

function CBool(VALUE){
VALUE = new String(VALUE);
VALUE = VALUE.toLowerCase();
if(VALUE== "1" || VALUE=="-1" || VALUE=="true" || VALUE == "yes"){
return true;
}
else{
return false;
}
}


function InStr(STRING,SUBSTRING,COMPARE,START){
if(START){
STRING = STRING.substring(START,STRING.length);
}
if(CBool(COMPARE) || COMPARE ==undefined){
STRING = STRING.toLowerCase();
SUBSTRING = SUBSTRING.toLowerCase();
}
if(STRING.indexOf(SUBSTRING) > -1){
return STRING.indexOf(SUBSTRING)
}
else{
return 0;
}
}


function LCase(STRING){
return STRING.toLowerCase();
}


function Left(STRING,CHARACTER_COUNT){
return STRING.substring(0,CHARACTER_COUNT);
}


function Len(STRING){
return STRING.length;
}


function Mid(STRING,START,END){
if(!START){START=0};
if(!END || END > STRING.length){END=STRING.length};
if(END!=STRING.length){END = START + END};
return STRING.substring(START,END);
}


function Replace(STRING,REPLACE_THIS,REPLACE_WITH){
while(STRING.indexOf(REPLACE_THIS) > -1){
STRING = STRING.replace(REPLACE_THIS,REPLACE_WITH);
}
return STRING;
}


function Right(STRING,CHARACTER_COUNT){

return STRING.substring((STRING.length - CHARACTER_COUNT),STRING.length);

}


function Split(STRING,CHARACTER){
return STRING.split(CHARACTER);
}


function Sqr(NUMBER){
return NUMBER * NUMBER
}


function Trim(STRING){
STRING = LTrim(STRING);
return RTrim(STRING);
}

function RTrim(STRING){
while(STRING.charAt((STRING.length -1))==" "){
STRING = STRING.substring(0,STRING.length-1);
}
return STRING;
}


function LTrim(STRING){
while(STRING.charAt(0)==" "){
STRING = STRING.replace(STRING.charAt(0),"");
}
return STRING;
}


function UBound(ARRAY){
if(IsArray(ARRAY)){
return ARRAY.length;
}
else{
return;
}
}


function UCase(STRING){
return STRING.toUpperCase();
}


function UNESCAPE(U_VALUE){
U_VALUE = unescape(U_VALUE);
while(U_VALUE.indexOf("+") > -1){
U_VALUE = U_VALUE.replace("+", " ");
}
return U_VALUE;
}

var vbCrLf = String.fromCharCode(13) + String.fromCharCode(10);
var vbTab = "	";