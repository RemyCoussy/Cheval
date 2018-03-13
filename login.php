<?php
	$name=$_POST['user'];
	$password=$_POST['pass'];
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=chevaux', $name, $password);
	$sql="SHOW TABLES";
	$statement = $pdo->prepare($sql);
	$statement->execute();
	session_start();
	$_SESSION['user']=$name;
	$_SESSION['pass']=$password;
	echo "1";
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	

?>