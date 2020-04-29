<?php

class MC_files
{
	
	function __construct(){}

	public static function uploaded($fileName, $component, $space, $itemid = 0){
		# code...
		global $CFG, $DB, $USER;
		// $USER->id
		pr($_FILES);
		//----------------------------
		if ( empty($_FILES[$fileName]) ) return false;
		$ret = ['done' => [], 'fail' => []];
		$f = $_FILES[$fileName];
		if ( is_array($f['name']) ) {
			# code...
			//mode
		} else {
			//one
			$sha1_name = sha1_file( $f['tmp_name'] );
			$upload_file = self::create_dir($sha1_name);
			if ( !file_exists($upload_file) ) {
				# code...
				$done = move_uploaded_file($f['tmp_name'], $upload_file);
			} else $done = true;

			if ( $done ) {
				# code...
				//TODO insert record
				$param = [
					'component'	=> $component,
					'space'		=> $space,
					'itemid'	=> $itemid,
					'filename'	=> $f['name']
				];
				$get = $DB->get_record('files', $param);
				if ( $get ) {
					# code...
					$filehash = $get->filehash;

					$get->filehash	= $sha1_name;
					$get->userid	= $USER->id;
					$get->filesize	= $f['size'];
					$get->filetype	= $f['type'];
					$get->date		= $_SERVER['REQUEST_TIME'];
					$DB->update_record('files', $get);
					self::delete_file($filehash);
				} else {
					// $param['filehash'] = $sha1_name;
					$param += [
						'filehash'	=> $sha1_name,
						'userid'	=> $USER->id,
						'filesize'	=> $f['size'],
						'filetype'	=> $f['type'],
						'date'		=> $_SERVER['REQUEST_TIME']
					];
					$DB->insert_record('files', $param);
				}
				$ret['done'][] = $fileName;
			} else $ret['fail'][] = $fileName;

		}
		return $ret;
		//----------------------------
	}

	protected static function create_dir($name){
		# code...
		$path = self::get_path($name);
		if ( !file_exists($path) ) {
			# code...
			mkdir($path, 0777, true);
		}
		return $path.'/'.$name;
	}

	protected static function get_path($name){
		# code...
		global $CFG;
		$level1 = substr($name, 0, 2);
		$level2 = substr($name, 2, 2);
		return $CFG->dataroot.'/files/'.$level1.'/'.$level2;
	}

	protected static function delete_file($filehash){
		# code...
		global $DB;
		if ( !$DB->get_records('files', ['filehash' => $filehash]) ) {
			# code...
			$path = self::get_path($filehash);
			unlink($path.'/'.$filehash);
		}
	}

	public function download($component, $space, $itemid, $name){
		# code...
		global $DB;
		$param = [
			'component'	=> $component,
			'space'		=> $space,
			'itemid'	=> $itemid,
			'filename'	=> $name
		];
		$info = $DB->get_record('files', $param);
		if (!$info) die('ERROR! #1');
		$file_path = self::get_path($info->filehash).'/'.$info->filehash;
		if ( !file_exists($file_path) ) die('ERROR! #2');
		// сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
		// если этого не сделать файл будет читаться в память полностью!
		if (ob_get_level()) {
			ob_end_clean();
		}
		
		// заставляем браузер показать окно сохранения файла
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . basename($info->filename));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_path));
		// читаем файл и отправляем его пользователю
		readfile($file_path);
		exit;
	}

	
}