<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$success = 1;
$error = array();
$response = array('status' => 'success');

if(isset($_POST['first_name']) && $_POST['first_name'] != '' && isset($_POST['last_name']) && $_POST['last_name'] != '' && isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['province']) && $_POST['province'] != '' && isset($_POST['country']) && $_POST['country'] != '') {

	try {
		$m = new Mongo('localhost', array('persist' => 'x'));
		$db = $m->montreal;
		$db->authenticate('montreal', 'letmein!');
	} catch (MongoException $e) {
		$error[] = $e->getMessage();
		$success = 0;
	}

	try {
		$existUser = $db->users->count(array('email' => $_POST['email']));
	} catch (MongoException $e) {
		$error[] = $e->getMessage();
		$success = 0;
	}

	if($existUser > 0) {
		$error[] = "Sorry, you've already entered the contest previously. You can change the blogger you chose on the next page if you like.";
		$response['status'] = "alreadyentered";
		$success = 0;
	}

	(isset($_POST['newsletter'])) ? $newsletter = 1 : $newsletter = 0;

	$user = array(
		'first_name' => $_POST['first_name'],
		'last_name' => $_POST['last_name'],
		'email' => $_POST['email'],
		'province' => $_POST['province'],
		'country' => $_POST['country'],
		'terms' => $_POST['terms'],
		'news' => $newsletter,
		'date' => new MongoDate(),
		'ip' => $_POST['ip'],
		'hostname' => $_POST['hostname'],
		'agent' => $_POST['agent']
	);

	if($success == 1) {
		try {
			$db->users->save($user);
		} catch (MongoException $e) {
			$error[] = 'Could not insert user';
			$response['status'] = 'fail';
		}
	} else {
		$response['errors'] = $error;
	}
	
} else {
	$error[] = 'You did not fill out all necessary fields';
	$response['status'] = 'fail';
}

$response['email'] = $_POST['email'];
echo json_encode($response);

?>
