<?php

class Database{

 	public static function conectar()
 	{
 		$pdo = new PDO('mysql:host=localhost;dbname=medicamentos;charset=utf8', 'root', '');
 		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 		return $pdo;
 	}
}

 ?>
