<?php
	include $_SERVER["DOCUMENT_ROOT"].'/Manager/Constants.php';

	function Select() {
		global $server, $username, $password, $database;
		$conn = new mysqli($server, $username, $password, $database) or die(mysqli_error());
		$results_array = array();

		if (func_num_args() == 1) { // $table
			$sql = "SELECT * FROM ".func_get_arg(0);
			$result = $conn->query($sql) or die(mysqli_error());
			while ($row = $result->fetch_assoc()) {
				$results_array[] = $row;
			}
		}

		if (func_num_args() == 2) { // $table, $condition
			$sql = "SELECT * FROM ".func_get_arg(0)." WHERE ".func_get_arg(1);
			$result = $conn->query($sql) or die(mysqli_error());
			while ($row = $result->fetch_assoc()) {
				$results_array[] = $row;
			}
		}

		if (func_num_args() == 3) { // $table, $condition, $return_column
			$sql = "SELECT ".func_get_arg(2)." FROM ".func_get_arg(0)." WHERE ".func_get_arg(1);
			$result = $conn->query($sql) or die(mysqli_error());
			while ($row = $result->fetch_assoc()) {
				$results_array[] = $row;
			}
		}

		return $results_array;
	}

	function Update() {
		global $server, $username, $password, $database;
		$conn = new mysqli($server, $username, $password, $database) or die(mysqli_error());
		$sql = "";

		if (func_num_args() == 3){ // $table, $multiple_values, $condition
			$sql = "UPDATE ".func_get_arg(0)." SET ".func_get_arg(1)." WHERE ".func_get_arg(2);
		}

		if (func_num_args() == 4) { // $table, $column, $value, $condition
			$sql = "UPDATE ".func_get_arg(0)." SET ".func_get_arg(1)."='".func_get_arg(2)."' WHERE ".func_get_arg(3);
		}

		if ($conn->query($sql) === TRUE) {
		    return "OK";
		} else {
		    return "Error updating record: " . $conn->error;
		}
	}

	function Insert($table, $values) {
		global $server, $username, $password, $database;
		$conn = new mysqli($server, $username, $password, $database) or die(mysqli_error());

		$sql = "INSERT INTO $table VALUES $values";

		if ($conn->query($sql) === TRUE) {
			return "OK";
		} else {
			return "Error inserting record: " . $conn->error;
		}
	}

	function Delete($table, $condition) {
		global $server, $username, $password, $database;
		$conn = new mysqli($server, $username, $password, $database) or die(mysqli_error());

		$sql = "DELETE FROM $table WHERE $condition";
		
		if ($conn->query($sql) === TRUE) {
			return "OK";
		} else {
			return "Error deleting record: " . $conn->error;
		}
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