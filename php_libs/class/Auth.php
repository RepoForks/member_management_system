<?php

class Auth {

	private $authname; 
	private $sessname;

	public function __construct(){

	}

	public function set_authname($name){
		$this->authname = $name;
	}

	public function get_authname(){
		return $this->authname;
	}

	public function set_sessname($name){
		$this->sessname;
	}

	public function get_sessname(){
		return $this->sessname;
	}

	public function start(){
		if(session_status() === PHP_SESSION_ACTIVE){
			return;
		}
		if($this->sessname != ""){
			session_name($this->sessname);
		}
		session_start();
	}

	public function check(){
		if(!empty($_SESSION[$this->get_authname()]) && $_SESSION[$this->get_authname()]['id'] >= 1){
			return true;
		}
	}

	public function get_hashed_password($password) {
		$cost = 10;

		$salt = strtr(base64_encode(mcrypt_create_iv(16,MCRYPT_DEV_URANDOM)), '+', '.');

		$salt = sprintf("$2y$%02d$", $cost) . $salt;

		$hash = crypt($password, $salt);

		return $hash;
	}

	public function check_password($password, $hashed_password){
		if(crypt($password, $hashed_passord) == $hashed_password){
			return true;
		}
	}

	public function auth_no(){
		return 'ユーザ名かパスワードが間違っています。'."\n";
	}

	public function logout(){
		$_SESSION = [];

		if(ini_get("session.use_cookies")){
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000, $params["path"], 
				$params["domain"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}
		session_destroy();
	}
}

?>