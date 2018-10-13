<?php 
	require "db.php";
	class users extends db{
		public function login($user, $pass){
			$sql = "SELECT * FROM users WHERE username = '" .$user. "' AND password = '".$pass."'";
			$result = self::$conn->query($sql);
			if($result->num_rows < 1){
				return false;
			}
			else{
				return true;
				}
			
		}

		public function edituser($name, $pass){
			$sql = "UPDATE users SET password = '$pass' WHERE username = '$name'";
			$result = self::$conn->query($sql);
		}

		public function getuserByName($name){
			$sql = "SELECT * FROM users WHERE username = '$name'";
			$result = self::$conn->query($sql);
			return self:: getData($result);
		}

		public function alluser(){
			$sql = "SELECT * FROM users";
			$result = self::$conn->query($sql);
			return self:: getData($result);
		}

		public function adduser($user, $pass, $key){
			$sql = "INSERT INTO users (username, password, user_type) VALUES ('$user', '$pass', $key)";
			$result = self::$conn->query($sql);
		}
	}
 ?>