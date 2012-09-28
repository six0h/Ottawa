<?php

require_once('config.php');
require_once('functions.php');
require_once('php-sdk/facebook.php');

$banned = check_bans();
if($banned > 0) {
	?>
	<script type="text/javascript">
		alert('Sorry, you are not eligible to enter.');
	</script>
	<?php

	exit();
}

$time = date('U');

$creds = array(
        'appId' => APP_ID,
	'secret' => APP_SECRET,
	'cookie' => true
);

$fb = new Facebook($creds);
$data = parse_signed_request($_POST['signed_request'],$creds['secret']);

$date = date('U');

?>

<!DOCTYPE html>
<html>

<head>

	<title>Tourism Montreal - Taste Montreal</title>
	<meta charset="utf-8" />

	<link rel="stylesheet" type="text/css" href="css/style.css?date=<?php $date; ?>" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery-form.js"></script>
	<script type="text/javascript" src="js/jquery-validate.js"></script>
	<script type="text/javascript" src="js/jquery-fancybox.js"></script>
	<script type="text/javascript" src="js/montreal.js?date=<?php $date; ?>"></script>

</head>

<body>

<div id="fb-root"></div>

<div id="page-wrapper">

	<div id="uno">

		<span class="copy"></span>
		<span class="enterbtn"><a href="#">Enter Here</a></span> 
		<span class="icons">
			<a class="icon1" href="http://www.tourisme-montreal.org">Tourism Montreal</a>
			<a class="icon2" href="http://www.tastemtl.com">Taste MTL</a> 
			<a class="icon3" href="http://www.aircanada.com">Air Canada</a>
		</span> 

	</div>

	<div id="dos">

		<span class="copy"></span>
		<ul class="error-wrapper"></ul>
		<span class="form">
			<form method="POST" id="contest_form" name="contest_form">
				<fieldset class="left">
					<label for="first_name">First Name*</label>
					<input type="text" id="first_name" name="first_name" />
					<label for="last_name">Last Name*</label> 
					<input type="text" id="last_name" name="last_name" />
					<label for="email">Email*</label>
					<input type="text" id="email" name="email" />
					<label for="province">City &amp; Province/State*</label>
					<input type="text" id="province" name="province" />
					<label for="country">Country*</label>
					<select name="country" id="country">
						<option value="---">---</option>
						<option value="USA">USA</option>
						<option value="CAD">Canada</option>
					</select>
				</fieldset> 
				<fieldset class="right">
					<input type="checkbox" id="newsletter" name="newsletter" CHECKED />
					<label for="newsletter">Sign-up for our newsletter</label><br />
					<input type="checkbox" id="terms" name="terms" />
					<label for="terms">I agree to the <a href="#rules" class="fancybox">terms & conditions</a>*</label><br />
					<input type="submit" name="submit" id="submit" />
					<input type="hidden" id="ip" name="ip" value="<?=$_SERVER['REMOTE_ADDR']?>">
					<input type="hidden" id="hostname" name="hostname" value="<?=$_SERVER['REMOTE_HOST']?>">
					<input type="hidden" id="agent" name="agent" value="<?=$_SERVER['HTTP_USER_AGENT']?>">
				</fieldset> 
			</form> 
			<br class="clear">
		</span> 
		<span class="icons">
			<!--<a class="icon1" href="http://www.tourisme-montreal.org">Tourism Montreal</a>
			<a class="icon2" href="http://www.tastemtl.com">Taste MTL</a> 
			<a class="icon3" href="http://www.aircanada.com">Air Canada</a> -->
		</span> 

	</div>

	<div id="tres">

		<span class="copy"></span>
		<span class="slideshow">
			<!-- Wrap Slider Elements in Spans to make them
			animate in seperately when page shows -->
			<ul id="thumbnails">
				<li class="lauren_desantis"><a href="#">Lauren DeSantis</a></li>
				<li class="darlene_horn"><a href="#">Darlene Horn</a></li> 
				<li class="mardi_michels"><a href="#">Mardi Michels</a></li> 
				<li class="mijune_pak"><a href="#">Mijune Pak</a></li>
				<li class="meghan_mallory"><a href="#">Meghan Mallory</a></li>
			</ul>
			<ul id="slides">
				<li class="lauren_desantis">
					<img src="img/bloggers/laurendesantis.jpg" alt="Lauren DeSantis">
					<span>
						<h1>Lauren DeSantis</h1>
						<p>Lauren DeSantis hosts and produces a television travel and food series highlighting the culinary and cultural riches of cities around the globe.  Her companion blog features the latest news in food, behind the scenes secrets about filming the show, recipes, travel, cocktails and more.</p> 
						<p><a href="http://capitalcookingshow.blogspot.ca" target="_blank">Capital Cooking Show</a></p>
						<h2>Restaurant: Van Horne</h2>
						<p>In a bright, refined setting enhanced by a harmonious balance of 20th century art objects and a soundtrack created by local personalities, the Van Horne serves a modern menu composed around seasonal delights. Specialties are regularly updated with something to satisfy every craving, from appetizers to small treats to big feasts to dishes that can easily be shared.</p>
						<p><a href="http://vanhornerestaurant.com" target="_blank">Van Horne</a></p>
					</span>
				</li>
				<li class="darlene_horn">
					<img src="img/bloggers/darlenehorn.jpg" alt="Darlene Horn">
					<span>
						<h1>Darlene Horn</h1> 
						<p>Started in 2005, Darlene's blog My Burning Kitchen has entertained the masses with her views on cooking, restaurants and pop culture. San Diego is her hometown and primary focus, but her travels and myriad interests also get the blog treatment. She feels the best way to get to know someone is over a good meal. She's also the author of the semi-autobiographical, food-based comic, The Girl with the Donut Tattoo.</p> 
						<p><a href="http://www.myburningkitchen.com/" target="_blank">My Burning Kitchen</a></p>
						<h2>Restaurant: Tavern Gaspar</h2>
						<p>Every night, drinks flow generously as our kitchen serves up fresh, pub-style cooking. The menu: soulful staples, original cocktails and friendly service in a classic tavern setting. The Chef offers accessible and comforting cuisine inspired by British Gastro Pubs with French and Quebecois accents.</p>
						<p><a href="http://www.tavernegaspar.com/index-en.html" target="_blank">Tavern Gaspar</a></p>
					</span>
				</li> 
				<li class="mardi_michels">
					<img src="img/bloggers/mardimichels.jpg" alt="Mardi Michels">
					<span>
						<h1>Mardi Michels</h1> 
						<p>Mardi is a full-time French teacher and the author of eat. live. travel. write. - a blog focusing on culinary adventures near and far. She has lived and worked as a teacher around the world and now calls Toronto home. As part of her job, she runs a cooking class once a week for 8-11 year-old boys, Les Petits Chefs. She's also a cook, baker, traveller, photographer, Food Network Canada contributor and Food Bloggers of Canada co-founder and in her spare time teaches French pastry classes around Toronto.</p> 
						<p><a href="http://eatlivetravelwrite.com/" target="_blank">eat. live. travel. write.</a></p>
						<h2>Restaurant: Chez Victoire</h2>
						<p>Located in the heart of the Plateau Mont-Royal, Chez Victoire serves bistro and refined cuisine, prepared with eco-responsible, local products, in a retro, relaxed, and convivial atmosphere.</p>
						<p><a href="http://chezvictoire.com/" target="_blank">Chez Victoire</a></p>
					</span>
				</li> 
				<li class="mijune_pak">
					<img src="img/bloggers/mijunepak.jpg" alt="Mijune Pak">
					<span>
						<h1>Mijune Pak</h1> 
						<p>Mijune is the creator of Follow Me Foodie one of the most recognized food and travel blogs in Canada. Her award-winning blog, infectious excitement &amp; passion for food makes her an influential &amp; entertaining voice in the culinary scene. She has also appeared on Food Network and created the hilarious video <a href="http://youtu.be/i86E-a0YKnI" target="_blank">S*** Foodies Say.</a></p> 
						<p><a href="http://www.followmefoodie.com" target="_blank">Follow Me Foodie</a></p>
						<h2>Restaurant: Chez L'&Eacute;picier</h2>
						<p>Chez L'&Eacute;picier is a restaurant that offers a fresh, creative, and refined menu. For the past ten years, Chef Laurent Godbout has reinvented Qu&eacute;bec gastronomy using local products that revive the palate. Chez L'&Eacute;picier is more than just a restaurant, it is also a fine grocery where one can obtain a wide array of "Les Saveurs de L'&Eacute;picier" products, as well as take out dishes that will satisfy even the greatest gourmets.</p>
						<p><a href="http://www.chezlepicier.com/" target="_blank">Chez L'&Eacute;picier</a></p>
					</span>
				</li>
				<li class="meghan_mallory">
					<img src="img/bloggers/meghanmallory.jpg" alt="Meghan Mallory">
					<span>
						<h1>Meghan Mallory</h1> 
						<p>Meghan is a Marketing and PR Consultant and writer of the blog Travel, Wine, and Dine. Meghan has also written for and been featured on a variety of other sites including the Visit Massachusetts blog, BostInnovation, Boston.com, and The Daily Meal. To balance out a love of food and wine, Meghan also enjoys outdoor activities such as boating, hiking, and running and is currently training for her 6th marathon.</p> 
						<p><a href="http://traveleatlove.com/" target="_blank">Travel. Wine. Dine.</a></p>
						<h2>Restaurant: Grain De Sel</h2>
						<p>Le Grain de Sel is a wonderful place to share a delightful experience in the culinary world of a thousand flavours.  The young owners Sandrine and Jean-François have honed their culinary skills for over ten years. It is a clever mix of fresh and local produce, warm and friendly service that offers a truly unpretentious, genuine and incredibly rich culinary experience.</p>
                        <p><a href="http://www.restolegraindesel.ca" target="_blank">Grain De Sel</a></p>
					</span>
				</li>
			</ul>
		</span> 
		<span class="left_arrow"><a href="#">Previous Blogger</a></span> 
		<span class="right_arrow"><a href="#">Next Blogger</a></span> 
		<span class="blogger_selector">
			<form method="POST" name="blogger_form" id="blogger_form">
				<input type="hidden" name="blogger" id="blogger" />
				<input type="hidden" name="blog_email" id="blog_email" />
				<input type="submit" name="blog_select" id="blog_select" />
			</form> 
		</span>

	</div>

	<div id="quattro">

		<span class="copy"></span>
		<span class="facebook">
			<a href="#">Share on Facebook</a> 
		</span> 
		<span class="twitter">
			<a href="#">Share on Twitter</a> 
		</span> 
		<span class="ticket">
			<span class="discover"><a href="http://www.tourisme-montreal.org/Discover-montreal/Montreal-by-theme/gastronomy/taste-mtl-montreal-new-gourmet-festival" target="_blank">Learn More</a></span> 
			<span class="explore"><a href="http://www.tourisme-montreal.org/blog/category/where-to-eat/" target="_blank">Go!</a></span> 
		</span> 
		<span class="icons">
			<a class="icon1" href="http://www.tourisme-montreal.org/Discover-montreal/Montreal-by-theme#&&/wEXAgURU3ViR3JvdXBBcnRpY2xlSWQFBTExMjIyBQpTdWJHcm91cElkBQEz" target="_blank">Tourism Montreal</a>
			<a class="icon2" href="http://www.tastemtl.com" target="_blank">Taste MTL</a> 
			<a class="icon3" href="http://www.aircanada.com" target="_blank">Air Canada</a> 
		</span> 

	</div> 

</div>

<div id="message">
	<p>Note: Contest is open to residents of Canada/USA only (residents of the province of Qu&eacute;bec are not eligible to participate).  Please see <a href="#rules" class="fancybox">Terms & Conditions</a></p>
</div>

<div id="rules">
	<p align="center"><strong>TOURISME MONTREAL 2012</strong><br />
  <strong>DINE WITH A BLOGGER CONTEST</strong></p>
<p>&nbsp;</p>
<p>OFFICIAL RULES</p>
<p><strong><em>NO PURCHASE OR PAYMENT OF ANY KIND IS NECESSARY TO ENTER OR TO WIN. &nbsp;A PURCHASE OR PAYMENT WILL NOT IMPROVE CHANCES OF WINNING.</em></strong></p>
<p>1. Agreement</p>
<p>These rules (the &ldquo;Contest Rules&rdquo;) govern the Tourism Montreal 2012 Dine with a Blogger Contest (the &ldquo;Contest&rdquo;). &nbsp;The act of entering the Contest constitutes your agreement with and acceptance of the Contest Rules and the decisions of the Sponsors (as defined below) which decisions shall be final and binding upon all Entrants (defined below). This Contest has not previously been offered. &nbsp;</p>
<p>2. Sponsors</p>
<p>The contest is organized by Think! Social Media Inc. on behalf of L&rsquo;office des congrès et du tourisme du Grand Montréal inc. (Tourism Montréal) (hereinafter, the &ldquo;Sponsors&rdquo;).<br />
  This Contest is in no way sponsored, endorsed or administered by, or associated with, Facebook. All Entrants (as defined below) are providing information to Sponsors and not to Facebook.</p>
<p>&nbsp;</p>
<p>3. Eligibility (<strong>residents of the province of Québec are not eligible to participate</strong>)</p>
<p>The Contest is open to legal residents of Canada and of the United States of America, except to residents of the province of Québec [.  Individuals entering the Contest may also be individually and collectively referred to herein as &ldquo;Entrant&rdquo; or &ldquo;Entrants&rdquo;.&nbsp; All Entrants must have reached the age of majority in their respective province, State or territory of residence at the time of entry in the Contest.  Excluded from the Contest are employees of any of the Sponsors, their representatives and agents, employees of the Sponsors&rsquo; respective corporate affiliates or advertising or promotional agencies, members of the immediate family of said persons or someone residing with said persons. The Sponsors shall have the right at any time to require proof of identity and/or eligibility to participate in the Contest. Failure to provide such proof may result in disqualification. All personal and other information requested by and supplied to the Sponsors for the purpose of the Contest must be truthful, complete, accurate and in no way misleading. The Sponsors reserve the right, in their sole discretion, to disqualify any Entrant should such an Entrant at any stage supply untruthful, incomplete, inaccurate or misleading personal details and/or information or does not otherwise comply with the Contest Rules.</p>
<p>Contest Entrants should be available to travel to Montreal for three days and two nights between November 8, 2012 and November 12, 2012 inclusively. By entering the Contest, Entrants acknowledge that they are legally and physically able to travel to and within Canada, and have the appropriate travel documents in their possession.</p>
<p>4. How to Enter Contest</p>
<p>The Sponsor has invited five bloggers (the &ldquo;Official Contest Bloggers&rdquo;) from Canada and the United States to promote the Contest via their blog. The Contest is organized as a promotional activity in connection with the &ldquo;Taste MTL/ Montreal Restaurant Week&rdquo; event.</p>
<p>a) To enter the Contest, an Entrant must do the following:</p>
<p>i) Visit Tourism Montreal&rsquo;s Facebook page at&nbsp;<u>www.facebook.com/Montreal</u>; </p>
<p>ii) On Tourism Montreal&rsquo;s Facebook page, click on the &ldquo;Dine with a Blogger&rdquo; tab, fill out the online registration form including his/her first name, last name, and email address; and </p>
<p>ii) Select (each selection, a &ldquo;Blogger Vote&rdquo;) one of the five Official Contest Bloggers(as defined below) as his/her choice of blogger to dine with at the VIP Dinner (as defined below) in the event that the Entrant is selected as the Grand Prize (as defined below) winner in this Contest.</p>
<p>The Official Contest Bloggers are:</p>
<ul>
  <li>Lauren&nbsp;DeSantis&nbsp;</li>
  <li>Darlene Horn </li>
  <li>Mardi Michaels </li>
  <li>Mijune Pak</li>
  <li>Meghan Mallory</li>
</ul>
<p>&nbsp;</p>
<p>b) Each Entrant may only submit one (1) Contest entry and vote. </p>
<p>c) The Contest entry period begins at 1 p.m. EDT on September 20, 2012 and ends at 11:59 p.m. EDT on October 21, 2012. Entries must be received by the Sponsors no later than 11:59 p.m. EDT on October 21, 2012.&nbsp;</p>
<p>5. Winner Selection</p>
<p>One (1) Grand Prize winner will be selected by random drawing from those Entrants who, when entering the Contest, selected the Official Contest Blogger who, at the close of the Contest Entry Period, received the most Blogger Votes (the &ldquo;Winning Blogger&rdquo;). The draw will be held on October 22 at 3:00 p.m. EDT at the offices of Think! Social media Inc. 410-1122 Mainland St, Vancouver BC, V6B 5L1, Canada. </p>
<p>The odds of being selected depend on the number of eligible Entrants, as well as the number of Blogger Votes received by the Winning Blogger.</p>
<p>The selected Entrant will be contacted by e-mail by a representative of the Sponsors no later than October 22, 2012 at 5:00 p.m. EST and must respond within forty-eight (48) hours.</p>
<p>If the selected Entrant cannot be contacted within this time period or fails to respond to any attempted contact within forty-eight (48) hours, he/she will be disqualified, his/her entry will be declared null and void and the Sponsors reserve the right, in their sole and absolute discretion, to select an alternate winner by drawing another name at random from the list of Entrants who had selected the Winning Blogger in their Contest entry form.</p>
<p>In order to be declared a winner and receive his/her prize, the selected Entrant must correctly answer, without assistance of any kind, a time limited mathematical skill-testing question to be administered by telephone and sign and return to the Sponsors within the required delay (see paragraph 7) a declaration of eligibility and release form.</p>
<p>The official announcement of the Grand Prize winner will be made online on October 25, 2012.</p>
<p>All Sponsors decisions are final</p>
<p>All decisions of the Sponsors at any phase of the Contest are final and binding in respect of any matter relating to this Contest and may not be challenged in any way. The Sponsors are not responsible for the failure for any reason whatsoever: (i) of a selected Entrant to receive notification or (ii) of the Sponsors to receive a selected Entrant&rsquo;s response.&nbsp;</p>
<p>6. Prize&nbsp;</p>
<p>One (1) grand prize (&ldquo;Grand Prize&rdquo;) winner will be selected in this Contest as described in Section 5 above (referred to herein as the &ldquo;Winner&rdquo;).</p>
<p>The Grand Prize consists of:&nbsp;</p>
<ul type="square">
  <li>Two (2) round-trip [coach]      airfare tickets for the Winner and his/her guest provided by Air Canada from any city in      Canada and the continental United States to Montréal from a North American      Air Canada gateway (up to but not exceeding a value of $1,000 CA for each      airplane ticket).&nbsp;</li>
</ul>
<p>&nbsp;</p>
<ul type="square">
  <li>Two (2) nights&rsquo; accommodation for two      people in one (1) double occupancy room, in a four-star hotel (total      approximate value of $700 CA).</li>
</ul>
<ul type="square">
  <li>Participation for the Winner and his/her      guest to one (1) dinner at a Montréal restaurant to be determined between      November 9 and November 11, 2012, with the Winning Blogger, a      representative from Tourism Montréal and including an appearance from the      selected restaurant&rsquo;s chef (the &ldquo;VIP Dinner&rdquo;).</li>
</ul>
<p>&nbsp;</p>
<p>Ground transportation for the Winner and his/her guest from the airport to the hotel on the day of arrival.</p>
<ul type="square">
  <li>A 3h guided city tour of Montreal and 2      Montreal Museum Passes (approximate value 250$)</li>
</ul>
<p>&nbsp;</p>
<p>The following conditions apply to the Grand Prize:</p>
<p>All other costs will be at the expense of the Winners and his/her guest. These include, but are not limited to, the cost of transportation to the airport from their place of residence, airplane ticket cost exceeding $1,000 CA per airplane ticket, transportation of luggage, meals and drinks not included in the package, fees related to hotel room mini bar, telephone, internet use, video games and films, gratuities, taxes, insurance and items of a personal nature.</p>
<p>Transportation by airplane: If the Winner decides not to travel by airplane or if the cost of transportation by Air Canada is less than $1 000 CA, no credit or reimbursement will be awarded.&nbsp;The tickets are non-transferable.</p>
<p>The approximate total value of the Grand Prize is $ 3500 CA. The actual retail value of the Grand Prize will depend on the fares at time of departure and the value of the hotel room during the period of stay. If the actual value of the trip turns out to be less than the stated approximate retail value, the difference will not be awarded in cash.  All prizes are <u>not</u> assignable or transferable and are <u>not</u> redeemable for cash.  </p>
<p>The Sponsors, at their entire discretion, reserve the right to substitute any portion or all of the Grand Prize with its equivalent in cash.</p>
<p>The Winner must comply with the Sponsors&rsquo; terms &amp; conditions.</p>
<p>Winner must be available to participate in the VIP Dinner on the date and at the times designated by the Sponsors. If a Winner and/or his/her guest is unable or unwilling to participate in the VIP Dinner or accept or otherwise redeem a prize on the terms it is awarded, such prize shall be forfeited and no cash or substitutes will be provided in whole or in part.</p>
<p>7. Conditions of Winner Receiving Prize</p>
<p>Prior to receiving the Grand Prize, the selected Entrant will be required to show valid photo ID and to sign a declaration of eligibility and release form (&ldquo;Release&rdquo;) (i) releasing the Sponsors and their advertising and promotional agencies, Facebook, the Official Contest Bloggers, their respective affiliates and their respective directors, officers, owners, partners, employees, agents, dealers, representatives, and successors (collectively &ldquo;Sponsors and Contest Related Parties&rdquo;) from any and all liability in connection with the Contest and/or the Grand Prize (including the related travel and dinning), (ii) confirming compliance with the Contest Rules, and (iii) consenting to the use of Winner&rsquo;s name, image, likeness, voice and biography, without further compensation, in any advertising, promotion or publicity (whether or not relating to this Contest) anywhere in the world carried out by the Sponsors and/or their advertising and promotional agencies. &nbsp;The signed Release must be received by Sponsors within five (5) business days of notification of selection or the Grand Prize may be forfeited and awarded to an alternate Entrant.</p>
<p>8. Release and Indemnification by Entrant</p>
<p>By entering this Contest, or by attempting to do so and/or by accepting a prize, each Entrant releases Sponsors and Contest Related Parties from any and all liability in connection with this Contest, including, without limitation, personal injury, death, property damage, as well as any claims based on publicity rights, defamation, or invasion of privacy.</p>
<p>9. Limitation of Liability</p>
<p>Sponsors and Contest Related Parties are not liable for any lost, late, missing, misdirected or stolen entries, or inability to process entries, or any errors, damage or negligence that may arise in connection with this Contest, including technical failures on the part of Contest software, viruses, website down-time, human error or property damage incurred by any Entrant. Entrant assumes any and all liability for injuries caused or claimed to be caused by participating in the Contest, or by the acceptance, possession, use or misuse of, or failure to receive any prize, including but not limited to personal injury, death, damage to, loss or destruction of property, rights of publicity or privacy, defamation, or portrayal in a false light. Sponsors and Contest Related Parties are not responsible for any errors or omissions in printing or advertising this Contest.</p>
<p>Sponsors and Contest Related Parties are released from all liability concerning the improper functioning of any website, computer component, software, lines of communication relating to the loss or absence of a communication network, or to any transmission that is faulty, incomplete, incomprehensible, or that is erased by any computer, network, or server that may hinder or prevent people from entering the contest. Sponsors and Contest Related Parties are further released from all liability for any loss or damage that may be caused to the Entrant, directly or indirectly, in whole or in part, by downloading any software or by the transmission of information for the purpose of entering the contest.</p>
<p>10. Privacy</p>
<p>By participating in the Contest, Entrant: (i) grants to the &nbsp;Sponsors the right to use his/her name, e-mail address and/or other personally identifiable information provided on Entrant&rsquo;s Contest entry form (&ldquo;Personal Information&rdquo;) for the purpose of administering the Contest, including but not limited to contacting and announcing the Winners and as otherwise contemplated in these Contest Rules; (ii) grants to the Sponsors the right to use his/her Personal Information for publicity and promotional purposes relating to the Contest as well as in connection with Sponsors&rsquo; (and their respective affiliates and successors&rsquo;) businesses, including, without limitation, their general advertising, promotional and publicity activities (whether or not relating to this Contest), in any and all media now known or hereafter devised, without further compensation unless prohibited by law; and (iii) acknowledges that the Sponsors may disclose his/her Personal Information to third-party agents and service providers of any of the Sponsors in connection with any of the activities listed in (i) and (ii) above. Personal Information will be collected, kept and used by Tourism Montreal in accordance with its privacy policy as published at <a href="http://www.tourisme-montreal.org/Privacy-Policy"target="_blank">http://www.tourisme-montreal.org/Privacy-Policy</a>.</p>
<p>11. Banning</p>
<p>The Sponsors may, in their sole discretion, prohibit any Entrant from entering the Contest whom it believes to be abusing the Contest Rules. Winners must at all times behave appropriately when taking part in the Grand Prize or any other Grand Prize-related events and observe these Contest Rules and any other rules or regulations in force at any Contest-related locations. The Sponsors reserve the right to remove from the Grand Prize-related events or locations any Winner and Winner&rsquo;s guest who breaks such rules and/or fails to behave appropriately and to disqualify such Winner.</p>
<p>12. Other</p>
<p>12.1 This Contest is governed by the laws of Quebec and the laws of Canada applicable therein and is void where prohibited by law.</p>
<p>12.2 The Sponsors reserve the right to cancel or modify the Contest or the Contest Rules at any time without notice.</p>
<p>12.3 All entries become the sole property of the Sponsors and none will be returned for any reason.&nbsp;</p>
<p>12.4 No communication or correspondence will be exchanged with Entrants except with those selected as Winners.</p>
<p>12.5 In the event of any discrepancy or inconsistency between the terms and conditions of these Contest Rules and disclosures or other statements contained in any Contest-related materials, including but not limited to the Contest entry form, or point of sale, television, print or online advertising, the terms and conditions of the Contest Rules shall prevail, govern and control.</p>
<p>12.6 Sponsors may suspend or discontinue the Contest if, in its sole opinion, there is any actual or suspected tampering of the Contest, or any other malfunction, event or activity that may affect the integrity of the Contest.</p>
<p>12.7 Sponsors reserve the right, at their sole discretion, to cancel or suspend the Contest should a virus, bug, or other issue that is beyond their reasonable control, corrupt the security or proper administration of the contest. Any attempt to deliberately cause damage to the website, or to undermine the legitimate operation of this contest, is a violation of criminal and civil laws. Should such an attempt be made, the Sponsors reserve the right to seek recourse and damages to the fullest extent permitted by law, including criminal prosecution.</p>
<p>12.8. If there is any confusion regarding the identity of an Entrant, Sponsors will assume the entry was submitted by the authorized account holder of the email address that was submitted during the Contest entry process. The individual who was assigned the email address, with the same domain associated with the submitted email address, is considered to be the authorized account holder. Selected Entrants may be required to provide proof that they are the authorized account holder of the email address associated with the selected entry. All entries must be submitted from a valid email account.</p>
<p>12.9 All intellectual property, including but not limited to trade-marks, trade names, logos, designs, promotional materials, web pages, source code, drawings, illustrations, slogans and representations are owned by the Sponsors and/or their licensors or affiliates. All rights are reserved. Unauthorized copying or use of any copyrighted material or intellectual property without the express written consent of its owner is strictly prohibited.</p>
<p>&nbsp;</p>
<p>12.10<strong> </strong>You may request a copy of these Contest Rules via email to Helen@thinksocialmedia.com or via postal mail to Think! Social Media, 410- 1122 Mainland St, Vancouver BC, V6B 5L1, Canada.  To learn the actual number of entries received and the Winner in this Contest, please visit the Tourism Montreal Facebook page (Facebook.com/Montreal) after October 25, 2012. <br />
   </p>
</div>

<input type="hidden" id="chosen_blogger" name="chosen_blogger" value="">

<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-25465482-1']);
	_gaq.push(['_setDomainName', 'ionflo.com']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

</script>

</body>
</html>
