// With this divMenu object, 'false' means the menu elements are not nested.
var divMenu = new FSMenu('divMenu', false, 'visibility', 'visible', 'hidden');
divMenu.cssLitClass = 'highlighted';
</SCRIPT>
<script>
var slideShowSpeed = 2000
var crossFadeDuration = 3
var Pic = new Array() 
//<?php
	//$sql = "SELECT * FROM slideshow limit 7";
	//$result = mysql_query($sql,$cnn);
	//$row = mysql_fetch_array($result);
	//$i=0;
	//while($row=mysql_fetch_array($result))
	//{
//?>	
//Pic[<?=$i?>] = '<?=$row["img"];?>'
//<?
	//$i++;
	//}
//?>
Pic[0]='upload/slide/main_1.jpg';
Pic[1]='upload/slide/main_2.jpg';
Pic[2]='upload/slide/main_3.jpg';
Pic[3]='upload/slide/main_4.jpg';
Pic[4]='upload/slide/main_5.jpg';
Pic[5]='upload/slide/main_6.jpg';
Pic[6]='upload/slide/main_7.jpg';
var t
var j = 0
var p = Pic.length

var preLoad = new Array()
for (i = 0; i < p; i++){
   preLoad[i] = new Image()
   preLoad[i].src = Pic[i]
}

function runSlideShow(){
   if (document.all){
      document.images.SlideShow.style.filter="blendTrans(duration=2)"
      document.images.SlideShow.style.filter="blendTrans(duration=crossFadeDuration)"
      document.images.SlideShow.filters.blendTrans.Apply()      
   }
   document.images.SlideShow.src = preLoad[j].src
   if (document.all){
      document.images.SlideShow.filters.blendTrans.Play()
   }
   j = j + 1
   if (j > (p-1)) j=0
   t = setTimeout('runSlideShow()', slideShowSpeed)
}

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


function Checkmail(form1) {
		
	if(form1.mail.value==""){
	alert("Enter your email !")
		form1.mail.focus();
		return false;
	}
	 if (validateEmail(form1.mail.value)){
		alert("Email incorrect!")
		form1.mail.focus();
		return false;
	}
		
	else {
		return true;
	}
}