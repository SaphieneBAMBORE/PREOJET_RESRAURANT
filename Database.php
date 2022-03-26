<?php 

class Database{
	 private static $dbHost="localhost";
	  private static $dbName="restaurant";
	   private static $dbUser="root";
 private static $dbUserPassword="";
 private static $bdd=null;
 public static function connect(){
	try{
		self::$bdd= new PDO("mysql:host=".self::$dbHost.";dbname=".self::$dbName ,self::$dbUser,self::$dbUserPassword);
	}
	catch(PDOexeption $e){
  die($e->getMessage());
	}
	return self::$bdd;
}
 public static  function disconnect(){
	self::$bdd=null;
}



}

Database::connect();






?>