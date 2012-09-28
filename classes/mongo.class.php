<?php

class Db {

	private		$m = '',
			$db_name = DB_NAME,
			$last_id;

	public function __construct() {

        	$uri = "mongodb://" . DB_USER . ":" . DB_PASS . "@localhost/" . DB_NAME; 
		$this->m = new Mongo($uri);	
		$m = $this->m;
		$db_name = $this->db_name;
		$this->db = $m->$db_name;

	}

	public function select($collection,$crit = array()) {
		$record = $this->db->$collection->find($crit);
		return $record;
	}

	public function count($collection,$crit) {
		$user = $this->db->$collection->count($crit);
		return $user;
	}

	public function insert($collection,$data) {
		$this->db->$collection->insert($data);
		$last_id = $data['_id'];
		$this->lastId = $last_id['$id'];
	}

	public function update($collection,$crit,$data) {
		$this->db->$collection->update($crit,$data);
	}

	public function remove($collection,$crit) {
		$this->db->$collection->remove($crit);
	}

	public function lastId() {
		return $this->lastId;
	}

}

$db = new Db(); 

?>
