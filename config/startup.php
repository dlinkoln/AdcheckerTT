<?php
ini_set('display_errors', "off");
require_once "config.php";
require_once("db_config.php");
require_once "messages.php";

class DB {

	private function __construct() {}

	public static function sql($sql) {
		return DBConnector::getInstance()->getConnection()->query($sql);
  }
  
  public static function transact($sql_arr) {
    $con = DBConnector::getInstance()->getConnection();
    $con->beginTransaction();
    foreach($sql_arr as $value) {
      $con->exec($value);
    }
    $con->commit();
  }
}
//DB::sql("SET NAMES utf8");
//DB::sql("SET CHARSET SET 'utf8'");
DB::sql("SET SESSION collation_connection = 'utf8_general_ci'");

function setIncPath($pathes) {
	$incPath = get_include_path(); // php.ini include_path
	foreach ($pathes as $path) {
		$path = SITE_ROOT . DS . APP_DIR . DS . $path;
		if (file_exists($path)) {
			$incPath .= PS . $path;
		} else {
			exit($GLOBALS['errors']['incPath']);
		}
	}
	set_include_path($incPath);
}

setIncPath($paths);

//test query
//$test_result = DB::sql("SELECT * FROM clicks c, visitors v WHERE c.visitor_id = v.id;");
