// OpenCalendar - A FREE popup Javascript Calendar
// Author : Sim Lim Hai, last Modified 20 Jan 2006
// This is a calendar tool is developed to select
// date with a GUI interface javascript calendar.
// You can also use this to format timestamp to a 
// specified format.
// -----------DO NOT REMOVE THESE LINES-----------------
// This javascript falls under LGPL license.
// You may use this Javascript in your website for
// FREE but you may not remove this copyright clause in
// your HTML.
// Copyright � 2006, Sim Lim Hai
// http://sourceforge.net/projects/opencalendar
// -----------DO NOT REMOVE THESE LINES-----------------

var popup;
var Calendar;

var isNav = (navigator.appName.indexOf("Netscape") != -1) ? true : false;
var isIE  = (navigator.appName.indexOf("Microsoft") != -1) ? true : false;

// Calendar default configuration object
function Calendar()
{
   this.css               = "http://localhost/css/calendar.css";
   this.date_format       = "dd/mm/yyyy";
   this.datetime_format   = "dd-mm-yyyy hh:mi:ss";
   this.startday          = "mon";

   this.width      = 450;
   this.height     = 200;
   this.top        = 200;
   this.left       = 200;
   this.statusbar  = "no";
   this.resizable  = "no";
   this.scrollbars = "yes";

   this.weekend  = [5,6];
   this.leap     = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31, 31];  // Leap year
   this.nonLeap  = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31, 31];  // Non Leap year
   this.wday     = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];  // the last sunday is used for rotation
   this.lbl_day  = this.wday; // default label is english
   this.months   = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"];
   this.lbl_months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                       "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
   this.lbl_week   = "Week";
   this.lbl_time   = "Time";
   this.lbl_hour   = "Hour";
   this.lbl_minute = "Minute";
   this.lbl_second = "Second";
   return this;
}

// Date object
function DateValue(dd, week, mm, yyyy)
{
    this.d     = dd * 1;
    this.m     = mm * 1;
    dd = dd.toString();
    mm = (this.m+1).toString();
    this.dd    = (dd.length == 1) ? dd = '0' + dd : dd;
    this.mm    = (mm.length == 1) ? mm = '0' + mm : mm;
    this.yyyy  = yyyy;
    this.week  = (week != null) ? week : 1;
    var pdate  = popup.date;
    this.hh    = (pdate != null) ? pdate.hh : '00';
    this.mi    = (pdate != null) ? pdate.mi : '00';
    this.ss    = (pdate != null) ? pdate.ss : '00';
    this.hh    = '00';
    this.mi    = '00';
    this.ss    = '00';
    this.ms    = '00';
    var tDate = new Date(this.yyyy, this.m, this.d, this.hh, this.mi, this.ss, this.ms);
    this.dy   = tDate.getDay();
    this.day  = Calendar.wday[parseInt(this.dy)];
    this.yy   = new String(this.yyyy.toString().substr(2,2));
    this.mmmm = Calendar.months[this.m];
    this.mmm = this.mmmm.substr(0,3);
    this.MMMM = this.mmmm.toUpperCase();
    this.MMM  = this.mmm.toUpperCase();
    this.DAY  = this.day.toUpperCase();
    return this;
}

function popupDate(return1)
{
     var date = preload(return1);
     popup.datetime = false;
     draw(date.d, 1, date.m, date.yyyy);
}

function popupDatetime(return1)
{
     var date = preload(return1);
     popup.datetime = true;
     draw(date.d, 1, date.m, date.yyyy);
}

function preload(return1)
{
     // If custom config not defined use default calendar config
     Calendar = (window.calendar != null) ? window.calendar : new Calendar();
  	 Calendar.left = (screen.width - Calendar.width) / 2;
     Calendar.top  = (screen.height - Calendar.height) / 2;
     Calendar.weekend  = (Calendar.startday == "mon") ? [5,6] : [0,6];

     var lang = Calendar.language.toLowerCase();

     if(lang == 'cn')
     {
         Calendar.lbl_day    = ["日", "一", "二", "三", "四", "五", "六", "日"];
         Calendar.lbl_months = ["一月", "二月", "三月", "四月", "五月", "六月",
                                "七月", "八月", "九月", "十月", "十一月", "十二月"];
         Calendar.lbl_week   = "星期";
         Calendar.lbl_time   = "時間";
         Calendar.lbl_hour   = "時";
         Calendar.lbl_minute = "分";
         Calendar.lbl_second = "秒";
     }
     else if(lang == 'jp')
     {
         Calendar.lbl_day    = ["日曜", "月曜", "火曜", "水曜", "木曜", "金曜", "土曜", "日曜"];
         Calendar.lbl_months = ["一月", "二月", "三月", "四月", "五月", "六月",
                                "七月", "八月", "九月", "十月", "十一月", "十二月"];
         Calendar.lbl_week   = "週間";
         Calendar.lbl_time   = "時間";
         Calendar.lbl_hour   = "時";
         Calendar.lbl_minute = "分";
         Calendar.lbl_second = "秒";
     }
     else if(lang == 'de')
     {
         Calendar.lbl_day    = ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa", "So"];
         Calendar.lbl_months = ["Jan", "Feb", "M&auml;r", "Apr", "Mai", "Jun",
                                "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"];
         Calendar.lbl_week   = "Woche";
         Calendar.lbl_time   = "Zeiten";
         Calendar.lbl_hour   = "Stunde";
         Calendar.lbl_minute = "Minute";
         Calendar.lbl_second = "Sekunde";
     }
     else if(lang == 'my')
     {
         Calendar.lbl_day    = ["Ahad", "Isnin", "Selasa", "Rabu", "Khamis", "Jumaat", "Sabtu", "Ahad"];
         Calendar.lbl_months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun",
                                "Jul", "Ogu", "Sep", "Okt", "Nov", "Dis"];
         Calendar.lbl_week   = "Minggu";
         Calendar.lbl_time   = "Masa";
         Calendar.lbl_hour   = "Jam";
         Calendar.lbl_minute = "Minute";
         Calendar.lbl_second = "Saat";
     }

     popup = new Popup();
     popup.return1 = return1;
     popup.return1_original = eval("popup.win.opener.document." + return1 + ".value");

     var sysDate = new Date();
     var d    = sysDate.getDay()+1;
     var m    = sysDate.getMonth();
     var yyyy = (sysDate.getYear() < 1900) ? sysDate.getYear() + 1900 : sysDate.getYear();
     var initDate = new DateValue(d, 1, m, yyyy);
     return initDate;
}

function draw(dd, week, mm, yyyy)
{
     var date = new DateValue(dd, week, mm, yyyy);
     Calendar.date = date;
     popup.date = date;
     popup.close(); // to clear previous state, otherwise slow in IE
     popup.open();
     popup.headerHtml();
     popup.yearHtml();
     popup.monthHtml();
     popup.calendarHtml();
     popup.timeHtml();
     popup.buttonHtml();
     popup.footerHtml();
     popup.close();
}

function Popup()
{
   var popWin = window.open("", "sys_calendar_popup",
                           "width=" + Calendar.width + "," +
                           "height=" + Calendar.height + "," +
                           "top=" + Calendar.top + "," +
                           "left=" + Calendar.left + "," +
                           "status=" + Calendar.statusbar + "," +
                           "resizable=" + Calendar.resizable + "," +
                           "scrollbars=" + Calendar.scrollbars + "");
   this.win = popWin;
   popup = this;
   return this;
}

Popup.prototype.open = function()
{
   this.win.document.open();
}

Popup.prototype.html = function()
{
   this.win.document.writeln(arguments[0]);
}

Popup.prototype.close = function()
{
   this.win.document.close();
}

Popup.prototype.headerHtml = function()
{
     this.html("<html><head>");
     this.html("<title>Calendar</title>");
     this.html("<!--//");
     this.html("You may use this Javascript in your website for FREE but you may not remove this copyright clause.");
     this.html("Copyright � 2006, Sim Lim Hai");
     this.html(" //-->");
     this.html("<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\">");
     this.html("<link rel='stylesheet' href='" + Calendar.css + "'>");
     this.html("<script language='Javascript'>");
     this.html("<!--//");
     this.html("var holdBlur = false;");
     this.html("var clickButton = false;");
     this.html("window.onunload = function() { if(!clickButton) { " + this.setValueCode(Calendar.format()) + " } };");
     this.html("//-->");
     this.html("</script>");
     this.html("</head><body onBlur='if(!holdBlur) window.focus();'>");
     this.html("<table width='100%' border='0' cellpadding='0' cellspacing='1'>");
     this.html("<tr><td class='box'>");
     this.html("   <table width='100%' border='0' cellpadding='0' cellspacing='1'>");
     this.html("      <tr><td class='foreground'>");
}

Popup.prototype.footerHtml = function()
{
    this.html("       </td></tr>");
    this.html("    </table>");
    this.html("</td></tr>");
    this.html("</table>");
    this.html("</body></html>");
}

Popup.prototype.yearHtml = function()
{
    var date = this.date;
    var d = date.d;
    var w = date.week;
    var m = date.m;
    var y = date.yyyy;

    this.html("<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr>\n");

    var p1 = (isIE) ? "<p>" : "";
    var p2 = (isIE) ? "</p>" : "";

    var td1 = "<td nowrap width='3%' align='left' valign='middle' class='yearNav'>";
    var td2 = "<td nowrap width='3%' align='left' valign='middle' class='yearNum'>";
    var td3 = "<td nowrap width='15%' align='center' valign='middle' class='year'>";
    var td4 = "<td nowrap width='16%' align='center' valign='middle' class='yearSelected'>";
    var td5 = "<td nowrap width='3%' align='right' valign='middle' class='yearNum'>";
    var td6 = "<td nowrap width='3%' align='right' valign='middle' class='yearNav'>";

    this.html(td1 + this.genLink(d, w, m, (parseInt(y)-10), p1 + '<font class=\'yearNav\'>&nbsp;&lt;&lt;</font>' + p2) + "</td>");
    this.html(td2 + this.genLink(d, w, m, (parseInt(y)-10), p1 + '<font class=\'yearNum\'>-10</font>' + p2) + "</td>");
    this.html(td1 + this.genLink(d, w, m, (parseInt(y)-1),  p1 + '<font class=\'yearNav\'>&lt;</font>' + p2) + "</td>");
    this.html(td2 + this.genLink(d, w, m, (parseInt(y)-1),  p1 + '<font class=\'yearNum\'>-1</font>' + p2) + "</td>");

    this.html(td3 + this.genLink(d, w, m, (parseInt(y)-2), p1 + '<font class=\'year\' onMouseOver="this.className=\'yearHover\'" onMouseOut="this.className=\'year\'">' + (parseInt(y)-2) + '</font>' + p2) + "</td>\n");
    this.html(td3 + this.genLink(d, w, m, (parseInt(y)-1), p1 + '<font class=\'year\' onMouseOver="this.className=\'yearHover\'" onMouseOut="this.className=\'year\'">' + (parseInt(y)-1) + '</font>' + p2) + "</td>\n");

    this.html(td4 + this.genLink(d, w, m, (parseInt(y)), p1 + '<font class=\'yearSelected\'>' + (parseInt(y)) + '</font>' + p2) + "</td>\n");

    this.html(td3 + this.genLink(d, w, m, (parseInt(y)+1), p1 + '<font class=\'year\' onMouseOver="this.className=\'yearHover\'" onMouseOut="this.className=\'year\'">' + (parseInt(y)+1) + '</font>' + p2) + "</td>\n");
    this.html(td3 + this.genLink(d, w, m, (parseInt(y)+2), p1 + '<font class=\'year\' onMouseOver="this.className=\'yearHover\'" onMouseOut="this.className=\'year\'">' + (parseInt(y)+2) + '</font>' + p2) + "</td>\n");

    this.html(td5 + this.genLink(d, w, m, (parseInt(y)+1),  p1 + '<font class=\'yearNum\'>+1</font>' + p2) + "</td>");
    this.html(td6 + this.genLink(d, w, m, (parseInt(y)+1),  p1 + '<font class=\'yearNav\'>&gt;</font>' + p2) + "</td>");
    this.html(td5 + this.genLink(d, w, m, (parseInt(y)+10), p1 + '<font class=\'yearNum\'>+10</font>' + p2) + "</td>");
    this.html(td6 + this.genLink(d, w, m, (parseInt(y)+10), p1 + '<font class=\'yearNav\'>&gt;&gt;&nbsp;</font>' + p2) + "</td>");

    this.html("</table>");
}

Popup.prototype.monthHtml = function()
{
    var date = this.date;
    this.html("<center><table width='70%' border=0 cellpadding='2' cellspacing='1'><tr>");
    var weeknum = 1;
    for(x = 0; x <= 5; x++)
    {
        this.html(this.monthRow(x));
    }
    this.html("</tr><tr>");
    for(x = 6; x <= 11; x++)
    {
        this.html(this.monthRow(x));
    }
    this.html("</tr></table></center>");
}

Popup.prototype.monthRow = function(x)
{
    var date = this.date;
    var weeknum = get_weeks(date.d, x, date.yyyy);
    var cssClass = (x == parseInt(date.m)) ? "monthSelected" : "month";
    var jsCode = "javascript:" + this.jsDrawCode(date.d, weeknum, x, date.yyyy);
    return "<td class='" + cssClass + "' onClick=\"" + jsCode + "\" onFocus=\"" + jsCode + "\" onMouseOver=\"this.className='monthHover'\" onMouseOut=\"this.className='" + cssClass + "'\">" + this.genLink(date.d, weeknum, x, date.yyyy, get_shortmonth(x)) + "</td>";
}

Popup.prototype.calendarHtml = function()
{
    this.html("<center><table border='0' width='95%' cellspacing='0' cellpadding='0'>");
    this.html("<tr><td class='box'>");
    this.html("  <table border='0' width='100%' cellspacing='1' cellpadding='3'>");
    this.calendarHeader();
    this.calendarRows();
    this.html("  </table>");
    this.html("</td></tr>");
    this.html("</table></center>");
}

Popup.prototype.calendarHeader = function()
{
    var date = this.date;
    var xcode = "";
    xcode += "<tr>\n";
    xcode += "<td width='16%' class='dayHeader'>" + Calendar.lbl_week + "</td>\n";

    if(Calendar.startday == 'mon') { a = 1; b = 7; }
    else { a = 0; b = 6; }
    for(x = a; x <= b; x++)
    {
        xcode += "<td width='12%' class='dayHeader'>" + Calendar.lbl_day[x] + "</td>\n";
    }
    xcode = xcode + "</tr>\n";
    this.html(xcode);
}

Popup.prototype.calendarRows = function()
{
    var date = this.date;
    var vDate = new Date();
    vDate.setDate(1);
    vDate.setMonth(date.m);
    vDate.setFullYear(date.yyyy);

    var cls = '';
    var classtag = '';
    var vFirstDay=vDate.getDay();
    var xday=1;
    var vLastDay=get_day(date.m, date.yyyy);
    var vOnLastDay=0;
    var xcode = "";

    var weeknum = 1;
    var linkCode = "";
    if(Calendar.startday == 'mon')
    {
       weeknum = get_weeks(7, date.m, date.yyyy, "mon");
       weeknum--;

       if(vFirstDay == 0) { vFirstDay = 6; }
       else if(vFirstDay == 6) { vFirstDay = 5; }
       else { vFirstDay--; }

       linkCode = "weeknum \= get_weeks\((xday + 6)\, date\.m\, date\.yyyy\, \"mon\")\;";
       linkCode += "weeknum--;";
    }
    else
    {
       weeknum = get_weeks(1, date.m, date.yyyy);
       linkCode = "weeknum \= get_weeks\(xday \, date\.m\, date\.yyyy\)\;";
    }
    linkCode += "this\.genLink\(xday\, weeknum\, date\.m\, date\.yyyy\, xday\)";

    xcode += "<tr>\n";
    xcode += this.weekTd(weeknum) + weeknum + "</td>\n";

    for (i=0; i<vFirstDay; i++) {
       xcode += this.dayTd(weeknum, null, i) + "&nbsp;</td>\n";
    }

    for (j=vFirstDay; j<7; j++)
    {
      if(xday == parseInt(date.d))
         xcode += this.daySelectedTd(weeknum, xday) + eval(linkCode) + "</td>\n";
      else
         xcode += this.dayTd(weeknum, xday, j) + eval(linkCode) + "</td>\n";

       xday = xday + 1;
    }
    xcode += "</tr>";

    for (k=2; k<7; k++) {
            weeknum++;
            xcode += "<tr>";
            xcode += this.weekTd(weeknum) + weeknum + "</td>\n";
            for (j=0; j<7; j++)
            {
              if(xday == parseInt(date.d))
                 xcode += this.daySelectedTd(weeknum, xday) + eval(linkCode) + "</td>\n";
              else
                 xcode += this.dayTd(weeknum, xday, j) + eval(linkCode) + "</td>\n";

              xday = xday + 1;
               if (xday > vLastDay) {
                   vOnLastDay = 1;
                   break;
               }
            }
            if (j == 6)
                    xcode += "\n</tr>";
            if (vOnLastDay == 1)
                    break;
    }

    for (m=1; m<(7-j); m++) {
         xcode += this.dayTd(weeknum, null, j+m) + "<font class='dayInactive'>" + m + "</font></td>\n";
    }
    this.html(xcode);
}

Popup.prototype.weekTd = function(weeknum)
{
    var date = this.date;
    var cssClass = (weeknum == date.week) ? "weekSelected" : "week";
    return "<td width='16%' class='" + cssClass + "' onMouseOver=\"this.className='weekHover'\" onMouseOut=\"this.className='" + cssClass + "'\">";
}

Popup.prototype.daySelectedTd = function(weeknum, d)
{
     var date = this.date;
     var jsCode = "javascript:" + this.jsDrawCode(d, weeknum, date.m, date.yyyy);
     return "<td width='12%' class='daySelected' onClick=\"" + jsCode + "\" onFocus=\"" + jsCode + "\" onMouseOver=\"this.className='dayHover'\" onMouseOut=\"this.className='daySelected'\">";
}

Popup.prototype.dayTd = function(weeknum, dd, daynum)
{
     var date = this.date;
     var code ='';
     var clickCode = '';
     var cssClass = (weeknum == date.week) ? "weekSelected" : this.weekendCss(daynum);
     var jsCode = "javascript:" + this.jsDrawCode(dd, weeknum, date.m, date.yyyy);
     if(dd != null)
        clickCode = "onClick=\"" + jsCode + "\" onFocus=\"" + jsCode + "\"";
     code += "<td width='12%' class='" + cssClass + "' " + clickCode + " onMouseOver=\"this.className='dayHover'\" onMouseOut=\"this.className='" + cssClass + "'\">";
     return  code;
}

Popup.prototype.weekendCss = function(vday)
{
    var date = this.date;
    var i;
    for (i=0; i < Calendar.weekend.length; i++) {
        if (vday == Calendar.weekend[i])
             return ("weekend");
    }
    return "day";
}

Popup.prototype.timeHtml = function()
{
    if(this.datetime)
    {
        var date = this.date;
        var val = 0;
        var xcode = '';
        var td1 = "<td class='timeHeader'>";
        var td2 = "<td class='time'>";
        xcode += "<center><table border='0' cellspacing='0' cellpadding='2'>"
              + "<form name='timemenu'><tr>"
              + td1 + "&nbsp;</td>"
              + td1 + "<font onClick='javascript:" + this.timeLink(24, 'hh', '+', 1) + "'>&nbsp;+&nbsp;</font>"
                    + "<font onClick='javascript:" + this.timeLink(24, 'hh', '+', 5) + "'>" + Calendar.lbl_hour + "</font>"
                    + "<font onClick='javascript:" + this.timeLink(24, 'hh', '-', 1) + "'>&nbsp;-&nbsp;</font></td>"
              + td1 + ":</td>"
              + td1 + "<font onClick='javascript:" + this.timeLink(60, 'mi', '+', 1) + "'>&nbsp;+&nbsp;</font>"
                    + "<font onClick='javascript:" + this.timeLink(60, 'mi', '+', 10) + "'>" + Calendar.lbl_minute + "</font>"
                    + "<font onClick='javascript:" + this.timeLink(60, 'mi', '-', 1) + "'>&nbsp;-&nbsp;</font></td>"
              + td1 + ":</td>"
              + td1 + "<font onClick='javascript:" + this.timeLink(60, 'ss', '+', 1) + "'>&nbsp;+&nbsp;</font>"
                    + "<font onClick='javascript:" + this.timeLink(60, 'ss', '+', 10) + "'>" + Calendar.lbl_second + "</font>"
                    + "<font onClick='javascript:" + this.timeLink(60, 'ss', '-', 1) + "'>&nbsp;-&nbsp;</font></td>"
              + "</tr>\n"
              + "<tr>"
              + td2 + Calendar.lbl_time + ":</td>"
              + td2 + this.opHtml(24, "hh", date.hh) + "</td>"
              + td2 + ":</td>"
              + td2 + this.opHtml(60, "mi", date.mi) + "</td>"
              + td2 + ":</td>"
              + td2 + this.opHtml(60, "ss", date.ss) + "</td>"
              + "</tr></form>"
              + "</table></center>";
        this.html(xcode);
    }
}

Popup.prototype.timeLink = function(maxVal, nameVal, op, sum)
{
   var jsCode = "var tmpval = document.timemenu." + nameVal + ".value * 1; "
              + "tmpval = (tmpval < " + maxVal + " - " + sum + ") ? tmpval = tmpval " + op + " " + sum + " : \"00\";  "
              + "tmpval = (tmpval < 0) ? \"00\" : tmpval; "
              + "tmpval = (tmpval.toString().length < 2) ? \"0\" + tmpval : tmpval; "
              + "document.timemenu." + nameVal + ".value = tmpval; ";
              + "window.opener.popup." + nameVal + " = tmpval; ";
   return jsCode;
}

Popup.prototype.opHtml = function(maxVal, nameVal, curVal)
{
    var code = "<input type='text' size='2' maxlength='2' name='" + nameVal + "' value='" + curVal + "' onBlur='holdBlur=false; window.focus();'>";
//    var code = "<input type='text' size='2' maxlength='2' name='" + nameVal + "' value='" + curVal + "' onMouseOver='holdBlur=true; this.focus();' onBlur='holdBlur=false; window.focus();' onChange='this.focus(); if(this.value > " + maxVal + ") { this.value=\"" + maxVal + "\" }'>";
/*
    var code = "<select name='" + nameVal + "' onMouseOver='holdBlur=true; this.focus();' onBlur='holdBlur=false; window.focus();'>\n";
    for(x = 0; x < maxVal; x++)
    {
        var val = (x.toString().length < 2) ? "0" + x : x;
        var isSelected = (x == curVal) ? "selected" : "";
        code += "  <option value='" + x + "' " + isSelected + ">" + val + "</option>\n";
    }
    code += "</select>\n";
*/
    return code;
}

Popup.prototype.buttonHtml = function()
{
    this.html("<table border=0 width='100%'>");
    this.html("<form><tr><td align='center'>");
    this.html("<input type='button' class='button' name='button' value='  OK  ' onClick=\"javascript: clickButton = true; " + this.setValueCode(Calendar.format()) + " window.close();\">");
    this.html("<input type='button' class='button' name='cancel' value='Cancel' onClick=\"javascript: clickButton = true; " + this.setValueCode(this.return1_original)  + " window.close();\">");
    this.html("</td></tr></form>");
    this.html("</table>");
}

Popup.prototype.setValueCode = function(value1)
{
    var code = "var tmptime = '" + value1 + "'; "
             + "window.opener.document." + this.return1 + ".value = tmptime; "
             + "if(window.opener.document." + this.return1 + "_milliseconds != null) "
             + "{window.opener.document." + this.return1 + "_milliseconds.value = window.opener.milliSeconds(tmptime); } ";
    return code;
}

Popup.prototype.genLink = function(d, week, m, yyyy, label)
{
   var jsCode = "javascript:" + this.jsDrawCode(d, week, m, yyyy);
   return "<a href=\"" + jsCode + "\" onFocus=\"" + jsCode + "\">" + label + "</a>";
}

Popup.prototype.jsDrawCode = function(d, week, m, yyyy)
{
   return "window.opener.draw('" + d + "', '" + week + "', '" + m + "', '" + yyyy + "');";
}

function get_shortmonth(monthNo) 
{
//    return Calendar.months[monthNo].substr(0,3);
    return Calendar.lbl_months[monthNo];
}

function get_day(monthNo, year) {
    if ((year % 4) == 0) {
        if ((year % 100) == 0 && (year % 400) != 0)
            return Calendar.nonLeap[monthNo];
        else
            return Calendar.leap[monthNo];
    }
    else
        return Calendar.nonLeap[monthNo];
}

function get_totaldays(dd, mm, yyyy) {
   var totaldays = dd;
   for(z = mm - 1; z >= 0; z--)
   {
      totaldays += get_day(z, yyyy);
   }
   return totaldays;
}

function get_weeks(p_Day, p_Month, p_Year) {
      var wDate = new Date(p_Year, 0, 1, 0, 0, 0, 0);    //to get the begining day on january p_year, equal to remainder of last year
      var lastYearDay = 0;
      if(arguments[3] == 'mon')
      {
        if(wDate.getDay() > 0)
          lastYearDay = wDate.getDay() - 1;
        else
          lastYearDay = wDate.getDay() + 6;
          weeks = parseInt((parseInt(get_totaldays(p_Day, p_Month, p_Year)) + lastYearDay) / 7) + 1;
      }
      else
      {
          lastYearDay = wDate.getDay() + 6;
          weeks = parseInt((parseInt(get_totaldays(p_Day, p_Month, p_Year)) + lastYearDay) / 7);
      }
      return weeks;
}

Calendar.prototype.format = function()
{
    var date = this.date;
    var r;
    var rex;
    var val = (popup.datetime) ? this.datetime_format : this.date_format;
    val = " " + val + " ";
    var mCode = '';
    val = val.replace(/GMT/g,"GGG"); // to prevent substitution
//    var match = ["MMMM", "mmmm", "MMM", "mmm", "DAY", "day", "dy", "dd", "d", "yyyy", "yy", "mm", "mi", "ms", "m", "hh", "ss"];
    var match = ["MMMM", "mmmm", "MMM", "mmm", "DAY", "day", "dy", "dd", "d", "yyyy", "yy", "mm", "mi", "m", "hh", "ss"];
    for(var i = 0; i < match.length; i++)
    {
         var pt = match[i];
         mCode += "rex \= \/\(\\W\)" + pt + "\(\\W\)\/i\;\n";
         mCode += "if\(rex\.test\(val\) \=\= true\)\n";
         mCode += "\{\n";
         mCode += "r \= rex\.exec\(val\)\;\n";
         mCode += "val \= val\.replace\(rex\, r\[1\] \+ date." + pt + " \+ r\[2\]\)\;\n";
         mCode += "\}\n";
    }
    eval(mCode);
    val = val.replace(/^\s+/g,"");
    val = val.replace(/\s+$/g,"");
    val = val.replace(/GGG/g,"GMT");
    return val;
}

