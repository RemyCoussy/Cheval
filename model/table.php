<?php
function getColumns(){
	$id = $_GET['id'];
	$pdo = new PDO('mysql:host=localhost;dbname=chevaux', $_SESSION['user'], $_SESSION['pass']);

	/* Requête nom des colonnes */
	$statement = $pdo->query("DESCRIBE $id");
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
function getData(){
	$id = $_GET['id'];
	$pdo = new PDO('mysql:host=localhost;dbname=chevaux', $_SESSION['user'], $_SESSION['pass']);

	/* Requête données */
	$sql = "SELECT * FROM $id";
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$tables = $statement->fetchAll(PDO::FETCH_NUM);
	$_SESSION['num'] = $statement->columnCount();

	return $tables;
}

?>