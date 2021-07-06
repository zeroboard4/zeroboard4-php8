<?php
if (!function_exists("ereg")) {
	function ereg($pattern, $string, &$regs = array())
	{
		$pattern = str_replace("\\/", "/", $pattern);
		$pattern = str_replace("/", "\\/", $pattern);
		return preg_match("/" . $pattern . "/", $string, $regs);
	}
}

if (!function_exists("eregi")) {
	function eregi($pattern, $string, &$regs = array())
	{
		$pattern = str_replace("\\/", "/", $pattern);
		$pattern = str_replace("/", "\\/", $pattern);
		return preg_match("/" . $pattern . "/i", $string, $regs);
	}
}

if (!function_exists("ereg_replace")) {
	function ereg_replace($pattern, $replacement, $string)
	{
		$pattern = str_replace("\\/", "/", $pattern);
		$pattern = str_replace("/", "\\/", $pattern);
		return preg_replace("/" . $pattern . "/", $replacement, $string);
	}
}

if (!function_exists("eregi_replace")) {
	function eregi_replace($pattern, $replacement, $string)
	{
		$pattern = str_replace("\\/", "/", $pattern);
		$pattern = str_replace("/", "\\/", $pattern);
		return preg_replace("/" . $pattern . "/i", $replacement, $string);
	}
}

if (!function_exists("split")) {
	function split($pattern, $string)
	{
		return explode($pattern, $string);
	}
}

if (!function_exists("session_register")) {
	function session_register()
	{
		$arg_list = func_get_args();
		foreach ($arg_list as $name) {
			if (isset($GLOBALS[$name])) $_SESSION[$name] = $GLOBALS[$name];
			$GLOBALS[$name] = &$_SESSION[$name];
		}
	}
}

if (!function_exists("get_magic_quotes_gpc")) {
	function get_magic_quotes_gpc()
	{
		return false;
	}
}

if (!function_exists("mysql_query")) {
	function mysql_query($query, $conn = null)
	{
		global $connect;
		$query = trim($query);
		$query = preg_replace("#^select.*from.*[\s\(]+union[\s\)]+.*#i ", "select 1", $query);
		$query = preg_replace("#^select.*from.*where.*`?information_schema`?.*#i", "select 1", $query);
		if ($conn != null) $connect = $conn;
		return mysqli_query($connect, $query);
	}
}

if (!function_exists("mysql_fetch_array")) {
	function mysql_fetch_array($resource)
	{
		return mysqli_fetch_array($resource);
	}
}

if (!function_exists("mysql_error")) {
	function zb_error()
	{
		global $connect;
		return mysqli_error($connect);
	}
}

if (!function_exists("mysql_connect")) {
	function mysql_connect($host = null, $user = null, $password = null, $database = null, $port = null, $socket = null)
	{
		return @mysqli_connect($host, $user, $password, $database, $port, $socket);
	}
}

if (!function_exists("mysql_select_db")) {
	function mysql_select_db($dbname, $conn = null)
	{
		global $connect;
		if ($conn != null) $connect = $conn;
		return mysqli_select_db($connect, $dbname);
	}
}

if (!function_exists("mysql_close")) {
	function mysql_close($result)
	{
		return mysqli_close($result);
	}
}

if (!function_exists("mysql_list_tables")) {
	function mysql_list_tables($dbname = null)
	{
		global $connect, $config_dir;

		if ($dbname) mysql_select_db($dbname, $connect);

		return mysql_query("show tables");
	}
}

if (!function_exists("mysql_num_rows")) {
	function mysql_num_rows($result = null)
	{
		return mysqli_num_rows($result);
	}
}

if (!function_exists("mysql_tablename")) {
	function mysql_tablename($result, $i)
	{
		global $connect;
		$result_copy = $result;
		$values = array();
		while ($row = mysql_fetch_array($result_copy)) {
			$values[] = $row[0];
		}
		return $values[$i];
	}
}

if (!function_exists("mysql_insert_id")) {
	function mysql_insert_id($result = null)
	{
		global $connect;
		if ($result != null) $connect = $result;
		return mysqli_insert_id($connect);
	}
}

if (!function_exists("mysql_free_result")) {
	function mysql_free_result($result)
	{
		return mysqli_free_result($result);
	}
}
