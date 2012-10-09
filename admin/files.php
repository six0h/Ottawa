<?php

require_once('../config.php');

$order = '';
$options = array();
// CHECK DB FOR FILES
if(isset($_GET['sort'])) {
	$options['sort'] = $_GET['sort'];
} else {
	$options['sort'] = 'date';
}

if(isset($_GET['order'])) {
	// GENERATE ORDER LINK
	($_GET['order'] == 'asc') ? $order = 'desc' : $order = 'asc';

	$options['order'] = $_GET['order'];
} else {
	$options['order'] = 'asc';
}

$crit = array();
(isset($_GET['start']) && $_GET['start'] != '')
	? $start = strtotime($_GET['start'])
	: $start = strtotime('October 1, 2012');
(isset($_GET['end']) && $_GET['end'] != '')
	? $end = strtotime($_GET['end'])
	: $end = date('U');
	
$crit = array('date' => array('$gt'=> new MongoDate($start),'$lt'=> new MongoDate($end)));
	
$files = $db->select('files',$crit,$options);

?>
<form method="GET" action="<?=$_SERVER['PHP_SELF'];?>">
<label for="start">Start</label>
<input type="text" name="start" id="start"/>
<label for="end">End</label>
<input type="text" name="end" id="end"/>
<input type="submit" name="submit" id="submit" value="Lookup Date Range"/>
<input type="hidden" name="p" value="files"/>
</form>
<table id="file-list">
	<thead>
		<tr>
			<th>ID</th>
			<th><a href="<?=$_SERVER['PHP_SELF'];?>?p=files&sort=email&order=<?=$order?>">Email</a></th>
			<th><a href="<?=$_SERVER['PHP_SELF'];?>?p=files&sort=file&order=<?=$order?>">File</a></th>
			<th><a href="<?=$_SERVER['PHP_SELF'];?>?p=files&sort=type&order=<?=$order?>">Type</a></th>
			<th><a href="<?=$_SERVER['PHP_SELF'];?>?p=files&sort=date&order=<?=$order?>">Date</a></th>
		</tr>
	</thead>
	<tbody>
<?php foreach($files as $file) { ?>
		<tr>
			<td><?=$file['_id'];?></td>
			<td><?=$file['email'];?></td>
			<td><a href="<?=$file['file'];?>"><?=$file['file'];?></a></td>
			<td><?=$file['type'];?></td>
			<td><?=date('M d Y', $file['date']->sec)?></td>
		</tr>
<?php } ?>
	</tbody>
</table>
