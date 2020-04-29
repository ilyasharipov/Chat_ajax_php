<?php
include '../conf.php';

// $i = 0;
function up(){
	# code...
	static $i = 0;
	// $i = 0;
	echo ++$i.'<br>';
	return $i;
}

// up();
// up();
// up();
// up();
// up();
// up();

function get_user($id){
	# code...
	static $users = [];
	if ( empty($users[$id]) ) {
		global $DB;
		echo "connect DB<br>";
		$users[$id] = $DB->get_record('user', ['id' => $id]);
	}
	return $users[$id];
}

// pr( get_user(1) );
// pr( get_user(9) );
// pr( get_user(1) );
// pr( get_user(1) );

class maz{
	const PI = 3.14;
	protected $users = [];
	 static $my = 'msdfsdfdsfy';

	public function get_pi(){
		# code...
		echo self::PI.'<br>';
	}

	function get_user0($id){
		# code...
		static $users = [];
		if ( empty($users[$id]) ) {
			global $DB;
			echo "connect DB<br>";
			$users[$id] = $DB->get_record('user', ['id' => $id]);
		}
		return $users[$id];
	}

	function get_user($id){
		# code...
		return self::get_user_static($id);
		
	}

	static function get_user_static($id){
		# code...
		static $users = [];
		if ( empty($users[$id]) ) {
			global $DB;
			echo "connect DB<br>";
			$users[$id] = $DB->get_record('user', ['id' => $id]);
		}
		return $users[$id];
	}

	public static function my(){
		# code...
		echo self::$my.'<br>';
	}

	public function my2(){
		# code...
		echo self::$my.'<br>';
	}
}

$c = new maz();
// pr( $c->get_user(1) );
// // pr( $c->get_user(9) );
// // pr( $c->get_user(1) );
// // pr( $c->get_user(1) );

// $c->get_pi();
// echo maz::PI.'<br>';
// pr( maz::get_user_static(1) );
// pr( maz::get_user_static(1) );
//-------------------------------------
maz::my();
$c->my2();