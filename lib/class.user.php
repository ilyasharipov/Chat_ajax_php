<?php
defined('MCORE') || die();


class MCore_user {
	public $id = 0;
	public $cookie_life = 172800;
	public $error = [ 'auth' => [], 'reg' => [] ];

	protected $get_fields = ['id', 'email', 'login', 'firstname',
	'lastname', 'time_reg', 'time_online', 'role'];
	protected $set_fields = ['email', 'login', 'firstname', 'lastname'];

	function __construct(){
		# code...
		session_start();
		isset($_SESSION) || die('MCore_user::MCore_user() ERROR!');
		if ( !empty($_SESSION['USER']['id']) ) {
			# code...
			$this->init();
			$this->online();
		}
	}

	public function init(){
		# code...
		// $this->login = 'maz'//$_SESSION['USER']['login'] == 'maz';
		// $_SESSION['USER']['login'] = 'mmm'//$this->login == 'mmm'
		foreach ($this->get_fields as $field) {
			# code...
			$this->$field =& $_SESSION['USER'][$field];
		}
		if ( empty($_SESSION['USER']['session_key']) ) {
			# code...
			$this->session_key = $_SESSION['USER']['session_key'] = random_string(8);
		} else {
			$this->session_key = $_SESSION['USER']['session_key'];
		}
		// $this->id =& $_SESSION['USER']['id'];
		// $this->email =& $_SESSION['USER']['email'];
		// $this->login =& $_SESSION['USER']['login'];
	}

	public function online(){
		# code...
		global $DB;
		$data = ['id' => $this->id, 'time_online' => time()];
		$DB->update_record('user', $data);
	}

	public function set_field(string $name_field, $value){
		# code...
		if ( $this->id && in_array($name_field, $this->set_fields) ) {
			# code...
			global $DB;
			$update = [
				'id' => $this->id,
				$name_field => $value
			];
			$_SESSION['USER'][$name_field] = $value;
			//$this->$name_field = $value;// не требуется
			return $DB->update_record('user', $update);
		}
		return false;
	}

	public function answer(){
		# code...
		if ( !$this->id ) {
			# code...
			$login = get_param('login');
			$password = get_param('password');
			if ( $login && $password ) {
				# code...
				global $DB;
				$user = $DB->get_record('user', ['login' => $login]);
				if (!$user) {
					# code...
					$this->error['auth'][] = 'Incorrect login or password!';
					return;
				}
				if ( $this->checkPassword($password, $user->password) ) {
					# code...
					$this->auth($user);
				} else {
					$this->error['auth'][] = 'Incorrect login or password!';
				}
			}
		} elseif( get_param('auth') == 'logout' ) {
			unset($_SESSION['USER']);
			foreach ($this->get_fields as $field) {
				$this->$field = null;
			}
			session_destroy();
		}
	}

	public function auth($user){
		# code...
		$_SESSION['USER'] = [];
		//pr($user);
		//dpr($this->get_fields);
		foreach ($this->get_fields as $field) {
			# code...
			$this->$field = $user->$field;
			$_SESSION['USER'][$field] =& $this->$field;
		}
		setcookie(
			session_name(),
			session_id(),
			time() + $this->cookie_life
		);
	}

	public function hashPassword(string $password){
		# code...
		$salt = random_string(15);
		return $this->hashWithPassword($password, $salt);
	}

	public function hashWithPassword(string $password, string $salt){
		# code...
		$sha1 = sha1($salt.$password);
		for ($i=0; $i < 1000; $i++) { 
			# code...
			$sha1 = sha1( $sha1.($i % 2 == 0 ? $password : $salt ) );
		}
		return 'MCore_user#'.$salt.'#'.$sha1;
	}

	public function checkPassword(string $password, string $hash): bool{
		# code...
		$salt = substr($hash, 11, 15);
		return $this->hashWithPassword($password, $salt) == $hash ;
	}
}