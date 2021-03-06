DropDownMenu.Registry = []
DropDownMenu.aniLen = 250
DropDownMenu.hideDelay = 100
DropDownMenu.minCPUResolution = 1
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function DropDownMenu(id, dir, left, top, right, width, height){
	this.ie = document.all ? 1 : 0
	this.ns4 = document.layers ? 1 : 0
	this.dom = document.getElementById ? 1 : 0
	if (this.ie || this.ns4 || this.dom){
		this.id = id
		this.dir = dir
		this.orientation = dir == "left" || dir == "right" ? "h" : "v"
		this.dirType = dir == "right" || dir == "down" ? "-" : "+"
		this.dim = this.orientation == "h" ? width : height
		this.hideTimer = false
		this.aniTimer = false
		this.open = false
		this.over = false
		this.startTime = 0
		this.gRef = "DropDownMenu_"+id
		eval(this.gRef+"=this")
		DropDownMenu.Registry[id] = this
		var d = document
		var strCSS = '<style type="text/css">';
		strCSS += '#' + this.id + 'Container { visibility:hidden; '

		if (left >= 0) {
		strCSS += 'left:' + left + 'px; '
		}
		else {
			strCSS += 'right:' + right + 'px; '
		}
		strCSS += 'top:' + top + 'px; '
		strCSS += 'overflow:hidden; z-index:10000; }'
		strCSS += '#' + this.id + 'Container, #' + this.id + 'Content { position:absolute; '
		strCSS += 'width:' + width + 'px; '
		strCSS += 'height:' + height + 'px; '
		strCSS += 'clip:rect(0 ' + width + ' ' + height + ' 0); '
		strCSS += '}'
		strCSS += '</style>'
		d.write(strCSS)
		this.load()
	}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
DropDownMenu.prototype.load = function() {
	var d = document
	var lyrId1 = this.id + "Container"
	var lyrId2 = this.id + "Content"
	var obj1 = this.dom ? d.getElementById(lyrId1) : this.ie ? d.all[lyrId1] : d.layers[lyrId1]
	if (obj1) var obj2 = this.ns4 ? obj1.layers[lyrId2] : this.ie ? d.all[lyrId2] : d.getElementById(lyrId2)
	var temp
	if (!obj1 || !obj2) window.setTimeout(this.gRef + ".load()", 100)
	else {
		this.container = obj1
		this.menu = obj2
		this.style = this.ns4 ? this.menu : this.menu.style
		this.homePos = eval("0" + this.dirType + this.dim)
		this.outPos = 0
		this.accelConst = (this.outPos - this.homePos) / DropDownMenu.aniLen / DropDownMenu.aniLen 
		// set event handlers.
		if (this.ns4) this.menu.captureEvents(Event.MOUSEOVER | Event.MOUSEOUT);
		this.menu.onmouseover = new Function("DropDownMenu.showMenu('" + this.id + "')")
		this.menu.onmouseout = new Function("DropDownMenu.hideMenu('" + this.id + "')")
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		this.endSlide()
	}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
DropDownMenu.showMenu = function(id){
	var reg = DropDownMenu.Registry
	var obj = DropDownMenu.Registry[id]
	if (obj.container) {
		obj.over = true
		for (menu in reg) if (id != menu) DropDownMenu.hide(menu)
		if (obj.hideTimer) { 
			reg[id].hideTimer = window.clearTimeout(reg[id].hideTimer) 
		}
		if (!obj.open && !obj.aniTimer) reg[id].startSlide(true)
	}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
DropDownMenu.hideMenu = function(id){
	var obj = DropDownMenu.Registry[id]
	if (obj.container) {
		if (obj.hideTimer) window.clearTimeout(obj.hideTimer)
		obj.hideTimer = window.setTimeout("DropDownMenu.hide('" + id + "')", DropDownMenu.hideDelay);
	}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
DropDownMenu.hideAll = function(){
	var reg = DropDownMenu.Registry
	for (menu in reg) {
	DropDownMenu.hide(menu);
	if (menu.hideTimer) window.clearTimeout(menu.hideTimer);}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
DropDownMenu.hide = function(id){
	var obj = DropDownMenu.Registry[id]
	obj.over = false
	if (obj.hideTimer) window.clearTimeout(obj.hideTimer)
	obj.hideTimer = 0
	if (obj.open && !obj.aniTimer) obj.startSlide(false)
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
DropDownMenu.prototype.startSlide = function(open) {
	this[open ? "onactivate" : "ondeactivate"]()
	this.open = open
	if (open) this.setVisibility(true)
	this.startTime = (new Date()).getTime() 
	this.aniTimer = window.setInterval(this.gRef + ".slide()", DropDownMenu.minCPUResolution)
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
DropDownMenu.prototype.slide = function() {
	var elapsed = (new Date()).getTime() - this.startTime
	if (elapsed > DropDownMenu.aniLen) this.endSlide()
	else {
	var d = Math.round(Math.pow(DropDownMenu.aniLen-elapsed, 2) * this.accelConst)
	if (this.open && this.dirType == "-") d = -d
	else if (this.open && this.dirType == "+") d = -d
	else if (!this.open && this.dirType == "-") d = -this.dim + d
	else d = this.dim + d
	this.moveTo(d)
	}
}
DropDownMenu.prototype.endSlide = function() {
this.aniTimer = window.clearTimeout(this.aniTimer)
this.moveTo(this.open ? this.outPos : this.homePos)
if (!this.open) this.setVisibility(false)
if ((this.open && !this.over) || (!this.open && this.over)) {
this.startSlide(this.over)
}
}
DropDownMenu.prototype.setVisibility = function(bShow) { 
var s = this.ns4 ? this.container : this.container.style
s.visibility = bShow ? "visible" : "hidden"
}
DropDownMenu.prototype.moveTo = function(p) { 
this.style[this.orientation == "h" ? "left" : "top"] = this.ns4 ? p : p + "px"
}
DropDownMenu.prototype.getPos = function(c) {
return parseInt(this.style[c])
}
DropDownMenu.prototype.onactivate = function() { }
DropDownMenu.prototype.ondeactivate = function() { }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//function DropDownMenu(id, dir, left, top, right, width, height){
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////