<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Published Articles" />
<meta property="og:description" content="Pyrex journals published articles" />
<meta property="og:url" content="http://www.pyrexjournals.org/articles.php/" />
<meta property="og:site_name" content="Pyrex Journals" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="icon" href="images/favicon.ico"  type="image/x-icon">
<script src="/web/20150403022843js_/http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="scripts/slides.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Recently Published Articles</title>
<script>
  $(function() {

	$(".rslides").responsiveSlides({
	  auto: true,             // Boolean: Animate automatically, true or false
	  speed: 500,            // Integer: Speed of the transition, in milliseconds
	  timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
	  pager: true,           // Boolean: Show pager, true or false
	  nav: false,             // Boolean: Show navigation, true or false
	  random: false,          // Boolean: Randomize the order of the slides, true or false
	  pause: false,           // Boolean: Pause on hover, true or false
	  pauseControls: true,    // Boolean: Pause when hovering controls, true or false
	  prevText: "Previous",   // String: Text for the "previous" button
	  nextText: "Next",       // String: Text for the "next" button
	  maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
	  navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
	  manualControls: "",     // Selector: Declare custom pager navigation
	  namespace: "rslides",   // String: Change the default namespace used
	  before: function(){},   // Function: Before callback
	  after: function(){}     // Function: After callback
	});

  });
</script>
</head>

<body>


<!-- BEGIN WAYBACK TOOLBAR INSERT -->
<script type="text/javascript" src="/static/js/disclaim-element.js" ></script>
<script type="text/javascript" src="/static/js/graph-calc.js" ></script>
<script type="text/javascript">//<![CDATA[
var __wm = (function(imgWidth,imgHeight,yearImgWidth,monthImgWidth){
var wbPrefix = "/web/";
var wbCurrentUrl = "http://www.pyrexjournals.org/articles.php";

var firstYear = 1996;
var displayDay = "3";
var displayMonth = "Apr";
var displayYear = "2015";
var prettyMonths = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
var $D=document,$=function(n){return document.getElementById(n)};
var trackerVal,curYear = -1,curMonth = -1;
var yearTracker,monthTracker;
function showTrackers(val) {
  if (val===trackerVal) return;
  var $ipp=$("wm-ipp");
  var $y=$("displayYearEl"),$m=$("displayMonthEl"),$d=$("displayDayEl");
  if (val) {
    $ipp.className="hi";
  } else {
    $ipp.className="";
    $y.innerHTML=displayYear;$m.innerHTML=displayMonth;$d.innerHTML=displayDay;
  }
  yearTracker.style.display=val?"inline":"none";
  monthTracker.style.display=val?"inline":"none";
  trackerVal = val;
}
function trackMouseMove(event,element) {
  var eventX = getEventX(event);
  var elementX = getElementX(element);
  var xOff = Math.min(Math.max(0, eventX - elementX),imgWidth);
  var monthOff = xOff % yearImgWidth;

  var year = Math.floor(xOff / yearImgWidth);
  var monthOfYear = Math.min(11,Math.floor(monthOff / monthImgWidth));
  // 1 extra border pixel at the left edge of the year:
  var month = (year * 12) + monthOfYear;
  var day = monthOff % 2==1?15:1;
  var dateString = zeroPad(year + firstYear) + zeroPad(monthOfYear+1,2) +
    zeroPad(day,2) + "000000";

  $("displayYearEl").innerHTML=year+firstYear;
  $("displayMonthEl").innerHTML=prettyMonths[monthOfYear];
  // looks too jarring when it changes..
  //$("displayDayEl").innerHTML=zeroPad(day,2);
  var url = wbPrefix + dateString + '/' +  wbCurrentUrl;
  $("wm-graph-anchor").href=url;

  if(curYear != year) {
    var yrOff = year * yearImgWidth;
    yearTracker.style.left = yrOff + "px";
    curYear = year;
  }
  if(curMonth != month) {
    var mtOff = year + (month * monthImgWidth) + 1;
    monthTracker.style.left = mtOff + "px";
    curMonth = month;
  }
}
function hideToolbar() {
  $("wm-ipp").style.display="none";
}
function bootstrap() {
  var $spk=$("wm-ipp-sparkline");
  yearTracker=$D.createElement('div');
  yearTracker.className='yt';
  with(yearTracker.style){
    display='none';width=yearImgWidth+"px";height=imgHeight+"px";
  }
  monthTracker=$D.createElement('div');
  monthTracker.className='mt';
  with(monthTracker.style){
    display='none';width=monthImgWidth+"px";height=imgHeight+"px";
  }
  $spk.appendChild(yearTracker);
  $spk.appendChild(monthTracker);

  var $ipp=$("wm-ipp");
  $ipp&&disclaimElement($ipp);
}
return{st:showTrackers,mv:trackMouseMove,h:hideToolbar,bt:bootstrap};
})(500, 27, 25, 2);//]]>
</script>
<style type="text/css">
body {
  margin-top:0 !important;
  padding-top:0 !important;
  min-width:800px !important;
}
</style>
<div id="wm-ipp" lang="en" style="display:none;">

<div style="position:fixed;left:0;top:0;width:100%!important">
<div id="wm-ipp-inside">
   <table style="width:100%;"><tbody><tr>
   <td id="wm-logo">
       <a href="/web/" title="Wayback Machine home page"><img src="/static/images/toolbar/wayback-toolbar-logo.png" alt="Wayback Machine" width="110" height="39" border="0" /></a>
   </td>
   <td class="c">
       <table style="margin:0 auto;"><tbody><tr>
       <td class="u" colspan="2">
       <form target="_top" method="get" action="/web/form-submit.jsp" name="wmtb" id="wmtb"><input type="text" name="url" id="wmtbURL" value="http://www.pyrexjournals.org/articles.php" style="width:400px;" onfocus="this.focus();this.select();" /><input type="hidden" name="type" value="replay" /><input type="hidden" name="date" value="20150403022843" /><input type="submit" value="Go" /><span id="wm_tb_options" style="display:block;"></span></form>
       </td>
       <td class="n" rowspan="2">
           <table><tbody>
           <!-- NEXT/PREV MONTH NAV AND MONTH INDICATOR -->
           <tr class="m">
           	<td class="b" nowrap="nowrap">
		
		    <a href="/web/20150215223824/http://pyrexjournals.org/articles.php" title="15 Feb 2015">FEB</a>
		
		</td>
		<td class="c" id="displayMonthEl" title="You are here: 2:28:43 Apr 3, 2015">APR</td>
		<td class="f" nowrap="nowrap">
		
		    May
		
                </td>
	    </tr>
           <!-- NEXT/PREV CAPTURE NAV AND DAY OF MONTH INDICATOR -->
           <tr class="d">
               <td class="b" nowrap="nowrap">
               
                   <a href="/web/20150314232919/http://pyrexjournals.org/articles.php" title="23:29:19 Mar 14, 2015"><img src="/static/images/toolbar/wm_tb_prv_on.png" alt="Previous capture" width="14" height="16" border="0" /></a>
               
               </td>
               <td class="c" id="displayDayEl" style="width:34px;font-size:24px;" title="You are here: 2:28:43 Apr 3, 2015">3</td>
	       <td class="f" nowrap="nowrap">
               
                   <img src="/static/images/toolbar/wm_tb_nxt_off.png" alt="Next capture" width="14" height="16" border="0"/>
               
	       </td>
           </tr>
           <!-- NEXT/PREV YEAR NAV AND YEAR INDICATOR -->
           <tr class="y">
	       <td class="b" nowrap="nowrap">
               
                   2014
               
               </td>
               <td class="c" id="displayYearEl" title="You are here: 2:28:43 Apr 3, 2015">2015</td>
	       <td class="f" nowrap="nowrap">
               
                   2016
               
	       </td>
           </tr>
           </tbody></table>
       </td>
       </tr>
       <tr>
       <td class="s">
           <a class="t" href="/web/20150403022843*/http://www.pyrexjournals.org/articles.php" title="See a list of every capture for this URL">5 captures</a>
           <div class="r" title="Timespan for captures of this URL">22 Nov 14 - 3 Apr 15</div>
       </td>
       <td class="k">
       <a href="" id="wm-graph-anchor">
       <div id="wm-ipp-sparkline" title="Explore captures for this URL">
	 <img id="sparklineImgId" alt="sparklines"
		 onmouseover="__wm.st(1)" onmouseout="__wm.st(0)"
		 onmousemove="__wm.mv(event,this)"
		 width="500"
		 height="27"
		 border="0"
		 src="/web/jsp/graph.jsp?graphdata=500_27_1996:-1:000000000000_1997:-1:000000000000_1998:-1:000000000000_1999:-1:000000000000_2000:-1:000000000000_2001:-1:000000000000_2002:-1:000000000000_2003:-1:000000000000_2004:-1:000000000000_2005:-1:000000000000_2006:-1:000000000000_2007:-1:000000000000_2008:-1:000000000000_2009:-1:000000000000_2010:-1:000000000000_2011:-1:000000000000_2012:-1:000000000000_2013:-1:000000000000_2014:-1:000000000010_2015:3:021100000000" />
       </div>
       </a>
       </td>
       </tr></tbody></table>
   </td>
   <td class="r">
       <a href="#close" onclick="__wm.h();return false;" style="background-image:url(/static/images/toolbar/wm_tb_close.png);top:5px;" title="Close the toolbar">Close</a>
       <a href="http://faq.web.archive.org/" style="background-image:url(/static/images/toolbar/wm_tb_help.png);bottom:5px;" title="Get some help using the Wayback Machine">Help</a>
   </td>
   </tr></tbody></table>
</div>
</div>
</div>
<script type="text/javascript">__wm.bt();</script>
<!-- END WAYBACK TOOLBAR INSERT -->

	<div class="top-menu-container">
		<div class="sec-menu-container">
			<ul class="menu_ul">
				<li class="menu_li"><a  href="index.php">HOME</a></li>
				<li class="menu_li"><a style="background-color:blue;" href="about-us.php">ABOUT US</a></li>
				<li class="menu_li"><a href="contact.php">CONTACT US</a></li>
				<li class="menu_li"><a href="newsletter.php">NEWSLETTER</a></li>
			</ul>
	    </div>
					<div style="clear:both;"></div>

	</div>
	
	<div class="banner-container">
		<div class="logo-container">
			<img src="images/logo.png" height="50" width="360"  />
		</div>
		
		<div class="search-container">
			<script>
  (function() {
    var cx = '003270060168523775784:fxbotyze61m';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
		</div>
		
				   <div style="clear:both;"></div>
	</div>
	
	<div class="pri-menu-container">
			<ul class="menu-ul">
				<li class="menu-li"><a href="journals.php">JOURNALS</a></li>
				<li class="menu-li"><a href="authors-guide.php">GUIDE FOR AUTHORS</a></li>
				<li class="menu-li"><a href="publication-ethics.php">PUBLICATION ETHICS</a></li>
			</ul>
	</div>
	
	<div class="slider_container">
				<ul class="rslides">
					<li><img src="images/pjmms.jpg" width="960" height="200" /></li>
					<li><img src="images/pjar.jpg" width="960" height="200" /></li>
				</ul>
	</div>

	<div class="main-body-wrapper">
		<div style="width:900px; border-left:none; padding-right:20px; margin-left:0px;" class="content-box-two">
			<h1 style="font-size:22px; color:blue;" class="box-header-blue">Recently Published Articles</h1>
			
			<br />
<p style="line-height:20px;"><b>Attitude towards research of university students, A Multivariate analysis</b><br />
Zeeshan Maqsood<sup>1*</sup>, Syeda Huma Jabeen<sup>2</sup>, Nauman Riaz Chaudhry<sup>3</sup> and Iqra Sardar<sup>4</sup><br />
J. Educ. Res. Rev. July 2019 4 (3) 37-43 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2019/july/Maqsood-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2019/july/Maqsood-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Housing Price Forecastability by Using Factor Analysis</b><br />
Zeeshan Maqsood<sup>1*</sup>, Rahila Akhtar<sup>2</sup> and Humaira Latif<sup>2</sup><br />
J. Bus. Fin. Manage. Res. Jun 2019 5 (3) 25-31 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2019/june/Maqsood-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2019/june/Maqsood-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Implications of Biology Exclusion on Nigerian Non- Science Senior Secondary School Students Capacity Building in Education</b><br />
Akingbemisilu Afolabi Abiola* and Ayegbo Ruth Temidayo<br />
J. Afr. Stud. Dev. June 2019 5 (1) 1-7 <br />
<a style="color:blue;" class="listjornal" href="pjasd/abstract/2019/june/Akingbemisilu-and-Ayegbo.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjasd/pdf/2019/june/Akingbemisilu-and-Ayegbo.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>A comparative study on the factors of academic performance of Government and Private Colleges students at Inter level: A case study of Gujranwala City</b><br />
Zeeshan Maqsood<sup>1*</sup>, Gofran Athar<sup>2</sup>, Iqra Sardar<sup>3</sup>, Sana Jawad<sup>4</sup> and Muhammad Ramzan Mehar<sup>5</sup><br />
J. Educ. Res. Rev. June 2019 4 (2) 12-36 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2019/june/Maqsood-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2019/june/Maqsood-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Perceptions and use of Library Resources among Undergraduate Students in an African University of Science and Technology</b><br />
Omonigho Angela Israel<br />
J. Lib. Inf. Sci. May 2019 4 (1) 1-12 <br />
<a style="color:blue;" class="listjornal" href="pjlis/abstract/2019/may/Israel.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjlis/pdf/2019/may/Israel.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Spatial Assessment of Corporate Environmental Management Systems of Selected Companies in Eleme Local Government Area, Rivers State, Nigeria</b><br />
Kika HA* and Arokoyu SB<br />
J. Geogr. Reg. Plann. May 2019 4 (1) 1-18 <br />
<a style="color:blue;" class="listjornal" href="pjgrp/abstract/2019/may/Kika-and-Arokoyu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgrp/pdf/2019/may/Kika-and-Arokoyu.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Harmonization as an Effective Tool Facilitating Synchrony Laws Governing International Trade</b><br />
Joycelin Chinwe Okubuiro<br />
J. Law Conflict. Resolut. March 2019 3(1): 1-8 <br />
<a style="color:blue;" class="listjornal" href="pjlcr/abstract/2019/march/Okubuiro.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjlcr/abstract/2019/march/Okubuiro.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Social and Economic Determinants of Fertility in Udi Area, Enugu State, Nigeria</b><br />
Basil U. Eze<br />
J. Res. Env. Stu. February 2019 5 (2) 8-12 <br />
<a style="color:blue;" class="listjornal" href="pjres/abstract/2019/february/Eze.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/abstract/2019/february/Eze.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Types of Terminologies in Chu Ci (??) and Their Translation</b><br />
Yuanyuan Liu and Chuanmao Tian*<br />
J. Educ. Res. Rev. February 2019 4 (1) 1-11 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2019/february/Tian-and-Liu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2019/february/Tian-and-Liu.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Psychological Behaviour of People in the Selection of Islamic Banks</b><br />
Muhammad Ramzan Mehar<sup>1*</sup>, Huda Tahir<sup>1</sup>, Zainab Aziz<sup>2</sup> and Masood Hassan<sup>3</sup><br />
J. Bus. Fin. Manage. Res. Feb 2019 5 (2) 13-24 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2019/february/Mehar-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2019/february/Mehar-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Relationship between Behavioural factors of Pregnant Women with Preeclampsia and Health Status of Newborns in Delivery Rooms of Prof. Dr. W. Z. Johannes Kupang Hospital</b><br />
Sartje Sorah*, Sabina Gero and Intje Picauly<br />
J. Med. Med. Sci. February 2019 6 (1) 9-15 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2019/february/Sorah-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2019/february/Sorah-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Vaginal Leiomyosarcoma in Holstein-Friesian Heifer</b><br />
Naif A. Al-Gabri<sup>a,b*</sup>, Abdel-Moneim Ali<sup>a</sup>, Ahmed Mounir<sup>a</sup> , Sayed R. Alattar<sup>a</sup> and Mohammed Salah<sup>a</sup><br />
J. Med. Med. Sci. February 2019 6 (1) 6-8 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2019/february/Al-Gabri-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2019/february/Al-Gabri-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>A Prospective Study of Wounds in a Teaching Hospital in Northern Part of Nigeria</b><br />
MI Builders<sup>1*</sup> and PU Bassi<sup>2</sup><br />
J. Med. Med. Sci. February 2019 6 (1) 1-5 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2019/february/Builders-and-Bassi.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2019/february/Builders-and-Bassi.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Study of Chemical Composition of Cattle Meat and Sheep Meat in Khartoum State</b><br />
Siham Abdelwhab*, Fatima Jamal and Fatima Osman<br />
J Plant. Agric. Res. February 2019 4(1): 1-5<br />
<a style="color:blue;" class="listjornal" href="pjpar/abstract/2019/february/Abdelwahab-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpar/pdf/2019/february/Abdelwahab-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Impact of Kpi’s on Systematic Risk: a Case of Petroleum Industry</b><br />
Muhammad Kamran<sup>1*</sup> and Qaisar Ali Malik<sup>2</sup><br />
J. Bus. Fin. Manage. Res. Jan 2019 5 (1) 1-12 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2019/january/Kamran-and-Malik.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2019/january/Kamran-and-Malik.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Population Factor in Waste Generation and Management in Onitsha Metropolis, Anambra State, Nigeria</b><br />
Basil U. Eze*, NT Iwueke and CP Akaemen<br />
J. Res. Env. Stu. January 2019 5 (1) 1-7 <br />
<a style="color:blue;" class="listjornal" href="pjres/abstract/2019/january/Eze-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/abstract/2019/january/Eze-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Within the Walls of a Human Warehouse: Sex Differences in Aggression among Prisoners in Ghana</b><br />
George Darko*, Kaj Björkqvist and Karin Österman<br />
J. Afr. Stud. Dev. December 2018 4 (3) 18-27 <br />
<a style="color:blue;" class="listjornal" href="pjasd/abstract/2018/december/Darko-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjasd/pdf/2018/december/Darko-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Post-Herniotomy Pain Management at Federal Medical Centre Umuahia: A Case Report and Literature Review</b><br />
Chinwe Edith Okoli<sup>a</sup> and Eze Onyegbule Okubuiro<sup>b*</sup><br />
J. Med. Med. Sci. Nov 2018 5 (3) 13-18 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2018/november/Okubuiro-and-Okoli.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2018/november/Okubuiro-and-Okoli.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Roles of Libraries in Provision of Information Services for Alternative Dispute Resolution in Nigeria: A Literature Review</b><br />
Medinat Dolapo Laaro<sup>1</sup>, Francis Olusanjo Oyeyemi<sup>2</sup>, Tunde Toyese Oyedokun<sup>2*</sup> and Fausat Ayobami Oyewumi<sup>2</sup><br />
J. Lib. Inf. Sci. Nov 2018 3 (1) 1-6 <br />
<a style="color:blue;" class="listjornal" href="pjlis/abstract/2018/november/Oyedokun-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjlis/pdf/2018/november/Oyedokun-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Assessment and evaluation of the capacity of clinical laboratories at South Kordofan State for the diagnosis of Malaria</b><br />
Afnan Ibrahim Mustafa* and Alamin Abdul Alkreem<br />
J. Bio. Res. Nov 2018 4 (3) 15-19 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2018/november/Mustafa-and-Alkreem.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2018/november/Mustafa-and-Alkreem.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Post Myomectomy Pain Management at University of Port Harcourt Teaching Hospital, Nigeria: A Case Report/Critical Analysis</b><br />
Eze Onyegbule Okubuiro<sup>a*</sup>, Longinus Ndubuisi Ebirim<sup>b</sup> and Chinwe Edith Okoli<sup>c</sup><br />
J. Med. Med. Sci. May 2018 5 (2) 7-12 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2018/october/Okubuiro-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2018/october/Okubuiro-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Design and Fabrication of a Portable Dry Groundnut Husk Peeling Machine</b><br />
Agbonkhese A. Kingsley<sup>1*</sup> and Afoegba S. Clement<sup>2</sup><br />
J. Eng. Man. Tech. Sept 2018 3 (3) 20-27 <br />
<a style="color:blue;" class="listjornal" href="pjemt/abstract/2018/september/Agbonkhese-and-Afoegba.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjemt/pdf/2018/september/Agbonkhese-and-Afoegba.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Impact of Work and Home Demands on Work Life Balance: Mediating Role of Work Family Conflicts</b><br />
Muhammad Atif Sheikh<sup>1*</sup>, Attiya Ashiq<sup>2</sup>, Muhammad Ramzan Mehar<sup>3</sup>, Ali Hasan<sup>4</sup> and Madiha Khalid<sup>5</sup><br />
J. Bus. Fin. Manage. Res. Sept 2018 4 (5) 48-57 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2018/september/Sheikh-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2018/september/Sheikh-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Impact of National Fadama III Development Project Intervention on Annual Income Generation among Beneficiaries in Nasarawa State, Nigeria</b><br />
Y Kuza<sup>1*</sup>, VA Okwoche<sup>2</sup> and AI Age<sup>2</sup><br />
J Plant. Agric. Res. September 2018 3(2): 6-10<br />
<a style="color:blue;" class="listjornal" href="pjpar/abstract/2018/september/Kuza-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpar/pdf/2018/september/Kuza-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>An Evaluation of the Legal and Regulatory Challenges of Electronic Banking System in Nigeria</b><br />
Muhammad Ramzan Mehar*, Mariam Naeem, Mariam Nazeer and Sana Arshad<br />
J. Bus. Fin. Manage. Res. Sept 2018 4 (5) 38-47 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2018/september/Mehar-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2018/september/Mehar-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Possible Health and Growth Implications of Prostitution in Nigeria: A Theoretical Perspective</b><br />
Mubaraq Dele Sulaimon<sup>1*</sup>, Adamu Auwal Muhammad<sup>2</sup> and Oluwafunmilayo Shofoyeke<sup>3</sup><br />
J. Afr. Stud. Dev. August 2018 4 (2) 9-17 <br />
<a style="color:blue;" class="listjornal" href="pjasd/abstract/2018/august/Mubarak-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjasd/pdf/2018/august/Mubarak-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Pre-copulatory Mate Choice in Relation to Age, Virginity, and Body Weight in <i>Spodoptera litura</i> (Lepidoptera: Noctuidae)</b><br />
Min-Rui Shi<sup>1, 2,</sup> Hong Yu<sup>1</sup>, Luo-Yan Zhang<sup>1</sup>, Jin Xu<sup>1, 2*</sup>, Peng Chen<sup>3</sup>, Yong-He Li<sup>1</sup><br />
J Plant. Agric. Res. July 2018 3(1): 1-5<br />
<a style="color:blue;" class="listjornal" href="pjpar/abstract/2018/july/Xu-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpar/pdf/2018/july/Xu-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Comparison of Respiratory Status between Semi-Fowler and Elevated Prone Position among Under 5 Years Old Children with Acute Respiratory Tract Infection in Ibrahim Malik Hospital Sudan</b><br />
Mariam Yousif Omer Elhussain<sup>1*</sup>, Huda Khalaf Al Ahmed masaad<sup>2</sup> and Suhair Salah Mohammed<sup>3</sup><br />
J. Bio. Res. May 2018 4 (2) 10-14 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2018/may/Elhussain-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2018/may/Elhussain-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>An Evaluation of the Legal and Regulatory Challenges of Electronic Banking System in Nigeria</b><br />
Tajudeen Tewogbola Lawal<sup>1*</sup>, Nureni Adekunle Lawal<sup>2</sup> and Adeniyi Adejuwon Akanbi<sup>3</sup><br />
J. Bus. Fin. Manage. Res. May 2018 4 (3) 21-29 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2018/may/Lawal-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2018/may/Lawal-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Influence of Porn Movie Exposure and Parenting Style on Adolescents’ Sexual Behaviour of State Senior High Schools of Kupang</b><br />
Maria Magdalena Bait*, Aloysius Liliweri and Pius Weraman<br />
J. Med. Med. Sci. May 2018 5 (1) 1-6 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2018/may/Bait-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2018/may/Bait-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>An Analysis of the Nomadic Fulani Herdsmen’s Violent Attacks in Southeastern Nigeria, and Their Effects on Adolescents</b><br />
Anthony S. Anih and Kaj Björkqvist*<br />
J. Afr. Stud. Dev. May 2018 4 (1) 1-8 <br />
<a style="color:blue;" class="listjornal" href="pjasd/abstract/2018/may/Anih-and-Bjorkqvist.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjasd/pdf/2018/may/Anih-and-Bjorkqvist.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Traffic Analysis of Grade Intersections and Measures of Congestion Mitigation at Indore</b><br />
Sitesh Kumar Singh* and Pawan Khubani<br />
J. Eng. Man. Tech. May 2018 3 (2) 10-19 <br />
<a style="color:blue;" class="listjornal" href="pjemt/abstract/2018/may/Singh-and-Khubani.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjemt/pdf/2018/may/Singh-and-Khubani.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Serum Troponin-I as a Cardiac Marker for Rheumatic Heart Disease among Sudanese Patients with Tonsillitis in Khartoum State</b><br />
Ahmed Alzubair Abd Elgader<sup>1</sup> and Mariam Abbas Ibrahim<sup>2*</sup><br />
J. Bio. Res. May 2018 4 (2) 6-9 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2018/may/Eldager-and-Ibrahim.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2018/may/Eldager-and-Ibrahim.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Social Business Innovation: Comparison of Operational Efficiency of Microfinance Institutions in Pakistan</b><br />
Ather Azim Khan, Faisal Mustafa, Ambreen Khursheed* and Faiza Siddiqui<br />
J. Bus. Fin. Manage. Res. May 2018 4 (3) 12-20 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2018/may/Khursheed-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2018/may/Khursheed-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Climate Change, Population Pressure and Agricultural Livelihoods in the West African Sahel (Special Reference to Northern Nigeria): A Review</b><br />
Basil U. Eze<br />
J. Ecol. Nat. Environ. May 2018 3 (1) 1-7 <br />
<a style="color:blue;" class="listjornal" href="pjene/abstract/2018/may/Eze.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjene/pdf/2018/may/Eze.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Role of the Public Service in Nigeria's Rebranding Project</b><br />
Azu, Victoria N* and Nwankwo, Chinemerem A<br />
J. Pol. Sci. Int. Rel. April 2018 4 (1) 1-9 <br />
<a style="color:blue;" class="listjornal" href="pjpsir/abstract/2018/april/Azu-and-Nwankwo.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpsir/pdf/2018/april/Azu-and-Nwankwo.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Factors influencing Customer Satisfaction in Hotel Industry: A Case of Pakistan</b><br />
Muneeb Ahmad* and Anika Sattar <br />
J. Bus. Fin. Manage. Res. Apr 2018 4 (2) 5-11 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2018/april/Ahmad-and-Sattar.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2018/april/Ahmad-and-Sattar.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>An Investigation to Improve the Mechanical Properties of A36 Steel Weldment</b><br />
Siedougha Clement Afoegba<br />
J. Eng. Man. Tech. April 2018 3 (1) 1-9 <br />
<a style="color:blue;" class="listjornal" href="pjemt/abstract/2018/april/Afoegba.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjemt/pdf/2018/april/Afoegba.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Aspartate Aminotransaminase, Alanine Aminotransaminase activities and AST/ALT ratio as Markers for Liver disease among Tonsillitis Patients in Khartoum state</b><br />
Afra Musa Ahmed<sup>1</sup> and Mariam Abbas Ibrahim<sup>2*</sup><br />
J. Bio. Res. March 2018 4 (1) 1-5 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2018/march/Ahmed-and-Ibrahim.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2018/march/Ahmed-and-Ibrahim.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>No More Production but Good Governance!</b><br />
Muneeb Ahmad<br />
J. Bus. Fin. Manage. Res. Feb 2018 4 (1) 1-4 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2018/february/Muneeb.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2018/february/Muneeb.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Trauma of Women Who Were Raped and Children Who Were Born as a Result of Rape during the Rwandan Genocide: Cases from the Rwandan Diaspora</b><br />
Jean d’Amour Banyanga, Kaj Björkqvist* & Karin Österman<br />
J. Afr. Stud. Dev. December 2017 3 (4) 31-39 <br />
<a style="color:blue;" class="listjornal" href="pjasd/abstract/2017/december/Bjorkqvist-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjasd/pdf/2017/december/Bjorkqvist-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>An Assessment of Financial Risk of Food Vendors in Calabar Metropolis, Cross River, Nigeria</b><br />
Asuquo, I.A., Enimu S*., Odey, G.N. and Eyo O.E.<br />
J. Bus. Fin. Manage. Res. Dec 2017 3 (8) 150-154 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/december/Enimu-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/december/Enimu-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Effects of Leech Salivary Extract (Lse) on Indices of Kidney Function in Rats, For Safe Application in Clinical Medicine</b><br />
Ojo Olufunmilola Praise<sup>1</sup>, Hausatu Babayi<sup>1*</sup>, Labake Fadikpe Ajoke<sup>1</sup>, Israel Kayode Olayemi<sup>1</sup>, Elisha Baba<sup>2</sup> and Oladosun Oluwale Peter<sup>3</sup><br />
J. Phar. Phar. December 2017 2 (1) 1-4 <br />
<a style="color:blue;" class="listjornal" href="pjpp/abstract/2017/december/Babayi-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpp/pdf/2017/december/Babayi-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Knowledge, Attitude and Perception of Secondary School Students on Ebola Hemorrhagic Fever Disease in Onitsha Metropolis, Anambra State, Nigeria</b><br />
Okonkwo VO<sup>12*</sup>, Udeze HE<sup>1</sup> and Ugochukwu VE<sup>2</sup><br />
J. Microbiol. Biotechnol. Res November 2017 3 (2) 10-14 <br />
<a style="color:blue;" class="listjornal" href="pjmbr/abstract/2017/november/Okonkwo-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmbr/pdf/2017/november/Okonkwo-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Mediating factors between overcrowding and adolescent antisocial behavior in Lagos, Nigeria</b><br />
Olaniyi Makinde, Kaj Björkqvist*, and Karin Österman<br />
J. Afr. Stud. Dev. November 2017 3 (3) 24-30 <br />
<a style="color:blue;" class="listjornal" href="pjasd/abstract/2017/november/Bjorkqvist-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjasd/pdf/2017/november/Bjorkqvist-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Model TIPIKOR Trial Based IT (Information Technology) Required in the Island for Implementing as Fast, Low Cost, and Simple Justice Principle</b><br />
Sulistyanta<sup>1*</sup>, Jauhari Effendi<sup>1</sup>, Sabastianus Adi Santoso Mola<sup>1</sup> and Fatma Ayu Jati Putri<sup>2</sup><br />
J. Pol. Sci. Int. Rel. October 2017 3 (3) 30-37 <br />
<a style="color:blue;" class="listjornal" href="pjpsir/abstract/2017/october/Sulistyanta-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpsir/pdf/2017/october/Sulistyanta-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Effectiveness of Public Service on Joint Office Administration System One of the Roof in Kupang City</b><br />
I Putu Adiyasa<br />
J. Bus. Fin. Manage. Res. Oct 2017 3 (7) 139-149 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/october/Adiyasa.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/october/adiyasa.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Invigorating the Teaching Profession for the 21st Century Teacher in Zambia</b><br />
Daniel L. Mpolomoka*, Selina Banda and Mbono Dube <br />
J. Educ. Res. Rev. October 2017 3 (4) 40-43 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2017/october/Mpolomoka-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2017/october/Mpolomoka-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Implementation Model of Maternal and Child Health Service Policy in East Nusa Tenggara Province</b><br />
Florentianus Tat<br />
J. Med. Med. Sci. October 2017 4 (5) 50-58 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2017/october/Florentianus.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2017/october/Florentianus.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Nano Biomaterials: A promising therapeutic strategy for skin wound healing in diabetic populations?</b><br />
Juan Du<sup>1</sup> and Xuelai Liu<sup>2*</sup><br />
J. Med. Med. Sci. October 2017 4 (5) 44-49 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2017/october/Du-and-Liu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2017/october/Du-and-Liu.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Importance of Gauge Stations along Nigerian Coastline</b><br />
Yiinu Needam<sup>1</sup> and Felix Ogbonna<sup>2*</sup><br />
J. Geogr. Reg. Plann. October 2017 3 (4) 25-31 <br />
<a style="color:blue;" class="listjornal" href="pjgrp/abstract/2017/october/Ogbonna-and-Needam.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgrp/pdf/2017/october/Ogbonna-and-Needam.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>A Comparative Study of Media Content in Print and online ‘Daily Nation’ Newspaper in Kenya</b><br />
Geoffrey T Ngoge* and Samwel N. Nyabera<br />
J. Educ. Res. Rev. October 2017 3 (4) 28-39 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2017/october/Ngoge-and-Nyabera.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2017/october/Ngoge-and-Nyabera.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Know About Biocompatibility of Dental Materials: A Review</b><br />
Naorem Jenny<sup>1*</sup>, Suraj Naorem<sup>2</sup>, Kishorchand Naorem<sup>3</sup> and Puyam Dhiraj Singh<sup>4</sup><br />
J. Med. Med. Sci. October 2017 4 (5) 33-43 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2017/october/Naorem-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2017/october/Naorem-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Typhoid Perforation: Presentation and Management Outcome North-Eastern Nigeria</b><br />
S Aliyu*, UD Babayo, MB Tahir, AB Zarami, AG Ibrahim and AG Madziga<br />
J. Med. Med. Sci. October 2017 4 (5) 29-32 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2017/october/Aliyu-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2017/october/Aliyu-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Methods of Identification in Forensic Dentistry: A Review</b><br />
Naorem Jenny<sup>1*</sup> and Puyam Dhiraj Singh<sup>2</sup><br />
J. Med. Med. Sci. September 2017 4 (4) 21-28 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2017/september/Naorem-and-Dhiraj.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2017/september/Naorem-and-Dhiraj.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Changing Pattern of Mechanical Bowel Obstruction and Management Outcome in North-Eastern Nigeria</b><br />
S Aliyu*, MB Tahir, UD Babayo, AB Zarami, AG Ibrahim and AG Madziga<br />
J. Med. Med. Sci. September 2017 4 (4) 18-24 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2017/september/Aliyu-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2017/september/Aliyu-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Implications of Census Data for National Manpower Planning in Nigeria</b><br />
Basil U. Eze*, Omole O. Oluyomi and Merit T. Ikechukwu<br />
J. Res. Environ. Stud. September 2017 3 (3) 18-24 <br />
<a style="color:blue;" class="listjornal" href="pjres/abstract/2017/september/Eze-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2017/september/Eze-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Implications of Census Data for National Manpower Planning in Nigeria</b><br />
Eze U. Basil<br />
J. Geogr. Reg. Plann. September 2017 3 (3) 18-24 <br />
<a style="color:blue;" class="listjornal" href="pjgrp/abstract/2017/september/Eze.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgrp/pdf/2017/september/Eze.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Influence of Politics and Ethnicity on Population Census Exercises in Nigeria</b><br />
Eze U. Basil<br />
J. Geogr. Reg. Plann. August 2017 3 (2) 11-17 <br />
<a style="color:blue;" class="listjornal" href="pjgrp/abstract/2017/august/Eze.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgrp/pdf/2017/august/Eze.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Accounting Information and Bond Market Liquidity Evidence from Nigerian Capital Market 2003-2012</b><br />
Uchechukwu Godwill Akpu* and Samuel Ojo Iwene<br />
J. Tax. Account. Man. August 2017 1 (2) 24-34 <br />
<a style="color:blue;" class="listjornal" href="pjtam/abstract/2017/august/Akpu-and-Iwene.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjtam/pdf/2017/august/Akpu-and-Iwene.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Tax Compliance Strategy and Tax Revenue Yield: Empirical Evidence from Rivers State, Nigeria (2007-2016)</b><br />
Uchechukwu Godwill Akpu<sup>1*</sup> and John Ohaka<sup>2</sup><br />
J. Tax. Account. Man. August 2017 1 (2) 9-23 <br />
<a style="color:blue;" class="listjornal" href="pjtam/abstract/2017/august/Akpu-and-Ohaka.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjtam/pdf/2017/august/Akpu-and-Ohaka.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Social Adaptability of Adolescent Students from divorce homes in Ghana</b><br />
Prince Yaw Adofo<sup>1*</sup> and Y. K. A. Etsey<sup>2</sup><br />
J. Psychol. Couns. July 2017 3(1) 1-7 <br />
<a style="color:blue;" class="listjornal" href="pjpc/abstract/2017/july/Adofo-and-Etsey.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpc/pdf/2017/july/Adofo-and-Etsey.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Implications of Social Networking Sites on University Student’s Academic Performance</b><br />
Samwel N. Nyabera <br />
J. Educ. Res. Rev. July 2017 3 (3) 17-27 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2017/july/Nyabera.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2017/july/Nyabera.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Traditional Judiya Leaders in Sudan as Actors of Humanitarian Diplomacy: Are They Eligible to Fulfill These Roles in the Darfur Humanitarian Crisis?</b><br />
Yasir Elfatih Abdelrahim Elsanousi <br />
J. Afr. Stud. Dev. July 2017 3 (2) 13-23 <br />
<a style="color:blue;" class="listjornal" href="pjasd/abstract/2017/july/Elsanousi.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjasd/pdf/2017/july/Elsanousi.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Audit Quality and Earnings Management among Nigerian Listed Deposit Money Banks</b><br />
Olabisi Jayeola*, Agbatogun Taofeek O and Akinrinlola Toluwalase O<br />
J. Tax. Account. Man. July 2017 1 (1) 1-8 <br />
<a style="color:blue;" class="listjornal" href="pjtam/abstract/2017/july/Olabisi-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjtam/pdf/2017/july/Olabisi-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Detection Rate of Urinary Schistosomiasis in El khiar Villages White Nile State, Sudan</b><br />
Sabah Alzain Mohamed Hassan and Elamin Abdelkreem*<br />
J. Bio. Res. July 2017 3 (5) 34-38 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2017/july/Hassan-and-Abdelkreem.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2017/july/Hassan-and-Abdelkreem.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Land Accessibility among Rural Farmers in Border Settlements of Ogun State, Nigeria</b><br />
Oladehinde Gbenga John<sup>1*</sup>, Fatusin Afolabi Francis<sup>2</sup> and Daramola Olawumi Johnson<sup>1</sup><br />
J. Geogr. Reg. Plann. July 2017 3 (1) 1-10 <br />
<a style="color:blue;" class="listjornal" href="pjgrp/abstract/2017/july/Oladehinde-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgrp/pdf/2017/july/Oladehinde-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Multiple Taxation and the Operations of Business Enterprises in Aba Metropolis</b><br />
Chukwuemeka Nwamuo<br />
J. Bus. Fin. Manage. Res. July 2017 3 (6) 132-138 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/july/Nwamuo.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/july/Nwamuo.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Origin of Iron Technology in Africa: The Abiriba Blacksmithing in Focus</b><br />
Onuoha Chidiebere<br />
J. His. Cul. July 2017 2 (1) 1-9 <br />
<a style="color:blue;" class="listjornal" href="pjhc/abstract/2017/july/Onuoha.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjhc/pdf/2017/july/Onuoha.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>China’s ‘One Belt, One Road’ Initiative. Just economics?</b><br />
Arnaldo M. A. Gonçalves<br />
J. Pol. Sci. Int. Rel. June 2017 3 (2) 13-29 <br />
<a style="color:blue;" class="listjornal" href="pjpsir/abstract/2017/june/Goncalves.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpsir/pdf/2017/june/Goncalves.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Value Management and Recessed Economy in Selected Food and Beverages Firms in Nigeria (2007-2016)</b><br />
Onyeizugbe Chinedu Uzochukwu<sup>1*</sup>, Eze Patrick Nwabueze<sup>1</sup> and Ugbomhe O. Ugbomhe<sup>2</sup><br />
J. Bus. Fin. Manage. Res. June 2017 3 (5) 121-131 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/june/Onyeizugbe-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/june/Onyeizugbe-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>3D Bio-Printing: A Promising Technique to Fabricate Dermal Equivalent for Skin Wound Healing</b><br />
Juan Du<sup>1</sup> and Xuelai Liu<sup>2*</sup><br />
J. Med. Med. Sci. May 2017 4 (3) 11-17 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2017/may/Du-and-Liu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2017/may/Du-and-Liu.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Dual Role of Religion Regarding the Rwandan 1994 Genocide: Both Instigator and Healer</b><br />
Jean d’Amour Banyanga and  Kaj Björkqvist<br />
J. Afr. Stud. Dev. May 2017 3 (1) 1-12 <br />
<a style="color:blue;" class="listjornal" href="pjasd/abstract/2017/may/Banyanga-and-Bjorkqvist.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjasd/pdf/2017/may/Banyanga-and-Bjorkqvist.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Assessment of Liver Function Tests among Alcoholisms in Sudan</b><br />
Asaad Ahmed Mustafa* and AbdElkarim A. Abdrabo<br />
J. Bio. Res. May 2017 3 (4) 29-33 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2017/may/Mustafa-and-Abdrabo.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2017/may/Mustafa-and-Abdrabo.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>A Recipe for a Successful Beginning for Adult Learners</b><br />
Peter T. Olszewski<br />
J. Educ. Res. Rev. May 2017 3 (2) 10-16 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2017/may/Olszewski.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2017/may/Olszewski.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Analysis of Some Selected Theories Applicable to Consumer Behaviour Research</b><br />
Ojo, James Olanipekun<sup>1*</sup> and Adedayo, Simeon Oludare<sup>2</sup><br />
J. Bus. Fin. Manage. Res. April 2017 3 (4) 112-120 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/april/Ojo-and-Adedayo.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/april/Ojo-and-Adedayo.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Insecticide Treated Nets: Perception And Practice Among Pregnant Women Accessing Antenatal Services At A Tertiary Hospital In Awka, Nigeria</b><br />
Ikeako LC<sup>1</sup>, Azuike EC<sup>2*</sup>, Njelita IA<sup>2</sup>, Nwachukwu CC<sup>2</sup>, Okafor KC<sup>3</sup>, Nwosu C<sup>4</sup>, Agbanu CM<sup>4</sup> and Ofomata UC<sup>4</sup><br />
J. Med. Med. Sci. March 2017 4 (2) 5-10 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2017/march/Azuike-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2017/march/Azuike-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Bacterial Uropathogens And Their Antibiotic Susceptibility Pattern At Dessie Regional Health Laboratory</b><br />
Solomon Yilma Mitiku<br />
J. Microbiol. Biotechnol. Res March 2017 3 (1) 1-9 <br />
<a style="color:blue;" class="listjornal" href="pjmbr/abstract/2017/march/Mitiku.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmbr/pdf/2017/march/Mitiku.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Assessing the Association between Nutritional Status and Asymptomatic Malaria Parasitaemia of Children Under Five Years in Ghana</b><br />
Daniel Ayine Nyaaba<sup>1*</sup>, Patricia K. Brown<sup>2</sup> and Jacob K. Agbenorhevi<sup>3</sup><br />
J. Nut. and.  Met. March 2017 2 (1) 1-14 <br />
<a style="color:blue;" class="listjornal" href="pjnam/abstract/2017/march/Nyaaba-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjnam/pdf/2017/march/Nyaaba-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Levels of HS-CRP among Patients with Cardiovascular Disease Attending Emergency Units in Khartoum Hospitals</b><br />
Alaa Kamal Mubark* and AbdElkarim A. Abdrabo<br />
J. Bio. Res. March 2017 3 (3) 25-28 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2017/march/Mubark-and-Abdrabo.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2017/march/Mubark-and-Abdrabo.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Evaluation of the Performance of Preservation Methods in the Detection of <i>Schistosoma Haematobium Ova</i> in Urine Samples</b><br />
Safaa Elsheikh Idrees* and Elamin Abdelkareem Elamin<br />
J. Bio. Res. March 2017 3 (3) 21-24 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2017/march/Idrees-and-Elamin.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2017/march/Idrees-and-Elamin.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Impact of Interest Rate on Economic Growth in Nigeria</b><br />
Fatoumata Koumba Maiga<br />
J. Bus. Fin. Manage. Res. March 2017 3 (3) 98-111 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/march/Maiga.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/march/Maiga.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Cigarette Smoking is a Risk factor of Renal Functions Impairment</b><br />
Nizar Mohamed Farah<sup>1*</sup>, Salih Abdelgadir Elmahdi<sup>2</sup>, Khalid Gindeel Abu Baker<sup>3</sup> and AbdElkarim A. Abdrabo<sup>1</sup><br />
J. Bio. Res. February 2017 3 (2) 17-20 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2017/february/Farah-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2017/february/Farah-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Assessment of Prolactin Level Among Sudanese Psychiatric Subjects</b><br />
Nidal Rabih Mohamed*, Rimaz A. Qurashi and AbdElkarim A. Abdrabo<br />
J. Bio. Res. February 2017 3 (2) 12-16 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2017/february/Mohamed-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2017/february/Mohamed-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Serum Magnesium and Copper levels were associated with Ambulation in Type 2 Diabetic Patients</b><br />
Abo-Baker Mohammed Al-Amin<sup>1</sup>, Khalid Gindeel Abu-Baker<sup>2</sup> and AbdElkarim A. Abdrabo<sup>1*</sup><br />
J. Bio. Res. February 2017 3 (2) 7-11 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2017/february/Abdrabo-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2017/february/Abdrabo-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Impact of Foreign Direct Investment (Fdi) on the Growth of the Nigerian Economy</b><br />
Fatima Mai Hamza<br />
J. Bus. Fin. Manage. Res. February 2017 3 (2) 86-97 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/february/Hamza.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/february/Hamza.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Money, Banking and Financial Deepening:the Nigerian Experience</b><br />
Babarinde S.B, Ajala O.A and Suberu O.J*<br />
J. Bus. Fin. Manage. Res. February 2017 3 (2) 68-85 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/february/Suberu-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/february/Suberu-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Prevalence of Urinary Schistosomiasis among School Children in Nkarasi and Edor Communities in Ikom Local Government Area of Cross River State, Nigeria</b><br />
Akpan, S. S*, Dike, P.C and Mbah, M<br />
J. Med. Med. Sci. February 2017 4 (1) 1-4 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2017/february/Akpan-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2017/february/Akpan-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Impact Of State-Local Government Fiscal Relations On Primary Health Care Delivery In Abia State, Nigeria (1999-2014)</b><br />
Azu N. Victoria PhD<br />
J. Pol. Sci. Int. Rel. February 2017 3 (2) 1-12 <br />
<a style="color:blue;" class="listjornal" href="pjpsir/abstract/2017/february/Azu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpsir/pdf/2017/february/Azu.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>How Deep Small And Medium Enterprise Affecting Nigeria’s Economic Development</b><br />
Gloria Kainnee Gbappy, Gylych Jelilov* and Abdurrahman Isik<br />
J. Bus. Fin. Manage. Res. February 2017 3 (2) 57-67 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/february/Jelilov-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/february/Jelilov-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Relationship Between Economic Growth and Poverty Reduction in Nigeria</b><br />
Stephanie Gangas<br />
J. Bus. Fin. Manage. Res. February 2017 3 (2) 34-56 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/february/Gangas.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/february/Gangas.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>A Study on the Determinant of Customer Experience among Supermarket Shoppers in Saudi Arabia</b><br />
Shajahan Shamsudeen<br />
J. Bus. Fin. Manage. Res. January 2017 3 (1) 23-33 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/january/Shamsudeen.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/january/Shamsudeen.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Effects of Antipsychotic Drugs on Serum Biochemical Tests</b><br />
Maha Makeen, Joiria Abdelraheem, Shiraz Osman, Eman Abass, Khalid M. Adam and AbdElkarim A. Abdrabo*<br />
J. Bio. Res. January 2017 3 (1) 1-6 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2017/january/Abdrabo-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2017/january/Abdrabo-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Role of Leadership and Human Resource Development to Improve Effectiveness of Public Services (case study in Direcao Nacional de Transportes Terrestres Municipio Dili)</b><br />
Leoneto Madeira Martins<br />
J. Bus. Fin. Manage. Res. January 2017 3 (1) 17-22 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/january/Leoneto.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/january/Leoneto.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Job Embeddedness and Employee Performance of Selected Commercial Banks in Anambra State</b><br />
Onyeizugbe Chinedu* and Asiegbu Onyinye Becky<br />
J. Bus. Fin. Manage. Res. January 2017 3 (1) 8-16 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/january/Onyeizugbe-and-Asiegbu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/january/Onyeizugbe-and-Asiegbu.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Effect of Health Educational Program on Nurses Knowledge and practice Regarding Infection Control in Neonatal Intensive Care Unit at Pediatric Hospitals in Khartoum State, Sudan-2015</b><br />
Suhair S Mohmmed<sup>1*</sup> and Kalthoum Ibrahim Yousif<sup>2</sup><br />
J. Nur. Mid. January 2017 3 (1) 1-9 <br />
<a style="color:blue;" class="listjornal" href="pjnm/abstract/2017/january/Mohammed-and-Ibrahim.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjnm/pdf/2017/january/Mohammed-and-Ibrahim.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The PIPE Model and Core Tools for Teaching Innovation and Entrepreneurship in Chinese universities</b><br />
Hongyi Sun<br />
J. Educ. Res. Rev. January 2017 3 (1) 1-9 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2017/january/Sun.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2017/january/Sun.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Aspect of Inclusion in Sustainable Peace and Development</b><br />
Gylych Jelilov* and Modupe F. Aleshinloye<br />
J. Bus. Fin. Manage. Res. January 2017 3 (1) 1-7 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2017/january/Jelilov-and-Aleshinloye.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2017/january/Jelilov-and-Aleshinloye.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Inflation Targeting and Economic Growth in Nigeria</b><br />
Bello Zainab Saidu<br />
J. Bus. Fin. Manage. Res. December 2016 2 (10) 196-218 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/december/Saidu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/december/Saidu.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Impact of Unemployment on Economic Growth in Nigeria 1980 - 2010</b><br />
Hauwa Buba Jajere<br />
J. Bus. Fin. Manage. Res. December 2016 2 (10) 180-195 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/december/Jajere.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/december/Jajere.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Impact of Monetary Policy on the Economy of Nigeria</b><br />
Abdulazeez Mohammed Nasko<br />
J. Bus. Fin. Manage. Res. December 2016 2 (10) 163-179 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/december/Nasko.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/december/Nasko.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Impact of HIV/Aids on Human Capital and Economic Growth In Nigeria</b><br />
Fatima Binta Tijjani<br />
J. Bus. Fin. Manage. Res. December 2016 2 (10) 135-162 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/december/Tijjani.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/december/Tijjani.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>How Government Expenditure Effects On Economic Growth In Nigeria</b><br />
Felix Uchechukwu Konyeaso<br />
J. Bus. Fin. Manage. Res. December 2016 2 (10) 122-134 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/december/Abdulrahman.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/december/Abdulrahman.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Impact of Globalization on Nigerian Economy</b><br />
Felix Uchechukwu Konyeaso<br />
J. Bus. Fin. Manage. Res. December 2016 2 (10) 109-121 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/december/Konyeaso.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/december/Konyeaso.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Geospatial Semester: Developing Students’ 21st Century Thinking Skills with GIS: A Three Year Study</b><br />
Michael T. Charles<sup>1*</sup> and Robert A. Kolvoord<sup>2</sup><br />
J. Educ. Res. Rev. December 2016 2 (6) 67-78 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/december/Charles-and-Kolvoord.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/december/Charles-and-Kolvoord.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Effect of Hemodialysis on Serium Uric Acid, Urea, Creatinine and Albumin Level in Chronic Renal Failure Patients</b><br />
Mozdalifa Mohy Eldeen Mohamed Ahmed<sup>1*</sup> and Omar Fadul Idres<sup>2</sup><br />
J. Bio. Res. December 2016 2 (6) 48-51 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2016/december/Mozdalifa-and-Omar.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2016/december/Mozadalifa-and-Omar.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Hypermethylated promoter profiles for tumour supressor <i>APC</i>, p53, <i>MSH6</i> and <i>MGMT</i> genes in CRC tumours</b><br />
Ebru Sik<sup>1</sup>, Ozturk Ozdemir<sup>1,2*</sup>, Hande Kucuk Kurtulgan<sup>2</sup>, Mine Urfali<sup>1</sup>, Metin Sen<sup>3</sup>, Fatma Silan<sup>1</sup><br />
J. Bio. Res. December 2016 2 (6) 41-47 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2016/december/Ozdemir-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2016/december/Ozdemir-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Team Based Learning Application Exercises in Nursing Education: A Review of Literature</b><br />
Deborah U. Eti<br />
J. Educ. Res. Rev. December 2016 2 (6) 59-66 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/december/Deti.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/december/Deti.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Making of Perfumes from Essential Oils Extracted from Lavender Plant Collected from Egerton University, Main Campus Njoro, Kenya</b><br />
Paul Njenga Waithaka<sup>1*</sup>, Eliud Mugu Gathuru<sup>2</sup>, Benson Muriuki Githaiga<sup>2</sup> and Jane Mbithe Kwoko<sup>2</sup><br />
J. Bio. Res. December 2016 2 (6) 35-40 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2016/december/Waithaka-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2016/december/Waithaka-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Causes and Consequences of Forest Clearance in Kwainbana Game Reserve, Zamfara, Nigeria</b><br />
Sa’adu Mafara ABUBAKAR<sup>1*</sup>, Muhammad Nuraddeen DANJUMA<sup>2</sup> and Salisu MOHAMMED<sup>2</sup><br />
J. Geogr. Reg. Plann. October 2016 2(3) 33-39 <br />
<a style="color:blue;" class="listjornal" href="pjgrp/abstract/2016/october/Abubakar-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgrp/pdf/2016/october/Abubakar-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Mathiang Anyoor and the White Army: Violence as a Conflict Resolution Mechanism in South Sudan</b><br />
Ebenezer D. M. Akwanga, PhD <br />
J. Pol. Sci. Int. Rel. October 2016 2(2) 40-45 <br />
<a style="color:blue;" class="listjornal" href="pjpsir/abstract/2016/october/Akwanga.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpsir/pdf/2016/october/Akwanga.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Effect of Parental Presence in Decreasing Pain Level for Children during Venipuncture</b><br />
Tariq Mustafa Al–Abbass<sup>1</sup>, Raghad Hussein Abdelkader<sup>2*</sup>, Noordeen Shoqirat<sup>3</sup> and Hala Obeidat<sup>4</sup></h1><br />
J. Nur. Mid. October 2016 2(3) 12-19 <br />
<a style="color:blue;" class="listjornal" href="pjnm/abstract/2016/october/Abdelkader-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjnm/pdf/2016/october/Abdelkader-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Conceptualizing Growing Urban Centres: A Review from Literatures a reflection on studies of urban hubs</b><br />
Maglan Charles Sang’enoi<br />
J. Geogr. Reg. Plann. October 2016 2(3) 29-32 <br />
<a style="color:blue;" class="listjornal" href="pjgrp/abstract/2016/october/Sang'enoi.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgrp/pdf/2016/october/Sang'enoi.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Out Line for the Reduction of Incidental Capture of Dolphins in Bonga Purse Seine Fishery in Nigeria</b><br />
Eyo Ambrose<sup>1*</sup> and Justina Obienu<sup>2</sup><br />
J. Biodivers. Conserv. October 2016 1(4) 44-46 <br />
<a style="color:blue;" class="listjornal" href="pjbc/abstract/2016/october/Eyo-and-Obienu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbc/pdf/2016/october/Eyo-and-Obienu.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Nigerian Civil War: A Historical Interpretation</b><br />
Onuoha Chidiebere<br />
J. Afr. Stud. Dev. October 2016 2(4) 26-34 <br />
<a style="color:blue;" class="listjornal" href="pjasd/abstract/2016/october/Onuoha.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjasd/pdf/2016/october/Onuoha.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Reinventing Conservation Agriculture Practices beyond 21<sup>st</sup> Century’</b><br />
Eliud Garry Michura<br />
J. Res. Environ. Stud. October 2016 3(5) 55-66 <br />
<a style="color:blue;" class="listjornal" href="pjres/abstract/2016/october/Michura.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2016/october/Michura.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Internal Security threats in contemporary Ethiopia</b><br />
Daniel Mekonnen<br />
J. Pol. Sci. Int. Rel. October 2016 2(2) 35-39 <br />
<a style="color:blue;" class="listjornal" href="pjpsir/abstract/2016/october/Mekonnem.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpsir/pdf/2016/october/Mekonnem.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Fraudulent Reporting Practices by Satyam: A Case Study</b><br />
Madan Lal Bhasin<br />
J. Bus. Fin. Manage. Res. October 2016 2(9) 97-108 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/october/Bhasin.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/october/Bhasin.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The impact of weblog on performance of Iranian Intermediate EFL learners in EFL writing</b><br />
Mohammad Reza Aria and Siros Izadpanah*<br />
J. English. Lit. October 2016 2(3) 23-43 <br />
<a style="color:blue;" class="listjornal" href="pjel/abstract/2016/october/Aria-and-Izadpanah.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjel/pdf/2016/october/Aria-and-Izadpanah.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Implications of the Presence of Power Plants on Property Rents: The Case of Kinyerezi in Dar Es Salaam, Tanzania</b><br />
Kelvin Kimario and Charles Lucian*<br />
J. Res. Environ. Stud. September 2016 3(4) 49-56 <br />
<a style="color:blue;" class="listjornal" href="pjres/abstract/2016/september/Kelvin-and-Charles.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2016/september/Kelvin-and-Charles.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b><i>Jaltomata aijana (Solanaceae)</i> of Ancash, Peru</b><br />
Thomas Mione<sup>1*</sup>, Segundo Leiva González<sup>2</sup> and Leon Yacher<sup>3</sup><br />
J. Biodivers. Conserv. September 2016 1(3) 35-43 <br />
<a style="color:blue;" class="listjornal" href="pjbc/abstract/2016/september/Mione-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbc/pdf/2016/september/Mione-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Family Conflict and Sustainability of Family Owned Businesses in Lagos and Ogun States, Nigeria</b><br />
ADEDAYO, S . Oludare<sup>1</sup> and OJO, J. Olanipekun<sup>2*</sup><br />
J. Bus. Fin. Manage. Res. September 2016 2(8) 89-96 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/september/Ojo-and-Adedayo.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/september/Ojo-and-Adedayo.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Towards improving network installation in Plateau State University Bokkos</b><br />
Datukun Kalamba Aristarkus<sup>1*</sup>, Sellappan Palaniappan<sup>2</sup> and Tatchanaamoorti Purnshatman<sup>2</sup><br />
J. Comput. Inf. Sys. September 2016 1(1) 1-8 <br />
<a style="color:blue;" class="listjornal" href="pjcis/abstract/2016/september/Aristarkus-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjcis/pdf/2016/september/Aristarkus-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>A Forgotten Clinical Entity: Meckel’s Diverticulum (MD)</b><br />
Kulbir Kaur*, Ravi Kant Sharma, Rajan Kumar Singla, Jagdev Singh Kullar and Neelam Bala<br />
J. Afr. Stud. Dev. September 2016 2(3) 22-25 <br />
<a style="color:blue;" class="listjornal" href="pjasd/abstract/2016/september/Kaur-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjasd/pdf/2016/september/Kaur-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Sea turtle mortality in fishing gear: a review and Nigerian conservation efforts</b><br />
Eyo Ambrose<sup>1*</sup> and Amiye Francis<sup>2</sup><br />
J. Biodivers. Conserv. September 2016 1(3) 27-34 <br />
<a style="color:blue;" class="listjornal" href="pjbc/abstract/2016/september/Eyo-and-Amiye.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbc/pdf/2016/september/Eyo-and-Amiye.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Use of audio and knowledge acquisition in the online classroom</b><br />
Tracey Soper<br />
J. Educ. Res. Rev. September 2016 2(5) 55-58 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/september/Tracey.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/september/Tracey.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Intensity of Language of Instruction Problem in Tanzanian Universities: Is it a Numeracy and Literacy Background Case?</b><br />
Issaya Lupogo<br />
J. Educ. Res. Rev. September 2016 2(5) 48-54 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/september/Lupogo.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/september/Lupogo.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Effect of Music on Mental Conditions</b><br />
Shveata Misra* and Ina Shastri<br />
J. Psychol. Couns. September 2016 2(6) 35-43 <br />
<a style="color:blue;" class="listjornal" href="pjpc/abstract/2016/september/Misra-and-Shastri.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpc/pdf/2016/september/Misra-and-Shastri.pdf" target="_blank"> [Full Text - PDF] </a></p>


<p style="line-height:20px;"><b>Business Agility and Competitive Advantage of Selected Commercial Banks in Anambra State, Nigeria</b><br />
Hope N. Nzewi* and Patrick Moneme<br />
J. Bus. Fin. Manage. Res. September 2016 2(8) 81-88 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/september/Nzewi-and-Moneme.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/september/Nzewi-and-Moneme.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The analyses of heavy metal concentrations in soil, waste water and Raphanus sativus (L.) at three different growth stages</b><br />
Imran Khan<sup>1*</sup>, Abdul Ghani<sup>2</sup>, Abd-Ur-Rehman<sup>1</sup>, Samrah Afzal Awan<sup>1</sup>, Hina Jawed<sup>1</sup> and Rahimullah Gul<sup>1</sup><br />
J. Res. Environ. Stud. September 2016 3(4) 42-48 <br />
<a style="color:blue;" class="listjornal" href="pjres/abstract/2016/september/Khan-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2016/september/Khan-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>An Assessment of methods and Resources available for the Teaching and Learning of Adult Education in Tertiary Institution (A study of Adeniran Ogunsanya College of Education Otto-Ijanikin, Lagos)</b><br />
Saula Ayinla Shamsideen<br />
J. Educ. Res. Rev. September 2016 2(5) 43-47 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/september/Saula.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/september/Saula.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Factors Responsible for Improving Low Academic Performance on Adult Enrollees in Selected Literacy Centres in Ajeromi Ifelodun Local Government Area of Lagos State</b><br />
Saula Ayinla Shamsideen<br />
J. Educ. Res. Rev. September 2016 2(5) 37-42 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/september/Shamsideen.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/september/Shamsideen.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Arctium Lappa L. (Asteraceae); a New Invasive Highly Specific Medicinal Plant Growing in Egypt</b><br />
Salama M. El-Darier<sup>1*</sup> and Shaimaa G. Salama<sup>2</sup><br />
J. Pla. Agric. Res. September 2016 2(2) 44-53 <br />
<a style="color:blue;" class="listjornal" href="pjpar/abstract/2016/september/Salama-and-Salama.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpar/pdf/2016/september/Salama-and-Salama.pdf" target="_blank"> [Full Text - PDF] </a></p>


<p style="line-height:20px;"><b>Prevalence of Hiv/Aids and Pulmonary Tuberculosis Co-Infection among Patients Attending Some Health Centres of Bauchi Metropolis</b><br />
IIiyasu MY<sup>1*</sup>, Abbas HM<sup>2</sup> and Ashiegbu JN<sup>3</sup><br />
J. Microbiol. Biotechnol. Res. August 2016 2(2) 15-21 <br />
<a style="color:blue;" class="listjornal" href="pjmbr/abstract/2016/august/Iliyasu-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmbr/pdf/2016/august/Iliyasu-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Application of CA 125 in the Diagnosis and Follow up of Ovarian Cancer</b><br />
Randa E. Mohammed<sup>1</sup>, Rania M. SidAhmed<sup>1*</sup>, Ahmed M. Alhaj<sup>2</sup><br />
J. Med. Med. Sci. August 2016 3(3) 13-18 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/august/SidAhmed-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/august/SidAhmed-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Tarsal Tunnel Syndrome in Iraqi Patients with Type 2 Diabetes Mellitus</b><br />
Safaa Hussein Ali<br />
J. Educ. Res. Rev. August 2016 2(4) 34-36 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/august/Ali.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/august/Ali.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>A Preliminary record of the entomopathogenic fungus beauveria bassiana (Balsamo) viullemin as endophyte in Egypt</b><br />
Saad S. Mohamed El-Maraghy<sup>1</sup>, Mohamed A. A. Abdel-Rahman<sup>2</sup>, Khalid A. Hussein<sup>1</sup>, and Shimaa Hassan Mohamed Hassan<sup>1*</sup><br />
J. Microbiol. Biotechnol. Res. August 2016 2(2) 9-14 <br />
<a style="color:blue;" class="listjornal" href="pjmbr/abstract/2016/august/Hassan-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmbr/pdf/2016/august/Hassan-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Factors that can affect the quality of emergency obstetric care in the health center level in developing countries: a systematic review of the literature</b><br />
Rekiku Fikre <br />
J. Nur. Mid. August 2016 2(2) 7-11 <br />
<a style="color:blue;" class="listjornal" href="pjnm/abstract/2016/august/Fikre.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjnm/pdf/2016/august/Fikre.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Impact of Managerial Self-Interest on Corporate Capital Structure: (A Case of Selected Companies in Addis Ababa, Ethiopia)</b><br />
Fentaw Leykun <br />
J. Afr. Stu. Dev. August 2016 2(2) 8-21 <br />
<a style="color:blue;" class="listjornal" href="pjasd/abstract/2016/august/Leykun.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjasd/pdf/2016/august/Leykun.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Rapid population growth and Environmental degradation in Ethiopia: Challenges and Concerns</b><br />
Teklu W. Gebretsadik <br />
J. Ecol. Nat. Environ. August 2016 2(4) 18-24 <br />
<a style="color:blue;" class="listjornal" href="pjene/abstract/2016/august/Teklu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjene/pdf/2016/august/Teklu.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Bacteriological Assessment of Cassava Products in Makurdi Markets, Guinea Savanna, Nigeria</b><br />
JT Johnson<sup>1*</sup>, S Gbashi<sup>2</sup>, UP Ujong<sup>3</sup> and EO Onyenweaku<sup>4</sup><br />
J. Food Sci. Technol. August 2016 2(1) 1-4 <br />
<a style="color:blue;" class="listjornal" href="pjfst/abstract/2016/august/Theoph-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjfst/pdf/2016/august/Theoph-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Pathology of Speech: Aims and Causes</b><br />
Maysoon Alkaisi<sup>1*</sup> and Nadya Khairy<sup>2</sup><br />
J. Educ. Res. Rev. August 2016 2(4) 28-33 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/august/Alkaisi-and-Khairy.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/august/Alkaisi-and-Khairy.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Survey on Prevalence of Haemoparasites of Trade Camels (Camelus dromedarius) in Maiduguri; Nigeria</b><br />
Y. Wakil<sup>1*</sup>, J. R. Lawal<sup>1</sup>, Y. A. Gazali<sup>2</sup>, F. B. Mustapha<sup>3</sup>, A. M. Bello<sup>1</sup>, E. S. Mshelia<sup>1</sup> and A. M. Ayomikun<sup>1</sup><br />
J. Vet. Med. Anim. Sci. August 2016 1(2) 7-10 <br />
<a style="color:blue;" class="listjornal" href="pjvmas/abstract/2016/august/Wakil-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjvmas/pdf/2016/august/Wakil-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Overview and research plan for the introduction of conservation technologies in oceanic shrimp trawling in Nigeria</b><br />
Eyo Ambrose<sup>1*</sup> and Justina Obienu<sup>2</sup><br />
J. Biodivers. Conserv. July 2016 1(2): 22-26 <br />
<a style="color:blue;" class="listjornal" href="pjbc/abstract/2016/july/Eyo-and-Obienu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbc/pdf/2016/july/Eyo-and-Obienu.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Globalization and Terrorism: Corruption as a Case to Ponder</b><br />
Sunday Bobai Agang<br />
J. Law Conflict. Resolut. July 2016 2(1): 1-8 <br />
<a style="color:blue;" class="listjornal" href="pjlcr/abstract/2016/july/Agang.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjlcr/pdf/2016/july/Agang.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Accuracy and Performance of Different Clinical Laboratory Classes in the Sudan</b><br />
Siddig Bushra Mohamed<sup>1*</sup>, Amar Mohamed Ismail<sup>2</sup>, Salih Abdelgadir Elmahdi<sup>3</sup>, Abdelkarim A. Abdorabo<sup>4</sup> and Ismail Mohamed Ismail<sup>2</sup><br />
J. Bio. Res. July 2016 2(5): 31-34 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2016/july/Mohamed-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2016/july/Mohamed-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Impact of Psychological Empowerment on Employees’ Job Satisfaction: With Reference to Commercial Bank of Ethiopia, Gedeo Zone</b><br />
Gemechu Abdissa* and Teklemariam Fitwi<br />
J. Bus. Fin. Manage. Res. July 2016 2(7) 65-80<br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/july/Abdissa-and-Fitwi.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/july/Abdissa-and-Fitwi.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Acquired Tracheoesophageal Fistula- A Diagnostic Challenge, Representing as Recurrent Lower Respiratory Tract Infection</b><br />
Silky Arora, Gauri Chauhan*, Tegsimran Duggal and A.K Bhardwaj<br />
J. Med. Med. Sci. July 2016 3(3) 9-12 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2016/july/Chauhan-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2016/july/Chauhan-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Ambidexterity and Employee Performance of Selected Commercial Banks in Anambra State of Nigeria</b><br />
Onyeizugbe Chinedu U*, Orogbu Obiageli L and Asiegbu Onyinye B<br />
J. Bus. Fin. Manage. Res. July 2016 2(7) 58-64<br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/july/Onyeizugbe-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/july/Onyeizugbe-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Paradox of Using Interest Rate as Financial Incentive for the adoption of Financial Innovation and National Productivity in Nigeria</b><br />
Idowu Akinyele Akinwumi*, Patrick Ngumi and Willy Muturi<br />
J. Bus. Fin. Manage. Res. July 2016 2(7) 50-57<br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/july/Akinwumi-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/july/Akinwumi-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Sources of workplace bullying in institutions of higher learning</b><br />
Ilongo Fritz Ngale<br />
J. Psychol. Couns. July 2016 2(5) 28-34 <br />
<a style="color:blue;" class="listjornal" href="pjpc/abstract/2016/july/Ngale.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpc/pdf/2016/july/Ngale.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Oral Vaccination of Chickens against Infectious Bursal Disease (IBD) Using Parboiled Rice as Vaccine Vehicle</b><br />
J. R. Lawal<sup>1</sup>, A. G. Balami<sup>1</sup>, A. M. Bello<sup>1</sup>, Y. Wakil<sup>1</sup>, S. Y. Balami<sup>2</sup>, Y. Audu<sup>1</sup>, Y. M. Lekko<sup>1</sup> and U. I. Ibrahim<sup>1</sup><br />
J. Vet. Med. Anim. Sci. July 2016 1(1) 1-6 <br />
<a style="color:blue;" class="listjornal" href="pjvmas/abstract/2016/july/Lawal-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjvmas/pdf/2016/july/Lawal-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>African Humanism as a Socialist Solution to the Capitalist Underdevelopment Problems in Nigeria: A Philosophical Appraisal</b><br />
Macaulay A. Kanu<br />
J. Afr. Stud. Dev. July 2016 2(1) 1-7 <br />
<a style="color:blue;" class="listjornal" href="pjasd/abstract/2016/july/Macaulay.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjasd/pdf/2016/july/Macaulay.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Effect of Selected Plant Parts Extracts on Liver Injuries Induced by CCl4 <i>in vitro</i></b><br />
Yousif A. Elhassaneen*, Sherif S. Ragab and Amal A. Saleh<br />
J. Med. Plant. Res. July 2016 2(2) 8-20 <br />
<a style="color:blue;" class="listjornal" href="pjmpr/abstract/2016/july/Elhassaneen-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmpr/pdf/2016/july/Elhassaneen-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Sudan's Economic Decline and the Role of Fiscal and Monetary Policies in Sustaining Recovery</b><br />
Yagoub Elryah<br />
J. Econ. Int. Finance. June 2016 1(1) 14-19 <br />
<a style="color:blue;" class="listjornal" href="pjeif/abstract/2016/june/Elryah.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjeif/pdf/2016/june/Elryah.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Microbiological and Physicochemical Properties of Some Crude Oil Contaminated and Uncontaminated Agricultural Soils in Ondo State, Nigeria</b><br />
Ikuesan, Felix Adeleke*, Boboye, Bolatito Esther and Adetuyi, Fatusa Clement<br />
J. Microbiol. Biotechnol. Res. June 2016 2(1) 1-8 <br />
<a style="color:blue;" class="listjornal" href="pjmbr/abstract/2016/june/Ikuesan-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmbr/pdf/2016/june/Ikuesan-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Pattern of Smokeless Tobacco Use among the Women in Old Dhaka</b><br />
AE Noor<sup>1</sup>, J Begum<sup>2</sup>, AI Khan<sup>3</sup>, N Amin<sup>4</sup>, TG Chowdhury<sup>5</sup>, TM Shanta<sup>6</sup><br />
J. Dent. Oral Hyg. June 2016 2(1) 1-6 <br />
<a style="color:blue;" class="listjornal" href="pjdoh/abstract/2016/june/Noor-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjdoh/pdf/2016/june/Noor-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Comparison of Canadian and Bangladeshi Pension Systems and Implications on Economic Policy</b><br />
Jaan Islam<br />
J. Econ. Int. Finance. June 2016 1(1) 1-13 <br />
<a style="color:blue;" class="listjornal" href="pjeif/abstract/2016/june/Islam.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjeif/pdf/2016/june/Islam.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Exploratory fishery survey: a review and framework for implementation in Nigeria</b><br />
Ambrose, E. E* and Akanse, N. N<br />
J. Biodivers. Conserv. June 2016 1(1): 14-21 <br />
<a style="color:blue;" class="listjornal" href="pjbc/abstract/2016/june/Ambrose-and-Akanse.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbc/pdf/2016/june/Ambrose-and-Akanse.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Niger-Congo borrowings to English: Semantic changes and grammatical adaptation</b><br />
Mamadou Traore<sup>1*</sup> and Siaka Natalia<sup>2</sup><br />
J. English. Lit. June 2016 2(2): 12-22 <br />
<a style="color:blue;" class="listjornal" href="pjel/abstract/2016/june/Traore-and-Natalia.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjel/pdf/2016/june/Traore-and-Natalia.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Land Use Land Cover Change Detection through Remote Sensing Approach in Kano State Nigeria</b><br />
Sadiq Mukhtar<br />
J. Geogr. Reg. Plann. June 2016 2(2): 16-28 <br />
<a style="color:blue;" class="listjornal" href="pjgrp/abstract/2016/june/Mukhtar.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgrp/pdf/2016/june/Mukhtar.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Evaluation of Testosterone and PRL in Type 2 D.M Sudanese Male patients - Khartoum state: a Cross Sectional Study</b><br />
<sup>1</sup>Sara A. Osman, <sup>2*</sup>Salih A. Elmahdi and <sup>1</sup>AbdElkarim A. Abdrabo<br />
J. Bio. Res. June 2016 2(4): 25-30 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2016/june/Elmahdi-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2016/june/Elmahdi-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Prevalence of Immune Antibodies against red cell among TB Patients in Sokoto, North Western Nigeria</b><br />
Isaac IZ,<sup>1*</sup> Imoru M,<sup>1</sup> Udomah FP,<sup>1</sup> Erhabor O,<sup>1</sup> John RT<sup>2</sup> and McAnthony I<sup>1</sup><br />
J. Bio. Res. June 2016 2(4): 20-24 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2016/june/Zama-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2016/june/Zama-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Camarotoscena trjapitzini Loginova, a new record for Psylloidea (Hemiptera) from Iran</b><br />
Manouchehr Ezzati<sup>1</sup>, Ali Mehrvar<sup>1*</sup> and Zeinab Ahmadi<sup>2</sup><br />
J. Biodivers. Conserv. June 2016 1(1): 10-13 <br />
<a style="color:blue;" class="listjornal" href="pjbc/abstract/2016/june/Mehrvar-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbc/pdf/2016/june/Mehrvar-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Unethical Practices in Higher Institutions of Learning: A Case of Kenyan Universities</b><br />
Wamitu Susan Njeri<br />
J. Educ. Res. Res. June 2016 2(3): 15-27 <br />
<a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/june/Njeri.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/june/Njeri.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Mortality Resistance of Entrepreneurial ventures in Nigeria: the Road to sustainability and Longevity</b><br />
Chris U. Abeh Ukaidi<br />
J. Bus. Fin. Manage. Res. June 2016 2(6): 42-49 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/june/Ukaidi.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/june/Ukaidi.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Check list of Flora and vegetation of an archeological habitat in North Sudan</b><br />
Magda Ishag Mohammed Abdelkreem* and Dafaalla Ali Ibrahim<br />
J. Biodivers. Conserv. June 2016 1(1): 1-9 <br />
<a style="color:blue;" class="listjornal" href="pjbc/abstract/2016/june/Abdelkreem-and-Ibrahim.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbc/pdf/2016/june/Abdelkreem-and-Ibrahim.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Evaluation of D-dimer concentration in Pre-haemodialysis in Sudanese patients</b><br />
Emadaldeen I. Albasheer<sup>1*</sup>, Amira A. K. Humeida<sup>2</sup> and Yassir A. Amofti<sup>3</sup><br />
J. Bio. Res. May 2016 2(3): 16-19 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2016/may/Albasheer-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2016/may/Albasheer-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Impact of divorce on adolescent students in Ghana</b><br />
<sup>1</sup>Prince Yaw Adofo and <sup>2*</sup>Y. K. A. Etsey<br />
J. Psychol. Couns. May 2016 2(4): 21-27 <br />
<a style="color:blue;" class="listjornal" href="pjpc/abstract/2016/may/Adofo-and-Etsey.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpc/pdf/2016/may/Adofo-and-Etsey.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Implications of the Rank of Coal Deposit at Maiganga, Gombe, Nigeria</b><br />
Chibuisi Samuel Ikwuagwu* and Maduabuchi Uche Uzoegbu<br />
J. Geo. Min. Res. May 2016 2(2): 23-31 <br />
<a style="color:blue;" class="listjornal" href="pjgmr/abstract/2016/may/Ikwuagwu-and-Uzoegbu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgmr/pdf/2016/may/Ikwuagwu-and-Uzoegbu.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Small scale farming on wetland resource utilisation: a case study of Mandlazini, Richards Bay</b><br />
Mthiyane T.S, *Dlamini ET and Mncube DW<br />
J. Ecol. Nat. Environ. May 2016 2(3): 13-17 <br />
<a style="color:blue;" class="listjornal" href="pjene/abstract/2016/may/Dlamini-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjene/pdf/2016/may/Dlamini-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Communication Strategies and Appropriate Media for the Management of Security Challenges and Conflicts in Nigeria</b><br />
Nsikan-Abasi S. Nkana* and Enobong Nsikan Nkana<br />
J. Lib. Inf. Sci. May 2016 2(1): 48-53 <br />
<a style="color:blue;" class="listjornal" href="pjlis/abstract/2016/may/Nsikan-and-Enobong.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjlis/pdf/2016/may/Nsikan-and-Enobong.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Attitude of the Province Of Manitoba Residents towards Bisexualism and Homosexuality, Perception of University Of Manitoba Undergraduates</b><br />
Aladegbola Adebusayo Gabriel<br />
J. Psychol. Couns. May 2016 2(4): 16-20 <br />
<a style="color:blue;" class="listjornal" href="pjpc/abstract/2016/may/Adebusayo.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpc/pdf/2016/may/#.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Lean Production: A Frontier for Improving Performance of Oil and Gas Companies in Nigeria</b><br />
Onyeizugbe Chinedu Uzochukwu* and Ike Felix Ossai<br />
J. Bus. Fin. Manage. Res. May 2016 2(5): 35-41 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/may/Uzochukwu-and-Ossai.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/may/Uzochukwu-and-Ossai.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Democratic practice and development of ethnic militias in Nigeria</b><br />
Odoma U. Samuel<br />
J. Pol. Sci. Int. Relat. April 2016 2(1): 27-34 <br />
<a style="color:blue;" class="listjornal" href="pjpsir/abstract/2016/april/Odoma.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpsir/pdf/2016/april/Odoma.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Soil Suitability Assessment for Pearl Millet Cropping in Musawa Area, Katsina State, Nigeria</b><br />
Salisu Mohammed and Musa Musawa Ahmed*<br />
J. Plant. Agric. Res. April 2016 2(1): 37-43 <br />
<a style="color:blue;" class="listjornal" href="pjpar/abstract/2016/april/Ahmed-and-Mohammed.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpar/pdf/2016/april/Ahmed-and-Mohammed.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Financial incentives and financial innovation adoption in Nigeria (2005– 2010)</b><br />
Idowu Akinyele Akinwumi*, Willy Muturi and Patrick Ngumi<br />
J. Bus. Fin. Manage. Res. April 2016 2(4): 25-34 <br />
<a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/april/Akinwumi-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/april/Akinwumi-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>The Role of Intellectuals and Political Oratory in Modern Democracies</b><br />
Arnaldo M. A. Gonçalves<br />
J. Pol. Sci. Int. Relat. April 2016 2(1): 20-26 <br />
<a style="color:blue;" class="listjornal" href="pjpsir/abstract/2016/april/Goncalves.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpsir/pdf/2016/april/Goncalves.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Profitability and input-income determinants of broiler production systems in Edo State, Nigeria</b><br />
Eweka .K.I<sup>1</sup>* and Osarenren .C.O<sup>2</sup><br />
J. Plant. Agric. Res. April 2016 2(1): 31-36 <br />
<a style="color:blue;" class="listjornal" href="pjpar/abstract/2016/april/Eweka-and-Osarenren.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpar/pdf/2016/april/Eweka-and-Osarenren.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Climate Change is Natural</b><br />
Thomas T S Watson<br />
J. Geol. Min. Res. April 2016 2(1): 18-22 <br />
<a style="color:blue;" class="listjornal" href="pjgmr/abstract/2016/april/Watson.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgmr/pdf/2016/april/Watson.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Respiratory Tract Infection in Infant Orangutan (Pongo pygmaeus) at Orang Utan Island, Bukit Merah, Perak, Malaysia</b><br />
Sabapathy Dharmalingam<br />
J. Med. Med. Sci. April 2016 3(2): 5-9 <br />
<a style="color:blue;" class="listjornal" href="pjmms/abstract/2016/april/Dharmalingam.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2016/april/Dharmalingam.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Effects of Feeding Graded Levels of <em>Prosopis africana</em> Pulp (Kirya) on Growth and Economic Performance of Finishing Broiler Chickens in Tropical Environment</b><br />
Yusuf SZ<sup>1*</sup>, Igwebuike JU<sup>2</sup>, Dunya AM<sup>2</sup> and Husa H<sup>3</sup><br />
J. Plant. Agric. Res. April 2016 2(1): 26-30 <br />
<a style="color:blue;" class="listjornal" href="pjpar/abstract/2016/april/Yusuf-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpar/pdf/2016/april/Yusuf-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Non Inclusion of Homosexuality in the 1980 Diagnostic Statistical Manual of Mental Disorder Iii - Perception of Indiana State Resident Psychologists in the United States of America</b><br />
Aladegbola Adebusayo Gabriel<br />
J. Psychol. Couns. April 2016 2(3): 11-15 <br />
<a style="color:blue;" class="listjornal" href="pjpc/abstract/2016/april/Adebusayo.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpc/pdf/2016/april/#.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Long-term characterization of sea conditions in the South China Sea</b><br />
Osinowo Adekunle Ayodotun<sup>1*</sup>, Xiaopei Lin<sup>1</sup>, Zhao Dongliang<sup>1 </sup> and Wang Zhifeng<sup>2</sup><br />
J. Res. Environ. Stud. March 2016 3(3): 33-41 <br />
<a style="color:blue;" class="listjornal" href="pjres/abstract/2016/march/Osinowo-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2016/march/Osinowo-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Roles of Forest Resources in Sustaining Rural Livelihoods around Yankari Game Reserve, Nigeria</b><br />
Y Usman<sup>1</sup>, MN Danjuma<sup>2*</sup> and IA Abdulkarim<sup>2</sup><br />
J. Geogr. Reg. Plann. March 2016 2(1): 11-15 <br />
<a style="color:blue;" class="listjornal" href="pjgrp/abstract/2016/march/Danjuma-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgrp/pdf/2016/march/Danjuma-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Assessment of Liver Functions among Sudanese Leukemic Patients in Khartoum State</b><br />
MA Alawad<sup>1</sup>, SA Elmahdi<sup>2</sup>, SA Ahmed<sup>1</sup>, AA Abdrabo<sup>1</sup>*<br />
Pyrex Journals Bio. Res. March 2016 2(2): 7-15 <br />
<a style="color:blue;" class="listjornal" href="pjbr/abstract/2016/march/Abdrabo-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2016/march/Abdrabo-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>As I See It: The Cry of the Community Psychiatric Nurse in Ghana</b> <br />
  Frederick Yaw Opare<sup>1*</sup>, Peter Adatara<sup>1</sup>, Anthony Kuug<sup>1</sup>, Felix Nyande<sup>1</sup>, Mabel Avane Apaanye<sup>1</sup>, Francisca Achaliwie<sup>1</sup> and Jerry Paul K Ninnon<sup>2</sup><br />
  Pyrex Journals Nurs. Midw. March 2016 2(2): 7-15 <br />
  <a style="color:blue;" class="listjornal" href="pjnm/abstract/2016/march/Opare-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjnm/pdf/2016/march/Opare-et-al.pdf" target="_blank"> [Full Text - PDF] </a></p>

<p style="line-height:20px;"><b>Evaluation of Chromium and Manganese level in Rheumatoid Arthritis Patients</b> <br />
  Sara Yousif Abdalla Arabi<sup>1*</sup>, SA Elmahdi<sup>2</sup>, SB Mohamed<sup>3</sup>, AA Abdrabo<sup>1</sup>
  </h1>
  <br />
  Pyrex Journals Bio. Res. March 2016 2(2): 7-10 <br />
  <a style="color:blue;" class="listjornal" href="pjbr/abstract/2016/march/Arabi-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2016/march/Arabi-et-al.pdf" target="_blank"> [Full Text - PDF] </a> </p>

<p style="line-height:20px;"><b>A Report of Personality Disposition and Pentazocine Abuse in Sickle Cell Anemia Patients: A report of two cases</b>
  <br />
  
  VC Onyencho<sup>1*</sup>, SK Pindar<sup>2</sup>, AA Mshelia<sup>1</sup>, AW Ibrahim<sup>2</sup>, AM Wakil<sup>2</sup> and AG Balogun<sup>3</sup>
  </h1>
  
  <br />
  Pyrex Journals Med. Med. Sci. March 2016 3(1): 001-004
  <br />
  <a style="color:blue;" class="listjornal" href="pjmms/abstract/2016/march/onyencho-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2016/march/onyencho-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>The Potential Effects of Reishi Mushroom (Ganoderma lucidum) Consumption on Bone Health Indices and Serum Minerals Profile Disorders Induced by CCl<sub>4</sub> on Rats</b>
<br />

   Yousif A. Elhassaneen*, Sherif S. Ragab and Mona S. Salman
   </h1>

<br />
    Pyrex Journals Med. Pla. Res. March 2016 2(1): 001-007
<br />
    <a style="color:blue;" class="listjornal" href="pjmpr/abstract/2016/march/elhassaneen-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmpr/pdf/2016/march/elhassaneen-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Empirical Formulae Evaluation for Hydraulic Conductivity Determination Based on Grain Size Analysis</b>
<br />

   F Hussain* and G Nabi
   </h1>

<br />
    Pyrex Journals Res. Env. Stu. March 2016 3(3): 026-032
<br />
    <a style="color:blue;" class="listjornal" href="pjres/abstract/2016/march/hussain-and-nabi.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2016/march/hussain-and-nabi.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Waste or Wealth' the Cultural Crux Behind Scavenging in Urban Kano State, Nigeria</b>
<br />

   IB Lambu
   </h1>

<br />
    Pyrex Journals Res. Env. Stu. March 2016 3(3): 019-025
<br />
    <a style="color:blue;" class="listjornal" href="pjres/abstract/2016/march/lambu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2016/march/lambu.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Parents Educationists Perceptions on the Forms and Consequences of Child Sexual Abuse</b>
<br />

   Ebenuwa-Okoh E.E
   </h1>

<br />
    Pyrex Journals Psy. Cou. March 2016 2(2): 005-010
<br />
    <a style="color:blue;" class="listjornal" href="pjpc/abstract/2016/march/okoh.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpc/pdf/2016/march/okoh.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>The Role of Adult Education as a Catalyst for Social change in Nigeria</b>
<br />

   SA Shamsideen
   </h1>

<br />
    Pyrex Journals Edu. Res. Rev. March 2016 2(2): 010-014
<br />
    <a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/march/saula.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/march/saula.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Entrepreneurship: Issues and Solutions Evidence From Nigeria</b>
<br />

   Gylych Jelilov<sup>1*</sup> and Evren Onder<sup>2</sup>
   </h1>

<br />
    Pyrex Journals Bus. Fin. Mgt. Res. March 2016 2(3): 010-013
<br />
    <a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/march/jelilov-and-onder.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/march/jelilov-and-onder.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Entrepreneurship in Nigeria Realities on Ground</b>
<br />

   Gylych Jelilov<sup>1*</sup> and Evren Onder<sup>2</sup>
   </h1>

<br />
    Pyrex Journals Bus. Fin. Mgt. Res. March 2016 2(3): 006-009
<br />
    <a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/march/jelilov.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/march/jelilov.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>A Cross Sectional Study to Examine Perspective of Nursing Unit Managers on Factors Affecting the Effective Performance of Their Roles in the Volta Regional Hospital, Ghana</b>
<br />

   P Adatara<sup>1*</sup>, A Kuug<sup>1</sup>, F Nyande<sup>1</sup>, FY Opare<sup>1</sup>, MA Apaaye<sup>1</sup>, F Achaliwie<sup>1</sup> and W Dotse<sup>2</sup>
   </h1>

<br />
    Pyrex Journals Nur. Mid. February 2016 2(1): 001-006
<br />
    <a style="color:blue;" class="listjornal" href="pjnm/abstract/2016/february/adatara-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjnm/pdf/2016/february/adatara-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<p style="line-height:20px;">
<b>Teaching Millennials how to Study Under the 21<sup>st</sup> Century Sky</b>
<br />

   P Olszewski
   </h1>

<br />
    Pyrex Journals Edu. Res. Rev. February 2016 2(1): 001-009
<br />
    <a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/february/peter.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/february/peter.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<p style="line-height:20px;">
<b>Information of Use, Profile, Consumption and Health Disorders Related to Pesticide in the State of Sao Paulo, Brazil. Problem of Health due Pesticides in the State of São Paulo-Brazil, 2004 to 2014</b>
<br />

   Telma de Cassia dos Santos Nery<sup>1*</sup>, Rogério Araujo Christensen<sup>1</sup>, Clarice Umbelino de Freitas<sup>2</sup>, Roseane Maria Garcia Lopes de Souza<sup>1</sup>, Golda Schwartzman<sup>1</sup>, Farida Conceicao Pereira<sup>1</sup> and Graziela Almeida da Silva<sup>1</sup>
   </h1>

<br />
    Pyrex Journals Res. Env. Stu. February 2016 3(2): 010-018
<br />
    <a style="color:blue;" class="listjornal" href="pjres/abstract/2016/february/nery-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2016/february/nery-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<p style="line-height:20px;">
<b>Foreign Exchange Management in Nigeria: The Journey So Far</b>
<br />

   MI Oloye
   </h1>

<br />
    Pyrex Journals Bus. Fin. Mgt. Res February 2016 2(2): 012-016
<br />
    <a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/february/oloye.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/february/oloye.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Environmental Management Education for Sustainable Development in Nigeria</b>
<br />

   M.T. Obasi and J.A Ogwuche*
   </h1>

<br />
    Pyrex Journals Eco. Nat. Env. February 2016 2(2): 007-012
<br />
    <a style="color:blue;" class="listjornal" href="pjene/abstract/2016/february/mercy-and-jonathan.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjene/pdf/2016/february/mercy-and-jonathan.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<p style="line-height:20px;">
<b>Sustainability of Biogas Generated from Cow Dung as Household Fuel for Cooking</b>
<br />

   I Yerima
   </h1>

<br />
    Pyrex Journals Res. Env. Stu. February 2016 3(2): 007-009
<br />
    <a style="color:blue;" class="listjornal" href="pjres/abstract/2016/february/yerima.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2016/february/yerima.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>A Critical Review on Micro-financing of Small Businesses in Kenya</b>
<br />

   JO Maengwe<sup>1*</sup> and WI Otuya<sup>2</sup>
   </h1>

<br />
    Pyrex Journals Bus. Fin. Man. Res. February 2016 2(2): 006-011
<br />
    <a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/february/maengwe-and-otuya.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/february/maengwe-and-otuya.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<p style="line-height:20px;">
<b>Enhancing Corporate Environmental Management Through Environmental Management Systems</b>
<br />

   J Ogwuche* and M Obasi
   </h1>

<br />
    Pyrex Journals Eco. The. Nat. Env. January 2016 2(1): 001-006
<br />
    <a style="color:blue;" class="listjornal" href="pjene/abstract/2016/january/jonathan-and-mercy.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjene/pdf/2016/january/jonathan-and-mercy.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>The Influence of Social Media on Brand Equity in Kenyan Banking Industry</b>
<br />

   JO Owino<sup>1*</sup>, M Cherotich<sup>2</sup>, WP Karuri<sup>2</sup>, V Gitonga<sup>2</sup>, L Kimuya<sup>2</sup> and K Kaumbulu<sup>2</sup></h1>

<br />
    Pyrex Journals Bus. Fin. Man. Res. January 2016 2(1): 001-005
<br />
    <a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2016/january/owino-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2016/january/owino-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Management Requirements of Intelligent Transportation System in Civil Aviation: Kuwait Airport</b>
<br />

   Omer Nawaf Maaitah<sup>1*</sup>, Saif E. A. Al nawayseh<sup>2</sup> and Alhasan Ahmed Jandeel<sup>3</sup>

<br />
    Pyrx. J. Eng. Man. Tech. Jan (2016) 2(1): pp. 001-006
<br />
    <a style="color:blue;" class="listjornal" href="pjemt/abstract/2016/january/maaitah-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjemt/pdf/2016/january/maaitah-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<p style="line-height:20px;">
<b>Selection of Factors Responsible for Yoruba Language Extinction Using Feature Extraction Techniques</b>
<br />

   OI Aladesote<sup>1*</sup>, OV Johnson<sup>1</sup>, O Agbelusi<sup>2</sup> and C James<sup>2</sup></h1>

<br />
    Pyrx. J. Edu. Res. Rev. Jan (2016) 2(1): pp. 001-005
<br />
    <a style="color:blue;" class="listjornal" href="pjerr/abstract/2016/january/aladesote-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2016/january/aladesote-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<p style="line-height:20px;">
<b>Child Abuse and Addiction</b>
<br />

   Titik Haryati

<br />
    Pyrx. J. Psy. Cou. Jan (2016) 2(1): pp. 001-004
<br />
    <a style="color:blue;" class="listjornal" href="pjpc/abstract/2016/january/titik.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjpc/pdf/2016/january/titik.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<p style="line-height:20px;">
<b>Oncologic Surgery of the Lower limb: Anatomical and Functional Results of Cementation Associated with Internal Fixation in the Teaching Hospital of Bobo- Dioulasso (Burkina Faso)</b>
<br />

   PWH Dakoure<sup>1</sup>, Z Tiaho<sup>2</sup>, S Gandema<sup>2*</sup> and M Diallo<sup>1</sup>

<br />
    Pyrx. J. Bio. Res. Jan (2016) 2(1): pp. 001-006
<br />
    <a style="color:blue;" class="listjornal" href="pjbr/abstract/2016/january/gandema-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2016/january/gandema-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Physical and Microbiological Quality of Drinking Water Sources in Gwafan Community, Plateau State, Nigeria</b>
<br />

   CA Miner*, AP Dakhin, AI Zoakah, M Zaman and J Bimba

<br />
    Pyrx. J. Res. Env. Sci. Jan (2016) 3(1): pp. 001-006
<br />
    <a style="color:blue;" class="listjornal" href="pjres/abstract/2016/january/miner-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2016/january/miner-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Communication Strategies used by Omani EFL students</b>
<br />

   Rahma Awadh Al Alawi

<br />
    Pyrx. J. Eng. Lit. Jan (2016) 2(1): pp. 001-011
<br />
    <a style="color:blue;" class="listjornal" href="pjel/abstract/2016/january/rahma.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjel/pdf/2016/january/rahma.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Peace Value Education and Its Effects on the Attitude of Students</b>
<br />

   Aktepe Vedat

<br />
    Pyrx. J. Edu. Res. Rev. Dec (2015) 1(9): pp. 073-082
<br />
    <a style="color:blue;" class="listjornal" href="pjerr/abstract/2015/december/vedat.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2015/december/vedat.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Effect of Group Investigative Laboratory Strategies on Students' Achievement in Biology</b>
<br />

   OA Ogundiwin<sup>1*</sup>, OA Asaaju<sup>2</sup>, AI Adegoke<sup>3</sup> and AT Ojo<sup>1</sup>

<br />
    Pyrx. J. Res. Env. Stu. Dec (2015) 2(4): pp. 035-041
<br />
    <a style="color:blue;" class="listjornal" href="pjres/abstract/2015/december/ogundiwin-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2015/december/ogundiwin-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Association between Physical Activity and Obesity of Hail University Students in Hail, Saudi Arabia</b>
<br />

   Bandar H. Aloufi

<br />
    Pyrx. J. Nut. And. Met. Dec (2015) 1(3): pp. 014-015
<br />
    <a style="color:blue;" class="listjornal" href="pjnam/abstract/2015/december/bandar.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjnam/pdf/2015/december/bandar.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Hemoglobin level And Red Blood Cell Indices In Apparently Healthy Sudanese Blood Donors in Gezira state (Sudan)</b>
<br />

   AA Abbas<sup>1*</sup>, A.KH Khalil<sup>1</sup>, H Yasir<sup>2</sup>, S Fadlallah<sup>3</sup> and O Huwaida<sup>4</sup>

<br />
    Pyrx. J. Bio. Res. Dec (2015) 1(6): pp. 091-094
<br />
    <a style="color:blue;" class="listjornal" href="pjbr/abstract/2015/december/abbas-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2015/december/abbas-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<p style="line-height:20px;">
<b>White Blood Counts In Apparently Healthy Sudanese Blood Donors in Gezira State (Sudan)</b>
<br />

   AA Abbas<sup>1*</sup>, A.KH Khalil<sup>1</sup>, H Yasir<sup>2</sup>, S Fadlallah<sup>3</sup> and O Huwaida<sup>4</sup>

<br />
    Pyrx. J. Bio. Res. Dec (2015) 1(6): pp. 086-090
<br />
    <a style="color:blue;" class="listjornal" href="pjbr/abstract/2015/december/abbas.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2015/december/abbas.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<p style="line-height:20px;">
<b>Lipids Contents Differences in Plasma Phosphatidylcholine of Pregnant And Control Healthy Sudanese Women</b>
<br />

   Khalil A. KH<sup>1*</sup> and Ageeb M. SA<sup>2</sup>

<br />
    Pyrx. J. Bio. Res. Dec (2015) 1(6): pp. 081-085
<br />
    <a style="color:blue;" class="listjornal" href="pjbr/abstract/2015/december/khalil.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2015/december/khalil.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<p style="line-height:20px;">
<b>Hematotoxicity and Oxidative Stress Caused by Benzene</b>
<br />

   Ata Sedik Ibrahim Elsayed

<br />
    Pyrx. J. Bio. Res. Dec (2015) 1(6): pp. 074-080
<br />
    <a style="color:blue;" class="listjornal" href="pjbr/abstract/2015/december/sedik.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2015/december/sedik.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>DNA fragmentation and apoptosis caused by gasoline inhalation, and the protective role of green tea and curcumin</b>
<br />

   Ata Sedik Ibrahim Elsayed

<br />
    Pyrx. J. Bio. Res. Dec (2015) 1(6): pp. 068-073
<br />
    <a style="color:blue;" class="listjornal" href="pjbr/abstract/2015/december/ata.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2015/december/ata.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Brine Shrimp Lethality and Acute Oral Toxicity of Commiphora swynertonii (Burrt) Exudate</b>
<br />

   W Kalala<sup>1*</sup>, A Mwakigonja<sup>2</sup>, S Maregesi<sup>4</sup>, Z Msengwa<sup>3</sup> and R Mahunnah<sup>3</sup></h1>

<br />
    Pyrx. J. Med. Pla. Res. Dec (2015) 1(3): pp. 010-018
<br />
    <a style="color:blue;" class="listjornal" href="pjmpr/abstract/2015/december/kalala-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmpr/pdf/2015/december/kalala-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Organizational Correlates of Secondary Schools Teachers’ Job Commitment in Southern Senatorial District of Cross River State, Nigeria</b>
<br />

   WE Ekpiken* and ON Ogban

<br />
    Pyrx. J. Err. Res. Rev. Nov (2015) 1(8): pp. 069-072
<br />
    <a style="color:blue;" class="listjornal" href="pjerr/abstract/2015/november/ekpiken-and-ogban.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2015/november/ekpiken-and-ogban.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>The protective and ameliorative effect of green tea extract on antioxidant status of brain tissue exposed to oxidative stress</b>
<br />

   Ata Sedik Ibrahim Elsayed<sup>1*</sup>, Mohamed Abdulmonem Hegazi<sup>2</sup>, Hala Abd-ElAzim Mostafa<sup>2</sup> and Mona Mohamed Hegazi<sup>2</sup>

<br />
    Pyrx. J. Bio. Res. Nov (2015) 1(5): pp. 059-067
<br />
    <a style="color:blue;" class="listjornal" href="pjbr/abstract/2015/november/elsayed-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2015/november/elsayed-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Assessment of plasma Alanine Aminotransferase, Aspartate Aminotransferase and Alkaline Phosphatase activity among Sudanese Cannabis abuse People</b>
<br />

   S Mohamed<sup>1*</sup>, GA Modawe<sup>2</sup>, RA Gurashi<sup>1</sup>, SB Mohamed<sup>3</sup>, AA Abdrabo<sup>1</sup>

<br />
    Pyrx. J. Bio. Res. Nov (2015) 1(5): pp. 055-058
<br />
    <a style="color:blue;" class="listjornal" href="pjbr/abstract/2015/november/mohamed-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2015/november/mohamed-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>The Split-Function Effect of Renal Scintigraphy for the Evaluation of Renal Disorders Due to Tc- DTPA Pharmaceutical</b>
<br />

    Alamgir Hossain<sup>1*</sup> and Samiron Kumar Saha<sup>2</sup>

<br />
    Pyrx. J. Bio. Res. Nov (2015) 1(5): pp. 045-054
<br />
    <a style="color:blue;" class="listjornal" href="pjbr/abstract/2015/november/alamgir-and-samiron.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2015/november/alamgir-and-samiron.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Lithofacies, Petrology and Depositional Environment of Limestone in Ohafia–Ozu Abam Area in Southeastern Nigeria</b>
<br />

    O.S. Okon<sup>1*</sup> and M.U. Uzoegbu<sup>2</sup>

<br />
    Pyrx. J. Geo. Min. Res. Nov (2015) 1(1): pp. 007-017
<br />
    <a style="color:blue;" class="listjornal" href="pjgmr/abstract/2015/november/okon-and-uzoegbu.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgmr/pdf/2015/november/okon-and-uzoegbu.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Coagulation State in Diabetic Retinopathy in Type 2 Diabetic Sudanese Patients</b>
<br />

    MM ELTahir<sup>1</sup>, EA Abdelgadir<sup>2</sup>, SE Abdalla<sup>2*</sup>, AA Salman<sup>2</sup>, EM Abdelrahman<sup>3</sup> and M.M.H. Satti<sup>4</sup>

<br />
    Pyrx. J. Cli. Pat. For. Med. Nov (2015) 1(2): pp. 017-024
<br />
    <a style="color:blue;" class="listjornal" href="pjcpfm/abstract/2015/november/abdala-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjcpfm/pdf/2015/november/abdala-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Haematological Features and Serum Protein Pattern on Electrophoresis of Multiple Myeloma in Sudanese Patients</b>
<br />

    I.O.M Khair<sup>1</sup>, EM Abdelrahman<sup>2</sup>, EA abdelgadir<sup>3</sup>, SE Abdalla<sup>3*</sup>, IM osman<sup>4</sup>, A.A.K Humeida<sup>3</sup>, MM Eltahir<sup>5</sup> and AA Salman<sup>3</sup>
<br />
    Pyrx. J. Cli. Pat. For. Med. Nov (2015) 1(2): pp. 009-016
<br />
    <a style="color:blue;" class="listjornal" href="pjcpfm/abstract/2015/november/abdalla-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjcpfm/pdf/2015/november/abdalla-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Impacts of Mergers and Acquisition on the Performance of Nigerian Banks (A Case Study of Selected Banks)</b>
<br />

    MI Oloye* and G Osuma
<br />
    Pyrx. J. Bus. Fin. Mgt. Res. Nov (2015) 1(4): pp. 023-040
<br />
    <a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2015/november/oloye-and-osuma.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2015/november/oloye-and-osuma.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Assessment of Thyroid Hormones in Sudanese Patients with Down syndrome</b>
<br />

    GM Bahar<sup>1*</sup>, GA Modawe<sup>2</sup>, SA Ahmed<sup>1</sup>, AA Abdrabo<sup>1</sup>
<br />
    Pyrx. J. Bio. Res. Nov (2015) 1(5): pp. 042-044
<br />
    <a style="color:blue;" class="listjornal" href="pjbr/abstract/2015/november/bahar-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2015/november/bahar-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Reflections on Revolution in Theory and Practice</b>
<br />

    FN Enor* and J Chime
<br />
    Pyrx. J. His. Cul. Nov (2015) 1(2): pp. 013-016
<br />
    <a style="color:blue;" class="listjornal" href="pjhc/abstract/2015/november/enor-and-chime.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjhc/pdf/2015/november/enor-and-chime.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Some Aspects of the Petroleum Geochemistry of Tarsand Deposits in Western Nigeria</b>
<br />

    V.A. Ndukwe*, B.O. Ogunyinka and S. Abrakasa
<br />
    Pyrx. J. Geo. Min. Res. Nov (2015) 1(1): pp. 001-006
<br />
    <a style="color:blue;" class="listjornal" href="pjgmr/abstract/2015/november/ndukwe-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjgmr/pdf/2015/november/ndukwe-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Association of Pregnant Sudanese Women Plasma Essential Fatty Acids Levels and Their Neonates Head Circumference</b>
<br />

    Khalil A. KH<sup>1*</sup> and Ageeb M. SA<sup>2</sup>
<br />
    Pyrx. J. Bio. Res. Nov (2015) 1(5): pp. 038-041
<br />
    <a style="color:blue;" class="listjornal" href="pjbr/abstract/2015/november/khalil-and-ageeb.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbr/pdf/2015/november/khalil-and-ageeb.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Information as an Intellectual Resource: The Roles of Library in the Development of University Education in Nigeria</b>
<br />

    JA Yaya<sup>1*</sup>, EO Adeyanju<sup>2</sup>, K Adeeko<sup>3</sup> and MK Alawiye<sup>4</sup>
<br />
    Pyrx. J. Lib. Inf. Sci. Nov (2015) 1(5): pp. 041-047
<br />
    <a style="color:blue;" class="listjornal" href="pjlis/abstract/2015/november/yaya-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjlis/pdf/2015/november/yaya-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Utilization of Competitive Intelligence by Health Information Workers of the Nigerian Institute of Medical Research</b>
<br />

    ST Abolarinwa<sup>1</sup> and JA Yaya<sup>2*</sup>
<br />
    Pyrx. J. Lib. Inf. Sci. Nov (2015) 1(5): pp. 036-040
<br />
    <a style="color:blue;" class="listjornal" href="pjlis/abstract/2015/november/abolarinwa-and-yaya.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjlis/pdf/2015/november/abolarinwa-and-yaya.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Work Related Risk Factors and Pregnancy Outcome between Working Women  </b>
<br />

    Hathout et al
<br />
    Pyrx. J. Res. Env. Stu. Mar (2015) 2(3): pp. 015-019
<br />
    <a style="color:blue;" class="listjornal" href="pjres/abstract/2015/march/hathout-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2015/march/hathout-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Investigation of Anti-nociceptive Activity of Sage (Salvia officinalis) on Aacetic Acid induced Writhing in Rats</b>
<br />

    Fatemeh Baghiyan
<br />
    Pyrx. J. Bus. Fin. Mgt. Res. Mar (2015) 1(1): pp. 001-005
<br />
    <a style="color:blue;" class="listjornal" href="pjbfmr/abstract/2015/march/fatemeh.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjbfmr/pdf/2015/march/fatemeh.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Stability Constants of Rhenium (V) Metal Complexes with Selected Medicinal Drugs</b>
<br />

   Gamal A.H. Gouda
<br />
    Pyrx. J. Res. Env. Stu. Mar (2015) 2(2): pp. 006-014
<br />
    <a style="color:blue;" class="listjornal" href="pjres/abstract/2015/march/gamal.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2015/march/gamal.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Assessment of Pesticide Toxicity Using The Freshwater Amoeba Rosculus ithacus in vitro</b>
<br />

    Hikal et al
<br />
    Pyrx. J. Res. Env. Stu. Jan (2015) 2(1): pp. 008-012
<br />
    <a style="color:blue;" class="listjornal" href="pjres/abstract/2015/february/hikal-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2015/february/hikal-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>


<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Phytochemical Content And Anti-Inflammatory And Diuretic Activities Of Ethanol Extract Of Amaranthus Hybridus In Experimental Animal Model</b>
<br />

    OMODAMIRO O. D<sup>*1</sup> and JIMOH M.A<sup>2</sup>
<br />
    Pyrx. J. Med. Med. Sci. Jan (2015) 2(1): pp. 023-030
<br />
    <a style="color:blue;" class="listjornal" href="pjmms/abstract/2015/january/omodamiro-and-jimoh.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2015/january/omodamiro-and-jimoh.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Relational Satisfaction Within An Agricultural Education Informal Mentoring Among Lecturers In Tertiary Institution</b>
<br />

    Olatomide Waheed Olowa<sup>*1</sup> and Omowunmi A. Olowa
<br />
    Pyrx. J. Edu. Res. Rev. Jan (2015) 1(1): pp. 001-007
<br />
    <a style="color:blue;" class="listjornal" href="pjerr/abstract/2015/january/olatomide-and-omowunmi.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjerr/pdf/2015/january/olatomide-and-omowunmi.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Perceived Causes and Impacts of Buruli Ulcer and Societal Measures to Reduce Human Suffering from the Disease in the Nsawam-Adoagyiri Municipality of Ghana</b>
<br />

    Kwabena Asomanin Anaman<sup>*1</sup> and Ama Agyaa Aboagye
<br />
    Pyrx. J. Med. Med. Sci. Dec (2014) 1(2): pp. 013-022
<br />
    <a style="color:blue;" class="listjornal" href="pjmms/abstract/2014/december/kwabena-and-ama.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2014/december/kwabena-and-ama.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Dioxins: a review of its environmental risk</b>
<br />

    Hamidreza et al 
<br />
    Pyrx. J. Res. Env. Sci. Dec (2014) 1(1): pp. 001-007
<br />
    <a style="color:blue;" class="listjornal" href="pjres/abstract/2014/december/hamidreza-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjres/pdf/2014/december/hamidreza-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Antimicrobial Effect of Mangifera Indica Woodash on Bacterial Isolates From Human Skin</b>
<br />

    <sup>*1</sup>PIPI O. G and OMODAMIRO O.D
<br />
    Pyrx. J. Med. Med. Sci. Nov (2014) 1(1): pp. 008-012
<br />
    <a style="color:blue;" class="listjornal" href="pjmms/abstract/2014/november/pipi-and-omodamiro.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2014/november/pipi-and-omodamiro.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />


<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Correlation Between Parasympathetic Power and Left Ventricular Ejection Fraction in Diabetes</b>
<br />

    <sup>*1</sup>Manjusha Joshi, <sup>2</sup>Dr. K.D.Desai and <sup>3</sup>3Dr. M.S.Menon
<br />
    Pyrx. J. Med. Med. Sci. Nov (2014) 1(1): pp. 001-007
<br />
    <a style="color:blue;" class="listjornal" href="pjmms/abstract/2014/november/manjusha-et-al.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjmms/pdf/2014/november/manjusha-et-al.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />


<hr style="border:1px dotted #C8C8C8;"  />

<p style="line-height:20px;">
<b>Study on Effect of Die Corner Radius in Deep Drawing Process</b>
<br />

    <sup>*1</sup>Kondapalli Siva Prasad and <sup>2</sup>Chalamalasetti Srinivasa Rao
<br />
    Pyrx. J. Eng. Man. Tech. Nov (2014) 1(1): pp. 011-016
<br />
    <a style="color:blue;" class="listjornal" href="pjemt/abstract/2014/november/Kondapalli-Chalamalasetti.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjemt/pdf/2014/november/Kondapalli-Chalamalasetti.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />


<p style="line-height:20px;">
<b>An Overview of Machinability of Titanium Alloys</b>
<br />

    Venkateswara and Kesava
<br />
    Pyrx. J. Eng. Man. Tech. Nov (2014) 1(1): pp. 001-010
<br />
    <a style="color:blue;" class="listjornal" href="pjemt/abstract/2014/november/venkateswara-kesava.php">[Abstract]</a> &nbsp; <a style="color:blue;" class="listjornal" href="pjemt/pdf/2014/november/venkateswara-kesava.pdf" target="_blank"> [Full Text - PDF] </a>
</p>

<hr style="border:1px dotted #C8C8C8;"  />
 

 
 


		

			
		
		
		</div>
	
	
						<div style="clear:both;"></div>
                      <p>
			<table class="pagination">
				<tr>
					<td> <a class="listjornalt" href="#">< Previous</a></td>
					<td style="background-color:#CCCCCC;" ><a class="listjornalt" href="articles.php">1</a></td>
					<td><a class="listjornalt" href="#">2</a></td>
					<td><a class="listjornalt" href="#">3</a></td>
					<td><a class="listjornalt" href="#">4</a></td>
					<td><a class="listjornalt" href="#">5</a></td>
					<td><a class="listjornalt" href="#">6</a></td>
					<td><a class="listjornalt" href="#">Next ></a></td>
					
				</tr>
			
			</table>
			</p>
						
		<hr style="color:#F7F7F7;" />
		<p style="text-align:center; color:#333333;font-size:13px;">
		&copy; 2019 - Pyrex Journals | <span><a style="color:#003366;" class="listjornal" href="terms.php">Terms</a></span> | <span><a style="color:#003366;" class="listjornal" href="policy.php">Privacy policy</a></span> |
		</p>
		
	    <br />
	<br />

	</div>

</body>
</html>