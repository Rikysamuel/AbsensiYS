<?php
	include $_SERVER["DOCUMENT_ROOT"].'/Manager/Constants.php';

	function Select() {
		global $server, $username, $password, $database;
		$conn = pg_connect("$server $database $username $password");
		if (!$conn) {
			return "Error : Unable to open database\n";
		}

		if (func_num_args() == 1) { // $table
			$sql = "SELECT * FROM ".func_get_arg(0);
			$ret = pg_query($conn, $sql);

			if(!$ret) {
				echo pg_last_error($conn);
				exit;
			}

			pg_close($conn);
			return pg_fetch_all($ret);
		}

		if (func_num_args() == 2) { // $table, $condition
			$sql = "SELECT * FROM ".func_get_arg(0)." WHERE ".func_get_arg(1);
			$ret = pg_query($conn, $sql);

			if(!$ret) {
				echo pg_last_error($conn);
				exit;
			}

			pg_close($conn);
			return pg_fetch_all($ret);
		}

		if (func_num_args() == 3) { // $table, $condition, $return_column
			$sql = "SELECT ".func_get_arg(2)." FROM ".func_get_arg(0)." WHERE ".func_get_arg(1);
			$ret = pg_query($conn, $sql);

			if(!$ret) {
				echo pg_last_error($conn);
				exit;
			}

			pg_close($conn);
			return pg_fetch_all($ret);
		}
	}

	function Update() {
		global $server, $username, $password, $database;
		$conn = pg_connect("$server $database $username $password");
		$sql = "";

		if (func_num_args() == 3){ // $table, $multiple_values, $condition
			$sql = "UPDATE ".func_get_arg(0)." SET ".func_get_arg(1)." WHERE ".func_get_arg(2);
		}

		if (func_num_args() == 4) { // $table, $column, $value, $condition
			$sql = "UPDATE ".func_get_arg(0)." SET ".func_get_arg(1)."='".func_get_arg(2)."' WHERE ".func_get_arg(3);
		}

		$ret = pg_query($conn, $sql);

		if(!$ret) {
			echo pg_last_error($conn);
			exit;
		}

		pg_close($conn);
	}

	function Insert($table, $values) {
		global $server, $username, $password, $database;
		$conn = pg_connect("$server $database $username $password");

		$sql = "INSERT INTO $table VALUES $values";

		$ret = pg_query($conn, $sql);
		if(!$ret) {
			echo pg_last_error($conn);
			exit;
		}

		pg_close($conn);
	}

	function Delete($table, $condition) {
		global $server, $username, $password, $database;
		$conn = pg_connect("$server $database $username $password");

		$sql = "DELETE FROM $table WHERE $condition";
		
		$ret = pg_query($conn, $sql);
		if(!$ret) {
			echo pg_last_error($conn);
			exit;
		}

		pg_close($conn);
	}

	function escape($value)
	{
	    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
	    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

	    return str_replace($search, $replace, $value);
	}

	function GetMaxLoginAttempt() {
		global $maxLoginAttempt;
		return $maxLoginAttempt;
	}

	function GetSalt() {
		global $salt_front, $salt_back;
		$salt = array($salt_front , $salt_back);
		return $salt;
	}