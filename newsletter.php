<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="object" />
<meta property="og:title" content="Newsletter" />
<meta property="og:description" content="Pyrex Journals Newsletter Subscription" />
<meta property="og:url" content="http://www.pyrexjournals.org/newsletter.php/" />
<meta property="og:site_name" content="Pyrex Journals" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="icon" href="images/favicon.ico"  type="image/x-icon">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="scripts/slides.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Newsletter</title>
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
	<div class="top-menu-container">
		<div class="sec-menu-container">
			<ul class="menu_ul">
				<li class="menu_li"><a  href="index.php">HOME</a></li>
				<li class="menu_li"><a  href="about-us.php">ABOUT US</a></li>
				<li class="menu_li"><a  href="contact.php">CONTACT US</a></li>
				<li class="menu_li"><a  href="newsletter.php">NEWSLETTER</a></li>
			</ul>
	    </div>
					<div style="clear:both;"></div>

	</div>
	
	<div class="banner-container">
		<div class="logo-container">
			<img src="images/logo.png" height="50" width="360"  />
		</div>
		
		<div class="search-container">
			<form action='index.php' id='searchform' method='get'>
                    <input id='s' name='q' onblur='if (this.value == &quot;&quot;) {this.value = &quot;Search&quot;;}' onfocus='if (this.value == &quot;Search&quot;) {this.value = &quot;&quot;;}' type='text' value='Search' />
                    <input class='search-image' src='images/search_img.png' title='Search' type='image'/>
                  </form>
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
					<li><img src="images/pjfst.jpg" width="960" height="200" /></li>
					<li><img src="images/pjmpr.jpg" width="960" height="200" /></li>
					<li><img src="images/pjar.jpg" width="960" height="200" /></li>
					<li><img src="images/pjmms.jpg" width="960" height="200" /></li>
					<li><img src="images/pjbr.jpg" width="960" height="200" /></li>
					<li><img src="images/pjmbr.jpg" width="960" height="200" /></li>
					<li><img src="images/pjerr.jpg" width="960" height="200" /></li>
					<li><img src="images/pjemt.jpg" width="960" height="200" /></li>
					<li><img src="images/pjres.jpg" width="960" height="200" /></li>
					<li><img src="images/pjbfmr.jpg" width="960" height="200" /></li>
				</ul>
	</div>

	<div class="main-body-wrapper">
		<div class="content-box-one">
			<div class="box-menu"><a class="listjornaled" href="about-us.php">About Us</a></div>
			<div class="box-menu"><a  class="listjornaled" href="contact.php">Contact Us</a></div>
			<div class="box-menu"><a  class="listjornaled" href="journals.php">Journals</a></div>
			<div class="box-menu"><a  class="listjornaled" href="authors-guide.php">Guide For Authors</a></div>
			<div class="box-menu"><a  class="listjornaled" href="publication-ethics.php">Publication Ethics</a></div>
			
			<br />
			<br />
			
			
		</div>
		
		
		
		
		<div class="content-box-two">
			<h1 style="font-size:20px; " class="box-header-blue">Subscribe To Our Newsletter</h1>
			<br />
			
			<p>
			To subscribe to our newsletter kindly submit the form below. Your email will be protected and will not be disclosed to a third party.
			</p>
			<br />
	
			<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contact@donnishjournals.org";
    $email_subject = "Newsletter";
     
     
    function died($error) 
	{
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']))
        {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }
     
    $first_name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
  
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
?>
 
 
<?php
}
?>
			<form name="contactform" method="post" action="newsletter-report.php">
<table align="left" style="font-family:'Habibi',serif; font-size:15px; color:#000000;" class="newsletter">
<tr>
 <td width="50" valign="top">
  <label for="name"> Name:</label> </td>
 <td width="422" valign="top"><input  type="text" name="name" maxlength="50" size="60" /></td>
</tr>

<tr>
 <td width="50" valign="top">
  <label for="email">Email:</label> </td>
 <td width="422" valign="top">
  <input  type="text" name="email" maxlength="80" size="60"> </td>
</tr>

<tr>
<td></td>
 <td width="422" valign="top">
  <input type="submit" value="Subscribe"></td>
</tr>
</table>
</form>
		
		</div>
	
	
						<div style="clear:both;"></div>
						
		<hr style="color:#F7F7F7;" />
		<p style="text-align:center; color:#333333;font-size:13px;">
		&copy; 2014 - Pyrex Journals | <span><a style="color:#003366;" class="listjornal" href="terms.php">Terms</a></span> | <span><a style="color:#003366;" class="listjornal" href="policy.php">Privacy policy</a></span> 
		</p>
		<br />
		<br />
	</div>

</body>
</html>
