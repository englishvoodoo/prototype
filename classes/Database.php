<?php
// classes/Database.php

class Database
{
	
	public function __construct()
	{

		$host = 'localhost';
		$user = 'root';
		$pass = 'pass';
		$db = 'prototype';

	}

	public static function connect()
	{

		$conn = new PDO('mysql:host=localhost;dbname=prototype', 'root', '');

		return $conn;

	}

}
?>