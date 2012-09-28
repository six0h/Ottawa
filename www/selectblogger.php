<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$success = 1;
$error = array();
$response = array('status' => 'success');

if(isset($_POST['first_name']) && $_POST['first_name'] != '' && isset($_POST['last_name']) && $_POST['last_name'] != '' && isset($_POST['email']) && $_POST['email'] != '') {

	try {
		$m = new Mongo();
		$db = $m->montreal;
	} catch (MongoException $e) {
		$error[] = $e->getMessage();
		$success = 0;
	}

	try {
		$existUser = $db->users->count(array('email' => $_POST['email']));
		if($existUser > 0) {
			$error[] = "Sorry, you've already entered the contest previously. You can change the blogger you chose on the next page if you like.";
			$response['status'] = "alreadyentered";
			$success = 0;
		}
	} catch (MongoException $e) {
		$error[] = $e->getMessage();
		$success = 0;
	}

	(isset($_POST['newsletter'])) ? $newsletter = 1 : $newsletter = 0;

	$user = array(
		'first_name' => $_POST['first_name'],
		'last_name' => $_POST['last_name'],
		'email' => $_POST['email'],
		'terms' => $_POST['terms'],
		'news' => $newsletter,
		'date' => new MongoDate()
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

echo json_encode($response);

?>
