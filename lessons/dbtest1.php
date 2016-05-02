<?php
try{
	$pdo = new PDO('mysql:host=localhost;dbname=sampledb;charset=utf8','sample','sakurajima');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	print "OK";
}catch(PDOException $Exception){
	die('Error:'.$Exception->getMessage());
}



?>
