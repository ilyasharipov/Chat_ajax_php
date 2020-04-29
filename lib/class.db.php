<?php
defined('MCORE') || die();

class MCore_DB{
	protected $debug;
	protected $prefix;
	protected $mysql;

	protected $DB_TIME = 0;

	function __construct(array $conf){
		# code...
		$this->debug = empty($conf['debug']) ? false : true;
		$this->prefix = empty($conf['prefix']) ? '' : $conf['prefix'];
		if ( !isset( $conf['host'], $conf['user'], $conf['db_name'] ) ) {
			# code...
			$this->error('Invalid format conf!');
		}
		$port = empty($conf['port']) ? 3306 : $conf['port'];
		$this->mysql = @mysqli_connect($conf['host'], $conf['user'], $conf['password'], $conf['db_name'], $port);
		if ( !$this->mysql ) {
			# code...
			$this->error( mysqli_connect_error() );
		}
		$this->query('SET names utf8;');
	}

	public function error($msg = false, $SQL = false){
		# code...
		if ( !empty($this->mysql->errno) || $msg ) {
			# code...
			echo '<div style="border:5px black dotted;background:red;color:#fff;font-size:19px;padding:5px;">';
			if ( $this->debug ) {
				# code...
				if($msg) echo $msg.'<hr>';
				if( !empty($this->mysql->errno) ) echo $this->mysql->error.'<hr>';
				if($SQL) echo $SQL;
			} else echo 'ERROR DB!';
			echo '</div>';
			die();
		}
	}

	protected function query($SQL){
		$time = microtime(true);
		$result = mysqli_query($this->mysql, $SQL);
		$this->DB_TIME += microtime(true) - $time;
		$this->error(false, $SQL);
		return $result;
	}

	public function get_db_time(){
		# code...
		return $this->DB_TIME;
	}

	protected function normal_value($value){
		# code...
		if ( is_object($value) ) {
			# code...
			$this->error('Invalid value, is class: '.get_class($value));
		}
		if ( is_array($value) ) {
			# code...
			$this->error('Invalid value, is array.');
		}
		if ( is_null($value) ) {
			# code...
			return 'NULL';
		}
		return '"'.mysqli_real_escape_string($this->mysql, $value).'"';
	}

	public function insert_record(string $table, $data){
		# code...
		$data = (array)$data;
		$fields = [];
		$values = [];
		foreach ($data as $index => $value) {
			if ( is_numeric($index) ) {
				$this->error('Invalid params in MCore_DB::insert_record()');
			}
			$fields[] = '`'.$index.'`';
			$values[] = $this->normal_value($value);
		}
		$SQL = 'INSERT INTO '.$this->prefix.$table.' ( '.
		implode(', ', $fields).' ) VALUES ( '.implode(', ', $values).' )';
		$this->query($SQL);
		return $this->mysql->insert_id;
	}
	public function fix_tables_name($SQL){
		# code...
		return preg_replace(
			'/\{([a-z][a-z0-9_]*)\}/',
			$this->prefix.'$1',
			$SQL
		);
	}

	public function get_where(array $where){
		# code...
		if ( empty($where) ) return '';
		$return = [];
		foreach ($where as $index => $value) {
			# code...
			if ( is_numeric($index) ) {
				$this->error('Invalid params in MCore_DB::get_where()');
			}
			if ( is_object($value) ) {
				# code...
				$this->error('Invalid value, is class: '.get_class($value));
			}
			if ( is_array($value) ) {
				# code...
				$this->error('Invalid value, is array.');
			}
			if ( is_null($value) ) {
				# code...
				$return[] = '`'.$index.'` IS NULL';
			} else $return[] = '`'.$index.'` = "'.
			mysqli_real_escape_string($this->mysql, $value).'"';
		}
		return ' WHERE '.implode(' AND ', $return);
	}

	public function get_records_sql($SQL){
		# code...
		$return = [];
		$SQL = $this->fix_tables_name($SQL);
		$result = $this->query($SQL);
		while ( $row = $result->fetch_assoc() ) {
			# code...
			$row = array_change_key_case($row, CASE_LOWER);
			$key = reset($row);
			if ( isset($return[$key]) ) {
				# code...
				debuging('isset key: '.$key.' method MCore_DB::get_records_sql()');
			}
			$return[$key] = (object)$row;
		}
		return $return;
	}

	public function get_records(string $table, $where = [], string $sort = null,
	string $fields = '*'){
		# code...
		//ORDER BY `id`
		//ORDER BY `id` DESC
		$where = $this->get_where($where);
		if($sort) $sort = ' ORDER BY '.$sort;
		$SQL = 'SELECT '.$fields.' FROM '.$this->prefix.$table.$where.$sort;
		return $this->get_records_sql($SQL);
	}

	public function get_record_sql($SQL){
		# code...
		$records = $this->get_records_sql($SQL);
		if ( count($records) > 1 ) {
			# code...
			debuging('MCore_DB::get_record_sql() returned more then one line!');
		}
		return reset($records);
	}

	public function get_record(string $table, $where = [], string $fields = '*'){
		$records = $this->get_records($table, $where, null, $fields);
		if ( count($records) > 1 ) {
			debuging('MCore_DB::get_record() returned more then one line!');
		}
		return reset($records);
	}

	public function update_record(string $table, $data){
		$data = (array)$data;

		if ( empty($data['id']) ) $this->error('Invalid field id in MCore_DB::update_record()');
		$id = (int)$data['id'];
		unset($data['id']);

		if ( empty($data) ) $this->error('Not fields, valuse in MCore_DB::update_record()');

		$set = [];
		foreach ($data as $field => $value) {
			if ( is_numeric($field) ) $this->error('Invalid params in MCore_DB::update_record()');
			$set[] = '`'.$field.'` = '.$this->normal_value($value);
		}
		$SQL = 'UPDATE '.$this->prefix.$table.' SET '.implode(', ', $set).
		' WHERE id = '.$id;
		$this->query($SQL);
		return true;
	}

	public function deleted_records(string $table, $where = []){
		# code...
		$where = $this->get_where($where);
		$SQL = 'DELETE FROM '.$this->prefix.$table.$where;
		$this->query($SQL);
		return true;
	}
}
