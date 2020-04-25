<!doctype html>
<!-- https://github.com/murtaugh/HTML5-Reset -->
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. --> 

<head id="www-sitename-com" data-template-set="html5-reset">

	<meta charset="utf-8">
	
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>phpCart Shopping Cart Template</title>
	
	<meta name="title" content="phpCart Shopping Cart Template" />
	<meta name="description" content="" />
	<meta name="author" content="Dennis Daudelin, phpCart.net" />
	<!-- Google will often use this as its description of your page/site. Make it good. -->
	
	<meta name="google-site-verification" content="" />
	<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->

	<meta name="Copyright" content="2006 - 2013 Copyright phpCart.net" />
	
	<!--  Mobile Viewport Fix
	http://j.mp/mobileviewport & http://davidbcalhoun.com/2010/viewport-metatag
	device-width : Occupy full width of the screen in its current orientation
	initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
	maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width
	-->
	<!-- Uncomment to for fixed width screens-->
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1" />-->

	<!-- Uncomment to allow user to "pinch to zoom" -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Iconifier might be helpful for generating favicons and touch icons: http://iconifier.net -->
	<link rel="shortcut icon" href="%%TEMPLATEPATH%%img/favicon.ico" />
	<!-- This is the traditional favicon.
		 - size: 16x16 or 32x32
		 - transparency is OK -->
		 
	<link rel="apple-touch-icon" href="%%TEMPLATEPATH%%img/apple-touch-icon.png" />
	<!-- The is the icon for iOS's Web Clip and other things.
		 - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for retina display (IMHO, just go ahead and use the biggest one)
		 - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
		 - Transparency is not recommended (iOS will put a black BG behind the icon) -->
	
	<!-- concatenate and minify for production -->
	<link rel="stylesheet" href="%%TEMPLATEPATH%%css/reset.css" />
	<link rel="stylesheet" href="%%TEMPLATEPATH%%css/style.css" />
	
	<!-- This is an un-minified, complete version of Modernizr. 
		 Before you move to production, you should generate a custom build that only has the detects you need. -->
	<script src="js/modernizr-2.6.2.dev.js"></script>
    
	<script type="text/javascript"><!--
	var lastDiv = "";
	function showDiv(divName) {
		// hide last div
		if (lastDiv) {
			document.getElementById(lastDiv).className = "hiddenDiv";
		}
		//if value of the box is not nothing and an object with that name exists, then change the class
		if (divName && document.getElementById(divName)) {
			document.getElementById(divName).className = "visibleDiv";
			lastDiv = divName;
		}
	}
//-->
</script>

	<!-- Application-specific meta tags -->
	<!-- Windows 8 -->
	<meta name="application-name" content="" /> 
	<meta name="msapplication-TileColor" content="" /> 
	<meta name="msapplication-TileImage" content="" />
	<!-- Twitter -->
	<meta name="twitter:card" content="">
	<meta name="twitter:site" content="">
	<meta name="twitter:title" content="">
	<meta name="twitter:description" content="">
	<meta name="twitter:url" content="">
	<!-- Facebook -->
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
    
    <meta name="robots" content="NOINDEX, NOFOLLOW">

</head>

<body>

<div class="wrapper">

	<header>
		
		<div class="floatright headerHidden">
        	<img src="%%TEMPLATEPATH%%images/logo.gif" width="256" height="102">
            	
			<img src="%%TEMPLATEPATH%%images/headerimage_1.gif" width="24" height="102" ><img src="%%TEMPLATEPATH%%images/headerimage_2.gif" width="450" height="102" >
           
       </div>
	</header>
	
    <div class="clear"></div>
    
	<section>
		
		%%DATA%%
	
	</section>

	
	<footer>
		
		<p><small>
        	Copyright @ 2006 - 2013 Webrigger Internet Services. <br>
        	All Rights Reserved <br>
			<a href="http://www.phpcart.net" class="footer">phpCart.net</a> - php Shopping Cart
        </small></p>
		
	</footer>

</div>

<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
		 http://chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='js/jquery-1.9.1.min.js'>\x3C/script>")</script>

<!-- this is where we put our custom functions -->
<!-- don't forget to concatenate and minify if needed -->
<script src="%%TEMPLATEPATH%%js/functions.js"></script>

<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable. 
<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
-->



</body>
</html>