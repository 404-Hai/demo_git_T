<!--
				// Author: Ron Grafe grafer@columbus.rr.com http://www.gdevresources.com/Pages/Scripts/Dynamicscroller/Dynamicscroller.htm
				// Courtesy of SimplytheBest.net - http://simplythebest.net/scripts/
				var step=1
				if (iens6){
					document.write('</div></div>')
					var contentobj=document.getElementById? document.getElementById("content") : document.all.content
					var contentheight=contentobj.offsetHeight
					if (document.getElementById&&!document.all){
						step=135
					}
				}
				else if(ns4){
					var contentobj=document.nscontainer.document.nscontent
					var contentheight=contentobj.clip.height
				}
				<!-- scroll down function -->
				function scrolldown() {
					if(window.scrolltimerup){
						clearTimeout(scrolltimerup)
					}
					if(iens6&&parseInt(contentobj.style.top)>=(contentheight*(-1)+100)){
						contentobj.style.top=parseInt(contentobj.style.top)-step
					}else if(ns4&&contentobj.top>=(contentheight*(-1)+100)){
						contentobj.top-=step
					}
					scrolltimerdown = setTimeout("scrolldown()",scrollspeed)
				}
				<!-- scroll up function -->
				function scrollup() {
					if(window.scrolltimerdown){
						clearTimeout(scrolltimerdown)
					}
					if(iens6&&parseInt(contentobj.style.top)<=0){
						contentobj.style.top=parseInt(contentobj.style.top)+step
					}else if(ns4&&contentobj.top<=0){ 
						contentobj.top+=step
					}
					scrolltimerup = setTimeout("scrollup()",scrollspeed)	
				}
				<!-- function to stop all scroll timers -->
				function stopall() {
					if(window.scrolltimerup){
						clearTimeout(scrolltimerup)
					}
					if(window.scrolltimerdown){
						clearTimeout(scrolltimerdown)
					}
				}
				<!-- function that shifts the object to top -->
				function shifttotop(){
					stopall()
					if (iens6) {
						contentobj.style.top=0
					}else{
						contentobj.top=0
					}
				}
				
				function getcontent_height(){
					if (iens6)
					contentheight=contentobj.offsetHeight
				}
				window.onload=getcontent_height
			-->	