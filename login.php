<?php
	$name=$_POST['user'];
	$password=$_POST['pass'];
	session_start();
	$_SESSION['user']=$name;
	$_SESSION['pass']=$password;
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=chevaux', $name, $password);
	$sql="SHOW TABLES";
	$statement = $pdo->prepare($sql);
	$statement->execute();
<<<<<<< HEAD
	
=======
	session_start();
	$_SESSION['user']=$name;
	$_SESSION['pass']=$password;
	echo "1";
>>>>>>> 0ea02910c4b1608c28e5e3eb01024b0ca6409ba3
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	

?>