<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
//header('Content-type: application/json');

require_once('../../config.php');
require_once(BASE_PATH . 'sdk/amazon/sdk.class.php');

$s3 = new AmazonS3();
$bucket = AWS_BUCKET;

$response = array('status'=>200);
$error = array();

if(isset($_POST['first_name'])
&& isset($_POST['last_name'])
&& isset($_POST['email'])
&& isset($_POST['city'])
&& isset($_POST['province'])
&& isset($_POST['postal_code'])
&& isset($_POST['clip_name'])
&& isset($_POST['agree'])) {

	if(isset($_POST['confirm']) && $_POST['confirm'] == 'false') {
		$confirm = false;
	} else {
		$confirm = true;
	}

	$response['confirm'] = $confirm;

	// CHECK IF USER EXISTS ALREADY
	try {
		$existUser = $db->count('users', array('email' => $_POST['email']));
	} catch (MongoException $e) {
		$error[] = $e->getMessage();
		$response['status'] = 500;
	}

	if($existUser > 0) {
		$error[] = "You are already registered with us, we'll add this file to your existing collection.\n";
		$response['status'] = 200;
	}

	($_POST['news'] == 'on') ? $news = 1 : $news = 0;

	$user = array(
		'first_name' => $_POST['first_name'],
		'last_name' => $_POST['last_name'],
		'email' => $_POST['email'],
		'city' => $_POST['city'],
		'postal_code' => $_POST['postal_code'],
		'province' => $_POST['province'],
		'agree' => $_POST['agree'],
		'news' => $news,
		'date' => new MongoDate(),
		'ip' => $_POST['ip'],
		'agent' => $_POST['agent']
	);

	switch($_POST['type']) {
		case 'photo':
			$upload_dir = UPLOAD_PATH . 'photos';
			$size_limit = 15728640;
		break;

		case 'music':
			$upload_dir = UPLOAD_PATH . 'sounds';
			$size_limit = 31457280;
		break;

		case 'video':
			$upload_dir = UPLOAD_PATH . 'videos';
			$size_limit = 110100480;
		break;
	}
			
	if($_FILES['clip']['size'] > $size_limit) {
		$response['status'] = 500;
		$error[] = 'Your file is too large, please scale it down.';
		$sizeCheck = '1';
	}

	if($response['status'] == 200 && $existUser == 0) {
		try {
			$db->insert('users', $user);
		} catch (MongoException $e) {
			$error[] = 'Could not insert user';
			$response['status'] = 500;
		}

	}

	if($response['status'] == 200) {

		if($_FILES['clip']['name'] != '') {
			$tmp = $_FILES['clip']['tmp_name'];
			$size = $_FILES['clip']['size'];
			$ext = getExtension($_FILES['clip']['name']);
			$actual_name = $user['email'].'-'.$_POST['clip_name'].'.'.$ext;

			$file = $s3->create_object(
				$bucket,
				$actual_name,
				array(
					'fileUpload'	=> $tmp,
					'storage'	=> AmazonS3::STORAGE_REDUCED,
					'acl'		=> AmazonS3::ACL_PUBLIC)
			);

			if(!$file) {
				$status = 500;
				$error[] = "Could not upload file.";
			}
		}

	}

	if($response['status'] == 200) {
		try {
			$fileInsert = array('email'=>$user['email'],'file'=>$file->header['x-aws-request-url'],'type'=>$_POST['type'],'date'=>new MongoDate());
			$db->insert('files', $fileInsert);
		} catch (MongoException $e) {
			$error[] = $e->getMessage();
			$response['status'] = 500;
		}
	}
	
} else {
	$error[] = 'You did not fill out all necessary fields';
	$response['status'] = 500;
}

$response['error'] = $error;
$response['email'] = $_POST['email'];
echo json_encode($response);

?>
