<?php

require_once('../config.php');
require_once('../functions.php');
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

$facebook = new Facebook($creds);
$sr = $facebook->getSignedRequest();

$liked = $sr['page']['liked'];

$date = date('U');

?>

<!DOCTYPE html>
<html>

<head>

	<title>Love Ottawa, Canada</title>
	<meta charset="utf-8" />

	<link rel="stylesheet" type="text/css" href="css/style.css?date=<?php $date; ?>" />
	<link rel="stylesheet" type="text/css" href="css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery-form.js"></script>
	<script type="text/javascript" src="js/jquery-validate.js"></script>
	<script type="text/javascript" src="js/jquery-fancybox.js"></script>
	<script type="text/javascript" src="js/ottawa.js?date=<?php $date; ?>"></script>

</head>

<body>

<div id="fb-root"></div>

<div id="page-wrapper">

<?php if($liked == 1) {
	require_once('pages.php'); 
} else { ?>
	<div id="like-gate"></div> 
<?php } ?>

</div>


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
