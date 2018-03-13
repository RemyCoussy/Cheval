<?php
	$name=$_POST['user'];
	$password=$_POST['pass'];
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=cheval', $name, $password);
	$sql="SHOW TABLES";
	$statement = $pdo->prepare($sql);
	$statement->execute();
	session_start();
	$_SESSION['user']=$name;
	$_SESSION['pass']=$password;
	}
	catch(PDOException $e)
	{
		echo "2";
	}
	

?>