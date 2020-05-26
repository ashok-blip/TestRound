<?php 
include "db_config.php";
class User
{
	protected $db;
	public function __construct(){
		$this->db = new DB_con();
		$this->db = $this->db->ret_obj();
	}
	
	//To check login
	public function check_login($emailusername, $password){
	$password = md5($password);
	$query = "SELECT uid,uemail from users WHERE uemail='$emailusername' or uname='$emailusername' and upass='$password'";
	$result = $this->db->query($query) or die($this->db->error);
	$user_data = $result->fetch_array(MYSQLI_ASSOC);
	$count_row = $result->num_rows;
	
	if ($count_row == 1) {
		$token = sha1(rand());
		$query = "update users set token = '".$token."' WHERE uid = ".$user_data['uid'];
		$this->db->query($query) or die($this->db->error);
			return $token;
		}else{
			return false;
		}
	}

	public function getUserDetails($token){
		$query = "select fullname,utype FROM users WHERE token = '".$token."'";
		$result = $this->db->query($query) or die($this->db->error);
		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		return $user_data;
	}
}