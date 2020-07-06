<?php

/**
 * DB Connection
 */
define('CLEARDB_URL', getenv("CLEARDB_DATABASE_URL"));

class DBConnector {
  private $con;
	private static $instance;

	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {
    $url = parse_url(CLEARDB_URL);
    //var_dump($url);
    $host = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $dbname = substr($url["path"], 1);
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		$this->con = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password,$options);
	}

	public function getConnection() {
		return $this->con;
	}

	private function __clone() {}

	private function getDB() {
		return $this->dbname;
	}
}

// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $host = $url["host"];
// $username = $url["user"];
// $password = $url["pass"];
// $dbname = substr($url["path"], 1);