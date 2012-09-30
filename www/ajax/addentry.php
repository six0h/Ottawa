<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

require_once('../../config.php');

$success = 1;
$error = array();

if(isset($_POST['first_name'])
&& isset($_POST['last_name'])
&& isset($_POST['email'])
&& isset($_POST['hometown'])
&& isset($_POST['province'])
&& isset($_POST['agree'])) {

	try {
		$existUser = $db->count('users', array('email' => $_POST['email']));
	} catch (MongoException $e) {
		$error[] = $e->getMessage();
		$success = 0;
	}

	if($existUser > 0) {
		$error[] = "Sorry, you've already entered the contest previously. You can change the blogger you chose on the next page if you like.";
		$response['status'] = "501";
		$success = 0;
	}

	(isset($_POST['newsletter'])) ? $news = 1 : $news = 0;

	$user = array(
		'first_name' => $_POST['first_name'],
		'last_name' => $_POST['last_name'],
		'email' => $_POST['email'],
		'province' => $_POST['province'],
		'agree' => $_POST['agree'],
		'news' => $news,
		'date' => new MongoDate(),
		'ip' => $_POST['ip'],
		'agent' => $_POST['agent']
	);

	if($success == 1) {
		try {
			$db->insert('users', $user);
		} catch (MongoException $e) {
			$error[] = 'Could not insert user';
			$response['status'] = '500';
		}
	}
	
} else {
	$error[] = 'You did not fill out all necessary fields';
	$response['status'] = '500';
}

$response['error'] = $error;
$response['email'] = $_POST['email'];
echo json_encode($response);

?>
