<?php

require_once('mongo.class.php');

class User {
	
	private	 	$user_id,
			$first_name,
			$email,
			$admin;

	private function __constructor() {
	
	}

	public static function find_by_email($id) {
		global $db;

		$record = $db->select('users', array('email' => $id));

		foreach($record as $item) {
			$objProp = array(
				'user_id' => $item['_id'],
				'first_name' => $item['first_name'],
				'email' => $item['email'],
				'admin' => $item['admin']);
		}
		$obj = self::instantiate($objProp);
		
		return $obj;
	}
	
	public static function check_login($email = '',$password = '') {
		global $db,$data;

		$success = 1;
		
		if($email != '' && $password != '') {
			$password = md5($password);
			$crit = array(
					'email' => $email,
					'password' => $password,
					'admin' => 1
				);
			$result = $db->count('users', $crit);	
		
			if($result == 1) {
				$record = $db->select('users', $crit);

				// CONVERT MONGO OBJECT TO ARRAY
				foreach($record as $item) { 
					$objProp = array(
						'user_id' => $item['_id'],
						'first_name' => $item['first_name'],
						'email' => $item['email'],
						'admin' => $item['admin']);
				}

				// INSTANTIATE USER OBJECT
				$obj = self::instantiate($objProp);

				return $obj;
			} else {
				return false;
			}
		} else {
			return false;
		}
		
	}

	public function get_user_id() {
		return $this->user_id;
	}

	public function get_first_name() {
		return $this->first_name;
	}

	public function get_email() {
		return $this->email;
	}

	public function is_admin() {
		return $this->admin;
	}

	private function instantiate($record) {
		$object = new self;
		foreach($record as $key=>$value) {
			$object->$key = $value;
		}
		return $object;
	}
	
}

?>
