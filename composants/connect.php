<?php 

define ("DBHOST", "localhost");
define ("DBUSER", "samir2");
define ("DBPASS", "Samb89");
define ("DBNAME", "shoe_shop");


$dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;


try {


$db = new PDO($dsn, DBUSER, DBPASS);

$db->exec("SET NAMES utf8");

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);





} catch(PDOException $e){



die($e->getMessage());


}








?>