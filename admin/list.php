<?php

$m = new Mongo();
$db = $m->montreal;
$db->authenticate('montreal', 'letmein!');

$users = $db->users->find();

$lauren = $db->users->count(array('blogger' => '0'));
$darlene = $db->users->count(array('blogger' => '1'));
$mardi = $db->users->count(array('blogger' => '2'));
$mijune = $db->users->count(array('blogger' => '3'));
$meghan = $db->users->count(array('blogger' => '4'));
$abandoned = $db->users->count(array('blogger' => array('$exists' => false)));

?>

<!DOCTYPE html>
<html>
<head>
	<title>Contest List</title>
	<meta charset="utf-8">
</head>

<body>

<table id="user_count">
	<thead>
		<tr>
			<th>Lauren</th>
			<th>Darlene</th>
			<th>Mardi</th>
			<th>Mijune</th>
			<th>Meghan</th>
			<th>Abandoned</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$lauren?></td>
			<td><?=$darlene?></td>
			<td><?=$mardi?></td>
			<td><?=$mijune?></td>
			<td><?=$meghan?></td>
			<td><?=$abandoned?></td>
		</tr>
	</tbody>
</table>
<hr />
<table id="user_table" name="user_table">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Province</th>
			<th>Country</th>
			<th>Blogger</th>
			<th>IP</th>
		</tr>
	</thead>
	<tbody>
<?php
foreach($users as $user) {
switch($user['blogger']) {
	case '0':
		$blogga = 'Lauren DeSantis';
	break;
	case '1':
		$blogga = 'Darlene Horn';
	break;
	case '2':
		$blogga = 'Mardi Michaels';
	break;
	case '3':
		$blogga = 'Mijune Pak';
	break;
	case '4':
		$blogga = 'Meghan Mallory';
	break;
	default:
		$blogga = 'Abandoned';
}
?>
		<tr>
			<td><?=$user['first_name']?></td>
			<td><?=$user['last_name']?></td>
			<td><?=$user['email']?></td>
			<td><?=$user['province']?></td>
			<td><?=$user['country']?></td>
			<td><?=$blogga?></td>
			<td><?=$user['ip']?></td>
		</tr>
<?php
}
?>
	</tbody>
</table>

</body>
</html>
