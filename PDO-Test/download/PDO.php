<?php

class DB
{

	private static $pdo;

	public static function getConnection()
	{
		if (!isset(self::$pdo))
		{
			$host    = 'sql1.njit.edu';
			$db      = 'jtn7';
			$user    = 'jtn7';
			$pass    = 'cherish28';
			$charset = 'utf8';

			$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
			$opt = [
    			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    			PDO::ATTR_EMULATE_PREPARES   => false,
			];

            self::$pdo = new PDO($dsn, $user, $pass, $opt);
        }
        return self::$pdo;
	}

	private function __construct(){}
}

?>